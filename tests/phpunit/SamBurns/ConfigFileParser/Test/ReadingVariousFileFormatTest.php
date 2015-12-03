<?php
namespace SamBurns\ConfigFileParser\Test;

use SamBurns\ConfigFileParser\FileParsing\ParsableFileFactory;
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
        $parsableFileFactory = new ParsableFileFactory();
        $parsableFile = $parsableFileFactory->getParsableFileFromPath(
            TEST_DIR . '/fixtures/file_formats/' . $filename
        );
        $expectedArray = ['node1' => ['node2' => 'value']];

        // ACT
        $arrayReadFromFile = $parsableFile->toArray();

        // ASSERT
        $this->assertEquals($expectedArray, $arrayReadFromFile, $errorMessage);
    }

    public function provideFilenames()
    {
        return [
            ['config.ini',  'Error parsing .ini config file'],
            ['config.json', 'Error parsing .json config file'],
            ['config.php',  'Error parsing .php config file'],
            ['config.yml',  'Error parsing .yml config file'],
        ];
    }
}
