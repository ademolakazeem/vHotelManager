<?php
/**
 * Created by PhpStorm.
 * User: Forbes Diamond
 * Date: 3/17/2015
 * Time: 10:03 PM
 */
require_once('authenticate.php');
$db = new DBConnecting();
$adm = new AdminController();
//select all rows from the main_menu table
$dQuery="select perm_id id, page_name title, parent_id parentid, page_url link, logo_name from permissions_tbl where parent_id=0 order by id asc";
$result=$db->executeQuery($dQuery);
?>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->

        <ul class="sidebar-menu" id="nav-accordion">
        <?php

        //while($row=$result->fetch_array())
        while ($row = mysqli_fetch_assoc($result))
        {
            if($row['link'] != 'javascript:;' && $row['parentid']==0) {
                ?>
                <li><a href="<?php echo $row['link']; ?>"><i
                        class="<?php echo $row['logo_name']; ?>"></i><span><?php echo $row['title']; ?></span></a></li>

            <?php
            }
            else{
                ?>
                <li class="sub-menu"><a href="<?php echo $row['link']; ?>"><i
                        class="<?php echo $row['logo_name']; ?>"></i><span><?php echo $row['title']; ?></span></a>


            <?php
            }

            ?>
            <!--<li><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>-->


                <?php
                $subQuery="select perm_id id, page_name title, parent_id parentid, page_url link, logo_name from permissions_tbl where parent_id=".$row['id']." order by id asc";
                $resSub=$db->executeQuery($subQuery);
                //$res_pro=$dbcon->query("SELECT * FROM sub_menu WHERE m_menu_id=".$row['m_menu_id']);
                ?>
                <ul class="sub">
                    <?php
                    //while($rowSub=$resSub->fetch_array())
                    while ($rowSub = mysqli_fetch_assoc($resSub))
                    {
                        ?><li><a href="<?php echo $rowSub['link']; ?>"><?php echo $rowSub['title']; ?></a></li><?php
                    }
                    ?>
                </ul>
            </li>

        <?php
        }
        ?>
        </ul>

        <!-- sidebar menu end-->
    </div>
</aside>