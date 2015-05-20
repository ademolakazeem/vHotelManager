<?php
/**
 * Created by PhpStorm.
 * User: Forbes Diamond
 * Date: 3/17/2015
 * Time: 10:03 PM
 */
?>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!--Start Started adding mine-->
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Setups</span>
                </a>
                <ul class="sub">
                    <li><a  href="room_feature_setup.php">Room Features Setup</a></li>
                    <li><a  href="room_setup.php">Room Setup</a></li>
                    <li><a  href="hall_feature_setup.php">Hall Features Setup</a></li>
                    <li><a  href="hall_setup.php">Hall Setup</a></li>
                    <li><a  href="bar_setup.php">Bar Setup</a></li>
                    <li><a  href="user_registration.php">User Setup</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <!-- <a href="javascript:;" class="active" >-->
                    <i class="fa fa-tasks"></i>
                    <span>The Reservations</span>
                </a>
                <ul class="sub">
                    <li><a  href="room_reservation.php">Add Reservation</a></li>
                    <li><a  href="show_update_reservation.php">Update Reservation</a></li>
                    <li><a  href="view_update_reservation.php">View Reservation</a></li>
                    <!--<li class="active"><a  href="form_validation.html">View Reservation</a></li>-->

                </ul>
            </li>
<!--End Started adding mine-->
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-laptop"></i>
                    <span>The Halls</span>
                </a>
                <ul class="sub">
                    <li><a  href="hall_reservation.php">Add Hall</a></li>
                    <li><a  href="show_update_hall.php">Update Hall</a></li>
                    <li><a  href="view_update_hall.php">View Hall</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-glass"></i>
                    <span>The Bar</span>
                </a>
                <ul class="sub">
                    <li><a  href="new_bar_item.php">Add Items to Bar</a></li>
                    <li><a  href="#">Update Items in the Bar</a></li>
                    <li><a  href="#">View Items in the Bar</a></li>
                </ul>
            </li>

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
                    <li><a  href="tree.html">Tree View</a></li>
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