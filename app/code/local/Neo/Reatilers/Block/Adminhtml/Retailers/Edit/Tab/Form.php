<?php
class Neo_Reatilers_Block_Adminhtml_Retailers_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("reatilers_form", array("legend"=>Mage::helper("reatilers")->__("Item information")));

				
						$fieldset->addField("area", "text", array(
						"label" => Mage::helper("reatilers")->__("Area"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "area",
						));
					
						$fieldset->addField("subarea", "text", array(
						"label" => Mage::helper("reatilers")->__("Sub-Area"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "subarea",
						));
					
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("reatilers")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					
						$fieldset->addField("contact", "text", array(
						"label" => Mage::helper("reatilers")->__("Contact"),					
						"name" => "contact",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getRetailersData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getRetailersData());
					Mage::getSingleton("adminhtml/session")->setRetailersData(null);
				} 
				elseif(Mage::registry("retailers_data")) {
				    $form->setValues(Mage::registry("retailers_data")->getData());
				}
				return parent::_prepareForm();
		}
}
