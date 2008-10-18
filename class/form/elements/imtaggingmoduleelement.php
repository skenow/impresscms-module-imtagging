<?php
/**
* Creating a parent category select box
*
* @copyright	http://smartfactory.ca The SmartFactory
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

class ImtaggingModuleElement extends XoopsFormSelect {
    function ImtaggingModuleElement($object, $key) {
		$module_handler = xoops_getHandler('module');
		$this->XoopsFormSelect( $object->vars[$key]['form_caption'], $key, $object->getVar($key, 'e') );

        $criteria = new CriteriaCompo();
        $criteria->add(new Criteria('isactive', true));
        $criteria->setSort('name');
        $modules_array = $module_handler->getList($criteria);
        $this->addOptionArray(array(0=>_CO_IMTAGGING_CATEGORY_LINK_MID_SELECT) + $modules_array);
    }


}
?>