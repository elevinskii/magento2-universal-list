<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Attribute;

use Elevinskii\UniversalList\Controller\Adminhtml\Attribute as AbstractAttribute;
use Exception;
use Magento\Backend\Model\View\Result\Redirect as ResultRedirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\Http as Request;
use Magento\Framework\Exception\LocalizedException;

class Save extends AbstractAttribute implements HttpPostActionInterface
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
        $attributeId = $formValues['attribute_id'] ?? null;
        $attribute = $this->attrModelFactory->create();
        $resAttribute = $this->attrResModelFactory->create();

        if ($attributeId) {
            $resAttribute->load($attribute, $attributeId);
            if ($attribute->isEmpty()) {
                $this->messageManager->addErrorMessage(
                    __('The attribute with ID=%1 does not exist.', $attributeId)
                );
                return $resultRedirect;
            }
        }

        try {
            $attribute->setData($formValues);
            $resAttribute->save($attribute);
            $this->messageManager->addSuccessMessage(__('The attribute has been saved.'));
        } catch (LocalizedException $e) {
            $request->setParam('back', true);
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (Exception $e) {
            $request->setParam('back', true);
            $this->messageManager->addExceptionMessage($e, __('An error occurred while saving the list.'));
        }

        if ($request->getParam('back')) {
            if ($attribute->getId()) {
                $resultRedirect->setPath('*/*/edit', ['attribute_id' => $attribute->getId()]);
            } else {
                $resultRedirect->setPath('*/*/new');
            }
        } elseif ($request->getPostValue('redirect_to_new')) {
            $resultRedirect->setPath('*/*/new');
        }

        return $resultRedirect;
    }
}
