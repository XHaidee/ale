<?php
session_start();
if (isset($_SESSION['Admin-name'])) {
  header("location: index.php");
}
// echo basename($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="js/jquery-2.2.3.min.js"></script>
    <script>
      $(window).on("load resize ", function() {
          var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
          $('.tbl-header').css({'padding-right':scrollWidth});
      }).resize();
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click', '.message', function(){
          $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
          $('h1').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
      });
    </script>
</head>
<body>
<?php include'header.php'; ?> 
<main>
  <h1 class=""></h1>
  <h1 class="">Enter Your Email and Password</h1>
  <h1 class=""></h1>
  
 
<!-- Log In -->
<section>
  <div class="">
    <div class="">
      <div class="form" style="border-radius:0px !important; box-shadow:none !important;">
        <?php  
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "invalidEmail") {
                echo '<div class="alert alert-danger">
                        This E-mail is invalid!!
                      </div>';
            }
            elseif ($_GET['error'] == "sqlerror") {
                echo '<div class="alert alert-danger">
                        There a database error!!
                      </div>';
            }
            elseif ($_GET['error'] == "wrongpassword") {
                echo '<div class="alert alert-danger">
                        Wrong password!!
                      </div>';
            }
            elseif ($_GET['error'] == "nouser") {
                echo '<div class="alert alert-danger">
                        This E-mail does not exist!!
                      </div>';
            }
          }
          if (isset($_GET['reset'])) {
            if ($_GET['reset'] == "success") {
                echo '<div class="alert alert-success">
                        Check your E-mail!
                      </div>';
            }
          }
          if (isset($_GET['account'])) {
            if ($_GET['account'] == "activated") {
                echo '<div class="alert alert-success">
                        Please Login
                      </div>';
            }
          }
          if (isset($_GET['active'])) {
            if ($_GET['active'] == "success") {
                echo '<div class="alert alert-success">
                        The activation like has been sent!
                      </div>';
            }
          }
        ?>
      
        
        <form class="form custom-input"  action="ac_login.php" method="post" enctype="multipart/form-data">
          <input class="custom-input" type="email" name="email" id="email" placeholder="E-mail..." required/>
          <input class="custom-input" type="password" name="pwd" id="pwd" placeholder="Password" required/>
          <button class="custom-input" type="submit" name="login" id="login">login</button>
          <p class="message"><a href="#">Forgot your Password?</a></p>
        </form>
      </div>
    </div>
  </div>
</section>
</main>
</body>
<style>
  .custom-input{
  position: relative;
  z-index: 0; 
  max-width: 360px;
  margin: 0 auto;
  padding: 40px; 
  text-align: center; 
  border-radius:0px !important; 
 
  box-shadow: none !important;
  }
  .alert{
    width:100% !important;
    margin:auto;
    margin-bottom:5px !important;
    border-radius:0px !important;
  }
</style>
</html>