<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Plugin\Backend\Model\Menu\Config;

use Elevinskii\UniversalList\Model\Entity as EntityModel;
use Elevinskii\UniversalList\Model\ResourceModel\Entity\CollectionFactory as EntityCollectionFactory;
use Magento\Backend\Model\Menu\Config\Reader as BaseReader;

class Reader
{
    /**
     * @var EntityCollectionFactory
     */
    private $entityCollectionFactory;

    /**
     * @param EntityCollectionFactory $entityCollectionFactory
     */
    public function __construct(
        EntityCollectionFactory $entityCollectionFactory
    ) {
        $this->entityCollectionFactory = $entityCollectionFactory;
    }

    /**
     * Insert entity list to backend menu
     *
     * @param BaseReader $reader
     * @param array $output
     *
     * @return array
     */
    public function afterRead(
        BaseReader $reader,
        array $output
    ): array {
        $entityCollection = $this->entityCollectionFactory->create();

        /** @var EntityModel $entity */
        foreach ($entityCollection as $entity) {
            $output[] = [
                'type'      => 'add',
                'id'        => 'Elevinskii_UniversalList::universal_lists_items_' . $entity->getCode(),
                'title'     => $entity->getTitle(),
                'module'    => 'Elevinskii_UniversalList',
                'sortOrder' => $entity->getSortOrder(),
                'parent'    => 'Elevinskii_UniversalList::universal_lists_items',
                'action'    => sprintf('universal_list/item/index/list_id/%d/', $entity->getId()),
                'resource'  => 'Elevinskii_UniversalList::universal_lists_items'
            ];
        }

        return $output;
    }
}
