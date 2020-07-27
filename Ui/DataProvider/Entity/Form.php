<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Ui\DataProvider\Entity;

use Elevinskii\UniversalList\Model\Entity as EntityModel;
use Elevinskii\UniversalList\Ui\DataProvider\Entity as AbstractEntity;

class Form extends AbstractEntity
{
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
