<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel\Item;

use Elevinskii\UniversalList\Model\Item as Model;
use Elevinskii\UniversalList\Model\ResourceModel\Item as ResourceModel;
use Magento\Eav\Model\Entity\Collection\AbstractCollection;

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
