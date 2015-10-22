<?php   
class Hasla_Employees_Block_Index extends Mage_Core_Block_Template{   
	public function getEmployess()
	{
		$employee_data = Mage::getModel('employees/employees')->getCollection();
		return $employee_data;
	}




}