<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class Entity extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Elevinskii_UniversalList::universal_lists_entities';
}
