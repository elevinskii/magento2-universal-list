<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Ui\Component\Attribute;

use Elevinskii\UniversalList\Model\AttributeFactory as AttrModelFactory;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Form as UiForm;

class Form extends UiForm
{
    /**
     * @var AttrModelFactory
     */
    private $attrModelFactory;

    /**
     * @param AttrModelFactory $attrModelFactory
     * @param ContextInterface $context
     * @param FilterBuilder $filterBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        AttrModelFactory $attrModelFactory,
        ContextInterface $context,
        FilterBuilder $filterBuilder,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $filterBuilder, $components, $data);
        $this->attrModelFactory = $attrModelFactory;
    }

    /**
     * Prepare component configuration
     *
     * @return void
     */
    public function prepare(): void
    {
        $buttons = $this->getData('buttons');
        if (isset($buttons['delete'])) {
            $sourceData = $this->getDataSourceData()['data']['general'] ?? null;
            if ($sourceData && !$sourceData['is_user_defined']) {
                unset($buttons['delete']);
                $this->setData('buttons', $buttons);
            }
        }

        parent::prepare();
    }

    /**
     * Get Data Source data
     *
     * @return array
     */
    public function getDataSourceData(): array
    {
        $sourceData = parent::getDataSourceData();
        $generalData = $sourceData['data']['general'] ?? null;

        if ($generalData && isset($generalData['frontend_input'], $generalData['default_value'])) {
            $defaultValueField = $this->attrModelFactory->create()
                ->getDefaultValueByInput($generalData['frontend_input']);

            if ($defaultValueField) {
                $sourceData['data']['general'][$defaultValueField] = $generalData['default_value'];
            }
        }

        return $sourceData;
    }
}
