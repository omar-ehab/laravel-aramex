<?php

namespace OmarEhab\Aramex\API\Response\Tracking;

use OmarEhab\Aramex\API\Classes\TrackingResult;
use OmarEhab\Aramex\API\Response\Response;

class ShipmentTrackingResponse extends Response
{
    private $results;

    /**
     * @return mixed
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param $results
     * @return ShipmentTrackingResponse
     */
    public function setResults($results): ShipmentTrackingResponse
    {
        $this->results = $results;
        return $this;
    }

    /**
     * @param TrackingResult $result
     * @return ShipmentTrackingResponse
     */
    public function addResult(TrackingResult $result): ShipmentTrackingResponse
    {
        $this->results[] = $result;
        return $this;
    }

    /**
     * @param object $obj
     * @return ShipmentTrackingResponse
     */
    protected function parse($obj): ShipmentTrackingResponse
    {
        parent::parse($obj);
        dd($obj->NonExistingWaybills);
        if ($result = $obj->TrackingResults->KeyValueOfstringArrayOfTrackingResult) {
            $this->addResult(TrackingResult::parse($result));
        }

        return $this;
    }

    /**
     * @param object $obj
     * @return ShipmentTrackingResponse
     */
    public static function make($obj): ShipmentTrackingResponse
    {
        return (new self())->parse($obj);
    }
}