<?php   
class Neo_Lookbook_Block_Index extends Mage_Core_Block_Template{   

/* public function getDisplayPrice($product) {
    
    if($product->getFinalPrice()) {
        return $product->getFormatedPrice();
    } else if ($product->getTypeId() == Mage_Catalog_Model_Product_Type::TYPE_BUNDLE) {
        $optionCol= $product->getTypeInstance(true)
                            ->getOptionsCollection($product);
        $selectionCol= $product->getTypeInstance(true)
                               ->getSelectionsCollection(
            $product->getTypeInstance(true)->getOptionsIds($product),
            $product
        );
        $optionCol->appendSelections($selectionCol);
        $price = $product->getPrice();

        foreach ($optionCol as $option) {
            if($option->required) {
                $selections = $option->getSelections();
                $minPrice = min(array_map(function ($s) {
                                return $s->price;
                            }, $selections));
                if($product->getSpecialPrice() > 0) {
                    $minPrice *= $product->getSpecialPrice()/100;
                }
                $price += round($minPrice,2);
            }  
        }
        return Mage::app()->getStore()->formatPrice($price);
    } else {
        return "";
    }
} */

public function getDisplayPrice($product,$price) {
    
    
    if($product->getFinalPrice()) {
        return $product->getFormatedPrice();
    } else if ($product->getSpecialPrice()){
        
        if(strtotime($product->getSpecialToDate()) >= strtotime(date("Y-m-d H:i:s")))   
            return Mage::app()->getStore()->formatPrice($price *= $product->getSpecialPrice()/100);
    
        return Mage::app()->getStore()->formatPrice($price);
    } else {
        return Mage::app()->getStore()->formatPrice($price);
    }
}

public function productDetails($product){
    
        var_dump((int)Mage::getModel('cataloginventory/stock_item')->loadByProduct($product)->getQty());
    
}


}

/*$product->getFinalPrice()) {
                                        
echo Mage::helper('core')->currency($product->getFormatedPrice());

}else{ echo Mage::helper('core')->currency($price);//echo $this->getDisplayPrice($product_details,$price);

}
*/

