<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
require_once('access_denied_inclusion.php');


$qry="SELECT a.*, b.item_name item_name, b.item_type FROM bar_tbl a ,bar_setup_tbl b where a.item_id=b.item_id";

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
                                 <h2>View Bar</h2>

                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                     <!--<li><a href="show_update_permission.php">Show Permissions</a></li>-->
                                     <li class="active">View Bar</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Administer bar Information
                          </header>
                          <div class="panel-body">
                              <div class="form">
                              <div class="adv-table">
                              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                              <thead>
                              <tr>
                                  <th></th>
                                  <th>Item Name</th>
                                  <th>Item Rate</th>
                                  <th class="hidden-phone">Item Quantity</th>
                                  <th class="hidden-phone">Item Type</th>

                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=0;
                              $res=mysqli_query($db->getConnection(), $qry) or die(mysql_error());
                              //$rs=mysqli_fetch_array($res, MYSQLI_ASSOC);
                              //  $rsBar =$db->fetchArrayData($qry)
                              while($rsBar =mysqli_fetch_array($res, MYSQLI_ASSOC))
                              {

                              ?>

                              <tr>
                                  <!--td class="gradeX"-->
                                  <td>
                                      <a href="manage_ind_ind_bar.php?itm_id=<?php echo $rsBar['bar_item_id'];?>" title="Administer <?php echo $rsBar['item_name'];?>"><img src="assets/advanced-datatable/examples/examples_support/details_open.png"></a>


                                  </td>
                                  <td><?php echo $rsBar['item_name'];?></td>
                                  <td><?php echo $rsBar['rate'];?></td>
                                  <td class="hidden-phone"><?php echo $rsBar['quantity_sold'];?></td>
                                  <td class="hidden-phone"><?php echo $rsBar['item_type'];?></td>


                              </tr>
                                  <?php
                                  $i++;
                              }
                              ?>
                              </tbody>
                              </table>

                              </div>


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



  <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="js/respond.min.js" ></script>
  <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


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

  </body>
</html>
