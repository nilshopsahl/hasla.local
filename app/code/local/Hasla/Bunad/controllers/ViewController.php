<?php
class Hasla_Bunad_ViewController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
		
      
	/*  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Bunad"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("titlename", array(
                "label" => $this->__("Bunad"),
                "title" => $this->__("Bunad")
		   ));

      $this->renderLayout(); */
	  $this->_redirect('*');
	  return;
	  
    }
	
	 public function detailsAction() {
      
	  $this->loadLayout();   
	   $id = $this->getRequest()->getParam("id");
	 
		$model = Mage::getModel("bunadlist/bunadlist")->load($id);
		$title=$this->__("Bunad");
		if ($model->getId()) {
				Mage::register("bunadlist_data", $model);
				$title=$model->getName();
		}
		
		$this->getLayout()->getBlock("head")->setTitle($title);
		
		$breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
		$breadcrumbs->addCrumb("home", array(
			"label" => $this->__("Home Page"),
			"title" => $this->__("Home Page"),
			"link"  => Mage::getBaseUrl()
		));
			$breadcrumbs->addCrumb("Bunad", array(
			"label" => $this->__("Bunad"),
			"title" => $this->__("Bunad"),
			"link"  => Mage::getBaseUrl()
		));
	
		$breadcrumbs->addCrumb("titlename", array(
			"label" => $title,
			"title" => $title
		));

      $this->renderLayout(); 
	  
    }

}