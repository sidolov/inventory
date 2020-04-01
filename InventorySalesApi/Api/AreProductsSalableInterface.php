<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventorySalesApi\Api;

/**
 * Service which detects whether a given products quantities are salable for a given stock (stock data + reservations).
 *
 * @api
 */
interface AreProductsSalableInterface
{
    /**
     * Get whether products are salable in requested Qty for given set of SKUs in specified stock.
     *
     * @param string[] $skus ['sku', ..., ...]
     * @param int $stockId
     * @return isProductSalableResultInterface[] TODO: define new interface
     */
    public function execute(array $skus, int $stockId) : array;
}
