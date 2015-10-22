<?php

class Hasla_Bunadlist_Block_Adminhtml_Bunadlist_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("bunadlistGrid");
				$this->setDefaultSort("bunadlist");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("bunadlist/bunadlist")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("bunadlist", array(
				"header" => Mage::helper("bunadlist")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "bunadlist",
				));
                
				$this->addColumn("title", array(
				"header" => Mage::helper("bunadlist")->__("Title"),
				"index" => "title",
				));
				$this->addColumn("external_url", array(
				"header" => Mage::helper("bunadlist")->__("External URL"),
				"index" => "external_url",
				));
						$this->addColumn('status', array(
						'header' => Mage::helper('bunadlist')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>Hasla_Bunadlist_Block_Adminhtml_Bunadlist_Grid::getOptionArray4(),				
						));
						
				$this->addColumn("name", array(
				"header" => Mage::helper("bunadlist")->__("name"),
				"index" => "name",
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
			$this->setMassactionIdField('bunadlist');
			$this->getMassactionBlock()->setFormFieldName('bunadlists');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_bunadlist', array(
					 'label'=> Mage::helper('bunadlist')->__('Remove Bunadlist'),
					 'url'  => $this->getUrl('*/adminhtml_bunadlist/massRemove'),
					 'confirm' => Mage::helper('bunadlist')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray4()
		{
            $data_array=array(); 
			$data_array[0]='Enable';
			$data_array[1]='Disable';
            return($data_array);
		}
		static public function getValueArray4()
		{
            $data_array=array();
			foreach(Hasla_Bunadlist_Block_Adminhtml_Bunadlist_Grid::getOptionArray4() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}