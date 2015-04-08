<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

$qry = "SELECT a.*, b.name role FROM users_tbl a, roles_tbl b WHERE user_id = '".$_SESSION['user_id']."' and a.acclevel=b.acclevel";
//$qry = "SELECT a.username username, a.user_id user_id, a.fname fname, a.sex sex, a.dob dob, a.email email, a.address address, a.imagepath imagepath, a.phone phone, b.name role FROM users_tbl a, role_tbl b WHERE user_id = '".$_SESSION['user_id']."' and a.acclevel=b.acclevel";
//$qry = "SELECT * FROM users_tbl WHERE user_id = '".$_SESSION['user_id']."'";
$rs = $db->fetchData($qry);




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
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="<?php echo $rs['imagepath']; ?>" alt="">
                                  <!--src="img/profile-avatar.jpg"-->
                              </a>
                              <h1><?php echo $rs['fname']; ?></h1>
                              <p><?php echo $rs['email']; ?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                              <li><a href="profile-activity.php"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
                              <li><a href="profile-edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                          <form>
                              <textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
                          </form>
                          <footer class="panel-footer">
                              <button class="btn btn-danger pull-right">Post</button>
                              <ul class="nav nav-pills">
                                  <li>
                                      <a href="#"><i class="fa fa-map-marker"></i></a>
                                  </li>
                                  <li>
                                      <a href="#"><i class="fa fa-camera"></i></a>
                                  </li>
                                  <li>
                                      <a href="#"><i class=" fa fa-film"></i></a>
                                  </li>
                                  <li>
                                      <a href="#"><i class="fa fa-microphone"></i></a>
                                  </li>
                              </ul>
                          </footer>
                      </section>
                      <section class="panel">
                          <div class="bio-graph-heading">
                              <!--Aliquam ac magna metus. Nam sed arcu non tellus fringilla fringilla ut vel ispum. Aliquam ac magna metus.-->
                              <?php echo $rs['about_me']; ?>
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1>Biography</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <?php
                           /*           $fullname=$rs['fname'];
                                      $splitNow=explode(" ",$fullname);
                                      //$splitNow=split('\s+', $fullname);
                                      $firstname=$splitNow[0];
                                      $lastname=$splitNow[1];
                                      //$lastname=ltrim($fullname,$firstname,'');
*/
                                      ?>

                                      <p><span>First Name </span>: <?php echo $rs['fname']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Last Name </span>: <?php echo $rs['lname']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>City/Town </span>: <?php echo $rs['city_town']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Birthday</span>: <?php echo $rs['dob']; ?></p><!--13 July 1983-->
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Access Level </span>: <?php echo $rs['role']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Email </span>: <?php echo $rs['email']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Username </span>: <?php echo $rs['username']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Phone </span>: <?php echo $rs['phone']; ?></p>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <section>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="99" data-fgColor="#e06b7d" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="red">Envato Website</h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="63" data-fgColor="#4CC5CD" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="terques">ThemeForest CMS </h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="75" data-fgColor="#96be4b" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="green">VectorLab Portfolio</h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="50" data-fgColor="#cba4db" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="purple">Adobe Muse Template</h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
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

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>
