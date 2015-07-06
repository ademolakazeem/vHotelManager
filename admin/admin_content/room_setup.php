<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');

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
                                 <h1>New Room Setup</h1>
                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                     <!--<li><a href="show_update_room_info.php">Show Room Setup</a></li>-->
                                     <li class="active">New Room Setup</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Room Features Setup Form
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">
                                      <div class="form-group ">
                                          <label for="roomNumber" class="control-label col-lg-2">Room Number</label>
                                          <div class="col-lg-6">
                                              <input class="numbaOnly form-control" id="roomNumber" name="roomNumber" type="text" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="roomName" class="control-label col-lg-2">Room Name</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="roomName" name="roomName" type="text" />
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Feature Name</label>
                                          <div class="col-lg-6">



                                          <select name="featureId" id="featureId" class="form-control m-bot15">
                                              <option value="">--- Select ---</option>

                                              <?php

                                              $query = "SELECT * FROM `room_feature_tbl`";
                                              $conn=$db->getConnection();
                                              //$this->db->getConnection();
                                              $result = mysqli_query($conn, $query);
                                              //, MYSQL_ASSOC
                                              //_fetch_array($result,MYSQL_BOTH))
                                              while($row=mysqli_fetch_assoc($result))

                                              {
                                                  echo "<option value='".$row['feature_id']."'>".$row['feature_name']."</option>";
                                              }

                                              ?>



                                          </select>








                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Availability</label>
                                          <div class="col-lg-6">



                                              <select class="form-control m-bot15" id="availability" name="availability">
                                                  <option value="">--- Select ---</option>
                                                  <option>Available</option>
                                                  <option>Not Available</option>
                                              </select>



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

  </body>
</html>
