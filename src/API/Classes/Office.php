<?php


namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * Fields – Entity, Entity  Description, Office Type, Address, Telephone, Working Hours, Working Days, Longitude, Latitude.
 *
 * Class Address
 * @package OmarEhab\Aramex\API\Classes
 */
class Office implements Normalize
{
    private string $entity;
    private string $entityDescription;
    private string $officeType;
    private Address $address;
    private ?string $telephone;
    private string $workingDays;
    private string $workingHours;
    private ?float $longitude;
    private ?float $latitude;

    /**
     * @return string
     */
    public function getEntity(): string
    {
        return $this->entity;
    }

    /**
     * @param string $entity
     * @return Office
     */
    public function setEntity(string $entity): Office
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntityDescription(): string
    {
        return $this->entityDescription;
    }

    /**
     * @param string $entityDescription
     * @return Office
     */
    public function setEntityDescription(string $entityDescription): Office
    {
        $this->entityDescription = $entityDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getOfficeType(): string
    {
        return $this->officeType;
    }

    /**
     * @param string $officeType
     * @return Office
     */
    public function setOfficeType(string $officeType): Office
    {
        $this->officeType = $officeType;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Office
     */
    public function setAddress(Address $address): Office
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param string|null $telephone
     * @return Office
     */
    public function setTelephone(?string $telephone): Office
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkingDays(): string
    {
        return $this->workingDays;
    }

    /**
     * @param string $workingDays
     * @return Office
     */
    public function setWorkingDays(string $workingDays): Office
    {
        $this->workingDays = $workingDays;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkingHours(): string
    {
        return $this->workingHours;
    }

    /**
     * @param string $workingHours
     * @return Office
     */
    public function setWorkingHours(string $workingHours): Office
    {
        $this->workingHours = $workingHours;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     * @return Office
     */
    public function setLongitude(float $longitude): Office
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Office
     */
    public function setLatitude(float $latitude): Office
    {
        $this->latitude = $latitude;
        return $this;
    }


    public function normalize(): array
    {
        return [
            'Entity' => $this->getEntity(),
            'EntityDescription' => $this->getEntityDescription(),
            'OfficeType' => $this->getOfficeType(),
            'Address' => $this->getAddress()->normalize(),
            'Telephone' => $this->getTelephone(),
            'WorkingDays' => $this->getWorkingDays(),
            'WorkingHours' => $this->getWorkingHours(),
            'Longitude' => $this->getLongitude(),
            'Latitude' => $this->getLatitude(),
        ];
    }
}