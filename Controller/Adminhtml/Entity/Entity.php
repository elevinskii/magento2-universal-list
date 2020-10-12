<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Entity;

use Elevinskii\UniversalList\Controller\Adminhtml\Action;
use Elevinskii\UniversalList\Model\Entity as EntityModel;
use Elevinskii\UniversalList\Model\EntityFactory as EntityModelFactory;
use Elevinskii\UniversalList\Model\ResourceModel\Entity as EntityResModel;
use Elevinskii\UniversalList\Model\ResourceModel\EntityFactory as EntityResModelFactory;
use Magento\Backend\App\Action\Context;

abstract class Entity extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elevinskii_UniversalList::universal_lists_entities';

    /**
     * Active point of backend menu
     *
     * @see initResultPage()
     */
    const ACTIVE_MENU = 'Elevinskii_UniversalList::universal_lists_entities';

    /**
     * @var EntityModelFactory
     */
    private $entityModelFactory;

    /**
     * @var EntityResModelFactory
     */
    private $entityResModelFactory;

    /**
     * Entity constructor
     *
     * @param Context $context
     * @param EntityModelFactory $entityModelFactory
     * @param EntityResModelFactory $entityResModelFactory
     */
    public function __construct(
        Context $context,
        EntityModelFactory $entityModelFactory,
        EntityResModelFactory $entityResModelFactory
    ) {
        parent::__construct($context);

        $this->entityModelFactory = $entityModelFactory;
        $this->entityResModelFactory = $entityResModelFactory;
    }

    /**
     * Retrieve entity model
     *
     * @return EntityModel
     */
    protected function getEntityModel(): EntityModel
    {
        return $this->entityModelFactory->create();
    }

    /**
     * Retrieve entity resource model
     *
     * @return EntityResModel
     */
    protected function getEntityResModel(): EntityResModel
    {
        return $this->entityResModelFactory->create();
    }
}
