<?php   
class Hasla_Shopcategory_Block_Index extends Mage_Core_Block_Template{   

	public function getCategories(){
		$category_data = Mage::getModel('catalog/category')->getCollection();
		return $category_data;		
	}

}