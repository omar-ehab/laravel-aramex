<?php


namespace OmarEhab\Aramex\API\Requests\Rate;

use Exception;
use OmarEhab\Aramex\API\Classes\Address;
use OmarEhab\Aramex\API\Classes\ShipmentDetails;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use OmarEhab\Aramex\API\Requests\API;
use OmarEhab\Aramex\API\Response\Rate\RateCalculatorResponse;

class CalculateRate extends API implements Normalize
{
    private $originalAddress;
    private $destinationAddress;
    private $shipmentDetails;
    private $preferredCurrencyCode;

    protected $live_wsdl = 'https://ws.aramex.net/ShippingAPI.V2/RateCalculator/Service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.dev.aramex.net/ShippingAPI.V2/RateCalculator/Service_1_0.svc?wsdl';


    /**
     * @return RateCalculatorResponse
     * @throws Exception
     */
    public function run()
    {
        $this->validate();

        return RateCalculatorResponse::make($this->soapClient->CalculateRate($this->normalize()));
    }

    protected function validate()
    {
        Parent::validate();

        if (!$this->originalAddress) {
            throw new Exception('Origin Address not provided');
        }

        if (!$this->destinationAddress) {
            throw new Exception('Destination Address not provided');
        }

        if (!$this->shipmentDetails) {
            throw new Exception('Shipment Details not provided');
        }
    }

    /**
     * @return Address
     */
    public function getOriginalAddress()
    {
        return $this->originalAddress;
    }

    /**
     * To identify the desired physical shipment origin location details
     * and validates them to be a factor in rate calculation.
     *
     * @param Address $originalAddress
     * @return $this
     */
    public function setOriginalAddress(Address $originalAddress)
    {
        $this->originalAddress = $originalAddress;
        return $this;
    }

    /**
     * @return Address
     */
    public function getDestinationAddress()
    {
        return $this->destinationAddress;
    }

    /**
     * To identify the desired shipment Destination location details
     * and validates them to be a factor in rate calculation.
     *
     * @param Address $destinationAddress
     * @return $this
     */
    public function setDestinationAddress(Address $destinationAddress)
    {
        $this->destinationAddress = $destinationAddress;
        return $this;
    }

    /**
     * @return ShipmentDetails
     */
    public function getShipmentDetails()
    {
        return $this->shipmentDetails;
    }

    /**
     * Several aspects about the shipment some required to be filled,
     * other aspects are optional if the customer wished to include extra features.
     *
     * @param ShipmentDetails $shipmentDetails
     * @return $this
     */
    public function setShipmentDetails(ShipmentDetails $shipmentDetails)
    {
        $this->shipmentDetails = $shipmentDetails;
        return $this;
    }


    /**
     * @return string
     */
    public function getPreferredCurrencyCode()
    {
        return $this->preferredCurrencyCode;
    }

    /**
     * @param string $preferredCurrencyCode
     * @return $this
     */
    public function setPreferredCurrencyCode(string $preferredCurrencyCode): CalculateRate
    {
        $this->preferredCurrencyCode = $preferredCurrencyCode;
        return $this;
    }

    public function normalize()
    {
        return array_merge([
            'OriginAddress' => $this->getOriginalAddress()->normalize(),
            'DestinationAddress' => $this->getDestinationAddress()->normalize(),
            'ShipmentDetails' => $this->getShipmentDetails()->normalize(),
            'PreferredCurrencyCode' => $this->getPreferredCurrencyCode()
        ], parent::normalize());
    }

}