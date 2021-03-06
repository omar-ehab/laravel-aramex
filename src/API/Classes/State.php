<?php


namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * Required – Name.
 *
 * Class State
 * @package OmarEhab\Aramex\API\Classes
 */
class State implements Normalize
{
    private ?string $code;
    private ?string $name;

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     * @return State
     */
    public function setCode(string $code): State
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return State
     */
    public function setName(string $name): State
    {
        $this->name = $name;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'Code' => $this->getCode(),
            'Name' => $this->getName(),
        ];
    }
}