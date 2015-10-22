<?php

class Neo_Reatilers_Block_Adminhtml_Retailers_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("retailersGrid");
				$this->setDefaultSort("retailers_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("reatilers/retailers")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("retailers_id", array(
				"header" => Mage::helper("reatilers")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "retailers_id",
				));
                
				$this->addColumn("area", array(
				"header" => Mage::helper("reatilers")->__("Area"),
				"index" => "area",
				));
				$this->addColumn("subarea", array(
				"header" => Mage::helper("reatilers")->__("Sub-Area"),
				"index" => "subarea",
				));
				$this->addColumn("name", array(
				"header" => Mage::helper("reatilers")->__("Name"),
				"index" => "name",
				));
				$this->addColumn("contact", array(
				"header" => Mage::helper("reatilers")->__("Contact"),
				"index" => "contact",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('retailers_id');
			$this->getMassactionBlock()->setFormFieldName('retailers_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_retailers', array(
					 'label'=> Mage::helper('reatilers')->__('Remove Retailers'),
					 'url'  => $this->getUrl('*/adminhtml_retailers/massRemove'),
					 'confirm' => Mage::helper('reatilers')->__('Are you sure?')
				));
			return $this;
		}
			

}