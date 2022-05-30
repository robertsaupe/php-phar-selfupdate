<?php

declare(strict_types=1);

/*
 * This file is part of the robertsaupe/php-phar-selfupdate package.
 *
 * (c) Robert Saupe <mail@robertsaupe.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace robertsaupe\Phar\SelfUpdate;

use Humbug\SelfUpdate\Updater;
use robertsaupe\Phar\SelfUpdate\ManifestStrategy;

class ManifestUpdate {

    private Updater $updater;

    public function __construct(
        private string $version,
        private string $manifest,
        private string $hashAlgo = ManifestStrategy::SHA512,
        private string $stability = ManifestStrategy::STABLE,
        ) {
            $manifestStrategy = new ManifestStrategy();
            $manifestStrategy->setCurrentLocalVersion($this->version);
            $manifestStrategy->setManifestUrl($this->manifest);

            switch ($this->hashAlgo) {
                case ManifestStrategy::SHA1:
                    $manifestStrategy->useSha1();
                    break;

                case ManifestStrategy::SHA256:
                    $manifestStrategy->useSha256();
                    break;
                
                case ManifestStrategy::SHA512:
                default:
                    $manifestStrategy->useSha512();
                    break;
            }
    
            $manifestStrategy->setStability($this->stability);
    
            $this->updater = new Updater(null, false);
            $this->updater->setStrategyObject($manifestStrategy);
    }

    public function rollback(): bool {
        return $this->updater->rollback();
    }

    public function hasUpdate(): bool {
        return $this->updater->hasUpdate();
    }

    public function getHashAlgo(): string {
        return $this->hashAlgo;
    }

    public function getStability(): string {
        return $this->stability;
    }

    public function getCurrentLocalVersion(): string {
        return $this->version;
    }

    public function getCurrentRemoteVersion(): string|false {
        if ($this->hasUpdate()) {
            return $this->updater->getNewVersion();
        } else {
            return false;
        }
    }

    public function getOldVersion(): string {
        return $this->updater->getOldVersion();
    }

    public function getNewVersion(): string {
        return $this->updater->getNewVersion();
    }

    public function update(): bool {
        return $this->updater->update();
    }

}

?>