<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page as ResultPage;

abstract class Entity extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elevinskii_UniversalList::universal_lists_entities';

    /**
     * Initialization of a backend page
     *
     * @param string $title
     * @return ResultPage
     */
    protected function initResultPage(string $title = ''): ResultPage
    {
        /** @var ResultPage $resultPage */
        $resultPage = $this->resultFactory->create($this->resultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Elevinskii_UniversalList::universal_lists_entities');

        if ($title) {
            $resultPage->getConfig()->getTitle()->prepend($title);
        }

        return $resultPage;
    }
}
