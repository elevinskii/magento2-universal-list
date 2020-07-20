<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model;

use Elevinskii\UniversalList\Model\ResourceModel\UList as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class UList extends AbstractModel
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }
}
