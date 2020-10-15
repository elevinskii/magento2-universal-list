<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Item;

use Elevinskii\UniversalList\Controller\Adminhtml\Action;

abstract class Item extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elevinskii_UniversalList::universal_lists_items';

    /**
     * Active point of backend menu
     *
     * @see initResultPage()
     */
    const ACTIVE_MENU = 'Elevinskii_UniversalList::universal_lists_items';
}
