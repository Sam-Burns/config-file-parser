<?php
namespace SamBurns\ConfigFileParser\FileParsing\ParsableFile;

use SamBurns\ConfigFileParser\FileParsing\ParsableFile;

class PhpArrayFile implements ParsableFile
{
    /** @var string */
    private $path;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return require $this->path;
    }
}
