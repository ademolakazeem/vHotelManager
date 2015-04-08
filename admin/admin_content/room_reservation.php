<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();


//$featurename =mysqli_real_escape_string($_POST['featurename']);
//$featurdescription = mysql_real_escape_string($_POST['featurdescription']);


if(isset($_POST['save']))
	{
		$msg = $adm->addRoomSetup();
	}

?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('head.php');
?>

  <body>
  <?Php

  @$room_number=$_GET['room_number']; // Use this line or below line if register_global is off
  if(strlen($room_number) > 0 and !is_numeric($room_number)){ // to check if $cat is numeric data or not.
      echo "Data Error";
      exit;
  }
  ?>

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
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Room Reservation Form
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <?php

                                  $query = "SELECT room_number, room_name FROM `room_setup_tbl` where availability='Available'";
                                  if(isset($room_number) and strlen($room_number) > 0){
                                      $queryRate="select a.room_number room_number, a.feature_id room_feature_id, a.availability availability, b.feature_id feature_feature_id, b.rate room_rate from room_setup_tbl a, room_feature_tbl b where a.room_number=$room_number and a.feature_id=b.feature_id";
                                      //SELECT * FROM subcategory where cat_id=$cat order by subcategory
                                  }
                                  else
                                      $queryRate="select a.room_number room_number, a.feature_id room_feature_id, a.availability availability, b.feature_id feature_feature_id, b.rate room_rate from room_setup_tbl a, room_feature_tbl b where a.room_number=0 and a.feature_id=b.feature_id";
                                  ?>


                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">
                                      <div class="form-group ">
                                          <label for="client_name" class="control-label col-lg-2">Client Name</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="client_name" name="client_name" type="text"
                                                     value="<?php echo isset($_POST['client_name']) ? $_POST['client_name'] : ''; ?>"
                                                  />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Client Address</label>
                                          <div class="col-lg-6">
                                              <textarea name="client_address" id="client_address" class="form-control" cols="6" rows="5">
                                                  <?php echo isset($_POST['client_address']) ? $_POST['client_address'] : ''; ?>
                                              </textarea>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="client_name" class="control-label col-lg-2">Client Phone</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="client_phone" name="client_phone" type="text"
                                                     value="<?php echo isset($_POST['client_phone']) ? $_POST['client_phone'] : ''; ?>"
                                                  />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="client_name" class="control-label col-lg-2">Client Email</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="client_email" name="client_email" type="text"
                                                     value="<?php echo isset($_POST['client_email']) ? $_POST['client_email'] : ''; ?>"
                                                  />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="client_name" class="control-label col-lg-2">Available Room Number</label>
                                          <div class="col-lg-6">
                                              <!--<input class=" form-control" id="client_room_number" name="client_room_number" type="text"
                                                     value="<?php //echo isset($_POST['client_room_number']) ? $_POST['client_room_number'] : ''; ?>"
                                                  />-->
                                              <select name="room_number" id="room_number" class="form-control m-bot15" onchange="reload(this.form)">
                                                  <option value="">--- Select Room Number ---</option>
                                                  <?php
                                                  $conn=$db->getConnection();
                                                  $result = mysqli_query($conn, $query);

                                                  while($row=mysqli_fetch_assoc($result))

                                                  {
                                                      echo "<option value='".$row['room_number']."'>".$row['room_name']."</option>";
                                                  }


                                                  ?>



                                              </select>
                                          </div>
                                      </div>
                                        <!--The current balance is &#8358;'.number_format($current_balance, 2)-->

                                      <?php
                                      $conn=$db->getConnection();
                                      $resultRate = mysqli_query($conn, $queryRate);
                                      $numRate=mysqli_fetch_assoc($resultRate);
                                      ?>





                                      <div class="form-group ">
                                          <label for="room_rate" class="control-label col-lg-2">Rate</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="room_rate" name="room_rate" type="text"
                                                     value="<?php echo $numRate['room_rate']; ?>"
                                                  />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="client_name" class="control-label col-lg-2">Number of People</label>
                                          <div class="col-lg-6">
                                              <input class="numba form-control" id="number_of_people" name="number_of_people" type="text"
                                                     value="<?php echo isset($_POST['number_of_people']) ? $_POST['number_of_people'] : ''; ?>"
                                                  />
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="control-label col-md-3">Date & Time Checked in</label>
                                          <div class="col-lg-6">
                                              <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-adv">
                                                  <input type="text" class="form-control" readonly="" id="dateTimeIn" name="dateTimeIn">
                                                  <div class="input-group-btn">
                                                      <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                      <button type="button" class="btn btn-warning date-set"><i class="fa fa-calendar"></i></button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>



                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit" name="save">Save</button>
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

  <SCRIPT language=JavaScript>
      function reload(form)
      {
          var val=form.room_number.options[form.room_number.options.selectedIndex].value;
          self.location='room_reservation.php?room_number=' + val ;
      }

  </script>

  </body>
</html>
