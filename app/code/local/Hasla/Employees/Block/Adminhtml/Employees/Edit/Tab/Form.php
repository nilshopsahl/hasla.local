<?php
class Hasla_Employees_Block_Adminhtml_Employees_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("employees_form", array("legend"=>Mage::helper("employees")->__("Item information")));

				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("employees")->__("Employee Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
									
						$fieldset->addField('image', 'image', array(
						'label' => Mage::helper('employees')->__('Employee Image'),
						'name' => 'image',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						$fieldset->addField("description", "textarea", array(
						"label" => Mage::helper("employees")->__("Description Noraway"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "description",
						));
						$fieldset->addField("description_en", "textarea", array(
						"label" => Mage::helper("employees")->__("Description EN"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "description_en",
						));
									
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('employees')->__('Status'),
						'values'   => Hasla_Employees_Block_Adminhtml_Employees_Grid::getValueArray3(),
						'name' => 'status',
						));

				if (Mage::getSingleton("adminhtml/session")->getEmployeesData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getEmployeesData());
					Mage::getSingleton("adminhtml/session")->setEmployeesData(null);
				} 
				elseif(Mage::registry("employees_data")) {
				    $form->setValues(Mage::registry("employees_data")->getData());
				}
				return parent::_prepareForm();
		}
}
