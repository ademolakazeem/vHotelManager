<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

require_once('access_denied_inclusion.php');

$qry="SELECT a.room_id room_id, a.room_number room_number, a.room_name room_name, a.feature_id a_feature_id, a.availability availability, a.created_date created_date, b.feature_name feature_name, b.feature_id b_feature_id, b.full_description full_description, b.rate rate, b.discount discount, b.price_paid price_paid FROM room_setup_tbl a, room_feature_tbl b WHERE  a.feature_id=b.feature_id";

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
                                 <h1>View Room Setup</h1>
                             </div>
                             <div class="col-lg-8 col-sm-8">
                                 <ol class="breadcrumb pull-right">
                                     <li><a href="index.php">Home</a></li>
                                     <!--<li><a href="show_update_room_info.php">Show Room Setup</a></li>-->
                                     <li class="active">View Room Setup</li>
                                 </ol>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--breadcrumbs end-->
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Administer Accommodation Setup Information
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
                                  <th>Room Number</th>
                                  <th>Room Name</th>
                                  <th>Discounts</th>
                                  <th class="hidden-phone">Rate</th>
                                  <th class="hidden-phone">Feature Name</th>
                                  <th class="hidden-phone">price to be paid</th>
                                  <!--<th class="hidden-phone">Availability</th>
                                  <th><input type="checkbox" id="selecctall"/> Selecct All</th>-->

                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=0;
                              $res=mysqli_query($db->getConnection(), $qry) or die(mysql_error());
                              //$rs=mysqli_fetch_array($res, MYSQLI_ASSOC);
                              //  $rsRmStup =$db->fetchArrayData($qry)
                              while($rsRmStup =mysqli_fetch_array($res, MYSQLI_ASSOC))
                              {

                              ?>
                              <tr>
                                <td>
                                      <a href="manage_ind_room_setup.php?room_id=<?php echo $rsRmStup['room_id'];?>" title="Administer <?php echo $rsRmStup['room_name'];?>"><img src="assets/advanced-datatable/examples/examples_support/details_open.png"></a>
                                 </td>
                                  <td><?php echo $rsRmStup['room_number'];?></td>
                                  <td><?php echo $rsRmStup['room_name'];?></td>

                                  <?php

                                      $dispDiscount=str_replace(',', '', $rsRmStup['discount']);
                                  $dispRate=str_replace(',', '', $rsRmStup['rate']);
                                  $dispPrice=str_replace(',', '', $rsRmStup['price_paid']);

                                  ?>
                                  <td><?php echo number_format(floatval($dispDiscount),2);?></td>
                                  <td><?php echo number_format(floatval($dispRate),2);?></td>
                                  <td class="hidden-phone"><?php echo $rsRmStup['feature_name'];?></td>
                                  <td class="hidden-phone"><?php echo number_format(floatval($dispPrice), 2);?></td>
                                  <!--<td class="hidden-phone"><?php // echo $rsRmStup['availability'];?></td>

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
