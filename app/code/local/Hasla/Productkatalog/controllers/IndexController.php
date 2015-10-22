<?php
class Hasla_Productkatalog_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("productkatalog"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("productkatalog", array(
                "label" => $this->__("productkatalog"),
                "title" => $this->__("productkatalog")
		   ));

      $this->renderLayout(); 
	  
    }
}