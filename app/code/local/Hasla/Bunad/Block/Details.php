<?php   
class Hasla_Bunad_Block_Details extends Mage_Core_Block_Template{ 
protected $Object=null;
	public function getBunad(){
		
		if( Mage::registry("bunadlist_data") && Mage::registry("bunadlist_data")->getId() ){
		$this->Object=Mage::registry("bunadlist_data");
		}
		return $this->Object;
	}

}