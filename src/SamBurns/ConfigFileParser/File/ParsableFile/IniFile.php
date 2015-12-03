<?php
namespace SamBurns\ConfigFileParser\File\ParsableFile;

use SamBurns\ConfigFileParser\File\ParsableFile;
use SamBurns\ConfigFileParser\FileReading\FileContentsRetriever;

class IniFile implements ParsableFile
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
        return parse_ini_string($fileContents);
    }
}
