<?php
		require_once("DBDirect.php");
		require_once('audit.php');

class Utilities 
{
	private $db, $audit,$util;
	
	function __construct()
	{
		$this->db = new DBConnecting();
		$this->audit = new AuditLog();
	}
	
	public function addStafflinks()
	{
		$label = $_POST['link'];
		$url = $_POST['url'];
		$image = $_POST['path'];
		$access = $_POST['access'];
		
		$qry = "INSERT INTO admin_menu (id,image,label,link_url,accesslevel) VALUES('','$image','$label','$url','$access')";
		
		if($this->db->executeQuery($qry))
		{
			$this->audit->audit_log("Admin ".$_SESSION['username']." added a new staff link - ".$label);
			return '<font color="#006600" size="-2">You have successfully added a link!</font>';
		}
		else
		{
			return '<font color="#FF0000" size="-2">Operation not successful, Please try again</font>';
		}
		
	}
	public function updateStafflinks()
	{
		$label = $_POST['link'];
		$url = $_POST['url'];
		$image = $_POST['path'];
		$access = $_POST['access'];
		$linkid = $_POST['linkid'];
		
		$qry = "UPDATE admin_menu SET image ='$image',label='$label',link_url='$url',accesslevel='$access' WHERE id = $linkid";
		
		if($this->db->executeQuery($qry))
		{
			$this->audit->audit_log("Admin ".$_SESSION['username']." updated staff link - ".$label);
			return '<font color="#006600" size="-2">Link update was successful</font>';
		}
		else
		{
			return '<font color="#FF0000" size="-2">Operation not successful, Please try again</font>';
		}
	}
	public function updateStudlinks()
	{
		$label = $_POST['link'];
		$url = $_POST['url'];
		$image = $_POST['path'];
		
		$linkid = $_POST['linkid'];
		
		$qry = "UPDATE stud_menu SET image ='$image',label='$label',link_url='$url' WHERE id = $linkid";
		
		if($this->db->executeQuery($qry))
		{
			$this->audit->audit_log("Admin ".$_SESSION['username']." updated student link - ".$label);
			return '<font color="#006600" size="-2">Link update was successful</font>';
		}
		else
		{
			return '<font color="#FF0000" size="-2">Operation not successful, Please try again</font>';
		}	
	}
	public function getCurrentSession()
	{
		$qry = "SELECT * FROM tblsession WHERE sessionstatus = 1";
		$rs = $this->db->fetchData($qry);
		
		$onsession = $rs['session'];
		$onterm = $rs['term'];
		
		return $onsession."_".$onterm;
	}
	
	public function setSchoolName()
	{
		$school = $_POST['schoolname'];
		$shortfrm = $_POST['shortfrm'];
		$addr = $_POST['address'];
		
		$qry = "INSERT INTO tblschooldata (id,schoolname,shortform,address) VALUES('','$school','$shortfrm','$addr')";
		
		if($this->db->executeQuery($qry))
		{
			$this->audit->audit_log("Admin ".$_SESSION['username']." setup the school data");
			return '<font color="#006600" size="-2">Operation was successfully!</font>';
		}
		else
		{
			return '<font color="#FF0000" size="-2">Operation not successful, Please try again</font>';
		}
	}
	
	public function getSchoolShort()
	{
		$schQry = "select * from tblschooldata";
		$schData = $this->db->fetchData($schQry);
		return $sch = $schData['shortform'];
	}
	
	public function getUserName($userId)
	{
		$qry = "SELECT * FROM users_tbl WHERE user_id = '$userId'";
		$rs = $this->db->fetchData($qry);
        return $rs['fname'];
		//return $rs['title']." ".$rs['lname']." ".$rs['fname'];
	}
	
	public function getStudentClass($studid)
	{
		$qry = "SELECT * FROM tblstudent WHERE stud_id = '$studid'";
		$rs = $this->db->fetchData($qry);
		
		return $rs['class'];
	}
	
	public function getStudentName($studid)
	{
		$qry = "SELECT * FROM tblstudent WHERE stud_id = '$studid'";
		$rs = $this->db->fetchData($qry);
		
		return $rs['lname']." ".$rs['fname']." ".$rs['mname'];
	}
	
	
	
	////UPLOAD PIX
	
public function upload($path,$ownerid)
{
	//echo "Owner Id".$ownerid;
	if(empty($_FILES["file"]["name"]))
	{
        $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Select file to be uploaded!
             </div>';
        return $msg;

	}
	if($_FILES["file"]["size"] > 900000)
	{
        $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The photograph is more than the allowed upload size of 900kb!
             </div>';
        return $msg;

	}
	
	$filename = $ownerid."_".$_FILES["file"]["name"];
	
	if ((($_FILES["file"]["type"] == "image/png")||($_FILES["file"]["type"] == "image/jpeg")
	||($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/pjpeg")))
	{
				
					$target_path = "../../imgs/uploads/".$path."/".$filename;
					$realpath = "../../imgs/uploads/".$path."/".$filename;
					//check if the user has a pix before remove it and replace
					
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_path))
						{
							
							$pcqy ="";
							if($path=="user")
							{
								//$_SESSION['staimage']=$realpath;
								$pcqy = "SELECT * FROM users_tbl WHERE user_id='$ownerid'";
								$pxdata = $this->db->fetchData($pcqy);
								$imagename=$pxdata['imagepath'];
                                //"../../".

                                chmod($imagename, 0777);
								if(!empty($imagename))unlink($imagename);

                                $qry="UPDATE  users_tbl SET imagepath='$realpath' WHERE user_id='$ownerid'";
								//mysql_query("UPDATE users_tbl SET imagepath='$realpath' WHERE user_id='$ownerid'");

                                $res = $this->db->executeQuery($qry);
                                if($res)
                                {
                                    $_SESSION['image']=$realpath;
                                    $this->audit->audit_log("User ".$_SESSION['username']." uploaded picture for user ".$this->getUserName($ownerid));

                                    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>Picture uploaded successfully!</p>
                              </div>';
                                    return $msg;


                                }

							}
							/*
							 * else
							{	
								//$_SESSION['image']=$realpath;
								$pcqy = "SELECT * FROM tblstudent WHERE stud_id='$ownerid'";
								$pxdata = $this->db->fetchData($pcqy);
								$imagename="../".$pxdata['imgpath'];
								
								if(!empty($imagename)) unlink($imagename);
								
								mysql_query("UPDATE tblstudent SET imgpath='$realpath' WHERE stud_id='$ownerid'");
								$this->audit->audit_log("Admin ".$_SESSION['username']." uploaded picture ".$filename." for student ".$this->getStudentName($ownerid));
								
									$this->audit->audit_log($this->getStudentName($ownerid)." uploaded a picture ".$filename);
									return '<font color="#006600" size="-2">Picture uploaded successfully!</font>';
								
							}*/
						}
						else
                            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> File Upload failed, please try again!
             </div>';
        return $msg;

      	
		}//end if checking file type
		else
		{
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Invalid File selected!
             </div>';
            return $msg;


		}
}//end upload
	
}
?>