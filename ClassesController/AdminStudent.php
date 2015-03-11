<?php
		require_once("DBDirect.php");
		require_once('audit.php');
		require_once('Utilities.php');
		require_once('format.php');

class Student 
{
	private $db, $audit,$util,$fm;
	
	function __construct()
	{
		$this->db = new DBConnecting();
		$this->audit = new AuditLog();
		$this->util = new Utilities();
		$this->fm = new Format();
	}
	
	function getNextArm()
	{
		 $selqry = "SELECT * FROM tblgetclass where pointer ='1'";
		  $selqry1= mysql_query($selqry);
		  $result = mysql_fetch_array($selqry1);
		  
		  $currid = $result['id'];//for update
		  
		  $classid = $result['classid'];
		  
		  $arm = $result['arm'];
		  
		  //update current picked arm
		  mysql_query("update tblgetclass set pointer=0, count=count+1 where id=$currid");
		  
		  //set next arm to pick
		  //check if current picked is last if yes set pointer to the first record
		    
		  //select max class id first
		  $rs = mysql_query("select max(classid) as maxid from tblgetclass");
		  $res = mysql_fetch_array($rs);
		  
		  $maxid = $res['maxid'];
		  
		  if($classid == $maxid)
		  {
			  //current picked is the last arm hence set pointer to first record
			  mysql_query("update tblgetclass set pointer=1 where classid=1");
		  }
		  else
		  {
			  //get classid to update which is current + 1
			  $toupdate = $classid+1;
			   mysql_query("update tblgetclass set pointer=1 where classid=".$toupdate);
			  
		  }
		  
		  return $arm;
	}
	
	function gethouse()
	{
		 $selhouse = "SELECT * FROM tblhouse where pointer ='1'";
		  $selqry12= mysql_query($selhouse);
		  $result = mysql_fetch_array($selqry12);
		  
		  $currid = $result['id'];//for update
		  
		  $houseid = $result['houseid'];
		  
		  $colour = $result['colour'];
		  
		  //update current picked arm
		  mysql_query("update tblhouse set pointer=0  where id=$currid");
		  
		  //set next arm to pick
		  //check if current picked is last if yes set pointer to the first record
		    
		  //select max class id first
		  $rs = mysql_query("select max(houseid) as maxid from tblhouse");
		  $res = mysql_fetch_array($rs);
		  
		  $maxid = $res['maxid'];
		  
		  if($houseid == $maxid)
		  {
			  //current picked is the last arm hence set pointer to first record
			  mysql_query("update tblhouse set pointer=1 where houseid=1");
		  }
		  else
		  {
			  //get houseid to update which is current + 1
			  $toupdate = $houseid+1;
			   mysql_query("update tblhouse set pointer=1 where houseid=".$toupdate);
			  
		  }
		  
		  return $colour;
	}
	
	function quickStudentReg()
	{
		  $studid = $this->fm->processfield(strtoupper($_POST['uname']));
		  $lname = $this->fm->processfield(strtoupper($_POST['lname']));
		  $fname= $this->fm->processfield(strtoupper($_POST['fname']));
		  $mname = $this->fm->processfield(strtoupper($_POST['mname']));
		  $class = $this->fm->processfield(strtoupper($_POST['class']));
		  $arm = $this->fm->processfield(strtoupper($_POST['arm']));
		  $email = $this->fm->processfield(strtoupper($_POST['email']));
		  $phone = $this->fm->processfield(strtoupper($_POST['phone']));
		   $house = $this->fm->processfield(strtoupper($_POST['house']));
		  
		  $yrsadd = $_POST['yearad'];
		  $password = "cabinet";
			
			if(empty($yrsadd)||empty($lname)||empty($fname))
			{
				return '<font color="#FF0000" size="-2">Please make sure all fields are filled!</font>';
			}
			
			try {
			
				$sql = mysql_query("SELECT * from tblstudent WHERE stud_id = '$studid'") or die(mysql_error());
				$no_rows = mysql_num_rows($sql);
				
				if ($no_rows == 0) 
				{
					if(empty($studid))
					  {
						  //generate 4digit random number
						  $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);	
						  //call a method that returns school's shorth form
						  $schshr = $this->util->getSchoolShort();
						  $studid = $schshr.$yrsadd.$serial;//generate
					  }
					  
					  if(empty($_POST['check'])||(empty($class)&&empty($arm)))
					  {
							$class = "JSS1";
							$arm = $this->getNextArm();
					  }
					  
					  	//to check if generated stud_id exist
					  	$sqlchk = mysql_query("SELECT * from tblstudent WHERE stud_id = '$studid'") or die(mysql_error());
						$no_rows2 = mysql_num_rows($sqlchk);
						if ($no_rows2 > 0)
						{
							return '<font color="#FF0000" size="-2">Please resubmit for this student, Username already generated</font>';
						}
						else
						{
							if(empty($house))
							{
								$colour = $this->gethouse();
							}
							$query="INSERT INTO tblstudent(id,stud_id,lname,fname,mname,class,passw,email,arm,house,phone) VALUES('','$studid','$lname','$fname','$mname','$class','".sha1($password)."','$email','$arm','$colour','$phone')";
							//return $query;
							
							$result = mysql_query($query) or die(mysql_error());
							
							if($result)
							{
								$this->audit->audit_log("Admin ".$_SESSION['username']." added a new student - ".$lname." ".$fname." ".$uname);
								return '<strong><font color="#3300FF" size="-2">Student with username '.$studid.' and password '.$password.'</font></strong><font color="#006600" size="-2"> was successfully registered</font>';
							}
						}
				}
				else
				{
					return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
				}
			}//try
			catch(Exception $exc)
			{
				echo ($exc->getMessage() . "<br>");
			}
	
	}
	
	function  Full_Register_Student()
	{   
		  $uname = $this->fm->processfield($_POST['username']);
		  $lname = $this->fm->processfield(strtoupper($_POST['lname']));
		  $fname= $this->fm->processfield(strtoupper($_POST['fname']));
		  $mname = $this->fm->processfield(strtoupper($_POST['mname']));
		  $class = $_POST['class'];
		  $gender = $_POST['gender'];
		  $email = $this->fm->processfield($_POST['email']);
		  $dob =$_POST['dob'];
		  $soo = $_POST['soo'];
		  $lga =$_POST['lga'];
		  $rel = $_POST['rel'];
		  $pob = $_POST['pob'];
		  $arm = $_POST['arm'];
		  $spe = $this->fm->processfield($_POST['spe']);
		  $rp= $this->fm->processfield($_POST['rp']);
		  $pp = $this->fm->processfield($_POST['pp']);
		  $ha = $this->fm->processfield($_POST['ha']);
		  $sawd =$this->fm->processfield($_POST['sawd']);
		  $phone = $_POST['phone'];
		  $house = $this->fm->processfield(strtoupper($_POST['house']));
		  
		  $yrsadd = $_POST['yearad'];
		  $password = "cabinet";
		  
		  	if(empty($yrsadd))
			{
				return '<font color="#FF0000" size="-2">Please enter year of admission!</font>';
			}
			if(empty($lname))
			{
				return '<font color="#FF0000" size="-2">Enter the Lastname!</font>';
			}
			if(empty($fname))
			{
				return '<font color="#FF0000" size="-2">Enter Firstname!</font>';
			}
		  
				try {
				$sql = mysql_query("SELECT * from tblstudent WHERE stud_id = '$uname'") or die(mysql_error());
				$no_rows = mysql_num_rows($sql);
				
				if ($no_rows == 0) 
				{
					
					   if(empty($_POST['check'])||(empty($class)&&empty($arm)))
					  {
							$class = "JSS1";
							$arm = $this->getNextArm();
					  }
					  
					  if(empty($uname))
					  {
						  //generate 4digit random number
						  $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);	
						  //call a method that returns school's shorth form
						  $schshr = $this->util->getSchoolShort();
						  $uname = $schshr.$yrsadd.$serial;//generate
					  }
					
					/**$query="INSERT INTO tblstudent(id,stud_id,lname,fname,mname,class,passw,gender,email,dob,stateorigin,lga,reli,placeofb,arm,specifi,residencepref,homadd,imgpath,phone,schattended,dateregistered) VALUES('','$uname','$lname','$fname','$mname','$class','".sha1($password)."','$gender','$email','$dob','$soo','$lga','$rel','$pob','$arm','$spe','$rp','$ha','$pp','$phone','$sawd','".time()."')";*/
					
					if(empty($house))
							{
								$colour = $this->gethouse();
							}
							
					$query="INSERT INTO tblstudent(id,stud_id,lname,fname,mname,class,passw,gender,email,dob,stateorigin,lga,reli,placeofb,arm,house,specifi,residencepref,homadd,imgpath,phone,schattended,dateregistered) VALUES('','$uname','$lname','$fname','$mname','$class','".sha1($password)."','$gender','$email','$dob','$soo','$lga','$rel','$pob','$arm','$colour','$spe','$rp','$ha','$pp','$phone','$sawd','".time()."')";
					
					//return $query;
					$result = mysql_query($query) or die(mysql_error());
					
					if($result)
					{
						$this->audit->audit_log("Admin ".$_SESSION['username']." added a new student - ".$lname." ".$fname." ".$uname);
						return '<strong><font color="#3300FF" size="-2">Student with username '.$uname.' and password '.$password.'</font></strong><font color="#006600" size="-2"> was successfully registered</font>';
					}
				}
				else
				{
					return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
				}
			}//try
			catch(Exception $exc)
			{
				echo ($exc->getMessage() . "<br>");
			}
	
	}
	
	function  Admin_Update_Student()
	{   
		
		  $stud_id = $this->fm->processfield($_POST['user']);
		  $lname = $this->fm->processfield($_POST['lname']);
		  $fname = $this->fm->processfield($_POST['fname']);
		  $mname =$this->fm->processfield($_POST['mname']);
		  $class = $_POST['class'];
		  $arm = $_POST['arm'];
		  $gender = $_POST['gender'];
		  $email = $_POST['email'];
		  $dob =$_POST['dob'];
		  $soo = $_POST['state'];
		  $lga =$_POST['lga'];
		  $rel = $_POST['rel'];
		  $pob = $_POST['pob'];
		  $spe =$_POST['spe'];
		  $rp= $_POST['rp'];
		  $pp = $_POST['pp'];
		  $ha = $this->fm->processfield($_POST['ha']);
		  $phone = $this->fm->processfield($_POST['phone']);
		  
		  	if(empty($lname)||empty($fname))
			{
				return '<font color="#FF0000" size="-2">Please make sure all fields are filled!</font>';
			}
			
					$query="UPDATE tblstudent SET fname = '$fname', mname = '$mname', lname = '$lname', class = '$class', arm = '$arm',gender = '$gender',email ='$email',dob= '$dob',stateorigin ='$soo' ,lga = '$lga',reli= '$rel',placeofb = '$pob' ,specifi = '$spe' ,residencepref = '$rp',homadd = '$ha', phone='$phone', imgpath = '$pp' WHERE stud_id = '$stud_id'";
					
					//return $query;
					$result = mysql_query($query) or die(mysql_error());
					
					if($result)
					{
						$this->audit->audit_log("Admin ".$_SESSION['username']." added a new student - ".$lname." ".$fname." ".$uname);
						return "<font color='#006600' size='-2'> $lname   $fname   $mname, record updated successfully! </font>";
					} 
				
	
	}
	
	//------------------------
	function Add_House()
	{
	 
		  $housename = $this->fm->processfield(strtoupper($_POST['housename']));
		  $colour = $this->fm->processfield(strtoupper( $_POST['colour'])); 
		  $staffinch = $this->fm->processfield(strtoupper( $_POST['staff']));  
		   
		   if(empty($housename)||empty($colour))
			{
				return '<font color="#FF0000" size="-2">Please make sure all fields are filled!</font>';
			}
			
			try {
			    $sql = mysql_query("SELECT * from tblhouse") or die(mysql_error());
				
				$no_rows = mysql_num_rows($sql);
				
				$rs1 = mysql_fetch_array($sql);
				
				$houseid = $no_rows + 1;
				
				if ($no_rows == 0) 
				{
					//$houseid = $rs1['houseid'] + 1;
					$inhouse = "INSERT into tblhouse (id,houseid,staffincharge,housename,colour,pointer)VALUES ('','$houseid','$staffinch','$housename', '$colour','1')";
					
					$inhou = mysql_query($inhouse);

                   return '<strong><font color="#3300FF" size="-2">House name: '.$housename.' and Colour:'.$colour.' created successfully</font></strong>';
				}
					else
				{
					
					$sql34 = mysql_query("SELECT * from tblhouse WHERE colour ='$colour' OR housename = '$housename'") or die(mysql_error());
					$result = mysql_num_rows($sql34);
					 if ($result==0)
					 {
					   $inhouse = "INSERT into tblhouse (houseid,housename,colour,pointer)VALUES ('$houseid','$housename', '$colour','0')";
					   $inhou = mysql_query($inhouse);

                     return '<strong><font color="#3300FF" size="-2">House name: '.$housename.' and Colour:'.$colour.' created successfully</font></strong>';	
					 }
					 else
					 {
					
					 return '<strong><font color="#3300FF" size="-2">The House name or Colour already exist!</font></strong>';		
					 }
				}
			  
			  }//try
			catch(Exception $exc)
			{
				echo ($exc->getMessage() . "<br>");
			}
	}
	
}
?>