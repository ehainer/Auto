<?php
class CK_Index_Model_Resource_Index extends Mage_Core_Model_Resource_Db_Abstract
{
	protected function _construct()
	{
		$this->_init('ck_index/index', 'entity_id');
	}
}