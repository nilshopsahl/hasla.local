<?php   
class Neo_Reatilers_Block_Index extends Mage_Core_Block_Template{   

public function getRetailers(){
	$retailers = Mage::getModel('reatilers/retailers')->getCollection();
	//print_r($retailers->getData());
	return $retailers;
	
}
public function getAreas(){
    	$areas = Mage::getModel('reatilers/retailers')->getCollection()
						->distinct(TRUE)
						->addFieldToSelect('area')
						->load();
		return $areas;
}

}