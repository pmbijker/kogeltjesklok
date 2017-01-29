<?php
/**
 * Processing of shifting
 *
 * Peter Bijker
 * Grafisch Lyceum Utrecht, the Netherlands
 * January 2017
 *
 */

include 'classes/ShiftRegister.php';
session_start();

// retrieve the object from session variables
$minutes = $_SESSION['minutes_object'];
$fiveminutes = $_SESSION['fiveminutes_object'];
$quarters = $_SESSION['quarters_object'];
$hours = $_SESSION['hours_object'];

// Shift the minutes
$last_minute = $minutes->shiftRegister();
// After last minute, start shift of fiveminutes
if($last_minute == 1){
    $last_fiveminute = $fiveminutes->shiftRegister();
}
// After last fiveminute, start shift of quarters
if($last_fiveminute == 1){
    $last_quarter = $quarters->shiftRegister();
}
// After last quarter, start shift of hours
if($last_quarter == 1){
    $last_hour = $hours->shiftRegister();
}
// Determine the digital time


// Return the object using session variables
$_SESSION['minutes_object'] = $minutes;
$_SESSION['fiveminutes_object'] = $fiveminutes;
$_SESSION['quarters_object'] = $quarters;
$_SESSION['hours_object'] = $hours;

header('location: index.php');
?>