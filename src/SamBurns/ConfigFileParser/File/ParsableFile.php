<?php
namespace SamBurns\ConfigFileParser\File;

interface ParsableFile
{
    public function toArray(): array;
}
