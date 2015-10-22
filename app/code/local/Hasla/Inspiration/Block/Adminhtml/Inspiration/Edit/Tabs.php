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
 * Inspiration admin edit tabs
 *
 * @category    Hasla
 * @package     Hasla_Inspiration
 * @author      Ultimate Module Creator
 */
class Hasla_Inspiration_Block_Adminhtml_Inspiration_Edit_Tabs
    extends Mage_Adminhtml_Block_Widget_Tabs {
    /**
     * Initialize Tabs
     * @access public
     * @author Ultimate Module Creator
     */
    public function __construct() {
        parent::__construct();
        $this->setId('inspiration_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('hasla_inspiration')->__('Inspiration'));
    }
    /**
     * before render html
     * @access protected
     * @return Hasla_Inspiration_Block_Adminhtml_Inspiration_Edit_Tabs
     * @author Ultimate Module Creator
     */
    protected function _beforeToHtml(){
        $this->addTab('form_inspiration', array(
            'label'        => Mage::helper('hasla_inspiration')->__('Inspiration'),
            'title'        => Mage::helper('hasla_inspiration')->__('Inspiration'),
            'content'     => $this->getLayout()->createBlock('hasla_inspiration/adminhtml_inspiration_edit_tab_form')->toHtml(),
        ));
        if (!Mage::app()->isSingleStoreMode()){
            $this->addTab('form_store_inspiration', array(
                'label'        => Mage::helper('hasla_inspiration')->__('Store views'),
                'title'        => Mage::helper('hasla_inspiration')->__('Store views'),
                'content'     => $this->getLayout()->createBlock('hasla_inspiration/adminhtml_inspiration_edit_tab_stores')->toHtml(),
            ));
        }
        return parent::_beforeToHtml();
    }
    /**
     * Retrieve inspiration entity
     * @access public
     * @return Hasla_Inspiration_Model_Inspiration
     * @author Ultimate Module Creator
     */
    public function getInspiration(){
        return Mage::registry('current_inspiration');
    }
}
