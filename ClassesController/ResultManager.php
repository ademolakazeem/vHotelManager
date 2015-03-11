<?php
		require_once("DBDirect.php");
		require_once('audit.php');
		require_once('Utilities.php');

class ResultManager
{
	private $db, $audit,$util;
	
	function __construct()
	{
		$this->db = new DBConnecting();
		$this->audit = new AuditLog();
		$this->util = new Utilities();
	} 


///=========================-------------------temporary code for addScorePerSubject------------------------=============================

public function tempaddScorePerSubject()
	{
		$class = $_POST['class'];
		$subject = base64_decode($_POST['subject']);
		
		//capture each student's id from checkbox
		$arrayStudid = $_POST['list'];
		//return $staffid;
		//getCurrentSession
		//$cursession = $this->util->getCurrentSession();
		//$sepsess = split("_", $cursession);
		
		$onsession = "2011/2012";
		$onterm = "FIRST";
		$onterm2 = "SECOND";
		
		//split $class into class and arm
		$arrCl = split("_",$class);
		$classn = $arrCl[0];
		$arm = $arrCl[1];
		
		if(count($arrayStudid) == 0)
		{
			return '<font color="#FF0000" size="-2">Please select at least 1 student</font>';
		}
			
			$num = 0;
			foreach($arrayStudid as $stud)
			{
				$term1 = $_POST[$stud."1"];
				$term2 = $_POST[$stud."2"];
				
				$name=$this->util->getStudentName($stud);
				
				$num++;
				
					$sql = mysql_query("SELECT * FROM tblreportcard WHERE stud_id='$stud' AND class ='$classn' AND subject = '$subject' AND arm = '$arm' AND term='$onterm' AND session='$onsession'") or die(mysql_error());
					$no_rows = mysql_num_rows($sql);
				
				//if no such record insert else update
				if ($no_rows == 0) 
				{
					$query="INSERT INTO tblreportcard(id,name,stud_id,subject,session,term,class,arm,total,daterecord)
						VALUES('', '$name','$stud', '$subject', '$onsession', '$onterm', '$classn', '$arm', '$term1', '".time()."')";
						
						//return $query;
						$result = mysql_query($query) or die(mysql_error());
						
				}
				else
				{
					$query="UPDATE tblreportcard SET total='$term1',daterecord='".time()."' WHERE stud_id='$stud' AND class ='$classn' AND subject = '$subject' AND arm = '$arm' AND term='$onterm' AND session='$onsession'";
						
						//return $query;
						$result = mysql_query($query) or die(mysql_error());
				}
				
				
				//FOR SECOND TERM
				
				$sql2 = mysql_query("SELECT * FROM tblreportcard WHERE stud_id='$stud' AND class ='$classn' AND subject = '$subject' AND arm = '$arm' AND term='$onterm2' AND session='$onsession'") or die(mysql_error());
					$no_rows2 = mysql_num_rows($sql2);
				
				//if no such record insert else update
				if ($no_rows2 == 0) 
				{
					$query2="INSERT INTO tblreportcard(id,name,stud_id,subject,session,term,class,arm,total,daterecord)
						VALUES('','$name', '$stud', '$subject', '$onsession', '$onterm2', '$classn', '$arm','$term2', '".time()."')";
						
						//return $query;
						$result2 = mysql_query($query2) or die(mysql_error());
						
				}
				else
				{
					$query2="UPDATE tblreportcard SET total='$term2',daterecord='".time()."' WHERE stud_id='$stud' AND class ='$classn' AND subject = '$subject' AND arm = '$arm' AND term='$onterm2' AND session='$onsession'";
						
						//return $query;
						$result2 = mysql_query($query2) or die(mysql_error());
				}
				
				
			}//end for each
			
			$this->audit->audit_log("Admin ".$_SESSION['username']." updated ".$subject." result for class ".$classn." ".$arm);
			return '<font color="#006600" size="-2">'.$subject.' result was updated successfully! for class '.$classn.' '.$arm.'</font>';
				
				
	 }//end addMultiscore temporary
			
	

public function tempaddScoreForMultiSubject()
		
		{
		$class = $_POST['class'];
		$arm = $_POST['arm'];
		$stud = $_POST['studid'];
		
		$name = $this->util->getStudentName($stud);
		
		//capture each student's id from checkbox
		$arraySubject = $_POST['list'];
		//return $staffid;
		//getCurrentSession
		//$cursession = $this->util->getCurrentSession();
		//$sepsess = split("_", $cursession);
		
		$onsession = "2011/2012";
		$onterm = "FIRST";
		
		if(count($arraySubject) == 0)
		{
			return '<font color="#FF0000" size="-2">Please select at least 1 subject</font>';
		}
			
			$num = 0;
			foreach($arraySubject as $subj)
			{
				//SPLIT SUBJECT
				$subSplit = split("_",$subj);
				$subject = $subSplit[0];
				$ID = $subSplit[1];
				
				
				$formorder1 = $_POST[$ID."_1"];
				$formorder2 = $_POST[$ID."_2"];
				$exam = $_POST[$ID."_3"];
				$total = $formorder1 + $formorder2 + $exam;
				
				$num++;
				
					$sql = mysql_query("SELECT * FROM tblreportcard WHERE stud_id='$stud' AND class ='$class' AND subject = '$subject' AND arm = '$arm' AND term='$onterm' AND session='$onsession'") or die(mysql_error());
					$no_rows = mysql_num_rows($sql);
				
				//if no such record insert else update
				if ($no_rows == 0) 
				{
					$query="INSERT INTO tblreportcard(id,name,stud_id,subject,session,term,class,arm,formorder1,formorder2,exam,total,daterecord)
						VALUES('','$name', '$stud', '$subject', '$onsession', '$onterm', '$class', '$arm', '$formorder1', '$formorder2', '$exam', '$total', '".time()."')";
						
						//return $query;
						
						$result = mysql_query($query) or die(mysql_error());
						
				}
				else
				{
					$query="UPDATE tblreportcard SET formorder1='$formorder1', formorder2='$formorder2',exam='$exam',total='$total',daterecord='".time()."' WHERE stud_id='$stud' AND class ='$class' AND subject = '$subject' AND arm = '$arm' AND term='$onterm' AND session='$onsession'";
						
					//return $query;	
						$result = mysql_query($query) or die(mysql_error());
				}
				
			}//end for each
			
			$this->audit->audit_log("Admin ".$_SESSION['username']." updated ".$stud." result for class ".$class." ".$arm);
			return '<font color="#006600" size="-2">Result was updated successfully!</font>';
				
				
	 }//end addMultiscore
	 
	 //-------------------
	 
	
	public function addScorePerSubject()
	{
		$class = $_POST['class'];
		$subject = $_POST['subject'];
		
		//capture each student's id from checkbox
		$arrayStudid = $_POST['list'];
		//return $staffid;
		//getCurrentSession
		$cursession = $this->util->getCurrentSession();
		$sepsess = split("_", $cursession);
		
		$onsession = $sepsess[0];
		$onterm = $sepsess[1];
		
		//split $class into class and arm
		$arrCl = split("_",$class);
		$classn = $arrCl[0];
		$arm = $arrCl[1];
		
		if(count($arrayStudid) == 0)
		{
			return '<font color="#FF0000" size="-2">Please select at least 1 student</font>';
		}
			
			$num = 0;
			foreach($arrayStudid as $stud)
			{
				$formorder1 = $_POST[$stud."1"];
				$formorder2 = $_POST[$stud."2"];
				$exam = $_POST[$stud."3"];
				$total = $formorder1 + $formorder2 + $exam;
				
				$num++;
				
				$name = $this->util->getStudentName($stud);
				
					$sql = mysql_query("SELECT * FROM tblreportcard WHERE stud_id='$stud' AND class ='$classn' AND subject = '$subject' AND arm = '$arm' AND term='$onterm' AND session='$onsession'") or die(mysql_error());
					$no_rows = mysql_num_rows($sql);
				
				//if no such record insert else update
				if ($no_rows == 0) 
				{
					$query="INSERT INTO tblreportcard(id,name,stud_id,subject,session,term,class,arm,formorder1,formorder2,exam,total,daterecord)
						VALUES('','$name', '$stud', '$subject', '$onsession', '$onterm', '$classn', '$arm', '$formorder1', '$formorder2', '$exam', '$total', '".time()."')";
						
						//return $query;
						$result = mysql_query($query) or die(mysql_error());
						
				}
				else
				{
					$query="UPDATE tblreportcard SET formorder1='$formorder1', formorder2='$formorder2',exam='$exam',total='$total',daterecord='".time()."' WHERE stud_id='$stud' AND class ='$classn' AND subject = '$subject' AND arm = '$arm' AND term='$onterm' AND session='$onsession'";
						
						//return $query;
						$result = mysql_query($query) or die(mysql_error());
				}
				
			}//end for each
			
			$this->audit->audit_log("Admin ".$_SESSION['username']." updated ".$subject." result for class ".$classn." ".$arm);
			return '<font color="#006600" size="-2">'.$subject.' result was updated successfully! for class '.$classn.' '.$arm.'</font>';
				
				
	 }//end addMultiscore
			
	//----------=======Adding score for all the subjects registered by a student=====================================
public function addScoreForMultiSubject()
		
		{
		$class = $_POST['class'];
		$arm = $_POST['arm'];
		$stud = $_POST['studid'];
		
		$name=$this->util->getStudentName($stud);
		
		//capture each student's id from checkbox
		$arraySubject = $_POST['list'];
		//return $staffid;
		//getCurrentSession
		$cursession = $this->util->getCurrentSession();
		$sepsess = split("_", $cursession);
		
		$onsession = $sepsess[0];
		$onterm = $sepsess[1];
		
		if(count($arraySubject) == 0)
		{
			return '<font color="#FF0000" size="-2">Please select at least 1 subject</font>';
		}
			
			$num = 0;
			foreach($arraySubject as $subj)
			{
				//SPLIT SUBJECT
				$subSplit = split("_",$subj);
				$subject = $subSplit[0];
				$ID = $subSplit[1];
				
				
				$formorder1 = $_POST[$ID."_1"];
				$formorder2 = $_POST[$ID."_2"];
				$exam = $_POST[$ID."_3"];
				$total = $formorder1 + $formorder2 + $exam;
				
				$num++;
				
					$sql = mysql_query("SELECT * FROM tblreportcard WHERE stud_id='$stud' AND class ='$class' AND subject = '$subject' AND arm = '$arm' AND term='$onterm' AND session='$onsession'") or die(mysql_error());
					$no_rows = mysql_num_rows($sql);
				
				//if no such record insert else update
				if ($no_rows == 0) 
				{
					$query="INSERT INTO tblreportcard(id,name,stud_id,subject,session,term,class,arm,formorder1,formorder2,exam,total,daterecord)
						VALUES('','$name', '$stud', '$subject', '$onsession', '$onterm', '$class', '$arm', '$formorder1', '$formorder2', '$exam', '$total', '".time()."')";
						
						//return $query;
						
						$result = mysql_query($query) or die(mysql_error());
						
				}
				else
				{
					$query="UPDATE tblreportcard SET formorder1='$formorder1', formorder2='$formorder2',exam='$exam',total='$total',daterecord='".time()."' WHERE stud_id='$stud' AND class ='$class' AND subject = '$subject' AND arm = '$arm' AND term='$onterm' AND session='$onsession'";
						
					//return $query;	
						$result = mysql_query($query) or die(mysql_error());
				}
				
			}//end for each
			
			$this->audit->audit_log("Admin ".$_SESSION['username']." updated ".$stud." result for class ".$class." ".$arm);
			return '<font color="#006600" size="-2">Result was updated successfully!</font>';
				
				
	 }//end addMultiscore
	 
	 //-------------------
	 
	 public function getAllScores($studid,$onsession,$onterm,$class,$arm,$subject)
	 {
		 $qry="SELECT * FROM tblreportcard WHERE stud_id='$studid' and subject = '$subject' and session='$onsession' and term='$onterm' and class='$class'";
		 
		 $res=$this->db->fetchData($qry);
		 
		 return $res['formorder1']."_".$res['formorder2']."_".$res['exam'];
	 }
	 
	 
	 public function tempGetAllScores1($studid,$onsession,$onterm,$class,$arm,$subject)
	 {
		 $qry="SELECT * FROM tblreportcard WHERE stud_id='$studid' and subject = '$subject' and session='$onsession' and term='$onterm' and class='$class'";
		 
		 $res=$this->db->fetchData($qry);
		 
		 return $res['total'];
	 }
	 
	 public function tempGetAllScores2($studid,$onsession,$onterm,$class,$arm,$subject)
	 {
		 $qry="SELECT * FROM tblreportcard WHERE stud_id='$studid' and subject = '$subject' and session='$onsession' and term='$onterm' and class='$class'";
		 
		 $res=$this->db->fetchData($qry);
		 
		 return $res['total'];
	 }
	 
	 
	 
	//----------=======Adding comment by house master===================================== 
	 
public function housemastercomment()
	{
		
		
		
		//capture each student's  id from checkbox
		$arrayComment = $_POST['list'];
		
		//getCurrentSession
		$cursession = $this->util->getCurrentSession();
		$sepsess = split("_", $cursession);
		
		$onsession = $sepsess[0];
		$onterm = $sepsess[1];
		
		$date = date("l, F d, Y h:i" ,time());
		
		if(count($arrayComment) == 0)
		{
			return '<font color="#FF0000" size="-2">Please select at least 1 student</font>';
		}
			
			$num = 0;
			foreach($arrayComment as $stud)
			{
				//SPLIT SUBJECT
				//$subSplit = split("_",$comment);
				//$comment1 = $subSplit[0];
				//$comm= $subSplit[1];
				
				$class = $_POST[$stud."class"];
		          $arm = $_POST[$stud."arm"];
				$comment1 = $_POST[$stud."_1"];
				$comment2 = $_POST[$stud."_2"];
				
					
							$num++;
				
					$sql = mysql_query("select * from tblcomment WHERE stud_id='$stud' AND class ='$class' AND arm = '$arm' AND term='$onterm' AND session='$onsession'") or die(mysql_error());
					
										
					$no_rows = mysql_num_rows($sql);
				
								//if no such record insert else update
				if ($no_rows == 0) 
				{
					
					$query="INSERT INTO tblcomment(hm1,hm2,class,arm,session,term,stud_id,dateadded) VALUES ('$comment1', '$comment2','$class','$arm','$onsession','$onterm','$stud',$date)";
						//return $query;
						
						$result = mysql_query($query) or die(mysql_error());
						
				}
				else
				{
					$query="UPDATE tblcomment SET hm1='$comment1', hm2='$comment2', dateadded= '$date' WHERE stud_id='$stud' AND class ='$class' AND arm = '$arm' AND term='$onterm' AND session='$onsession'";
						
					//return $query;	
						$result = mysql_query($query) or die(mysql_error());
				}
				
			}//end for each
			
			//$this->audit->audit_log("Admin ".$_SESSION['username']." updated ".$stud." result for class ".$class." ".$arm);
			return '<font color="#006600" size="-2">Comment was added successfully!</font>';
				
				
	 }//end hmaster comment
	 
	 
	 function principalcomment()
{
	$stud = $_POST['stud'];
	$class = $_POST['class'];
	$arm = $_POST['arm'];
	$session = $_POST['session'];
	$term = $_POST['term'];
	
	$ppl1 = $_POST['ppl1']; 
	$ppl2 = $_POST['ppl2'];
	$date =  date("l, F d, Y h:i" ,time());
	
	$qry1 = "SELECT * FROM tblcomment WHERE stud_id = '$stud' AND session = '$session' AND term ='$term'AND class='$class' AND arm = '$arm'";
	
	$savecom1 = mysql_query($qry1) or die(mysql_error()); //na here
	
	$result = mysql_fetch_array($savecom1);
	$olddate= $result['dateadded'];
	$row_num = mysql_num_rows($savecom1);
	
	if ($row_num == 0)
	{
	$qry = "INSERT INTO tblcomment (ppl1,ppl2,term,class,arm,stud_id,dateadded) VALUES ($ppl1','$ppl2','$session','$term','$class','$arm','$stud','$date')";
	$savecom = mysql_query($qry) or die(mysql_error()); //na here

   return '<font color="#006600" size="-1">Comment is added successfully.</font>';
	}
    else
	{
		$qry2 = "update tblcomment set ppl1 = '$ppl1',session = '$session',term ='$term',class = '$class',arm = '$arm',stud_id = '$stud',dateadded = '$date' where stud_id = '$stud'";
		$savecom = mysql_query($qry2) or die(mysql_error()); //na here
		return '<font color="#006600" size="-1">The result was Commented on,  ' .$olddate.  'now updated</font>';
    }
}
           

	//------------------------================end of principal's comment===============-------------------------- 
	
	//------------------------================beginning of  comment teacher's===============-------------------------- 
	 
function teachercomment()
{
	$stud = $_POST['stud'];
	$class = $_POST['class'];
	$arm = $_POST['arm'];
	$session = $_POST['session'];
	$term = $_POST['term'];
	
	$neat = $_POST['neat'];
	$pun = $_POST['pun'];
	$obed = $_POST['obed'];
	$rwithstud= $_POST['rwithstud'];
	$relia = $_POST['relia'];
	$attent = $_POST['attent'];
	$init = $_POST['init'];
	$scon = $_POST['scon'];
	$sor = $_POST['sor'];
	$soc = $_POST['soc'];
	
	$ft1 = $_POST['ft1'];
	$ft2 = $_POST['ft2'];
	
	$date =  date("l, F d, Y h:i" ,time());
	
	echo $neat;
	$qry1 = "SELECT * FROM tblcomment WHERE stud_id = '$stud' AND session = '$session' AND term ='$term'AND class='$class' AND arm = '$arm'";
	
	$savecom1 = mysql_query($qry1) or die(mysql_error()); //na here
	
	$result = mysql_fetch_array($savecom1);
	$olddate= $result['dateadded'];
	$row_num = mysql_num_rows($savecom1);
	
	if ($row_num == 0)
	{
	$qry = "INSERT INTO tblcomment     (neat,pun,obed,rwithstud,relia,attent,init,scon,sor,soc,ft1,ft2,session,term,class,arm,stud_id,dateadded) VALUES ('$neat', '$pun','$obed','$rwithstud','$relia', '$attent','$init','$scon', '$sor', '$soc','$ft1','$ft2','$session','$term','$class','$arm','$stud','$date')";
	$savecom = mysql_query($qry) or die(mysql_error()); //na here

   return '<font color="#006600" size="-1">Comment is added successfully.</font>';
	}
    else
	{
		$qry2 = "UPDATE tblcomment SET neat='$neat',pun ='$pun',obed ='$obed',rwithstud='$rwithstud',relia = '$relia' scon ='$scon',sor = '$soc',soc ='$soc',ft1 = '$ft1',ft2 = '$ft2',session = '$session',term ='$term',class = '$class',arm = '$arm',stud_id = '$stud',dateadded = '$date' where stud_id = '$stud'";
		
		$savecom = mysql_query($qry2) or die(mysql_error()); //na here
		return '<font color="#006600" size="-1">The result was Commented on,  ' .$olddate.  '   now updated</font>';
    }
}
//------------------------================end of teacher's comment===============-------------------------- 
	            

	
	 
}

?>