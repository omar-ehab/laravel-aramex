<?php


namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

class DateTime implements Normalize
{
    private DateTime $shippingDate;
    private DateTime $dueDate;

    /**
     * @return DateTime
     */
    public function getShippingDate(): DateTime
    {
        return $this->shippingDate;
    }

    /**
     * The date Aramex receives the shipment to be shipped out.
     * @param mixed $shippingDate
     * @return DateTime
     */
    public function setShippingDate($shippingDate): DateTime
    {
        $this->shippingDate = $shippingDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }

    /**
     * The date specified for shipment to be delivered to the consignee.
     * @param mixed $dueDate
     * @return DateTime
     */
    public function setDueDate($dueDate): DateTime
    {
        $this->dueDate = $dueDate;
        return $this;
    }


    public function normalize(): array
    {
        return [
            'ShippingDate' => $this->getShippingDate(),
            'DueDate' => $this->getDueDate(),
        ];
    }
}