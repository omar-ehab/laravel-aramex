<?php

namespace OmarEhab\Aramex\API\Response\Shipping;

use OmarEhab\Aramex\API\Classes\Notification;
use OmarEhab\Aramex\API\Classes\Shipment;
use OmarEhab\Aramex\API\Response\Response;

/**
 * Informs the user on the status of their submitted shipment.
 * Success = an AWB number is supplied
 * Failure = an error message specifically states the location of the error and its nature.
 * The Transaction Parameter is sent as filled in the request for identification purposes.
 *
 * Class ShipmentCreationResponse
 * @package OmarEhab\Aramex\API\Response
 */
class ShipmentCreationResponse extends Response
{
    private array $shipments;

    /**
     * @return Shipment[]
     */
    public function getShipments(): array
    {
        return $this->shipments;
    }


    public function setShipments(array $shipments): ShipmentCreationResponse
    {
        $this->shipments = $shipments;
        return $this;
    }

    /**
     * @param object $obj
     * @return ShipmentCreationResponse
     */
    protected function parse($obj): ShipmentCreationResponse
    {
        parent::parse($obj);

        if ($obj->Shipments->ProcessedShipment->Notifications) {
            $newNotifications = Notification::parseArray($obj->Shipments->ProcessedShipment->Notifications);
            if ($newNotifications) {
                $this->setHasErrors(true)
                    ->addNotifications($newNotifications);
            }
        }

        $this->setShipments([$obj->Shipments->ProcessedShipment]);

        return $this;
    }

    /**
     * @param object $obj
     * @return ShipmentCreationResponse
     */
    public static function make($obj): ShipmentCreationResponse
    {
        return (new self())->parse($obj);
    }
}