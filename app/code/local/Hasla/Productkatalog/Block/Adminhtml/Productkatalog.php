<?php


class Hasla_Productkatalog_Block_Adminhtml_Productkatalog extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_productkatalog";
	$this->_blockGroup = "productkatalog";
	$this->_headerText = Mage::helper("productkatalog")->__("Productkatalog Manager");
	$this->_addButtonLabel = Mage::helper("productkatalog")->__("Add New Item");
	parent::__construct();
	
	}

}