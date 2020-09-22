<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml;

use Elevinskii\UniversalList\Model\Attribute as AttrModel;
use Elevinskii\UniversalList\Model\AttributeFactory as AttrModelFactory;
use Elevinskii\UniversalList\Model\ResourceModel\Attribute as AttrResModel;
use Elevinskii\UniversalList\Model\ResourceModel\AttributeFactory as AttrResModelFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
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
     * @var AttrModelFactory
     */
    private $attrModelFactory;

    /**
     * @var AttrResModelFactory
     */
    private $attrResModelFactory;

    /**
     * Attribute constructor
     *
     * @param Context $context
     * @param AttrModelFactory $attrModelFactory
     * @param AttrResModelFactory $attrResModelFactory
     */
    public function __construct(
        Context $context,
        AttrModelFactory $attrModelFactory,
        AttrResModelFactory $attrResModelFactory
    ) {
        parent::__construct($context);

        $this->attrModelFactory = $attrModelFactory;
        $this->attrResModelFactory = $attrResModelFactory;
    }

    /**
     * Retrieve attribute model
     *
     * @return AttrModel
     */
    protected function getAttrModel(): AttrModel
    {
        return $this->attrModelFactory->create();
    }

    /**
     * Retrieve attribute resource model
     *
     * @return AttrResModel
     */
    protected function getAttrResModel(): AttrResModel
    {
        return $this->attrResModelFactory->create();
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
        $resultPage->setActiveMenu('Elevinskii_UniversalList::universal_lists_attributes');

        foreach ($titles as $title) {
            $resultPage->getConfig()->getTitle()->prepend($title);
        }

        return $resultPage;
    }
}
