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
            if ($result = $obj->TrackingResults->KeyValueOfstringArrayOfTrackingResultmFAkxlpY) {
                if(is_array($result)){
                    foreach ($result as $res) {
                        $results = [];
                        foreach ($res->Value->TrackingResult as $trackingResult) {
                            array_push($results, TrackingResult::parse($trackingResult));
                        }
                        $this->addResult(["key" => $res->Key, "value" => $results]);
                    }
                } else {
                    $this->addResult(["key" => $result->Key, "value" => TrackingResult::parse($result->Value->TrackingResult)]);
                }
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
//            if($obj->NonExistingWaybills->count()) {
//                throw new Exception("there is no shipments with numbers: " . $obj->NonExistingWaybills->first()->string);
//            }
        }


        return $this;
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