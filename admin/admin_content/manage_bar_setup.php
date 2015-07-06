<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');

$itm_id = $_GET['itm_id'];

$selQry="SELECT * FROM bar_setup_tbl where item_id = '$itm_id'";
$rsEditBarSup = $db->fetchArrayData($selQry);


//$featurename =mysqli_real_escape_string($_POST['featurename']);
//$featurdescription = mysql_real_escape_string($_POST['featurdescription']);


if(isset($_POST['update']))
	{
		$msg = $adm->updateBarSetup();
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
                                 <h2>Manage Bar Setup</h2>

                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                     <li><a href="show_update_bar_setup.php">Show Bar Setup</a></li>
                                     <li class="active">Manage Bar Setup</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Administer Bar Item Setup Form
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">
                                      <input name="item_id" type="hidden" id="item_id" value="<?php echo $itm_id; ?>">
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Item Type</label>
                                          <div class="col-lg-6">
                                              <select  class="form-control m-bot15" name="itemType" id="itemType">
                                                  <option value="<?php echo $rsEditBarSup['item_type'];?>"><?php echo $rsEditBarSup['item_type'];?></option>
                                                  <option>Drink</option>
                                                  <option>Food</option>
                                              </select>
                                           </div>
                                      </div>



                                      <div class="form-group ">
                                          <label for="itemName" class="control-label col-lg-2">Item Name</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="itemName" name="itemName" type="text"
                                                     value="<?php echo $rsEditBarSup['item_name'];?>" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="rate" class="control-label col-lg-2">Rate</label>
                                          <div class="col-lg-6">
                                              <input class="rate form-control" id="rate" name="rate" type="text" value="<?php echo number_format(floatval($rsEditBarSup['item_rate']),2);?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="rate" class="control-label col-lg-2">Quantity Available</label>
                                          <div class="col-lg-6">
                                          <?php echo number_format(floatval($rsEditBarSup['quantity_available']),2); ?>
                                              <input name="quantityAvailable" type="hidden" id="quantityAvailable" value=" <?php echo $rsEditBarSup['quantity_available'];?>">
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="rate" class="control-label col-lg-2">Quantity Supplied</label>
                                          <div class="col-lg-6">
                                            <!--<?php //echo number_format(floatval($rsEditBarSup['quantity']),2); ?>
                                              -->
                                              <?php echo number_format(floatval($rsEditBarSup['quantity']),2);?>
                                              <input name="oldQuantity" type="hidden" id="oldQuantity" value="<?php echo $rsEditBarSup['quantity'];?>">
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="rate" class="control-label col-lg-2">New Quantity Supplied<br/><em>(This adds to the old supplies)</em></label>
                                          <div class="col-lg-6">
                                              <input class="rate form-control" id="quantity" name="quantity" type="text"  /> <!--value="<?php //echo $rsEditBarSup['quantity'];?>"-->
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="rate" class="control-label col-lg-2">Threshold</label>
                                          <div class="col-lg-6">
                                              <input class="rate form-control" id="threshold" name="threshold" type="text" value="<?php echo number_format(floatval($rsEditBarSup['threshold']),2);?>" />

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


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>


    <!--script for this page
    <script src="js/form-validation-script.js"></script>-->
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

  </body>
</html>
