<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');

$queryFeat="SELECT * FROM hall_feature_tbl";

$querySum="SELECT sum(price_paid)sum_paid, sum(feature_rate) sum_rate, sum(discount) sum_discount FROM hall_feature_tbl";
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
                                  <H2>HALL FEATURE REPORT</H2>
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
                                  <th>Feature Name</th>
                                  <th class="hidden-phone">Feature Description</th>
                                  <th class="">Created Date</th>
                                  <th class="">Creator</th>
                                  <th>Unit Price</th>
                                  <th>Discount</th>
                                  <th>Price Paid</th>

                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=1;
                              $res=mysqli_query($db->getConnection(), $queryFeat) or die(mysql_error());
                              while($rsFeat =mysqli_fetch_array($res, MYSQLI_ASSOC))
                              {
                              ?>
                              <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $rsFeat['feature_name']; ?></td>
                                  <td class="hidden-phone"><?php echo $rsFeat['feature_description']; ?></td>
                                  <td><?php echo $rsFeat['created_date']; ?></td>
                                  <td class=""><?php echo $rsFeat['created_by']; ?></td>
                                  <td><?php echo number_format($rsFeat['feature_rate'],2); ?></td>
                                  <td class=""><?php echo number_format($rsFeat['discount'],2); ?></td>
                                  <td><?php echo number_format($rsFeat['price_paid'],2); ?></td>

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
                                      <li><strong>Total Unit Price </strong> :<?php echo "&#8358; ".number_format($resSummAll['sum_rate'], 2); ?></li>
                                      <li><strong>Sub - Total amount Paid :</strong> <?php echo "&#8358; ".number_format($resSummAll['sum_discount'], 2);?></li>
                                     <li><strong>Grand Total amount Paid :</strong> <?php echo "&#8358; ".number_format($resSummAll['sum_paid'], 2);?></li>

                                      <!--<li><strong>VAT :</strong> -----</li>
                                      <li><strong>Grand Total :</strong> $6138</li>-->
                                  </ul>
                              </div>
                          </div>
                          <div class="text-center invoice-btn">

                              <!--I Want to add  a new test-->

                              <div class="btn-group">
                                  <button id="btnSub" class="btn btn-info btn-lg btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                                  <ul class="dropdown-menu " role="menu">

                                      <li><a href="#" onClick ="$('#dataTable').tableExport({type:'excel',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/xls.png' width='24px'> XLS</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#" onClick ="$('#dataTable').tableExport({type:'doc',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/word.png'  width='24px'> Word</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#" onClick ="$('#dataTable').tableExport({type:'txt',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/txt.png' width='24px'> TXT</a></li>
                                      <!-- <li><a href="#" onClick ="$('#dataTable').tableExport({type:'pdf',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/pdf.png' width='24px'> PDF</a></li>
                                      <li><a href="#" onClick ="$('#dataTable').tableExport({type:'csv',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/csv.png' width='24px'> CSV</a></li>-->


                                      <!--customers-->


                                  </ul>
                              </div>







                              <!--End Wanting to add new Test-->

                              <!-- <a class="btn btn-info btn-lg"  onclick="javascript:window.print();"><i class="fa fa-print"></i> Print or Export to PDF</a>
                               <a class="btn btn-danger btn-lg" id="btnSub"><i class="fa fa-check"></i> Submit Invoice </a>-->
                               <button class="btn btn-info btn-lg" onclick="javascript:window.print();" type="submit" id="btnPrint"><i class="fa fa-print"></i> Print or Export to PDF</button>

                           </div>
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
