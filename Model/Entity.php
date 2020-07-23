<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model;

use Elevinskii\UniversalList\Model\ResourceModel\Entity as ResourceModel;
use Magento\Framework\Model\AbstractModel;

/**
 * @method int|null getListId()
 * @method string|null getTitle()
 * @method string|null getCode()
 * @method int|null getSortOrder()
 */
class Entity extends AbstractModel
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
