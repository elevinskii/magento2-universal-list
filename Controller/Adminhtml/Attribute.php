<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page as ResultPage;

abstract class Attribute extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elevinskii_UniversalList::universal_lists_attributes';

    /**
     * Initialization of a backend page
     *
     * @param string[] $titles
     * @return ResultPage
     */
    protected function initResultPage(array $titles = []): ResultPage
    {
        /** @var ResultPage $resultPage */
        $resultPage = $this->resultFactory->create($this->resultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Elevinskii_UniversalList::universal_lists_attributes');

        foreach ($titles as $title) {
            $resultPage->getConfig()->getTitle()->prepend($title);
        }

        return $resultPage;
    }
}
