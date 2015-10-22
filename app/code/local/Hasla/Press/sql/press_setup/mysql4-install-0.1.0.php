<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table hasla_press(hasla_press_id int not null auto_increment, name varchar(100), image varchar(100),description text,status enum('0','1'), primary key(hasla_press_id));
    		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 