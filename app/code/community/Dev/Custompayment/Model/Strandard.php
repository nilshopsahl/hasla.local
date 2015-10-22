<?php
class Dev_Custompayment_Model_Strandard extends Mage_Payment_Model_Method_Abstract{
	protected $_code='custompayment';
	
	public function getInstructions(){
        return trim($this->getConfigData('instructions'));
    }
    /**
     * Get config payment action, do nothing if status is pending
     *
     * @return string|null
     */
    public function getConfigPaymentAction()
    {
        return $this->getConfigData('order_status') == 'pending' ? null : parent::getConfigPaymentAction();
    }
	
	


}
?>