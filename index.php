<?php
require_once('visit/counter.php');
require_once('include/header.php');
require_once('include/classes/Account.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head.php'); ?>
<?php
require 'vendor/autoload.php';
use abhimanyu\systemInfo\SystemInfo;
use danielme85\Server\Info;

$info = new Info();
$system = SystemInfo::getInfo();
$memoryUsage = Info::get()->memoryUsage();
$memoryInfo = Info::get()->memoryInfo();
?>
</head>
<body>
<div class="row" id="proBanner">
<div class="col-12">
<span class="d-flex align-items-center purchase-popup">
<p>This website is still under construction, want to donate?</p>
<a href="https://wa.me/6285785445412" target="_blank" class="btn download-button purchase-button ml-auto">Donate</a>
<i class="typcn typcn-delete-outline" id="bannerClose"></i>
</span>
</div>
</div>
<div class="container-scroller">
<?php include('includes/navbar.php'); ?>
<div class="container-fluid page-body-wrapper">
<div class="theme-setting-wrapper">
<div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
<div id="theme-settings" class="settings-panel">
<i class="settings-close typcn typcn-delete-outline"></i>
<p class="settings-heading">SIDEBAR SKINS</p>
<div class="sidebar-bg-options" id="sidebar-light-theme">
<div class="img-ss rounded-circle bg-light border mr-3"></div>
Light
</div>
<div class="sidebar-bg-options selected" id="sidebar-dark-theme">
<div class="img-ss rounded-circle bg-dark border mr-3"></div>
Dark
</div>
<p class="settings-heading mt-2">HEADER SKINS</p>
<div class="color-tiles mx-0 px-4">
<div class="tiles success"></div>
<div class="tiles warning"></div>
<div class="tiles danger"></div>
<div class="tiles primary"></div>
<div class="tiles info"></div>
<div class="tiles dark"></div>
<div class="tiles default border"></div>
</div>
</div>
</div>
<?php include('includes/sidebar.php'); ?>
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
<div class="col-sm-6">
<h3 class="mb-0 font-weight-bold">Rublix Multi</h3>
<p>Rublix multi function website.</p>
</div>
<div class="col-sm-6">
<div class="d-flex align-items-center justify-content-md-end">
<div class="mb-3 mb-xl-0 pr-1">
<button class="btn bg-white btn-sm btn-icon-text border mr-2" type="button">
<i class="typcn typcn-home-outline mr-2"></i>Dashboard
</button>
</div>
</div>
</div>
</div>
<div class="row  mt-3">
<div class="col-xl-4 d-flex grid-margin stretch-card">
<div class="card">
<div class="card-body">
<div class="d-flex flex-wrap justify-content-between">
<h4 class="card-title mb-3">Website stats</h4>
</div>
<div class="row">
<div class="col-12">
<div class="row">
<div class="col-sm-12">
<div class="d-flex justify-content-between mb-4">
<div>Visitor</div>
<div class="text-muted"><?php echo $counterValue; ?></div>
</div>
<div class="d-flex justify-content-between mb-4">
<div>Users</div>
<div class="text-muted">-</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xl-6 d-flex grid-margin stretch-card">
<div class="card">
<div class="card-body">
<div class="d-flex flex-wrap justify-content-between">
<h4 class="card-title mb-3">Server stats</h4>
<button type="button" class="btn btn-sm btn-light">Rublix</button>
</div>
<div class="row">
<div class="col-12">
<div class="d-md-flex mb-4">
<div class="mr-md-5 mb-4">
<h5 class="mb-1"><i class="typcn typcn-warning-outline mr-1"></i>PHP Version</h5>
<li class="text-primary mb-1 font-weight-bold"><?php echo phpversion(); ?></li>
</div>
<div class="mr-md-5 mb-4">
<h5 class="mb-1"><i class="typcn typcn-upload-outline mr-1"></i>Server Api Name</h5>
<li class="text-secondary mb-1 font-weight-bold"><?php echo php_sapi_name(); ?></li>
</div>
<div class="mr-md-5 mb-4">
<h5 class="mb-1"><i class="typcn typcn-device-laptop mr-1"></i>Operation System</h5>
<li class="text-success mb-1 font-weight-bold"><?php echo $system::getOS(); ?></li>
</div>
<div class="mr-md-5 mb-4">
<h5 class="mb-1"><i class="typcn typcn-info-large-outline mr-1"></i>Zend Engine Version</h5>
<li class="text-info mb-1 font-weight-bold"><?php echo zend_version(); ?></li>
</div>
<div class="mr-md-5 mb-4">
<h5 class="mb-1"><i class="typcn typcn-flow-merge mr-1"></i>Directory Tmp</h5>
<li class="text-warning mb-1 font-weight-bold"><?php echo sys_get_temp_dir(); ?></li>
</div>
<div class="mr-md-5 mb-4">
<h5 class="mb-1"><i class="typcn typcn-time mr-1"></i>Uptime</h5>
<li class="text-danger mb-1 font-weight-bold"><?php echo $system::getUpTime(); ?></li>
</div>
</div>
<canvas id="salesanalyticChart"></canvas>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 d-flex grid-margin stretch-card">
<div class="card">
<div class="card-body">
<div class="d-flex flex-wrap justify-content-between">
<h4 class="card-title mb-3">CPU stats</h4>
</div>
<div class="row">
<div class="col-lg-9">
<div class="d-sm-flex justify-content-between">
<div class="dropdown">
<button class="btn bg-white btn-sm btn-icon-text pl-0" type="button" id="date_time" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
</button>
</div>
</div>
<div class="chart-container mt-4">
<canvas id="ecommerceAnalytic"></canvas>
</div>
</div>
<div class="col-lg-3">
<div>
<br>
<hr>
<div class="d-flex justify-content-between mb-3">
<div class="font-weight-bold text-success">Model</div>
<div class="text-muted"><?php echo $system::getCpuModel(); ?></div>
</div>
<hr>
<div class="d-flex justify-content-between mb-3">
<div class="font-weight-bold text-success">Architecture</div>
<div class="text-muted"><?php echo $system::getCpuArchitecture(); ?></div>
</div>
<hr>
<div class="d-flex justify-content-between mb-3">
<div class="text-success font-weight-bold">Processor <?php print_r($info->cpuInfo()[1]["processor"]); ?></div>
</div>
<div class="d-flex justify-content-between mb-3">
<div class="font-weight-medium">Bogomips</div>
<div class="text-muted"><?php print_r($info->cpuInfo()[1]["bogomips"]); ?></div>
</div>
</div>
<hr>
<div class="mt-4">
<div class="d-flex justify-content-between mb-3">
<div class="text-success font-weight-bold">Processor <?php print_r($info->cpuInfo()[2]["processor"]); ?></div>
</div>
<div class="d-flex justify-content-between mb-3">
<div class="font-weight-medium">Bogomips</div>
<div class="text-muted"><?php print_r($info->cpuInfo()[2]["bogomips"]); ?></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 d-flex grid-margin stretch-card">
<div class="card">
<div class="card-body">
<div class="d-flex flex-wrap justify-content-between">
<h4 class="card-title mb-3">Memory Stats</h4>
</div>
<div class="mt-2">
<div class="d-flex justify-content-between">
<small>Total</small>
<small><?php
$total = print_r($memoryUsage["total"]);
?></small>
</div>
<div class="progress progress-md  mt-2">
<div class="progress-bar bg-primary" role="progressbar" style="width: <?php print_r($memoryInfo["MemTotal"]); ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<div class="mt-4">
<div class="d-flex justify-content-between">
<small>Free</small>
<small><?php
$usage = print_r($memoryUsage["free"]);
$free = $memoryInfo["MemFree"]/$memoryInfo["MemTotal"]*100;
?></small>
</div>
<div class="progress progress-md  mt-2">
<div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo $free; ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<div class="mt-4">
<div class="d-flex justify-content-between">
<small>Available</small>
<small><?php
print_r($memoryUsage["available"]); 
$available = $memoryInfo["MemAvailable"]/$memoryInfo["MemTotal"]*100;
?></small>
</div>
<div class="progress progress-md mt-2">
<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $available; ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<div class="mt-4">
<div class="d-flex justify-content-between">
<small>Used</small>
<small><?php
print_r($memoryUsage["used"]);
function toByteSize($p_sFormatted) {
    $aUnits = array('B'=>0, 'KB'=>1, 'MB'=>2, 'GB'=>3, 'TB'=>4, 'PB'=>5, 'EB'=>6, 'ZB'=>7, 'YB'=>8);
    $sUnit = strtoupper(trim(substr($p_sFormatted, -2)));
    if (intval($sUnit) !== 0) {
        $sUnit = 'B';
    }
    if (!in_array($sUnit, array_keys($aUnits))) {
        return false;
    }
    $iUnits = trim(substr($p_sFormatted, 0, strlen($p_sFormatted) - 2));
    if (!intval($iUnits) == $iUnits) {
        return false;
    }
    return $iUnits * pow(1024, $aUnits[$sUnit]);
}
$gebe = toByteSize($memoryUsage["used"]);
$used = $gebe/$memoryInfo["MemTotal"]*100;
?></small>
</div>
<div class="progress progress-md mt-2">
<div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $used; ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<div class="mt-4">
<div class="d-flex justify-content-between">
<small>Cached</small>
<small><?php
print_r($memoryUsage["cached"]);
$cace = $memoryInfo["Cached"]/$memoryInfo["MemTotal"]*100;
?></small>
</div>
<div class="progress progress-md mt-2">
<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $cace; ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<div class="mt-4">
<div class="d-flex justify-content-between">
<small>Swap Free</small>
<small><?php
print_r($memoryUsage["swap_free"]);
$swap = $memoryInfo["SwapFree"]/$memoryInfo["SwapTotal"]*100;
?></small>
</div>
<div class="progress progress-md mt-2">
<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $swap; ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<div class="mt-4">
<div class="d-flex justify-content-between">
<small>Active</small>
<small><?php
print_r($memoryUsage["active"]); 
$active = $memoryInfo["Active"]/$memoryInfo["MemTotal"]*100;
?></small>
</div>
<div class="progress progress-md mt-2">
<div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $active; ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<div class="mt-4 mb-5">
<div class="d-flex justify-content-between">
<small>Inactive</small>
<small><?php 
print_r($memoryUsage["inactive"]);
$inactive = $memoryInfo["Inactive"]/$memoryInfo["MemTotal"]*100;
?></small>
</div>
<div class="progress progress-md mt-2">
<div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo $inactive; ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<canvas id="salesTopChart"></canvas>
</div>
</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
</div>
</div>
</div>
<?php include('includes/script.php'); ?>
</body>
</html>