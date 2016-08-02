<?php
class CK_Index_Model_Catalog_Product extends Mage_Catalog_Model_Product
{
	public function toSolrDocument()
	{
		$document = array();
		$data = $this->getData();

		if(!$this->_isLoaded()){
			$product = Mage::getModel('catalog/product')->load($this->getId());
			$data = $product->getData();
		}

		foreach(CK_Index_Model_Index::PRODUCT_MAP as $attribute => $index){
			$document[$index] = isset($data[$attribute]) ? $data[$attribute] : null;
		}
		return $document;
	}

	protected function _isLoaded()
	{
		foreach(CK_Index_Model_Index::PRODUCT_MAP as $attribute => $index){
			if(is_null($this->getData($attribute))){
				return false;
			}
		}
		return true;
	}
}
