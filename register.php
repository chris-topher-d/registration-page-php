<?php
  require("includes/config.php");
  require("includes/classes/Account.php");
  require("includes/classes/Constants.php");
  $account = new Account($con);

  require("includes/handlers/register-handler.php");
  require("includes/handlers/login-handler.php");

  function getInputValue($name) {
    if (isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login/Register</title>
    <link rel="stylesheet" href="assets/css/register.css">
  </head>
  <body>
    <div class='input'>
      <form class="login" action="register.php" method="post">
        <h2>Login to your account</h2>
        <p>
          <?php echo $account->getError(Constants::$loginFailed); ?>
          <label for="loginUsername">Username</label>
          <input class="loginUsername" type="text" name="loginUsername" placeholder="Your username" required>
        </p>
        <p>
          <label for="loginPassword">Password</label>
          <input class="loginPassword" type="password" name="loginPassword" placeholder="Your Password" required>
        </p>
        <button type="submit" name="loginButton">Log In</button>
      </form>

      <form class="register" action="register.php" method="post">
        <h2>Create your free account</h2>
        <p>
          <?php echo $account->getError(Constants::$usernameLength); ?>
          <?php echo $account->getError(Constants::$usernameTaken); ?>
          <label for="username">Username</label>
          <input class="username" type="text" name="username" placeholder="Your username" value="<?php getInputValue('username'); ?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$firstNameLength); ?>
          <label for="firstName">First Name</label>
          <input class="firstName" type="text" name="firstName" placeholder="Your first name" value="<?php getInputValue('firstName'); ?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$lastNameLength); ?>
          <label for="lastName">Last Name</label>
          <input class="lastName" type="text" name="lastName" placeholder="Your last name" value="<?php getInputValue('lastName'); ?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$emailInvalid); ?>
          <?php echo $account->getError(Constants::$emailsDontMatch); ?>
          <?php echo $account->getError(Constants::$emailTaken); ?>
          <label for="email">Email</label>
          <input class="email" type="email" name="email" placeholder="e.g. you@gmail.com" value="<?php getInputValue('email'); ?>" required>
        </p>
        <p>
          <label for="emailConfirm">Confirm Email Address</label>
          <input class="emailConfirm" type="email" name="emailConfirm" placeholder="e.g. you@gmail.com" value="<?php getInputValue('emailConfirm'); ?>" required>
        </p>
        <p>
          <?php echo $account->getError(Constants::$pwInvalid); ?>
          <?php echo $account->getError(Constants::$pwLength); ?>
          <?php echo $account->getError(Constants::$pwsDontMatch); ?>
          <label for="password">Password</label>
          <input class="password" type="password" name="password" placeholder="Your Password" required>
        </p>
        <p>
          <label for="passwordConfirm">Confirm Password</label>
          <input class="passwordConfirm" type="password" name="passwordConfirm" placeholder="Your Password" required>
        </p>
        <button type="submit" name="regButton">Sign Up</button>
      </form>
    </div>
  </body>
</html>
