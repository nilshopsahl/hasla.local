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
 * Inspiration edit form tab
 *
 * @category    Hasla
 * @package     Hasla_Inspiration
 * @author      Ultimate Module Creator
 */
class Hasla_Inspiration_Block_Adminhtml_Inspiration_Edit_Tab_Form
    extends Mage_Adminhtml_Block_Widget_Form {
    /**
     * prepare the form
     * @access protected
     * @return Inspiration_Inspiration_Block_Adminhtml_Inspiration_Edit_Tab_Form
     * @author Ultimate Module Creator
     */
    protected function _prepareForm(){
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('inspiration_');
        $form->setFieldNameSuffix('inspiration');
        $this->setForm($form);
        $fieldset = $form->addFieldset('inspiration_form', array('legend'=>Mage::helper('hasla_inspiration')->__('Inspiration')));
        $fieldset->addType('image', Mage::getConfig()->getBlockClassName('hasla_inspiration/adminhtml_inspiration_helper_image'));

        $fieldset->addField('mainbanner', 'image', array(
            'label' => Mage::helper('hasla_inspiration')->__('Main Banner Product Image'),
            'name'  => 'mainbanner',
            'note'	=> $this->__('Main Banner(100px X 390px)'),

        ));

        $fieldset->addField('main_banner_product_name', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Main Banner Product name'),
            'name'  => 'main_banner_product_name',
            'note'	=> $this->__('Main Banner Product name'),
            'required'  => true,
            'class' => 'required-entry',

        ));

        $fieldset->addField('main_banner_product_url', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Main Banner Product Url'),
            'name'  => 'main_banner_product_url',
            'note'	=> $this->__('Main Banner Product Url'),
            'required'  => true,
            'class' => 'required-entry',

        ));
		$fieldset->addField('main_banner_new_window', 'select', array(
			'label'     => Mage::helper('hasla_inspiration')->__('Main Banner New Window?'),
			'name' => 'main_banner_new_window',
			'values'   => Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid::getNewWindowOptions(),			
			));

        $fieldset->addField('left_product1_name', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product 1 Name'),
            'name'  => 'left_product1_name',
            'note'	=> $this->__('Left Product 1 Name'),
            'required'  => true,
            'class' => 'required-entry',

        ));

        $fieldset->addField('left_product1_image', 'image', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product 1 Image'),
            'name'  => 'left_product1_image',
            'note'	=> $this->__('Left Product 1 Image(243px X 243px)'),

        ));

        $fieldset->addField('left_product1_url', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product 1  Url'),
            'name'  => 'left_product1_url',
            'note'	=> $this->__('Left Product 1 Link'),
            'required'  => true,
            'class' => 'required-entry',

        ));
		
		$fieldset->addField('left_product1_new_window', 'select', array(
			'label'     => Mage::helper('hasla_inspiration')->__('Left Product 1 New Window?'),
			'name' => 'left_product1_new_window',
			'values'   => Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid::getNewWindowOptions(),			
			));		

        $fieldset->addField('left_product2_name', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product  2 Name'),
            'name'  => 'left_product2_name',
            'note'	=> $this->__('Left Product  2 Name'),
            'required'  => true,
            'class' => 'required-entry',

        ));

        $fieldset->addField('left_product2_image', 'image', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product 2 Image'),
            'name'  => 'left_product2_image',
            'note'	=> $this->__('Left Product 2 Image(243px X 243px)'),

        ));

        $fieldset->addField('left_product2_url', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product 2  Url'),
            'name'  => 'left_product2_url',
            'note'	=> $this->__('Left Product 2  Url'),

        ));
		
		$fieldset->addField('left_product2_new_window', 'select', array(
			'label'     => Mage::helper('hasla_inspiration')->__('Left Product 2 New Window?'),
			'name' => 'left_product2_new_window',
			'values'   => Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid::getNewWindowOptions(),			
			));

        $fieldset->addField('left_product3_name', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product3 Name'),
            'name'  => 'left_product3_name',
            'note'	=> $this->__('Left Product3 Name'),
            'required'  => true,
            'class' => 'required-entry',

        ));

        $fieldset->addField('left_product3_image', 'image', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product3  Image'),
            'name'  => 'left_product3_image',
            'note'	=> $this->__('Left Product3  Image(243px X 243px)'),

        ));

        $fieldset->addField('left_product3_url', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product3 Url'),
            'name'  => 'left_product3_url',
            'note'	=> $this->__('Left Product3 Url'),
            'required'  => true,
            'class' => 'required-entry',

        ));
		
		$fieldset->addField('left_product3_new_window', 'select', array(
			'label'     => Mage::helper('hasla_inspiration')->__('Left Product 3 New Window?'),
			'name' => 'left_product3_new_window',
			'values'   => Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid::getNewWindowOptions(),			
			));

        $fieldset->addField('left_product4_name', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product4 Name'),
            'name'  => 'left_product4_name',
            'note'	=> $this->__('Left Product4 Name'),
            'required'  => true,
            'class' => 'required-entry',

        ));

        $fieldset->addField('left_product4_image', 'image', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product4 Image'),
            'name'  => 'left_product4_image',
            'note'	=> $this->__('Left Product4 Image(243px X 243px)'),

        ));

        $fieldset->addField('left_product4_url', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Left Product4 Url'),
            'name'  => 'left_product4_url',
            'note'	=> $this->__('Left Product4 Url'),
            'required'  => true,
            'class' => 'required-entry',

        ));
		
		$fieldset->addField('left_product4_new_window', 'select', array(
			'label'     => Mage::helper('hasla_inspiration')->__('Left Product 4 New Window?'),
			'name' => 'left_product4_new_window',
			'values'   => Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid::getNewWindowOptions(),			
			));

        $fieldset->addField('right_product_name', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Right Product Name'),
            'name'  => 'right_product_name',
            'note'	=> $this->__('Right Product Name'),
            'required'  => true,
            'class' => 'required-entry',

        ));

        $fieldset->addField('right_product_image', 'image', array(
            'label' => Mage::helper('hasla_inspiration')->__('Right Product Image'),
            'name'  => 'right_product_image',
            'note'	=> $this->__('Right Product Image(495px X 495px)'),
            'required'  => true,
            'class' => 'required-entry',

        ));

        $fieldset->addField('right_product_url', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Right Product Url'),
            'name'  => 'right_product_url',
            'note'	=> $this->__('right_product_url'),
            'required'  => true,
            'class' => 'required-entry',

        ));
		
		$fieldset->addField('right_product_new_window', 'select', array(
			'label'     => Mage::helper('hasla_inspiration')->__('Right Product New Window?'),
			'name' => 'right_product_new_window',
			'values'   => Hasla_Inspiration_Block_Adminhtml_Inspiration_Grid::getNewWindowOptions(),			
			));
		
		$fieldset->addField('bottom_desc_title', 'text', array(
            'label' => Mage::helper('hasla_inspiration')->__('Bottom Description Title'),
            'name'  => 'bottom_desc_title',
            'note'	=> $this->__('Bottom Description Title'),
            //'required'  => true,
            //'class' => 'required-entry',

        ));
		$fieldset->addField('bottom_desc', 'textarea', array(
            'label' => Mage::helper('hasla_inspiration')->__('Bottom Description Norwegian'),
            'name'  => 'bottom_desc',
            'note'	=> $this->__('Bottom Description Norwegian'),
            'required'  => true,
            'class' => 'required-entry',

        ));
		$fieldset->addField('bottom_desc_en', 'textarea', array(
            'label' => Mage::helper('hasla_inspiration')->__('Bottom Description English'),
            'name'  => 'bottom_desc_en',
            'note'	=> $this->__('Bottom Description English'),
            'required'  => true,
            'class' => 'required-entry',

        ));
        $fieldset->addField('status', 'select', array(
            'label' => Mage::helper('hasla_inspiration')->__('Status'),
            'name'  => 'status',
            'values'=> array(
                array(
                    'value' => 1,
                    'label' => Mage::helper('hasla_inspiration')->__('Enabled'),
                ),
                array(
                    'value' => 0,
                    'label' => Mage::helper('hasla_inspiration')->__('Disabled'),
                ),
            ),
        ));
        if (Mage::app()->isSingleStoreMode()){
            $fieldset->addField('store_id', 'hidden', array(
                'name'      => 'stores[]',
                'value'     => Mage::app()->getStore(true)->getId()
            ));
            Mage::registry('current_inspiration')->setStoreId(Mage::app()->getStore(true)->getId());
        }
        $formValues = Mage::registry('current_inspiration')->getDefaultValues();
        if (!is_array($formValues)){
            $formValues = array();
        }
        if (Mage::getSingleton('adminhtml/session')->getInspirationData()){
            $formValues = array_merge($formValues, Mage::getSingleton('adminhtml/session')->getInspirationData());
            Mage::getSingleton('adminhtml/session')->setInspirationData(null);
        }
        elseif (Mage::registry('current_inspiration')){
            $formValues = array_merge($formValues, Mage::registry('current_inspiration')->getData());
        }
        $form->setValues($formValues);
        return parent::_prepareForm();
    }
}
