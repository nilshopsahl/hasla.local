<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table hasla_reatailers(retailers_id int not null auto_increment, area varchar(100),subarea varchar(100), name varchar(100),contact varchar(100),primary key(retailers_id));
    		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 