<?php
class Hasla_Press_Block_Adminhtml_Press_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("press_form", array("legend"=>Mage::helper("press")->__("Item information")));

				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("press")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
									
						$fieldset->addField('image', 'image', array(
						'label' => Mage::helper('press')->__('Image'),
						'name' => 'image',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						$fieldset->addField("description", "textarea", array(
						"label" => Mage::helper("press")->__("Description Norway"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "description",
						));
						$fieldset->addField("description_en", "textarea", array(
						"label" => Mage::helper("press")->__("Description EN"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "description_en",
						));
						
						 $fieldset->addField('external_url', 'text', array(
						'label'     => Mage::helper('press')->__('External URL'),												
						'name' => 'external_url',
						));
						
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('press')->__('Status'),
						'values'   => Hasla_Press_Block_Adminhtml_Press_Grid::getValueArray3(),
						'name' => 'status',
						));

				if (Mage::getSingleton("adminhtml/session")->getPressData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getPressData());
					Mage::getSingleton("adminhtml/session")->setPressData(null);
				} 
				elseif(Mage::registry("press_data")) {
				    $form->setValues(Mage::registry("press_data")->getData());
				}
				return parent::_prepareForm();
		}
}
