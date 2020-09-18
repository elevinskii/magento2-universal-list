<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Attribute;

use Elevinskii\UniversalList\Controller\Adminhtml\Attribute as AbstractAttribute;
use Magento\Backend\Model\View\Result\Page as ResultPage;
use Magento\Backend\Model\View\Result\Redirect as ResultRedirect;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;

class Edit extends AbstractAttribute implements HttpGetActionInterface
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
        $resultRedirect->setPath('*/*');

        $attributeId = $this->getRequest()->getParam('attribute_id');
        if (!$attributeId) {
            return $resultRedirect;
        }

        $attribute = $this->attrModelFactory->create();
        $this->attrResModelFactory->create()->load($attribute, $attributeId);

        if ($attribute->isEmpty()) {
            $this->messageManager->addErrorMessage(
                __('The attribute with ID=%1 does not exist.', $attributeId)
            );
            return $resultRedirect;
        }

        return $this->initResultPage([
            __('Attributes'),
            $attribute->getFrontendLabel()
        ]);
    }
}
