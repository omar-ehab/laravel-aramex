<?php

namespace OmarEhab\Aramex\API\Requests\Shipping;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Shipping\ReserveRangeResponse;

/**
 * This method allows you to reserve a range of shipment numbers.
 *
 * Class ReserveRange
 * @package OmarEhab\Aramex\API\Requests
 */
class ReserveShipmentNumberRange extends API implements Normalize
{
    private $entity;
    private $productGroup;
    private $count;

    /**
     * @return ReserveRangeResponse
     * @throws Exception
     */
    public function run()
    {
        $this->endpoint = config("aramex.{$this->environment}_endpoints.shipping");

        $this->validate();

        return ReserveRangeResponse::make($this->soapClient->ReserveShipmentNumberRange($this->normalize()));
    }

    /**
     * @throws Exception
     */
    protected function validate()
    {
        parent::validate();

        if (!$this->entity) {
            throw new Exception('Entity Not Provided');
        }

        if (!$this->productGroup) {
            throw new Exception('Product Group Not Provided');
        }
    }

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * This data should be provided to you from your Aramex representative.
     * Allowed Values:
     * Example: LON for London station
     *
     * @param string $entity
     * @return ReserveShipmentNumberRange
     */
    public function setEntity(string $entity)
    {
        $this->entity = $entity;
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
     * Allowed Values:
     * EXP = Express
     * DOM = Domestic
     *
     * @param string $productGroup
     * @return ReserveShipmentNumberRange
     */
    public function setProductGroup(string $productGroup)
    {
        $this->productGroup = $productGroup;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * The range of shipment numbers to be reserved and used to send CreateShipment requests
     * Allowed Values: 1-5000
     *
     * @param int $count
     * @return ReserveShipmentNumberRange
     */
    public function setCount(int $count)
    {
        $this->count = $count;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'Entity' => $this->getEntity(),
            'ProductGroup' => $this->getProductGroup(),
            'Count' => $this->getCount()
        ], parent::normalize());
    }

}