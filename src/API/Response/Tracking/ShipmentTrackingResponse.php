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
     * @param TrackingResult $result
     * @return ShipmentTrackingResponse
     */
    public function addResult(TrackingResult $result): ShipmentTrackingResponse
    {
        $this->results[] = $result;
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
                        $this->addResult(TrackingResult::parse($res));
                    }
                } else {
                    $this->addResult(TrackingResult::parse($result));
                }
            }
        } catch (Exception $e) {
            if($obj->NonExistingWaybills->count()) {
                throw new Exception("there is no shipments with numbers: " . $obj->NonExistingWaybills->first()->string);
            }
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