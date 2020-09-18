<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel;

use Elevinskii\UniversalList\Model\ResourceModel\Item as ItemResModel;
use Magento\Eav\Model\Config as EavConfig;
use Magento\Framework\DB\Select as DbSelect;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Attribute extends AbstractDb
{
    /**
     * @var EavConfig
     */
    private $eavConfig;

    /**
     * Attribute constructor
     *
     * @param Context $context
     * @param EavConfig $eavConfig
     * @param string|null $connectionName
     */
    public function __construct(
        Context $context,
        EavConfig $eavConfig,
        string $connectionName = null
    ) {
        parent::__construct($context, $connectionName);
        $this->eavConfig = $eavConfig;
    }

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('eav_attribute', 'attribute_id');
    }

    /**
     * Retrieve select object for load object data
     *
     * @param string $field
     * @param mixed $value
     * @param AbstractModel $object
     *
     * @return DbSelect
     * @throws LocalizedException
     */
    protected function _getLoadSelect($field, $value, $object): DbSelect
    {
        $select = parent::_getLoadSelect($field, $value, $object);
        $eavType = $this->eavConfig->getEntityType(ItemResModel::ENTITY_TYPE);

        return $select->where('entity_type_id = ?', $eavType->getId());
    }
}
