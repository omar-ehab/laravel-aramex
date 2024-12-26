<?php

namespace OmarEhab\Aramex\API\Requests\Shipping;

use Exception;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Shipping\PickupCancellationResponse;

/**
 * This method allows you to cancel a pickup as long as it is un-assigned or pending details.
 *
 * Class PickupCancellation
 * @package OmarEhab\Aramex\API\Requests
 */
class CancelPickup extends API implements Normalize
{
    private $pickupGUID;
    private $comments;

    /**
     * @return PickupCancellationResponse
     * @throws Exception
     */
    public function run()
    {
        $this->endpoint = config("aramex.{$this->environment}_endpoints.shipping");

        $this->validate();

        return PickupCancellationResponse::make($this->soapClient->CancelPickup($this->normalize()));
    }

    /**
     * @throws Exception
     */
    protected function validate()
    {
        parent::validate();

        if (!$this->pickupGUID) {
            throw new Exception('PickupGUID Not Provided');
        }
    }

    /**
     * @return string
     */
    public function getPickupGUID()
    {
        return $this->pickupGUID;
    }

    /**
     * @param string $pickupGUID
     * @return CancelPickup
     */
    public function setPickupGUID(string $pickupGUID)
    {
        $this->pickupGUID = $pickupGUID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string|null $comments
     * @return CancelPickup
     */
    public function setComments(string $comments = null)
    {
        $this->comments = $comments;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'PickupGUID' => $this->getPickupGUID(),
            'Comments' => $this->getComments(),
        ], parent::normalize());
    }
}