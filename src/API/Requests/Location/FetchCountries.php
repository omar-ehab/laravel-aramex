<?php

namespace OmarEhab\Aramex\API\Requests\Location;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Location\CountriesFetchingResponse;

/**
 * This method allows users to get the world countries list.
 *
 * Class FetchCountries
 * @package OmarEhab\Aramex\API\Requests\Location
 */
class FetchCountries extends API implements Normalize
{
    /**
     * @return CountriesFetchingResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return CountriesFetchingResponse::make($this->soapClient->FetchCountries($this->normalize()));
    }
}