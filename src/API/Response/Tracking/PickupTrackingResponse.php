<?php

namespace OmarEhab\Aramex\API\Response\Tracking;

use OmarEhab\Aramex\API\Response\Response;

class PickupTrackingResponse extends Response
{
    private $entity;
    private $reference;
    private $collectionDate;
    private $pickupDate;
    private $lastStatus;
    private $lastStatusDescription;
    private $collectedWaybills;

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param string $entity
     * @return PickupTrackingResponse
     */
    public function setEntity(string $entity)
    {
        $this->entity = $entity;
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
     * @param string $reference
     * @return PickupTrackingResponse
     */
    public function setReference(string $reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollectionDate()
    {
        return $this->collectionDate;
    }

    /**
     * @param string $collectionDate
     * @return PickupTrackingResponse
     */
    public function setCollectionDate(string $collectionDate)
    {
        $this->collectionDate = $collectionDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * @param string $pickupDate
     * @return PickupTrackingResponse
     */
    public function setPickupDate(string $pickupDate)
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastStatus()
    {
        return $this->lastStatus;
    }

    /**
     * @param string $lastStatus
     * @return PickupTrackingResponse
     */
    public function setLastStatus(string $lastStatus)
    {
        $this->lastStatus = $lastStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastStatusDescription()
    {
        return $this->lastStatusDescription;
    }

    /**
     * @param string $lastStatusDescription
     * @return PickupTrackingResponse
     */
    public function setLastStatusDescription(string $lastStatusDescription)
    {
        $this->lastStatusDescription = $lastStatusDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollectedWaybills()
    {
        return $this->collectedWaybills;
    }

    /**
     * @param string $collectedWaybills
     * @return PickupTrackingResponse
     */
    public function setCollectedWaybills(string $collectedWaybills)
    {
        $this->collectedWaybills = $collectedWaybills;
        return $this;
    }

    /**
     * @param object $obj
     * @return PickupTrackingResponse
     */
    protected function parse($obj)
    {
        parent::parse($obj);

        $this
            ->setEntity($obj->Entity)
            ->setReference($obj->Reference)
            ->setCollectionDate($obj->CollectionDate)
            ->setPickupDate($obj->PickupDate)
            ->setLastStatus($obj->LastStatus)
            ->setLastStatusDescription($obj->LastStatusDescription)
            ->setCollectedWaybills($obj->CollectedWaybills);

        return $this;
    }

    /**
     * @param object $obj
     * @return PickupTrackingResponse
     */
    public static function make($obj)
    {
        return (new self())->parse($obj);
    }
}