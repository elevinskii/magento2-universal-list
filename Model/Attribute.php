<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model;

use Elevinskii\UniversalList\Model\ResourceModel\Attribute as ResourceModel;
use Magento\Framework\Model\AbstractModel;

/**
 * @method int|null getAttributeId()
 * @method int|null getEntityTypeId()
 * @method string|null getAttributeCode()
 * @method string|null getAttributeModel()
 * @method string|null getBackendModel()
 * @method string|null getBackendType()
 * @method string|null getBackendTable()
 * @method string|null getFrontendModel()
 * @method string|null getFrontendInput()
 * @method string|null getFrontendLabel()
 * @method string|null getFrontendClass()
 * @method string|null getSourceModel()
 * @method bool|null getIsRequired()
 * @method bool|null getIsUserDefined()
 * @method string|null getDefaultValue()
 * @method bool|null getIsUnique()
 * @method string|null getNote()
 * @method int|null getListId()
 *
 * @method $this setAttributeId(int $attributeId)
 * @method $this setEntityTypeId(int $entityTypeId)
 * @method $this setAttributeCode(string $attributeCode)
 * @method $this setAttributeModel(string $attributeModel)
 * @method $this setBackendModel(string $backendModel)
 * @method $this setBackendType(string $backendType)
 * @method $this setBackendTable(string $backendTable)
 * @method $this setFrontendModel(string $frontendModel)
 * @method $this setFrontendInput(string $frontendInput)
 * @method $this setFrontendLabel(string $frontendLabel)
 * @method $this setFrontendClass(string $frontendClass)
 * @method $this setSourceModel(string $sourceModel)
 * @method $this setIsRequired(bool $isRequired)
 * @method $this setIsUserDefined(bool $isUserDefined)
 * @method $this setDefaultValue(string $defaultValue)
 * @method $this setIsUnique(bool $isUnique)
 * @method $this setNote(string $note)
 * @method $this setListId(int $listId)
 */
class Attribute extends AbstractModel
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
