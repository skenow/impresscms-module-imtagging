<?php
/**
* Admin page to manage categories
*
* List, add, edit and delete category objects
*
* @copyright	http://smartfactory.ca The SmartFactory
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
* @version		$Id$
*/

/**
 * Edit a Category
 *
 * @param int $categoryid Categoryid to be edited
*/
function editcategory($categoryid = 0)
{
	global $imtagging_category_handler, $xoopsModule, $icmsAdminTpl;

	$categoryObj = $imtagging_category_handler->get($categoryid);

	if (!$categoryObj->isNew()){

		$xoopsModule->displayAdminMenu(0, _AM_IMTAGGING_CATEGORIES . " > " . _CO_ICMS_EDITING);
		$sform = $categoryObj->getForm(_AM_IMTAGGING_CATEGORY_EDIT, 'addcategory');
		$sform->assign($icmsAdminTpl);

	} else {
		$xoopsModule->displayAdminMenu(0, _AM_IMTAGGING_CATEGORIES . " > " . _CO_ICMS_CREATINGNEW);
		$sform = $categoryObj->getForm(_AM_IMTAGGING_CATEGORY_CREATE, 'addcategory');
		$sform->assign($icmsAdminTpl);

	}
	$icmsAdminTpl->display('db:imtagging_admin_category.html');
}

include_once("admin_header.php");

$imtagging_category_handler = xoops_getModuleHandler('category');
/** Use a naming convention that indicates the source of the content of the variable */
$clean_op = '';
/** Create a whitelist of valid values, be sure to use appropriate types for each value
 * Be sure to include a value for no parameter, if you have a default condition
 */
$valid_op = array ('mod','changedField','addcategory','del','view','');

if (isset($_GET['op'])) $clean_op = htmlentities($_GET['op']);
if (isset($_POST['op'])) $clean_op = htmlentities($_POST['op']);

/** Again, use a naming convention that indicates the source of the content of the variable */
$clean_categoryid = isset($_GET['categoryid']) ? (int) $_GET['categoryid'] : 0 ;

/**
 * in_array() is a native PHP function that will determine if the value of the
 * first argument is found in the array listed in the second argument. Strings
 * are case sensitive and the 3rd argument determines whether type matching is
 * required
*/
if (in_array($clean_op,$valid_op,true)){
  switch ($clean_op) {
  	case "mod":
  	case "changedField":

  		xoops_cp_header();

  		editcategory($clean_categoryid);
  		break;
  	case "addcategory":
          include_once ICMS_ROOT_PATH."/kernel/icmspersistablecontroller.php";
          $controller = new IcmsPersistableController($imtagging_category_handler);
  		$controller->storeFromDefaultForm(_AM_IMTAGGING_CATEGORY_CREATED, _AM_IMTAGGING_CATEGORY_MODIFIED);

  		break;

  	case "del":
  	    include_once ICMS_ROOT_PATH."/kernel/icmspersistablecontroller.php";
          $controller = new IcmsPersistableController($imtagging_category_handler);
  		$controller->handleObjectDeletion();

  		break;

  	case "view" :
  		$categoryObj = $imtagging_category_handler->get($clean_categoryid);

  		smart_xoops_cp_header();
  		smart_adminMenu(1, _AM_IMTAGGING_CATEGORY_VIEW . ' > ' . $categoryObj->getVar('category_title'));

  		smart_collapsableBar('categoryview', $categoryObj->getVar('category_title') . $categoryObj->getEditItemLink(), _AM_IMTAGGING_CATEGORY_VIEW_DSC);

  		$categoryObj->displaySingleObject();

  		smart_close_collapsable('categoryview');

  		smart_collapsableBar('categoryview_categories', _AM_IMTAGGING_CATEGORIES, _AM_IMTAGGING_CATEGORIES_IN_CATEGORY_DSC);

  		$criteria = new CriteriaCompo();
  		$criteria->add(new Criteria('categoryid', $clean_categoryid));

  		$objectTable = new SmartObjectTable($imtagging_category_handler, $criteria);
  		$objectTable->addColumn(new SmartObjectColumn('category_date', 'left', 150));
  		$objectTable->addColumn(new SmartObjectColumn('category_message'));
  		$objectTable->addColumn(new SmartObjectColumn('category_uid', 'left', 150));

  		$objectTable->addIntroButton('addcategory', 'category.php?op=mod&categoryid=' . $clean_categoryid, _AM_IMTAGGING_CATEGORY_CREATE);

  		$objectTable->render();

  		smart_close_collapsable('categoryview_categories');

  		break;

  	default:

  		xoops_cp_header();

  		$xoopsModule->displayAdminMenu(0, _AM_IMTAGGING_CATEGORIES);

  		include_once ICMS_ROOT_PATH."/kernel/icmspersistabletreetable.php";
  		$objectTable = new IcmsPersistableTreeTable($imtagging_category_handler);
  		$objectTable->addColumn(new IcmsPersistableColumn('category_title', 'left', '200'));
  		$objectTable->addColumn(new IcmsPersistableColumn('category_description'));

  		$objectTable->addIntroButton('addcategory', 'category.php?op=mod', _AM_IMTAGGING_CATEGORY_CREATE);
  		$objectTable->addQuickSearch(array('category_title', 'category_description'));

  		$icmsAdminTpl->assign('imtagging_category_table', $objectTable->fetch());

  		$icmsAdminTpl->display('db:imtagging_admin_category.html');
  		break;
  }
  xoops_cp_footer();
}
/**
 * If you want to have a specific action taken because the user input was invalid,
 * place it at this point. Otherwise, a blank page will be displayed
 */
?>