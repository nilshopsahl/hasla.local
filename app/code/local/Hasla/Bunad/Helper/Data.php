<?php
class Hasla_Bunad_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function showPrice($_product){
	
	//print_r($_product->getData());exit;
	$store = Mage::app()->getStore();//exit;
$taxCalculation = Mage::getModel('tax/calculation');
$request = $taxCalculation->getRateRequest(null, null, null, $store);
$taxClassId = $_product->getTaxClassId();
$percent = $taxCalculation->getRate($request->setProductClassId($taxClassId));
	$currency_code = Mage::app()->getStore()->getCurrentCurrencyCode();

	$currency_symbol = Mage::app()->getLocale()->currency( $currency_code )->getSymbol();
	
	$price_with_tax = $_product->getFinalPrice();
    $tax_rate = $percent;
    $divided_value = 1+($tax_rate/100);
    $price_without_tax = $price_with_tax/$divided_value;
	
		if(Mage::getSingleton( 'customer/session' )->isLoggedIn())
		{
			if(Mage::getSingleton('customer/session')->getCustomerGroupId() == 5)
			{
				if(Mage::app()->getStore()->getCode()=='no'){
					if($this->htmlEscape($_product->getSpecialPrice())){
						echo "<strike>".$currency_symbol.' '.number_format($price_without_tax,0).',-'.'</strike><br />';
						echo $currency_symbol.' '.number_format(Mage::helper('tax')->getPrice($_product, $_product->getSpecialPrice()),0).',-';
					}	
					else
					{	
						echo $currency_symbol.' '.number_format($price_without_tax,0).',-';
					}
				}else if (Mage::app()->getStore()->getCode()=='us'){
					if($this->htmlEscape($_product->getSpecialPrice())){
						echo '<strike>'.$currency_symbol.' '. round(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($_product, $_product->getFinalPrice(), false ),false,false)).'</strike><br />';
						echo $currency_symbol.' '. round(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($_product, $_product->getSpecialPrice()),false,false));
					}
					else
					{	
				
						echo $currency_symbol.' '. round(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($_product, $_product->getFinalPrice(), false ),false,false));
					}
				}
			}else{
				
					if(Mage::app()->getStore()->getCode()=='no'){
					if($this->htmlEscape($_product->getSpecialPrice())){
						echo "<strike>".$currency_symbol.' '.number_format(Mage::helper('tax')->getPrice($_product, $_product->getPrice()),0).',-'.'</strike><br />';
						echo $currency_symbol.' '.number_format(Mage::helper('tax')->getPrice($_product, $_product->getSpecialPrice()),0).',-';
					}	
					else
					{	
						echo $currency_symbol.' '.number_format(Mage::helper('tax')->getPrice($_product, $_product->getFinalPrice()),0).',-';
					}
					}else if (Mage::app()->getStore()->getCode()=='us'){
					if($this->htmlEscape($_product->getSpecialPrice())){
						echo '<strike>'.$currency_symbol.' '. round(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($_product, $_product->getPrice()),false,false)).'</strike><br />';
						echo $currency_symbol.' '. round(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($_product, $_product->getSpecialPrice()),false,false));
					}
					else
					{	
						echo $currency_symbol.' '. round(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($_product, $_product->getFinalPrice()),false,false));
					}
					}
			}
		}else{
				
					if(Mage::app()->getStore()->getCode()=='no'){
					if($this->htmlEscape($_product->getSpecialPrice())){
						echo "<strike>".$currency_symbol.' '.number_format(Mage::helper('tax')->getPrice($_product, $_product->getPrice()),0).',-'.'</strike><br />';
						echo $currency_symbol.' '.number_format(Mage::helper('tax')->getPrice($_product, $_product->getSpecialPrice()),0).',-';
					}	
					else
					{	
						echo $currency_symbol.' '.number_format(Mage::helper('tax')->getPrice($_product, $_product->getFinalPrice()),0).',-';
					}
					}else if (Mage::app()->getStore()->getCode()=='us'){
					if($this->htmlEscape($_product->getSpecialPrice())){
						echo '<strike>'.$currency_symbol.' '. round(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($_product, $_product->getPrice()),false,false)).'</strike><br />';
						echo $currency_symbol.' '. round(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($_product, $_product->getSpecialPrice()),false,false));
					}
					else
					{	
						echo $currency_symbol.' '. round(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($_product, $_product->getFinalPrice()),false,false));
					}
					}
			}
	}
}
	 