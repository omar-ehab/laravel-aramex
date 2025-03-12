<?php

namespace OmarEhab\Aramex\API\Requests;

use Exception;
use OmarEhab\Aramex\API\Classes\ClientInfo;
use OmarEhab\Aramex\API\Classes\Transaction;
use OmarEhab\Aramex\API\Interfaces\Normalize;
use SoapClient;
use SoapFault;

abstract class API implements Normalize
{
    /**
     * @var SoapClient $soapClient
     * @var ClientInfo $clientInfo
     * @var Transaction $transaction
     */
    protected $soapClient;
    protected $clientInfo;
    protected $transaction;
    protected $base_live_url;
    protected $base_test_url;
    protected $endpoint;
    protected $environment;

    /**
     * @throws SoapFault
     */
    public function __construct()
    {
        config('aramex.mode') === 'live' ? $this->useLiveAsEnvironment() : $this->useTestAsEnvironment();

        $this->base_live_url = config('aramex.base_live_url');
        $this->base_test_url = config('aramex.base_test_url');

        $this->fillClientInfoFromEnv();

        $this->soapClient = new SoapClient($this->getWsdlAccordingToEnvironment(), array('trace' => 1));
    }

    public function setClientInfo(ClientInfo $clientInfo): API
    {
        $this->clientInfo = $clientInfo;
        return $this;
    }

    /**
     * @return ClientInfo
     */
    public function getClientInfo()
    {
        return $this->clientInfo;
    }

    /**
     * @return Transaction|null
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param Transaction $transaction
     * @return $this
     */
    public function setTransaction(Transaction $transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }

    /**
     * @param $environment
     * @return $this
     */
    protected function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    public function useTestAsEnvironment()
    {
        return $this->setEnvironment('test');
    }

    public function useLiveAsEnvironment()
    {
        return $this->setEnvironment('live');
    }

    /**
     * @return bool
     */
    public function isTest()
    {
        return $this->environment === "test";
    }

    /**
     * @return bool
     */
    public function isLive()
    {
        return $this->environment === "live";
    }

    /**
     * @return string
     */
    protected function getWsdlAccordingToEnvironment()
    {
        if ($this->isLive()) {
            return $this->base_live_url . config("aramex.live_endpoints.$this->endpoint");
        } else {
            return $this->base_test_url . config("aramex.test_endpoints.$this->endpoint");
        }
    }

    /**
     * @throws Exception
     */
    protected function validate()
    {
        if (!$this->clientInfo) {
            throw new Exception('Client Info Not Provided');
        }
    }

    /**
     * @return void
     */
    private function fillClientInfoFromEnv()
    {
        $this->clientInfo = (new ClientInfo())
            ->setAccountCountryCode(config("aramex.$this->environment.country_code"))
            ->setAccountEntity(config("aramex.$this->environment.entity"))
            ->setAccountNumber(config("aramex.$this->environment.number"))
            ->setAccountPin(config("aramex.$this->environment.pin"))
            ->setUserName(config("aramex.$this->environment.username"))
            ->setPassword(config("aramex.$this->environment.password"));

    }

    public function getAccountNumber()
    {
        return config("aramex.$this->environment.number");
    }

    public function normalize()
    {
        return [
            'ClientInfo' => $this->getClientInfo()->normalize(),
            'Transaction' => optional($this->getTransaction())->normalize()
        ];
    }
}