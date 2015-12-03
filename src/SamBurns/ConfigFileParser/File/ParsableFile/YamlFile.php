<?php
namespace SamBurns\ConfigFileParser\File\ParsableFile;

use SamBurns\ConfigFileParser\File\ParsableFile;
use SamBurns\ConfigFileParser\FileReading\FileContentsRetriever;
use Symfony\Component\Yaml\Parser as YamlParser;

class YamlFile implements ParsableFile
{
    /** @var string */
    private $path;

    /** @var FileContentsRetriever */
    private $fileContentsRetriever;

    /** @var YamlParser */
    private $yamlParser;

    /**
     * @param string                $path
     * @param FileContentsRetriever $fileContentsRetriever
     * @param YamlParser            $yamlParser
     */
    public function __construct($path, FileContentsRetriever $fileContentsRetriever, YamlParser $yamlParser)
    {
        $this->path                  = $path;
        $this->fileContentsRetriever = $fileContentsRetriever;
        $this->yamlParser            = $yamlParser;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $fileContents = $this->fileContentsRetriever->fileGetContents($this->path);
        return $this->yamlParser->parse($fileContents);
    }
}
