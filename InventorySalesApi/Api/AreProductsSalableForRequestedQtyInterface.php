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
interface AreProductsSalableForRequestedQtyInterface
{
    /**
     * Get whether products are salable in requested Qty for given set of SKUs in specified stock.
     *
     * @param isProductSalableForReqestedQtyRequestInterface[] $skuRequests TODO: define new interface
     * @param int $stockId
     * @return isProductSalableForReqestedQtyResultInterface[] TODO: define new interface
     */
    public function execute(array $skuRequests, int $stockId) : array;
}
