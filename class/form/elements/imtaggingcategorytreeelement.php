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

class ImtaggingCategoryTreeElement extends XoopsFormSelect {
    function ImtaggingCategoryTreeElement($object, $key) {
        $itemHandler = isset($object->controls[$key]['itemHandler']) ? $object->controls[$key]['itemHandler'] : 'category';
        $module = isset($object->controls[$key]['module']) ? $object->controls[$key]['module'] : $object->handler->_moduleName;
		$category_handler = xoops_getmodulehandler('category', $object->handler->_moduleName);

		$category_title_field = $category_handler->identifierName;
    	$addNoParent = isset($object->controls[$key]['addNoParent']) ? $object->controls[$key]['addNoParent'] : true;
    	$criteria = new CriteriaCompo();
        $criteria->setSort("weight, " . $category_title_field);

        $categories = $category_handler->getObjects($criteria);

        include_once(ICMS_ROOT_PATH . "/modules/imtagging/class/icmspersistabletree.php");
        $mytree = new IcmsPersistableTree($categories, "category_id", "category_pid");
        $this->XoopsFormSelect( $object->vars[$key]['form_caption'], $key, $object->getVar($key, 'e') );

        $ret = array();
        $options = $this->getOptionArray($mytree, $category_title_field, 0, "", $ret);

        if ($addNoParent) {
        	$newOptions = array('0'=>'----');
        	foreach ($options as $k=>$v) {
        		$newOptions[$k] = $v;
        	}
        	$options = $newOptions;
        }
        $this->addOptionArray($options);
    }

    /**
     * Get options for a category select with hierarchy (recursive)
     *
     * @param XoopsObjectTree $tree
     * @param string $fieldName
     * @param int $key
     * @param string $prefix_curr
     * @param array $ret
     *
     * @return array
     */
    function getOptionArray($tree, $fieldName, $key, $prefix_curr = "", &$ret) {

        if ($key > 0) {
            $value = $tree->_tree[$key]['obj']->getVar($tree->_myId);
			$ret[$key] = $prefix_curr.$tree->_tree[$key]['obj']->getVar($fieldName);
            $prefix_curr .= "-";
        }
        if (isset($tree->_tree[$key]['child']) && !empty($tree->_tree[$key]['child'])) {
            foreach ($tree->_tree[$key]['child'] as $childkey) {
                $this->getOptionArray($tree, $fieldName, $childkey, $prefix_curr, $ret);
            }
        }
        return $ret;
    }
}
?>