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
 * Inspiration module install script
 *
 * @category    Hasla
 * @package     Hasla_Inspiration
 * @author      Ultimate Module Creator
 */
$this->startSetup();
$table = $this->getConnection()
    ->newTable($this->getTable('hasla_inspiration/inspiration'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Inspiration ID')
    ->addColumn('mainbanner', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Main Banner Product Image')

    ->addColumn('main_banner_product_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Main Banner Product name')

    ->addColumn('main_banner_product_url', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Main Banner Product Url')

    ->addColumn('left_product1_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Left Product 1 Name')

    ->addColumn('left_product1_image', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Left Product 1 Image')

    ->addColumn('left_product1_url', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Left Product 1  Url')

    ->addColumn('left_product2_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Left Product  2 Name')

    ->addColumn('left_product2_image', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Left Product 2 Image')

    ->addColumn('left_product2_url', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Left Product 2  Url')

    ->addColumn('left_product3_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Left Product3 Name')

    ->addColumn('left_product3_image', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Left Product3  Image')

    ->addColumn('left_product3_url', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Left Product3 Url')

    ->addColumn('left_product4_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Left Product4 Name')

    ->addColumn('left_product4_image', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Left Product4 Image')

    ->addColumn('left_product4_url', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Left Product4 Url')

    ->addColumn('right_product_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Right Product Name')

    ->addColumn('right_product_image', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Right Product Image')

    ->addColumn('right_product_url', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'Right Product Url')

    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        ), 'Enabled')

     ->addColumn('status', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        ), 'Inspiration Status')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            ), 'Inspiration Modification Time')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Inspiration Creation Time') 
    ->setComment('Inspiration Table');
$this->getConnection()->createTable($table);
$table = $this->getConnection()
    ->newTable($this->getTable('hasla_inspiration/inspiration_store'))
    ->addColumn('inspiration_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'primary'   => true,
        ), 'Inspiration ID')
    ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Store ID')
    ->addIndex($this->getIdxName('hasla_inspiration/inspiration_store', array('store_id')), array('store_id'))
    ->addForeignKey($this->getFkName('hasla_inspiration/inspiration_store', 'inspiration_id', 'hasla_inspiration/inspiration', 'entity_id'), 'inspiration_id', $this->getTable('hasla_inspiration/inspiration'), 'entity_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->addForeignKey($this->getFkName('hasla_inspiration/inspiration_store', 'store_id', 'core/store', 'store_id'), 'store_id', $this->getTable('core/store'), 'store_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Manage Inspiration To Store Linkage Table');
$this->getConnection()->createTable($table);
$this->endSetup();
