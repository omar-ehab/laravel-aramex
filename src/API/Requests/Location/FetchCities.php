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
    protected string $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';
    protected string $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';

    private ?string $countryCode;
    private ?string $state;
    private ?string $nameStartsWith;

    /**
     * @return CitiesFetchingResponse
     * @throws Exception
     */
    public function run(): CitiesFetchingResponse
    {
        $this->validate();

        return CitiesFetchingResponse::make($this->soapClient->FetchCities($this->normalize()));
    }

    /**
     * @return string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return FetchCities
     */
    public function setCountryCode(string $countryCode): FetchCities
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return FetchCities
     */
    public function setState(?string $state): FetchCities
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNameStartsWith(): ?string
    {
        return $this->nameStartsWith;
    }

    /**
     * @param string|null $nameStartsWith
     * @return FetchCities
     */
    public function setNameStartsWith(?string $nameStartsWith): FetchCities
    {
        $this->nameStartsWith = $nameStartsWith;
        return $this;
    }

    public function normalize(): array
    {
        return array_merge([
            'CountryCode' => $this->getCountryCode(),
            'State' => $this->getState(),
            'NameStartsWith' => $this->getNameStartsWith(),
        ], parent::normalize());
    }
}