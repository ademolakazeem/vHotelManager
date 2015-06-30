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
$dQuery="select perm_id id, page_name title, parent_id parentid, page_url link, logo_name from permissions_tbl order by id asc";
$result=$db->executeQuery($dQuery);
//create a multidimensional array to hold a list of menu and parent menu
$menu = array(
    'menus' => array(),
    'parent_menus' => array()
);

//build the array lists with data from the menu table
while ($row = mysqli_fetch_assoc($result)) {
    //creates entry into menus array with current menu id ie. $menus['menus'][1]
    $menu['menus'][$row['id']] = $row;
    //creates entry into parent_menus array. parent_menus array contains a list of all menus with children
    $menu['parent_menus'][$row['parentid']][] = $row['id'];

}

// Create the main function to build milti-level menu. It is a recursive function.
function buildMenu($parent, $menu) {
    $html = "";
    if (isset($menu['parent_menus'][$parent])) {
        $count=1;
        if($count=1)
        {
            $html .= "<ul class='sidebar-menu' id='nav-accordion'>";
        }
        else{
            $html .= "<ul class='sub'>";
        }


        //$html .= "<ul class='sidebar-menu' id='nav-accordion'>";
        foreach ($menu['parent_menus'][$parent] as $menu_id) {
            if (!isset($menu['parent_menus'][$menu_id])) {
                $html .= "<li class='sub-menu'><a href='" . $menu['menus'][$menu_id]['link'] . "'>"."<i class='".$menu['menus'][$menu_id]['logo_name']."'></i><span>". $menu['menus'][$menu_id]['title'] . "</span></a></li>";
            }
            if (isset($menu['parent_menus'][$menu_id])) {
                $html .= "<li><a href='" . $menu['menus'][$menu_id]['link'] . "'>" ."<i class='".$menu['menus'][$menu_id]['logo_name']."'></i><span>". $menu['menus'][$menu_id]['title'] . "</a>";
                $count+=1;
                $html .= buildMenu($menu_id, $menu);
                $html .= "</li>";
                //$count+=1;
            }
        }
        $html .= "</ul>";
    }
    return $html;
}

//End the testing here



?>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        
        <?php
        echo buildMenu(0, $menu);;

        ?>


        <!-- sidebar menu end-->
    </div>
</aside>