<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Attribute extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('eav_attribute', 'attribute_id');
    }
}
