<?php
require_once('authenticate.php');
$db = new DBConnecting();
$qry = "SELECT count(*) user_count FROM users_tbl";
$rsCount = $db->fetchData($qry);
//room reservation
$qryAccEarning = "SELECT sum(CAST(price_paid as DECIMAL(12,2))) totalReservationEarnings FROM room_reservation_tbl";
$rsSumAccEarning = $db->fetchData($qryAccEarning);
//hall reservation
$qryHallEarning = "SELECT sum(CAST(price_paid as DECIMAL(12,2))) totalHallResEarnings FROM hall_reservation_tbl";
$rsSumHallEarning = $db->fetchArrayData($qryHallEarning);
//bar items
$qryBarEarning = "SELECT sum(CAST(total as DECIMAL(12,2))) totalBarEarnings FROM bar_tbl";
$rsSumBarEarning = $db->fetchArrayData($qryBarEarning);




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

  <section id="container" >
      <!--header start-->
<?php
    require_once('header.php');
?>
      <!--header end-->
      <!--sidebar start-->
      <?php
      include_once('aside.php');
      ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                <!--  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">

                                  0
                              </h1>
                              <?php
                              //$countUsers= $rsCount['user_count'];
                              //$countUsers= 100;
                              ?>
                              <p>New Users</p>
                          </div>
                      </section>
                  </div>-->
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">

                                  0
                              </h1>
                              <?php
                              $sumAccEarning= $rsSumAccEarning['totalReservationEarnings'];
                              //echo $sumAccEarning;
                              //$countUsers= 100;
                              ?>
                              <p>Accommodation Earnings</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <?php
                              $sumHallEarning= $rsSumHallEarning['totalHallResEarnings'];
                              //echo $sumHallEarning;
                              ?>
                              <h1 class="count2">
                                  0
                              </h1>
                              <p>Hall Earnings</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <?php
                              $sumBarEarning = $rsSumBarEarning['totalBarEarnings'];
                              //echo $sumBarEarning;
                              ?>

                              <h1 class=" count3">
                                  0
                              </h1>
                              <p>Bar Earnings</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <?php
                              $totalEarning=floatval($sumAccEarning)+floatval($sumHallEarning)+floatval($sumBarEarning);
                              ?>
                              <h1 class=" count4">
                                  0
                              </h1>
                              <p>Total Earnings</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-8">
                      <!--custom chart start-->
                      <div class="border-head">
                           <h3>Earning Graph</h3>
                       </div>
                       <div class="custom-bar-chart">
                           <ul class="y-axis">
                               <li><span>100</span></li>
                               <li><span>80</span></li>
                               <li><span>60</span></li>
                               <li><span>40</span></li>
                               <li><span>20</span></li>
                               <li><span>0</span></li>
                           </ul>
                           <?php
                            $accPercent = floatval($sumAccEarning)/floatval($totalEarning)*100;
                           $hallPercent = floatval($sumHallEarning)/floatval($totalEarning)*100;
                           $barPercent = floatval($sumBarEarning)/floatval($totalEarning)*100;


                           ?>
                           <div class="bar">
                               <div class="title">ACC</div>

                               <div class="value tooltips" data-original-title="<?php echo round($accPercent).'%'; ?>" data-toggle="tooltip" data-placement="top"><?php echo round($accPercent).'%'; ?></div>
                           </div>
                           <div class="bar ">
                               <div class="title">HALL</div>
                               <div class="value tooltips" data-original-title="<?php echo round($hallPercent).'%'; ?>" data-toggle="tooltip" data-placement="top"><?php echo round($hallPercent).'%'; ?></div>
                           </div>
                           <div class="bar ">
                               <div class="title">BAR</div>
                               <div class="value tooltips" data-original-title="<?php echo round($barPercent).'%'; ?>" data-toggle="tooltip" data-placement="top"><?php echo round($barPercent).'%'; ?></div>
                           </div>

                       </div>
                       <!--custom chart end-->

                      <!--custom chart start-->
                      <!-- <div class="border-head">
                           <h3>Earning Graph</h3>
                       </div>
                       <div class="custom-bar-chart">
                           <ul class="y-axis">
                               <li><span>100</span></li>
                               <li><span>80</span></li>
                               <li><span>60</span></li>
                               <li><span>40</span></li>
                               <li><span>20</span></li>
                               <li><span>0</span></li>
                           </ul>
                           <div class="bar">
                               <div class="title">JAN</div>
                               <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
                           </div>
                           <div class="bar ">
                               <div class="title">FEB</div>
                               <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                           </div>
                           <div class="bar ">
                               <div class="title">MAR</div>
                               <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                           </div>
                           <div class="bar ">
                               <div class="title">APR</div>
                               <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
                           </div>
                           <div class="bar">
                               <div class="title">MAY</div>
                               <div class="value tooltips" data-original-title="20%" data-toggle="tooltip" data-placement="top">20%</div>
                           </div>
                           <div class="bar ">
                               <div class="title">JUN</div>
                               <div class="value tooltips" data-original-title="39%" data-toggle="tooltip" data-placement="top">39%</div>
                           </div>
                           <div class="bar">
                               <div class="title">JUL</div>
                               <div class="value tooltips" data-original-title="75%" data-toggle="tooltip" data-placement="top">75%</div>
                           </div>
                           <div class="bar ">
                               <div class="title">AUG</div>
                               <div class="value tooltips" data-original-title="45%" data-toggle="tooltip" data-placement="top">45%</div>
                           </div>
                           <div class="bar ">
                               <div class="title">SEP</div>
                               <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                           </div>
                           <div class="bar ">
                               <div class="title">OCT</div>
                               <div class="value tooltips" data-original-title="42%" data-toggle="tooltip" data-placement="top">42%</div>
                           </div>
                           <div class="bar ">
                               <div class="title">NOV</div>
                               <div class="value tooltips" data-original-title="60%" data-toggle="tooltip" data-placement="top">60%</div>
                           </div>
                           <div class="bar ">
                               <div class="title">DEC</div>
                               <div class="value tooltips" data-original-title="90%" data-toggle="tooltip" data-placement="top">90%</div>
                           </div>
                       </div>
                       custom chart end-->
                  </div>
                  <div class="col-lg-4">
                      <!--new earning start-->
                      <div class="panel terques-chart">
                          <div class="panel-body chart-texture">
                              <div class="chart">
                                  <div class="heading">
                                      <span>Friday</span>
                                      <strong>$ 57,00 | 15%</strong>
                                  </div>
                                  <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                              </div>
                          </div>
                          <div class="chart-tittle">
                              <span class="title">New Earning</span>
                              <span class="value">
                                  <a href="#" class="active">Market</a>
                                  |
                                  <a href="#">Referal</a>
                                  |
                                  <a href="#">Online</a>
                              </span>
                          </div>
                      </div>
                      <!--new earning end-->

                      <!--total earning start-->
                      <div class="panel green-chart">
                          <div class="panel-body">
                              <div class="chart">
                                  <div class="heading">
                                      <span>June</span>
                                      <strong>23 Days | 65%</strong>
                                  </div>
                                  <div id="barchart"></div>
                              </div>
                          </div>
                          <div class="chart-tittle">
                              <span class="title">Total Earning</span>
                              <span class="value">$, 76,54,678</span>
                          </div>
                      </div>
                      <!--total earning end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-4">
                      <!--user info table start-->
                      <section class="panel">
                          <div class="panel-body">
                              <a href="#" class="task-thumb">
                                  <img src="<?php echo $rs['imagepath']; ?>" height="90" width="83" alt="">
                              </a>
                              <div class="task-thumb-details">
                                  <h1><a href="#"><?php if($_SESSION['userfullname']) echo $_SESSION['userfullname']; ?></a></h1>
                                  <p><?php echo $rs['role']; ?></p>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                                <tr>
                                    <td>
                                        <i class=" fa fa-tasks"></i>
                                    </td>
                                    <td>New Task Issued</td>
                                    <td> 02</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </td>
                                    <td>Task Pending</td>
                                    <td> 14</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-envelope"></i>
                                    </td>
                                    <td>Inbox</td>
                                    <td> 45</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class=" fa fa-bell-o"></i>
                                    </td>
                                    <td>New Notification</td>
                                    <td> 09</td>
                                </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--user info table end-->
                  </div>
                  <div class="col-lg-8">
                      <!--work progress start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1>Work Progress</h1>
                                  <p><?php if($_SESSION['userfullname']) echo $_SESSION['userfullname']; ?></p>
                              </div>
                              <div class="task-option">
                                  <select class="styled">
                                      <option>Anjelina Joli</option>
                                      <option>Tom Crouse</option>
                                      <option>Jhon Due</option>
                                  </select>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>
                                      Target Sell
                                  </td>
                                  <td>
                                      <span class="badge bg-important">75%</span>
                                  </td>
                                  <td>
                                    <div id="work-progress1"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>
                                      Product Delivery
                                  </td>
                                  <td>
                                      <span class="badge bg-success">43%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress2"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>
                                      Payment Collection
                                  </td>
                                  <td>
                                      <span class="badge bg-info">67%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress3"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>
                                      Work Progress
                                  </td>
                                  <td>
                                      <span class="badge bg-warning">30%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress4"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>
                                      Delivery Pending
                                  </td>
                                  <td>
                                      <span class="badge bg-primary">15%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress5"></div>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--work progress end-->
                  </div>
              </div>


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
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>


  <!-- Counts -->
  <!-- <script>var countUsers = '<?php //echo $countUsers; ?>';</script>-->
  <script>var sumAccEarning = '<?php echo $sumAccEarning; ?>';</script>
 <script>var sumHallEarning = '<?php echo $sumHallEarning; ?>';</script>
  <script>var sumBarEarning = '<?php echo $sumBarEarning; ?>';</script>
  <script>var totalEarning = '<?php echo $totalEarning; ?>';</script>
    <script src="js/count.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
