<?php

namespace OmarEhab\Aramex\API\Response\Location;

use OmarEhab\Aramex\API\Classes\Country;
use OmarEhab\Aramex\API\Response\Response;

class CountryFetchingResponse extends Response
{
    private Country $country;

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @param Country $country
     * @return $this
     */
    public function setCountry(Country $country): CountryFetchingResponse
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param object $obj
     * @return CountryFetchingResponse
     */
    protected function parse($obj): CountryFetchingResponse
    {
        parent::parse($obj);

        if ($country = $obj->Country) {
            $this->setCountry(
                (new Country())
                    ->setCode($country->Code)
                    ->setName($country->Name)
                    ->setIsoCode($country->IsoCode)
                    ->setStateRequired($country->StateRequired)
                    ->setPostCodeRequired($country->PostCodeRequired)
                    ->setInternationalCallingNumber($country->InternationalCallingNumber)
            );
        }

        return $this;
    }

    /**
     * @param object $obj
     * @return CountryFetchingResponse
     */
    public static function make($obj): CountryFetchingResponse
    {
        return (new self())->parse($obj);
    }
}