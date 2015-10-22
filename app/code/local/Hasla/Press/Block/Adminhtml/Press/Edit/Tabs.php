<?php
class Hasla_Press_Block_Adminhtml_Press_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("press_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("press")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("press")->__("Item Information"),
				"title" => Mage::helper("press")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("press/adminhtml_press_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
