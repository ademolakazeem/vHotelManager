<?php
/**
 * Created by PhpStorm.
 * User: Forbes Diamond
 * Date: 6/11/2015
 * Time: 12:50 PM
 */

?>
<div class="text-center invoice-btn">

    <!--I Want to add  a new test-->

    <div class="btn-group">
        <button id="btnSub" class="btn btn-info btn-lg btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
        <ul class="dropdown-menu " role="menu">

            <li><a href="#" onClick ="$('#dataTable').tableExport({type:'excel',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/xls.png' width='24px'> XLS</a></li>
            <li class="divider"></li>
            <li><a href="#" onClick ="$('#dataTable').tableExport({type:'doc',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/word.png'  width='24px'> Word</a></li>
            <li class="divider"></li>
            <li><a href="#" onClick ="$('#dataTable').tableExport({type:'txt',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/txt.png' width='24px'> TXT</a></li>
            <!-- <li><a href="#" onClick ="$('#dataTable').tableExport({type:'pdf',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/pdf.png' width='24px'> PDF</a></li>
            <li><a href="#" onClick ="$('#dataTable').tableExport({type:'csv',escape:'false'});"> <img src='../../ClassesController/htmltable_export/icons/csv.png' width='24px'> CSV</a></li>-->


            <!--customers-->


        </ul>
    </div>







    <!--End Wanting to add new Test-->

    <!-- <a class="btn btn-info btn-lg"  onclick="javascript:window.print();"><i class="fa fa-print"></i> Print or Export to PDF</a>
     <a class="btn btn-danger btn-lg" id="btnSub"><i class="fa fa-check"></i> Submit Invoice </a>-->
    <button class="btn btn-info btn-lg" onclick="javascript:window.print();" type="submit" id="btnPrint"><i class="fa fa-print"></i> Print or Export to PDF</button>

</div>