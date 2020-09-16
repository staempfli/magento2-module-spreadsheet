Magento 2 Spreadsheet Parser
=============

[![Project Status: Abandoned – Initial development has started, but there has not yet been a stable, usable release; the project has been abandoned and the author(s) do not intend on continuing development.](http://www.repostatus.org/badges/latest/abandoned.svg)](http://www.repostatus.org/#abandoned)

Facts
-----
Parse XLSX, XLSM and CSV Files from Excel

Requirements
------------
- PHP >= 7.0.*
- Magento >= 2.1.*

Compatibility
-------------
- Magento >= 2.1

Usage
-----
Load Uploader and Parser via DI, so they can be used in your method.

```php
$file = $this->uploader->upload(['fileId' => \Magento\ImportExport\Model\Import::FIELD_NAME_SOURCE_FILE]);
$data = $this->parser->readFile($file);
foreach ($data as $index => $values) {
    var_dump($index, $values);
}
```

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/staempfli/magento2-module-spreadsheet/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Staempfli Webteam and all other [contributors](https://github.com/staempfli/magento2-module-spreadsheet/contributors)

License
-------
[Open Software License ("OSL") v. 3.0](https://opensource.org/licenses/OSL-3.0)

Copyright
---------
(c) 2016, Stämpfli AG
