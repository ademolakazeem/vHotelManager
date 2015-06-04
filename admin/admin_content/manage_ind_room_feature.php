<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

$accfea_id = $_GET['accfea_id'];
//@$item_id=$_GET['item_id'];

 //= "SELECT * FROM hall_reservation_tbl WHERE hall_reservation_id ";
$selQry="SELECT * FROM room_feature_tbl where feature_id = '$accfea_id'";
$rsEditAccFea = $db->fetchArrayData($selQry);


if(isset($_POST['update']))
{
    $msg = $adm->updateAccFeat();
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
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             View Accommodation Feature Information
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>

                                <div class="form">


                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">
                                      <input name="feature_id" type="hidden" id="feature_id" value="<?php echo $accfea_id; ?>">

                                      <!--The current balance is &#8358;'.number_format($current_balance, 2)-->
                                      <div class="form-group ">
                                          <label for="feature_name" class="control-label col-lg-2">Feature Name</label>
                                          <div class="col-lg-6">
                                              <?php echo $rsEditAccFea['feature_name'];?>

                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="feature_name" class="control-label col-lg-2">Feature Description</label>
                                          <div class="col-lg-6">
                                              <?php echo $rsEditAccFea['full_description'];?>


                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="item_rate" class="control-label col-lg-2">Rate (<em>&#8358;</em>)</label>
                                          <div class="col-lg-6">

                                                  <?php
                                                  //$delimiter=',';
                                                  $dispRate=str_replace(',', '', $rsEditAccFea['rate']);
                                                  ?>
                                                     <?php echo number_format(floatval($dispRate),2);?>

                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="item_rate" class="control-label col-lg-2">Discount (<em>&#8358;</em>)</label>
                                          <div class="col-lg-6">


                                                     <?php

                                                     $dispDiscount=str_replace(',', '', $rsEditAccFea['discount']);
                                                     //$discount=str_replace($delimiter, '', $discount);
                                                     ?>
                                                     <?php echo number_format(floatval($dispDiscount),2);?>

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
          var val=form.item_id.options[form.item_id.options.selectedIndex].value;
          var iitmVal=document.getElementById('iitm_id').value;
          self.location='manage_bar.php?itm_id='+iitmVal+ '&item_id=' + val ;
      }

  </script>

  <script>
      $('input.rate').keyup(function(event) {

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
