<?php


//Start the testing here
//Set the database connection
$conn=mysqli_connect('localhost','v_hotel_mgr_user','vHotelIsCool123;', 'vhotelmgrdb')or trigger_error(mysql_error(),E_USER_ERROR);
//mysqli_select_db('vhotelmgrdb');

//select all rows from the main_menu table

$result = mysqli_query($conn, "select perm_id id, page_name title, parent_id parentid, page_url link, logo_name from permissions_tbl");
//$result=$db->executeQuery($dQuery);
//$res=mysqli_query($db->getConnection(), $qry) or die(mysql_error());
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
    //echo $menu['parent_menus'][$row['parentid']][];
}

// Create the main function to build milti-level menu. It is a recursive function.
function buildMenu($parent, $menu) {
    $html = "";
    if (isset($menu['parent_menus'][$parent])) {
        $html .= "<ul>";
        foreach ($menu['parent_menus'][$parent] as $menu_id) {
            if (!isset($menu['parent_menus'][$menu_id])) {
                $html .= "<li><a href='" . $menu['menus'][$menu_id]['link'] . "'>" . $menu['menus'][$menu_id]['title'] . "</a></li>";
            }
            if (isset($menu['parent_menus'][$menu_id])) {
                $html .= "<li><a href='" . $menu['menus'][$menu_id]['link'] . "'>" . $menu['menus'][$menu_id]['title'] . "</a>";
                $html .= buildMenu($menu_id, $menu);
                $html .= "</li>";
            }
        }
        $html .= "</ul>";
    }
    return $html;
}

//End the testing here




?>
<div id='cssmenu'>
    <?php echo buildMenu(0, $menu); ?>
</div>