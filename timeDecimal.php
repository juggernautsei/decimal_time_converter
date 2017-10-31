<?php
/**
 * decimal time converter.
 *
 * @author  Sherwin Gaddis <sherwingaddis@gmail.com>
 * @copyright Copyright (c) 2016-2017 Sherwin Gaddis <sherwingaddis@gmail.com>
 *
 */

/**
 * @param $time
 * @return float|int
 *  This function is to convert hh:mm to a decimal number so that the time can be added together
 */
function time_to_decimal($time) {
   $timeArr = explode(':', $time);

   $decTime = ($timeArr[0] * 60) + round($timeArr[1]/60, 2) ;

    return $decTime;
}

/**
 *  Here is a sample array of time. In your project you will have to build a similar array of time in
 *  some kind of loop.
 */
//$timeArray = array("540", "0.45","0.98","0.33","0.02");
$timeArray = array("540", "0.12","0.07","0.05","0.08");

/**
 *  here the array is summed into a larger decimal number that includes a float
 *  I left the echo statement for testing, of course remove for production
 */
$minutes = array_sum($timeArray);

/**
 *  Here the decimal number needs to be broken up to process each piece
 */
$minutes = explode(".", $minutes);
/**
 *  Next mulitiply the whole number to get the hours.
 */
$totalHoursConverted = floor($minutes[0] / 60) . ':';

/**
 *  This if statement was added to handle the correction of a leading zero to get the math right for the
 *  minutes.
 */
if ($minutes[1] <= "14"){
    $totalMinutesConverted =  round("0.0".$minutes[1] * 60, 2);
}else{
    $totalMinutesConverted =  round("0.".$minutes[1] * 60, 2);
}

/**
 *  Now need to remove the decimal
 */
$justTheMinutes = explode(".", $totalMinutesConverted);

/**
 * Now concantinate the hours and minutes
 */
    echo $totalHoursConverted . $justTheMinutes[1];




