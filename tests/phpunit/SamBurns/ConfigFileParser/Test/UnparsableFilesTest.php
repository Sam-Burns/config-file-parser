<?php
namespace SamBurns\ConfigFileParser\Test;

use SamBurns\ConfigFileParser\ConfigFileParser;
use PHPUnit_Framework_TestCase as TestCase;

class UnparsableFilesTest extends TestCase
{
    /**
     * @expectedException \SamBurns\ConfigFileParser\Exception\FileFormatNotParsable
     */
    public function testGetExceptionForUnreadableFiles()
    {
        $configFileParser = new ConfigFileParser();
        $configFileParser->parseConfigFile('file.bad-extension');
    }
}
