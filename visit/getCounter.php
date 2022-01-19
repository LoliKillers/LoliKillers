<?php
include_once("constants.php");

$counterValue = 0;
if (file_exists($COUNTER_FILENAME)) {
	$file = fopen($COUNTER_FILENAME,"r");
	$counterValue = fread($file, filesize($COUNTER_FILENAME));
	fclose($file);
}
echo $counterValue;

