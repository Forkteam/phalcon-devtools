<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Developer Tools.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Phalcon\DevTools\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Flash\Direct as FlashDirect;

class FlashProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'flash';

    /**
     * Registers a service provider.
     *
     * @param DiInterface $di
     */
    public function register(DiInterface $di): void
    {
        $cssClasses = [
            'error'   => 'alert alert-danger fade show',
            'success' => 'alert alert-success fade show',
            'notice'  => 'alert alert-info fade show',
            'warning' => 'alert alert-warning fade show',
        ];

        $di->setShared($this->providerName, function () use ($cssClasses) {
            $flash = new FlashDirect();
            $flash->setAutoescape(false);
            $flash->setImplicitFlush(false);
            $flash->setCssClasses($cssClasses);

            return $flash;
        });
    }
}
