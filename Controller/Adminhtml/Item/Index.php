<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Item;

use Magento\Backend\Model\View\Result\Page as ResultPage;
use Magento\Backend\Model\View\Result\Redirect as ResultRedirect;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;

class Index extends Item implements HttpGetActionInterface
{
    /**
     * Execute the controller
     *
     * @return ResultRedirect|ResultPage
     */
    public function execute(): ResultInterface
    {
        /** @var ResultRedirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/entity');

        $listId = $this->getRequest()->getParam('list_id');
        if (!$listId) {
            return $resultRedirect;
        }

        $entity = $this->context->getEntityModel();
        $this->context->getEntityResModel()->load($entity, $listId);

        if ($entity->isEmpty()) {
            $this->messageManager->addErrorMessage(
                __('The list with ID=%1 does not exist.', $listId)
            );
            return $resultRedirect;
        }

        return $this->initResultPage([
            __('Universal Lists'),
            $entity->getTitle()
        ]);
    }
}
