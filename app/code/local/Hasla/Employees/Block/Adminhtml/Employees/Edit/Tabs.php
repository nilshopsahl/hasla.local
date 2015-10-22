<?php
class Hasla_Employees_Block_Adminhtml_Employees_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("employees_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("employees")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("employees")->__("Item Information"),
				"title" => Mage::helper("employees")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("employees/adminhtml_employees_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
