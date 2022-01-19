<?php
require_once('include/header.php');
require_once('include/classes/Account.php');
require_once('include/classes/FormSanitizer.php');
require_once('include/classes/Constants.php');
$user = new User($con, $userLoggedIn);
$userName = isset($_POST["userName"]) ? $_POST["userName"] : $user->getUserName();
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
<li class="nav-item">
<div class="d-flex sidebar-profile">
<div class="sidebar-profile-image">
<img src="https://api.loli.loveslife.biz/api/svg_monster?apikey=ariasu" alt="image">
<span class="sidebar-status-indicator"></span>
</div>
<div class="sidebar-profile-name">
<p class="sidebar-name">Hy 
<?php echo $userName; ?>
</p>
<p class="sidebar-designation">
Welcome back
</p>
</div>
</div>
<div class="nav-search">
<div class="input-group">
<input type="text" class="form-control" placeholder="Type to search..." aria-label="search" aria-describedby="search">
<div class="input-group-append">
<span class="input-group-text" id="search">
<i class="typcn typcn-zoom"></i>
</span>
</div>
</div>
</div>
<p class="sidebar-menu-title">Dash menu</p>
</li>
<li class="nav-item">
<a class="nav-link" href="index.php">
<i class="typcn typcn-device-desktop menu-icon"></i>
<span class="menu-title">Dashboard </span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
<i class="typcn typcn-star-full-outline menu-icon"></i>
<span class="menu-title">API Anime <span class="badge badge-primary ml-3">New</span></span>
<i class="typcn typcn-chevron-right menu-arrow"></i>
</a>
<div class="collapse" id="ui-basic">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="anime_search.php">Anime Search</a></li>
<li class="nav-item"> <a class="nav-link" href="manga_search.php">Manga Search</a></li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
<i class="typcn typcn-user-add-outline menu-icon"></i>
<span class="menu-title">Authentication</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse" id="auth">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="auth_login.php"> Login </a></li>
<li class="nav-item"> <a class="nav-link" href="auth_register.php"> Register </a></li>
</ul>
</div>
</li>
</ul>
<ul class="sidebar-legend">
<li>
<p class="sidebar-menu-title">Contact Owner</p>
</li>
<li class="nav-item"><a href="https://wa.me/6285785445412" class="nav-link">WhatsApp</a></li>
<li class="nav-item"><a href="https://github.com/LoliKillers" class="nav-link">Github</a></li>
<li class="nav-item"><a href="https://instagram.com/ariasu.xyz" class="nav-link">Instagram</a></li>
</ul>
</nav>