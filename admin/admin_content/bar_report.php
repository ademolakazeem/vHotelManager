<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

$queryBar="SELECT a.*, b.item_name FROM bar_tbl a, bar_setup_tbl b where a.item_id=b.item_id";

$querySum="SELECT sum(quantity_sold) sum_quantity, sum(rate)sum_rate, sum(total) sum_total FROM bar_tbl";
$resSummAll=$db->fetchArrayData($querySum);

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
                                  <H2>BAR REPORT</H2>
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
                                  <th>Item Name</th>

                                  <th class="">Attendant</th>
                                  <th class="">Date Sold</th>
                                  <th class="hidden-phone">Quantity Sold</th>
                                 <th>Unit Price</th>
                                  <th>Price Paid</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=1;


                              $res=mysqli_query($db->getConnection(), $queryBar) or die(mysql_error());
                              while($rsBar =mysqli_fetch_array($res, MYSQLI_ASSOC))
                              {

                              ?>
                              <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $rsBar['item_name']; ?></td>
                                  <td class=""><?php echo $rsBar['attended_to_by']; ?></td>
                                  <td class=""><?php echo $rsBar['date_created']; ?></td>
                                  <td class="hidden-phone"><?php echo $rsBar['quantity_sold']; ?></td>
                                  <td><?php echo number_format($rsBar['rate'],2); ?></td>
                                  <td><?php echo number_format($rsBar['total'],2); ?></td>

                              </tr>
                                  <?php
                                  $i++;
                              }
                              ?>

                              </tbody>
                          </table>
                          <div class="row">
                              <div class="col-lg-4 invoice-block pull-right">
                                  <ul class="unstyled amounts">
                                      <li><strong>Total Quantity Sold </strong>:<?php echo $resSummAll['sum_quantity']; ?></li>
                                      <li><strong>Total Unit Price </strong><em> (Rate - Discount)</em> :<?php echo "&#8358; ".number_format($resSummAll['sum_rate'], 2); ?></li>
                                      <li><strong>Grand Total amount Paid :</strong> <?php echo "&#8358; ".number_format($resSummAll['sum_total'], 2);?></li>

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
