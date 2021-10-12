<?php

namespace OmarEhab\Aramex\API\Requests\Location;

use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Location\DropOffLocationsFetchingResponse;
use Exception;

/**
 * This method allows users to get list of the available ARAMEX offices within a certain country.
 * The required nodes to be filled are Client Info and Country Code.
 *
 * Class FetchDropOffLocations
 * @package OmarEhab\Aramex\API\Requests\Location
 */
class FetchDropOffLocations extends API implements Normalize
{
    protected string $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';
    protected string $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/location/service_1_0.svc?wsdl';

}