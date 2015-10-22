<?php


class Neo_Reatilers_Block_Adminhtml_Retailers extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_retailers";
	$this->_blockGroup = "reatilers";
	$this->_headerText = Mage::helper("reatilers")->__("Retailers Manager");
	$this->_addButtonLabel = Mage::helper("reatilers")->__("Add New Item");
	parent::__construct();
	
	}

}