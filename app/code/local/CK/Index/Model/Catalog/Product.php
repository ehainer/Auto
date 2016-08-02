<?php
class CK_Index_Model_Catalog_Product extends Mage_Catalog_Model_Product
{
	public function toSolrDocument()
	{
		$product = $this;
		$document = array('id' => $this->getStoreId() . '-' . $this->getId());

		if(!$this->_isLoaded()){
			$product = Mage::getModel('catalog/product')->load($this->getId());
		}

		foreach(CK_Index_Model_Index::PRODUCT_MAP as $attribute => $index){
			$document[$index] = $product->getData($attribute);
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
