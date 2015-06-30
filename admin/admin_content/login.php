<?php
//error_reporting(0);
require_once("../../ClassesController/DBDirect.php");
require_once("../../ClassesController/AdminManager.php");

$db = new DBConnecting();
$adm = new AdminController();

if(isset($_POST['btnSignIn']))
{
    $msg = $adm->adminLogin();
}

if(isset($_GET['r']) && base64_decode($_GET['r'])=="failed")
{
    //$msg = "<div class=\"errortitle\">Invalid Username or Password</div>";

    $msg =  '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh snap!</strong> Invalid Username or Password.
             </div>';
}
elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="empty")
{
    $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please enter your login details!
             </div>';
}elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="logout")
{
    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully logged out, see you soon!</p>
                              </div>';
}elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="uas")
{
    $msg ='<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh Oh!</strong> Unauthorized access, Please log in
             </div>';
}elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="inactiveuser")
{
    $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh Oh!</strong> Your account has not been activated.
             </div>';
}




?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('head.php');
?>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" id="login-form" method="post" action="" autocomplete="off">
          <!--class="form-signin"-->
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <?php if(isset($msg)) echo $msg; ?>
            <input type="text" class="form-control" id="userId"  name="userId" placeholder="Username" autofocus>
            <input type="password" class="form-control"  name="password" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
            <!-- <button class="btn btn-lg btn-login btn-block" name="btnSignIn" type="submit">Sign in</button>-->
             <input class="btn btn-lg btn-login btn-block" name="btnSignIn" type="submit" value="Sign in" />
            <!-- <p>or you can sign in via social network</p>
             <div class="login-social-link">
                 <a href="index.html" class="facebook">
                     <i class="fa fa-facebook"></i>
                     Facebook
                 </a>
                 <a href="index.html" class="twitter">
                     <i class="fa fa-twitter"></i>
                     Twitter
                 </a>
             </div>-->
            <div class="registration">
                Want to go to the home page?
                <a class="" href="../../frontend/frontend_content/index.html">
                    Go home now
                </a>
            </div>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
