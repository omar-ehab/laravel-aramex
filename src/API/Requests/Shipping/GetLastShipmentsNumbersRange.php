<?php

namespace OmarEhab\Aramex\API\Requests\Shipping;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Shipping\LastReservedShipmentNumberRangeResponse;

/**
 * This method allows you to inquire about the last reserved range using a specific entity and product group
 *
 * Class LastReserveShipmentNumberRange
 * @package OmarEhab\Aramex\API\Requests
 */
class GetLastShipmentsNumbersRange extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';

    private $entity;
    private $productGroup;

    /**
     * @return LastReservedShipmentNumberRangeResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return LastReservedShipmentNumberRangeResponse::make($this->soapClient->GetLastShipmentsNumbersRange($this->normalize()));
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
     * @param string $entity
     * @return GetLastShipmentsNumbersRange
     */
    public function setEntity(string $entity): GetLastShipmentsNumbersRange
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
     * @param string $productGroup
     * @return GetLastShipmentsNumbersRange
     */
    public function setProductGroup(string $productGroup)
    {
        $this->productGroup = $productGroup;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'Entity' => $this->getEntity(),
            'ProductGroup' => $this->getProductGroup()
        ], parent::normalize());
    }
}