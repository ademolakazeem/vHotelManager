<?php
require_once("DBDirect.php");

class Format
{
    private $db;
    function __construct()
    {
        $this->db = new DBConnecting();
    }
	
	public function processfield($field)
	{
		if(get_magic_quotes_gpc())
			return htmlspecialchars($field);
		else
		return htmlspecialchars(mysqli_real_escape_string($this->db->getConnection(), $field));
        //return htmlspecialchars(addslashes($field));

	}
}

?>