<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml\Entity;

use Elevinskii\UniversalList\Controller\Adminhtml\Action;

abstract class Entity extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elevinskii_UniversalList::universal_lists_entities';

    /**
     * Active point of backend menu
     *
     * @see initResultPage()
     */
    const ACTIVE_MENU = 'Elevinskii_UniversalList::universal_lists_entities';
}
