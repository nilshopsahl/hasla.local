<?php
class Hasla_Productkatalog_Block_Adminhtml_Productkatalog_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("productkatalog_form", array("legend"=>Mage::helper("productkatalog")->__("Item information")));

				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("productkatalog")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					
						$fieldset->addField("title", "text", array(
						"label" => Mage::helper("productkatalog")->__("Title"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "title",
						));
					
						$fieldset->addField("description", "textarea", array(
						"label" => Mage::helper("productkatalog")->__("Description"),
						"name" => "description",
						));
									
						$fieldset->addField('image', 'image', array(
						'label' => Mage::helper('productkatalog')->__('Image'),
						'name' => 'image',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						$fieldset->addField("external_url", "text", array(
						"label" => Mage::helper("productkatalog")->__("External URL"),
						"name" => "external_url",
						));
									
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('productkatalog')->__('Status'),
						'values'   => Hasla_Productkatalog_Block_Adminhtml_Productkatalog_Grid::getValueArray5(),
						'name' => 'status',
						));

				if (Mage::getSingleton("adminhtml/session")->getProductkatalogData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getProductkatalogData());
					Mage::getSingleton("adminhtml/session")->setProductkatalogData(null);
				} 
				elseif(Mage::registry("productkatalog_data")) {
				    $form->setValues(Mage::registry("productkatalog_data")->getData());
				}
				return parent::_prepareForm();
		}
}
