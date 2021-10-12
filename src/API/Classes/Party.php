<?php


namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * Party is a complex element, consisting of three child elements (Reference 1, Reference 2, and Account Number)
 * and encompasses from its data type level the Address and Contact Elements.
 *
 * This data type is applied on the Shipper, Consignee and Third Party complex elements.
 * Class Party
 * @package OmarEhab\Aramex\API\Classes
 */
class Party implements Normalize
{
    private ?string $reference1;
    private ?string $reference2;
    private ?string $accountNumber;
    private Address $partyAddress;
    private Contact $contact;

    /**
     * @return string
     */
    public function getReference1(): ?string
    {
        return $this->reference1;
    }

    /**
     * Any details the client would like to add that will be sent back in the response.
     *
     * @param string $reference1
     * @return $this
     */
    public function setReference1(string $reference1): Party
    {
        $this->reference1 = $reference1;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference2(): ?string
    {
        return $this->reference2;
    }

    /**
     * Any details the client would like to add that will be sent back in the response.
     *
     * @param string $reference2
     * @return Party
     */
    public function setReference2(string $reference2): Party
    {
        $this->reference2 = $reference2;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    /**
     * The Same Account number entered in the Client Info
     *
     * @param string $accountNumber
     * @return $this
     */
    public function setAccountNumber(string $accountNumber): Party
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

//    public function useClientAccountNumberAsAccountNumber()
//    {
//        return $this->setAccountNumber('');
//    }

    /**
     * @return Address
     */
    public function getPartyAddress(): Address
    {
        return $this->partyAddress;
    }

    /**
     * @param Address $partyAddress
     * @return Party
     */
    public function setPartyAddress(Address $partyAddress): Party
    {
        $this->partyAddress = $partyAddress;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Party
     */
    public function setContact(Contact $contact): Party
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return [
            'Reference1' => $this->getReference1(),
            'Reference2' => $this->getReference2(),
            'AccountNumber' => $this->getAccountNumber(),
            'PartyAddress' => optional($this->getPartyAddress())->normalize(),
            'Contact' => optional($this->getContact())->normalize()
        ];
    }
}