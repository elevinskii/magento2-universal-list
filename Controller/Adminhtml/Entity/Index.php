<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Entity;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page as ResultPage;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elevinskii_UniversalList::universal_lists_entities';

    /**
     * Execute the controller
     *
     * @return ResultPage
     */
    public function execute(): ResultPage
    {
        /** @var ResultPage $resultPage */
        $resultPage = $this->resultFactory->create($this->resultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Elevinskii_UniversalList::universal_lists_entities');

        return $resultPage;
    }
}
