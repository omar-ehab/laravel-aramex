<?php


namespace OmarEhab\Aramex\API\Classes;


class Track
{
    private string $id;
    private string $updateCode;
    private string $updateDescription;
    private string $updateDateTime;
    private string $updateLocation;
    private string $comments;
    private string $problemCode;
    private string $grossWeight;
    private string $chargeableWeight;
    private string $weightUnit;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Track
     */
    public function setId(string $id): Track
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdateCode(): string
    {
        return $this->updateCode;
    }

    /**
     * @param string $updateCode
     * @return Track
     */
    public function setUpdateCode(string $updateCode): Track
    {
        $this->updateCode = $updateCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdateDescription(): string
    {
        return $this->updateDescription;
    }

    /**
     * @param string $updateDescription
     * @return Track
     */
    public function setUpdateDescription(string $updateDescription): Track
    {
        $this->updateDescription = $updateDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdateDateTime(): string
    {
        return $this->updateDateTime;
    }

    /**
     * @param string $updateDateTime
     * @return Track
     */
    public function setUpdateDateTime(string $updateDateTime): Track
    {
        $this->updateDateTime = $updateDateTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdateLocation(): string
    {
        return $this->updateLocation;
    }

    /**
     * @param string $updateLocation
     * @return Track
     */
    public function setUpdateLocation(string $updateLocation): Track
    {
        $this->updateLocation = $updateLocation;
        return $this;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     * @return Track
     */
    public function setComments(string $comments): Track
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return string
     */
    public function getProblemCode(): string
    {
        return $this->problemCode;
    }

    /**
     * @param string $problemCode
     * @return Track
     */
    public function setProblemCode(string $problemCode): Track
    {
        $this->problemCode = $problemCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getGrossWeight(): string
    {
        return $this->grossWeight;
    }

    /**
     * @param string $grossWeight
     * @return Track
     */
    public function setGrossWeight(string $grossWeight): Track
    {
        $this->grossWeight = $grossWeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getChargeableWeight(): string
    {
        return $this->chargeableWeight;
    }

    /**
     * @param string $chargeableWeight
     * @return Track
     */
    public function setChargeableWeight(string $chargeableWeight): Track
    {
        $this->chargeableWeight = $chargeableWeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeightUnit(): string
    {
        return $this->weightUnit;
    }

    /**
     * @param string $weightUnit
     * @return Track
     */
    public function setWeightUnit(string $weightUnit): Track
    {
        $this->weightUnit = $weightUnit;
        return $this;
    }

    /**
     * @param object $obj
     * @return Track
     */
    public static function parse(object $obj): Track
    {
        $obj = $obj->Value->TrackingResult;

        return (new self())->setId($obj->WaybillNumber)
            ->setUpdateCode($obj->UpdateCode)
            ->setUpdateDescription($obj->UpdateDescription)
            ->setUpdateDateTime($obj->UpdateDateTime)
            ->setUpdateLocation($obj->UpdateLocation)
            ->setComments($obj->Comments)
            ->setProblemCode($obj->ProblemCode)
            ->setGrossWeight($obj->GrossWeight)
            ->setChargeableWeight($obj->ChargeableWeight)
            ->setWeightUnit($obj->WeightUnit);
    }
}