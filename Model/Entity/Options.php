<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Model\Entity;

use Elevinskii\UniversalList\Model\Entity as EntityModel;
use Elevinskii\UniversalList\Model\ResourceModel\Entity\CollectionFactory as EntityCollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

class Options implements OptionSourceInterface
{
    /**
     * @var EntityCollectionFactory
     */
    private $entityCollectionFactory;

    /**
     * Options constructor
     *
     * @param EntityCollectionFactory $entityCollectionFactory
     */
    public function __construct(
        EntityCollectionFactory $entityCollectionFactory
    ) {
        $this->entityCollectionFactory = $entityCollectionFactory;
    }

    /**
     * Return array of options as value-label pairs
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        $options = [];

        /** @var EntityModel $entity */
        foreach ($this->entityCollectionFactory->create() as $entity) {
            $options[] = [
                'value' => $entity->getId(),
                'label' => $entity->getTitle()
            ];
        }

        return $options;
    }
}
