<?php


class Hasla_Employees_Block_Adminhtml_Employees extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_employees";
	$this->_blockGroup = "employees";
	$this->_headerText = Mage::helper("employees")->__("Employees Manager");
	$this->_addButtonLabel = Mage::helper("employees")->__("Add New Item");
	parent::__construct();
	
	}

}