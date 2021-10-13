<?php

namespace OmarEhab\Aramex\API\Response\Location;

use Exception;
use OmarEhab\Aramex\API\Classes\Address;
use OmarEhab\Aramex\API\Response\Response;

/**
 * Informs the user with the correct suggested Address structure for the address he entered by returning
 * an address parameter. The Transaction Parameter is sent as filled in the request for identification purposes.
 *
 * Class AddressValidationResponse
 * @package OmarEhab\Aramex\API\Response\Location
 */
class AddressValidationResponse extends Response
{
    private array $suggestedAddresses;

    /**
     * @return Address[]
     */
    public function getSuggestedAddresses(): array
    {
        return $this->suggestedAddresses;
    }

    /**
     * @param Address[] $suggestedAddresses
     * @return AddressValidationResponse
     */
    public function setSuggestedAddresses(array $suggestedAddresses): AddressValidationResponse
    {
        $this->suggestedAddresses = $suggestedAddresses;
        return $this;
    }

    /**
     * @param Address $suggestedAddress
     * @return AddressValidationResponse
     */
    public function addSuggestedAddresses(Address $suggestedAddress): AddressValidationResponse
    {
        $this->suggestedAddresses[] = $suggestedAddress;
        return $this;
    }

    /**
     * @param object $obj
     * @return AddressValidationResponse
     * @throws Exception
     */
    protected function parse($obj): AddressValidationResponse
    {
        parent::parse($obj);
        if ($obj->HasErrors && !property_exists($obj->SuggestedAddresses, 'Address')){
            throw new Exception($obj->Notifications->Notification->Message);
        }
        if ($obj->HasErrors && property_exists($obj->SuggestedAddresses, 'Address')){
            $address = new Address($obj->SuggestedAddresses->Address->Line1, $obj->SuggestedAddresses->Address->CountryCode);
            foreach ($obj->SuggestedAddresses->Address as $property => $value) {
                switch ($property){
                    case "Line2":
                        $address->setLine2($value);
                        break;
                    case "Line3":
                        $address->setLine3($value);
                        break;
                    case "City":
                        $address->setCity($value);
                        break;
                    case "StateOrProvinceCode":
                        $address->setStateOrProvinceCode($value);
                        break;
                    case "PostCode":
                        $address->setPostCode($value);
                        break;
                    case "Longitude":
                        $address->setLongitude($value);
                        break;
                    case "Latitude":
                        $address->setLatitude($value);
                        break;
                    case "BuildingNumber":
                        $address->setBuildingNumber($value);
                        break;
                    case "BuildingName":
                        $address->setBuildingName($value);
                        break;
                    case "Floor":
                        $address->setFloor($value);
                        break;
                    case "Apartment":
                        $address->setApartment($value);
                        break;
                    case "POBox":
                        $address->setPoBox($value);
                        break;
                    case "Description":
                        $address->setDescription($value);
                        break;
                    default:
                        break;
                }
            }
            $this->addSuggestedAddresses($address);
        }

        return $this;
    }

    /**
     * @param object $obj
     * @return AddressValidationResponse
     * @throws Exception
     */
    public static function make($obj): AddressValidationResponse
    {
        return (new self())->parse($obj);
    }

}