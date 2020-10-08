<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model;

use Elevinskii\UniversalList\Model\ResourceModel\Attribute as ResourceModel;
use Magento\Eav\Model\Entity\Attribute as EavAttribute;

/**
 * @method int|null getListId()
 * @method $this setListId(int $listId)
 */
class Attribute extends EavAttribute
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
