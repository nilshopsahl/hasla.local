<?php   
class Hasla_Press_Block_Index extends Mage_Core_Block_Template{   
public function getPress()
	{
		$press_data = Mage::getModel('press/press')->getCollection();
		return $press_data;
}




}