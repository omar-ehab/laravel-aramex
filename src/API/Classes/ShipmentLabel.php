<?php

namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * Returns the Label as URL with Label URL element or as a file with Label File Contents.
 * Class ShipmentLabel
 * @package OmarEhab\Aramex\API\Classes
 */
class ShipmentLabel implements Normalize
{
    private string $labelUrl;
    private string $labelFileContents;

    /**
     * @return string
     */
    public function getLabelUrl(): string
    {
        return $this->labelUrl;
    }

    /**
     * @param string $labelUrl
     * @return ShipmentLabel
     */
    public function setLabelUrl(string $labelUrl): ShipmentLabel
    {
        $this->labelUrl = $labelUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabelFileContents(): string
    {
        return $this->labelFileContents;
    }

    /**
     * @param string $labelFileContents
     * @return ShipmentLabel
     */
    public function setLabelFileContents(string $labelFileContents): ShipmentLabel
    {
        $this->labelFileContents = $labelFileContents;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'LabelUrl' => $this->getLabelUrl(),
            'LabelFileContents' => $this->getLabelFileContents(),
        ];
    }

}