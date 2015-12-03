<?php
namespace SamBurns\ConfigFileParser\File;

interface ParsableFile
{
    /**
     * @return array
     */
    public function toArray();
}
