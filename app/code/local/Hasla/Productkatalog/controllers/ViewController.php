<?php
class Hasla_Productkatalog_ViewController extends Mage_Core_Controller_Front_Action{
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
	 
		$model = Mage::getModel("productkatalog/productkatalog")->load($id);
		$title=$this->__("Productkatalog");
		if ($model->getId()) {
				Mage::register("productkataloglist_data", $model);
				$title=$model->getName();
		}
		
		$this->getLayout()->getBlock("head")->setTitle($title);
		
		$breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
		$breadcrumbs->addCrumb("home", array(
			"label" => $this->__("Home Page"),
			"title" => $this->__("Home Page"),
			"link"  => Mage::getBaseUrl()
		));
			$breadcrumbs->addCrumb("Productkatalog", array(
			"label" => $this->__("Productkatalog"),
			"title" => $this->__("Productkatalog"),
			"link"  => Mage::getBaseUrl()
		));
	
		$breadcrumbs->addCrumb("titlename", array(
			"label" => $title,
			"title" => $title
		));

      $this->renderLayout(); 
	  
    }

}