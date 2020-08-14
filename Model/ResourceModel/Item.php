<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel;

use Magento\Eav\Model\Entity\AbstractEntity;
use Magento\Eav\Model\Entity\Type as EavTypeModel;
use Magento\Framework\Exception\LocalizedException;

class Item extends AbstractEntity
{
    /**
     * Eav entity type
     */
    const ENTITY_TYPE = 'universal_list_item';

    /**
     * Retrieve current entity config
     *
     * @return EavTypeModel
     * @throws LocalizedException
     */
    public function getEntityType()
    {
        if (empty($this->_type)) {
            $this->setType(self::ENTITY_TYPE);
        }

        return parent::getEntityType();
    }
}
