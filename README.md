[![Build Status](https://travis-ci.org/Sam-Burns/config-file-parser.svg?branch=master)](https://travis-ci.org/Sam-Burns/config-file-parser)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Sam-Burns/config-file-parser/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Sam-Burns/config-file-parser/?branch=master)
[![Coverage Status](https://coveralls.io/repos/Sam-Burns/config-file-parser/badge.svg?branch=master&service=github)](https://coveralls.io/github/Sam-Burns/config-file-parser?branch=master)

Config File Parser
==================

Creates arrays based on config files.  Works with YAML, JSON, .ini files and PHP 'return array' files.  Use as follows:

```php
$parser = new \SamBurns\ConfigFileParser\ConfigFileParser();
$fileContentsAsArray = $parsableFileFactory->parseConfigFile($pathToFileOfSupportedType);
```
