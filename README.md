# Coinprism-PHP

This project provides client library written in PHP for accessing coinprism.com service.

## Installation

Use composer to download and install coinprism-php:

```
php composer.phar config repositories.codestillery/coinprism-php vcs "https://github.com/Codestillery/coinprism-php"
php composer.phar require codestillery/coinprism-php:dev-master
```

## Use

Below is example script using apiary service as API mock.

```
require_once "vendor/autoload.php";

use Codestillery\Coinprism\Toolkit;

$toolkit = Toolkit::getInstance("https://private-anon-42ec55107-coinprism.apiary-mock.com");
$kit = $toolkit->getBlockchainApi();
$out = $kit->getBalance("a12345", "json");

var_dump($out);
```

## Legal

This project is licensed under terms of GNU Lesser General Public License version 3.0 or later.
