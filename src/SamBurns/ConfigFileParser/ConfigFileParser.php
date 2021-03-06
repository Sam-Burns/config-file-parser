<?php
namespace SamBurns\ConfigFileParser;

use SamBurns\ConfigFileParser\Exception\FileFormatNotParsable;
use SamBurns\ConfigFileParser\Exception\FileNotReadable;
use SamBurns\ConfigFileParser\File\ParsableFile;
use SamBurns\ConfigFileParser\File\ParsableFile\IniFile;
use SamBurns\ConfigFileParser\File\ParsableFile\JsonFile;
use SamBurns\ConfigFileParser\File\ParsableFile\PhpArrayFile;
use SamBurns\ConfigFileParser\File\ParsableFile\YamlFile;
use SamBurns\ConfigFileParser\FileReading\FileContentsRetriever;
use Symfony\Component\Yaml\Parser as YamlParser;

class ConfigFileParser
{
    /**
     * @throws FileFormatNotParsable
     * @throws FileNotReadable
     */
    public function parseConfigFile(string $pathToFile): array
    {
        $file = $this->getParsableFileFromPath($pathToFile);
        return $file->toArray();
    }

    /**
     * @throws FileFormatNotParsable
     */
    private function getParsableFileFromPath(string $pathToFile): ParsableFile
    {
        $fileExtension = pathinfo($pathToFile)['extension'];

        $fileContentsRetriever = new FileContentsRetriever();

        switch ($fileExtension) {
            case ('ini'):
                return new IniFile($pathToFile, $fileContentsRetriever);
            case ('php'):
                return new PhpArrayFile($pathToFile);
            case ('json'):
                return new JsonFile($pathToFile, $fileContentsRetriever);
            case ('yaml'):
                return new YamlFile($pathToFile, $fileContentsRetriever, new YamlParser());
            case ('yml'):
                return new YamlFile($pathToFile, $fileContentsRetriever, new YamlParser());
            default:
                throw FileFormatNotParsable::constructWithFilePath($pathToFile);
        }
    }
}
