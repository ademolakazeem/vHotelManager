<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();


//$featurename =mysqli_real_escape_string($_POST['featurename']);
//$featurdescription = mysql_real_escape_string($_POST['featurdescription']);


if(isset($_POST['save']))
{
    $msg = $adm->addRoomReservation();
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
                                      $queryRate="select a.room_number room_number, a.feature_id room_feature_id, a.availability availability, b.feature_id feature_feature_id, b.rate room_rate, b.price_paid price_paid from room_setup_tbl a, room_feature_tbl b where a.room_number=$room_number and a.feature_id=b.feature_id";
                                      //SELECT * FROM subcategory where cat_id=$cat order by subcategory
                                  }
                                  else
                                      $queryRate="select a.room_number room_number, a.feature_id room_feature_id, a.availability availability, b.feature_id feature_feature_id, b.rate room_rate, b.price_paid price_paid from room_setup_tbl a, room_feature_tbl b where a.room_number=0 and a.feature_id=b.feature_id";
                                  ?>


                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">
                                  <div class="form-group">
                                      <label for="room_number" class="control-label col-lg-2">Available Room Number</label>
                                      <div class="col-lg-6">
                                          <!--<input class=" form-control" id="client_room_number" name="client_room_number" type="text"
                                                     value="<?php //echo isset($_POST['client_room_number']) ? $_POST['client_room_number'] : ''; ?>"
                                                  />-->
                                          <select name="room_number" id="room_number" class="form-control m-bot15" onchange="reload(this.form)">
                                              <option value="<?php echo isset($_POST['room_number']) ? "Room ".$_POST['room_number'] : ''; ?>"><?php echo isset($_POST['room_number']) ? "Room ".$_POST['room_number'] : '--- Select Room ---'; ?></option>
                                              <?php
                                              $conn=$db->getConnection();
                                              $result = mysqli_query($conn, $query);

                                              while($row=mysqli_fetch_assoc($result))

                                              {
                                                  if($row['room_number']==@$room_number){echo "<option selected value='$row[room_number]'>$row[room_name]</option>"."<BR>";}
                                                  else{echo  "<option value='$row[room_number]'>$row[room_name]</option>";}

                                                  //echo "<option value='".$row['room_number']."'>".$row['room_name']."</option>";
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
                                      <label for="room_rate" class="control-label col-lg-2">Price Per Night</label>
                                      <div class="col-lg-6">
                                          <input class="form-control" readonly="readonly" id="room_rate" name="room_rate" type="text"
                                                 <?php
                                                 $dRate=$numRate['price_paid'];
                                                 $delimiter=',';
                                                 $dRate=str_replace($delimiter, '', $dRate);
                                                 ?>
                                                 value="<?php echo number_format(floatval($dRate),2); ?>"
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
                                              <input class="form-control" id="client_phone" name="client_phone" type="text"
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
                                          <label for="number_of_people" class="control-label col-lg-2">Number of People</label>
                                          <div class="col-lg-6">
                                              <input class="numba form-control" id="number_of_people" name="number_of_people" type="text"
                                                     value="<?php echo isset($_POST['number_of_people']) ? $_POST['number_of_people'] : ''; ?>"
                                                  />
                                          </div>
                                      </div>


                                      <div class="form-group ">
                                          <label for="dateIn" class="control-label col-lg-2">Date Checked in</label>
                                          <div class="col-lg-6">

                                              <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo date('d-m-Y') ?>"  class="input-append date dpYears">
                                                  <input type="text" readonly="" value="<?php echo isset($_POST['dateIn']) ? $_POST['dateIn'] : date('d-m-Y'); ?>"
                                                         size="16" class="form-control" id="dateIn" name="dateIn">
                                                          <span class="input-group-btn add-on">
                                                            <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                                                          </span>
                                                  <!--readonly=""-->
                                              </div>

                                          </div>
                                          </div>

                                          <div class="form-group">
                                              <label for="timeIn" class="control-label col-lg-2">Time Checked in</label>
                                              <div class="col-lg-6">
                                                  <div class="input-group bootstrap-timepicker">
                                                      <input type="text" class="form-control timepicker-24"
                                                             value="<?php echo isset($_POST['timeIn']) ? $_POST['timeIn'] : '06-12-2015'; ?>"
                                                             size="16" class="form-control" id="timeIn" name="timeIn"
                                                          >
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                                </span>
                                                  </div>
                                              </div>
                                          </div>

                                  <div class="form-group ">
                                      <label for="number_of_nights" class="control-label col-lg-2">Number of Nights</label>
                                      <div class="col-lg-6">
                                          <!--<input class=" form-control" id="client_room_number" name="client_room_number" type="text"
                                                     value="<?php //echo isset($_POST['client_room_number']) ? $_POST['client_room_number'] : ''; ?>"
                                                  />-->
                                          <select name="number_of_nights" id="number_of_nights" name="number_of_nights" class="form-control m-bot15"">
                                          <option value="<?php echo isset($_POST['number_of_nights']) ? $_POST['number_of_nights'] : ''; ?>"><?php echo isset($_POST['number_of_nights']) ? $_POST['number_of_nights'] : '--- Select number of nights ---'; ?></option>
                                          <?php
                                          $numCount=1;

                                          while($numCount< 31)

                                          {

                                              if($numCount==1)
                                              {
                                                  echo "<option value='".$numCount."'>".$numCount." Night</option>";
                                              }
                                              elseif($numCount > 1)
                                              {
                                                  echo "<option value='".$numCount."'>".$numCount." Nights</option>";
                                              }
                                              $numCount+=1;
                                          }


                                          ?>



                                          </select>
                                      </div>
                                  </div>


                                  <div class="form-group ">
                                      <label for="dateOut" class="control-label col-lg-2">Date Checked out</label>
                                      <div class="col-lg-6">
                                          <input class="form-control" id="dateOut" name="dateOut" type="text" readonly=""
                                                 value="<?php echo isset($_POST['dateOut']) ? $_POST['dateOut'] : ''; ?>"
                                              />
                                      </div>
                                  </div>

                                      <!--<div class="form-group">
                                          <label class="control-label col-lg-2">Date & Time Checked in</label>
                                          <div class="col-lg-6">
                                              <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-adv">
                                                  <input type="text" class="form-control" readonly="" id="dateTimeIn" name="dateTimeIn">
                                                  <div class="input-group-btn">
                                                      <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                      <button type="button" class="btn btn-warning date-set"><i class="fa fa-calendar"></i></button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>-->

                                      <div class="form-group ">
                                          <label for="visit_purpose" class="control-label col-lg-2">Visit Purpose</label>
                                          <div class="col-lg-6">

                                              <select name="visit_purpose" id="visit_purpose" class="form-control m-bot15"">
                                              <option value="<?php echo isset($_POST['visit_purpose']) ? $_POST['visit_purpose'] : ''; ?>"><?php echo isset($_POST['visit_purpose']) ? $_POST['visit_purpose'] : '--- Select Visit Purpose ---'; ?></option>
                                               <option value="Business">Business</option>
                                                <option value="Pleasure">Pleasure</option>
                                                <option value="Other">Other</option>
                                              </select>
                                          </div>
                                      </div>



                                  <!--      <div class="form-group">
                                          <label for="dateOut" class="control-label col-lg-2">Date Checked out</label>
                                          <div class="col-lg-6">

                                              <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2015"  class="input-append date dpYears">
                                                  <input type="text" readonly="" value="<?php //echo isset($_POST['dateOut']) ? $_POST['dateOut'] : '06-12-2015'; ?>"
                                                         size="16" class="form-control" id="dateOut" name="dateOut">
                                                          <span class="input-group-btn add-on">
                                                            <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                                                          </span>

                                              </div>

                                          </div>
                                      </div>

                                   <div class="form-group">
                                          <label for="timeIn" class="control-label col-lg-2">Time Checked out</label>
                                          <div class="col-lg-6">
                                              <div class="input-group bootstrap-timepicker">
                                                  <input type="text" class="form-control timepicker-24"
                                                         value="<?php //echo isset($_POST['timeOut']) ? $_POST['timeOut'] : '06-12-2015'; ?>"
                                                         size="16" class="form-control" id="timeOut" name="timeOut"
                                                      >
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                                </span>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="control-label col-lg-2">Date & Time Checked out</label>
                                          <div class="col-lg-6">
                                              <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-adv">
                                                  <input type="text" class="form-control" readonly="" id="dateTimeOut" name="dateTimeOut">
                                                  <div class="input-group-btn">
                                                      <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                      <button type="button" class="btn btn-warning date-set"><i class="fa fa-calendar"></i></button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>-->

                                      <div class="form-group ">
                                          <label for="reg_number" class="control-label col-lg-2">Car Registration Number</label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="reg_number" name="reg_number" type="text"
                                                     value="<?php echo isset($_POST['reg_number']) ? $_POST['reg_number'] : ''; ?>"
                                                  />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="model" class="control-label col-lg-2">Car Model</label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="model" name="model" type="text"
                                                     value="<?php echo isset($_POST['model']) ? $_POST['model'] : ''; ?>"
                                                  />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="color" class="control-label col-lg-2">Car color</label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="color" name="color" type="text"
                                                     value="<?php echo isset($_POST['color']) ? $_POST['color'] : ''; ?>"
                                                  />
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
          var val=form.room_number.options[form.room_number.options.selectedIndex].value;
          self.location='room_reservation.php?room_number=' + val ;
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
