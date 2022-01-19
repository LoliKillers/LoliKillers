<?php
require_once('visit/counter.php');
require_once("include/config.php");
require_once("include/classes/FormSanitizer.php");
require_once("include/classes/Account.php");
require_once("include/classes/Constants.php");

$account = new Account($con);

if (isset($_POST["submitButton"])) {
    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
    $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
    $userName = FormSanitizer::sanitizeFormUserName($_POST["userName"]);
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
    $success = $account->register($firstName, $lastName, $userName, $email, $password, $password2);
    if ($success) {
        $_SESSION['userLoggedIn'] = $userName;
        header('Location: index.php');
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
<h4>New here?</h4>
<h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
<form method="POST" action="">
<div class="form-group">
<?php echo $account->getError(Constants::$firstNameCharacters); ?>
<input type="text" class="form-control form-control-lg" id="firstName" name="firstName" placeholder="First name..." required="">
</div>
<div class="form-group">
<?php echo $account->getError(Constants::$lastNameCharacters); ?>
<input type="text" class="form-control form-control-lg" id="lastName" name="lastName" placeholder="Last name..." required="">
</div>
<div class="form-group">
<?php echo $account->getError(Constants::$userNameCharacters); ?>
<input type="username" class="form-control form-control-lg" id="userName" name="userName" placeholder="Username..." required="">
</div>
<div class="form-group">
<?php echo $account->getError(Constants::$emailInvalid); ?>
<?php echo $account->getError(Constants::$emailsDontMatch); ?>
<?php echo $account->getError(Constants::$emailTaken); ?>
<input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email address..." required="">
</div>
<div class="form-group">
<?php echo $account->getError(Constants::$passwordsDontMatch); ?>
<?php echo $account->getError(Constants::$passwordLength); ?>
<input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Create password..." required="">
</div>
<div class="form-group">
<input type="password" class="form-control form-control-lg" id="password2" name="password2" placeholder="Repeat password..." required="">
</div>
<div class="mb-4">
<div class="form-check">
<label class="form-check-label text-muted">
<input type="checkbox" class="form-check-input" required="">
I agree to all Terms & Conditions
</label>
</div>
</div>
<div class="mt-3">
<button type="submit" name="submitButton" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
</div>
<div class="text-center mt-4 font-weight-light">
Already have an account? <a href="auth_login.php" class="text-primary">Login</a>
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
