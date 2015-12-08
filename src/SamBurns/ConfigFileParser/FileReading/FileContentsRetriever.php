<?php
namespace SamBurns\ConfigFileParser\FileReading;

use SamBurns\ConfigFileParser\Exception\FileNotReadable;

class FileContentsRetriever
{
    /**
     * @throws FileNotReadable
     */
    public function fileGetContents(string $path): string
    {
        if (!is_readable($path)) {
            throw FileNotReadable::constructWithPath($path);
        }
        return file_get_contents($path);
    }
}
