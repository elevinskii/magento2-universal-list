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
