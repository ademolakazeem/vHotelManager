<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');
$clt_id = $_GET['clt_id'];

$selQry = "SELECT * FROM room_reservation_tbl WHERE room_reservation_id = '$clt_id'";
$rsEditRm = $db->fetchArrayData($selQry);


if(isset($_POST['update']))
{
    $msg = $adm->updateRoomReservation();
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

                  <!--breadcrumbs start-->
                  <div class="breadcrumbs">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-4 col-sm-4">
                                  <h2>View Room Reservations</h2>

                              </div>
                              <div class="col-lg-8 col-sm-8">
                                  <ol class="breadcrumb pull-right">
                                      <li><a href="index.php">Home</a></li>
                                      <li><a href="view_update_reservation.php">Show Room Reservations</a></li>
                                      <li class="active">View Room Reservations</li>
                                  </ol>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             View Room Reservation
                          </header>
                          <div class="panel-body">

                              <div class="form">

                                 <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">

                                  <input name="client_id" type="hidden" id="client_id" value="<?php echo $clt_id ?>">
                                  <div class="form-group">
                                      <label for="room_number" class="control-label col-lg-2">Available Room Number</label>
                                      <div class="col-lg-6">
                                          <?php echo $rsEditRm['room_number']; ?>
                                      </div>
                                  </div>
                                  <!--The current balance is &#8358;'.number_format($current_balance, 2)-->
                                    <div class="form-group ">
                                      <label for="room_rate" class="control-label col-lg-2">Rate</label>
                                      <div class="col-lg-6">
                                          <?php echo $rsEditRm['rate']; ?>

                                      </div>
                                  </div>


                                  <div class="form-group ">
                                          <label for="client_name" class="control-label col-lg-2">Client Name</label>
                                          <div class="col-lg-6">
                                              <?php echo $rsEditRm['client_name']; ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Client Address</label>
                                          <div class="col-lg-6">

                                                  <?php echo $rsEditRm['client_address']; ?>

                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="client_phone" class="control-label col-lg-2">Client Phone</label>
                                          <div class="col-lg-6"><?php echo $rsEditRm['client_phone']; ?>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="client_name" class="control-label col-lg-2">Client Email</label>
                                          <div class="col-lg-6">
                                              <?php echo $rsEditRm['client_email'];  ?>
                                          </div>
                                      </div>



                                       <div class="form-group ">
                                          <label for="number_of_people" class="control-label col-lg-2">Number of People</label>
                                          <div class="col-lg-6">
                                                     <?php echo $rsEditRm['number_of_people']; ?>
                                          </div>
                                      </div>


                                      <div class="form-group ">
                                          <label for="dateIn" class="control-label col-lg-2">Date Checked in</label>
                                          <div class="col-lg-6">

                                              <?php echo $rsEditRm['date_in']; ?>
                                              </div>

                                      </div>


                                          <div class="form-group">
                                              <label for="timeIn" class="control-label col-lg-2">Time Checked in</label>
                                              <div class="col-lg-6">
                                                  <?php echo $rsEditRm['date_in']; ?>


                                              </div>
                                          </div>

                                  <div class="form-group ">
                                      <label for="number_of_nights" class="control-label col-lg-2">Number of Nights</label>
                                      <div class="col-lg-6">
                                          <?php echo $rsEditRm['number_of_days']; ?>
                                      </div>
                                  </div>


                                  <div class="form-group ">
                                      <label for="dateOut" class="control-label col-lg-2">Date Checked out</label>
                                      <div class="col-lg-6">
                                          <?php echo $rsEditRm['date_out']; ?>
                                      </div>
                                  </div>



                                      <div class="form-group ">
                                          <label for="visit_purpose" class="control-label col-lg-2">Visit Purpose</label>
                                          <div class="col-lg-6">

                                              <?php echo $rsEditRm['visit_purpose']; ?>
                                          </div>
                                      </div>





                                      <div class="form-group ">
                                          <label for="reg_number" class="control-label col-lg-2">Car Registration Number</label>
                                          <div class="col-lg-6">
                                              <?php echo $rsEditRm['car_reg_number']; ?>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="model" class="control-label col-lg-2">Car Model</label>
                                          <div class="col-lg-6">
                                              <?php echo $rsEditRm['car_model']; ?>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="color" class="control-label col-lg-2">Car color</label>
                                          <div class="col-lg-6">
                                              <?php echo $rsEditRm['car_color'];?>
                                          </div>
                                      </div>



                                    <!--
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">

                                          </div>
                                      </div>-->
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
          var val=form.room_number.options[form.room_number.options.selectedIndex].value;
          var clientVal=document.getElementById('client_id').value;
          //var clientVal=form.getDocumentById.client_id.value;



          self.location='manage_room_reservation.php?clt_id='+clientVal+ '&room_number=' + val ;
      }

  </script>



<script>
    ;(function($, window, document, undefined){
        $("#number_of_nights").on("change", function(){
           var dateInput = $("#dateIn").val();


            var dateParts = dateInput.split(/(\d{1,2})\-(\d{1,2})\-(\d{4})/);
            var reArrange = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[3];


                var date = new Date(reArrange),
                days = parseInt($("#number_of_nights").val(), 10);

            if(!isNaN(date.getTime())){
                date.setDate(date.getDate() + days);

                $("#dateOut").val(date.toInputFormat());
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
