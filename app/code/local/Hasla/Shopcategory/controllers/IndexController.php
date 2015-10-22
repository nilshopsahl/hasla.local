<?php
class Hasla_Shopcategory_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Shop by Category"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("shop by category", array(
                "label" => $this->__("Shop by Category"),
                "title" => $this->__("Shop by Category")
		   ));

      $this->renderLayout(); 
	  
    }
}