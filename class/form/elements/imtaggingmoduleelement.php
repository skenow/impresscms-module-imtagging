<?php
/**
 * Creating a parent category select box
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

class ImtaggingModuleElement extends icms_form_elements_Select {

	function __construct($object, $key) {
		$module_handler = icms::handler('icms_module');
		parent::__construct($object->vars[$key]['form_caption'], $key, $object->getVar($key, 'e'));

		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('isactive', true));
		$criteria->setSort('name');
		$modulesObj = $module_handler->getObjects($criteria);
		foreach ($modulesObj as $moduleObj) {
			$moduleObj->loadInfo($moduleObj->getVar('dirname'));
			if (isset($moduleObj->modinfo['object_items'])) {
			    $modules_array[$moduleObj->getVar('mid')] = $moduleObj->getVar('name');
			}
		}
		$this->addOptionArray(array(
			0 => _CO_IMTAGGING_CATEGORY_LINK_MID_SELECT) + $modules_array);
	}
}
