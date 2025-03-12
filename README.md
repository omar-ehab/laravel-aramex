# Laravel Aramex

Integrate your [Laravel](https://laravel.com) application with [Aramex](https://www.aramex.com/us/en) web services

## Table of Contents

* [Installation](#installation)
* [QuickStart](#quickstart)
    * [Location](#location)
        * [Fetch Countries](#fetch-countries)
        * [Fetch Country](#fetch-country)
        * [Fetch States](#fetch-states)
        * [Fetch Cities](#fetch-cities)
        * [Validate Address](#validate-address)
    * [Rate](#rate)
        * [Calculate Rate](#calculate-rate)
    * [Shipping](#shipping)
        * [Create Pickup](#create-pickup)
        * [Cancel Pickup](#cancel-Pickup)
        * [Create Shipments](#create-shipments)
        * [Get Last Shipments Numbers Range](#get-last-shipments-numbers-range)
        * [Print Label](#print-label)
        * [Reserve Shipment Number Range](#reserve-shipment-number-range)
        * [Schedule Delivery](#schedule-delivery)
    * [Tracking](#tracking)
        * [Track Pickup](#track-pickup)
        * [Track Shipments](#track-shipments)

## Installation

Run the following command to install the latest applicable version of the package:

    composer require omar-ehab/laravel-aramex

You can publish the config-file with:

    php artisan vendor:publish --provider="omar-ehab\Aramex\AramexServiceProvider" --tag="config"

You can publish the resources files with:

    php artisan vendor:publish --provider="omar-ehab\Aramex\AramexServiceProvider" --tag="lang"

### Environment Variables
After installation, you can add the following variables to your .env file to modify the default values of Aramex API URLs:

```
BASE_LIVE_URL
BASE_TEST_URL
```

Default values are:

```
BASE_LIVE_URL=https://ws.aramex.net/shippingapi.v2
BASE_TEST_URL=https://ws.sbx.aramex.net/shippingapi.v2
```

## QuickStart

### Location

#### Fetch Countries
This method allows users to get the world countries list.

    Aramex::fetchCountries()->run();

#### Fetch Country
This method allows users to get details of a certain country.

    Aramex::fetchCountry()
        ->setCode('PS')
        ->run();

#### Fetch States
This method allows users to get all the states within a certain country (country code).

    Aramex::fetchStates()
        ->setCountryCode('AE')
        ->run();

#### Fetch Cities
This method allows users to get all the cities within a certain country (country code). And allows users to get list of the cities that start with a specific prefix. The required nodes to be filled are Client Info and Country Code.

    Aramex::fetchCities()
        ->setCountryCode('AE')
        ->run();

#### Validate Address
This method Allows users to search for certain addresses and make sure that the address structure is correct.

    Aramex::validateAddress()
        ->setAddress(
            (new Address()) ...
        )->run();

### Rate

#### Calculate Rate
This method allows users to get rate for source/destinations shipment.

    $source = (new Address()) ... ;

    $destination = (new Address()) ...;

    $details = (new ShipmentDetails()) ...;

    Aramex::calculateRate()
        ->setOriginalAddress($source)
        ->setDestinationAddress($destination)
        ->setShipmentDetails($details)
        ->setPreferredCurrencyCode('USD')
        ->run();

### Shipping

#### Create Pickup
This method allows users to create a pickup request.

    $source = (new Address());
    
    $contact = (new Contact());
        
    $pickupItem = (new PickupItem());
    
    $pickup = (new Pickup())
        ->setPickupAddress($source)
        ->setPickupContact($contact)
        ->setPickupLocation('Reception')
        ->setPickupDate(Carbon::now()->timestamp)
        ->setReadyTime(Carbon::now()->timestamp)
        ->setLastPickupTime(Carbon::now()->addDay()->timestamp)
        ->setClosingTime(Carbon::now()->addDay()->timestamp)
        ->setStatus('Pending')
        ->setReference1('')
        ->addPickupItem($pickupItem);
        
    $labelInfo = (new LabelInfo())
        ->setReportId(9201)
        ->setReportType('URL');
        
    Aramex::createPickup()
        ->setLabelInfo($labelInfo)
        ->setPickup($pickup)
        ->run();

#### Cancel Pickup
This method allows you to cancel a pickup as long as it is un-assigned or pending details.

    Aramex::cancelPickup()
        ->setPickupGUID('PICKUP_GUID')
        ->run();

#### Create Shipments
This method allows users to create shipments on Aramex’s system.

    Aramex::createShipments()->run();

#### Get Last Shipments Numbers Range
This method allows you to inquire about the last reserved range using a specific entity and product group

    Aramex::getLastShipmentsNumbersRange()
        ->setEntity('ENTITY')
        ->setProductGroup('PRODUCT_GROUP')
        ->run();

#### Print Label
This method allows the user to print a label for an existing shipment.

    $labelInfo = (new \OmarEhab\Aramex\API\Classes\LabelInfo())
        ->setReportId(9201)
        ->setReportType('URL');
        
    Aramex::printLabel()
        ->setShipmentNumber('SHIPMENT_NO')
        ->setLabelInfo()
        ->run();

#### Reserve Shipment Number Range
This method allows you to reserve a range of shipment numbers.

    Aramex::reserveShipmentNumberRange()->run();

#### Schedule Delivery
This method allows you to schedule the delivery of a shipment at a specified time and place (Longitude and Latitude)

    Aramex::scheduleDelivery()->run();

### Tracking

#### Track Pickup
This method allows the user to track an existing pickup’s updates and latest status.

    Aramex::trackPickup()
        ->setReference('PICKUP_NO')
        ->setPickup('PICKUP') // any number
        ->run();

#### Track Shipments
This method allows the user to track an existing shipment’s updates and latest status.

    Aramex::trackShipments()
        ->setShipments(['SHIPMENT_NO'])
        ->run();

