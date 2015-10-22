<?php
class Neo_Reatilers_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Retailers - Hasla"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("retailers - hasla", array(
                "label" => $this->__("Retailers - Hasla"),
                "title" => $this->__("Retailers - Hasla")
		   ));

      $this->renderLayout(); 
	  
    }
}