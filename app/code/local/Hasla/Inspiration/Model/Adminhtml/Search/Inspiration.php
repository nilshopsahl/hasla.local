<?php
/**
 * Hasla_Inspiration extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Hasla
 * @package        Hasla_Inspiration
 * @copyright      Copyright (c) 2014
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Admin search model
 *
 * @category    Hasla
 * @package     Hasla_Inspiration
 * @author      Ultimate Module Creator
 */
class Hasla_Inspiration_Model_Adminhtml_Search_Inspiration
    extends Varien_Object {
    /**
     * Load search results
     * @access public
     * @return Hasla_Inspiration_Model_Adminhtml_Search_Inspiration
     * @author Ultimate Module Creator
     */
    public function load(){
        $arr = array();
        if (!$this->hasStart() || !$this->hasLimit() || !$this->hasQuery()) {
            $this->setResults($arr);
            return $this;
        }
        $collection = Mage::getResourceModel('hasla_inspiration/inspiration_collection')
            ->addFieldToFilter('left_product4_name', array('like' => $this->getQuery().'%'))
            ->setCurPage($this->getStart())
            ->setPageSize($this->getLimit())
            ->load();
        foreach ($collection->getItems() as $inspiration) {
            $arr[] = array(
                'id'=> 'inspiration/1/'.$inspiration->getId(),
                'type'  => Mage::helper('hasla_inspiration')->__('Inspiration'),
                'name'  => $inspiration->getLeftProduct4Name(),
                'description'   => $inspiration->getLeftProduct4Name(),
                'url' => Mage::helper('adminhtml')->getUrl('*/inspiration_inspiration/edit', array('id'=>$inspiration->getId())),
            );
        }
        $this->setResults($arr);
        return $this;
    }
}
