<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');
$clt_id = $_GET['clt_id'];

$selQry = "SELECT * FROM hall_reservation_tbl WHERE hall_reservation_id = '$clt_id'";
$rsEditRm = $db->fetchArrayData($selQry);



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
                              <!--breadcrumbs start-->
                              <div class="breadcrumbs">
                                  <div class="container">
                                      <div class="row">
                                          <div class="col-lg-4 col-sm-4">
                                              <h2>View Hall Reservations</h2>

                                          </div>
                                          <div class="col-lg-8 col-sm-8">
                                              <ol class="breadcrumb pull-right">
                                                  <li><a href="index.php">Home</a></li>
                                                  <li><a href="view_hall_reservation.php">Show Hall Reservations</a></li>
                                                  <li class="active">View Hall Reservations</li>
                                              </ol>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!--breadcrumbs end-->
                              <div class="col-lg-4 col-sm-4">
                                  <h2>View Hall Reservations</h2>

                              </div>
                              <div class="col-lg-8 col-sm-8">
                                  <ol class="breadcrumb pull-right">
                                      <li><a href="index.php">Home</a></li>
                                      <li><a href="show_update_hall.php">Show Reserved Halls</a></li>
                                      <li class="active">View Reserved Halls</li>
                                  </ol>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             View Hall Reservation
                          </header>
                          <div class="panel-body">
                            <?php
                            $hNo=$rsEditRm['hall_number'];
                            $qryHlNumber = "SELECT hall_number, hall_name FROM `hall_setup_tbl` where availability='Available' and hall_number=$hNo";
                            $conn=$db->getConnection();
                            //$result = mysqli_query($conn, $query);
                            $resHNumber= mysqli_query($conn, $qryHlNumber);
                            $rowHNumber=mysqli_fetch_array($resHNumber, MYSQLI_ASSOC);
                            ?>
                              <div class="form">

                                 <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">

                                  <input name="client_id" type="hidden" id="client_id" value="<?php echo $clt_id ?>">
                                  <div class="form-group">
                                      <label for="room_number" class="control-label col-lg-2">Hall Name</label>
                                      <div class="col-lg-6">
                                          <?php echo $rowHNumber['hall_name']; ?>
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
                                          <label for="purpose_of_use" class="control-label col-lg-2">Purpose of Use</label>
                                          <div class="col-lg-6">
                                                     <?php echo $rsEditRm['purpose_of_use']; ?>
                                          </div>
                                      </div>


                                      <div class="form-group">
                                          <label for="dateIn" class="control-label col-lg-2">Start Date</label>
                                          <div class="col-lg-6">

                                              <?php echo $rsEditRm['start_date']; ?>
                                              </div>

                                      </div>


                                          <div class="form-group">
                                              <label for="timeIn" class="control-label col-lg-2">Start Time</label>
                                              <div class="col-lg-6">
                                                  <?php echo $rsEditRm['startTime']; ?>


                                              </div>
                                          </div>

                                  <div class="form-group ">
                                      <label for="no_of_days" class="control-label col-lg-2">number of Days</label>
                                      <div class="col-lg-6">
                                          <?php echo $rsEditRm['no_of_days']; ?>
                                      </div>
                                  </div>


                                  <div class="form-group ">
                                      <label for="dateOut" class="control-label col-lg-2">End Date</label>
                                      <div class="col-lg-6">
                                          <?php echo $rsEditRm['end_date']; ?>
                                      </div>
                                  </div>



                                      <div class="form-group ">
                                          <label for="visit_purpose" class="control-label col-lg-2">End Time</label>
                                          <div class="col-lg-6">

                                              <?php echo $rsEditRm['end_time']; ?>
                                          </div>
                                      </div>
                                     <div class="form-group ">
                                         <label for="visit_purpose" class="control-label col-lg-2">Price Paid</label>
                                         <div class="col-lg-6">

                                             <?php echo $rsEditRm['price_paid']; ?>
                                         </div>
                                     </div>







                                      <div class="form-group ">
                                          <label for="reg_number" class="control-label col-lg-2">Attended to by</label>
                                          <div class="col-lg-6">
                                              <?php echo $rsEditRm['attended_to_by']; ?>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="model" class="control-label col-lg-2">created_date</label>
                                          <div class="col-lg-6">
                                              <?php echo $rsEditRm['created_date']; ?>
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
