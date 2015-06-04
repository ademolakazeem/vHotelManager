<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

$itm_id = $_GET['itm_id'];
@$item_id=$_GET['item_id'];

 //= "SELECT * FROM hall_reservation_tbl WHERE hall_reservation_id ";
$selQry="SELECT * FROM bar_tbl where bar_item_id = '$itm_id'";
$rsEditBar = $db->fetchArrayData($selQry);


if(isset($_POST['update']))
{
    $msg = $adm->updateBarItem();
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
                             Edit Bar Information
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>

                                <div class="form">
                                  <?php

                                  $query = "SELECT item_id, item_name FROM `bar_setup_tbl` where quantity_available > 0";
                                  $iNo=$rsEditBar['item_id'];
                                  $qryItNumber = "SELECT item_id, item_name FROM `bar_setup_tbl` where quantity_available > 0 and item_id=$iNo";


                                  if(isset($item_id) and strlen($item_id) > 0){

                                      $queryRate="select item_id, item_type, item_name, item_rate, quantity, quantity_available, threshold, created_by created_date from bar_setup_tbl where item_id=$item_id";
                                      //SELECT * FROM subcategory where cat_id=$cat order by subcategory
                                  }
                                  else
                                      $queryRate="select item_id, item_type, item_name, item_rate, quantity, quantity_available, threshold, created_by created_date from bar_setup_tbl where item_id=0";

                                  ?>


                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">
                                      <input name="iitm_id" type="hidden" id="iitm_id" value="<?php echo $itm_id ?>">

                                      <!--The current balance is &#8358;'.number_format($current_balance, 2)-->
                                      <div class="form-group ">
                                          <label for="item_id" class="control-label col-lg-2">Available Items</label>
                                          <div class="col-lg-6">

                                              <?php
                                              $conn=$db->getConnection();
                                              $result = mysqli_query($conn, $query);
                                              $resINumber= mysqli_query($conn, $qryItNumber);
                                              $rowINumber=mysqli_fetch_array($resINumber, MYSQLI_ASSOC);
                                              ?>

                                              <select name="item_id" id="item_id" class="form-control m-bot15" onchange="reload(this.form)">
                                                  <option value="<?php echo $rowINumber['item_id']; ?>"><?php echo $rowINumber['item_name']; ?></option>
                                                  <?php
                                                   while($row=mysqli_fetch_assoc($result))

                                                  {
                                                      if($row['item_id']==@$item_id){echo "<option selected value='$row[item_id]'>$row[item_name]</option>"."<BR>";}
                                                      else{echo  "<option value='$row[item_id]'>$row[item_name]</option>";}


                                                  }


                                                  ?>



                                              </select>
                                          </div>
                                      </div>

                                      <?php
                                      //$conn=$db->getConnection();
                                      $resultRate = mysqli_query($conn, $queryRate);
                                      $numRate=mysqli_fetch_assoc($resultRate);
                                      ?>





                                      <div class="form-group">
                                          <label for="item_rate" class="control-label col-lg-2">Rate (<em>&#8358;</em>)</label>
                                          <div class="col-lg-6">
                                              <input class="form-control" readonly id="item_rate" name="item_rate" type="text"

                                                 value="<?php
                                                     if(strlen($itm_id) > 0 && strlen($item_id) <= 0  )
                                                     {

                                                         $itemRate = str_replace(',', '', $rsEditBar['rate'] );
                                                         //echo number_format($rsEditBar['rate'], 2);
                                                        echo number_format($itemRate, 2);
                                                     }
                                                     else if( strlen($itm_id) > 0 && strlen($item_id) > 0 )
                                                     {
                                                         $itemRate = str_replace(',', '', $numRate['item_rate']);
                                                         echo number_format($itemRate,2);
                                                     }

                                                     ?>"


                                                  />
                                              <!--value="<?php //echo number_format($numRate['item_rate'], 2)  ?>"-->
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="quantity" class="control-label col-lg-2">Quantity</label>
                                          <div class="col-lg-6">
                                              <?php
                                              if(isset($item_id) and strlen($item_id) > 0){
                                                  $qtyQuery = "SELECT quantity_available qtyCount FROM `bar_setup_tbl` where quantity_available > 0 and item_id=$item_id";
                                              }

                                              ?>
                                              <select name="quantity" id="quantity" class="form-control m-bot15"">
                                              <option value="<?php echo $rsEditBar['quantity_sold']; ?>"><?php echo $rsEditBar['quantity_sold']; ?></option>
                                              <!--<option value="<?php //echo isset($_POST['quantity']) ? $_POST['quantity'] : ''; ?>"><?php //echo isset($_POST['quantity']) ? $_POST['quantity'] : '--- Select Quantity ---'; ?></option>-->
                                              <?php
                                              $conn=$db->getConnection();
                                              $qtyResult = mysqli_query($conn, $qtyQuery);
                                              $qtyRow=mysqli_fetch_assoc($qtyResult);
                                              $qtyCounted=$qtyRow['qtyCount'];
                                              $cnt=0;
                                              while($cnt < $qtyCounted)

                                              {
                                                  $cnt++;
                                                  //if($row['hall_number']==@$hall_number){echo "<option selected value='$row[hall_number]'>$row[hall_name]</option>"."<BR>";}else{echo  "<option value='$row[hall_number]'>$row[hall_name]</option>";}
                                                  echo "<option value='$cnt'>$cnt</option>"."<BR>";

                                              }


                                              ?>



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

 <SCRIPT language=JavaScript>
      function reload(form)
      {
          var val=form.item_id.options[form.item_id.options.selectedIndex].value;
          var iitmVal=document.getElementById('iitm_id').value;
          self.location='manage_bar.php?itm_id='+iitmVal+ '&item_id=' + val ;
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
