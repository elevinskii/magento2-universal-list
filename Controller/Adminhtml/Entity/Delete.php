<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Entity;

use Elevinskii\UniversalList\Controller\Adminhtml\Entity as AbstractEntity;
use Exception;
use Magento\Backend\Model\View\Result\Redirect as ResultRedirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\Http as Request;

class Delete extends AbstractEntity implements HttpPostActionInterface
{
    /**
     * Execute the controller
     *
     * @return ResultRedirect
     */
    public function execute(): ResultRedirect
    {
        /** @var ResultRedirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*');

        /** @var Request $request */
        $request = $this->getRequest();

        $listId = $request->getPostValue('list_id');
        if ($listId) {
            $entity = $this->entityModelFactory->create();
            $resEntity = $this->entityResModelFactory->create();

            $resEntity->load($entity, $listId);
            if ($entity->isEmpty()) {
                $this->messageManager->addErrorMessage(
                    __('The list with ID=%1 does not exist.', $listId)
                );
                return $resultRedirect;
            }

            try {
                $resEntity->delete($entity);
                $this->messageManager->addSuccessMessage(__('The list has been deleted.'));
            } catch (Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('An error occurred while deleting the list.'));
                $resultRedirect->setPath('*/*/edit', ['list_id' => $listId]);
            }
        }

        return $resultRedirect;
    }
}
