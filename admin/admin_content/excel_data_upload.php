<?php

//page permission id = 2, permission name =  administer contractors
//$page_permission_id = 2;
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');

$queryCoy="SELECT coy_id FROM company_info_tbl";
$resCoy=$db->fetchArrayData($queryCoy);
$coyId=$resCoy['coy_id'];

if(isset($_POST['excelUploadButton']))
{
    $msg = $adm->excelUpload($_POST['table']);
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
                                 <h2>Excel Batch Upload</h2>

                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                     <!--<li><a href="show_update_permission.php">Show Permissions</a></li>-->
                                     <li class="active">Excel Batch Upload</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Excel Batch Upload Form
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="" enctype="multipart/form-data">

                                      <?php
                                      $database_login = "vhotelmgrdb";
                                      $query="SHOW TABLES FROM $database_login";
                                      $conn=$db->getConnection();
                                      $result = mysqli_query($conn, $query);
                                      ?>
                                       <div class="form-group">
                                          <label for="table" class="control-label col-lg-2">Table for Upload</label>
                                          <div class="col-lg-6">

                                              <select name="table" id="table" class="form-control m-bot15">
                                                  <option value="<?php echo isset($_POST['table']) ? $_POST['table'] : ''; ?>"><?php echo isset($_POST['table']) ? $_POST['table'] : '--- Select Table ---'; ?></option>
                                                  <?php


                                                  while($row=mysqli_fetch_row($result))

                                                  {
                                                      $delimiter='_';
                                                      $nuTable=str_replace($delimiter, ' ', $row['0']);
                                                      if($row['0']==@$table){echo "<option selected value='$row[0]'>$nuTable</option>"."<BR>";}
                                                      else{echo  "<option value='$row[0]'>$nuTable</option>";}


                                                  }


                                                  ?>



                                              </select>

                                          </div>
                                      </div>




                                   <div class="form-group last">
                                          <label class="control-label col-lg-2">Excel Batch Upload File</label>
                                          <div class="col-md-9">
                                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                                 <!-- <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img src="<?php /*echo isset($_POST['coy_id']) ? $_SESSION['image'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; */?>" alt="" />
                                                      <!--src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                  </div>-->
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Excel File</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file" class="default" name="file" id="file" />
                                                   </span>
                                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                                              <span class="label label-danger">NOTE!</span>
                                             <span>You can only upload, .xls, .xlsx and csv
                                             </span>
                                          </div>
                                      </div>




                                      <input type="hidden" name="coy_id" id="coy_id" value="<?php echo $coyId; ?>"/>

                                         <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit" id="excelUploadButton" name="excelUploadButton">Upload Excel Now</button>
                                              <button class="btn btn-default" type="button" onclick="location.href='index.php'">Cancel</button>
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



  </body>
</html>
