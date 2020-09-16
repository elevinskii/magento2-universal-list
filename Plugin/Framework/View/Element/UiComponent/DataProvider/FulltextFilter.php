<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Plugin\Framework\View\Element\UiComponent\DataProvider;

use Elevinskii\UniversalList\Model\ResourceModel\Attribute\Grid\Collection as AttributeGridCollection;
use Magento\Framework\Api\Filter;
use Magento\Framework\Data\Collection as DataCollection;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\UiComponent\DataProvider\FulltextFilter as BaseFulltextFilter;

class FulltextFilter
{
    /**
     * Process fulltext filter in the attribute backend grid
     *
     * @param BaseFulltextFilter $fulltextFilter
     * @param DataCollection $collection
     * @param Filter $filter
     *
     * @throws LocalizedException
     * @return void
     */
    public function beforeApply(
        BaseFulltextFilter $fulltextFilter,
        DataCollection $collection,
        Filter $filter
    ): void {
        if ($collection instanceof AttributeGridCollection) {
            $condition = ['like' => sprintf('%%%s%%', $filter->getValue())];
            $collection->addFieldToFilter(
                ['attribute_code', 'frontend_label'],
                [$condition, $condition]
            );
        }
    }
}
