<?php

namespace OmarEhab\Aramex\API\Requests\Location;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Location\StatesFetchingResponse;

class FetchStates extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';

    private string $countryCode;

    /**
     * @return StatesFetchingResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return StatesFetchingResponse::make($this->soapClient->FetchStates($this->normalize()));
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
     * @return FetchStates
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