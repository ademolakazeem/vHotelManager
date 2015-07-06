<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');
//echo "My page name is:".$_SERVER['PHP_SELF'];


//$featurename =mysqli_real_escape_string($_POST['featurename']);
//$featurdescription = mysql_real_escape_string($_POST['featurdescription']);

$p_id = $_GET['p_id'];
//@$item_id=$_GET['item_id'];

//= "SELECT * FROM hall_reservation_tbl WHERE hall_reservation_id ";
$selQry="SELECT * FROM permissions_tbl where perm_id = '$p_id'";
$rsEditPerm = $db->fetchArrayData($selQry);


if(isset($_POST['update']))
	{
		$msg = $adm->updatePermissionSetup();
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
                                 <h1>Manage Permission</h1>
                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                     <li><a href="show_update_permission.php">Show Permissions</a></li>
                                     <li class="active">Manage Permission Setup</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->

                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Edit Permission Setup Form
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">
                                      <input name="permId" type="hidden" id="permId" value="<?php echo $p_id; ?>">

                                    <!--
                                      <div class="form-group ">
                                          <label for="hallNumber" class="control-label col-lg-2">Hall Number</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="hallNumber" name="hallNumber" type="text" />
                                          </div>
                                      </div>
                                      -->
                                      <div class="form-group ">
                                          <label for="pageName" class="control-label col-lg-2">Page Name</label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="pageName" name="pageName" type="text"
                                                     value="<?php echo $rsEditPerm['page_name'];?>" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="pageUrlName" class="control-label col-lg-2">Page URL Name</label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="pageUrlName" name="pageUrlName" type="text" value="<?php echo $rsEditPerm['page_url'];?>" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="parentId" class="control-label col-lg-2">Menu Parent Name</label>
                                          <div class="col-lg-6">

                                              <!--<select  id="parentId" name="parentId"  class="form-control m-bot15"">
                                              <option value="">--- Select Parent Id ---</option>
                                              <?php
                                              /* $numCount=0;

                                               while($numCount<= 1000)

                                               {


                                                       echo "<option value='$numCount'>".$numCount."</option>";

                                                   $numCount+=1;
                                               }
 */
                                              $dPerm=$rsEditPerm['parent_id'];
                                              $selOnlyQry="SELECT perm_id, page_name, parent_id FROM permissions_tbl where perm_id = '$dPerm'";
                                              $rsOnlyPerm = $db->fetchArrayData($selOnlyQry);

                                              ?>



                                              </select>
-->

                                              <select name="parentId" id="parentId" class="form-control m-bot15">
                                                  <option value="<?php echo $rsOnlyPerm['perm_id'];?>"><?php echo $rsOnlyPerm['perm_id']." ".$rsOnlyPerm['page_name'];?></option>

                                                  <?php

                                                  $query = "SELECT * FROM `permissions_tbl` where parent_id=0";
                                                  $conn=$db->getConnection();
                                                  //$this->db->getConnection();
                                                  $result = mysqli_query($conn, $query);
                                                  //, MYSQL_ASSOC
                                                  //_fetch_array($result,MYSQL_BOTH))
                                                  while($row=mysqli_fetch_assoc($result))

                                                  {
                                                      echo "<option value='".$row['perm_id']."'>".$row['perm_id']." ".$row['page_name']."</option>";
                                                  }

                                                  ?>



                                              </select>








                                          </div>
                                      </div>


                                      <div class="form-group ">
                                          <label for="logoName" class="control-label col-lg-2">Pick a Logo</label>
                                          <div class="col-lg-6">

                                              <select name="logoName" id="logoName" class="form-control m-bot15">
                                                  <?php
                                                  if($rsEditPerm['logo_name']=='fa fa-dashboard'){
                                                      $logName= "Dashboard Logo";

                                                  }elseif(trim($rsEditPerm['logo_name'])==trim('fa fa-cogs'))
                                                  {
                                                      $logName= "Manager (Settings) Logo";
                                                  }elseif($rsEditPerm['logo_name']=='fa fa-tasks')
                                                  {
                                                      $logName= "Reservation (tasks) Logo";
                                                  }elseif($rsEditPerm['logo_name']=='fa fa-laptop')
                                                  {
                                                      $logName= "Hall (Laptop) Logo";
                                                  }elseif($rsEditPerm['logo_name']=='fa fa-glass')
                                                  {
                                                      $logName= "Bar (Glass) Logo";
                                                  }elseif($rsEditPerm['logo_name']=='fa fa-bar-chart-o')
                                                  {
                                                      $logName= "Report (charts) Logo";
                                                  }elseif($rsEditPerm['logo_name']=='fa fa-upload')
                                                  {
                                                      $logName= "Data Upload (upload) Logo";
                                                  }
                                                  else{
                                                      $logName="";
                                                  }
                                                  ?>
                                                  <option value="<?php echo $logName;?>"><?php echo $logName;?> </option>
                                              <option value="fa fa-dashboard">Dashboard Logo</option>
                                              <option value="fa fa-cogs">Manager (Settings) Logo</option>
                                              <option value="fa fa-tasks">Reservation (tasks) Logo</option>
                                              <option value="fa fa-laptop">Hall (Laptop) Logo</option>
                                              <option value="fa fa-glass">Bar (Glass) Logo</option>
                                              <option value="fa fa-bar-chart-o">Report (charts) Logo</option>
                                              <option value="fa fa-upload">Data Upload (upload) Logo</option>
                                              </select>
                                          </div>
                                      </div>



                                      <?php
                                      //echo "My page name is:".$_SERVER['PHP_SELF'];
                                      //echo "<br/>My page basename is:".basename($_SERVER['PHP_SELF']);
                                      ?>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit" name="update">Update Permission Now</button>
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
