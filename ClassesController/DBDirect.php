<?php	
	session_start();
class DBConnecting 
{

	private $db;
	private $conn;
    private $mysqli;
	
    function  __construct() 
	{	
		$hostname_login = "localhost"; //host
		$database_login = "vhotelmgrdb"; //dbname
		$username_login = "v_hotel_mgr_user";//db username
		$password_login = "vHotelIsCool123;"; //db password
		
/*
        $hostname_login = "localhost"; //host
		$database_login = "verdetec_vhotelmgrdb"; //dbname
		$username_login = "verdetec_v_hotel";//db username
		$password_login = "vHotelIsCool123;"; //db password
*/

        //$connection = mysqli_connect('localhost', 'username', 'password', 'database');
        //$this->db =mysqli_select_db($database_login, $this->conn);
        //$mysqli = new mysqli("localhost", "my_user", "my_password", "world");
		$this->conn = mysqli_connect($hostname_login, $username_login, $password_login, $database_login) or trigger_error(mysql_error(),E_USER_ERROR);
        //$this->db =mysqli_select_db($this->conn, $database_login);
        //$this->mysqli = new mysqli($hostname_login, $username_login, $password_login, $database_login);

		
    }
	
	function getConnection()
	{
		return $this->conn;
	}

	
	public function executeQuery($qry)
	{
		$res=mysqli_query($this->conn,$qry) or die(mysql_error());
		return $res;

	}
		
	public function fetchData($qry)
{
    $res=mysqli_query($this->conn, $qry) or die(mysql_error());
    $rs=mysqli_fetch_assoc($res);
    return $rs;
}

    public function fetchArrayData($qry)
    {
        $res=mysqli_query($this->conn, $qry) or die(mysql_error());
        $rs=mysqli_fetch_array($res, MYSQLI_ASSOC);
        return $rs;
    }
		
	function getNumOfRows($qry)
	{

        //$res=$this->mysqli->query($qry) or die(mysql_error());
        $res=mysqli_query($this->conn, $qry);
        //_query($qry) or die(mysql_error());
		//$num=mysqli_num_rows($res);
        $num=mysqli_num_rows($res);
        //$num=mysql_num_rows($this->mysqli->query($qry) or die(mysql_error()));

		return $num;
	}

	
	function checkIfExists($table,$field,$value)
	{
		$res = mysql_query("SELECT * FROM $table WHERE $field = '$value'") or die(mysql_error());
		if(mysql_num_rows($res)>0)
			return true;
		else
			return false;	
	}

}//end class DBConnecting

?>