<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\ResourceModel\Attribute\Grid;

use Elevinskii\UniversalList\Model\ResourceModel\Item as ItemResModel;
use Magento\Eav\Model\Config as EavConfig;
use Magento\Eav\Model\ResourceModel\Entity\Attribute as EavAttributeResModel;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Psr\Log\LoggerInterface;

class Collection extends SearchResult
{
    /**
     * @var EavConfig
     */
    private $eavConfig;

    /**
     * Collection constructor
     *
     * @param EntityFactoryInterface $entityFactory
     * @param LoggerInterface $logger
     * @param FetchStrategyInterface $fetchStrategy
     * @param ManagerInterface $manager
     * @param EavConfig $eavConfig
     * @param string $mainTable
     * @param string $resourceModel
     *
     * @throws LocalizedException
     */
    public function __construct(
        EntityFactoryInterface $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $manager,
        EavConfig $eavConfig,
        string $mainTable = 'eav_attribute',
        string $resourceModel = EavAttributeResModel::class
    ) {
        $this->eavConfig = $eavConfig;

        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $manager,
            $mainTable,
            $resourceModel
        );
    }

    /**
     * Join additional attribute table
     *
     * @return $this
     * @throws LocalizedException
     */
    protected function _initSelect(): self
    {
        $eavType = $this->eavConfig->getEntityType(ItemResModel::ENTITY_TYPE);

        $this->addBindParam('entity_type_id', $eavType->getId());
        $this->getSelect()->where('main_table.entity_type_id = :entity_type_id');

        $additionalTable = $eavType->getAdditionalAttributeTable();
        if ($additionalTable) {
            $this->getSelect()->join(
                ['additional_table' => $this->getTable($additionalTable)],
                'additional_table.attribute_id = main_table.attribute_id'
            );
        }

        return parent::_initSelect();
    }
}
