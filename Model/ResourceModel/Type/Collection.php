<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel\Type;

use Elevinskii\UniversalList\Model\Type as Model;
use Elevinskii\UniversalList\Model\ResourceModel\Type as ResourceModel;
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
