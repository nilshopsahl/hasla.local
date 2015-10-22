<?php
class Dev_Custompayment_Model_Observer{

	public function filterpaymentmethod(Varien_Event_Observer $observer){
		
		/* Immedaite retun when Disable Customer Group Catalog is true on extension Amasty_Groupcat */
		
/*		if (Mage::getStoreConfig('amgroupcat/general/disable')):
			return;
		endif; 
*/
		$GPID=5;

		$method = $observer->getEvent()->getMethodInstance();
		$quote=$observer->getEvent()->getQuote();

		/* Immedaiate return when disable */
		if(empty($quote)): 	return; endif;	

		//$productsIds=$this->checkCustomer($quote);

		/*
		if(!empty($productsIds) && $this->CheckgroupId($quote) ){
			Mage::getModel('amgroupcat/rules')->getActiveRulesForProduct($productId,$groupId, $params);

		} */
		$CustomerGroupId=$this->CheckgroupId($quote);
		//Mage::log('CustomerId'.$CustomerGroupId,true,'mylog.log',true);
		
		$result = $observer->getEvent()->getResult();
		/* Disable payment getways when customer group is 2 */
		if($method->getCode()=='custompayment'):
		//Mage::log('Method'.$method->getCode(),true,'custompayment.log',true);

			if($CustomerGroupId && $CustomerGroupId==$GPID):
				$result->isAvailable = true;
			else:
				$result->isAvailable = false;
			endif;
				return;
		endif;
		if($method->getCode()!='custompayment' && $result->isAvailable ){
			//Mage::log('MethodElse'.$method->getCode(),true,'Noncustompayment.log',true);
			if($CustomerGroupId && $CustomerGroupId==$GPID):
				$result->isAvailable = false;
				return;
			endif;
		}
	}
	/*
	 Check Current item is in customer group
	  rectriction when 
	*/
	public function checkCustomer($quote){
		$ProductsIds=array();
		try{
        foreach ($quote->getItemsCollection() as $item) {
			$ProductsIds[]=$item->getProductId();
			}
			return $ProductsIds;
		}catch(Exception $e){
		}
		return $ProductsIds;
	}
	public function CheckgroupId($quote){
		
		$groupId=false;		
		if(Mage::getSingleton('customer/session')->isLoggedIn()):
			$session = Mage::getSingleton('customer/session');
			$groupId = $session->getCustomerGroupId();
		elseif($quote->getCustomerGroupId()):
			$groupId = $quote->getCustomerGroupId();
		else:
			$groupId=false;		
		endif;
		return $groupId;	
	}

}