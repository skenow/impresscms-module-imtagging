<?php
/**
* Persian language constants related to module information
*
* @copyright	http://smartfactory.ca The SmartFactory
* @copyright	http://www.impresscms.ir Official ImpressCMS support site for Persians
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author	    Sina Asghari (aka stranger) <pesian_stranger@users.sourceforge.net>
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Module Info
// The name of this module

global $xoopsModule;
define("_MI_IMTAGGING_MD_NAME", "برچسب‌ها");
define("_MI_IMTAGGING_MD_DESC", "ماژولی برای مدیریت شاخه و برچسب‌ها در ایمپرس سی‌ام‌اس.");

define("_MI_IMTAGGING_TAGS", "برچسب‌ها");
define("_MI_IMTAGGING_CATEGORIES", "شاخه‌ها");

// Configs
define("_MI_IMTAGGING_TAGERGR", "گروه‌های مجاز به ارسال برچسب");
define("_MI_IMTAGGING_TAGERGRDSC", "Select the groups which are allowed to create new tags. Please note that a user belonging to one of these groups will be able to tag directly on the site. The module currently has no moderation feature.");
define("_MI_IMTAGGING_LIMIT", "محدودیت برچسب‌ها");
define("_MI_IMTAGGING_LIMITDSC", "تعداد برچسب‌ها برای نمایش در قسمت کاربری.");

// Blocks
define("_MI_IMTAGGING_TAGRECENT", "آخرین برچسب‌ها");
define("_MI_IMTAGGING_TAGRECENTDSC", "نمایش آخرین برچسب‌ها");
define("_MI_IMTAGGING_TAGBYMONTH", "نمایش برچسب‌ها بصورت ماهانه");
define("_MI_IMTAGGING_TAGBYMONTHDSC", "نمایش فهرست ماه‌هایی که در برچسبی ایجاد شده است");

// Notifications
define("_MI_IMTAGGING_GLOBAL_NOTIFY", "تمامی برچسب‌ها");
define("_MI_IMTAGGING_GLOBAL_NOTIFY_DSC", "آگاه سازی از تمامی برچسب‌ها در سایت.");
define("_MI_IMTAGGING_GLOBAL_TAG_PUBLISHED_NOTIFY", "برچسب جدیدی منتشر شد");
define("_MI_IMTAGGING_GLOBAL_TAG_PUBLISHED_NOTIFY_CAP", "Notify me when a new tag is published");
define("_MI_IMTAGGING_GLOBAL_TAG_PUBLISHED_NOTIFY_DSC", "Receive notification when any new tag is published.");
define("_MI_IMTAGGING_GLOBAL_TAG_PUBLISHED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notify : New tag published");
?>