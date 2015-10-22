<?php
	
class Hasla_Productkatalog_Block_Adminhtml_Productkatalog_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "productkatalog_id";
				$this->_blockGroup = "productkatalog";
				$this->_controller = "adminhtml_productkatalog";
				$this->_updateButton("save", "label", Mage::helper("productkatalog")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("productkatalog")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("productkatalog")->__("Save And Continue Edit"),
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
				if( Mage::registry("productkatalog_data") && Mage::registry("productkatalog_data")->getId() ){

				    return Mage::helper("productkatalog")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("productkatalog_data")->getName()));

				} 
				else{

				     return Mage::helper("productkatalog")->__("Add Item");

				}
		}
}