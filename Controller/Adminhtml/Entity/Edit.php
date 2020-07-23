<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Entity;

use Elevinskii\UniversalList\Controller\Adminhtml\Entity as AbstractEntity;
use Elevinskii\UniversalList\Model\EntityFactory as EntityModelFactory;
use Elevinskii\UniversalList\Model\ResourceModel\EntityFactory as EntityResModelFactory;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page as ResultPage;
use Magento\Backend\Model\View\Result\Redirect as ResultRedirect;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;

class Edit extends AbstractEntity implements HttpGetActionInterface
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
     * Edit constructor
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
     * Execute the controller
     *
     * @return ResultRedirect|ResultPage
     */
    public function execute(): ResultInterface
    {
        /** @var ResultRedirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*');

        $listId = $this->getRequest()->getParam('list_id');
        if (!$listId) {
            return $resultRedirect;
        }

        $entity = $this->entityModelFactory->create();
        $this->entityResModelFactory->create()->load($entity, $listId);

        if ($entity->isEmpty()) {
            $this->messageManager->addErrorMessage(
                __('The list with ID=%1 does not exist.', $listId)
            );
            return $resultRedirect;
        }

        return $this->initResultPage($entity->getTitle());
    }
}
