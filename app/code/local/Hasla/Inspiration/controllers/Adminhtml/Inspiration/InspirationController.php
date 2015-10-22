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
 * Inspiration admin controller
 *
 * @category    Hasla
 * @package     Hasla_Inspiration
 * @author      Ultimate Module Creator
 */
class Hasla_Inspiration_Adminhtml_Inspiration_InspirationController
    extends Hasla_Inspiration_Controller_Adminhtml_Inspiration {
    /**
     * init the inspiration
     * @access protected
     * @return Hasla_Inspiration_Model_Inspiration
     */
    protected function _initInspiration(){
        $inspirationId  = (int) $this->getRequest()->getParam('id');
        $inspiration    = Mage::getModel('hasla_inspiration/inspiration');
        if ($inspirationId) {
            $inspiration->load($inspirationId);
        }
        Mage::register('current_inspiration', $inspiration);
        return $inspiration;
    }
     /**
     * default action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function indexAction() {
        $this->loadLayout();
        $this->_title(Mage::helper('hasla_inspiration')->__('Inspiration'))
             ->_title(Mage::helper('hasla_inspiration')->__('Manage Inspiration'));
        $this->renderLayout();
    }
    /**
     * grid action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function gridAction() {
        $this->loadLayout()->renderLayout();
    }
    /**
     * edit inspiration - action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function editAction() {
        $inspirationId    = $this->getRequest()->getParam('id');
        $inspiration      = $this->_initInspiration();
        if ($inspirationId && !$inspiration->getId()) {
            $this->_getSession()->addError(Mage::helper('hasla_inspiration')->__('This inspiration no longer exists.'));
            $this->_redirect('*/*/');
            return;
        }
        $data = Mage::getSingleton('adminhtml/session')->getInspirationData(true);
        if (!empty($data)) {
            $inspiration->setData($data);
        }
        Mage::register('inspiration_data', $inspiration);
        $this->loadLayout();
        $this->_title(Mage::helper('hasla_inspiration')->__('Inspiration'))
             ->_title(Mage::helper('hasla_inspiration')->__('Manage Inspiration'));
        if ($inspiration->getId()){
            $this->_title($inspiration->getLeftProduct4Name());
        }
        else{
            $this->_title(Mage::helper('hasla_inspiration')->__('Add inspiration'));
        }
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        $this->renderLayout();
    }
    /**
     * new inspiration action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function newAction() {
        $this->_forward('edit');
    }
    /**
     * save inspiration - action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function saveAction() {
        if ($data = $this->getRequest()->getPost('inspiration')) {
            try {
                $inspiration = $this->_initInspiration();
                $inspiration->addData($data);
                $mainbannerName = $this->_uploadAndGetName('mainbanner', Mage::helper('hasla_inspiration/inspiration_image')->getImageBaseDir(), $data);
                $inspiration->setData('mainbanner', $mainbannerName);
                $leftProduct1ImageName = $this->_uploadAndGetName('left_product1_image', Mage::helper('hasla_inspiration/inspiration_image')->getImageBaseDir(), $data);
                $inspiration->setData('left_product1_image', $leftProduct1ImageName);
                $leftProduct2ImageName = $this->_uploadAndGetName('left_product2_image', Mage::helper('hasla_inspiration/inspiration_image')->getImageBaseDir(), $data);
                $inspiration->setData('left_product2_image', $leftProduct2ImageName);
                $leftProduct3ImageName = $this->_uploadAndGetName('left_product3_image', Mage::helper('hasla_inspiration/inspiration_image')->getImageBaseDir(), $data);
                $inspiration->setData('left_product3_image', $leftProduct3ImageName);
                $leftProduct4ImageName = $this->_uploadAndGetName('left_product4_image', Mage::helper('hasla_inspiration/inspiration_image')->getImageBaseDir(), $data);
                $inspiration->setData('left_product4_image', $leftProduct4ImageName);
                $rightProductImageName = $this->_uploadAndGetName('right_product_image', Mage::helper('hasla_inspiration/inspiration_image')->getImageBaseDir(), $data);
                $inspiration->setData('right_product_image', $rightProductImageName);
                $inspiration->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('hasla_inspiration')->__('Inspiration was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $inspiration->getId()));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            }
            catch (Mage_Core_Exception $e){
                if (isset($data['mainbanner']['value'])){
                    $data['mainbanner'] = $data['mainbanner']['value'];
                }
                if (isset($data['left_product1_image']['value'])){
                    $data['left_product1_image'] = $data['left_product1_image']['value'];
                }
                if (isset($data['left_product2_image']['value'])){
                    $data['left_product2_image'] = $data['left_product2_image']['value'];
                }
                if (isset($data['left_product3_image']['value'])){
                    $data['left_product3_image'] = $data['left_product3_image']['value'];
                }
                if (isset($data['left_product4_image']['value'])){
                    $data['left_product4_image'] = $data['left_product4_image']['value'];
                }
                if (isset($data['right_product_image']['value'])){
                    $data['right_product_image'] = $data['right_product_image']['value'];
                }
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setInspirationData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
            catch (Exception $e) {
                Mage::logException($e);
                if (isset($data['mainbanner']['value'])){
                    $data['mainbanner'] = $data['mainbanner']['value'];
                }
                if (isset($data['left_product1_image']['value'])){
                    $data['left_product1_image'] = $data['left_product1_image']['value'];
                }
                if (isset($data['left_product2_image']['value'])){
                    $data['left_product2_image'] = $data['left_product2_image']['value'];
                }
                if (isset($data['left_product3_image']['value'])){
                    $data['left_product3_image'] = $data['left_product3_image']['value'];
                }
                if (isset($data['left_product4_image']['value'])){
                    $data['left_product4_image'] = $data['left_product4_image']['value'];
                }
                if (isset($data['right_product_image']['value'])){
                    $data['right_product_image'] = $data['right_product_image']['value'];
                }
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('hasla_inspiration')->__('There was a problem saving the inspiration.'));
                Mage::getSingleton('adminhtml/session')->setInspirationData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('hasla_inspiration')->__('Unable to find inspiration to save.'));
        $this->_redirect('*/*/');
    }
    /**
     * delete inspiration - action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function deleteAction() {
        if( $this->getRequest()->getParam('id') > 0) {
            try {
                $inspiration = Mage::getModel('hasla_inspiration/inspiration');
                $inspiration->setId($this->getRequest()->getParam('id'))->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('hasla_inspiration')->__('Inspiration was successfully deleted.'));
                $this->_redirect('*/*/');
                return;
            }
            catch (Mage_Core_Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('hasla_inspiration')->__('There was an error deleting inspiration.'));
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                Mage::logException($e);
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('hasla_inspiration')->__('Could not find inspiration to delete.'));
        $this->_redirect('*/*/');
    }
    /**
     * mass delete inspiration - action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function massDeleteAction() {
        $inspirationIds = $this->getRequest()->getParam('inspiration');
        if(!is_array($inspirationIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('hasla_inspiration')->__('Please select manage inspiration to delete.'));
        }
        else {
            try {
                foreach ($inspirationIds as $inspirationId) {
                    $inspiration = Mage::getModel('hasla_inspiration/inspiration');
                    $inspiration->setId($inspirationId)->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('hasla_inspiration')->__('Total of %d manage inspiration were successfully deleted.', count($inspirationIds)));
            }
            catch (Mage_Core_Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('hasla_inspiration')->__('There was an error deleting manage inspiration.'));
                Mage::logException($e);
            }
        }
        $this->_redirect('*/*/index');
    }
    /**
     * mass status change - action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function massStatusAction(){
        $inspirationIds = $this->getRequest()->getParam('inspiration');
        if(!is_array($inspirationIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('hasla_inspiration')->__('Please select manage inspiration.'));
        }
        else {
            try {
                foreach ($inspirationIds as $inspirationId) {
                $inspiration = Mage::getSingleton('hasla_inspiration/inspiration')->load($inspirationId)
                            ->setStatus($this->getRequest()->getParam('status'))
                            ->setIsMassupdate(true)
                            ->save();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d manage inspiration were successfully updated.', count($inspirationIds)));
            }
            catch (Mage_Core_Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('hasla_inspiration')->__('There was an error updating manage inspiration.'));
                Mage::logException($e);
            }
        }
        $this->_redirect('*/*/index');
    }
    /**
     * export as csv - action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function exportCsvAction(){
        $fileName   = 'inspiration.csv';
        $content    = $this->getLayout()->createBlock('hasla_inspiration/adminhtml_inspiration_grid')->getCsv();
        $this->_prepareDownloadResponse($fileName, $content);
    }
    /**
     * export as MsExcel - action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function exportExcelAction(){
        $fileName   = 'inspiration.xls';
        $content    = $this->getLayout()->createBlock('hasla_inspiration/adminhtml_inspiration_grid')->getExcelFile();
        $this->_prepareDownloadResponse($fileName, $content);
    }
    /**
     * export as xml - action
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function exportXmlAction(){
        $fileName   = 'inspiration.xml';
        $content    = $this->getLayout()->createBlock('hasla_inspiration/adminhtml_inspiration_grid')->getXml();
        $this->_prepareDownloadResponse($fileName, $content);
    }
    /**
     * Check if admin has permissions to visit related pages
     * @access protected
     * @return boolean
     * @author Ultimate Module Creator
     */
    protected function _isAllowed() {
        return Mage::getSingleton('admin/session')->isAllowed('cms/hasla_inspiration/inspiration');
    }
}
