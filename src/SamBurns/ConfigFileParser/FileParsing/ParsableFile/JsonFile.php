<?php
namespace SamBurns\ConfigFileParser\FileParsing\ParsableFile;

use SamBurns\ConfigFileParser\FileParsing\ParsableFile;
use SamBurns\ConfigFileParser\FileReading\FileContentsRetriever;

class JsonFile implements ParsableFile
{
    /** @var string */
    private $path;

    /** @var FileContentsRetriever */
    private $fileContentsRetriever;

    /**
     * @param string                $path
     * @param FileContentsRetriever $fileContentsRetriever
     */
    public function __construct($path, FileContentsRetriever $fileContentsRetriever)
    {
        $this->path = $path;
        $this->fileContentsRetriever = $fileContentsRetriever;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $fileContents = $this->fileContentsRetriever->fileGetContents($this->path);
        return json_decode($fileContents, true);
    }
}
