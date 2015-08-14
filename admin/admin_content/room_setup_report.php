<?php
require_once('authenticate.php');
require_once('../../ClassesController/format.php');
$db = new DBConnecting();
$adm = new AdminController();
$fm = new Format();
require_once('access_denied_inclusion.php');

if(isset($_POST['searchNow']))
{
    //$start_date = mysqli_real_escape_string($db->getConnection(),$_POST['start_date']);
    //$end_date = mysqli_real_escape_string($db->getConnection(),$_POST['end_date']);
    $criteria = $fm->processfield($_POST['criteria']);
    $start_date = $fm->processfield($_POST['start_date']);
    $end_date = $fm->processfield($_POST['end_date']);
    $criteria=strtolower($criteria);
if(!empty($criteria) && empty($start_date) && empty($end_date)){
    //!empty($criteria)
    $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and
    (a.room_number='$criteria' || lower(a.room_name) like '%$criteria%' || a.availability='$criteria')";

}//end if only criteria was selected

    elseif(empty($criteria) && !empty($start_date) && empty($end_date)){

    $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and a.created_date='$start_date'";

    }//only startdate was selected
  elseif(empty($criteria) && empty($start_date) && !empty($end_date)){

    $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and a.created_date='$end_date'";

  }//only enddate was selected

    elseif(!empty($criteria) && !empty($start_date) && empty($end_date)){
    $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and
    (a.room_number='$criteria' || lower(a.room_name) like '%$criteria%' || a.availability='$criteria') and a.created_date='$start_date'";

     }//both startdate and criteria were selected

    elseif(!empty($criteria) && empty($start_date) && !empty($end_date))
    {
        $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and
    (a.room_number='$criteria' || lower(a.room_name) like '%$criteria%' || a.availability='$criteria') and a.created_date='$end_date'";
    }//both criteria and enddate
    elseif(empty($criteria) && !empty($start_date) && !empty($end_date))
    {
    $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and (a.created_date BETWEEN '$start_date' and '$end_date')";
    //and (a.room_number='$criteria' || lower(a.room_name) like '%$criteria%' || a.availability='$criteria')
    }//both startdate and enddate

    elseif(!empty($criteria) && !empty($start_date) && !empty($end_date))
    {
        $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and (a.created_date BETWEEN '$start_date' and '$end_date')
        and (a.room_number='$criteria' || lower(a.room_name) like '%$criteria%' || a.availability='$criteria')";
    }//all criteria, startdate and enddate





    elseif(empty($criteria) && empty($start_date) && empty($end_date))
    {
    $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id";
    }//if no info is specified, but the button is clicked.
    else
    {
        $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=0";
    }//anything else.



}//end searchNow
else
    $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=0";



//Start for company
$queryCoy="SELECT * FROM company_info_tbl";
$resCoy=$db->fetchArrayData($queryCoy);
$coyId=$resCoy['coy_id'];
$coyName=$resCoy['coy_name'];
$coyAddress=$resCoy['coy_address'];
$coyPhone=$resCoy['coy_phone'];
$coEmail=$resCoy['coy_email'];
$webAddress=$resCoy['web_address'];
$coyImage=$resCoy['coy_image'];
//End for company
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
              <!-- invoice start-->
              <!--breadcrumbs start-->
              <div class="breadcrumbs" id="dvPrint">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-4 col-sm-4">
                              <h2>Room Setup Report</h2>
                          </div>
                          <div class="col-lg-8 col-sm-8">
                              <ol class="breadcrumb pull-right">
                                  <li><a href="index.php">Home</a></li>
                                  <li><a href="show_room_setup_report.php">Show Rm Setup Rpt</a></li>
                                  <li class="active">Rm Setup Rpt</li>
                              </ol>
                          </div>
                      </div>
                  </div>
              </div>
              <!--breadcrumbs end-->
              <section>
                  <div class="panel panel-primary">

                      <!--<div class="panel-heading navyblue"> INVOICE</div>-->
                      <div class="panel-body">
                          <div class="row invoice-list">
                              <div class="text-center corporate-id">
                                  <H2>ROOM SETUP REPORT</H2>
                                  <!--<img src="img/vector-lab.jpg" alt="">
                                  <img src="<?php //echo !empty($coyImage) ? $coyImage : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="" />
                              --></div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>OFFICE ADDRESS</h4>
                                  <p>
                                      <?php echo $coyName; ?><br>
                                      <?php echo $coyAddress; ?><br>
                                      <?php echo $coyPhone; ?><br>
                                      <?php echo $webAddress; ?><br>

                                  </p>
                              </div>
                              <div class="col-lg-4 col-sm-4">



                                  &nbsp;
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                      <div class="text-center corporate-id">

                                          <!--<img src="img/vector-lab.jpg" alt="">-->
                                          <img src="<?php echo !empty($coyImage) ? $coyImage : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="" width="100px" height="80px" />
                                      </div>

                              </div>
                          </div>

                          <table id="dataTable" class="table table-striped table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Room Number</th>
                                  <th class="hidden-phone">Room Name</th>
                                  <th>Feature Name</th>
                                  <th>Availability</th>

                                  <th class="">Created Date</th>
                                  <th class="">Creator</th>


                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=1;
                              $res=mysqli_query($db->getConnection(), $queryRM) or die(mysql_error());

                              if($db->getNumOfRows($queryRM) > 0)
                              {

                              while($rsRSetUp =mysqli_fetch_array($res, MYSQLI_ASSOC))
                              {
                              ?>
                              <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $rsRSetUp['room_number']; ?></td>
                                  <td class="hidden-phone"><?php echo $rsRSetUp['room_name']; ?></td>
                                  <td><?php echo $rsRSetUp['feature_name']; ?></td>
                                  <td><?php echo $rsRSetUp['availability']; ?></td>
                                  <td><?php echo $rsRSetUp['created_date']; ?></td>
                                  <td class=""><?php echo $rsRSetUp['maker']; ?></td>


                              </tr>
                                  <?php
                                  $i++;
                              }//end while
                              }//end if
                              else
                                  //if($db->getNumOfRows($queryRM) <= 0)
                              {
                                  ?>

                                  <tr><td colspan="7" align="center">
                                          <div class="alert alert-info fade in">
                                              <button data-dismiss="alert" class="close close-sm" type="button">
                                                  <i class="fa fa-times"></i>
                                              </button>
                                              <strong>Sorry!</strong> There is no data in the search!
                                          </div>
                                      </td>
                                  </tr>
                              <?php
                              }
                              ?>


                              </tbody>
                          </table>
                          <!--<div class="row">
                              <div class="col-lg-4 invoice-block pull-right">
                                  <ul class="unstyled amounts">
                                      <li><strong>Total Unit Price </strong> :<?php //echo "&#8358; ".number_format($resSummAll['sum_rate'], 2); ?></li>
                                      <li><strong>Sub - Total amount Paid :</strong> <?php //echo "&#8358; ".number_format($resSummAll['sum_discount'], 2);?></li>
                                     <li><strong>Grand Total amount Paid :</strong> <?php //echo "&#8358; ".number_format($resSummAll['sum_paid'], 2);?></li>

                                      <li><strong>VAT :</strong> -----</li>
                                      <li><strong>Grand Total :</strong> $6138</li>
                                  </ul>
                              </div>-->
                          </div>
                          <?php require_once("printing.php");?>
                       </div>
                   </div>
               </section>
               <!-- invoice end-->
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
    <script src="js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>



  <style type="text/css">
      @media print {

          button#btnPrint {

              display: none;

          }
          button#btnSub {

              display: none;

          }
          div#dvPrint {

              display: none;

          }


      }

  </style>
  <!--New for Export PDF, Excel-->
  <!--Jquery Plugin-->
  <script type="text/javascript" src="../../ClassesController/htmltable_export/tableExport.js"></script>
      <script type="text/javascript" src="../../ClassesController/htmltable_export/jquery.base64.js"></script>
  <!--PNG Export-->
  <script type="text/javascript" src= "../../ClassesController/htmltable_export/html2canvas.js"></script>

  <!--PDF Export-->

  <script type="text/javascript" src= "../../ClassesController/htmltable_export/jspdf/libs/sprintf.js"></script>
      <script type="text/javascript" src= "../../ClassesController/htmltable_export/jspdf/jspdf.js"></script>
      <script type="text/javascript" src= "../../ClassesController/htmltable_export/jspdf/libs/base64.js"></script>

  <!--End New for Export, PDF Excel-->


  </body>
</html>
