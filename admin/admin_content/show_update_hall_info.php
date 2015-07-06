<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

require_once('access_denied_inclusion.php');

//$qry="SELECT a.hall_number hall_number, a.hall_name hall_name, a.feature_id a_feature_id, a.availability availability, a.created_date created_date, b.feature_name feature_name, b.feature_id b_feature_id, b.full_description full_description, b.rate rate, b.discount discount, b.price_paid price_paid FROM hall_setup_tbl a, room_feature_tbl b WHERE  a.feature_id=b.feature_id";
$qry="SELECT a.*, b.feature_name feature_name FROM hall_setup_tbl a, hall_feature_tbl b where a.hall_feature_id=b.hall_feature_id";
//$rsHall = $db->fetchData($qry);
//$featId=$rsHall['hall_feature_id'];
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
                             <div class="col-lg-4 col-sm-4">
                                 <h2>Show Hall Setup</h2>

                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                     <!--<li><a href="show_update_permission.php">Show Permissions</a></li>-->
                                     <li class="active">Show Hall Setup</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Administer Hall Setup Information
                          </header>

                          <!--
                          <ul class="chk-container">
<li><input type="checkbox" id="selecctall"/> Selecct All</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item1"> This is Item 1</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item2"> This is Item 2</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item3"> This is Item 3</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item4"> This is Item 4</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item5"> This is Item 5</li>
<li><input class="checkbox1" type="checkbox" name="check[]" value="item6"> This is Item 6</li>
<li><input class="checkbox2" type="checkbox" name="check[]" value="item6"> Do not select this</li>
</ul>

                          -->

                          <div class="panel-body">
                              <div class="form">
                              <div class="adv-table">
                              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                              <thead>
                              <tr>
                                  <th></th>
                                  <th>Hall Number</th>
                                  <th>Hall Name</th>
                                  <th>Hall Feature Name</th>
                                  <th>Availability</th>
                                  <th class="hidden-phone">Created Date</th>
                                  <!--<th class="hidden-phone">Availability</th>
                                  <th><input type="checkbox" id="selecctall"/> Selecct All</th>-->

                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=0;
                              $res=mysqli_query($db->getConnection(), $qry) or die(mysql_error());
                              //$rs=mysqli_fetch_array($res, MYSQLI_ASSOC);
                              //  $rsHllStup =$db->fetchArrayData($qry)
                              while($rsHllStup =mysqli_fetch_array($res, MYSQLI_ASSOC))
                              {

                              ?>
                              <tr>
                                <td>
                                      <a href="manage_hall_setup.php?hll_Number=<?php echo $rsHllStup['hall_number'];?>" title="Administer <?php echo $rsHllStup['hall_name'];?>"><img src="assets/advanced-datatable/examples/examples_support/details_open.png"></a>
                                 </td>
                                  <td><?php echo $rsHllStup['hall_number'];?></td>
                                  <td><?php echo $rsHllStup['hall_name'];?></td>
                                  <td><?php echo $rsHllStup['feature_name'];?></td>
                                  <td><?php echo $rsHllStup['availability'];?></td>
                                  <td class="hidden-phone"><?php echo $rsHllStup['created_date']?></td>
                                  <!--<td class="hidden-phone"><?php // echo $rsHllStup['availability'];?></td>

                                  <td><input class="checkbox1" type="checkbox" name="chkAvailable[]" value="Available">
                                  </td>
                                  -->

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
