<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Attribute;

use Magento\Backend\Model\View\Result\Page as ResultPage;
use Magento\Framework\App\Action\HttpGetActionInterface;

class NewAction extends Attribute implements HttpGetActionInterface
{
    /**
     * Execute the controller
     *
     * @return ResultPage
     */
    public function execute(): ResultPage
    {
        return $this->initResultPage([
            __('Attributes'),
            __('New Attribute')
        ]);
    }
}
