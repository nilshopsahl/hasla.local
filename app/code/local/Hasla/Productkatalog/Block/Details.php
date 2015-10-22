<?php   
class Hasla_Productkatalog_Block_Details extends Mage_Core_Block_Template{ 
protected $Object=null;
	public function getBunad(){
		
		if( Mage::registry("productkataloglist_data") && Mage::registry("productkataloglist_data")->getId() ){
		$this->Object=Mage::registry("productkataloglist_data");
		}
		return $this->Object;
	}

}