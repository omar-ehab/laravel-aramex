<?php

namespace OmarEhab\Aramex\API\Requests\Tracking;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Tracking\ShipmentTrackingResponse;

/**
 * This method allows the user to track an existing shipment’s updates and latest status.
 *
 * Class TrackShipments
 * @package OmarEhab\Aramex\API\Requests\Tracking
 */
class TrackShipments extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/tracking/Service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/ShippingAPI.V2/tracking/Service_1_0.svc?wsdl';

    private $shipments;
    private $getLastTrackingUpdateOnly;

    /**
     * @return ShipmentTrackingResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return ShipmentTrackingResponse::make($this->soapClient->TrackShipments($this->normalize()));
    }

    protected function validate()
    {
        parent::validate();

        if (!$this->shipments) {
            throw new Exception('Shipments are not provided');
        }
    }

    /**
     * @return bool
     */
    public function getGetLastTrackingUpdateOnly()
    {
        return $this->getLastTrackingUpdateOnly;
    }

    /**
     * @param bool|null $getLastTrackingUpdateOnly
     * @return TrackShipments
     */
    public function setGetLastTrackingUpdateOnly(bool $getLastTrackingUpdateOnly)
    {
        $this->getLastTrackingUpdateOnly = $getLastTrackingUpdateOnly;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @param string[] $shipments
     * @return TrackShipments
     */
    public function setShipments(array $shipments)
    {
        $this->shipments = $shipments;
        return $this;
    }

    /**
     * @param string $shipment
     * @return TrackShipments
     */
    public function addShipment(string $shipment)
    {
        $this->shipments[] = $shipment;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'Shipments' => $this->getShipments(),
            'GetLastTrackingUpdateOnly' => $this->getGetLastTrackingUpdateOnly()
        ], parent::normalize());
    }

}