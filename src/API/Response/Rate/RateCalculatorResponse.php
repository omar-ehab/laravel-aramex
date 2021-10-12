<?php

namespace OmarEhab\Aramex\API\Response\Rate;

use OmarEhab\Aramex\API\Classes\Money;
use OmarEhab\Aramex\API\Response\Response;

class RateCalculatorResponse extends Response
{
    private Money $totalAmount;

    /**
     * @return Money
     */
    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    /**
     * @param Money $totalAmount
     * @return $this
     */
    public function setTotalAmount(Money $totalAmount): RateCalculatorResponse
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @param object $obj
     * @return RateCalculatorResponse
     */
    protected function parse($obj): RateCalculatorResponse
    {
        parent::parse($obj);

        $this->setTotalAmount(Money::parse($obj->TotalAmount));

        return $this;
    }

    /**
     * @param object $obj
     * @return RateCalculatorResponse
     */
    public static function make($obj): RateCalculatorResponse
    {
        return (new self())->parse($obj);
    }
}