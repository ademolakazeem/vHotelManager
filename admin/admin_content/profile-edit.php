<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

$qry = "SELECT a.*, b.acclevel access_level, b.name role FROM users_tbl a, roles_tbl b WHERE user_id = '".$_SESSION['user_id']."' and a.acclevel=b.acclevel";
//$qry = "SELECT a.username username, a.user_id user_id, a.fname fname, a.sex sex, a.dob dob, a.email email, a.address address, a.imagepath imagepath, a.phone phone, b.name role FROM users_tbl a, role_tbl b WHERE user_id = '".$_SESSION['user_id']."' and a.acclevel=b.acclevel";
//$qry = "SELECT * FROM users_tbl WHERE user_id = '".$_SESSION['user_id']."'";
$rs = $db->fetchData($qry);

$qryAccLevel = "SELECT acclevel my_access_level, name my_role_name FROM roles_tbl WHERE acclevel = '".$rs['access_level']."'";
$rsAccLevel = $db->fetchData($qryAccLevel);

if(isset($_POST['edit']))
{
    $msg = $adm->updateUserSetup();
}

if(isset($_POST['edit_password']))
{
    $msg = $adm->updateUserPassword();
}
?>

<!DOCTYPE html>
<html lang="en">
<!--Head -->
<?php
require_once('head.php');
?>
<!--Head End -->
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
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="<?php echo $rs['imagepath']; ?>" alt="">
                              </a>
                              <h1> <?php echo $rs['fname']; ?></h1>
                              <p> <?php echo $rs['email']; ?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li><a href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                              <li><a href="profile-activity.php"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
                              <li  class="active"><a href="profile-edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                          <?php if(isset($msg)) echo $msg; ?>
                          <div class="bio-graph-heading">
                              <?php echo $rs['about_me']; ?>
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1> Profile Info</h1>
                              <form class="form-horizontal" role="form" action="" method="post">
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">FirstName</label>
                                      <div class="col-lg-6">
                                          <input type="text" value=" <?php echo $rs['fname']; ?>" class="form-control" name="firstname" id="firstname" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">LastName</label>
                                      <div class="col-lg-6">
                                          <input type="text" value=" <?php echo $rs['lname']; ?>" class="form-control" name="lastname" id="lastname" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Address</label>
                                      <div class="col-lg-10">
                                          <textarea name="address" id="address" class="form-control" cols="20" rows="5">
                                              <?php echo $rs['address']; ?>
                                          </textarea>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">About Me</label>
                                      <div class="col-lg-10">
                                          <textarea name="about_me" id="about_me" class="form-control" cols="20" rows="5">
                                              <?php echo $rs['about_me']; ?>
                                          </textarea>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">City/Town</label>
                                      <div class="col-lg-6">
                                          <input type="text" value="<?php echo $rs['city_town']; ?>" class="form-control" name="city_town" id="city_town" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-6">
                                          <input type="text" value="<?php echo $rs['email']; ?>" class="form-control" id="email" name="email" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Phone Number</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $rs['phone']; ?>" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                      <label for="dob" class="col-lg-2 control-label">Date of Birth</label>
                                      <div class="col-lg-6">

                                          <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-1990"  class="input-append date dpYears">
                                              <input type="text" readonly="" value="<?php echo $rs['dob']; ?>"
                                                     size="16" class="form-control" id="dob" name="dob">
                                                          <span class="input-group-btn add-on">
                                                            <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                                                          </span>
                                              <!--readonly=""-->
                                          </div>

                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Sex</label>
                                      <div class="col-lg-6">
                                          <select name="sex" id="sex" class="form-control m-bot15">
                                              <option value="<?php echo $rs['sex']; ?>" ><?php echo $rs['sex']; ?></option>
                                                  <option value="Male">Male</option>
                                              <option value="Female">Female</option>
                                          </select>
                                      </div>
                                  </div>




                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-success"name="edit" id="edit">Update my Profile Now</button>
                                          <button type="button" class="btn btn-default">Cancel</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                      <section>
                          <div class="panel panel-primary">
                              <div class="panel-heading"> Sets New Password & Avatar</div>
                              <div class="panel-body">
                                  <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Current Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" class="form-control" name="current_password" id="current_password" placeholder=" ">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">New Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" class="form-control" name="new_password" id="new_password" placeholder=" ">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Re-type New Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" class="form-control" id="rt_password" name="rt_password" placeholder=" ">
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="acclevel" class="control-label col-lg-2">Access Level</label>
                                          <div class="col-md-6 col-xs-11">
                                              <select name="acclevel" id="acclevel" class="form-control m-bot15">

                                                  $rsAccLevel
                                                  <option value="<?php echo $rsAccLevel['my_access_level'];?>"><?php echo $rsAccLevel['my_role_name'];?></option>

                                                  <?php

                                                  $query = "SELECT acclevel, name FROM `roles_tbl`";
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

                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Change Avatar</label>
                                          <div class="col-lg-6">
                                              <input type="file" class="file-pos" id="file" name="file">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button type="submit" class="btn btn-info" name="edit_password" id="edit_password">Update Password Now</button>
                                              <button type="button" class="btn btn-default">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </aside>
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
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
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
  <!--this page  script only-->
  <script src="js/advanced-form-components.js"></script>
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

  </body>
</html>
