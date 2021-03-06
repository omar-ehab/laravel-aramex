<?php

namespace OmarEhab\Aramex\API\Response\Tracking;

use Exception;
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
     * @param $result
     * @return ShipmentTrackingResponse
     */
    public function addResult($result): ShipmentTrackingResponse
    {
        $this->results[$result['key']] = $result['value'];
        return $this;
    }

    /**
     * @param $obj
     * @return ShipmentTrackingResponse
     * @throws Exception
     */
    protected function parse($obj): ShipmentTrackingResponse
    {
        parent::parse($obj);
        try {
            if (property_exists($obj->TrackingResults, 'KeyValueOfstringArrayOfTrackingResultmFAkxlpY') && $result = $obj->TrackingResults->KeyValueOfstringArrayOfTrackingResultmFAkxlpY) {
                if(is_array($result)) {
                    foreach ($result as $res) {
                        $results = [];
                        foreach ($res->Value->TrackingResult as $trackingResult) {
                            array_push($results, TrackingResult::parse($trackingResult));
                        }
                        $this->addResult(["key" => $res->Key, "value" => $results]);
                    }
                } else {
                    $results = [];
                    if(is_array($result->Value->TrackingResult)) {
                        foreach ($result->Value->TrackingResult as $trackingResult) {
                            array_push($results, TrackingResult::parse($trackingResult));
                        }
                    } else {
                        array_push($results, TrackingResult::parse($result->Value->TrackingResult));
                    }
                    $this->addResult(["key" => $result->Key, "value" => $results]);
                }
            }
            return $this;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param object $obj
     * @return ShipmentTrackingResponse
     * @throws Exception
     */
    public static function make($obj): ShipmentTrackingResponse
    {
        try {
            return (new self())->parse($obj);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}