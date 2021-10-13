<?php

namespace OmarEhab\Aramex\API\Response\Location;

use OmarEhab\Aramex\API\Classes\Address;
use OmarEhab\Aramex\API\Response\Response;

/**
 * Informs the user with the correct suggested Address structure for the address he entered by returning
 * an address parameter. The Transaction Parameter is sent as filled in the request for identification purposes.
 *
 * Class AddressValidationResponse
 * @package OmarEhab\Aramex\API\Response\Location
 */
class AddressValidationResponse extends Response
{
    private array $suggestedAddresses;

    /**
     * @return Address[]
     */
    public function getSuggestedAddresses(): array
    {
        return $this->suggestedAddresses;
    }

    /**
     * @param Address[] $suggestedAddresses
     * @return AddressValidationResponse
     */
    public function setSuggestedAddresses(array $suggestedAddresses): AddressValidationResponse
    {
        $this->suggestedAddresses = $suggestedAddresses;
        return $this;
    }

    /**
     * @param Address $suggestedAddress
     * @return AddressValidationResponse
     */
    public function addSuggestedAddresses(Address $suggestedAddress): AddressValidationResponse
    {
        $this->suggestedAddresses[] = $suggestedAddress;
        return $this;
    }

    /**
     * @param object $obj
     * @return AddressValidationResponse
     */
    protected function parse($obj): AddressValidationResponse
    {
        parent::parse($obj);

        dd($obj);

        // todo
        // Add Suggested Addresses

        return $this;
    }

    /**
     * @param object $obj
     * @return AddressValidationResponse
     */
    public static function make($obj): AddressValidationResponse
    {
        return (new self())->parse($obj);
    }

}