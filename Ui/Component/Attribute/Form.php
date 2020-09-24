<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Ui\Component\Attribute;

use Magento\Ui\Component\Form as UiForm;

class Form extends UiForm
{
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
}
