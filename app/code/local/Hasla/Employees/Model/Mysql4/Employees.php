<?php
class Hasla_Employees_Model_Mysql4_Employees extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("employees/employees", "hasla_employees_id");
    }
}