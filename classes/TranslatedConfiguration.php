<?php
/*
* 2007-2011 PrestaShop 
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2011 PrestaShop SA
*  @version  Release: $Revision: 6903 $
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class TranslatedConfigurationCore extends Configuration {
	protected $webserviceParameters = array ('objectNodeName' => 'translated_configuration', 'objectsNodeName' => 'translated_configurations', 'fields' => array ('value' => array ('i18n' => true ), 'date_add' => array ('i18n' => true ), 'date_upd' => array ('i18n' => true ) ) );
	
	public function __construct($id = NULL, $id_lang = NULL) {
		// Check if the id configuration is set in the configuration_lang table.
		// Otherwise configuration is not set as translated configuration.
		if ($id !== null) {
			$id_translated = Db::getInstance ()->ExecuteS ( 'SELECT `' . $this->identifier . '` FROM `' . pSQL ( _DB_PREFIX_ . $this->table ) . '_lang` WHERE `' . $this->identifier . '`=' . pSQL ( $id ) . ' LIMIT 0,1' );
			if (empty ( $id_translated ))
				$id = null;
		}
		parent::__construct ( $id, $id_lang );
	}
	
	public function add($autodate = true, $nullValues = false) {
		return $this->update ( $nullValues );
	}
	
	public function update($nullValues = false) {
		$ishtml = false;
		foreach ( $this->value as $i18n_value ) {
			if (Validate::isCleanHtml ( $i18n_value )) {
				$ishtml = true;
				break;
			}
		}
		Configuration::updateValue ( $this->name, $this->value, $ishtml );
		
		$last_insert = Db::getInstance ()->getRow ( '
			SELECT `id_configuration` AS id
			FROM `' . _DB_PREFIX_ . 'configuration`
			WHERE `name` = \'' . pSQL ( $this->name ) . '\'' );
		if ($last_insert)
			$this->id = $last_insert ['id'];
		
		return true;
	}
	
	public function getWebserviceObjectList($sql_join, $sql_filter, $sql_sort, $sql_limit) {
		$query = '
		SELECT DISTINCT main.`' . $this->identifier . '` FROM `' . _DB_PREFIX_ . $this->table . '` main
		' . $sql_join . '
		WHERE id_configuration IN 
		(	SELECT id_configuration
			FROM ' . _DB_PREFIX_ . $this->table . '_lang
		) ' . $sql_filter . '
		' . ($sql_sort != '' ? $sql_sort : '') . '
		' . ($sql_limit != '' ? $sql_limit : '') . '
		';
		return Db::getInstance ( _PS_USE_SQL_SLAVE_ )->ExecuteS ( $query );
	}
}