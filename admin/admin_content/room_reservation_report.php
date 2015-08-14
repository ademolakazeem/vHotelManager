<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
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
        /* $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and
     (a.room_number='$criteria' || lower(a.room_name) like '%$criteria%' || a.availability='$criteria')";*/

        $queryRoom="SELECT * FROM room_feature_tbl where lower(feature_name) like '%($criteria)%'";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl where lower(feature_name) like '%$criteria%'";

        $queryRoom="SELECT * FROM room_reservation_tbl where lower(client_name) like '%$criteria%'";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate FROM room_reservation_tbl";

        /*$queryRoom="SELECT * FROM room_reservation_tbl";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate FROM room_reservation_tbl";*/

    }//end if only criteria was selected

    elseif(empty($criteria) && !empty($start_date) && empty($end_date)){

        //$queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and a.created_date='$start_date'";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl where DATE(created_date)='$start_date'";
        $queryRoom="SELECT * FROM room_feature_tbl where DATE(created_date)='$start_date'";



    }//only startdate was selected
    elseif(empty($criteria) && empty($start_date) && !empty($end_date)){

        //$queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and a.created_date='$end_date'";
        $queryRoom="SELECT * FROM room_feature_tbl where DATE(created_date)='$end_date'";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl where DATE(created_date)='$end_date'";

    }//only enddate was selected

    elseif(!empty($criteria) && !empty($start_date) && empty($end_date)){

        /* $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and
     (a.room_number='$criteria' || lower(a.room_name) like '%$criteria%' || a.availability='$criteria') and a.created_date='$start_date'";*/

        $queryRoom="SELECT * FROM room_feature_tbl where  lower(feature_name) like '%$criteria%' and DATE(created_date)='$start_date'";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl where lower(feature_name) like '%$criteria%' and DATE(created_date)='$start_date'";


    }//both startdate and criteria were selected

    elseif(!empty($criteria) && empty($start_date) && !empty($end_date))
    {
        /* $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and
     (a.room_number='$criteria' || lower(a.room_name) like '%$criteria%' || a.availability='$criteria') and a.DATE(created_date)='$end_date'";*/

        $queryRoom="SELECT * FROM room_feature_tbl where  lower(feature_name) like '%$criteria%' and DATE(created_date)='$end_date'";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl where lower(feature_name) like '%$criteria%' and DATE(a.created_date)='$end_date'";

    }//both criteria and enddate
    elseif(empty($criteria) && !empty($start_date) && !empty($end_date))
    {
        //$queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and (a.created_date BETWEEN '$start_date' and '$end_date')";
        $queryRoom="SELECT * FROM room_feature_tbl where created_date BETWEEN '$start_date' and '$end_date'";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl where  created_date BETWEEN '$start_date' and '$end_date'";
    }//both startdate and enddate

    elseif(!empty($criteria) && !empty($start_date) && !empty($end_date))
    {
        //$queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id and
        //(a.created_date BETWEEN '$start_date' and '$end_date')lower(feature_name) like '%$criteria%'";

        $queryRoom="SELECT * FROM room_feature_tbl where (created_date BETWEEN '$start_date' and '$end_date') and lower(feature_name) like '%$criteria%'";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl where (created_date BETWEEN '$start_date' and '$end_date') and lower(feature_name) like '%$criteria%'";

    }//all criteria, startdate and enddate
    elseif(empty($criteria) && empty($start_date) && empty($end_date))
    {
        //$queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=b.feature_id";

        $queryRoom="SELECT * FROM room_feature_tbl";
        $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl";
        //echo "all is empty!";

    }//if no info is specified, but the button is clicked.
    /* else
     {
         //$queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=0";
         $queryRoom="SELECT * FROM room_feature_tbl where feature_id=0";
         $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl where feature_id=0";
     }//anything else.*/



}//end searchNow
else
{
    // $queryRM="SELECT a.*, b.feature_name FROM room_setup_tbl a, room_feature_tbl b where a.feature_id=0";
    $queryRoom="SELECT * FROM room_feature_tbl where feature_id=0";
    $querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate, sum(discount) sum_discount FROM room_feature_tbl where feature_id=0";

}


$res=mysqli_query($db->getConnection(), $queryRoom) or die(mysql_error());
//$resSummAll=mysqli_query($db->getConnection(), $querySum) or die(mysql_error());
$resSummAll=$db->fetchData($querySum);
//echo "resSumAll rate ".$resSummAll['sum_rate'];






/*$queryRoom="SELECT * FROM room_reservation_tbl";

$querySum="SELECT sum(price_paid)sum_paid, sum(rate) sum_rate FROM room_reservation_tbl";
//$resSummAll=$db->fetchArrayData($querySum);
*/



$queryCoy="SELECT * FROM company_info_tbl";
$resCoy=$db->fetchArrayData($queryCoy);
$coyId=$resCoy['coy_id'];
$coyName=$resCoy['coy_name'];
$coyAddress=$resCoy['coy_address'];
$coyPhone=$resCoy['coy_phone'];
$coEmail=$resCoy['coy_email'];
$webAddress=$resCoy['web_address'];
$coyImage=$resCoy['coy_image'];





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
              <section>
                  <div class="panel panel-primary">
                      <!--<div class="panel-heading navyblue"> INVOICE</div>-->
                      <div class="panel-body">
                          <div class="row invoice-list">
                              <div class="text-center corporate-id">
                                  <H2>ROOM RESERVATION REPORT</H2>
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
                                          <img src="<?php echo !empty($coyImage) ? $coyImage : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="" width="120px" height="100px" />
                                      </div>

                              </div>
                          </div>

                          <table id="dataTable" class="table table-striped table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Client Name</th>
                                  <th class="hidden-phone">Client Address</th>
                                  <th class="">Client Phone</th>
                                  <th class="">Client Email</th>
                                  <th>Room Number</th>
                                  <th>Number of People</th>
                                  <th>Checkin Date</th>
                                  <th>Checkout Date</th>
                                  <!--<th>Visit Purpose</th>
                                  <th>Car Reg Number</th>
                                  <th>Car Model</th>-->
                                  <th>Number of Nights</th>
                                  <th>Unit Price</th>
                                  <th>Price Paid</th>

                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=1;


                              $res=mysqli_query($db->getConnection(), $queryRoom) or die(mysql_error());
                              while($rsRoom =mysqli_fetch_array($res, MYSQLI_ASSOC))
                              {

                              ?>
                              <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $rsRoom['client_name']; ?></td>
                                  <td class="hidden-phone"><?php echo $rsRoom['client_address']; ?></td>
                                  <td class=""><?php echo $rsRoom['client_phone']; ?></td>
                                  <td class=""><?php echo $rsRoom['client_email']; ?></td>
                                  <td><?php echo $rsRoom['room_number']; ?></td>
                                  <td><?php echo $rsRoom['number_of_people']; ?></td>
                                  <td class=""><?php echo $rsRoom['date_in']; ?></td>
                                  <td class=""><?php echo $rsRoom['date_out']; ?></td>
                                 <!-- <td><?php //echo $rsRoom['visit_purpose']; ?></td>
                                  <td><?php //echo $rsRoom['car_reg_number']; ?></td>
                                  <td><?php //echo $rsRoom['car_model']; ?></td>-->
                                  <td><?php echo $rsRoom['number_of_days']; ?></td>
                                  <td><?php echo number_format($rsRoom['rate'],2); ?></td>
                                  <td><?php echo number_format($rsRoom['price_paid'],2); ?></td>

                              </tr>
                                  <?php
                                  $i++;
                              }
                              ?>

                             <!--
                              <tr>
                                  <td>2</td>
                                  <td>Laptop</td>
                                  <td class="hidden-phone">Apple Mac book pro 15” Retina Display. 2.8 GHz Processor,8 GB Ram</td>
                                  <td class="">$1750</td>
                                  <td class="">1</td>
                                  <td>$1750</td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>Mouse</td>
                                  <td class="hidden-phone">Apple Magic Mouse</td>
                                  <td class="">$90</td>
                                  <td class="">3</td>
                                  <td>$270</td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>Personal Computer</td>
                                  <td class="hidden-phone">iMac 21 inch slim body. 1.7 GHz, 8 GB Ram</td>
                                  <td class="">$1200</td>
                                  <td class="">2</td>
                                  <td>$2400</td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>Printer</td>
                                  <td class="hidden-phone">Epson Color Jet printer </td>
                                  <td class="">$200</td>
                                  <td class="">2</td>
                                  <td>$400</td>
                              </tr>-->
                              </tbody>
                          </table>
                          <div class="row">
                              <div class="col-lg-4 invoice-block pull-right">
                                  <ul class="unstyled amounts">
                                      <li><strong>Total Unit Price </strong><em> (Rate - Discount)</em> :<?php echo "&#8358; ".number_format($resSummAll['sum_rate'], 2); ?></li>
                                      <li><strong>Grand Total amount Paid :</strong> <?php echo "&#8358; ".number_format($resSummAll['sum_paid'], 2);?></li>

                                      <!--<li><strong>VAT :</strong> -----</li>
                                      <li><strong>Grand Total :</strong> $6138</li>-->
                                  </ul>
                              </div>
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
