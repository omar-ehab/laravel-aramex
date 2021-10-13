<?php

namespace OmarEhab\Aramex\API\Requests\Shipping;

use Exception;
use OmarEhab\Aramex\API\Classes\LabelInfo;
use OmarEhab\Aramex\API\Classes\Pickup;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Shipping\PickupCreationResponse;

/**
 * This method allows users to create a pickup request.
 * The nodes required to be filled are as follows: ClientInfo and Pickup.
 *
 * Class PickupCreation
 * @package OmarEhab\Aramex\API\Requests
 */
class CreatePickup extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';

    private $pickup;
    private $labelInfo;

    /**
     * @return PickupCreationResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return PickupCreationResponse::make($this->soapClient->CreatePickup($this->normalize()));
    }

    /**
     * @return Pickup
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * @param Pickup $pickup
     * @return CreatePickup
     */
    public function setPickup(Pickup $pickup)
    {
        $this->pickup = $pickup;
        return $this;
    }

    /**
     * @return LabelInfo|null
     */
    public function getLabelInfo()
    {
        return $this->labelInfo;
    }

    /**
     * @param LabelInfo $labelInfo
     * @return CreatePickup
     */
    public function setLabelInfo(LabelInfo $labelInfo)
    {
        $this->labelInfo = $labelInfo;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'Pickup' => $this->getPickup()->normalize(),
            'LabelInfo' => optional($this->getLabelInfo())->normalize(),
        ], parent::normalize());
    }
}