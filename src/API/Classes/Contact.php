<?php


namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * Depending on the method chosen, certain elements are required and others optional.
 * Shipment Creation:
 * Required – Person Name, Company Name, Phone Number1, and Email Address.
 *
 * Pickup Creation:
 * Required – Person Name, Company Name, Phone Number1, and Cell Phone.
 *
 * Class Contact
 * @package OmarEhab\Aramex\API\Classes
 */
class Contact implements Normalize
{
    private ?string $department;
    private string $personName;
    private ?string $title;
    private ?string $companyName;
    private string $phoneNumber1;
    private ?string $phoneNumber1Ext;
    private ?string $phoneNumber2;
    private ?string $phoneNumber2Ext;
    private ?string $faxNumber;
    private ?string $cellPhone;
    private string $emailAddress;
    private ?string $type;

    public function __construct($personName, $phoneNumber1, $emailAddress)
    {
        $this->personName = $personName;
        $this->phoneNumber1 = $phoneNumber1;
        $this->emailAddress = $emailAddress;
        $this->title = null;
        $this->department = null;
        $this->companyName = null;
        $this->phoneNumber1Ext = null;
        $this->phoneNumber2 = null;
        $this->phoneNumber2Ext = null;
        $this->faxNumber = null;
        $this->cellPhone = null;
        $this->type = null;
    }

    /**
     * @return string|null
     */
    public function getDepartment(): ?string
    {
        return $this->department;
    }

    /**
     * User’s Work Department
     * @param string $department
     * @return $this
     */
    public function setDepartment(string $department): Contact
    {
        $this->department = $department;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonName(): string
    {
        return $this->personName;
    }

    /**
     * User’s Name, Sent By or in the case of the consignee, to the Attention of.
     * @param string $personName
     * @return $this
     */
    public function setPersonName(string $personName): Contact
    {
        $this->personName = $personName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * User’s Title
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): Contact
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Company or Person name.
     * @param string $companyName
     * @return $this
     */
    public function setCompanyName(string $companyName): Contact
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber1(): string
    {
        return $this->phoneNumber1;
    }

    /**
     * Valid Phone Number
     * @param string $phoneNumber1
     * @return $this
     */
    public function setPhoneNumber1(string $phoneNumber1): Contact
    {
        $this->phoneNumber1 = $phoneNumber1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber1Ext(): ?string
    {
        return $this->phoneNumber1Ext;
    }

    /**
     * Valid Extension to the phone number.
     * @param string|null $phoneNumber1Ext
     * @return $this
     */
    public function setPhoneNumber1Ext(string $phoneNumber1Ext): Contact
    {
        $this->phoneNumber1Ext = $phoneNumber1Ext;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber2(): ?string
    {
        return $this->phoneNumber2;
    }

    /**
     * Valid Phone Number
     * @param string|null $phoneNumber2
     * @return $this
     */
    public function setPhoneNumber2(string $phoneNumber2): Contact
    {
        $this->phoneNumber2 = $phoneNumber2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber2Ext(): ?string
    {
        return $this->phoneNumber2Ext;
    }

    /**
     * Valid Extension to the phone number.
     * @param string|null $phoneNumber2Ext
     * @return $this
     */
    public function setPhoneNumber2Ext(string $phoneNumber2Ext): Contact
    {
        $this->phoneNumber2Ext = $phoneNumber2Ext;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFaxNumber(): ?string
    {
        return $this->faxNumber;
    }

    /**
     * Fax Number
     * @param string|null $faxNumber
     * @return $this
     */
    public function setFaxNumber(string $faxNumber): Contact
    {
        $this->faxNumber = $faxNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCellPhone(): string
    {
        return $this->cellPhone;
    }

    /**
     * Cell Phone Number
     * @param string|null $cellPhone
     * @return $this
     */
    public function setCellPhone(string $cellPhone): Contact
    {
        $this->cellPhone = $cellPhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * Email Address
     * @param string $emailAddress
     * @return $this
     */
    public function setEmailAddress(string $emailAddress): Contact
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return $this
     */
    public function setType(string $type): Contact
    {
        $this->type = $type;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'Department' => $this->getDepartment(),
            'PersonName' => $this->getPersonName(),
            'Title' => $this->getTitle(),
            'CompanyName' => $this->getCompanyName(),
            'PhoneNumber1' => $this->getPhoneNumber1(),
            'PhoneNumber1Ext' => $this->getPhoneNumber1Ext(),
            'PhoneNumber2' => $this->getPhoneNumber2(),
            'PhoneNumber2Ext' => $this->getPhoneNumber2Ext(),
            'FaxNumber' => $this->getFaxNumber(),
            'CellPhone' => $this->getCellPhone(),
            'EmailAddress' => $this->getEmailAddress(),
            'Type' => $this->getType()
        ];
    }
}