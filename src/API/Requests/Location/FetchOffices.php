<?php

namespace OmarEhab\Aramex\API\Requests\Location;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Location\OfficesFetchingResponse;

/**
 * This method allows users to get list of the available ARAMEX offices within a certain country.
 * The required nodes  to be filled are Client Info and Country Code.
 *
 * Class FetchOffices
 * @package OmarEhab\Aramex\API\Requests\Location
 */
class FetchOffices extends API implements Normalize
{
    private string $countryCode;

    /**
     * @return OfficesFetchingResponse
     * @throws Exception
     */
    public function run()
    {
        $this->endpoint = config("aramex.{$this->environment}_endpoints.location");

        $this->validate();

        return OfficesFetchingResponse::make($this->soapClient->FetchOffices($this->normalize()));
    }

    protected function validate()
    {
        parent::validate();

        if (!$this->countryCode) {
            throw new Exception('Should provide country code!');
        }
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
     * @return FetchOffices
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }


    public function normalize()
    {
        return array_merge([
            'CountryCode' => $this->getCountryCode()
        ], parent::normalize());
    }
}