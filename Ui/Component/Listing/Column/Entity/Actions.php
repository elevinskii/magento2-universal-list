<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Ui\Component\Listing\Column\Entity;

use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['list_id'])) {
                    $item[$this->getData('name')]['edit'] = [
                        'href' => $this->getContext()->getUrl(
                            'universal_list/entity/edit',
                            ['list_id' => $item['list_id']]
                        ),
                        'label' => __('Edit')
                    ];
                }
            }
        }

        return $dataSource;
    }
}
