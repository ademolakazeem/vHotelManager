<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

$qry = "SELECT a.*, b.name role FROM users_tbl a, roles_tbl b WHERE user_id = '".$_SESSION['user_id']."' and a.acclevel=b.id";
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
      require_once('aside.php');
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
                              <li><a href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                              <li class="active"><a href="profile-activity.php"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
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

                          <!--Start 1st Audit-->
                          <div class="panel-body profile-activity">
                              <h5 class="pull-right">12 August 2013</h5>
                              <div class="activity terques">
                                  <span>
                                      <i class="fa fa-shopping-cart"></i>
                                  </span>
                                  <div class="activity-desk">
                                      <div class="panel">
                                          <div class="panel-body">
                                              <div class="arrow"></div>
                                              <i class=" fa fa-time"></i>
                                              <h4>10:45 AM</h4>
                                              <p>Purchased new equipments for zonal office setup and stationaries.</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="activity alt purple">
                                  <span>
                                      <i class="fa fa-rocket"></i>
                                  </span>
                                  <div class="activity-desk">
                                      <div class="panel">
                                          <div class="panel-body">
                                              <div class="arrow-alt"></div>
                                              <i class=" fa fa-time"></i>
                                              <h4>12:30 AM</h4>
                                              <p>Lorem ipsum dolor sit amet consiquest dio</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="activity blue">
                                  <span>
                                      <i class="fa fa-bullhorn"></i>
                                  </span>
                                  <div class="activity-desk">
                                      <div class="panel">
                                          <div class="panel-body">
                                              <div class="arrow"></div>
                                              <i class=" fa fa-time"></i>
                                              <h4>10:45 AM</h4>
                                              <p>Please note which location you will consider, or both. Reporting to the VP <br> of Compliance and CSR, you will be responsible for managing.. </p>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="activity alt green">
                                  <span>
                                      <i class="fa fa-beer"></i>
                                  </span>
                                  <div class="activity-desk">
                                      <div class="panel">
                                          <div class="panel-body">
                                              <div class="arrow-alt"></div>
                                              <i class=" fa fa-time"></i>
                                              <h4>12:30 AM</h4>
                                              <p>Please note which location you will consider, or both.</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>


                          <!--End 1st Audit-->
                      </section>
                      <section class="panel">
                          <header class="panel-heading summary-head">
                              <h4>Day summary</h4>
                              <p>12 August 2013</p>
                          </header>
                          <div class="panel-body">
                              <ul class="summary-list">
                                  <li>
                                      <a href="javascript:;">
                                        <i class=" fa fa-shopping-cart text-primary"></i>
                                          1 Purchase
                                      </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;">
                                          <i class="fa fa-envelope text-info"></i>
                                          15 Emails
                                      </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;">
                                          <i class="fa fa-picture-o text-muted"></i>
                                          2 Photo Upload
                                      </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;">
                                          <i class="fa fa-tags text-success"></i>
                                          19 Sales
                                      </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;">
                                          <i class="fa fa-microphone text-danger"></i>
                                          4 Audio
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </section>
                      <section class="panel">
                          <div class="panel-body profile-activity">
                              <h5 class="pull-right">11 August 2013</h5>
                              <div class="activity terques">
                                  <span>
                                      <i class="fa fa-picture-o"></i>
                                  </span>
                                  <div class="activity-desk">
                                      <div class="panel">
                                          <div class="panel-body">
                                              <div class="arrow"></div>
                                              <i class=" fa fa-time"></i>
                                              <h4>10:45 AM</h4>
                                              <p>Added new photo for the current feature product</p>
                                              <div class="album">
                                                  <a href="#">
                                                      <img src="img/pro-ac-1.png" alt="">
                                                  </a>
                                                  <a href="#">
                                                      <img src="img/pro-ac-2.png" alt="">
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="activity alt purple">
                                  <span>
                                      <i class="fa fa-rocket"></i>
                                  </span>
                                  <div class="activity-desk">
                                      <div class="panel">
                                          <div class="panel-body">
                                              <div class="arrow-alt"></div>
                                              <i class=" fa fa-time"></i>
                                              <h4>12:30 AM</h4>
                                              <p>Vocal Recording. Please note which location you will consider, or both.</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <div class="text-center">
                          <a class="btn btn-danger" href="javascript:;">Load Old Activities</a>
                      </div>
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


  </body>
</html>
