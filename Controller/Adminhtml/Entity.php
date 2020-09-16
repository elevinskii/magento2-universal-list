<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml;

use Elevinskii\UniversalList\Model\EntityFactory as EntityModelFactory;
use Elevinskii\UniversalList\Model\ResourceModel\EntityFactory as EntityResModelFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page as ResultPage;

abstract class Entity extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elevinskii_UniversalList::universal_lists_entities';

    /**
     * @var EntityModelFactory
     */
    protected $entityModelFactory;

    /**
     * @var EntityResModelFactory
     */
    protected $entityResModelFactory;

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
     * Initialization of a backend page
     *
     * @param string[] $titles
     * @return ResultPage
     */
    protected function initResultPage(array $titles = []): ResultPage
    {
        /** @var ResultPage $resultPage */
        $resultPage = $this->resultFactory->create($this->resultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Elevinskii_UniversalList::universal_lists_entities');

        foreach ($titles as $title) {
            $resultPage->getConfig()->getTitle()->prepend($title);
        }

        return $resultPage;
    }
}
