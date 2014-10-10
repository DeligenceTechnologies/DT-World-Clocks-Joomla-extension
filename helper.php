<?php
/**
 * @package     Deligence.Technologies
 * @subpackage  mod_dtworldclocks
 *
 * @copyright   Copyright (C) 2014 Deligence Technologies Pvt. Ltd. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

class modDTWorldClocksHelper
{   
    public static function getTime1( $params )
    {
		$timezone1=$params->get('timezone1');
		date_default_timezone_set($timezone1); 
		$time1=date("F d, Y H:i:s");
        return $time1;
    }
    
    public static function getTime2( $params )
    {
		$timezone2=$params->get('timezone2');
		date_default_timezone_set($timezone2); 
		$time2=date("F d, Y H:i:s");
        return $time2;
    }
    
    public static function getTime3( $params )
    {
		$timezone3=$params->get('timezone3');
		date_default_timezone_set($timezone3); 
		$time3=date("F d, Y H:i:s");
        return $time3;
    }
    
    public static function getTime4( $params )
    {
		$timezone4=$params->get('timezone4');
		date_default_timezone_set($timezone4); 
		$time4=date("F d, Y H:i:s");
        return $time4;
    }
	
}
?>
