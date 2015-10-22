<?php
class Hasla_Bunadlist_Block_Adminhtml_Bunadlist_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("bunadlist_form", array("legend"=>Mage::helper("bunadlist")->__("Item information")));

						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("bunadlist")->__("name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					

				
						$fieldset->addField("title", "text", array(
						"label" => Mage::helper("bunadlist")->__("Title"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "title",
						));
					
						$fieldset->addField("description", "textarea", array(
						"label" => Mage::helper("bunadlist")->__("Description"),
						"name" => "description",
						));
									
						$fieldset->addField('image', 'image', array(
						'label' => Mage::helper('bunadlist')->__('Image'),
						'name' => 'image',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						$fieldset->addField("external_url", "text", array(
						"label" => Mage::helper("bunadlist")->__("External URL"),
						"name" => "external_url",
						));
									
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('bunadlist')->__('Status'),
						'values'   => Hasla_Bunadlist_Block_Adminhtml_Bunadlist_Grid::getValueArray4(),
						'name' => 'status',					
						"class" => "required-entry",
						"required" => true,
						));

				if (Mage::getSingleton("adminhtml/session")->getBunadlistData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getBunadlistData());
					Mage::getSingleton("adminhtml/session")->setBunadlistData(null);
				} 
				elseif(Mage::registry("bunadlist_data")) {
				    $form->setValues(Mage::registry("bunadlist_data")->getData());
				}
				return parent::_prepareForm();
		}
}
