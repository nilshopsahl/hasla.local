<?php
class Neo_Reatilers_Model_Mysql4_Retailers extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("reatilers/retailers", "retailers_id");
    }
}