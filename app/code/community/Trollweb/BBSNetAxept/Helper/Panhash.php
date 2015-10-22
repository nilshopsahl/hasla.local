<?php

class Trollweb_Bbsnetaxept_Helper_Panhash extends Mage_Core_Helper_Abstract {
    public function load() {
        $customerId = $this->getCustomerId();
        if (!$customerId) {
            return null;
        }

        $entry = $this->loadPanhash($customerId);
        if (!$entry) {
            return null;
        }

        if ($this->isExpired($entry)) {
            $entry->delete();
            return null;
        }

        return $entry;
    }

    public function save($panHash, $maskedPan, $expiryDate) {
        if (!$panHash) {
            return;
        }

        $customerId = $this->getCustomerId();
        if (!$customerId) {
            return;
        }

        $entry = $this->loadPanhash($customerId);
        if (!$entry) {
            $entry = Mage::getModel("bbsnetaxept/panhash");
        }

        $date = $this->formatDate($expiryDate);

        $entry->setCustomerId($customerId);
        $entry->setPanhash($panHash);

        if ($maskedPan) {
            $entry->setMaskedPan($maskedPan);
        }

        if ($expiryDate) {
            $entry->setExpiryDate($date);
        }

        $entry->save();
    }

    private function loadPanhash($customerId) {
        $entries = Mage::getModel("bbsnetaxept/panhash")
            ->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->load();

        if (count($entries) === 0) {
            return null;
        }

        return $entries->getFirstItem();
    }

    private function getCustomerId() {
        $session = Mage::getSingleton('customer/session');
        if (!$session->isLoggedIn()) {
            return null;
        }

        return $session->getCustomer()->getId();
    }

    private function formatDate($expiryDate) {
        $year = (int)substr($expiryDate, 0, 2);
        $month = (int)substr($expiryDate, 2, 2);
        return sprintf("%04d-%02d-01", $year + 2000, $month);
    }

    private function isExpired($entry) {
        $expires = strtotime($entry->getExpiryDate());
        $now = time();
        return $now > $expires;
    }
}
