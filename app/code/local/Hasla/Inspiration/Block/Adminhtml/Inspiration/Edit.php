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
 * Inspiration admin edit form
 *
 * @category    Hasla
 * @package     Hasla_Inspiration
 * @author      Ultimate Module Creator
 */
class Hasla_Inspiration_Block_Adminhtml_Inspiration_Edit
    extends Mage_Adminhtml_Block_Widget_Form_Container {
    /**
     * constructor
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function __construct(){
        parent::__construct();
        $this->_blockGroup = 'hasla_inspiration';
        $this->_controller = 'adminhtml_inspiration';
        $this->_updateButton('save', 'label', Mage::helper('hasla_inspiration')->__('Save Inspiration'));
        $this->_updateButton('delete', 'label', Mage::helper('hasla_inspiration')->__('Delete Inspiration'));
        $this->_addButton('saveandcontinue', array(
            'label'        => Mage::helper('hasla_inspiration')->__('Save And Continue Edit'),
            'onclick'    => 'saveAndContinueEdit()',
            'class'        => 'save',
        ), -100);
        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }
    /**
     * get the edit form header
     * @access public
     * @return string
     * @author Ultimate Module Creator
     */
    public function getHeaderText(){
        if( Mage::registry('current_inspiration') && Mage::registry('current_inspiration')->getId() ) {
            return Mage::helper('hasla_inspiration')->__("Edit Inspiration '%s'", $this->escapeHtml(Mage::registry('current_inspiration')->getMainBannerProductName()));
			
        }
        else {
            return Mage::helper('hasla_inspiration')->__('Add Inspiration');
        }
    }
}
