<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Entity;

use Exception;
use Magento\Backend\Model\View\Result\Redirect as ResultRedirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\Http as Request;
use Magento\Framework\Exception\LocalizedException;

class Save extends Entity implements HttpPostActionInterface
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

        $formValues = $request->getPostValue('general', []);
        $listId = $formValues['list_id'] ?? null;
        $entity = $this->context->getEntityModel();
        $resEntity = $this->context->getEntityResModel();

        if ($listId) {
            $resEntity->load($entity, $listId);
            if ($entity->isEmpty()) {
                $this->messageManager->addErrorMessage(
                    __('The list with ID=%1 does not exist.', $listId)
                );
                return $resultRedirect;
            }
        }

        try {
            $entity->setData($formValues);
            $resEntity->save($entity);
            $this->messageManager->addSuccessMessage(__('The list has been saved.'));
        } catch (LocalizedException $e) {
            $request->setParam('back', true);
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (Exception $e) {
            $request->setParam('back', true);
            $this->messageManager->addExceptionMessage($e, __('An error occurred while saving the list.'));
        }

        if ($request->getParam('back')) {
            if ($entity->getId()) {
                $resultRedirect->setPath('*/*/edit', ['list_id' => $entity->getId()]);
            } else {
                $resultRedirect->setPath('*/*/new');
            }
        } elseif ($request->getPostValue('redirect_to_new')) {
            $resultRedirect->setPath('*/*/new');
        }

        return $resultRedirect;
    }
}
