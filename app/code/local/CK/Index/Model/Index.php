<?php
class CK_Index_Model_Index extends Mage_Core_Model_Abstract
{
	const PRODUCT_MAP = array(
		'entity_id' 		=> 'product_id',
		'sku' 				=> 'sku',
		'name' 				=> 'name',
		'description' 		=> 'description',
		'short_description' => 'short_description',
		'weight'			=> 'weight',
		'price'				=> 'price',
		'special_price'		=> 'special_price',
		'url_key'			=> 'url_key',
		'visibility'		=> 'visibility',
		'small_image'		=> 'small_image'
	);

	protected function _construct()
	{
		$this->_init('ck_index/index');
	}

	public function update($data)
	{
		$docs = $this->_getDocuments($data);
		$url = $this->_getHelper()->getSolrUrl('update', array('wt' => 'json'));
		Zend_Debug::dump($url);
		$client = new Zend_Http_Client($url, array('keepalive' => true));
		$client->setRawData(Mage::helper('core')->jsonEncode($docs), 'application/json');

		return $client->request(Zend_Http_Client::POST);
	}

	protected function _getDocuments($data)
	{
		$documents = array();
		if($data instanceof Mage_Catalog_Model_Resource_Product_Collection){
			foreach($data as $product){
				$documents[] = $product->toSolrDocument();
			}
		}elseif($data instanceof Mage_Catalog_Model_Product){
			$documents[] = $data->toSolrDocument();
		}else{
			$documents[] = $data;
		}
		return $documents;
	}

	protected function _getHelper()
	{
		return Mage::helper('ck_index');
	}
}