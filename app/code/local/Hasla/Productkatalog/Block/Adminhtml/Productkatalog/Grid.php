<?php

class Hasla_Productkatalog_Block_Adminhtml_Productkatalog_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("productkatalogGrid");
				$this->setDefaultSort("productkatalog_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("productkatalog/productkatalog")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("productkatalog_id", array(
				"header" => Mage::helper("productkatalog")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "productkatalog_id",
				));
                
				$this->addColumn("name", array(
				"header" => Mage::helper("productkatalog")->__("Name"),
				"index" => "name",
				));
				$this->addColumn("title", array(
				"header" => Mage::helper("productkatalog")->__("Title"),
				"index" => "title",
				));
				$this->addColumn("external_url", array(
				"header" => Mage::helper("productkatalog")->__("External URL"),
				"index" => "external_url",
				));
						$this->addColumn('status', array(
						'header' => Mage::helper('productkatalog')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>Hasla_Productkatalog_Block_Adminhtml_Productkatalog_Grid::getOptionArray5(),				
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
			$this->setMassactionIdField('productkatalog_id');
			$this->getMassactionBlock()->setFormFieldName('productkatalog_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_productkatalog', array(
					 'label'=> Mage::helper('productkatalog')->__('Remove Productkatalog'),
					 'url'  => $this->getUrl('*/adminhtml_productkatalog/massRemove'),
					 'confirm' => Mage::helper('productkatalog')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray5()
		{
            $data_array=array(); 
			$data_array[0]='Enable';
			$data_array[1]='Disable';
            return($data_array);
		}
		static public function getValueArray5()
		{
            $data_array=array();
			foreach(Hasla_Productkatalog_Block_Adminhtml_Productkatalog_Grid::getOptionArray5() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}