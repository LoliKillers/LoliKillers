<?php
require_once('visit/counter.php');
require_once("include/config.php");
require_once("include/classes/FormSanitizer.php");
require_once("include/classes/Account.php");
require_once("include/classes/Constants.php");

$account = new Account($con);

if (isset($_POST["submitButton"])) {
    $userName = FormSanitizer::sanitizeFormUserName($_POST["userName"]);
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $success = $account->login($userName, $password);
    
    if ($success) {
        $_SESSION["userLoggedIn"] = $userName;
        header("Location: index.php");
    }
}

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head.php'); ?>
</head>
<body>
<div class="container-scroller">
<div class="container-fluid page-body-wrapper full-page-wrapper">
<div class="content-wrapper d-flex align-items-center auth px-0">
<div class="row w-100 mx-0">
<div class="col-lg-4 mx-auto">
<div class="auth-form-light text-left py-5 px-4 px-sm-5">
<div class="brand-logo">
<h1 class="text-primary typcn typcn-weather-windy-cloudy mr-2"> RUBLIX</h1>
</div>
<h4>Hello! let's get started</h4>
<h6 class="font-weight-light">Sign in to continue.</h6>
<form method="POST">
<p class="text-danger"><?php echo $account->getError(Constants::$loginFailed); ?></p>
<div class="form-group">
<input type="text" name="userName" class="form-control form-control-lg" id="username" placeholder="Username" required="">
</div>
<div class="form-group">
<input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" required="">
</div>
<div class="mt-3">
<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submitButton">SIGN IN</button>
</div>
<div class="my-2 d-flex justify-content-between align-items-center">
<div class="form-check">
<label class="form-check-label text-muted">
<input type="checkbox" class="form-check-input">
Keep me signed in
</label>
</div>
</div>
<div class="mb-2">
<button type="button" class="btn btn-block btn-facebook auth-form-btn">
<i class="typcn typcn-social-github-circular mr-2"></i>Connect using Github
</button>
</div>
<div class="text-center mt-4 font-weight-light">
Don't have an account? <a href="auth_register.php" class="text-primary">Create</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('includes/script.php'); ?>
</body>

</html>
