<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel\UList;

use Elevinskii\UniversalList\Model\UList as Model;
use Elevinskii\UniversalList\Model\ResourceModel\UList as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define models
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
