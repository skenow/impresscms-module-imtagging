<?php
/**
 * Creating a selectbox with available item
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * @version $Id$
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

class ImtaggingItemidElement extends icms_form_elements_Select {

	function __construct($object, $key) {
		$icms_persistable_registry = icms_ipf_registry_Handler::getInstance();
		$icms_module = $object->getCategory_linkModule();
		parent::__construct($object->vars[$key]['form_caption'], $key, $object->getVar($key, 'e'));
		$optionArray = $icms_persistable_registry->getList($object->getVar('category_link_item'), $icms_module->getVar("dirname"));
		$this->addOptionArray(array(
			0 => _CO_IMTAGGING_CATEGORY_LINK_IID_SELECT) + $optionArray);
	}
}
