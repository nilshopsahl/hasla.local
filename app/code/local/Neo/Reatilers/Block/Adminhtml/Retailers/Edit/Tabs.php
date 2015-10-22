<?php
class Neo_Reatilers_Block_Adminhtml_Retailers_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("retailers_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("reatilers")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("reatilers")->__("Item Information"),
				"title" => Mage::helper("reatilers")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("reatilers/adminhtml_retailers_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
