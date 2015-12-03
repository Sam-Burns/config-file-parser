<?php
namespace SamBurns\ConfigFileParser\File\ParsableFile;

use SamBurns\ConfigFileParser\File\ParsableFile;

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
