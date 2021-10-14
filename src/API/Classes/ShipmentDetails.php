<?php

namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 *
 * Class ShipmentDetails
 * @package OmarEhab\Aramex\API\Classes
 */
class ShipmentDetails implements Normalize
{
    private ?Dimension $dimensions;
    private Weight $actualWeight;
    private string $descriptionOfGoods;
    private string $goodsOriginCountry;
    private int $numberOfPieces;
    private string $productGroup;
    private string $productType;
    private string $paymentType;
    private ?string $paymentOption;
    private ?Money $customsValueAmount;
    private ?Money $cashOnDeliveryAmount;
    private ?Money $insuranceAmount;
    private ?Money $cashAdditionalAmount;
    private ?string $services;
    private array $items;

    public function __construct($actualWeight, $descriptionOfGoods, $goodsOriginCountry, $numberOfPieces, $productGroup, $productType, $paymentType, $items)
    {
        $this->actualWeight = new Weight($actualWeight, 'KG');
        $this->descriptionOfGoods = $descriptionOfGoods;
        $this->goodsOriginCountry = $goodsOriginCountry;
        $this->numberOfPieces = $numberOfPieces;
        $this->productGroup = $productGroup;
        $this->productType = $productType;
        $this->paymentType = $paymentType;
        $this->items = $items;
        $this->dimensions = null;
        $this->paymentOption = null;
        $this->customsValueAmount = null;
        $this->cashOnDeliveryAmount = null;
        $this->insuranceAmount = null;
        $this->cashAdditionalAmount = null;
        $this->services = null;
    }

    /**
     * @return Dimension|null
     */
    public function getDimensions(): ?Dimension
    {
        return $this->dimensions;
    }

    /**
     * Measurements required in calculating the Chargeable Weight, If any of the dimensional values are filled then the rest must be filled.
     * @param Dimension $dimensions
     * @return ShipmentDetails
     */
    public function setDimensions(Dimension $dimensions): ShipmentDetails
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * @return Weight
     */
    public function getActualWeight(): Weight
    {
        return $this->actualWeight;
    }

    /**
     * Total actual shipment weight. If the Dimensions are filled, charging weight is compared to actual and the highest value is filled here.
     * @param Weight $actualWeight
     * @return ShipmentDetails
     */
    public function setActualWeight(Weight $actualWeight): ShipmentDetails
    {
        $this->actualWeight = $actualWeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionOfGoods(): string
    {
        return $this->descriptionOfGoods;
    }

    /**
     * The Nature of Shipment Contents. Example: Clothes, Electronic
     * @param string $descriptionOfGoods
     * @return ShipmentDetails
     */
    public function setDescriptionOfGoods(string $descriptionOfGoods): ShipmentDetails
    {
        $this->descriptionOfGoods = $descriptionOfGoods;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoodsOriginCountry(): string
    {
        return $this->goodsOriginCountry;
    }

    /**
     * The Origin of which the product in the shipment came from
     * @param string $goodsOriginCountry
     * @return ShipmentDetails
     */
    public function setGoodsOriginCountry(string $goodsOriginCountry): ShipmentDetails
    {
        $this->goodsOriginCountry = $goodsOriginCountry;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfPieces(): int
    {
        return $this->numberOfPieces;
    }

    /**
     * Number of shipment pieces
     * @param int $numberOfPieces
     * @return ShipmentDetails
     */
    public function setNumberOfPieces(int $numberOfPieces): ShipmentDetails
    {
        $this->numberOfPieces = $numberOfPieces;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductGroup(): string
    {
        return $this->productGroup;
    }

    /**
     * EXP = Express DOM = Domestic
     * @param string $productGroup
     * @return ShipmentDetails
     */
    public function setProductGroup(string $productGroup): ShipmentDetails
    {
        $this->productGroup = $productGroup;
        return $this;
    }

    /**
     * @return ShipmentDetails
     */
    public function useExpressAsProductGroup(): ShipmentDetails
    {
        return $this->setProductGroup('EXP');

    }

    /**
     * @return ShipmentDetails
     */
    public function useDomesticAsProductGroup(): ShipmentDetails
    {
        return $this->setProductGroup('DOM');
    }

    /**
     * @return string
     */
    public function getProductType(): string
    {
        return $this->productType;
    }

    /**
     * Priority  Document  Express.
     * Urgent, time sensitive consignments containing printed matter or document material.
     * @return ShipmentDetails
     */
    public function usePriorityDocumentExpressAsProductType(): ShipmentDetails
    {
        return $this->setProductType('PDX');
    }

    /**
     * Priority Parcel Express.
     * Urgent, time sensitive consignments containing non-printed matter or non-document material.
     * @return ShipmentDetails
     */
    public function usePriorityParcelExpressAsProductType(): ShipmentDetails
    {
        return $this->setProductType('PPX');
    }

    /**
     * Priority Letter Express.
     * Urgent, time sensitive consignments containing printed matter of weight less than 0.5 kg.
     * @return ShipmentDetails
     */
    public function usePriorityLetterExpressAsProductType(): ShipmentDetails
    {
        return $this->setProductType('PLX');
    }

    /**
     * Deferred Document Express.
     * 2nd Day Delivery consignments containing printed matter or document material.
     * @return ShipmentDetails
     */
    public function useDeferredDocumentExpressAsProductType(): ShipmentDetails
    {
        return $this->setProductType('DDX');
    }

    /**
     * Deferred Parcel Express.
     * 2nd Day Delivery consignments containing non-printed matter or non-document material.
     * @return ShipmentDetails
     */
    public function setDeferredParcelExpressProductType(): ShipmentDetails
    {
        return $this->setProductType('DPX');
    }

    /**
     * Ground  Document Express.
     * Ground delivery consignments containing printed matter or document material.
     * @return ShipmentDetails
     */
    public function setGroundDocumentExpressProductType(): ShipmentDetails
    {
        return $this->setProductType('GDX');
    }

    /**
     * Ground Parcel Express.
     * Ground Delivery consignments containing non-printed matter or non-document material.
     * @return ShipmentDetails
     */
    public function setGroundParcelExpressProductType(): ShipmentDetails
    {
        return $this->setProductType('GPX');
    }

    /**
     * Product Type involves the specification of certain features concerning the delivery of the product
     * @param string $productType
     * @return ShipmentDetails
     */
    public function setProductType(string $productType): ShipmentDetails
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentOption(): ?string
    {
        return $this->paymentOption;
    }

    /**
     * @param string $paymentOption
     */
    public function setPaymentOption(string $paymentOption): void
    {
        $this->paymentOption = $paymentOption;
    }

    /**
     * @return Money|null
     */
    public function getCustomsValueAmount(): ?Money
    {
        return $this->customsValueAmount;
    }

    /**
     * @param Money $customsValueAmount
     * @return ShipmentDetails
     */
    public function setCustomsValueAmount(Money $customsValueAmount): ShipmentDetails
    {
        $this->customsValueAmount = $customsValueAmount;
        return $this;
    }

    /**
     * @return Money|null
     */
    public function getCashOnDeliveryAmount(): ?Money
    {
        return $this->cashOnDeliveryAmount;
    }

    /**
     * Amount of Cash that is paid by the receiver of the package. Conditional - Based on the Services "COD" being filled.
     * @param Money $cashOnDeliveryAmount
     * @return ShipmentDetails
     */
    public function setCashOnDeliveryAmount(Money $cashOnDeliveryAmount): ShipmentDetails
    {
        $this->cashOnDeliveryAmount = $cashOnDeliveryAmount;
        return $this;
    }

    /**
     * @return Money|null
     */
    public function getInsuranceAmount(): ?Money
    {
        return $this->insuranceAmount;
    }

    /**
     * Insurance Amount charged on shipment.
     * @param Money $insuranceAmount
     * @return ShipmentDetails
     */
    public function setInsuranceAmount(Money $insuranceAmount): ShipmentDetails
    {
        $this->insuranceAmount = $insuranceAmount;
        return $this;
    }

    /**
     * @return Money|null
     */
    public function getCashAdditionalAmount(): ?Money
    {
        return $this->cashAdditionalAmount;
    }

    /**
     * Additional Cash that can be required for miscellaneous purposes.
     * @param Money $cashAdditionalAmount
     * @return ShipmentDetails
     */
    public function setCashAdditionalAmount(Money $cashAdditionalAmount): ShipmentDetails
    {
        $this->cashAdditionalAmount = $cashAdditionalAmount;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getServices(): ?string
    {
        return $this->services;
    }

    /**
     * Additional Services used in shipping the package, Separate by comma when selecting multiple services.
     * @param string $services
     * @return ShipmentDetails
     */
    public function setServices(string $services): ShipmentDetails
    {
        $this->services = $services;
        return $this;
    }

    /**
     * Cash on Delivery.
     * Receiver pays the cost of the goods
     * @return ShipmentDetails
     */
    public function useCashOnDeliveryService(): ShipmentDetails
    {
        return $this->setServices('COD');
    }

    /**
     * First Delivery.
     * Committed delivery time at destination country.
     * @return $this
     */
    public function useFirstAsService(): ShipmentDetails
    {
        return $this->setServices('FIRST');
    }

    public function useFreeDomicileAsService(): ShipmentDetails
    {
        return $this->setServices('FRDOM');
    }

    public function useHoldForPickupAsService(): ShipmentDetails
    {
        return $this->setServices('HFPU');
    }

    public function useNoonDeliveryAsService(): ShipmentDetails
    {
        return $this->setServices('NOON');
    }

    public function useSignatureRequiredAsService(): ShipmentDetails
    {
        return $this->setServices('SIG');
    }

    /**
     * @return ShipmentItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Details of the Items within a shipment. Several items can be added for a single shipment.
     * @param $items
     * @return ShipmentDetails
     */
    public function setItems($items): ShipmentDetails
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param ShipmentItem $item
     * @return ShipmentDetails
     */
    public function addItem(ShipmentItem $item): ShipmentDetails
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * Method of payment for shipment.
     * @param string $paymentType
     * @return ShipmentDetails
     */
    public function setPaymentType(string $paymentType): ShipmentDetails
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    /**
     * Prepaid.
     * Transportation Charges payable by shipper.
     * @return ShipmentDetails
     */
    public function usePrepaidAsPaymentType(): ShipmentDetails
    {
        return $this->setPaymentType('P');
    }

    /**
     * Collect.
     * Transportation Charges payable by consignee.
     * @return ShipmentDetails
     */
    public function useCollectAsPaymentType(): ShipmentDetails
    {
        return $this->setPaymentType('C');
    }

    /**
     * Third Party.
     * Transportation Charges payable by third party. Note: in case of 3rd Party all third party details must be filled including a valid Aramex Account Number for Billing Party.
     * @return ShipmentDetails
     */
    public function useThirdPartyAsPaymentType(): ShipmentDetails
    {
        return $this->setPaymentType('T');
    }

    public function normalize(): array
    {
        return [
            'Dimensions' => optional($this->getDimensions())->normalize(),
            'ActualWeight' => optional($this->getActualWeight())->normalize(),
            'DescriptionOfGoods' => $this->getDescriptionOfGoods(),
            'GoodsOriginCountry' => $this->getGoodsOriginCountry(),
            'NumberOfPieces' => $this->getNumberOfPieces(),
            'ProductGroup' => $this->getProductGroup(),
            'ProductType' => $this->getProductType(),
            'PaymentType' => $this->getPaymentType(),
            'PaymentOption' => $this->getPaymentOption(),
            'CustomsValueAmount' => optional($this->getCustomsValueAmount())->normalize(),
            'CashOnDeliveryAmount' => optional($this->getCashOnDeliveryAmount())->normalize(),
            'InsuranceAmount' => optional($this->getInsuranceAmount())->normalize(),
            'CashAdditionalAmount' => optional($this->getCashAdditionalAmount())->normalize(),
            'Services' => $this->getServices(),
            'Items' => $this->getItems() ? array_map(function ($item) {
                return $item->normalize();
            }, $this->getItems()) : []
        ];
    }
}