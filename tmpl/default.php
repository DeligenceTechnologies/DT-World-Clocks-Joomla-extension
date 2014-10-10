<?php

/**
 * @package     Deligence.Technologies
 * @subpackage  mod_dtworldclocks
 *
 * @copyright   Copyright (C) 2014 Deligence Technologies Pvt. Ltd. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

	defined('_JEXEC') or die('Direct Access to this location is not allowed.');
?>
<div style="overflow:hidden">
<?php
	$moduleTitle	= 1;
	while($moduleTitle<=4){
		if($moduleTitle==1){
			$city_new=$params->get('city1');
		}else if($moduleTitle==2){
			$city_new=$params->get('city2');
		}else if($moduleTitle==3){
			$city_new=$params->get('city3');
		}else if($moduleTitle==4){
			$city_new=$params->get('city4');
		}
		if($params->get('display'.$moduleTitle)=="yes"){
			echo '<div '. $layout .'>';
			if($params->get('layout')=="vertical"){
				
				if($params->get('show-timezone')=="yes"){
					if($params->get('cityAlignment')=="left"){
						echo '<span class="dtWorldClocks_timezone"> '. $city_new .' , </span>';
					}else if($params->get('cityAlignment')=="top"){
						echo '<div><span class="dtWorldClocks_timezone"> '. $city_new .'</span></div>';
					}
				}
				
				echo '<span id="dtWorldClocksTime_'. $moduleTitle .'" class="dtWorldClocks_time"></span>';
				
				if($params->get('show-timezone')=="yes"){
					if($params->get('cityAlignment')=="right"){
						echo '<span class="dtWorldClocks_timezone"> , '. $city_new .' </span>';
					}else if($params->get('cityAlignment')=="bottom"){
						echo '<div><span class="dtWorldClocks_timezone"> '. $city_new .'</span></div>';
					}
				}
				if($params->get('date')!="no"){
					echo '<div ><span id="dtWorldClocksDate_'. $moduleTitle .'" class="dtWorldClocks_date"></span></div>';
				}
				
			} elseif($params->get('layout')=="horizontal"){
				if($params->get('show-timezone')=="yes"){
					if($params->get('cityAlignment')=="left"){
						echo '<span class="dtWorldClocks_timezone"> '. $city_new .' , </span>';
					}else if($params->get('cityAlignment')=="top"){
						echo '<div><span class="dtWorldClocks_timezone"> '. $city_new .'</span></div>';
					}
				}
				
				echo '<span  id="dtWorldClocksTime_'. $moduleTitle .'" class="dtWorldClocks_time"></span>';
							
				if($params->get('show-timezone')=="yes"){
					if($params->get('cityAlignment')=="right"){
						echo '<span class="dtWorldClocks_timezone"> , '. $city_new .' </span>';
					}else if($params->get('cityAlignment')=="bottom"){
						echo '<div><span class="dtWorldClocks_timezone"> '. $city_new .'</span></div>';
					}
				}
				
				if($params->get('date')!="no"){
					echo '<div><span  id="dtWorldClocksDate_'. $moduleTitle .'" class="dtWorldClocks_date"></span></div>';
				}
				
			}
		

?>
<script type="text/javascript" >	
	var time_new;
			if(<?php echo $moduleTitle; ?>==1){
				time_new="<?php echo $time1; ?>";
			}else if(<?php echo $moduleTitle; ?>==2){
				time_new="<?php echo $time2; ?>";
			}else if(<?php echo $moduleTitle; ?>==3){
				time_new="<?php echo $time3; ?>";
			}else if(<?php echo $moduleTitle; ?>==4){
				time_new="<?php echo $time4; ?>";
			}
	var currentTime_<?php echo $moduleTitle; ?> = new Date(time_new);	
	var format_<?php echo $moduleTitle; ?> = "<?php echo $format; ?>";
	var seconds_<?php echo $moduleTitle; ?> = "<?php echo $seconds; ?>";
	var date_<?php echo $moduleTitle; ?> = "<?php echo $date; ?>";
	var leadingZeros_<?php echo $moduleTitle; ?> = "<?php echo $leadingZeros; ?>";
	
	var jstime_<?php echo $moduleTitle; ?> = new Date().getTime()-1000;
		
	function dtWorldClocksUpdate_<?php echo $moduleTitle; ?>(){
		jstime_<?php echo $moduleTitle; ?>=jstime_<?php echo $moduleTitle; ?>+1000;
		var jsnow_<?php echo $moduleTitle; ?> = new Date().getTime();
		var offset_<?php echo $moduleTitle; ?>=jsnow_<?php echo $moduleTitle; ?>-jstime_<?php echo $moduleTitle; ?>;
		if(offset_<?php echo $moduleTitle; ?>>1000){
			jstime_<?php echo $moduleTitle; ?>=jstime_<?php echo $moduleTitle; ?>+offset_<?php echo $moduleTitle; ?>;
			var offsetseconds_<?php echo $moduleTitle; ?>=Math.round(offset_<?php echo $moduleTitle; ?>/1000);
			currentTime_<?php echo $moduleTitle; ?>.setSeconds(currentTime_<?php echo $moduleTitle; ?>.getSeconds()+offsetseconds_<?php echo $moduleTitle; ?>);
		}

		currentTime_<?php echo $moduleTitle; ?>.setSeconds(currentTime_<?php echo $moduleTitle; ?>.getSeconds()+1);
		var currentHours_<?php echo $moduleTitle; ?> = currentTime_<?php echo $moduleTitle; ?>.getHours();			
		var currentMinutes_<?php echo $moduleTitle; ?> = currentTime_<?php echo $moduleTitle; ?>.getMinutes();
		var currentSeconds_<?php echo $moduleTitle; ?> = currentTime_<?php echo $moduleTitle; ?>.getSeconds();

		// Handles 12h format
		if(format_<?php echo $moduleTitle; ?>=="12h"){		
			//save a AM/PM variable
			if(currentHours_<?php echo $moduleTitle; ?><12){
				var ampm_<?php echo $moduleTitle; ?> = "AM";
			} else{
				var ampm_<?php echo $moduleTitle; ?> = "PM";
			}
			if(currentHours_<?php echo $moduleTitle; ?>>12){
				currentHours_<?php echo $moduleTitle; ?>=currentHours_<?php echo $moduleTitle; ?>-12;
			}
			
			 //convert 0 to 12
			if(currentHours_<?php echo $moduleTitle; ?>==0){
				currentHours_<?php echo $moduleTitle; ?>=12;
			}
		}

		// Pad the hours, minutes and seconds with leading zeros, if required
		if(leadingZeros_<?php echo $moduleTitle; ?>=="yes"){
			currentHours_<?php echo $moduleTitle; ?> = ( currentHours_<?php echo $moduleTitle; ?> < 10 ? "0" : "" ) + currentHours_<?php echo $moduleTitle; ?>;
		}
		if(leadingZeros_<?php echo $moduleTitle; ?>=="yes"||leadingZeros_<?php echo $moduleTitle; ?>=="nothour"){
			currentMinutes_<?php echo $moduleTitle; ?> = ( currentMinutes_<?php echo $moduleTitle; ?> < 10 ? "0" : "" ) + currentMinutes_<?php echo $moduleTitle; ?>;
			currentSeconds_<?php echo $moduleTitle; ?> = ( currentSeconds_<?php echo $moduleTitle; ?> < 10 ? "0" : "" ) + currentSeconds_<?php echo $moduleTitle; ?>;
		}
		
		// Compose the string for display
		var currentTimeString_<?php echo $moduleTitle; ?> = currentHours_<?php echo $moduleTitle; ?> + ":" + currentMinutes_<?php echo $moduleTitle; ?>;
		// Add seconds if that has been selected
		if(seconds_<?php echo $moduleTitle; ?>=="yes"){
			currentTimeString_<?php echo $moduleTitle; ?> = currentTimeString_<?php echo $moduleTitle; ?> + ":" + currentSeconds_<?php echo $moduleTitle; ?>;
		}
		// Add AM/PM if 12h format
		if(format_<?php echo $moduleTitle; ?>=="12h"){
			currentTimeString_<?php echo $moduleTitle; ?> = currentTimeString_<?php echo $moduleTitle; ?> + " " + ampm_<?php echo $moduleTitle; ?>;
		}
		
		// Handle date formating
		if(date_<?php echo $moduleTitle; ?>!="no"){
			var date = currentTime_<?php echo $moduleTitle; ?>.getDate();
			var month = currentTime_<?php echo $moduleTitle; ?>.getMonth()+1;
			var year = currentTime_<?php echo $moduleTitle; ?>.getFullYear();
			var day = currentTime_<?php echo $moduleTitle; ?>.getDay();
			var textMonth = "null";
			
			if(day==1){ day="Mon";}
			if(day==2){ day="Tue";}
			if(day==3){ day="Wed";}
			if(day==4){ day="Thu";}
			if(day==5){ day="Fri";}
			if(day==6){ day="Sat";}
			if(day==0){ day="Sun";}
			
			if(month=="1"){ textMonth="Jan";}
			if(month=="2"){ textMonth="Feb";}
			if(month=="3"){ textMonth="Mar";}
			if(month=="4"){ textMonth="Apr";}
			if(month=="5"){ textMonth="May";}
			if(month=="6"){ textMonth="Jun";}
			if(month=="7"){ textMonth="Jul";}
			if(month=="8"){ textMonth="Aug";}
			if(month=="9"){ textMonth="Sep";}
			if(month=="10"){ textMonth="Oct";}
			if(month=="11"){ textMonth="Nov";}
			if(month=="12"){ textMonth="Dec";}
			
			if(leadingZeros_<?php echo $moduleTitle; ?>=="yes"){
				if(month<10) month="0" + month;
				if(date<10) date="0" + date;
			}
			
			//Compose date string
			switch (date_<?php echo $moduleTitle; ?>){
				case "format1":
					currentDate_<?php echo $moduleTitle; ?>=year + "-" + month + "-" + date;
					break;
				case "format2":
					currentDate_<?php echo $moduleTitle; ?>=year + "/" + month + "/" + date;
					break;
				case "format3":
					currentDate_<?php echo $moduleTitle; ?>=date + "/" + month + "/" + year;
					break;
				case "format4":
					currentDate_<?php echo $moduleTitle; ?>=month + "/" + date + "/" + year;
					break;
				case "format5":
					currentDate_<?php echo $moduleTitle; ?>=date + " " + textMonth;
					break;
				case "format6":
					currentDate_<?php echo $moduleTitle; ?>=day + " " + date + " " +textMonth;
					break;
				case "format7":
					currentDate_<?php echo $moduleTitle; ?>=textMonth + " " + date;
					break;
				case "format8":
					currentDate_<?php echo $moduleTitle; ?>=textMonth + " " + date + ", " + year;
					break;
				case "format9":
					currentDate_<?php echo $moduleTitle; ?>=day + " " + textMonth + " " + date;
					break;
			}
		}
		// Update the time display
		document.getElementById("dtWorldClocksTime_<?php echo $moduleTitle; ?>").innerHTML = '<b>'+currentTimeString_<?php echo $moduleTitle; ?>+'</b>';
		if(date_<?php echo $moduleTitle; ?>!="no"){
			document.getElementById("dtWorldClocksDate_<?php echo $moduleTitle; ?>").innerHTML = currentDate_<?php echo $moduleTitle; ?>;
		}
	}
	
	dtWorldClocksUpdate_<?php echo $moduleTitle; ?>();
	setInterval('dtWorldClocksUpdate_<?php echo $moduleTitle; ?>()', 1000);
</script>

<?php
echo '</div>';
}
$moduleTitle++;

}
?>
</div>
