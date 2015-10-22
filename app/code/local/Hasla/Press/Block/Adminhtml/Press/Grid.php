<?php

class Hasla_Press_Block_Adminhtml_Press_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("pressGrid");
				$this->setDefaultSort("hasla_press_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("press/press")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("hasla_press_id", array(
				"header" => Mage::helper("press")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "hasla_press_id",
				));
                
				$this->addColumn("name", array(
				"header" => Mage::helper("press")->__("Name"),
				"index" => "name",
				));
						$this->addColumn('status', array(
						'header' => Mage::helper('press')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>Hasla_Press_Block_Adminhtml_Press_Grid::getOptionArray3(),				
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
			$this->setMassactionIdField('hasla_press_id');
			$this->getMassactionBlock()->setFormFieldName('hasla_press_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_press', array(
					 'label'=> Mage::helper('press')->__('Remove Press'),
					 'url'  => $this->getUrl('*/adminhtml_press/massRemove'),
					 'confirm' => Mage::helper('press')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray3()
		{
            $data_array=array(); 
			$data_array[0]='Enabled';
			$data_array[1]='Disabled';
            return($data_array);
		}
		static public function getValueArray3()
		{
            $data_array=array();
			foreach(Hasla_Press_Block_Adminhtml_Press_Grid::getOptionArray3() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}