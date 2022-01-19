<?php
include_once("constants.php");

$counterValue = 0;
if (file_exists($COUNTER_FILENAME)) {
	$file = fopen($COUNTER_FILENAME,"r");
	$counterValue = fread($file, filesize($COUNTER_FILENAME));
	fclose($file);
}

/* Uncomment the commented lines if you want unique visit from every user */

//session_start();
//if (!isset($_SESSION['hasVisited'])) {
//  $_SESSION['hasVisited'] = true;
  $counterValue++;
  $file = fopen($COUNTER_FILENAME, "w");
  fwrite($file, $counterValue);
  fclose($file); 
//}
?>
