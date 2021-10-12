<?php


namespace OmarEhab\Aramex\API\Classes;

use OmarEhab\Aramex\API\Interfaces\Normalize;

/**
 * Attachment is a complex element, consisting of three child elements (File Name, File Extension and File Contents).
 * These apply to every element that is defined by the Data Type “Attachment“.
 *
 * Class Attachment
 * @package OmarEhab\Aramex\API\Classes
 */
class Attachment implements Normalize
{
    private string $fileName;
    private string $fileExtension;
    private string $fileContent;

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * The file name without its extension.
     * @param string $fileName
     * @return $this
     */
    public function setFileName(string $fileName): Attachment
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileExtension(): string
    {
        return $this->fileExtension;
    }

    /**
     * The extension of the file. Our system accepts any extension
     * @param string $fileExtension
     * @return $this
     */
    public function setFileExtension(string $fileExtension): Attachment
    {
        $this->fileExtension = $fileExtension;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileContent(): string
    {
        return $this->fileContent;
    }

    /**
     * Contents of the file.
     * @param string $fileContent
     * @return $this
     */
    public function setFileContent(string $fileContent): Attachment
    {
        $this->fileContent = $fileContent;
        return $this;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return [
            'FileName' => $this->getFileName(),
            'FileExtension' => $this->getFileExtension(),
            'FileContent' => $this->getFileContent()
        ];
    }
}