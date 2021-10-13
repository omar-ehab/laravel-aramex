<?php

namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * Money is a complex element, consisting of two child elements (Currency Code and Value).
 * These apply to every element that is defined by the Data Type “Money“.
 *
 * Class Money
 * @package OmarEhab\Aramex\API\Classes
 */
class Money implements Normalize
{
    private string $currencyCode;
    private float $value;

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * 3-Letter Standard ISO Currency Code
     * @param string $currencyCode
     * @return $this
     */
    public function setCurrencyCode(string $currencyCode): Money
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * United States Dollar
     * @return Money
     */
    public function useUnitedStatesDollarAsCurrency(): Money
    {
        $this->setCurrencyCode('USD');
        return $this;
    }

    /**
     * Kuwaiti Dinar
     * @return Money
     */
    public function useKuwaitiDinarAsCurrency(): Money
    {
        $this->setCurrencyCode('KWD');
        return $this;
    }

    /**
     * Saudi Riyal
     * @return Money
     */
    public function useSaudiRiyalAsCurrency(): Money
    {
        $this->setCurrencyCode('SAR');
        return $this;
    }

    /**
     * Egyptian Pound
     * @return Money
     */
    public function useEgyptianPoundAsCurrency(): Money
    {
        $this->setCurrencyCode('EGP');
        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * The Monetary value.
     * @param float $value
     * @return Money
     */
    public function setValue(float $value): Money
    {
        $this->value = $value;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'CurrencyCode' => $this->getCurrencyCode(),
            'Value' => $this->getValue()
        ];
    }

    /**
     * @param object $obj
     * @return Money
     */
    public static function parse($obj): Money
    {
        if (!$obj)
            return new self();

        return (new self())->setCurrencyCode(object_get($obj, "CurrencyCode"))->setValue(object_get($obj, "Value"));
    }
}