<?php

namespace OmarEhab\Aramex\API\Response\Shipping;

use OmarEhab\Aramex\API\Response\Response;

/**
 * Returns a reference ID of the scheduled delivery.
 *
 * Class ScheduledDeliveryResponse
 * @package OmarEhab\Aramex\API\Response
 */
class ScheduledDeliveryResponse extends Response
{
    private int $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ScheduledDeliveryResponse
     */
    public function setId(int $id): ScheduledDeliveryResponse
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @param object $obj
     * @return ScheduledDeliveryResponse
     */
    protected function parse($obj): ScheduledDeliveryResponse
    {
        parent::parse($obj);

        return $this;
    }

    /**
     * @param object $obj
     * @return ScheduledDeliveryResponse
     */
    public static function make($obj): ScheduledDeliveryResponse
    {
        return (new self())->parse($obj);
    }
}