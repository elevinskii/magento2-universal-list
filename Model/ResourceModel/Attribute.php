<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel;

use Elevinskii\UniversalList\Model\Attribute as AttributeModel;
use Elevinskii\UniversalList\Model\ResourceModel\Item as ItemResModel;
use Magento\Eav\Model\Config as EavConfig;
use Magento\Eav\Model\ResourceModel\Entity\Attribute as EavAttribute;
use Magento\Eav\Model\ResourceModel\Entity\Type as EavType;
use Magento\Framework\DB\Select as DbSelect;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Store\Model\StoreManagerInterface;

class Attribute extends EavAttribute
{
    /**
     * @var EavConfig
     */
    private $eavConfig;

    /**
     * Attribute constructor
     *
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param EavType $eavEntityType
     * @param EavConfig $eavConfig
     * @param string|null $connectionName
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        EavType $eavEntityType,
        EavConfig $eavConfig,
        string $connectionName = null
    ) {
        parent::__construct($context, $storeManager, $eavEntityType, $connectionName);
        $this->eavConfig = $eavConfig;
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

    /**
     * Perform actions before object save
     *
     * @param AttributeModel|AbstractModel $object
     * @return $this
     * @throws LocalizedException
     */
    protected function _beforeSave(AbstractModel $object): self
    {
        $eavType = $this->eavConfig->getEntityType(ItemResModel::ENTITY_TYPE);
        $object->setEntityTypeId($eavType->getId());

        return parent::_beforeSave($object);
    }

    /**
     * Perform actions before object delete
     *
     * @param AttributeModel|AbstractModel $object
     * @return AbstractDb
     *
     * @throws CouldNotDeleteException
     * @throws LocalizedException
     */
    protected function _beforeDelete(AbstractModel $object): AbstractDb
    {
        $eavType = $this->eavConfig->getEntityType(ItemResModel::ENTITY_TYPE);
        if ($object->getId() && $object->getEntityTypeId() != $eavType->getId()) {
            throw new CouldNotDeleteException(__('The attribute with foreign entity type can\'t be deleted.'));
        }

        return parent::_beforeDelete($object);
    }
}
