<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml;

use Elevinskii\UniversalList\Model\Attribute as AttrModel;
use Elevinskii\UniversalList\Model\AttributeFactory as AttrModelFactory;
use Elevinskii\UniversalList\Model\Entity as EntityModel;
use Elevinskii\UniversalList\Model\EntityFactory as EntityModelFactory;
use Elevinskii\UniversalList\Model\ResourceModel\Attribute as AttrResModel;
use Elevinskii\UniversalList\Model\ResourceModel\AttributeFactory as AttrResModelFactory;
use Elevinskii\UniversalList\Model\ResourceModel\Entity as EntityResModel;
use Elevinskii\UniversalList\Model\ResourceModel\EntityFactory as EntityResModelFactory;

class Context
{
    /**
     * @var EntityModelFactory
     */
    private $entityModelFactory;

    /**
     * @var EntityResModelFactory
     */
    private $entityResModelFactory;

    /**
     * @var AttrModelFactory
     */
    private $attrModelFactory;

    /**
     * @var AttrResModelFactory
     */
    private $attrResModelFactory;

    /**
     * @param EntityModelFactory $entityModelFactory
     * @param EntityResModelFactory $entityResModelFactory
     * @param AttrModelFactory $attrModelFactory
     * @param AttrResModelFactory $attrResModelFactory
     */
    public function __construct(
        EntityModelFactory $entityModelFactory,
        EntityResModelFactory $entityResModelFactory,
        AttrModelFactory $attrModelFactory,
        AttrResModelFactory $attrResModelFactory
    ) {
        $this->entityModelFactory = $entityModelFactory;
        $this->entityResModelFactory = $entityResModelFactory;
        $this->attrModelFactory = $attrModelFactory;
        $this->attrResModelFactory = $attrResModelFactory;
    }

    /**
     * Retrieve entity model
     *
     * @return EntityModel
     */
    public function getEntityModel(): EntityModel
    {
        return $this->entityModelFactory->create();
    }

    /**
     * Retrieve entity resource model
     *
     * @return EntityResModel
     */
    public function getEntityResModel(): EntityResModel
    {
        return $this->entityResModelFactory->create();
    }

    /**
     * Retrieve attribute model
     *
     * @return AttrModel
     */
    public function getAttrModel(): AttrModel
    {
        return $this->attrModelFactory->create();
    }

    /**
     * Retrieve attribute resource model
     *
     * @return AttrResModel
     */
    public function getAttrResModel(): AttrResModel
    {
        return $this->attrResModelFactory->create();
    }
}
