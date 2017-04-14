<?php

namespace Sbe\Migration\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    /**
     * Category setup factory
     *
     * @var \Magento\Catalog\Setup\CategorySetupFactory
     */
    private $categorySetupFactory;


    /**
     *  Customer group factory
     *
     * @var \Magento\Customer\Model\GroupFactory;
     */
    protected $groupFactory;

    /**
     * Customer setup factory
     *
     * @var \Magento\Customer\Setup\CustomerSetupFactory
     */
    private $customerSetupFactory;
    /**
     * Init
     *
     * @params \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
     *        \Magento\Catalog\Setup\CategorySetupFactory $categorySetupFactory
     */
    public function __construct(
        \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory,
        \Magento\Catalog\Setup\CategorySetupFactory $categorySetupFactory,
        \Magento\Customer\Model\GroupFactory $groupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->categorySetupFactory = $categorySetupFactory;
        $this->groupFactory = $groupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // insert default groups visiblity
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 0, 'name' => 'NONE']
        );
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 1, 'name' => 'NOT LOGGED IN']
        );
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 2, 'name' => 'PARTICULIER']
        );
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 3, 'name' => 'TV']
        );
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 4, 'name' => 'PSM']
        );
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 5, 'name' => 'PSM HU']
        );
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 6, 'name' => 'PSM HU NON AGREE']
        );
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 7, 'name' => 'PSM NON AGREE']
        );
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 8, 'name' => 'PEM']
        );
        $setup->getConnection()->insertForce(
            $setup->getTable('group_visibility'),
            ['group_visibility_id' => 9, 'name' => 'SITEL']
        );


        // attributes customer
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerSetup->removeAttribute(
            \Magento\Customer\Model\Customer::ENTITY, 'proof_of_purchase');
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'proof_of_purchase',
            [
                'type' => 'int',
                'label' => 'Preuve d\'achat',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'required' => true,
                'visible'  => true,
                'sort_order' => 1000,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'default' => '0',
                'frontend' => ''
            ]
        );

        $customerSetup->removeAttribute(
            \Magento\Customer\Model\Customer::ENTITY, 'customer_payment_save');
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'customer_payment_save',
            [
                'type' => 'int',
                'label' => 'Client en compte',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'required' => true,
                'visible'  => true,
                'sort_order' => 1000,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'default' => '',
                'frontend' => ''
            ]
        );


        $customerSetup->removeAttribute(
        \Magento\Customer\Model\Customer::ENTITY, 'comment_line_in_cart');
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'comment_line_in_cart',
            [
                'type' => 'int',
                'label' => 'Commentaires sur les lignes de commande',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'required' => true,
                'visible'  => true,
                'sort_order' => 1000,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'default' => '',
                'frontend' => ''
            ]
        );

        $customerSetup->removeAttribute(
            \Magento\Customer\Model\Customer::ENTITY, 'code_customer');
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'code_customer',
            [
                'type' => 'varchar',
                'label' => 'Code CLI',
                'input' => 'text',
                'source' => '',
                'required' => true,
                'visible'  => true,
                'sort_order' => 1000,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'frontend' => ''
            ]
        );

        $customerSetup->removeAttribute(
            \Magento\Customer\Model\Customer::ENTITY, 'old_id_customer');
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'old_id_customer',
            [
                'type' => 'varchar',
                'label' => 'Ancien id client',
                'input' => 'text',
                'source' => '',
                'required' => true,
                'visible'  => true,
                'sort_order' => 1000,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'frontend' => ''
            ]
        );

        $customerSetup->removeAttribute(
            \Magento\Customer\Model\Customer::ENTITY, 'group_visibility');
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'group_visibility',
            [
                'type' => 'int',
                'label' => 'Visibilité du groupe',
                'input' => 'select',
                'source' => \Sbe\Migration\Model\GroupVisibility\Attribute\Source\AttributeGroupVisibility::class,
                'required' => true,
                'visible'  => true,
                'sort_order' => 1000,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'frontend' => ''
            ]
        );

        // Create the new group customer
        /** @var \Magento\Customer\Model\Group $group */
        $group = $this->groupFactory->create();
        $group->setCode('PRO_PRICE_20');
        $group->setTaxClassId(3);
        $group->save();

        $group = $this->groupFactory->create();
        $group->setCode('PRO_PRICE_35');
        $group->setTaxClassId(3);
        $group->save();

        $group = $this->groupFactory->create();
        $group->setCode('PRO_PRICE_40');
        $group->setTaxClassId(3);
        $group->save();

        // attributes category
        $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);

        $categorySetup->removeAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'hide_group_visibility' );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'hide_group_visibility', [
                'type' => 'int',
                'label' => 'Cacher pour group',
                'input' => 'select',
                'source' => \Sbe\Migration\Model\GroupVisibility\Attribute\Source\AttributeGroupVisibility::class,
                'required' => true,
                'sort_order' => 20,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'group' => 'Display Settings',
            ]
        );

        // add attribute visible in admin ( Magento v2.1.1 )
        // Use UI component

        $setup->endSetup();
    }
}