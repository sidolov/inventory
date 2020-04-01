<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventorySales\Model;

use Magento\Framework\Exception\LocalizedException;
use Magento\InventorySalesApi\Api\AreProductsSalableForRequestedQtyInterface;
use Magento\InventorySalesApi\Api\IsProductSalableForRequestedQtyInterface;
use Psr\Log\LoggerInterface;

/**
 * @inheritDoc
 */
class AreProductsSalableForRequestedQty implements AreProductsSalableForRequestedQtyInterface
{
    /**
     * @var IsProductSalableForRequestedQtyInterface
     */
    private $isProductSalableForRequestedQtyInterface;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param IsProductSalableForRequestedQtyInterface $isProductSalableForRequestedQtyInterface
     * @param LoggerInterface $logger
     */
    public function __construct(
        IsProductSalableForRequestedQtyInterface $isProductSalableForRequestedQtyInterface,
        LoggerInterface $logger
    ) {
        $this->isProductSalableForRequestedQtyInterface = $isProductSalableForRequestedQtyInterface;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function execute(array $skuRequests, int $stockId): array // use return array if supported
    {
        $results = [];
        foreach ($skuRequests as $sku => $quantity) {
            try { // TODO: remove try/catch
                $results[$sku] = $this->isProductSalableForRequestedQtyInterface->execute(
                    (string)$sku,
                    $stockId,
                    (float)$quantity
                );
            } catch (LocalizedException $e) {
                $this->logger->error($e->getLogMessage());
            }
        }

        return $results;
    }
}
