<?php   
class Hasla_Bunad_Block_View extends Mage_Core_Block_Template{ 
protected $_collection=null;

	public function getBunadLists(){
		if(is_null($this->_collection)){
		$this->_collection=Mage::getModel("bunadlist/bunadlist")->getCollection()
		->addFieldToFilter('status',0)->setOrder('name', 'asc');
		}
		return $this->_collection;
	}

}