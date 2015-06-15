 <?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();




if(isset($_POST['save']))
{
    $msg = $adm->addHallReservation();
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('head.php');
?>

  <body>
  <?Php

  @$hall_number=$_GET['hall_number']; // Use this line or below line if register_global is off
  if(strlen($hall_number) > 0 and !is_numeric($hall_number)){ // to check if $cat is numeric data or not.
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
                              Hall Reservation Form
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <?php

                                  $query = "SELECT hall_number, hall_name FROM `hall_setup_tbl` where availability='Available'";
                                  if(isset($hall_number) and strlen($hall_number) > 0){

                                      $queryRate="select a.hall_number hall_number, a.hall_feature_id hall_feature_id, a.availability availability, b.hall_feature_id feature_feature_id, b.feature_rate hall_feature_rate, b.price_paid price_paid from hall_setup_tbl a, hall_feature_tbl b where a.hall_number=$hall_number and a.hall_feature_id=b.hall_feature_id";
                                      //SELECT * FROM subcategory where cat_id=$cat order by subcategory
                                  }
                                  else
                                      $queryRate="select a.hall_number hall_number, a.hall_feature_id hall_feature_id, a.availability availability, b.hall_feature_id feature_feature_id, b.feature_rate hall_feature_rate, b.price_paid price_paid from hall_setup_tbl a, hall_feature_tbl b where a.hall_number=0 and a.hall_feature_id=b.hall_feature_id";

                                  ?>


                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">

                                  <!--The current balance is &#8358;'.number_format($current_balance, 2)-->
                                      <div class="form-group ">
                                          <label for="hall_number" class="control-label col-lg-2">Available Hall</label>
                                          <div class="col-lg-6">

                                              <select name="hall_number" id="hall_number" class="form-control m-bot15" onchange="reload(this.form)">
                                                  <option value="">--- Select Hall ---</option>
                                                  <?php
                                                  $conn=$db->getConnection();
                                                  $result = mysqli_query($conn, $query);

                                                  while($row=mysqli_fetch_assoc($result))

                                                  {
                                                      if($row['hall_number']==@$hall_number){echo "<option selected value='$row[hall_number]'>$row[hall_name]</option>"."<BR>";}
                                                      else{echo  "<option value='$row[hall_number]'>$row[hall_name]</option>";}


                                                  }


                                                  ?>



                                              </select>
                                          </div>
                                      </div>

                                  <?php
                                  $conn=$db->getConnection();
                                  $resultRate = mysqli_query($conn, $queryRate);
                                  $numRate=mysqli_fetch_assoc($resultRate);
                                  ?>





                                  <div class="form-group ">
                                      <label for="hall_feature_rate" class="control-label col-lg-2">Rate</label>
                                      <div class="col-lg-6"><!--echo $numRate['hall_feature_rate'];-->
                                          <input class=" form-control" readonly id="hall_feature_rate" name="hall_feature_rate" type="text"
                                                 value="<?php  echo $numRate['price_paid']; ?>"
                                              />
                                      </div>
                                  </div>


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
                                              <textarea name="client_address" id="client_address" class="form-control" cols="6" rows="5"  style="text-align: left">
                                                  <?php echo isset($_POST['client_address']) ? $_POST['client_address'] : ''; ?>
                                              </textarea>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="client_phone" class="control-label col-lg-2">Client Phone</label>
                                          <div class="col-lg-6">
                                              <input class="form-control numbaOnly" id="client_phone" name="client_phone" type="text"
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

                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Purpose of use</label>
                                      <div class="col-lg-6">
                                          <textarea name="purpose" id="purpose" class="form-control" cols="6" rows="5"  style="text-align: left">
                                              <?php echo isset($_POST['purpose']) ? $_POST['purpose'] : ''; ?>
                                          </textarea>
                                      </div>
                                  </div>

                                        <div class="form-group">
                                          <label for="startDate" class="control-label col-lg-2">Start Date</label>
                                          <div class="col-lg-6">

                                              <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo date('d-m-Y') ?>"  class="input-append date dpYears">
                                                  <input type="text" readonly="" value="<?php echo isset($_POST['startDate']) ? $_POST['startDate'] : date('d-m-Y'); ?>"
                                                         size="16" class="form-control" id="startDate" name="startDate">
                                                          <span class="input-group-btn add-on">
                                                            <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                                                          </span>
                                                  <!--readonly=""-->
                                              </div>

                                          </div>
                                          </div>

                                          <div class="form-group">
                                              <label for="startTime" class="control-label col-lg-2">Start Time</label>
                                              <div class="col-lg-6">
                                                  <div class="input-group bootstrap-timepicker">
                                                      <input type="text" class="form-control timepicker-24"
                                                             value="<?php echo isset($_POST['startTime']) ? $_POST['startTime'] : '07:00:00'; ?>"
                                                             size="16" class="form-control" id="startTime" name="startTime"
                                                          >
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                                </span>
                                                  </div>
                                              </div>
                                          </div>

                                  <div class="form-group ">
                                      <label for="number_of_days" class="control-label col-lg-2">Number of Days</label>
                                      <div class="col-lg-6">

                                          <select name="number_of_days" id="number_of_days" name="number_of_days" class="form-control m-bot15"">
                                          <option value="<?php echo isset($_POST['number_of_days']) ? $_POST['number_of_days'] : ''; ?>"><?php echo isset($_POST['number_of_days']) ? $_POST['number_of_days'] : '--- Select number of days ---'; ?></option>
                                          <?php
                                          $numCount=1;

                                          while($numCount< 31)

                                          {

                                              if($numCount==1)
                                              {
                                                  echo "<option value='".$numCount."'>".$numCount." Day</option>";
                                              }
                                              elseif($numCount > 1)
                                              {
                                                  echo "<option value='".$numCount."'>".$numCount." Days</option>";
                                              }
                                              $numCount+=1;
                                          }


                                          ?>



                                          </select>
                                      </div>
                                  </div>


                                  <div class="form-group ">
                                      <label for="endDate" class="control-label col-lg-2">End Date</label>
                                      <div class="col-lg-6">
                                          <input class="form-control" id="endDate" name="endDate" type="text" readonly=""
                                                 value="<?php echo isset($_POST['endDate']) ? $_POST['endDate'] : ''; ?>"
                                              />
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="endTime" class="control-label col-lg-2">End Time</label>
                                      <div class="col-lg-6">
                                          <div class="input-group bootstrap-timepicker">
                                              <input type="text" class="form-control timepicker-24"
                                                     value="<?php echo isset($_POST['endTime']) ? $_POST['endTime'] : '07:00:00'; ?>"
                                                     size="16" class="form-control" id="endTime" name="endTime"
                                                  >
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                                </span>
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

  <SCRIPT language=JavaScript>
      function reload(form)
      {
          var val=form.hall_number.options[form.hall_number.options.selectedIndex].value;
          self.location='hall_reservation.php?hall_number=' + val ;
      }

  </script>



<script>
    ;(function($, window, document, undefined){
        $("#number_of_days").on("change", function(){
           var dateInput = $("#startDate").val();


            var dateParts = dateInput.split(/(\d{1,2})\-(\d{1,2})\-(\d{4})/);
            var reArrange = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[3];


                var date = new Date(reArrange),
                days = parseInt($("#number_of_days").val(), 10);

            if(!isNaN(date.getTime())){
                date.setDate(date.getDate() + days);

                $("#endDate").val(date.toInputFormat());
            } else {
                alert("Invalid Date");
            }
        });


        //From: http://stackoverflow.com/questions/3066586/get-string-in-yyyymmdd-format-from-js-date-object
        Date.prototype.toInputFormat = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
            var dd  = this.getDate().toString();
            return (dd[1]?dd:"0"+dd[0]) + "-" +  (mm[1]?mm:"0"+mm[0]) + "-"  + yyyy;

            //return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
        };
    })(jQuery, this, document);
</script>

  </body>
</html>
