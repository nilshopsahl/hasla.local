<?php


class Hasla_Press_Block_Adminhtml_Press extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_press";
	$this->_blockGroup = "press";
	$this->_headerText = Mage::helper("press")->__("Press Manager");
	$this->_addButtonLabel = Mage::helper("press")->__("Add New Item");
	parent::__construct();
	
	}

}