# php-phar-selfupdate

[![Minimum PHP version: 8.0](https://img.shields.io/badge/php-8.0%2B-blue.svg?color=blue&style=for-the-badge)](https://packagist.org/packages/robertsaupe/php-phar-selfupdate)
[![Packagist Version](https://img.shields.io/packagist/v/robertsaupe/php-phar-selfupdate?color=blue&style=for-the-badge)](https://packagist.org/packages/robertsaupe/php-phar-selfupdate)
[![Packagist Downloads](https://img.shields.io/packagist/dt/robertsaupe/php-phar-selfupdate?color=blue&style=for-the-badge)](https://packagist.org/packages/robertsaupe/php-phar-selfupdate)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=for-the-badge)](LICENSE)

php library for phar selfupdate with a manifest file

## Supporting

[Patreon](https://www.patreon.com/robertsaupe) |
[PayPal](https://www.paypal.com/donate?hosted_button_id=SQMRNY8YVPCZQ) |
[Amazon](https://www.amazon.de/ref=as_li_ss_tl?ie=UTF8&linkCode=ll2&tag=robertsaupe-21&linkId=b79bc86cee906816af515980cb1db95e&language=de_DE)

## Installing

```sh
composer require robertsaupe/php-phar-selfupdate
```

## Getting started

### Update

```php
use Exception;
use robertsaupe\Phar\SelfUpdate\ManifestUpdate;

$updater = new ManifestUpdate('1.0.0', 'path_to_manifest.json');

try {
    $result = $updater->update();
    $newVersion = $updater->getNewVersion();
    $oldVersion = $updater->getOldVersion();
    if ($result) {
        print('Phar has been updated.'.PHP_EOL);
        print('Current version is: '.$newVersion.PHP_EOL);
        print('Previous version was: '.$oldVersion.PHP_EOL);
    } else {
        print('Phar is currently up to date.'.PHP_EOL);
        print('Current version is: '.$oldVersion.PHP_EOL);
    }
} catch (Exception $e) {
    print('Error: '.$e->getMessage().PHP_EOL);
}
```

### Update-Check

```php
use Exception;
use robertsaupe\Phar\SelfUpdate\ManifestUpdate;

$updater = new ManifestUpdate('1.0.0', 'path_to_manifest.json');

print('The current local version is: '.$updater->getCurrentLocalVersion().PHP_EOL);

try {
    $result = $updater->getCurrentRemoteVersion();
    if ($result) {
        print('The current '.$updater->getStability().' build available remotely is: '.$result.PHP_EOL);
    } else {
        print('You have the current '.$updater->getStability().' build installed.'.PHP_EOL);
    }
} catch (Exception $e) {
    print('Error: '.$e->getMessage().PHP_EOL);
}
```

### Rollback

```php
use Exception;
use robertsaupe\Phar\SelfUpdate\ManifestUpdate;

$updater = new ManifestUpdate('1.0.0', 'path_to_manifest.json');

try {
    $result = $updater->rollback();
    if ($result) {
        print('Phar has been rolled back to prior version.'.PHP_EOL);
    } else {
        print('Rollback failed for reasons unknown.'.PHP_EOL);
    }
} catch (Exception $e) {
    print('Error: '.$e->getMessage().PHP_EOL);
}
```

### manifest.json

```json
{
  "1.0.1": {
    "version": "1.0.1",
    "url": "url_or_path_to\/1.0.1\/file.phar",
    "sha1": "4f0dcc31a49417ee459abe5e73216f84a131fef3",
    "sha256": "2e82de11605f73732ddf0948a6c2b7235cb139bb974c1ab88b1b5dc21fcb571f",
    "sha512": "b356751b07e4626e043f65aeb85bf00b5a9933142652a17122abff0d43db3ce1371f212525b6aac011aa096592a5bcc85f14659fc2cd541f31ec2f4089931e91"
  },
  "1.0.0": {
    "version": "1.0.0",
    "url": "url_or_path_to\/1.0.0\/file.phar",
    "sha1": "95743c0d18bde06ee15878092dd2edbe6f1d2e76",
    "sha256": "5555f3d1f0567909e07bfc7cda29383cd63d9ad3d76aac88f43509904d916c23",
    "sha512": "c9bf8e3712cb913dc067533909117ad17722ef6b4c869e47c1ce8c56cda2a1d182657063eaa713cca331584f2ac548465e87d88895779b4da0b52c62b9f70a2a"
  }
}
```

### HashAlgo

#### Bash

```bash
sha1sum file.phar
sha256sum file.phar
sha512sum file.phar
```

#### PHP

```php
$sha1 = hash_file('sha1', 'file.phar');
$sha256 = hash_file('256', 'file.phar');
$sha512 = hash_file('512', 'file.phar');
```

## Credits

- [humbug/phar-updater](https://github.com/humbug/phar-updater) for basic phar updating
  - Pádraic Brady <http://blog.astrumfutura.com>
- [laravel-zero/phar-updater](https://github.com/laravel-zero/phar-updater) for the fork
  - Owen Voke <development@voke.dev>
- [ManifestStrategy](https://github.com/humbug/phar-updater/pull/37)
  - Patrick Dawkins <https://patrickdawkins.com>
  - Pádraic Brady <padraic.brady@gmail.com>
