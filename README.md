# php-phar-selfupdate

[![Minimum PHP version: 8.0](https://img.shields.io/badge/php-8.0%2B-blue.svg?color=blue&style=for-the-badge)](https://packagist.org/packages/robertsaupe/php-phar-selfupdate)
[![Packagist Version](https://img.shields.io/packagist/v/robertsaupe/php-phar-selfupdate?color=blue&style=for-the-badge)](https://packagist.org/packages/robertsaupe/php-phar-selfupdate)
[![Packagist Downloads](https://img.shields.io/packagist/dt/robertsaupe/php-phar-selfupdate?color=blue&style=for-the-badge)](https://packagist.org/packages/robertsaupe/php-phar-selfupdate)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=for-the-badge)](LICENSE)

php library for phar selfupdate with a manifest file

## Installing

```sh
composer require robertsaupe/php-phar-selfupdate
```

## Getting started

### Usage

```php
use robertsaupe\Phar\SelfUpdate\ManifestUpdate;

$update = new ManifestUpdate('1.0.0', 'path_to_manifest.json');
```

## Credits

- [humbug/phar-updater](https://github.com/humbug/phar-updater) for basic phar updating
  - Pádraic Brady <http://blog.astrumfutura.com>
- [laravel-zero/phar-updater](https://github.com/laravel-zero/phar-updater) for the fork
  - Owen Voke <development@voke.dev>
- [ManifestStrategy](https://github.com/humbug/phar-updater/pull/37)
  - Patrick Dawkins <https://patrickdawkins.com>
  - Pádraic Brady <padraic.brady@gmail.com>
