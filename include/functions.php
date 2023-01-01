<?php
/**
 * Common functions used by the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * @version $Id$
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

/**
 * Get module admion link
 *
 * @todo to be move in icms core
 *      
 * @param string $moduleName dirname of the moodule
 * @return string URL of the admin side of the module
 */
function imtagging_getModuleAdminLink($moduleName = 'imtagging') {
	return icms_getModuleAdminLink($moduleName);
}

/**
 * Get URL of previous page
 *
 * @todo to be moved in ImpressCMS 1.2 core
 *      
 * @param string $default default page if previous page is not found
 * @return string previous page URL
 */
function imtagging_getPreviousPage($default = false) {
	return icms_getPreviousPage($default);
}

/**
 * Get month name by its ID
 *
 * @todo to be moved in ImpressCMS 1.2 core
 *      
 * @param int $month_id ID of the month
 * @return string month name
 */
function imtagging_getMonthNameById($month_id) {
	return Icms_getMonthNameById($month_id);
}
