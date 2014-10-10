<?php
/**
 * @package     Deligence.Technologies
 * @subpackage  mod_dtworldclocks
 *
 * @copyright   Copyright (C) 2014 Deligence Technologies Pvt. Ltd. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
if(!defined('DS')){
    define('DS',DIRECTORY_SEPARATOR);
}
require_once( dirname(__FILE__).DS.'helper.php' );
 
$time1 = modDTWorldClocksHelper::getTime1( $params );
$time2 = modDTWorldClocksHelper::getTime2( $params );
$time3 = modDTWorldClocksHelper::getTime3( $params );
$time4 = modDTWorldClocksHelper::getTime4( $params );

$format = $params->get('format');
$seconds = $params->get('seconds');
$date = $params->get('date');
$leadingZeros = $params->get('leadingZeros');

if($params->get('layout')=="vertical"){ $layout='style="float: none;margin:5px"'; }
elseif($params->get('layout')=="horizontal"){ $layout='style="float: left;margin:5px"'; }


require( JModuleHelper::getLayoutPath( 'mod_dtworldclocks' ) );
?>
