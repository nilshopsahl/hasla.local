<?php

class Trollweb_Bbsnetaxept_Helper_Config extends Mage_Core_Helper_Abstract {
    public function easypaymentIsEnabled() {
        return Mage::getStoreConfig('payment/bbsnetaxept_withgui/enable_easypayment');
    }
}
