<?php
/**
* @package      Gamification Platform
* @subpackage   Gamification Library
* @author       Todor Iliev
* @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
* @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Gamification Library is free software. This vpversion may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

defined('JPATH_PLATFORM') or die;

if(!defined("GAMIFICATION_COMPONENT_ADMINISTRATOR")) {
    define("GAMIFICATION_COMPONENT_ADMINISTRATOR", JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR. "components" . DIRECTORY_SEPARATOR ."com_gamification");
}

if(!defined("GAMIFICATION_LIBRARY")) {
    define("GAMIFICATION_LIBRARY", JPATH_LIBRARIES . DIRECTORY_SEPARATOR. "gamification");
}

jimport('joomla.utilities.arrayhelper');

// Gamification Libraries
JLoader::register("GamificationVersion", GAMIFICATION_LIBRARY . DIRECTORY_SEPARATOR . "version.php");

// Register helpers
JLoader::register("GamificationHelper", GAMIFICATION_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . "helpers" . DIRECTORY_SEPARATOR . "gamification.php");

