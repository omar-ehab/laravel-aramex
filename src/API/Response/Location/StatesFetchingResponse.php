<?php

namespace OmarEhab\Aramex\API\Response\Location;

use OmarEhab\Aramex\API\Classes\State;
use OmarEhab\Aramex\API\Response\Response;

class StatesFetchingResponse extends Response
{
    private array $states;

    /**
     * @return string[]
     */
    public function getStates(): array
    {
        return $this->states;
    }

    /**
     * @param State[] $states
     * @return $this
     */
    public function setStates(array $states): StatesFetchingResponse
    {
        $this->states = $states;
        return $this;
    }

    /**
     * @param State $state
     * @return $this
     */
    public function addState(State $state): StatesFetchingResponse
    {
        $this->states[] = $state;
        return $this;
    }

    /**
     * @param object $obj
     * @return StatesFetchingResponse
     */
    protected function parse($obj): StatesFetchingResponse
    {
        parent::parse($obj);

        if ($obj->States && property_exists($obj->States, 'State')) {
            $states = $obj->States->State;

            foreach ($states as $state) {
                $this->addState(
                    (new State())
                        ->setCode($state->Code)
                        ->setName($state->Name)
                );
            }
        }

        return $this;
    }

    /**
     * @param object $obj
     * @return StatesFetchingResponse
     */
    public static function make($obj): StatesFetchingResponse
    {
        return (new self())->parse($obj);
    }

}