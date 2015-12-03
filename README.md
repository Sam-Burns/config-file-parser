Config File Parser
==================

Creates arrays based on config files.  Works with YAML, JSON, .ini files and PHP 'return array' files.  Use as follows:

```php
$parser = new \SamBurns\ConfigFileParser\ConfigFileParser();
$fileContentsAsArray = $parsableFileFactory->parseConfigFile($pathToFileOfSupportedType);
```
