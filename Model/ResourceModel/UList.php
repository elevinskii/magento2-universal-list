<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class UList extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('universal_list', 'list_id');
    }
}
