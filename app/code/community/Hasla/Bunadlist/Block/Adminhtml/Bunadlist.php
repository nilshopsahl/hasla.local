<?php


class Hasla_Bunadlist_Block_Adminhtml_Bunadlist extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_bunadlist";
	$this->_blockGroup = "bunadlist";
	$this->_headerText = Mage::helper("bunadlist")->__("Bunadlist Manager");
	$this->_addButtonLabel = Mage::helper("bunadlist")->__("Add New Item");
	parent::__construct();
	
	}

}