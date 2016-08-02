<?php
class CK_Index_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getSolrUrl($action = '', $query = array())
	{
		$host = Mage::getStoreConfig('ck_index/solr/host');
		$core = Mage::getStoreConfig('ck_index/solr/core');

		$host = rtrim($host, '/');
		$core = trim($core, '/');

		/*
		$host = Mage::getStoreConfig('ck_index/solr/host');
		$core = Mage::getStoreConfig('ck_index/solr/core');
		$core = trim($core, '/');

		$url = http_build_url(array(
			'scheme' => 'http',
			'host' => $host,
			'path' => $core . '/' . $action,
			'query' => http_build_query($query)
		));

		return $url;
		*/

		return $host . '/' . $core . '/' . $action;
	}
}
