<?php

namespace OmarEhab\Aramex\API\Requests\Location;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Location\CountryFetchingResponse;

/**
 * This method allows users to get details of a certain country.
 *
 * Class FetchCountry
 * @package OmarEhab\Aramex\API\Requests\Location
 */
class FetchCountry extends API implements Normalize
{
    private string $code;

    /**
     * @return CountryFetchingResponse
     * @throws Exception
     */
    public function run()
    {
        $this->endpoint = config("aramex.{$this->environment}_endpoints.location");

        $this->validate();

        return CountryFetchingResponse::make($this->soapClient->FetchCountry($this->normalize()));
    }

    protected function validate()
    {
        parent::validate();

        if (!$this->code) {
            throw new Exception('Should provide country code!');
        }
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return FetchCountry
     */
    public function setCode(string $code)
    {
        $this->code = $code;
        return $this;
    }


    public function normalize()
    {
        return array_merge([
            'Code' => $this->getCode()
        ], parent::normalize());
    }
}