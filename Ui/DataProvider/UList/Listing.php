<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Ui\DataProvider\UList;

use Elevinskii\UniversalList\Model\ResourceModel\UList\Collection;
use Elevinskii\UniversalList\Model\ResourceModel\UList\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class Listing extends AbstractDataProvider
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
     * Listing constructor
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
}
