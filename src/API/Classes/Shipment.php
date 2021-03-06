<?php


namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * Required – Shipper, Consignee, and Details.
 *
 * Class Shipment
 * @package OmarEhab\Aramex\API\Classes
 */
class Shipment implements Normalize
{
    private ?string $reference1;
    private ?string $reference2;
    private ?string $reference3;
    private Party $shipper;
    private Party $consignee;
    private ?Party $thirdParty;
    private string $shippingDateTime;
    private ?string $dueDate;
    private ?string $comments;
    private ?string $pickupLocation;
    private ?string $operationsInstructions;
    private ?string $accountingInstructions;
    private ShipmentDetails $details;
    private ?array $attachments;
    private ?string $foreignHAWB;
    private int $transportType = 0;
    private ?string $number;
    private ?string $pickupGUID;

    public function __construct($shipper, $consignee, $shippingDateTime, $details)
    {
        $this->reference1 = null;
        $this->reference2 = null;
        $this->reference3 = null;
        $this->shipper = $shipper;
        $this->consignee = $consignee;
        $this->thirdParty = null;
        $this->shippingDateTime = $shippingDateTime;
        $this->dueDate = null;
        $this->comments = null;
        $this->pickupLocation = null;
        $this->operationsInstructions = null;
        $this->accountingInstructions = null;
        $this->details = $details;
        $this->attachments = null;
        $this->foreignHAWB = null;
        $this->number = null;
        $this->pickupGUID = null;
    }

    /**
     * @return string|null
     */
    public function getReference1(): ?string
    {
        return $this->reference1;
    }

    /**
     * Any general detail the customer would like to add about the shipment
     *
     * @param string|null $reference1
     * @return $this
     */
    public function setReference1(?string $reference1): Shipment
    {
        $this->reference1 = $reference1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReference2(): ?string
    {
        return $this->reference2;
    }

    /**
     * Any general detail the customer would like to add about the shipment
     *
     * @param string|null $reference2
     * @return $this
     */
    public function setReference2(?string $reference2): Shipment
    {
        $this->reference2 = $reference2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReference3(): ?string
    {
        return $this->reference3;
    }

    /**
     * Any general detail the customer would like to add about the shipment
     *
     * @param string|null $reference3
     * @return $this
     */
    public function setReference3(?string $reference3): Shipment
    {
        $this->reference3 = $reference3;
        return $this;
    }

    /**
     * @return Party
     */
    public function getShipper(): Party
    {
        return $this->shipper;
    }

    /**
     * @param Party $shipper
     * @return $this
     */
    public function setShipper(Party $shipper): Shipment
    {
        $this->shipper = $shipper;
        return $this;
    }

    /**
     * @return Party
     */
    public function getConsignee(): Party
    {
        return $this->consignee;
    }

    /**
     * @param Party $consignee
     * @return $this
     */
    public function setConsignee(Party $consignee): Shipment
    {
        $this->consignee = $consignee;
        return $this;
    }

    /**
     * @return Party|null
     */
    public function getThirdParty(): ?Party
    {
        return $this->thirdParty;
    }

    /**
     * @param Party|null $thirdParty
     * @return $this
     */
    public function setThirdParty(?Party $thirdParty): Shipment
    {
        $this->thirdParty = $thirdParty;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingDateTime(): string
    {
        return $this->shippingDateTime;
    }

    /**
     * The date aramex receives the shipment to be shipped out.
     *
     * @param string $shippingDateTime
     * @return $this
     */
    public function setShippingDateTime(string $shippingDateTime): Shipment
    {
        $this->shippingDateTime = $shippingDateTime;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    /**
     * The date specified for shipment to be delivered to the consignee.
     *
     * @param string|null $dueDate
     * @return $this
     */
    public function setDueDate(?string $dueDate): Shipment
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComments(): ?string
    {
        return $this->comments;
    }

    /**
     * Any comments on the shipment.
     *
     * @param string|null $comments
     * @return $this
     */
    public function setComments(?string $comments): Shipment
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPickupLocation(): ?string
    {
        return $this->pickupLocation;
    }

    /**
     * The location from where the shipment should be picked up, such as the reception desk.
     *
     * @param string|null $pickupLocation
     * @return $this
     */
    public function setPickupLocation(?string $pickupLocation): Shipment
    {
        $this->pickupLocation = $pickupLocation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOperationsInstructions(): ?string
    {
        return $this->operationsInstructions;
    }

    /**
     * Instructions on how to handle the shipment.
     *
     * @param string|null $operationsInstructions
     * @return $this
     */
    public function setOperationsInstructions(?string $operationsInstructions): Shipment
    {
        $this->operationsInstructions = $operationsInstructions;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountingInstructions(): ?string
    {
        return $this->accountingInstructions;
    }

    /**
     * Instructions on how to handle payment specifics.
     *
     * @param string|null $accountingInstructions
     * @return $this
     */
    public function setAccountingInstructions(?string $accountingInstructions): Shipment
    {
        $this->accountingInstructions = $accountingInstructions;
        return $this;
    }

    /**
     * @return ShipmentDetails
     */
    public function getDetails(): ShipmentDetails
    {
        return $this->details;
    }

    /**
     * @param ShipmentDetails $details
     * @return $this
     */
    public function setDetails(ShipmentDetails $details): Shipment
    {
        $this->details = $details;
        return $this;
    }

    /**
     * @return Attachment[]|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * The total size of a single file must not exceed 2 MB.
     * @param array $attachments
     * @return $this
     */
    public function setAttachments(array $attachments): Shipment
    {
        $this->attachments = $attachments;
        return $this;
    }

    /**
     * @param Attachment $attachment
     * @return $this
     */
    public function addAttachment(Attachment $attachment): Shipment
    {
        $this->attachments[] = $attachment;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getForeignHAWB(): ?string
    {
        return $this->foreignHAWB;
    }

    /**
     * Client’s shipment number if present. If filled this field must be unique for each shipment.
     *
     * @param string $foreignHAWB
     * @return $this
     */
    public function setForeignHAWB(string $foreignHAWB): Shipment
    {
        $this->foreignHAWB = $foreignHAWB;
        return $this;
    }

    /**
     * 0 or 1
     * 0 by Default
     * @return int
     */
    public function getTransportType(): int
    {
        return $this->transportType;
    }

    /**
     * @param int $transportType
     * @return $this
     */
    public function setTransportType(int $transportType): Shipment
    {
        $this->transportType = $transportType;
        return $this;
    }

    /**
     * A valid HAWB number
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * If shipment numbers are required to be entered manually
     * then aramex operations will provide a stock range from which to fill this field with.
     * Otherwise, if empty a number will be assigned to the created shipment automatically and returned to the response.
     *
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): Shipment
    {
        $this->number = $number;
        return $this;
    }

    /**
     * To add Shipments to existing pickups.
     *
     * @return string|null
     */
    public function getPickupGUID(): ?string
    {
        return $this->pickupGUID;
    }

    /**
     * A valid GUID value, provided by the Pickup Creation Response
     *
     * @param string $pickupGUID
     * @return $this
     */
    public function setPickupGUID(string $pickupGUID): Shipment
    {
        $this->pickupGUID = $pickupGUID;
        return $this;
    }


    public function normalize(): array
    {
        return [
            'Reference1' => $this->getReference1(),
            'Reference2' => $this->getReference2(),
            'Reference3' => $this->getReference3(),
            'Shipper' => optional($this->getShipper())->normalize(),
            'Consignee' => optional($this->getConsignee())->normalize(),
            'ThirdParty' => optional($this->getThirdParty())->normalize(),
            'ShippingDateTime' => $this->getShippingDateTime(),
            'DueDate' => $this->getDueDate(),
            'Comments' => $this->getComments(),
            'PickupLocation' => $this->getPickupLocation(),
            'OperationsInstructions' => $this->getOperationsInstructions(),
            'AccountingInstructions' => $this->getAccountingInstructions(),
            'Details' => optional($this->getDetails())->normalize(),
            'Attachments' => $this->getAttachments() ? array_map(function ($item) {
                return $item->normalize();
            }, $this->getAttachments()) : [],
            'ForeignHAWB' => $this->getForeignHAWB(),
            'TransportType' => $this->getTransportType(),
            'Number' => $this->getNumber(),
            'PickupGUID' => $this->getPickupGUID()
        ];
    }
}