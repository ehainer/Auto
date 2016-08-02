<?php
putenv("SHELL=/bin/bash");
ob_implicit_flush(true);
ini_set('display_errors', 1);
require_once('app/Mage.php');
umask(0);
Mage::setIsDeveloperMode(true);
Mage::app();
//Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$products = Mage::getModel('catalog/product')->getCollection();
	//->addAttributeToSelect(array('sku', 'name', 'description', 'short_description', 'weight', 'price', 'special_price', 'url_key', 'visibility', 'small_image'))

//Zend_Debug::dump($products->toSolrDocument());

$response = Mage::getModel('ck_index/index')->update($products);

Zend_Debug::dump($response);
