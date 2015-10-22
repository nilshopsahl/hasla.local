<?php
class Hasla_Productkatalog_Model_Mysql4_Productkatalog extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("productkatalog/productkatalog", "productkatalog_id");
    }
}