<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Entity;

use Magento\Backend\Model\View\Result\Page as ResultPage;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends Entity implements HttpGetActionInterface
{
    /**
     * Execute the controller
     *
     * @return ResultPage
     */
    public function execute(): ResultPage
    {
        return $this->initResultPage();
    }
}
