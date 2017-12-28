<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Inventory\Model;

/**
 * Extension point for reservation cleanup (Service Provider Interface - SPI).
 * Provide own implementation of this interface if you would like to replace cleanup strategy.
 *
 * @api
 */
interface ReservationCleanupInterface
{
    /**
     * Clean reservation table to prevent overloading.
     *
     * @return void
     */
    public function execute();
}