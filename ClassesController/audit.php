<?php
	require_once('DBDirect.php');

//class definitions
class AuditLog
{

	private $db;
	function __construct()
	{
		$this->db = new DBConnecting();
	}

	function audit_log($operation)
	{
		$cmpname = php_uname('n');
		$userFullname = $_SESSION['userfullname'];
        $user_id = $_SESSION['user_id'];
        $ip = $this ->getRealIpAddr();
		$host = $_SERVER['HTTP_HOST'];
		$referer = $_SERVER['HTTP_REFERER'];
        //echo "I got here before saving into audit";
		$sql = "INSERT INTO audit_log_tbl (comp_name,userFullname, user_id, datelog, ip_addr, operation, host, referer) VALUES ('$cmpname','$userFullname','$user_id',
				'".date("Y-m-d H:i:s")."', '$ip', '$operation', '$host', '$referer')";
        //time();
        $conn=$this->db->getConnection();
        $query=mysqli_query($conn,$sql);
       	}
	
	function getRealIpAddr()
	{
		   if (!empty($_SERVER['HTTP_CLIENT_IP'])) //check ip from share internet
		   {  
				$ip = $_SERVER['HTTP_CLIENT_IP']; 
		  }  
		  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
		  //to check ip is pass from proxy 
		  {  
		  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
		  } 
		  else
		  {
		  $ip = $_SERVER['REMOTE_ADDR'];
		  }
		  return $ip;
	   }
}
?>