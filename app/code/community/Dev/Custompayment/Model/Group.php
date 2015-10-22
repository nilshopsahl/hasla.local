<?php
class Dev_Custompayment_Model_Group{
	
	public function toOptionArray()
    {
        $customerGroup = array();

        $customer_group = new Mage_Customer_Model_Group();
        $allGroups  = $customer_group->getCollection()->toOptionHash();
		// $customerGroup[-1]=array('value'=>-1,'label'=>'Please select');
        foreach($allGroups as $key=>$allGroup){
            $customerGroup[$key] = array('value'=>$key,'label'=>$allGroup);
        }

        return $customerGroup;
    }


}
?>