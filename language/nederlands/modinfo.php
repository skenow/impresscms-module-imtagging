<?php
/**
* Dutch language constants related to module information
*
* @copyright		http://smartfactory.ca The SmartFactory
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since			1.0
* @author		marcan aka Marc-André Lanciault <marcan@smartfactory.ca> (english)
* @author		McDonald (translation into dutch)
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Module Info
// The name of this module

global $xoopsModule;
define("_MI_IMTAGGING_MD_NAME", "imTagging");
define("_MI_IMTAGGING_MD_DESC", "ImpressCMS categoriseer en tag module");

define("_MI_IMTAGGING_TAGS", "Tags");
define("_MI_IMTAGGING_CATEGORIES", "Categorieën");

// Configs
define("_MI_IMTAGGING_TAGERGR", "Groepen met toegang tot tags");
define("_MI_IMTAGGING_TAGERGRDSC", "Selekteer de groepen die nieuwe tags mogen aanmaken. Please note that a user belonging to one of these groups will be able to tag directly on the site. The module currently has no moderation feature.");
define("_MI_IMTAGGING_LIMIT", "Tags limit");
define("_MI_IMTAGGING_LIMITDSC", "Number of tags to display on user side.");

// Blocks
define("_MI_IMTAGGING_TAGRECENT", "Recente tags");
define("_MI_IMTAGGING_TAGRECENTDSC", "Weergeven meest recente tags");
define("_MI_IMTAGGING_TAGBYMONTH", "Tags per maand");
define("_MI_IMTAGGING_TAGBYMONTHDSC", "Weergeven lijst met maanden met daarin tags");

// Notifications
define("_MI_IMTAGGING_GLOBAL_NOTIFY", "Alle tags");
define("_MI_IMTAGGING_GLOBAL_NOTIFY_DSC", "Berichtgeing met betrekking tot alle tags in de module");
define("_MI_IMTAGGING_GLOBAL_TAG_PUBLISHED_NOTIFY", "Nieuwe tag gepubliceerd");
define("_MI_IMTAGGING_GLOBAL_TAG_PUBLISHED_NOTIFY_CAP", "Stuur me bericht als een nieuwe tag is gepubliceerd");
define("_MI_IMTAGGING_GLOBAL_TAG_PUBLISHED_NOTIFY_DSC", "Ontvang bericht wanneer een nieuwe tag is gepubliceerd.");
define("_MI_IMTAGGING_GLOBAL_TAG_PUBLISHED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-berichtgeving: Nieuwe tag gepubliceerd");
?>