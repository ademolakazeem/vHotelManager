<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');


//$featurename =mysqli_real_escape_string($_POST['featurename']);
//$featurdescription = mysql_real_escape_string($_POST['featurdescription']);


if(isset($_POST['save']))
	{
		$msg = $adm->addBarSetup();
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
                                 <h2>Create Bar Setup</h2>

                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                     <!--<li><a href="show_update_permission.php">Show Permissions</a></li>-->
                                     <li class="active">Create Bar Setup</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Bar Item Setup Form
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">

                                      <div class="form-group">
                                          <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Item Type</label>
                                          <div class="col-lg-6">
                                              <select  class="form-control m-bot15" name="itemType" id="itemType">
                                                  <option value="<?php echo isset($_POST['itemType']) ? $_POST['itemType'] : ''; ?>"><?php echo isset($_POST['itemType']) ? $_POST['itemType'] : '--- Select ---'; ?></option>
                                                  <option>Drink</option>
                                                  <option>Food</option>
                                              </select>
                                           </div>
                                      </div>



                                      <div class="form-group ">
                                          <label for="itemName" class="control-label col-lg-2">Item Name</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="itemName" name="itemName" type="text"
                                                     value="<?php echo isset($_POST['itemName']) ? $_POST['itemName'] : ''; ?>" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="rate" class="control-label col-lg-2">Rate</label>
                                          <div class="col-lg-6">
                                              <input class="rate form-control" id="rate" name="rate" type="text" value="<?php echo isset($_POST['rate']) ? $_POST['rate'] : ''; ?>" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="rate" class="control-label col-lg-2">Threshold</label>
                                          <div class="col-lg-6">
                                              <input class="rate form-control" id="threshold" name="threshold" type="text" value="<?php echo isset($_POST['threshold']) ? $_POST['threshold'] : ''; ?>" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="rate" class="control-label col-lg-2">Quantity</label>
                                          <div class="col-lg-6">
                                              <input class="rate form-control" id="quantity" name="quantity" type="text" value="<?php echo isset($_POST['quantity']) ? $_POST['quantity'] : ''; ?>" />
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
