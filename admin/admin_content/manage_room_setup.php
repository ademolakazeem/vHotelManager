<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

require_once('access_denied_inclusion.php');
$room_id = $_GET['room_id'];

$selQry = "SELECT * FROM room_setup_tbl WHERE room_id = '$room_id'";
$rsEditRmStUp = $db->fetchArrayData($selQry);
$getFeatId=$rsEditRmStUp['feature_id'];
$queryFeat = "SELECT * FROM `room_feature_tbl` where feature_id=$getFeatId";
$rsFeat = $db->fetchArrayData($queryFeat);

if(isset($_POST['update']))
{
    $msg = $adm->updateRoomSetup();
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
                                  <h1>Manage Room Setup</h1>
                              </div>
                              <div class="col-lg-8 col-sm-8">
                                  <ol class="breadcrumb pull-right">
                                      <li><a href="index.php">Home</a></li>
                                      <li><a href="show_update_room_info.php">Show Room Setup</a></li>
                                      <li class="active">Manage Room Setup</li>
                                  </ol>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Edit Room Setup Information
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">

                                  <input name="room_id" type="hidden" id="room_id" value="<?php echo $room_id ?>">
                                  <div class="form-group">
                                      <label for="room_number" class="control-label col-lg-2">Room Number</label>
                                      <div class="col-lg-6">

                                          <input class="numbaOnly form-control" id="roomNumber" name="roomNumber" type="text" value="<?php echo $rsEditRmStUp['room_number']; ?>" />
                                      </div>
                                  </div>
                                  <!--The current balance is &#8358;'.number_format($current_balance, 2)-->

                                  <div class="form-group ">
                                      <label for="roomName" class="control-label col-lg-2">Room Name</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control" id="roomName" name="roomName" type="text" value="<?php echo $rsEditRmStUp['room_name']; ?>"/>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Feature Name</label>
                                      <div class="col-lg-6">



                                          <select name="featureId" id="featureId" class="form-control m-bot15">
                                              <option value="<?php echo $rsFeat['feature_id']; ?>"><?php echo $rsFeat['feature_name']; ?></option>

                                              <?php

                                              $query = "SELECT * FROM `room_feature_tbl`";
                                              $conn=$db->getConnection();
                                              //$this->db->getConnection();
                                              $result = mysqli_query($conn, $query);
                                              //, MYSQL_ASSOC
                                              //_fetch_array($result,MYSQL_BOTH))
                                              while($row=mysqli_fetch_assoc($result))

                                              {
                                                  echo "<option value='".$row['feature_id']."'>".$row['feature_name']."</option>";
                                              }

                                              ?>



                                          </select>








                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Availability</label>
                                      <div class="col-lg-6">



                                          <select class="form-control m-bot15" id="availability" name="availability">
                                              <option value="<?php echo $rsEditRmStUp['availability']; ?>"><?php echo $rsEditRmStUp['availability']; ?></option>
                                              <option>Available</option>
                                              <option>Not Available</option>
                                          </select>



                                      </div>
                                  </div>



                                   <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit" name="update">Update Now</button>
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
      $('input.numba').keyup(function(event) {

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

  <script>
      $('input.numbaOnly').keyup(function(event) {

          // skip for arrow keys
          if(event.which >= 37 && event.which <= 40) {
           alert("Numbers only please");
             return;
          }
          //.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
          $(this).val(function(index, value) {
              return value
                  .replace(/\D/g, '')
                  ;
          });

          });
  </script>

  </body>
</html>
