<?php

namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * Dimensions is a complex element, consisting of four child elements (Unit, Length, Width and Height).
 * These apply to every element that is defined by the Data Type “Dimensions“.
 *
 * Class Dimension
 * @package OmarEhab\Aramex\API\Classes
 */
class Dimension implements Normalize
{
    private float $length;
    private float $width;
    private float $height;
    private string $unit;

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * Measurements required in calculating the Chargeable Weight, If any of the Dimensional values are filled then the rest must be filled.
     * @param float $length
     * @return Dimension
     */
    public function setLength(float $length): Dimension
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * Measurements required in calculating the Chargeable Weight, If any of the Dimensional values are filled then the rest must be filled.
     * @param float $width
     * @return Dimension
     */
    public function setWidth(float $width): Dimension
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * Measurements required in calculating the Chargeable Weight, If any of the Dimensional values are filled then the rest must be filled.
     * @param float $height
     * @return Dimension
     */
    public function setHeight(float $height): Dimension
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * Measurement Unit, If any of the Dimensional values are filled then the rest must be filled.
     * CM = Centimeter
     * M = Meter
     * @param string $unit
     * @return Dimension
     */
    public function setUnit(string $unit): Dimension
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * Centimeter
     * @return Dimension
     */
    public function useCentimeterAsUnit(): Dimension
    {
        $this->setUnit('CM');
        return $this;
    }

    /**
     * Meter
     * @return Dimension
     */
    public function useMeterAsUnit(): Dimension
    {
        $this->setUnit('M');
        return $this;
    }

    public function normalize(): array
    {
        return [
            'Length' => $this->getLength(),
            'Width' => $this->getWidth(),
            'Height' => $this->getHeight(),
            'Unit' => $this->getUnit()
        ];
    }
}