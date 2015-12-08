<?php
namespace SamBurns\ConfigFileParser\Test;

use SamBurns\ConfigFileParser\ConfigFileParser;
use PHPUnit_Framework_TestCase as TestCase;

class ReadingVariousFileFormatTest extends TestCase
{
    /**
     * @dataProvider provideFilenames
     *
     * @param string $filename
     * @param string $errorMessage
     */
    public function testReadingFileContents($filename, $errorMessage)
    {
        // ARRANGE
        $configFileParser = new ConfigFileParser();
        $expectedArray = ['node1' => ['node2' => 'value']];

        // ACT
        $arrayReadFromFile = $configFileParser->parseConfigFile(TEST_DIR . '/fixtures/file_formats/' . $filename);

        // ASSERT
        $this->assertEquals($expectedArray, $arrayReadFromFile, $errorMessage);
    }

    public function provideFilenames(): array
    {
        return [
            ['config.ini',  'Error parsing .ini config file'],
            ['config.json', 'Error parsing .json config file'],
            ['config.php',  'Error parsing .php config file'],
            ['config.yml',  'Error parsing .yml config file'],
        ];
    }
}
