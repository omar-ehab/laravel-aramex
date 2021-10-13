<?php

namespace OmarEhab\Aramex\API\Requests\Shipping;

use Exception;
use OmarEhab\Aramex\API\Classes\LabelInfo;
use OmarEhab\Aramex\API\Classes\Shipment;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Shipping\ShipmentCreationResponse;

/**
 * This method allows users to create shipments on Aramex’s system.
 * The required nodes to be filled are: Client Info and Shipments.
 *
 * Class ShipmentCreation
 * @package OmarEhab\Aramex\API\Requests
 */
class CreateShipments extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';

    private $shipments;
    private $labelInfo;

    /**
     * @return ShipmentCreationResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return ShipmentCreationResponse::make($this->soapClient->CreateShipments($this->normalize()));
    }

    protected function validate()
    {
        parent::validate();

        if (!$this->shipments) {
            throw new Exception('Shipments are not provided');
        }
    }

    /**
     * @return Shipment[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @param Shipment[] $shipments
     * @return CreateShipments
     */
    public function setShipments(array $shipments)
    {
        $this->shipments = $shipments;
        return $this;
    }

    /**
     * @param Shipment $shipment
     * @return CreateShipments
     */
    public function addShipment(Shipment $shipment)
    {
        $this->shipments[] = $shipment;
        return $this;
    }

    /**
     * @return LabelInfo|null
     */
    public function getLabelInfo()
    {
        return $this->labelInfo;
    }

    /**
     * @param LabelInfo $labelInfo
     * @return CreateShipments
     */
    public function setLabelInfo(LabelInfo $labelInfo)
    {
        $this->labelInfo = $labelInfo;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'Shipments' => $this->getShipments() ? array_map(function ($item) {
                return $item->normalize();
            }, $this->getShipments()) : [],
            'LabelInfo' => optional($this->getLabelInfo())->normalize(),
        ], parent::normalize());
    }
}