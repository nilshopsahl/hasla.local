<?php
/**
 * Hasla_Inspiration extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Hasla
 * @package        Hasla_Inspiration
 * @copyright      Copyright (c) 2014
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Inspiration admin grid block
 *
 * @category    Hasla
 * @package     Hasla_Inspiration
 * @author      Ultimate Module Creator
 */
class Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid
    extends Mage_Adminhtml_Block_Widget_Grid {
    /**
     * constructor
     * @access public
     * @author Ultimate Module Creator
     */
    public function __construct(){
        parent::__construct();
        $this->setId('inspirationGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    /**
     * prepare collection
     * @access protected
     * @return Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid
     * @author Ultimate Module Creator
     */
    protected function _prepareCollection(){
        $collection = Mage::getModel('hasla_inspiration/inspiration')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    /**
     * prepare grid collection
     * @access protected
     * @return Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid
     * @author Ultimate Module Creator
     */
    protected function _prepareColumns(){
        $this->addColumn('entity_id', array(
            'header'    => Mage::helper('hasla_inspiration')->__('Id'),
            'index'        => 'entity_id',
            'type'        => 'number'
        ));
       
       
        $this->addColumn('main_banner_product_name', array(
            'header'=> Mage::helper('hasla_inspiration')->__('Main Banner Product name'),
            'index' => 'main_banner_product_name',
            'type'=> 'text',

        ));
        $this->addColumn('left_product1_name', array(
            'header'=> Mage::helper('hasla_inspiration')->__('Left Product 1 Name'),
            'index' => 'left_product1_name',
            'type'=> 'text',

        ));
      
        $this->addColumn('left_product2_name', array(
            'header'=> Mage::helper('hasla_inspiration')->__('Left Product  2 Name'),
            'index' => 'left_product2_name',
            'type'=> 'text',

        ));
        $this->addColumn('left_product3_name', array(
            'header'=> Mage::helper('hasla_inspiration')->__('Left Product3 Name'),
            'index' => 'left_product3_name',
            'type'=> 'text',

        ));
		$this->addColumn('left_product4_name', array(
            'header'    => Mage::helper('hasla_inspiration')->__('Left Product4 Name'),
            'align'     => 'left',
            'index'     => 'left_product4_name',
        ));
        $this->addColumn('right_product_name', array(
            'header'=> Mage::helper('hasla_inspiration')->__('Right Product Name'),
            'index' => 'right_product_name',
            'type'=> 'text',

        ));
		$this->addColumn('status', array(
            'header'    => Mage::helper('hasla_inspiration')->__('Status'),
            'index'        => 'status',
            'type'        => 'options',
            'options'    => array(
                '1' => Mage::helper('hasla_inspiration')->__('Enabled'),
                '0' => Mage::helper('hasla_inspiration')->__('Disabled'),
            )
        ));
        if (!Mage::app()->isSingleStoreMode() && !$this->_isExport) {
            $this->addColumn('store_id', array(
                'header'=> Mage::helper('hasla_inspiration')->__('Store Views'),
                'index' => 'store_id',
                'type'  => 'store',
                'store_all' => true,
                'store_view'=> true,
                'sortable'  => false,
                'filter_condition_callback'=> array($this, '_filterStoreCondition'),
            ));
        }
        $this->addColumn('created_at', array(
            'header'    => Mage::helper('hasla_inspiration')->__('Created at'),
            'index'     => 'created_at',
            'width'     => '120px',
            'type'      => 'datetime',
        ));
        $this->addColumn('updated_at', array(
            'header'    => Mage::helper('hasla_inspiration')->__('Updated at'),
            'index'     => 'updated_at',
            'width'     => '120px',
            'type'      => 'datetime',
        ));
        $this->addColumn('action',
            array(
                'header'=>  Mage::helper('hasla_inspiration')->__('Action'),
                'width' => '100',
                'type'  => 'action',
                'getter'=> 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('hasla_inspiration')->__('Edit'),
                        'url'   => array('base'=> '*/*/edit'),
                        'field' => 'id'
                    )
                ),
                'filter'=> false,
                'is_system'    => true,
                'sortable'  => false,
        ));
        $this->addExportType('*/*/exportCsv', Mage::helper('hasla_inspiration')->__('CSV'));
        $this->addExportType('*/*/exportExcel', Mage::helper('hasla_inspiration')->__('Excel'));
        $this->addExportType('*/*/exportXml', Mage::helper('hasla_inspiration')->__('XML'));
        return parent::_prepareColumns();
    }
    /**
     * prepare mass action
     * @access protected
     * @return Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid
     * @author Ultimate Module Creator
     */
    protected function _prepareMassaction(){
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('inspiration');
        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> Mage::helper('hasla_inspiration')->__('Delete'),
            'url'  => $this->getUrl('*/*/massDelete'),
            'confirm'  => Mage::helper('hasla_inspiration')->__('Are you sure?')
        ));
        $this->getMassactionBlock()->addItem('status', array(
            'label'=> Mage::helper('hasla_inspiration')->__('Change status'),
            'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
            'additional' => array(
                'status' => array(
                        'name' => 'status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => Mage::helper('hasla_inspiration')->__('Status'),
                        'values' => array(
                                '1' => Mage::helper('hasla_inspiration')->__('Enabled'),
                                '0' => Mage::helper('hasla_inspiration')->__('Disabled'),
                        )
                )
            )
        ));
        return $this;
    }
    /**
     * get the row url
     * @access public
     * @param Hasla_Inspiration_Model_Inspiration
     * @return string
     * @author Ultimate Module Creator
     */
    public function getRowUrl($row){
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
    /**
     * get the grid url
     * @access public
     * @return string
     * @author Ultimate Module Creator
     */
    public function getGridUrl(){
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
    /**
     * after collection load
     * @access protected
     * @return Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid
     * @author Ultimate Module Creator
     */
    protected function _afterLoadCollection(){
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
    }
    /**
     * filter store column
     * @access protected
     * @param Hasla_Inspiration_Model_Resource_Inspiration_Collection $collection
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     * @return Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid
     * @author Ultimate Module Creator
     */
    protected function _filterStoreCondition($collection, $column){
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }
        $collection->addStoreFilter($value);
        return $this;
    }
	
	public function getNewWindowOptionsArray()
	{
		$data_array=array(); 
		$data_array[0]='No';
		$data_array[1]='Yes';
		return($data_array);
	}
	public function getNewWindowOptions()
	{
		$data_array=array();
		foreach(Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid::getNewWindowOptionsArray() as $k=>$v){
		   $data_array[]=array('value'=>$k,'label'=>$v);		
		}
		return($data_array);

	}
}
