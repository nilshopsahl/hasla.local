<?php
	
class Neo_Reatilers_Block_Adminhtml_Retailers_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "retailers_id";
				$this->_blockGroup = "reatilers";
				$this->_controller = "adminhtml_retailers";
				$this->_updateButton("save", "label", Mage::helper("reatilers")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("reatilers")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("reatilers")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("retailers_data") && Mage::registry("retailers_data")->getId() ){

				    return Mage::helper("reatilers")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("retailers_data")->getId()));

				} 
				else{

				     return Mage::helper("reatilers")->__("Add Item");

				}
		}
}