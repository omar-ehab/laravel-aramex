<?php

namespace OmarEhab\Aramex\API\Requests\Tracking;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Tracking\PickupTrackingResponse;

/**
 * This method allows the user to track an existing pickup’s updates and latest status.
 *
 * Class TrackPickup
 * @package OmarEhab\Aramex\API\Requests\Tracking
 */
class TrackPickup extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/tracking/Service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/ShippingAPI.V2/tracking/Service_1_0.svc?wsdl';

    private array $shipments;
    private string $reference;
    private $pickup;

    /**
     * @return PickupTrackingResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return PickupTrackingResponse::make($this->soapClient->TrackPickup($this->normalize()));
    }

    protected function validate()
    {
        if (!$this->reference) {
            throw new Exception('Reference is not provided');
        }

        if (!$this->pickup) {
            throw new Exception('Pickup is not provided');
        }
    }

    /**
     * @return array
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @param array $shipments
     * @return TrackPickup
     */
    public function setShipments(array $shipments)
    {
        $this->shipments = $shipments;
        return $this;
    }

    /**
     * @param string $shipment
     * @return TrackPickup
     */
    public function addShipment(string $shipment)
    {
        $this->shipments[] = $shipment;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     * @return TrackPickup
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * @param mixed $pickup
     * @return TrackPickup
     */
    public function setPickup($pickup)
    {
        $this->pickup = $pickup;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'Shipments' => $this->getShipments(),
            'Reference' => $this->getReference(),
            'Pickup' => $this->getPickup(),
        ], parent::normalize());
    }

}