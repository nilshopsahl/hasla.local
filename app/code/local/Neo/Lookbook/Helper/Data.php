<?php
class Neo_Lookbook_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getConnectUrl()
	{
		return $this->_getUrl('lookbook', array('_secure'=>true));
	}
	
}
	 