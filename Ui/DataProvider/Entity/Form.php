<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Ui\DataProvider\Entity;

use Elevinskii\UniversalList\Model\Entity as EntityModel;
use Elevinskii\UniversalList\Model\ResourceModel\Entity\Collection;
use Elevinskii\UniversalList\Model\ResourceModel\Entity\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class Form extends AbstractDataProvider
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var Collection
     */
    protected $collection;

    /**
     * Form constructor
     *
     * @param CollectionFactory $collectionFactory
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Retrieve the collection
     *
     * @return Collection
     */
    public function getCollection(): Collection
    {
        if (!$this->collection) {
            $this->collection = $this->collectionFactory->create();
        }

        return $this->collection;
    }

    /**
     * Retrieve data
     *
     * @return array
     */
    public function getData(): array
    {
        $data = [];

        /** @var EntityModel $entity */
        foreach ($this->getCollection()->getItems() as $entity) {
            $data[$entity->getId()] = $entity->getData();
        }

        return $data;
    }
}
