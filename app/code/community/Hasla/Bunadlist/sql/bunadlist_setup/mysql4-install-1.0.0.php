<?php
$installer = $this;
$installer->startSetup();
$sql="CREATE TABLE IF NOT EXISTS `{$installer->getTable('bunadlist/bunadlist')}` (
  `bunadlist` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `external_url` text NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`bunadlist`),
  KEY `title` (`title`,`image`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
";

$installer->run($sql);

$installer->endSetup();
	 