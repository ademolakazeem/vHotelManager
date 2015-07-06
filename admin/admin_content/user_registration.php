<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

require_once('access_denied_inclusion.php');

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
             <!--breadcrumbs start-->
             <div class="breadcrumbs">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-4 col-sm-4">
                             <h1>New Registration</h1>
                         </div>
                         <div class="col-lg-8 col-sm-8">
                             <ol class="breadcrumb pull-right">
                                 <li><a href="index.php">Home</a></li>
                                 <!--<li><a href="show_update_room_info.php">Show Room Setup</a></li>-->
                                 <li class="active">New Registration</li>
                             </ol>
                         </div>
                     </div>
                 </div>
             </div>
             <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             User Registration Form
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">

                                      <div class="form-group">
                                          <label for="nothing" class="control-label col-lg-2"></label>
                                          <div class="col-md-6 col-xs-11">
                                              <p align="center">Enter a user's personal details below</p>
                                          </div>
                                      </div>


                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Firstname</label>
                                          <div class="col-md-6 col-xs-11">
                                              <input class="form-control" id="firstname" name="firstname" type="text"
                                                     value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>"/>
                                          </div>

                                      </div>
                                      <div class="form-group ">
                                          <label for="lastname" class="control-label col-lg-2">Lastname</label>
                                          <div class="col-md-6 col-xs-11">
                                              <input class="form-control" id="lastname" name="lastname" type="text"
                                                     value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>"/>
                                          </div>

                                      </div>
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Address</label>
                                          <div class="col-md-6 col-xs-11">
                                              <!--<textarea class="form-control ckeditor" name="address" rows="2">-->
                                              <textarea name="" id="" class="form-control" cols="30" rows="5" name="address" id="address">
                                                  <?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>

                                              </textarea>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">A little about the user</label>
                                          <div class="col-md-6 col-xs-11">
                                              <!--<textarea class="form-control ckeditor" name="address" rows="2">-->
                                              <textarea name="" id="" class="form-control" cols="30" rows="5" name="about_me" id="about_me">
                                                  <?php echo isset($_POST['about_me']) ? $_POST['about_me'] : ''; ?>

                                              </textarea>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="city_town" class="control-label col-lg-2">City/Town</label>
                                          <div class="col-md-6 col-xs-11">
                                              <input class=" form-control" id="city_town" name="city_town" type="text"
                                                     value="<?php echo isset($_POST['city_town']) ? $_POST['city_town'] : ''; ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Email</label>
                                          <div class="col-md-6 col-xs-11">
                                              <!--class="col-lg-10"-->
                                              <input class=" form-control" id="email" name="email" type="text"
                                                     value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"/>
                                          </div>
                                      </div>


                                      <div class="form-group ">
                                          <label for="phone_number" class="control-label col-lg-2">Phone Number</label>
                                          <div class="col-md-6 col-xs-11">
                                              <input class=" form-control" id="phone_number" name="phone_number" type="text"
                                                     value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : ''; ?>"/>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="dob" class="control-label col-lg-2">Date of Birth</label>
                                      <div class="col-md-6 col-xs-11">

                                          <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-append date dpYears">
                                              <input type="text" readonly="" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : '06-12-1990'; ?>"
                                                     size="16" class="form-control" id="dob" name="dob">
                                                          <span class="input-group-btn add-on">
                                                            <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                                                          </span>
                                              <!--readonly=""-->
                                          </div>

                                      </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="sex" class="control-label col-lg-2">Sex</label>
                                          <div class="col-md-6 col-xs-11">
                                              <select name="sex" id="sex" class="form-control m-bot15">
                                                  <option value="<?php echo isset($_POST['sex']) ? $_POST['sex'] : ''; ?> ><?php echo isset($_POST['sex']) ? $_POST['sex'] : '--- Select ---'; ?></option>
                                                  <option value="Male">Male</option>
                                                  <option value="Female">Female</option>
                                            </select>
                                          </div>
                                      </div>

                                    <!--  <div class="form-group last">
                                          <label class="control-label col-lg-2">Image Upload</label>
                                          <div class="col-md-9">
                                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file" class="default" name="imagepath" id="imagepath" />
                                                   </span>
                                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                                              <span class="label label-danger">NOTE!</span>
                                             <span>
                                             Attached image thumbnail is
                                             supported in Latest Firefox, Chrome, Opera,
                                             Safari and Internet Explorer 10 only
                                             </span>
                                          </div>
                                      </div>-->



                                      <div class="form-group">
                                          <label for="nothing" class="control-label col-lg-2"></label>
                                          <div class="col-md-6 col-xs-11">
                                              <p align="center">Enter a user's account details below</p>
                                          </div>
                                      </div>


                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Username</label>
                                          <div class="col-md-6 col-xs-11">
                                              <input class=" form-control" id="username" name="username" type="text"
                                                     value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">Password</label>
                                          <div class="col-md-6 col-xs-11">
                                              <input class="form-control" id="password" name="password" type="password" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="cpassword" class="control-label col-lg-2">Confirm Password</label>
                                          <div class="col-md-6 col-xs-11">
                                              <input class="form-control" id="cpassword" name="cpassword" type="password" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="acclevel" class="control-label col-lg-2">Access Level</label>
                                          <div class="col-md-6 col-xs-11">
                                              <select name="acclevel" id="acclevel" class="form-control m-bot15">
                                                  <option value="">--- Select ---</option>

                                                  <?php

                                                  $query = "SELECT id acclevel, name FROM `roles_tbl`";
                                                  $conn=$db->getConnection();
                                                  //$this->db->getConnection();
                                                  $result = mysqli_query($conn, $query);
                                                  //, MYSQL_ASSOC
                                                  //_fetch_array($result,MYSQL_BOTH))
                                                  while($row=mysqli_fetch_assoc($result))

                                                  {
                                                      echo "<option value='".$row['acclevel']."'>".$row['name']."</option>";
                                                  }

                                                  ?>



                                              </select>
                                          </div>
                                      </div>


                                      </div>


                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit" name="save">Register Now</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
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




  <!--this page plugins-->

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
  <!--this page  script only-->
  <script src="js/advanced-form-components.js"></script>
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>










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
