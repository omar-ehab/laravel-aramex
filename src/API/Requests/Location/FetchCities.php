<?php

namespace OmarEhab\Aramex\API\Requests\Location;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Location\CitiesFetchingResponse;

/**
 * This method allows users to get all the cities within a certain country (country code).
 * And allows users to get list of the cities that start with a specific prefix.
 * The required nodes to be filled are Client Info and Country Code.
 *
 * Class FetchCities
 * @package OmarEhab\Aramex\API\Requests\Location
 */
class FetchCities extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';

    private $countryCode;
    private $state;
    private $nameStartsWith;

    /**
     * @return CitiesFetchingResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return CitiesFetchingResponse::make($this->soapClient->FetchCities($this->normalize()));
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return FetchCities
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return FetchCities
     */
    public function setState(?string $state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNameStartsWith()
    {
        return $this->nameStartsWith;
    }

    /**
     * @param string|null $nameStartsWith
     * @return FetchCities
     */
    public function setNameStartsWith(?string $nameStartsWith)
    {
        $this->nameStartsWith = $nameStartsWith;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'CountryCode' => $this->getCountryCode(),
            'State' => $this->getState(),
            'NameStartsWith' => $this->getNameStartsWith(),
        ], parent::normalize());
    }
}