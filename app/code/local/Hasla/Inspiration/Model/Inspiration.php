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
 * Inspiration model
 *
 * @category    Hasla
 * @package     Hasla_Inspiration
 * @author      Ultimate Module Creator
 */
class Hasla_Inspiration_Model_Inspiration
    extends Mage_Core_Model_Abstract {
    /**
     * Entity code.
     * Can be used as part of method name for entity processing
     */
    const ENTITY    = 'hasla_inspiration_inspiration';
    const CACHE_TAG = 'hasla_inspiration_inspiration';
    /**
     * Prefix of model events names
     * @var string
     */
    protected $_eventPrefix = 'hasla_inspiration_inspiration';

    /**
     * Parameter name in event
     * @var string
     */
    protected $_eventObject = 'inspiration';
    /**
     * constructor
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function _construct(){
        parent::_construct();
        $this->_init('hasla_inspiration/inspiration');
    }
    /**
     * before save inspiration
     * @access protected
     * @return Hasla_Inspiration_Model_Inspiration
     * @author Ultimate Module Creator
     */
    protected function _beforeSave(){
        parent::_beforeSave();
        $now = Mage::getSingleton('core/date')->gmtDate();
        if ($this->isObjectNew()){
            $this->setCreatedAt($now);
        }
        $this->setUpdatedAt($now);
        return $this;
    }
    /**
     * save inspiration relation
     * @access public
     * @return Hasla_Inspiration_Model_Inspiration
     * @author Ultimate Module Creator
     */
    protected function _afterSave() {
        return parent::_afterSave();
    }
    /**
     * get default values
     * @access public
     * @return array
     * @author Ultimate Module Creator
     */
    public function getDefaultValues() {
        $values = array();
        $values['status'] = 1;
        return $values;
    }
}
