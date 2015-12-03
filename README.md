Config File Parser
==================

Creates arrays based on config files.  Works with YAML, JSON, .ini files and PHP 'return array' files.  Use as follows:

```php
use SamBurns\ConfigFileParser\FileParsing\ParsableFileFactory;

$parsableFileFactory = new ParsableFileFactory();
$parsableFile = $parsableFileFactory->getParsableFileFromPath($pathToFileOfSupportedType);
$fileContentsAsArray = $parsableFile->toArray();
```
