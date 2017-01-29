<?php
session_start();
/**
 * Rolling Balls Clock by Harley Mayenschein in 1978
 * manufactured by Idle Tyme Corporation
 *  simulated with PHP and HTML
 *
 * Peter Bijker
 * Grafisch Lyceum Utrecht, the Netherlands
 * 25-01-2017
 *
 */

// Call autoload function
function __autoload($classname) {
    $filename = 'classes/'. $classname .'.php';
    include_once($filename);
}

// Create new or use existing register
if(!isset($_SESSION['minutes_object'])){
    $minutes = new ShiftRegister(4);
    $fiveminutes = new ShiftRegister(2);
    $quarters = new ShiftRegister(3);
    $hours = new ShiftRegister(12, true);
    $_SESSION['minutes_object'] = $minutes;
    $_SESSION['fiveminutes_object'] = $fiveminutes;
    $_SESSION['quarters_object'] = $quarters;
    $_SESSION['hours_object'] = $hours;
}else{
    $minutes = $_SESSION['minutes_object'];
    $fiveminutes = $_SESSION['fiveminutes_object'];
    $quarters = $_SESSION['quarters_object'];
    $hours = $_SESSION['hours_object'];
}
?>
<!doctype html>
<html>
    <title>Kogeltjesklok simulatie</title>
    <style>
    * {font-family: Courier}
    .full {font-weight: bold; width: 25px; text-align: center;}
    .lastrow {text-align: center;}
    .left {float: left}
    .picture {margin: 0 0 0 30px}
    </style>
<head>
</head>
<body>
<a href="destroy_session.php">Empty session</a>
<br/><br/>
<h1>ROLLING BALL CLOCK (KOGELTJESKLOK) with SHIFT REGISTER</h1>
<div class="left">
<?php
$minutes_array = $minutes->readRegister();
echo '<table><tr><td>Minutes</td>';
foreach($minutes_array as $content){
    echo '<td class="full">'.$content.'</td>';
}
echo '</tr><tr><td>Five minutes &nbsp;&nbsp;</td>';
$fiveminutes_array = $fiveminutes->readRegister();
foreach($fiveminutes_array as $content){
    echo '<td class="full">'.$content.'</td>';
}
echo '</tr><tr><td>Quarters</td>';
$quarters_array = $quarters->readRegister();
foreach($quarters_array as $content){
    echo '<td class="full">'.$content.'</td>';
}
echo '</tr><tr><td>Hours</td>';
$hours_array = $hours->readRegister();
foreach($hours_array as $content){
    echo '<td class="full">'.$content.'</td>';
}
echo '</tr><tr class="lastrow"><td></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td>';
echo '<td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr></table><br/>';

// Refresh now 1 second,
// should be every 60 seconds ;-)
// header('Refresh: 1; URL=shift.php'); // Uncomment for automatic call to shift.php
?>
<form method="post" action="shift.php">
    <input type="submit" value="Minute shift" name="submit">
</form>
</div>
<div>
<img src="clock.jpg" class="picture">
</div>
</body>
</html>