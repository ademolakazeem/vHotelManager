<?php
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();

if(isset($_POST['checkOut']))
{
    $msg = $adm->checkOut();
}

$qry = "SELECT * FROM room_reservation_tbl where status != 'Checked Out' ORDER BY client_name";
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
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Administer Checkins
                          </header>
                          <div class="panel-body">
                              <?php if(isset($msg)) echo $msg; ?>
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="">
                              <div class="adv-table">
                              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                              <thead>
                              <tr>
                                  <th></th>
                                  <th>Client Name</th>
                                  <th>Client Address</th>
                                  <th class="hidden-phone">Client Phone</th>
                                  <th class="hidden-phone">Room Number</th>
                                  <th class="hidden-phone">Check In</th>
                                  <th class="hidden-phone">Check Out</th>
                                  <!--<th class="hidden-phone">Availability</th>-->
                                  <th><input type="checkbox" id="selecctall"/> Selecct All</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=0;
                              $res=mysqli_query($db->getConnection(), $qry) or die(mysql_error());
                              //$rs=mysqli_fetch_array($res, MYSQLI_ASSOC);
                              //  $rsRoom =$db->fetchArrayData($qry)
                              while($rsRoom =mysqli_fetch_array($res, MYSQLI_ASSOC))
                              {

                              ?>

                              <tr>
                                  <!--td class="gradeX"-->
                                  <td>
                                      <a href="manage_room_reservation.php?clt_id=<?php echo $rsRoom['room_reservation_id'];?>" title="Administer <?php echo $rsRoom['client_name'];?>"><img src="assets/advanced-datatable/examples/examples_support/details_open.png"></a>


                                  </td>
                                  <td><?php echo $rsRoom['client_name'];?></td>
                                  <td><?php echo $rsRoom['client_address'];?></td>
                                  <td class="hidden-phone"><?php echo $rsRoom['client_phone'];?></td>
                                  <td class="center hidden-phone"><?php echo $rsRoom['room_number'];?></td>
                                  <td class="center hidden-phone"><?php echo $rsRoom['date_in'];?></td>
                                  <td class="center hidden-phone"><?php echo $rsRoom['date_out'];?></td>
                                  <?php '<td class="center hidden-phone">'.$rsRoom['number_of_days'].'</td>'; ?>
                                  <!--<td class="hidden-phone"><?php // echo $rsRmStup['availability'];?></td>-->

                                  <td><input class="checkbox1" type="checkbox" name="chkAvailable[]" value="<?php echo $rsRoom['room_reservation_id'];?>">
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
                                              <button class="btn btn-danger" type="submit" name="checkOut">Check Client(s) Out Now</button>
                                              <!-- <button class="btn btn-default" type="button">Cancel</button>-->
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
