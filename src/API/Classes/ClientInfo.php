<?php

namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * The Client Info element is present in all the methods of this service.
 * All its child elements are required to be filled.
 * The username and password are validated to allow access to the service.
 * Version element, is the Version of the API the customer is using, which needs to be specified in the request
 * Account Number, Pin, Entity and Country Code are all needed to verify the users account and obtain vital information from it,
 * such as the ability to create third party shipments among other features provided for each account.
 * Source, used for data mining purposes.
 *
 * Class ClientInfo
 * @package OmarEhab\Aramex\API\Classes
 */
class ClientInfo implements Normalize
{
    private string $accountCountryCode;
    private string $accountEntity;
    private string $accountNumber;
    private string $accountPin;
    private string $userName;
    private string $password;
    private string $version;

    public function __construct()
    {
        $this->useVersion2();
    }

    /**
     * @return string
     */
    public function getAccountCountryCode(): string
    {
        return $this->accountCountryCode;
    }

    /**
     * @param string $accountCountryCode
     * @return $this
     */
    public function setAccountCountryCode(string $accountCountryCode): ClientInfo
    {
        $this->accountCountryCode = $accountCountryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountEntity(): string
    {
        return $this->accountEntity;
    }

    /**
     * @param string $accountEntity
     * @return $this
     */
    public function setAccountEntity(string $accountEntity): ClientInfo
    {
        $this->accountEntity = $accountEntity;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     * @return $this
     */
    public function setAccountNumber(string $accountNumber): ClientInfo
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountPin(): string
    {
        return $this->accountPin;
    }

    /**
     * @param string $accountPin
     * @return $this
     */
    public function setAccountPin(string $accountPin): ClientInfo
    {
        $this->accountPin = $accountPin;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return $this
     */
    public function setUserName(string $userName): ClientInfo
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): ClientInfo
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion(string $version): ClientInfo
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return ClientInfo
     */
    public function useVersion1(): ClientInfo
    {
        return $this->setVersion('v1.0');
    }

    /**
     * @return ClientInfo
     */
    public function useVersion2(): ClientInfo
    {
        return $this->setVersion('v2.0');
    }

    public function normalize(): array
    {
        return [
            'AccountCountryCode' => $this->getAccountCountryCode(),
            'AccountEntity' => $this->getAccountEntity(),
            'AccountNumber' => $this->getAccountNumber(),
            'AccountPin' => $this->getAccountPin(),
            'UserName' => $this->getUserName(),
            'Password' => $this->getPassword(),
            'Version' => $this->getVersion()
        ];
    }
}