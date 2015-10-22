<?
/**
 * BBS NetAxept, Norge
 *
 * LICENSE AND USAGE INFORMATION
 * It is NOT allowed to modify, copy or re-sell this file or any
 * part of it. Please contact us by email at post@trollweb.no or
 * visit us at www.trollweb.no/bbs if you have any questions about this.
 * Trollweb is not responsible for any problems caused by this file.
 *
 * Visit us at http://www.trollweb.no today!
 *
 * @category   Trollweb
 * @package    Trollweb_BBSNetAxept
 * @copyright  Copyright (c) 2009 Trollweb (http://www.trollweb.no)
 * @license    Single-site License
 *
 */

$installer = $this;
$installer->startSetup();
$connection = $installer->getConnection();

// Define panhash table
$panhashTable = $connection->newTable($installer->getTable('bbsnetaxept/panhash'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'nullable' => false,
        'primary' => true,
    ), 'Id')

    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false,
    ), 'Customer Id')

    ->addColumn('panhash', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Pan Hash')

    ->addColumn('masked_pan', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Masked Pan')

    ->addColumn('expiry_date', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable' => false,
    ), 'Expiry Date')

    ->addIndex(
        $installer->getIdxName('bbsnetaxept/panhash', array('order_id'), Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        array('customer_id'),
        array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE)
    );

$connection->createTable($panhashTable);

$installer->endSetup();
