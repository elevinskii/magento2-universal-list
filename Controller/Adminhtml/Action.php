<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml;

use Magento\Backend\App\Action as BackendAction;
use Magento\Backend\App\Action\Context as BackendContext;
use Magento\Backend\Model\View\Result\Page as ResultPage;

abstract class Action extends BackendAction
{
    /**
     * Active point of backend menu
     *
     * @see initResultPage()
     */
    const ACTIVE_MENU = '';

    /**
     * @var Context
     */
    protected $context;

    /**
     * @param BackendContext $backendContext
     * @param Context $context
     */
    public function __construct(
        BackendContext $backendContext,
        Context $context
    ) {
        parent::__construct($backendContext);
        $this->context = $context;
    }

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

        if (static::ACTIVE_MENU) {
            $resultPage->setActiveMenu(static::ACTIVE_MENU);
        }

        foreach ($titles as $title) {
            $resultPage->getConfig()->getTitle()->prepend($title);
        }

        return $resultPage;
    }
}
