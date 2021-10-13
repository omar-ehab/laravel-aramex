<?php

namespace OmarEhab\Aramex\API\Requests\Shipping;

use Exception;
use OmarEhab\Aramex\API\Classes\LabelInfo;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Shipping\LabelPrintingResponse;

/**
 * This method allows the user to print a label for an existing shipment.
 *
 * The required nodes to be filled are ClientInfo and ShipmentNumber.
 * If there is a duplicate Shipment Number then the ProductGroup and Origin Entity elements are required.
 *
 * Class PrintLabel
 * @package OmarEhab\Aramex\API\Requests
 */
class PrintLabel extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';

    private $shipmentNumber;
    private $productGroup;
    private $originEntity;
    private $labelInfo;

    /**
     * @return LabelPrintingResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return LabelPrintingResponse::make($this->soapClient->PrintLabel($this->normalize()));
    }

    /**
     * @throws Exception
     */
    protected function validate()
    {
        parent::validate();

        if (!$this->shipmentNumber) {
            throw new Exception('Shipment Number Not Provided');
        }

        if (!$this->labelInfo) {
            throw new Exception('Label Info Not Provided');
        }
    }

    /**
     * @return string
     */
    public function getShipmentNumber()
    {
        return $this->shipmentNumber;
    }

    /**
     * @param string $shipmentNumber
     * @return PrintLabel
     */
    public function setShipmentNumber(string $shipmentNumber)
    {
        $this->shipmentNumber = $shipmentNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductGroup()
    {
        return $this->productGroup;
    }

    /**
     * @param string|null $productGroup
     * @return PrintLabel
     */
    public function setProductGroup(string $productGroup = null)
    {
        $this->productGroup = $productGroup;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOriginEntity()
    {
        return $this->originEntity;
    }

    /**
     * @param string|null $originEntity
     * @return PrintLabel
     */
    public function setOriginEntity(string $originEntity = null)
    {
        $this->originEntity = $originEntity;
        return $this;
    }

    /**
     * @return LabelInfo
     */
    public function getLabelInfo()
    {
        return $this->labelInfo;
    }

    /**
     * @param LabelInfo $labelInfo
     * @return PrintLabel
     */
    public function setLabelInfo(LabelInfo $labelInfo)
    {
        $this->labelInfo = $labelInfo;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'ShipmentNumber' => $this->getShipmentNumber(),
            'ProductGroup' => $this->getProductGroup(),
            'OriginEntity' => $this->getOriginEntity(),
            'LabelInfo' => optional($this->getLabelInfo())->normalize(),
        ], parent::normalize());
    }
}