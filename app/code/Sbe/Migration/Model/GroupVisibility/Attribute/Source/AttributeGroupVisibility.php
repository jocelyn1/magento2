<?php

namespace Sbe\Migration\Model\GroupVisibility\Attribute\Source;



class AttributeGroupVisibility implements \Magento\Framework\Data\OptionSourceInterface
{

    /**
     * @var \Magento\Framework\Convert\DataObject
     */
    protected $_converter;

    public function __construct(\Magento\Framework\Convert\DataObject $converter) {
        $this->_converter = $converter;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if (!$this->_options) {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            /** @var \Sbe\Migration\Model\ResourceModel\GroupVisibility\Collection */
            $groups = $objectManager->create('Sbe\Migration\Model\ResourceModel\GroupVisibility\Collection');
            $this->_options = $this->_converter->toOptionArray($groups, 'id', 'code');
        }

        return $this->_options;
    }
}