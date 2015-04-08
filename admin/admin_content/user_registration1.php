<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();


//$featurename =mysqli_real_escape_string($_POST['featurename']);
//$featurdescription = mysql_real_escape_string($_POST['featurdescription']);


if(isset($_POST['save']))
	{
		$msg = $adm->addUserSetup();
	}

?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('head.php');
?>

  <body>

  <section id="container" class="">
      <!--header start-->
      <?php
      require_once('header.php');
      ?>
      <!--header end-->
      <!--sidebar start-->
      <?php
      require_once('aside.php')
      ?>

      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
             <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             User Registration Page
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="container">

                                  <form class="form-signin" action="index.html">
                                      <h2 class="form-signin-heading">registration now</h2>
                                      <div class="login-wrap">
                                          <p>Enter your personal details below</p>
                                          <input type="text" class="form-control" placeholder="Full Name" autofocus>
                                          <input type="text" class="form-control" placeholder="Address" autofocus>
                                          <input type="text" class="form-control" placeholder="Email" autofocus>
                                          <input type="text" class="form-control" placeholder="City/Town" autofocus>

                                          <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-append date dpYears">
                                              <input type="text" readonly="" value="12-02-2012" size="16" class="form-control" placeholder="Email" autofocus>
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                          </div>
                                          <div class="radios">
                                              <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
                                                  <input name="sample-radio" id="radio-01" value="1" type="radio" checked /> Male
                                              </label>
                                              <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
                                                  <input name="sample-radio" id="radio-02" value="1" type="radio" /> Female
                                              </label>
                                          </div>

                                          <p> Enter your account details below</p>
                                          <input type="text" class="form-control" placeholder="User Name" autofocus>
                                          <input type="password" class="form-control" placeholder="Password">
                                          <input type="password" class="form-control" placeholder="Re-type Password">
                                          <label class="checkbox">
                                              <input type="checkbox" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
                                          </label>
                                          <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>

                                          <div class="registration">
                                              Already Registered.
                                              <a class="" href="login.html">
                                                  Login
                                              </a>
                                          </div>

                                      </div>

                                  </form>

                              </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <?php
      require_once('footer.php');
      ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="js/respond.min.js" ></script>

  <script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.quicksearch.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <!--this page  script only-->
  <script src="js/advanced-form-components.js"></script>


    <!--script for this page
    <script src="js/form-validation-script.js"></script>-->
  <script>
  $('input.rate').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
  return value
  .replace(/\D/g, '')
  .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  ;
  });
  });
</script>

  </body>
</html>
