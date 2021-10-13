<?php

namespace OmarEhab\Aramex\API\Requests\Location;

use Exception;
use OmarEhab\Aramex\API\Classes\Address;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Location\AddressValidationResponse;

/**
 * This method Allows users to search for certain addresses and make sure that the address structure is correct.
 * The required nodes  to be filled are Client Info and Address,
 *
 * Class ValidateAddress
 * @package OmarEhab\Aramex\API\Requests\Location
 */
class ValidateAddress extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';

    private $address;

    /**
     * @return AddressValidationResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return AddressValidationResponse::make($this->soapClient->ValidateAddress($this->normalize()));
    }

    public function validate()
    {
        parent::validate();

        if (!$this->address) {
            throw new Exception('Address should be provided.!');
        }

    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return ValidateAddress
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
        return $this;
    }


    public function normalize()
    {
        return array_merge([
            'Address' => $this->getAddress()->normalize()
        ], parent::normalize());
    }
}