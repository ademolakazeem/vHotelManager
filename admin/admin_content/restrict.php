<?php
//******************************
//* Page Restriction Code 
//* By Oluwatosin M. Adesanya
//* 24th July, 2009.
//******************************

//this restriction page is suitable for restriction which involves roles
//therefore a role variable must be specified on any page in which this file
//is included BEFORE the include line.
//an example
	//error_reporting(0);

if(!isset($_SESSION)){
	session_start();
}	

if(!(isset($_SESSION['adlogged']) || $_SESSION['adlogged']=="true")){
	header("location:login.php?r=".base64_encode('uas'));
} ?>
