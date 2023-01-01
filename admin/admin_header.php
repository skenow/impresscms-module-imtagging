<?php
/**
 * Admin header file
 *
 * This file is included in all pages of the admin side and being so, it proceeds to a few
 * common things.
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * 
 */
include_once '../../../include/cp_header.php';

include_once ICMS_MODULES_PATH . '/' . basename(dirname(__DIR__)) . '/include/common.php';
if (!defined("IMTAGGING_ADMIN_URL")) define('IMTAGGING_ADMIN_URL', IMTAGGING_URL . "admin/");
include_once (IMTAGGING_ROOT_PATH . 'include/requirements.php');
/**
 * First use page of the module
 *
 * The module uses the IcmsPersistable Framework and because of this, no sql/mysql.sq file is
 * necessary to create the database tables of the module. Those tables will be dynamically created
 * when updating the module, based on the class that are defined for the module. Since the creation
 * of those tables are done when the module is updated, we need to force the wemaster to update the
 * module when he first enters the admin side of the module.
 */
if (is_object(icms::$module) && icms::$module->getVar("dirname") == IMTAGGING_DIRNAME) {
	// We are in the module
	if (defined('XOOPS_CPFUNC_LOADED')) {
		// We are in the admin side of the module
		if (!icms::$module->getDBVersion()) {
			redirect_header(ICMS_MODULES_URL . '/system/admin.php?fct=modulesadmin&op=update&module=' . IMTAGGING_DIRNAME, 4, _AM_IMTAGGING_FIRST_USE);
			exit();
		}
	}
}
