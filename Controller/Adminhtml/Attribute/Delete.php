<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Attribute;

use Exception;
use Magento\Backend\Model\View\Result\Redirect as ResultRedirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\Http as Request;

class Delete extends Attribute implements HttpPostActionInterface
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

        $attributeId = $request->getPostValue('attribute_id');
        if ($attributeId) {
            $attribute = $this->context->getAttrModel();
            $resAttribute = $this->context->getAttrResModel();

            $resAttribute->load($attribute, $attributeId);
            if ($attribute->isEmpty()) {
                $this->messageManager->addErrorMessage(
                    __('The attribute with ID=%1 does not exist.', $attributeId)
                );
                return $resultRedirect;
            }

            try {
                $resAttribute->delete($attribute);
                $this->messageManager->addSuccessMessage(__('The attribute has been deleted.'));
            } catch (Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('An error occurred while deleting the list.'));
                $resultRedirect->setPath('*/*/edit', ['attribute_id' => $attributeId]);
            }
        }

        return $resultRedirect;
    }
}
