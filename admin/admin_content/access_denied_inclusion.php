<?php
/**
 * Created by PhpStorm.
 * User: Forbes Diamond
 * Date: 7/1/2015
 * Time: 12:03 PM
 */
$qryAccess ="SELECT a.perm_id perm_id_in_role_perm, a.role_id, b.perm_id, b.page_url FROM role_permissions_tbl a, permissions_tbl b where a.perm_id=b.perm_id and a.role_id='".$_SESSION['levelaccess']."' and b.page_url LIKE '".basename($_SERVER['PHP_SELF'])."%' order by a.perm_id asc";
//check if user has required permissions
//$rs = mysql_query("select *from tbl_user_permission WHERE username='".$_SESSION['username']."' && permission_id='$page_permission_id'");
//$has_page_permission = mysql_num_rows($rs);
$has_page_permission=$db->getNumOfRows($qryAccess);
if ($has_page_permission > 0)
{}
else
{
    header("location:access_denied.php");
}

?>