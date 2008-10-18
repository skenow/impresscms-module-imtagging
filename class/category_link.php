<?php
/**
* Classes responsible for managing imTagging category_link link objects
*
* @copyright	http://smartfactory.ca The SmartFactory
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// including the IcmsPersistabelSeoObject
include_once ICMS_ROOT_PATH."/kernel/icmspersistableseoobject.php";

class ImtaggingCategory_link extends IcmsPersistableObject {

    /**
     * Constructor
     *
     * @param object $handler ImtaggingCategory_linkHandler object
     */
    public function __construct(&$handler){
    	global $xoopsConfig;

    	$this->IcmsPersistableObject($handler);

        $this->quickInitVar('category_link_id', XOBJ_DTYPE_INT, true);
        $this->quickInitVar('category_link_cid', XOBJ_DTYPE_INT, false);
        $this->quickInitVar('category_link_mid', XOBJ_DTYPE_INT, false);
        $this->quickInitVar('category_link_item', XOBJ_DTYPE_TXTBOX);
        $this->quickInitVar('category_link_iid', XOBJ_DTYPE_INT);

		$this->setControl('category_link_cid', array (
			'name' => 'categorytree',
			'itemHandler' => 'category',
			'module' => 'imtagging'
		));

		$this->setControl('category_link_mid', array(
				'name'=>'module',
				'onSelect' => 'submit'
			));
		$this->setControl('category_link_item', array(
				'name'=>'item',
				'onSelect' => 'submit'
			));
		$this->setControl('category_link_iid', 'itemid');
    }

    /**
     * Overriding the IcmsPersistableObject::getVar method to assign a custom method on some
     * specific fields to handle the value before returning it
     *
     * @param str $key key of the field
     * @param str $format format that is requested
     * @return mixed value of the field that is requested
     */
    function getVar($key, $format = 's') {
        if ($format == 's' && in_array($key, array('category_link_cid', 'category_link_mid', 'category_link_iid'))) {
            return call_user_func(array($this,$key));
        }
        return parent::getVar($key, $format);
    }

    function category_link_cid() {
		$icms_persistable_registry = IcmsPersistableRegistry::getInstance();
    	$ret = $this->getVar('category_link_cid', 'e');
		$obj = $icms_persistable_registry->getSingleObject('category', $ret, 'imtagging');

    	if ($obj && !$obj->isNew()) {
    		if (defined('XOOPS_CPFUNC_LOADED')) {
    			$ret = $obj->getAdminViewItemLink();
    		} else {
    			$ret = $obj->getItemLink();
    		}
    	} else {
    		return '';
    	}
    }

	function getCategory_linkModule() {
    	$module_handler = xoops_getHandler('module');
    	return $module_handler->get($this->getVar('category_link_mid', 'e'));
	}

    function category_link_mid() {
    	$mid = $this->getVar('category_link_mid', 'e');
    	$moduleObj = $this->getCategory_linkModule();
    	if ($moduleObj) {
    		return '<a href="' . ICMS_URL . '/modules/' . $moduleObj->getVar('dirname') . '/">' . $moduleObj->getVar('name') . '</a>';
    	} else {
    		return '';
    	}
    }

    function category_link_iid() {
		$iid = $this->getVar('category_link_iid', 'e');
		$moduleObj = $this->getCategory_linkModule();
		$category_link_module_handler = xoops_getModulehandler($this->getVar('category_link_item'), $moduleObj->getVar('dirname'));
		$category_link_object = $category_link_module_handler->get($iid);
		if ($category_link_object && !$category_link_object->isNew()) {
			return $category_link_object->getItemLink();
		} else {
			return '';
		}

    }
}

class ImtaggingCategory_linkHandler extends IcmsPersistableObjectHandler {

	/**
	 * Constructor
	 */
    public function __construct(&$db){
        $this->IcmsPersistableObjectHandler($db, 'category_link', 'category_link_id', 'category_link_iid', '', 'imtagging');
    }
}
?>