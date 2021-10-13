<?php

namespace OmarEhab\Aramex\API\Requests\Shipping;

use Exception;
use OmarEhab\Aramex\API\Classes\Address;
use OmarEhab\Aramex\API\Classes\ScheduledDelivery;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Shipping\ScheduledDeliveryResponse;

/**
 * This method allows you to schedule the delivery of a shipment at a specified time and place (Longitude and Latitude)
 *
 * Class ScheduledDelivery
 * @package OmarEhab\Aramex\API\Requests
 */
class ScheduleDelivery extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';

    private $address;
    private $scheduledDelivery;
    private $shipmentNumber;
    private $productGroup;
    private $entity;
    private $consigneePhone;
    private $shipperNumber;
    private $shipperReference;
    private $reference1;
    private $reference2;
    private $reference3;

    /**
     * @return ScheduledDeliveryResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return ScheduledDeliveryResponse::make($this->soapClient->ScheduleDelivery($this->normalize()));
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return ScheduleDelivery
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return ScheduledDelivery
     */
    public function getScheduledDelivery()
    {
        return $this->scheduledDelivery;
    }

    /**
     * @param ScheduledDelivery $scheduledDelivery
     * @return ScheduleDelivery
     */
    public function setScheduledDelivery(ScheduledDelivery $scheduledDelivery)
    {
        $this->scheduledDelivery = $scheduledDelivery;
        return $this;
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
     * @return ScheduleDelivery
     */
    public function setShipmentNumber(string $shipmentNumber)
    {
        $this->shipmentNumber = $shipmentNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductGroup()
    {
        return $this->productGroup;
    }

    /**
     * @param string $productGroup
     * @return ScheduleDelivery
     */
    public function setProductGroup(string $productGroup)
    {
        $this->productGroup = $productGroup;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param string $entity
     * @return ScheduleDelivery
     */
    public function setEntity(string $entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsigneePhone()
    {
        return $this->consigneePhone;
    }

    /**
     * @param string $consigneePhone
     * @return ScheduleDelivery
     */
    public function setConsigneePhone(string $consigneePhone)
    {
        $this->consigneePhone = $consigneePhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipperNumber()
    {
        return $this->shipperNumber;
    }

    /**
     * @param string $shipperNumber
     * @return ScheduleDelivery
     */
    public function setShipperNumber(string $shipperNumber)
    {
        $this->shipperNumber = $shipperNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipperReference()
    {
        return $this->shipperReference;
    }

    /**
     * @param string $shipperReference
     * @return ScheduleDelivery
     */
    public function setShipperReference(string $shipperReference)
    {
        $this->shipperReference = $shipperReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference1()
    {
        return $this->reference1;
    }

    /**
     * @param string $reference1
     * @return ScheduleDelivery
     */
    public function setReference1(string $reference1)
    {
        $this->reference1 = $reference1;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference2()
    {
        return $this->reference2;
    }

    /**
     * @param string $reference2
     * @return ScheduleDelivery
     */
    public function setReference2(string $reference2)
    {
        $this->reference2 = $reference2;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference3()
    {
        return $this->reference3;
    }

    /**
     * @param string $reference3
     * @return ScheduleDelivery
     */
    public function setReference3(string $reference3)
    {
        $this->reference3 = $reference3;
        return $this;
    }
}