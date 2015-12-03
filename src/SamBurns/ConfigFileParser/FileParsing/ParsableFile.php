<?php
namespace SamBurns\ConfigFileParser\FileParsing;

interface ParsableFile
{
    /**
     * @return array
     */
    public function toArray();
}
