<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Attribute;

use Elevinskii\UniversalList\Controller\Adminhtml\Attribute as AbstractAttribute;
use Magento\Backend\Model\View\Result\Page as ResultPage;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends AbstractAttribute implements HttpGetActionInterface
{
    /**
     * Execute the controller
     *
     * @return ResultPage
     */
    public function execute(): ResultPage
    {
        return $this->initResultPage((string) __('List Attributes'));
    }
}
