<?php


namespace OmarEhab\Aramex\API\Classes;

/**
 * Returns the shipment’s updates in the form of unique records,
 * with the tracking result elements as fields
 *
 * Class TrackingResult
 * @package OmarEhab\Aramex\API\Classes
 */
class TrackingResult
{
    private string $waybillNumber;
    private string $updateCode;
    private string $updateDescription;
    private string $updateDateTime;
    private string $updateLocation;
    private ?string $comments;
    private ?string $problemCode;
    private float $grossWeight;
    private float $chargeableWeight;
    private string $weightUnit;

    /**
     * @return string
     */
    public function getWaybillNumber(): string
    {
        return $this->waybillNumber;
    }

    /**
     * @param string $waybillNumber
     * @return TrackingResult
     */
    public function setWaybillNumber(string $waybillNumber): TrackingResult
    {
        $this->waybillNumber = $waybillNumber;
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
     * @return $this
     */
    public function setUpdateCode(string $updateCode): TrackingResult
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
     * @return $this
     */
    public function setUpdateDescription(string $updateDescription): TrackingResult
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
     * @return $this
     */
    public function setUpdateDateTime(string $updateDateTime): TrackingResult
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
     * @return $this
     */
    public function setUpdateLocation(string $updateLocation): TrackingResult
    {
        $this->updateLocation = $updateLocation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComments(): ?string
    {
        return $this->comments;
    }

    /**
     * @param string|null $comments
     * @return $this
     */
    public function setComments(string $comments): TrackingResult
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProblemCode(): ?string
    {
        return $this->problemCode;
    }

    /**
     * @param string|null $problemCode
     * @return $this
     */
    public function setProblemCode(string $problemCode): TrackingResult
    {
        $this->problemCode = $problemCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getGrossWeight(): float
    {
        return $this->grossWeight;
    }

    /**
     * @param float $grossWeight
     * @return $this
     */
    public function setGrossWeight(float $grossWeight): TrackingResult
    {
        $this->grossWeight = $grossWeight;
        return $this;
    }

    /**
     * @return float
     */
    public function getChargeableWeight(): float
    {
        return $this->chargeableWeight;
    }

    /**
     * @param float $chargeableWeight
     * @return $this
     */
    public function setChargeableWeight(float $chargeableWeight): TrackingResult
    {
        $this->chargeableWeight = $chargeableWeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeightUnit(): ?string
    {
        return $this->weightUnit;
    }

    /**
     * @param string $weightUnit
     * @return $this
     */
    public function setWeightUnit(string $weightUnit): TrackingResult
    {
        $this->weightUnit = $weightUnit;
        return $this;
    }

    /**
     * @param object $obj
     * @return TrackingResult
     */
    public static function parse(object $obj): TrackingResult
    {
        return (new self())
            ->setWaybillNumber($obj->WaybillNumber)
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

    public function normalize(): array
    {
        return [
            'WaybillNumber' => $this->getWaybillNumber(),
            'UpdateCode' => $this->getUpdateCode(),
            'UpdateDescription' => $this->getUpdateDescription(),
            'UpdateDateTime' => $this->getUpdateDateTime(),
            'UpdateLocation' => $this->getUpdateLocation(),
            'Comments' => $this->getComments(),
            'ProblemCode' => $this->getProblemCode(),
            'GrossWeight' => $this->getGrossWeight(),
            'ChargeableWeight' => $this->getChargeableWeight(),
            'WeightUnit' => $this->getWeightUnit(),
        ];
    }

}