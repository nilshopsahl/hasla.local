<?php
class Hasla_Bunadlist_Block_Adminhtml_Bunadlist_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("bunadlist_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("bunadlist")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("bunadlist")->__("Item Information"),
				"title" => Mage::helper("bunadlist")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("bunadlist/adminhtml_bunadlist_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
