<?php


namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * The Address element contains several child elements that are validated before the request can be submitted successfully.
 *
 * Class Address
 * @package OmarEhab\Aramex\API\Classes
 */
class Address implements Normalize
{
    private string $line1;
    private ?string $line2;
    private ?string $line3;
    private ?string $city;
    private ?string $stateOrProvinceCode;
    private ?string $postCode;
    private string $countryCode;
    private ?float $longitude;
    private ?float $latitude;
    private ?string $buildingNumber;
    private ?string $buildingName;
    private ?int $floor;
    private ?string $apartment;
    private ?string $poBox;
    private ?string $description;

    public function __construct($line1, $countryCode)
    {
        $this->line1 = $line1;
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getLine1(): string
    {
        return $this->line1;
    }

    /**
     * Additional Address information, such as the building number, block, street name.
     * More than 3 characters
     *
     * @param string|null $line1
     * @return $this
     */
    public function setLine1(string $line1): Address
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine2(): ?string
    {
        return $this->line2;
    }

    /**
     * Additional Address information.
     *
     * @param string|null $line2
     * @return $this
     */
    public function setLine2(string $line2): Address
    {
        $this->line2 = $line2;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine3(): ?string
    {
        return $this->line3;
    }

    /**
     * Additional Address information.
     *
     * @param string|null $line3
     * @return $this
     */
    public function setLine3(string $line3): Address
    {
        $this->line3 = $line3;
        return $this;
    }

    /**
     * Address City. Conditional: Required if the post code is not given.
     *
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Address City.
     * Conditional: Required if the post code is not given.
     *
     * @param string $city
     * @return $this
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateOrProvinceCode(): ?string
    {
        return $this->stateOrProvinceCode;
    }

    /**
     * Address State or province code.
     * Required if The country code and city require a State or Province Code
     *
     * @param string|null $stateOrProvinceCode
     * @return $this
     */
    public function setStateOrProvinceCode(string $stateOrProvinceCode): Address
    {
        $this->stateOrProvinceCode = $stateOrProvinceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * Postal Code, if there is a postal code in the country code and city then it must be given.
     * If there are multiple cities for the same post code, the list of cities will be returned to the response.
     *
     * @param string|null $postCode
     * @return $this
     */
    public function setPostCode(string $postCode): Address
    {
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * 2-Letter Standard ISO Country Code.
     *
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode(string $countryCode): Address
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return $this
     */
    public function setLongitude(float $longitude): Address
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return $this
     */
    public function setLatitude(float $latitude): Address
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuildingNumber(): ?string
    {
        return $this->buildingNumber;
    }

    /**
     * @param string|null $buildingNumber
     * @return $this
     */
    public function setBuildingNumber(string $buildingNumber): Address
    {
        $this->buildingNumber = $buildingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuildingName(): ?string
    {
        return $this->buildingName;
    }

    /**
     * @param string|null $buildingName
     * @return $this
     */
    public function setBuildingName(string $buildingName): Address
    {
        $this->buildingName = $buildingName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFloor(): ?int
    {
        return $this->floor;
    }

    /**
     * @param int|null $floor
     * @return $this
     */
    public function setFloor(int $floor): Address
    {
        $this->floor = $floor;
        return $this;
    }

    /**
     * @return string
     */
    public function getApartment(): ?string
    {
        return $this->apartment;
    }

    /**
     * /**
     * @param string|null $apartment
     * @return $this
     */
    public function setApartment(string $apartment): Address
    {
        $this->apartment = $apartment;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoBox(): ?string
    {
        return $this->poBox;
    }

    /**
     * @param string|null $poBox
     * @return $this
     */
    public function setPoBox(string $poBox): Address
    {
        $this->poBox = $poBox;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(string $description): Address
    {
        $this->description = $description;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'Line1' => $this->getLine1(),
            'Line2' => $this->getLine2(),
            'Line3' => $this->getLine3(),
            'City' => $this->getCity(),
            'StateOrProvinceCode' => $this->getStateOrProvinceCode(),
            'PostCode' => $this->getPostCode(),
            'CountryCode' => $this->getCountryCode(),
            'Longitude' => $this->getLongitude(),
            'Latitude' => $this->getLatitude(),
            'BuildingNumber' => $this->getBuildingNumber(),
            'BuildingName' => $this->getBuildingName(),
            'POBox' => $this->getPoBox(),
            'Description' => $this->getDescription(),
            'Apartment' => $this->getApartment(),
            'Floor' => $this->getFloor(),
        ];
    }
}