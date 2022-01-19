<?php
require_once('visit/counter.php');
require_once('include/header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head.php'); ?>
</head>
<body>
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
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Api Anime</h4>
<p class="card-description">
<code>&lt;Anime Search&gt;</code>
</p>
<p>Anime search api</p>
<p>I created this feature using the php programming language</p>
<p>And for the package itself I took it from magnum357i/myanimelist-api</p>
<p>This api is to get the id and name from myanimelist.net</p>
</div>
</div>
</div>
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Search</h4>
<p class="card-description">
Please enter the name of the anime you want to search for
</p>
<form onsubmit="$('#loading').show();">
<div class="form-group">
<div class="input-group">
<input type="text" name="search" class="form-control" placeholder="Search anime..." aria-label="Search anime..." required="">
<div class="input-group-append">
<button class="btn btn-sm btn-primary" type="submit">Search</button>
</div>
</div>
<div id="loading" style="display:none" class="text-info"><br> In progress, wait a moment.....</div>
</div>
</form>
<div class="template-demo">
</div>
</div>
</div>
</div>
<?php
include('vendor/autoload.php');
if (isset($_GET['search'])) {
    $text = $_GET['search'];
    $search = str_replace(' ', '', $text);
    $mal = new \MyAnimeList\Search\Anime($search);
    $mal->sendRequestOrGetData();
    if ( $mal->isSuccess() ) {
        $hasil = $mal->results;
        //print_r($hasil);
        $link = $mal->link();
        $urlimg = $hasil[0]["poster"];
        $urlimg2 = $hasil[1]["poster"];
        $urlimg3 = $hasil[2]["poster"];
        $urlimg4 = $hasil[3]["poster"];
        $urlimg5 = $hasil[4]["poster"];
        $img = 'images/sprites/blue.png';
        $img2 = 'images/sprites/dark.png';
        $img3 = 'images/sprites/flag.png';
        $img4 = 'images/sprites/green.png';
        $img5 = 'images/sprites/red.png';
        $hasil2 = file_put_contents($img, file_get_contents($urlimg));
        $hasil3 = file_put_contents($img2, file_get_contents($urlimg2));
        $hasil4 = file_put_contents($img3, file_get_contents($urlimg3));
        $hasil5 = file_put_contents($img4, file_get_contents($urlimg4));
        $hasil6 = file_put_contents($img5, file_get_contents($urlimg5));
        
        echo "<div class='col-md-4 grid-margin stretch-card'>
        <div class='card'>
        <div class='card-body'>
        <h4 class='card-title'>Result 1</h4>
        <div class='media'>
        <i class='icon-md text-info d-flex mr-3'>
        <img src='images/sprites/blue.png'>
        </i>
        <div class='media-body'>
        <p class='card-text'> ID : {$hasil[0]['id']}</p>
        <p class='card-text'> Title : {$hasil[0]['title']}</p>
        </div>
        </div>
        </div>
        </div>
        </div>";
        echo "<div class='col-md-4 grid-margin stretch-card'>
        <div class='card'>
        <div class='card-body'>
        <h4 class='card-title'>Result 2</h4>
        <div class='media'>
        <i class='icon-md text-info d-flex mr-3'>
        <img src='images/sprites/dark.png'>
        </i>
        <div class='media-body'>
        <p class='card-text'> ID : {$hasil[1]['id']}</p>
        <p class='card-text'> Title : {$hasil[1]['title']}</p>
        </div>
        </div>
        </div>
        </div>
        </div>";
        echo "<div class='col-md-4 grid-margin stretch-card'>
        <div class='card'>
        <div class='card-body'>
        <h4 class='card-title'>Result 3</h4>
        <div class='media'>
        <i class='icon-md text-info d-flex mr-3'>
        <img src='images/sprites/flag.png'>
        </i>
        <div class='media-body'>
        <p class='card-text'> ID : {$hasil[2]['id']}</p>
        <p class='card-text'> Title : {$hasil[2]['title']}</p>
        </div>
        </div>
        </div>
        </div>
        </div>";
        echo "<div class='col-md-4 grid-margin stretch-card'>
        <div class='card'>
        <div class='card-body'>
        <h4 class='card-title'>Result 4</h4>
        <div class='media'>
        <i class='icon-md text-info d-flex mr-3'>
        <img src='images/sprites/green.png'>
        </i>
        <div class='media-body'>
        <p class='card-text'> ID : {$hasil[3]['id']}</p>
        <p class='card-text'> Title : {$hasil[3]['title']}</p>
        </div>
        </div>
        </div>
        </div>
        </div>";
        echo "<div class='col-md-4 grid-margin stretch-card'>
        <div class='card'>
        <div class='card-body'>
        <h4 class='card-title'>Result 5</h4>
        <div class='media'>
        <i class='icon-md text-info d-flex mr-3'>
        <img src='images/sprites/red.png'>
        </i>
        <div class='media-body'>
        <p class='card-text'> ID : {$hasil[4]['id']}</p>
        <p class='card-text'> Title : {$hasil[4]['title']}</p>
        </div>
        </div>
        </div>
        </div>
        </div>";
    }
    else {
        echo "<script language='javascript'>alert('Sorry, no results from the {$text} search!!!!');</script>";;
 }
    
}
?>
</div>
</div>
<?php include('includes/footer.php'); ?>
</div>
</div>
</div>
<?php include('includes/script.php'); ?>
</body>
</html>
