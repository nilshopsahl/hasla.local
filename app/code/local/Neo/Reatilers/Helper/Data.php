<?php
class Neo_Reatilers_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getPreviousProduct()
    {
        $prodId = Mage::registry('current_product')->getId();
        $catArray = Mage::registry('current_category');
        if($catArray){
            $catArray = $catArray->getProductsPosition();
            $keys = array_flip(array_keys($catArray));
            $values = array_keys($catArray);
            $productId = $values[$keys[$prodId]-1];
            $product = Mage::getModel('catalog/product');
            if($productId){
                $product->load($productId);
                return $product->getProductUrl();
            }
            return false;
        }
        return false;
    }
    public function getNextProduct()
    {
        $prodId = Mage::registry('current_product')->getId();
        $catArray = Mage::registry('current_category');
        if($catArray){
            $catArray = $catArray->getProductsPosition();
            $keys = array_flip(array_keys($catArray));
            $values = array_keys($catArray);
            $productId = $values[$keys[$prodId]-1];
            $product = Mage::getModel('catalog/product');
            if($productId){
                $product->load($productId);
                return $product->getProductUrl();
            }
            return false;
        }
        return false;
    }
}
	 