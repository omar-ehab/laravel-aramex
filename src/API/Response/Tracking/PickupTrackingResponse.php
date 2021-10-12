<?php

namespace OmarEhab\Aramex\API\Response\Tracking;

use OmarEhab\Aramex\API\Response\Response;

class PickupTrackingResponse extends Response
{
    private string $entity;
    private string $reference;
    private string $collectionDate;
    private string $pickupDate;
    private string $lastStatus;
    private string $lastStatusDescription;
    private string $collectedWaybills;

    /**
     * @return string
     */
    public function getEntity(): string
    {
        return $this->entity;
    }

    /**
     * @param string $entity
     * @return PickupTrackingResponse
     */
    public function setEntity(string $entity): PickupTrackingResponse
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return PickupTrackingResponse
     */
    public function setReference(string $reference): PickupTrackingResponse
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollectionDate(): string
    {
        return $this->collectionDate;
    }

    /**
     * @param string $collectionDate
     * @return PickupTrackingResponse
     */
    public function setCollectionDate(string $collectionDate): PickupTrackingResponse
    {
        $this->collectionDate = $collectionDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupDate(): string
    {
        return $this->pickupDate;
    }

    /**
     * @param string $pickupDate
     * @return PickupTrackingResponse
     */
    public function setPickupDate(string $pickupDate): PickupTrackingResponse
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastStatus(): string
    {
        return $this->lastStatus;
    }

    /**
     * @param string $lastStatus
     * @return PickupTrackingResponse
     */
    public function setLastStatus(string $lastStatus): PickupTrackingResponse
    {
        $this->lastStatus = $lastStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastStatusDescription(): string
    {
        return $this->lastStatusDescription;
    }

    /**
     * @param string $lastStatusDescription
     * @return PickupTrackingResponse
     */
    public function setLastStatusDescription(string $lastStatusDescription): PickupTrackingResponse
    {
        $this->lastStatusDescription = $lastStatusDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollectedWaybills(): string
    {
        return $this->collectedWaybills;
    }

    /**
     * @param string $collectedWaybills
     * @return PickupTrackingResponse
     */
    public function setCollectedWaybills(string $collectedWaybills): PickupTrackingResponse
    {
        $this->collectedWaybills = $collectedWaybills;
        return $this;
    }

    /**
     * @param object $obj
     * @return PickupTrackingResponse
     */
    protected function parse($obj): PickupTrackingResponse
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
    public static function make($obj): PickupTrackingResponse
    {
        return (new self())->parse($obj);
    }
}