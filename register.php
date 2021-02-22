<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
  if(isset($_SESSION['userLoggedIn'])) {
  header("Location: index.php");
}
  $account = new Account($con);

  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
?>

<html>
<head>
  <title>Welcome to SyncPhonic!</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="assets/images/logo/brand.png" />
        
        
        
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/app-stylebuild.css">
        <link rel="stylesheet" type="text/css" href="assets/css/register.css">  
      
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
    <script src="assets/js/register.js"></script>
</head>
<body>
  
  <?php

  if(isset($_POST['registerButton'])) {
    echo '<script>
        $(document).ready(function() {
          $("#loginForm").hide();
          $("#registerForm").show();
        });
      </script>';
  }
  else {
    echo '<script>
        $(document).ready(function() {
          $("#loginForm").show();
          $("#registerForm").hide();
        });
      </script>';
  }

  ?>
  

  <div class="background changeBack">

    <div id="loginContainer" class="form-group">
      <div id="inputContainer" class="container">
        <!-- Login form -->
        <?php
          if(isset($_GET['albumId'])) {
    $albumId= $_GET['albumId'];
   echo "<form id='loginForm' action='register.php?albumId=$albumId' method='POST'>";
  }
  else if(isset($_GET['artistId'])){
    $artistId= $_GET['artistId'];
   echo "<form id='loginForm' action='register.php?artistId=$artistId' method='POST'>";
  }
  else if(isset($_GET['playlistId'])){
    $playlistId= $_GET['playlistId'];
   echo "<form id='loginForm' action='register.php?playlistId=$playlistId' method='POST'>";
  }else if(isset($_GET['songId'])){
    $songId= $_GET['songId'];
   echo "<form id='loginForm' action='register.php?songId=$songId' method='POST'>";
  }else if(isset($_GET['term'])){
    $term= $_GET['term'];
   echo "<form id='loginForm' action='register.php?term=$term' method='POST'>";
  }
  else{
  echo "<form id='loginForm' action='register.php' method='POST'>";
  }
        ?>
        <img src="assets/images/logo/logo-white.png" class="img-fluid" style="width:90%" />
        <div style="width:100%;">
        <?php echo $account->getError(Constants::$activationRequired); ?>
        <?php echo $account->getError(Constants::$emailSent); ?>
        <?php echo $account->getError(Constants::$emailError); ?>
          <?php
  if(isset($_GET['albumId'])) {
     echo "<h2>You need to login to your account in order to view this album!!</h2>";
    }
    else if(isset($_GET['artistId'])){
     echo "<h2>You need to login to your account in order to view this artist!!</h2>";
    }
    else if(isset($_GET['playlistId'])){
     echo "<h2>You need to login to your account in order to view this playlist!!</h2>";
    }else if(isset($_GET['songId'])){
    $songId= $_GET['songId'];
   echo "<h2>You need to login to your account in order to listen to this song!!</h2>";
  }else if(isset($_GET['term'])){
    $term= $_GET['term'];
   echo "<h2>You need to login to your account in order to view the search results!!</h2>";
  }
    else{
    echo "<h2>Login to your account</h2>";
    }
  ?>
         
          <p>
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" class="form-control" name="loginUsername" type="text" placeholder="Your username" value="<?php getInputValue('loginUsername') ?>" required>
          </p>
          <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" class="form-control" name="loginPassword" type="password" placeholder="Your password" required>
          </p>

          <button type="submit" class="btn-royal-blue btn" name="loginButton">LOG IN</button>

          <div class="hasAccountText">
            <span id="hideLogin">Don't have an account yet? Signup here.</span>
          </div>
          </div>
        </form>


<!-- register form -->
        <?php
          if(isset($_GET['albumId'])) {
    $albumId= $_GET['albumId'];
   echo "<form id='registerForm' action='register.php?albumId=$albumId' method='POST'>";
  }
  else if(isset($_GET['artistId'])){
    $artistId= $_GET['artistId'];
   echo "<form id='registerForm' action='register.php?artistId=$artistId' method='POST'>";
  }
  else if(isset($_GET['playlistId'])){
    $playlistId= $_GET['playlistId'];
   echo "<form id='registerForm' action='register.php?playlistId=$playlistId' method='POST'>";
  }else if(isset($_GET['songId'])){
    $songId= $_GET['songId'];
   echo "<form id='registerForm' action='register.php?songId=$songId' method='POST'>";
  }else if(isset($_GET['term'])){
    $term= $_GET['term'];
   echo "<form id='registerForm' action='register.php?term=$term' method='POST'>";
  }
  else{
  echo "<form id='registerForm' action='register.php' method='POST'>";
  }
        ?>
        <img src="assets/images/logo/logo-white.png" class="img-fluid" style="width:90%" />
        <?php echo $account->getError(Constants::$activationRequired); ?>
        <?php echo $account->getError(Constants::$emailSent); ?>
        <?php echo $account->getError(Constants::$emailError); ?>
          <h2>Create your free account</h2>
          <p>
            <?php echo $account->getError(Constants::$usernameCharacters); ?>
            <?php echo $account->getError(Constants::$usernameTaken); ?>
            <label for="username">Username</label>
            <input id="username" class="form-control" name="username" type="text" placeholder="e.g. JohnDoe" value="<?php getInputValue('username') ?>" required>
          </p>

          <p>
            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
            <label for="firstName">First name</label>
            <input id="firstName" class="form-control" name="firstName" type="text" placeholder="e.g. John" value="<?php getInputValue('firstName') ?>" required>
          </p>

          <p>
            <?php echo $account->getError(Constants::$lastNameCharacters); ?>
            <label for="lastName">Last name</label>
            <input id="lastName" class="form-control" name="lastName" type="text" placeholder="e.g. Doe" value="<?php getInputValue('lastName') ?>" required>
          </p>

          <p>
            <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
            <?php echo $account->getError(Constants::$emailInvalid); ?>
            <?php echo $account->getError(Constants::$emailTaken); ?>
            <label for="email">Email</label>
            <input id="email" class="form-control" name="email" type="email" placeholder="e.g. johndoe@internet.com" value="<?php getInputValue('email') ?>" required>
          </p>

          <p>
            <label for="email2">Confirm email</label>
            <input id="email2" class="form-control" name="email2" type="email" placeholder="e.g. johndoe@internet.com" value="<?php getInputValue('email2') ?>" required>
          </p>

          <p>
            <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
            <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
            <?php echo $account->getError(Constants::$passwordCharacters); ?>
            <label for="password">Password</label>
            <input id="password" class="form-control" name="password" type="password" placeholder="Your password" required>
          </p>

          <p>
            <label for="password2">Confirm password</label>
            <input id="password2" class="form-control" name="password2" type="password" placeholder="Your password" required>
          </p>
 
          <button type="submit" class="btn btn-primary" name="registerButton">SIGN UP</button>

          <div class="hasAccountText">
            <span id="hideRegister">Already have an account? Log in here.</span>
          </div>
          
        </form>


      </div>
    </div>
  </div>

</body>
</html>