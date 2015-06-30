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

//Start the testing here
//Set the database connection
//mysql_connect('localhost','root','');
//mysql_select_db('vhotelmgrdb');

//select all rows from the main_menu table

$dQuery="select perm_id id, page_name title, parent_id parentid, page_url link, logo_name from permissions_tbl";
$result=$db->executeQuery($dQuery);
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
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <?php
        //echo buildMenu(0, $menu);;

        ?>

        <ul class="sidebar-menu" id="nav-accordion">












        <li>
                <a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a>
            </li>
            <!--Start Started adding mine-->
            <li class="sub-menu">
                <a href="javascript:;"><i class="fa fa-cogs"></i> <span>Company Manager</span>
                </a>
                <ul class="sub">
                    <li><a  href="update_company_information.php">Create/Update Company Information</a></li>
                    <li><a  href="company_image_upload.php">Upload Company Image</a></li>
                    <!--<li><a  href="update_company_information.php">Update Company Information</a></li>-->
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i><span>User Manager</span>
                </a>
                <ul class="sub">
                    <li><a  href="user_registration.php">Add New User</a></li>
                    <li><a  href="permission_setup.php">Create New Permission</a></li>
                    <li><a  href="show_update_permission.php">View/Update Permission</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;"><i class="fa fa-cogs"></i><span>Room Manager</span>
                </a>
                <ul class="sub">
                    <li><a  href="room_feature_setup.php">Room Features Setup</a></li>
                    <li><a  href="room_setup.php">Room Setup</a></li>
                    <li><a  href="show_update_room_features.php">Update Room Features</a></li>
                    <li><a  href="show_update_room_info.php">Update Room Information</a></li>
                    <li><a  href="view_room_feature.php">View Room Features</a></li>
                    <li><a  href="view_room_info.php">View Room Information</a></li>

                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i><span>Hall Manager</span>
                </a>
                <ul class="sub">
                    <li><a  href="hall_feature_setup.php">Hall Features Setup</a></li>
                    <li><a  href="hall_setup.php">Hall Setup</a></li>
                    <li><a  href="show_update_hall_features.php">Update Hall Features</a></li>
                    <li><a  href="show_update_hall_info.php">Update Hall Information</a></li>
                    <li><a  href="view_hall_features.php">View Hall Features</a></li>
                    <li><a  href="view_hall_info.php">View Hall Information</a></li>

                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i><span>Bar Manager</span>
                </a>
                <ul class="sub">
                    <li><a  href="bar_setup.php">Bar Setup</a></li>
                    <li><a  href="show_update_bar_setup.php">Update Bar Information</a></li>
                    <li><a  href="view_bar.php">View Bar Information</a></li>

                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <!-- <a href="javascript:;" class="active" >-->
                    <i class="fa fa-tasks"></i><span>The Reservations</span>
                </a>
                <ul class="sub">
                    <li><a  href="room_reservation.php">Add Reservation</a></li>
                    <li><a  href="show_update_reservation.php">Update Reservation</a></li>
                    <li><a  href="view_update_reservation.php">View Reservation</a></li>
                    <li>------------------------------</li>
                    <li><a  href="show_update_reservation_checkins.php">Checked in Clients</a></li>
                    <li><a  href="show_update_reservation_checkouts.php">Checked out Clients</a></li>
                    <!--<li class="active"><a  href="form_validation.html">View Reservation</a></li>-->

                </ul>
            </li>
<!--End Started adding mine-->
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-laptop"></i><span>The Halls</span>
                </a>
                <ul class="sub">
                    <li><a  href="hall_reservation.php">Add Hall</a></li>
                    <li><a  href="show_update_hall.php">Update Hall</a></li>
                    <li><a  href="view_hall_reservation.php">View Hall</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-glass"></i><span>The Bar</span>
                </a>
                <ul class="sub">
                    <li><a  href="new_bar_item.php">Add Items to Bar</a></li>
                    <li><a  href="show_update_bar.php">Update Items in the Bar</a></li>
                    <li><a  href="view_bar.php">View Items in the Bar</a></li>
                </ul>
            </li>

            <!--multi level menu start <i class="fa fa-sitemap"></i>-->
                   <li class="sub-menu">
                            <a href="javascript:;" >

                                <i class="fa fa-bar-chart-o"></i>
                                <span>General Report</span>
                            </a>
                            <ul class="sub">
                                 <li class="sub-menu">
                                    <a  href="javascript:;">Accommodation Report</a>
                                    <ul class="sub">
                                        <li><a  href="room_setup_report.php">Room Setup Report</a></li>
                                        <li><a  href="room_feature_report.php">Room Feature Report</a></li>
                                        <li><a  href="room_reservation_report.php">Room Reservation Report</a></li>


                                    </ul>
                                </li>

                                <li class="sub-menu">
                                    <a href="javascript:;">Hall Report</a>
                                    <ul class="sub">

                                        <li><a  href="hall_setup_report.php">Hall Setup Report</a></li>
                                        <li><a  href="hall_feature_report.php">Hall Feature Report</a></li>
                                        <li><a  href="hall_reservation_report.php">Hall Reservation Report</a></li>

                                    </ul>
                                </li>

                                <li class="sub-menu">
                                    <a href="javascript:;">Bar Report</a>
                                    <ul class="sub">
                                        <li><a  href="bar_report.php">Bar Report</a></li>
                                        <li><a  href="bar_setup_report.php">Bar Setup Report</a></li>


                                    </ul>
                                </li>
                            </ul>
                        </li>
            <!--multi level menu end-->



            <!--

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class=" fa fa-bar-chart-o"></i>
                    <span>General Reports</span>
                </a>
                <ul class="sub">
                    <li><a  href="room_setup_report.php">Room Setup Report</a></li>
                    <li><a  href="room_feature_report.php">Room Feature Report</a></li>
                    <li><a  href="room_reservation_report.php">Room Reservation Report</a></li>
                    <li>------------------------------</li>
                    <li><a  href="hall_setup_report.php">Hall Setup Report</a></li>
                    <li><a  href="hall_feature_report.php">Hall Feature Report</a></li>
                    <li><a  href="hall_reservation_report.php">Hall Reservation Report</a></li>
                    <li>------------------------------</li>
                    <li><a  href="bar_report.php">Bar Report</a></li>
                    <li><a  href="bar_setup_report.php">Bar Setup Report</a></li>

                </ul>
            </li>

            -->



            <!--
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>UI Elements</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="general.html">General</a></li>
                                <li><a  href="buttons.html">Buttons</a></li>
                                <li><a  href="widget.html">Widget</a></li>
                                <li><a  href="slider.html">Slider</a></li>
                                <li><a  href="nestable.html">Nestable</a></li>
                                <li><a  href="thtml">Tree View</a></li>
                                <li><a  href="font_awesome.html">Font Awesome</a></li>
                            </ul>
                        </li>
            <!--
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-cogs"></i>
                                <span>Components</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="grids.html">Grids</a></li>
                                <li><a  href="calendar.html">Calendar</a></li>
                                <li><a  href="gallery.html">Gallery</a></li>
                                <li><a  href="todo_list.html">Todo List</a></li>
                                <li><a  href="draggable_portlet.html">Draggable Portlet</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="active" >
                                <i class="fa fa-tasks"></i>
                                <span>Form Stuff</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="form_component.html">Form Components</a></li>
                                <li><a  href="advanced_form_components.html">Advanced Components</a></li>
                                <li><a  href="form_wizard.html">Form Wizard</a></li>
                                <li class="active"><a  href="form_validation.html">Form Validation</a></li>
                                <li><a  href="dropzone.html">Dropzone File Upload</a></li>
                                <li><a  href="inline_editor.html">Inline Editor</a></li>
                                <li><a  href="image_cropping.html">Image Cropping</a></li>
                                <li><a  href="file_upload.html">Multiple File Upload</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-th"></i>
                                <span>Data Tables</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="basic_table.html">Basic Table</a></li>
                                <li><a  href="responsive_table.html">Responsive Table</a></li>
                                <li><a  href="dynamic_table.html">Dynamic Table</a></li>
                                <li><a  href="advanced_table.html">Advanced Table</a></li>
                                <li><a  href="editable_table.html">Editable Table</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class=" fa fa-envelope"></i>
                                <span>Mail</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="inbox.html">Inbox</a></li>
                                <li><a  href="inbox_details.html">Inbox Details</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Charts</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="morris.html">Morris</a></li>
                                <li><a  href="chartjs.html">Chartjs</a></li>
                                <li><a  href="flot_chart.html">Flot Charts</a></li>
                                <li><a  href="xchart.html">xChart</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-shopping-cart"></i>
                                <span>Shop</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="product_list.html">List View</a></li>
                                <li><a  href="product_details.html">Details View</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="google_maps.html" >
                                <i class="fa fa-map-marker"></i>
                                <span>Google Maps </span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-comments-o"></i>
                                <span>Chat Room</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="lobby.html">Lobby</a></li>
                                <li><a  href="chat_room.html"> Chat Room</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-glass"></i>
                                <span>Extra</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="blank.html">Blank Page</a></li>
                                <li><a  href="lock_screen.html">Lock Screen</a></li>
                                <li><a  href="profile.html">Profile</a></li>
                                <li><a  href="invoice.html">Invoice</a></li>
                                <li><a  href="search_result.html">Search Result</a></li>
                                <li><a  href="pricing_table.html">Pricing Table</a></li>
                                <li><a  href="faq.html">FAQ</a></li>
                                <li><a  href="fb_wall.html">FB Wall</a></li>
                                <li><a  href="404.html">404 Error</a></li>
                                <li><a  href="500.html">500 Error</a></li>
                            </ul>
                        </li>
                        <li>
                            <a  href="login.html">
                                <i class="fa fa-user"></i>
                                <span>Login Page</span>
                            </a>
                        </li>
            -->
            <!--multi level menu start-->
<!--            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-sitemap"></i>
                    <span>Multi level Menu</span>
                </a>
                <ul class="sub">
                    <li><a  href="javascript:;">Menu Item 1</a></li>
                    <li class="sub-menu">
                        <a  href="boxed_page.html">Menu Item 2</a>
                        <ul class="sub">
                            <li><a  href="javascript:;">Menu Item 2.1</a></li>
                            <li class="sub-menu">
                                <a  href="javascript:;">Menu Item 3</a>
                                <ul class="sub">
                                    <li><a  href="javascript:;">Menu Item 3.1</a></li>
                                    <li><a  href="javascript:;">Menu Item 3.2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>-->
            <!--multi level menu end-->

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>