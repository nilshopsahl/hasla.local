<?php   
class Hasla_Productkatalog_Block_Index extends Mage_Core_Block_Template{   
protected $_collection=null;

	public function getCollection(){
			if(is_null($this->_collection)){
			$this->_collection=$collection = Mage::getModel("productkatalog/productkatalog")->getCollection()
			->addFieldToFilter('status',0)->setOrder('name', 'asc');
			}
			return $this->_collection;
	}



}