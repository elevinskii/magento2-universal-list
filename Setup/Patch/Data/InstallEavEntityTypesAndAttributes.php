<?php
declare(strict_types=1);

namespace Elevinskii\UniversalList\Setup\Patch\Data;

use Magento\Eav\Model\Entity as EavEntity;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InstallEavEntityTypesAndAttributes implements DataPatchInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * InstallEavEntityTypesAndAttributes constructor
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * Run code inside the patch
     *
     * @return $this
     */
    public function apply(): self
    {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addEntityType('universal_list_item', [
            'entity_model' => EavEntity::class
        ]);

        return $this;
    }

    /**
     * Get array of patches that have to be executed prior to this
     *
     * @return string[]
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * Get aliases (previous names) for the patch
     *
     * @return string[]
     */
    public function getAliases(): array
    {
        return [];
    }
}
