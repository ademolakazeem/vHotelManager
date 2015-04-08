<?php
		session_start();

require_once('../../ClassesController/audit.php');
		
		$audit = new AuditLog();
		
		$audit->audit_log("User ".$_SESSION['userfullname']." Successfully logged out");
		


unset($_SESSION['userfullname']);
unset($_SESSION['username']);
unset($_SESSION['adlogged']);
unset($_SESSION['levelaccess']);
unset($_SESSION['imagepathavatar']);
unset($_SESSION['user_id']);

		header("location:login.php?r=".base64_encode('logout'));
		
?>
