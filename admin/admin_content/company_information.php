<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');


//$featurename =mysqli_real_escape_string($_POST['featurename']);
//$featurdescription = mysql_real_escape_string($_POST['featurdescription']);


if(isset($_POST['saveButton']))
{
    $msg = $adm->addCompanyInfo();
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
                                  <h2>Create/Update Company</h2>

                              </div>
                              <div class="col-lg-8 col-sm-8">
                                  <ol class="breadcrumb pull-right">
                                      <li><a href="index.php">Home</a></li>
                                      <!--<li><a href="show_update_permission.php">Show Permissions</a></li>-->
                                      <li class="active">Create/Update Company</li>
                                  </ol>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Company Creation/Update Form
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">


                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">
                                  <!--The current balance is &#8358;'.number_format($current_balance, 2)-->
                                    <!--value="<?php //echo isset($_POST['client_name']) ? $_POST['client_name'] : ''; ?>"-->
                                  <div class="form-group ">
                                          <label for="coyName" class="control-label col-lg-2">Company Name</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="coyName" name="coyName" type="text" />
                                         </div>
                                  </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Company Address</label>
                                          <div class="col-lg-6">
                                              <textarea name="coyAddress" id="coyAddress" class="form-control" cols="6" rows="5"  style="text-align: left">

                                              </textarea>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="client_phone" class="control-label col-lg-2">Company Phone</label>
                                          <div class="col-lg-6">
                                              <input class="numbaOnly form-control" id="coyPhone" name="coyPhone" type="text"/>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="coyEmail" class="control-label col-lg-2">Company Email</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="coyEmail" name="coyEmail" type="text"

                                                  />
                                          </div>
                                      </div>



                                       <div class="form-group ">
                                          <label for="webAddress" class="control-label col-lg-2">Website Address</label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="webAddress" name="webAddress" type="text" />
                                          </div>
                                      </div>
                                     <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit" id="saveButton" name="saveButton">Save Company Information Now</button>
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
