<?php
namespace SamBurns\ConfigFileParser\Test;

use SamBurns\ConfigFileParser\FileParsing\ParsableFile\JsonFile;
use SamBurns\ConfigFileParser\FileReading\FileContentsRetriever;
use PHPUnit_Framework_TestCase as TestCase;

class SimpleFileReadingTest extends TestCase
{
    public function testCanReadFile()
    {
        // ARRANGE
        $fileContentsRetriever = new FileContentsRetriever();
        $jsonFile = new JsonFile(TEST_DIR . '/fixtures/simple_readable_file/config.json', $fileContentsRetriever);
        $expectedArray = ['node1' => ['node2' => 'value']];

        // ACT
        $fileContents = $jsonFile->toArray();

        // ASSERT
        $this->assertEquals($expectedArray, $fileContents);
    }
}
