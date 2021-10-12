<?php

namespace OmarEhab\Aramex\API\Response\Shipping;

use OmarEhab\Aramex\API\Response\Response;

/**
 * Returns the assigned Waybill range to be used.
 *
 * Class ReserveRangeResponse
 * @package OmarEhab\Aramex\API\Response
 */
class ReserveRangeResponse extends Response
{
    private string $fromWayBill;
    private string $toWayBill;

    /**
     * @return string
     */
    public function getFromWayBill(): string
    {
        return $this->fromWayBill;
    }

    /**
     * @param string $fromWayBill
     * @return ReserveRangeResponse
     */
    public function setFromWayBill(string $fromWayBill): ReserveRangeResponse
    {
        $this->fromWayBill = $fromWayBill;
        return $this;
    }

    /**
     * @return string
     */
    public function getToWayBill(): string
    {
        return $this->toWayBill;
    }

    /**
     * @param string $toWayBill
     * @return ReserveRangeResponse
     */
    public function setToWayBill(string $toWayBill): ReserveRangeResponse
    {
        $this->toWayBill = $toWayBill;
        return $this;
    }


    /**
     * @param object $obj
     * @return ReserveRangeResponse
     */
    protected function parse($obj): ReserveRangeResponse
    {
        parent::parse($obj);

        $this->setFromWayBill($obj->FromWaybill);
        $this->setToWayBill($obj->ToWaybill);

        return $this;
    }

    /**
     * @param object $obj
     * @return ReserveRangeResponse
     */
    public static function make($obj): ReserveRangeResponse
    {
        return (new self())->parse($obj);
    }
}