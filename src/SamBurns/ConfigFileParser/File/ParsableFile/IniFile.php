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

    public function __construct(string $path, FileContentsRetriever $fileContentsRetriever)
    {
        $this->path = $path;
        $this->fileContentsRetriever = $fileContentsRetriever;
    }

    public function toArray(): array
    {
        $fileContents = $this->fileContentsRetriever->fileGetContents($this->path);
        return parse_ini_string($fileContents);
    }
}
