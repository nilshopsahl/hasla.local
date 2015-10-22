<?php
	
class Hasla_Bunadlist_Block_Adminhtml_Bunadlist_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "bunadlist";
				$this->_blockGroup = "bunadlist";
				$this->_controller = "adminhtml_bunadlist";
				$this->_updateButton("save", "label", Mage::helper("bunadlist")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("bunadlist")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("bunadlist")->__("Save And Continue Edit"),
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
				if( Mage::registry("bunadlist_data") && Mage::registry("bunadlist_data")->getId() ){

				    return Mage::helper("bunadlist")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("bunadlist_data")->getName()));

				} 
				else{

				     return Mage::helper("bunadlist")->__("Add Item");

				}
		}
}