<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');
if(isset($_POST['assignPermission']))
{
    $msg = $adm->assignNow();
}

if(isset($_POST['newRole']))
{
    $msg1 = $adm->addNewRole();
}


//$rsRoom = $db->fetchData($qry);
//$clt_id = $_GET['clt_id'];

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
                                             <h1>Assign Role Permission</h1>
                                         </div>
                                         <div class="col-lg-8 col-sm-8">
                                             <ol class="breadcrumb pull-right">
                                                 <li><a href="index.php">Home</a></li>
                                                 <!--<li><a href="show_update_room_info.php">Show Room Setup</a></li>-->
                                                 <li class="active">Assign Role Permission</li>
                                             </ol>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--breadcrumbs end-->
                             <div class="col-lg-4 col-sm-4">
                                 <h2>Role Permissions</h2>
                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                    <!-- <li><a href="show_update_permission.php">Show Permissions</a></li>-->
                                     <li class="active">Role Permissions</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Administer Role-Permissions
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg))
                                  echo $msg;
                              if(isset($msg1))
                                  echo $msg1;
                              ?>
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">


                                      <div class="form-group ">
                                          <label for="role_id" class="control-label col-lg-2">Role Name</label>
                                          <div class="col-md-4 col-xs-11">
                                              <!--<div class="col-md-6 col-xs-11">-->

                                              <select name="role_id" id="role_id" class="form-control m-bot15">


                                                  <option value="">--Select--</option>

                                                  <?php

                                                  $query = "SELECT id role_id, name FROM `roles_tbl`";
                                                  $conn=$db->getConnection();
                                                  //$this->db->getConnection();
                                                  $result = mysqli_query($conn, $query);
                                                  //, MYSQL_ASSOC
                                                  //_fetch_array($result,MYSQL_BOTH))
                                                  while($row=mysqli_fetch_assoc($result))

                                                  {
                                                      echo "<option value='".$row['role_id']."'>".$row['name']."</option>";
                                                  }

                                                  ?>



                                              </select>
                                          </div>

                                          <!--The modal impl-->
                                           <span class="pull-middle">
                    <h5><a data-toggle="modal" href="#myModal"> Add new Role?</a></h5>

                </span>
                                          <!--End The modal impl-->
                                      </div>


                              <div class="adv-table">



                                  <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                      <thead>
                                      <tr>
                                          <!--<th></th>-->
                                          <th>Id</th>
                                          <th>Page Name</th>
                                          <th class="hidden-phone">Page URL</th>
                                          <th class="hidden-phone">Parent Id</th>
                                          <th class="hidden-phone">Logo Name</th>
                                          <th class="hidden-phone">Created Date</th>
                                          <!--<th class="hidden-phone">Maker</th>-->
                                          <th><input type="checkbox" id="selecctall"/> SelecctAll</th>

                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      $qry = "SELECT * FROM permissions_tbl ORDER BY page_name asc";
                                      // ORDER BY page_name asc
                                      $i=1;
                                      $res=mysqli_query($db->getConnection(), $qry) or die(mysql_error());
                                      //$rs=mysqli_fetch_array($res, MYSQLI_ASSOC);
                                      //  $rsPerm =$db->fetchArrayData($qry)
                                      while($rsPerm =mysqli_fetch_array($res, MYSQLI_ASSOC))
                                      {

                                          ?>

                                          <tr>
                                              <!--td class="gradeX"
                                              <td>
                                                  <a href="manage_permission_setup.php?p_id=<?php //echo $rsPerm['perm_id'];?>" title="Administer <?php echo $rsPerm['page_name'];?>"><img src="assets/advanced-datatable/examples/examples_support/details_open.png"></a>
                                              </td>-->
                                              <td><?php echo $i;?></td>
                                              <td><?php echo $rsPerm['page_name'];?></td>
                                              <td class="hidden-phone"><?php echo $rsPerm['page_url'];?></td>
                                              <td class="center hidden-phone"><?php echo $rsPerm['parent_id'];?></td>
                                              <td class="center hidden-phone"><?php

                                                  if($rsPerm['logo_name']=="fa fa-dashboard")
                                                  {
                                                      $_SESSION['logo_show']="Dashboard Logo";
                                                      echo $_SESSION['logo_show'];
                                                  }
                                                  elseif($rsPerm['logo_name']=="fa fa-cogs")
                                                  {
                                                      $_SESSION['logo_show']="Manager (Settings) Logo";
                                                      echo $_SESSION['logo_show'];
                                                  }
                                                  elseif($rsPerm['logo_name']=="fa fa-tasks")
                                                  {
                                                      $_SESSION['logo_show']="Reservation (tasks) Logo";
                                                      echo $_SESSION['logo_show'];
                                                  }
                                                  elseif($rsPerm['logo_name']=="fa fa-laptop")
                                                  {
                                                      $_SESSION['logo_show']="Hall (Laptop) Logo";
                                                      echo $_SESSION['logo_show'];
                                                  }
                                                  elseif($rsPerm['logo_name']=="fa fa-glass")
                                                  {
                                                      $_SESSION['logo_show']="Bar (Glass) Logo";
                                                      echo $_SESSION['logo_show'];
                                                  }
                                                  elseif($rsPerm['logo_name']=="fa fa-bar-chart-o")
                                                  {
                                                      $_SESSION['logo_show']="Report (charts) Logo";
                                                      echo $_SESSION['logo_show'];
                                                  }
                                                  elseif($rsPerm['logo_name']=="fa fa-upload")
                                                  {
                                                      $_SESSION['logo_show']="Data Upload (upload) Logo";
                                                      echo $_SESSION['logo_show'];
                                                  }
                                                  else
                                                  {
                                                      echo "No Logo";
                                                  }


                                                  //echo $rsPerm['date_in'];
                                                  ?></td>
                                              <td class="center hidden-phone"><?php echo $rsPerm['created_date'];?></td>
                                              <!--<td class="center hidden-phone"><?php echo $rsPerm['maker'];?></td>-->
                                              <td>
                                                  <input class="checkbox1" type="checkbox" name="chkAvailable[]" value="<?php echo $rsPerm['perm_id'];?>">

                                              </td>



                                          </tr>
                                          <?php
                                          $i++;
                                      }
                                      ?>
                                      </tbody>
                                  </table>

                                 </div>
                                      <div class="form-group">
                                          <!--class="col-lg-offset-2 col-lg-10"-->
                                          <div >
                                              <button class="btn btn-danger" type="submit" name="assignPermission">Assign Permission to Role</button>
                                              <!-- <button class="btn btn-default" type="button">Cancel</button>-->
                                          </div>
                                      </div>

                                </form>



                                  <form class="cmxform form-horizontal tasi-form" id="popup" method="POST" action="">
                                      <!-- Modal -->
                                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                      <h4 class="modal-title">Add New Role?</h4>
                                                  </div>
                                                  <div class="modal-body">



                                                      <p>Please Enter the Role Name that you want to create.</p>
                                                      <input type="text" name="role_name" placeholder="Role Name" autocomplete="off" class="form-control placeholder-no-fix">

                                                  </div>
                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                                      <button class="btn btn-success" type="submit" name="newRole">Submit</button>
                                                      <!--<button class="btn btn-danger" type="submit" name="assignPermission">Assign Permission to Role</button>-->
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
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
  <!--<script src="js/jquery.js"></script>-->

  <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="js/respond.min.js" ></script>
  <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

  <!--
   <script src="js/bootstrap.min.js"></script>
   <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="js/jquery.validate.min.js"></script>
   <script src="js/respond.min.js" ></script>

     <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

   -->


  <!--common script for all pages-->
  <script src="js/common-scripts.js"></script>



  <script type="text/javascript">
      /* Formating function for row details */
      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Client:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
          sOut += '<tr><td>Number of Days:</td><td>'+ aData[7]+'</td></tr>';
          sOut += '<tr><td>Extra info:</td><td>Could provide a link here  And any further details here (images etc)</td></tr>';
          sOut += '</table>';

          return sOut;
      }

      $(document).ready(function() {
          /*
           * Insert a 'details' column to the table
           */
          /*
          var nCloneTh = document.createElement( 'th' );
          var nCloneTd = document.createElement( 'td' );
          nCloneTd.innerHTML = '<img src="assets/advanced-datatable/examples/examples_support/details_open.png">';
          nCloneTd.className = "center";

          $('#hidden-table-info thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#hidden-table-info tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );
          */

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#hidden-table-info').dataTable( {
              "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 0 ] }
              ],
              "aaSorting": [[1, 'asc']]
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here

          $('#hidden-table-info tbody td img').live('click', function () {
              var nTr = $(this).parents('tr')[0];
              if ( oTable.fnIsOpen(nTr) )
              {
                  // This row is already open - close it
                  this.src = "assets/advanced-datatable/examples/examples_support/details_open.png";
                  oTable.fnClose( nTr );
              }
              else
              {
                  // Open this row
                  this.src = "assets/advanced-datatable/examples/examples_support/details_close.png";
                  oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
              }
          } );*/
      } );
  </script>
  <script>
      $(document).ready(function() {
          $('#selecctall').click(function(event) {  //on click
              if(this.checked) { // check select status
                  $('.checkbox1').each(function() { //loop through each checkbox
                      this.checked = true;  //select all checkboxes with class "checkbox1"
                  });
              }else{
                  $('.checkbox1').each(function() { //loop through each checkbox
                      this.checked = false; //deselect all checkboxes with class "checkbox1"
                  });
              }
          });

      });
  </script>

  </body>
</html>
