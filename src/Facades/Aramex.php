<?php

namespace OmarEhab\Aramex\Facades;

use OmarEhab\Aramex\API\Requests\Location\FetchCities;
use OmarEhab\Aramex\API\Requests\Location\FetchCountries;
use OmarEhab\Aramex\API\Requests\Location\FetchCountry;
use OmarEhab\Aramex\API\Requests\Location\FetchDropOffLocations;
use OmarEhab\Aramex\API\Requests\Location\FetchOffices;
use OmarEhab\Aramex\API\Requests\Location\FetchStates;
use OmarEhab\Aramex\API\Requests\Location\ValidateAddress;
use OmarEhab\Aramex\API\Requests\Rate\CalculateRate;
use OmarEhab\Aramex\API\Requests\Shipping\CancelPickup;
use OmarEhab\Aramex\API\Requests\Shipping\CreatePickup;
use OmarEhab\Aramex\API\Requests\Shipping\CreateShipments;
use OmarEhab\Aramex\API\Requests\Shipping\GetLastShipmentsNumbersRange;
use OmarEhab\Aramex\API\Requests\Shipping\PrintLabel;
use OmarEhab\Aramex\API\Requests\Shipping\ReserveShipmentNumberRange;
use OmarEhab\Aramex\API\Requests\Shipping\ScheduleDelivery;
use OmarEhab\Aramex\API\Requests\Tracking\TrackPickup;
use OmarEhab\Aramex\API\Requests\Tracking\TrackShipments;
use OmarEhab\Aramex\Aramex as AramexClass;
use Illuminate\Support\Facades\Facade;

/**
 * Class Aramex
 * @package OmarEhab\Aramex
 *
 * @method static FetchCities fetchCities
 * @method static FetchCountries fetchCountries
 * @method static FetchCountry fetchCountry
 * @method static FetchDropOffLocations fetchDropOffLocations
 * @method static FetchOffices fetchOffices
 * @method static FetchStates fetchStates
 * @method static ValidateAddress validateAddress
 * @method static CalculateRate calculateRate
 * @method static CancelPickup cancelPickup
 * @method static CreatePickup createPickup
 * @method static CreateShipments createShipments
 * @method static GetLastShipmentsNumbersRange getLastShipmentsNumbersRange
 * @method static PrintLabel printLabel
 * @method static ReserveShipmentNumberRange reserveShipmentNumberRange
 * @method static ScheduleDelivery scheduleDelivery
 * @method static TrackPickup trackPickup
 * @method static TrackShipments trackShipments
 */
class Aramex extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return AramexClass::class;
    }
}