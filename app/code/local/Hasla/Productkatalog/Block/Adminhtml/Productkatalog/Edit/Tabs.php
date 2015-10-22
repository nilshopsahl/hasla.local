<?php
class Hasla_Productkatalog_Block_Adminhtml_Productkatalog_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("productkatalog_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("productkatalog")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("productkatalog")->__("Item Information"),
				"title" => Mage::helper("productkatalog")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("productkatalog/adminhtml_productkatalog_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
