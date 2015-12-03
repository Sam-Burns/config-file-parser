<?php
namespace SamBurns\ConfigFileParser\FileParsing;

use SamBurns\ConfigFileParser\Exception\FileFormatNotParsable;
use SamBurns\ConfigFileParser\FileParsing\ParsableFile\IniFile;
use SamBurns\ConfigFileParser\FileParsing\ParsableFile\JsonFile;
use SamBurns\ConfigFileParser\FileParsing\ParsableFile\PhpArrayFile;
use SamBurns\ConfigFileParser\FileParsing\ParsableFile\YamlFile;
use SamBurns\ConfigFileParser\FileReading\FileContentsRetriever;
use Symfony\Component\Yaml\Parser as YamlParser;

class ParsableFileFactory
{
    /**
     * @throws FileFormatNotParsable
     *
     * @param string $pathToFile
     * @return ParsableFile
     */
    public function getParsableFileFromPath($pathToFile)
    {
        $fileExtension = pathinfo($pathToFile)['extension'];

        switch ($fileExtension) {
            case ('ini'):
                return $this->buildIniFile($pathToFile);
            case ('php'):
                return $this->buildPhpArrayFile($pathToFile);
            case ('json'):
                return $this->buildJsonFile($pathToFile);
            case ('yaml'):
                return $this->buildYamlFile($pathToFile);
            case ('yml'):
                return $this->buildYamlFile($pathToFile);
            default:
                throw FileFormatNotParsable::constructWithFilePath($pathToFile);
        }
    }

    /**
     * @param string $path
     * @return IniFile
     */
    private function buildIniFile($path)
    {
        $fileContentsRetriever = new FileContentsRetriever();
        return new IniFile($path, $fileContentsRetriever);
    }

    /**
     * @param string $path
     * @return PhpArrayFile
     */
    private function buildPhpArrayFile($path)
    {
        return new PhpArrayFile($path);
    }

    /**
     * @param string $path
     * @return JsonFile
     */
    private function buildJsonFile($path)
    {
        $fileContentsRetriever = new FileContentsRetriever();
        return new JsonFile($path, $fileContentsRetriever);
    }

    /**
     * @param string $path
     * @return YamlFile
     */
    private function buildYamlFile($path)
    {
        $fileContentsRetriever = new FileContentsRetriever();
        $yamlParser = new YamlParser();
        return new YamlFile($path, $fileContentsRetriever, $yamlParser);
    }
}
