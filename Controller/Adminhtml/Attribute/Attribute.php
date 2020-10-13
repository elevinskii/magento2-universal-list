<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Attribute;

use Elevinskii\UniversalList\Controller\Adminhtml\Action;
use Elevinskii\UniversalList\Model\Attribute as AttrModel;
use Elevinskii\UniversalList\Model\AttributeFactory as AttrModelFactory;
use Elevinskii\UniversalList\Model\ResourceModel\Attribute as AttrResModel;
use Elevinskii\UniversalList\Model\ResourceModel\AttributeFactory as AttrResModelFactory;
use Magento\Backend\App\Action\Context;

abstract class Attribute extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elevinskii_UniversalList::universal_lists_attributes';

    /**
     * Active point of backend menu
     *
     * @see initResultPage()
     */
    const ACTIVE_MENU = 'Elevinskii_UniversalList::universal_lists_attributes';

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
}
