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
        if ($format == 's' && in_array($key, array())) {
            return call_user_func(array($this,$key));
        }
        return parent::getVar($key, $format);
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