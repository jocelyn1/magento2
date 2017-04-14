<?php

namespace Sbe\Migration\Model\GroupVisibility\Attribute\Source;

use Magento\Framework\Data\OptionSourceInterface;


/**
 * GroupVisibility Model
 *
 * @author      Jocelyn Kelle
 */
class GroupVisibility extends \Magento\Eav\Model\Entity\Attribute\Source\Table implements OptionSourceInterface
{

   /* protected $_logger;

    public function __construct(\Psr\Log\LoggerInterface $logger, array $data = [])
    {
        $this->_logger = $logger;
    }*/

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        if (!$this->_options) {
            $groupVisibility = $this->_objectManager->create('Sbe\Migration\Model\GroupVisibility');
            $groups = $groupVisibility->getCollection();

            foreach ($groups as $group) {
               // $this->_logger->addDebug($group);
                $this->_options[] = array(
                    'value' => $group->getData('group_visibility_id'),
                    'label' => $group->getData('name'),
                );
            }
        }

        return $this->_options;
    }
}