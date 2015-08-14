<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');

?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('head.php');
?>

  <body>
  <?Php

  @$role_id=$_GET['role_id']; // Use this line or below line if register_global is off
  if(strlen($role_id) > 0 and !is_numeric($role_id)){ // to check if $cat is numeric data or not.
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
                 <!--breadcrumbs start-->
                 <div class="breadcrumbs">
                     <div class="container">
                         <div class="row">

                             <div class="col-lg-4 col-sm-4">
                                 <h2>Show Role</h2>
                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                    <!-- <li><a href="show_update_permission.php">Show Permissions</a></li>-->
                                     <li class="active">Show Role</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Show Role
                          </header>
                          <div class="panel-body">

                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">


                                      <div class="form-group ">
                                          <label for="role_id" class="control-label col-lg-2">Role Name</label>
                                          <div class="col-md-4 col-xs-11">
                                              <!--<div class="col-md-6 col-xs-11">-->

                                              <select name="role_id" id="role_id" class="form-control m-bot15" onchange="reload(this.form)">
                                                  <!--<option value="<?php /*echo isset($_POST['role_id']) ? $_POST['role_id'] : ''; */?>"><?php /*echo isset($_POST['role_id']) ? $_POST['role_id'] : '--- Select Role ---'; */?></option>-->
                                                  <option value="">-- Select --</option>

                                                  <?php

                                                  $query = "SELECT id role_id, name FROM `roles_tbl`";
                                                  $conn=$db->getConnection();
                                                  //$this->db->getConnection();
                                                  $result = mysqli_query($conn, $query);
                                                  //, MYSQL_ASSOC
                                                  //_fetch_array($result,MYSQL_BOTH))
                                                  while($row=mysqli_fetch_assoc($result))

                                                  {
                                                      if($row['role_id']==@$role_id){echo "<option selected value='$row[role_id]'>$row[name]</option>"."<BR>";}
                                                      else{echo  "<option value='$row[role_id]'>$row[name]</option>";}

                                                      //echo "<option value='".$row['role_id']."'>".$row['name']."</option>";
                                                  }

                                                  ?>



                                              </select>
                                          </div>

                                      </div>
                                      <div class="form-group">

                                          <!--The modal impl-->
                                          <?php
                                          if(isset($role_id) and strlen($role_id) > 0) {
                                              $queryORole = "select distinct a.id id, a.name role_name from roles_tbl a, role_permissions_tbl b where a.id=b.role_id and b.role_id=$role_id";

                                              $nuRole=$db->fetchData($queryORole);
                                              ?>
                                              <span class="pull-middle">
                    <h4> <?php echo "Role Selected:  ". $nuRole['role_name']; ?></h4>

                </span>
                                          <?php
                                          }
                                          ?>
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

                                         <!-- <th><input type="checkbox" id="selecctall"/> SelectAll</th>-->

                                      </tr>
                                      </thead>
                                      <tbody>

                                      <?php

                                         if(isset($role_id) and strlen($role_id) > 0){
                                          $queryRole="select a.perm_id perm_id, a.page_name page_name, a.page_url page_url from permissions_tbl a, role_permissions_tbl b where a.perm_id=b.perm_id and b.role_id=$role_id";
                                          //SELECT * FROM subcategory where cat_id=$cat order by subcategory
                                      }
                                      else
                                          $queryRole="select a.perm_id perm_id, a.page_name page_name, a.page_url page_url from permissions_tbl a, role_permissions_tbl b where a.perm_id=b.perm_id and b.role_id=0";

                                      $i=1;
                                      $res=mysqli_query($db->getConnection(), $queryRole) or die(mysql_error());
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
                                            <!--
                                              <td>
                                                  <input class="checkbox1" type="checkbox" name="chkAvailable[]" value="<?php /*echo $rsPerm['perm_id'];*/?>">

                                              </td>-->



                                          </tr>
                                          <?php
                                          $i++;
                                      }
                                      ?>
                                      </tbody>
                                  </table>

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
  <!--<script src="js/jquery.js"></script>-->

  <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="js/respond.min.js" ></script>
  <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


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


  <SCRIPT language=JavaScript>
      function reload(form)
      {
          var val=form.role_id.options[form.role_id.options.selectedIndex].value;
          self.location='show_role.php?role_id=' + val ;
      }

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
