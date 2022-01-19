<?php
require_once("include/config.php");
require_once("include/classes/PreviewProvider.php");
require_once("include/classes/CategoryContainers.php");
require_once("include/classes/Entity.php");
require_once("include/classes/EntityProvider.php");
require_once("include/classes/ErrorMessage.php");
require_once("include/classes/SeasonProvider.php");
require_once("include/classes/Season.php");
require_once("include/classes/Video.php");
require_once("include/classes/VideoProvider.php");
require_once("include/classes/User.php");

if (!isset($_SESSION['userLoggedIn'])) {
    header('Location: auth_login.php');
}

$userLoggedIn = $_SESSION["userLoggedIn"];

?>