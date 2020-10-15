<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel;

use Magento\Backend\Model\Menu\Config as MenuConfig;
use Magento\Framework\App\Cache\Type\Config as ConfigCacheType;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Entity extends AbstractDb
{
    /**
     * @var ConfigCacheType
     */
    private $configCacheType;

    /**
     * @param Context $context
     * @param ConfigCacheType $configCacheType
     * @param string|null $connectionName
     */
    public function __construct(
        Context $context,
        ConfigCacheType $configCacheType,
        string $connectionName = null
    ) {
        parent::__construct($context, $connectionName);
        $this->configCacheType = $configCacheType;
    }

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('universal_list_entity', 'list_id');
    }

    /**
     * Perform actions after object save
     *
     * @param AbstractModel $object
     * @return $this
     */
    protected function _afterSave(AbstractModel $object): self
    {
        $this->configCacheType->remove(MenuConfig::CACHE_MENU_OBJECT);

        return parent::_afterSave($object);
    }

    /**
     * Perform actions after object delete
     *
     * @param AbstractModel $object
     * @return $this
     */
    protected function _afterDelete(AbstractModel $object): self
    {
        $this->configCacheType->remove(MenuConfig::CACHE_MENU_OBJECT);

        return parent::_afterDelete($object);
    }
}
