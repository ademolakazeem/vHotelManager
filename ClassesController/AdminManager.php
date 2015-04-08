<?php
		require_once("DBDirect.php");
		require_once('audit.php');
		require_once('format.php');
		
class AdminController
{
	private $db, $audit,$fm;
	
	function __construct()
	{
		$this->db = new DBConnecting();
		$this->audit = new AuditLog();
		$this->fm = new Format();
	}
	
	public function adminLogin()
	{
		$username = $this->fm->processfield($_POST['userId']);
		$password = $this->fm->processfield($_POST['password']);

		if(empty($username) || empty($password))
		{
			//return "<div class='errortitle'>Please enter your valid login details!</div>";
			header("location:login.php?r=".base64_encode("empty"));
		}
		else
		{

			$qry = "SELECT * FROM users_tbl WHERE username = '$username' AND password = '".sha1($password)."'";
			
			//$res = $this->db->getNumOfRows($qry);
			//$fct = $this->db->fetchData($qry);
            $rowNumber = $this->db->getNumOfRows($qry);
            $getUserData = $this->db->fetchData($qry);
			
			if($rowNumber > 0)
			{
				//found grant access
				//create session here
				$_SESSION['username'] = $username;
				$_SESSION['adlogged'] = "true";
                $_SESSION['user_id'] = $getUserData['user_id'];
				$_SESSION['userfullname'] = $getUserData['fname']." ".$getUserData['lname'];
				$_SESSION['levelaccess'] = $getUserData['acclevel'];
                $_SESSION['imagepathavatar'] = $getUserData['imagepathavatar'];
				
				$this->audit->audit_log("User ".$_SESSION['username']." Successfully logged in");
				//header("location:../admin/admin_content/index.php");

                header("location:index.php");
			}
			else
			{
				header("location:login.php?r=".base64_encode('failed'));
			}
		}
	}
    public function addRoomFeatures()
    {
        $featurename = $this->fm->processfield($_POST['featurename']);
        $featuredescription = $this->fm->processfield($_POST['featuredescription']);
        $rate = $this->fm->processfield($_POST['rate']);


        //validate
        if(empty($featurename)||empty($featuredescription)||empty($rate))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all fields are filled!
             </div>';
            return $msg;
        }
        else {

            $qry = "SELECT * FROM room_feature_tbl WHERE feature_name = '$featurename'";

            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {
                //username in use
                //return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Feature name already in use, Try another Feature name!
             </div>';
                return $msg;
            } else {

                $insertQry = "INSERT INTO room_feature_tbl (feature_name,full_description, rate, created_date)
			VALUES('$featurename','$featuredescription','$rate','".date("Y-m-d H:i:s")."')";

                $res = $this->db->executeQuery($insertQry);

                if ($res) {
                    $this->audit->audit_log("User " . $_SESSION['username'] . " added a new room feature - " . $featurename);
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully registered a room feature!</p>
                              </div>';
                    return $msg;
                }
            }
        }

    }//end addRoomFeatures
    public function addHallFeatures()
    {
        $featureName = $this->fm->processfield($_POST['featureName']);
        $hallDescription = $this->fm->processfield($_POST['hallDescription']);
        $rate = $this->fm->processfield($_POST['rate']);


        //validate
        if(empty($featureName)||empty($hallDescription)||empty($rate))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all fields are filled!
             </div>';
            return $msg;
        }
        else {

            $qry = "SELECT * FROM hall_feature_tbl WHERE feature_name = '$featureName'";

            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {
                //username in use
                //return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Feature name already in use, Try another Feature name!
             </div>';
                return $msg;
            } else {

                $insertQry = "INSERT INTO hall_feature_tbl (feature_name,feature_description, feature_rate, created_date)
			VALUES('$featureName','$hallDescription','$rate','".date("Y-m-d H:i:s")."')";

                $res = $this->db->executeQuery($insertQry);

                if ($res) {
                    $this->audit->audit_log("User " . $_SESSION['username'] . " added a new room feature - " . $featureName);
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully registered a hall feature!</p>
                              </div>';
                    return $msg;
                }
            }
        }

    }
    public function addRoomSetup()
    {
        $roomNumber = $this->fm->processfield($_POST['roomNumber']);
        $roomName = $this->fm->processfield($_POST['roomName']);
        $featureId = $this->fm->processfield($_POST['featureId']);
        $availability = $this->fm->processfield($_POST['availability']);


        //validate
        if(empty($roomNumber)||empty($featureId)||empty($availability))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all fields are filled!
             </div>';
            return $msg;
        }
        else {

            $qry = "SELECT * FROM room_setup_tbl WHERE room_number = $roomNumber";

            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {

                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The room has already been setup, Try another room details!
             </div>';
                return $msg;
            } else {

                $insertQry = "INSERT INTO room_setup_tbl (room_number,room_name, feature_id,availability, created_date)
			VALUES('$roomNumber','$roomName','$featureId','$availability','".date("Y-m-d H:i:s")."')";

                $res = $this->db->executeQuery($insertQry);

                if ($res) {
                    $this->audit->audit_log("User " . $_SESSION['username'] . " added a new room feature - " . $roomNumber);
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully setup room!</p>
                              </div>';
                    return $msg;
                }
            }
        }

    }
    public function addHallSetup()
    {
        $hallName = $this->fm->processfield($_POST['hallName']);
        if(isset($_POST['hallNumber']))$hallNumber = $this->fm->processfield($_POST['hallNumber']);
        $hallNumber = $this->fm->processfield($_POST['hallNumber']);
        $featureId = $this->fm->processfield($_POST['featureId']);
        $availability = $this->fm->processfield($_POST['availability']);


        //validate
        if(empty($hallName)||empty($featureId)||empty($availability))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all fields are filled!
             </div>';
            return $msg;
        }
        else {

            $qry = "SELECT * FROM hall_setup_tbl WHERE hall_name = '$hallName'";

            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {

                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The hall has already been setup, Try another Hall name!
             </div>';
                return $msg;
            } else {

                $insertQry = "INSERT INTO hall_setup_tbl (hall_number, hall_name,hall_feature_id,availability, created_date)
			VALUES('$hallNumber','$hallName','$featureId','$availability','".date("Y-m-d H:i:s")."')";

                $res = $this->db->executeQuery($insertQry);

                if ($res) {
                    $this->audit->audit_log("User " . $_SESSION['username'] . " added a new hall information - " . $hallName);
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully completed hall setup!</p>
                              </div>';
                    return $msg;
                }
            }
        }

    }
    public function addBarSetup()
    {
        $itemType = $this->fm->processfield($_POST['itemType']);
        //if(isset($_POST['hallNumber']))$hallNumber = $this->fm->processfield($_POST['hallNumber']);
        $itemName = $this->fm->processfield($_POST['itemName']);
        $itemRate = $this->fm->processfield($_POST['rate']);
        $quantity = $this->fm->processfield($_POST['quantity']);
        $threshold = $this->fm->processfield($_POST['threshold']);


        //validate
        if(empty($itemType)||empty($itemName)||empty($itemRate)||empty($quantity)||empty($threshold))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all fields are filled!
             </div>';
            return $msg;
        }
        else if($threshold >= $quantity )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please threshold cannot be greater than or equal to quantity!
             </div>';
            return $msg;
        }
        else if(!is_numeric($threshold)||!is_numeric($quantity))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please only numbers are allowed!
             </div>';
            return $msg;
        }/*
        else if(!preg_match('/^[0-9,]+$/', $itemRate))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please only numbers is allowed!
             </div>';
            return $msg;
        }*/
         else
        {

            $qry = "SELECT * FROM bar_setup_tbl WHERE item_name = '$itemName'";

            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {

                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The Bar items has already been setup, Try another Hall name!
             </div>';
                return $msg;
            } else {

                $insertQry = "INSERT INTO bar_setup_tbl (item_type, item_name,item_rate,quantity,threshold,created_date)
			VALUES('$itemType','$itemName','$itemRate','$quantity','$threshold','".date("Y-m-d H:i:s")."')";

                $res = $this->db->executeQuery($insertQry);

                if ($res) {
                    $this->audit->audit_log("User " . $_SESSION['username'] . " added a new Bar Item information - " . $itemName);
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully completed Bar item setup!</p>
                              </div>';
                    return $msg;
                }
            }
        }

    }
    public function addUserSetup()
    {
        $firstname = $this->fm->processfield($_POST['firstname']);
        $lastname = $this->fm->processfield($_POST['lastname']);
        $address = $this->fm->processfield($_POST['address']);
        $email = $this->fm->processfield($_POST['email']);
        $city_town = $this->fm->processfield($_POST['city_town']);
        $phone_number = $this->fm->processfield($_POST['phone_number']);
        $dob = $this->fm->processfield($_POST['dob']);
        $sex = $this->fm->processfield($_POST['sex']);
        $username = $this->fm->processfield($_POST['username']);
        $password = $this->fm->processfield($_POST['password']);
        $cpassword = $this->fm->processfield($_POST['cpassword']);
        $acclevel = $this->fm->processfield($_POST['acclevel']);
        $about_me = $this->fm->processfield($_POST['about_me']);

        //echo date_diff(date("Y-m-d"),$dob);


        //validate
        if(empty($username)||empty($firstname)||empty($lastname)||empty($email)||empty($phone_number) ||empty($password)||empty($cpassword)
            ||empty($dob)||empty($acclevel) ||empty($sex)||empty($about_me)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }

        //if(strtotime("now")-strtotime($dob) < 15)
        //date("Y-m-d")
           // if(date_diff(strtotime(date("d-m-Y")),strtotime($dob)) < 15)
  /*
   *       if(strtotime("now")-strtotime($dob) < 15)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> You cannot create user who is less than 15 years!
             </div>';
            return $msg;
        }
*/
      /* if(!empty($dob)) {
           $ageResult = $this->validateAge($dob);
           return $ageResult;
       }
        */
        //, $min
        // $then will first be a string-date
        $then = strtotime($dob);
        //The age to be over, over +18
        $min = strtotime('+15 years', $then);
        //echo $min;
        if(time() < $min) {
            //die('Not 18');
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> You cannot create user who is less than 15 years!
             </div>';
            return $msg;
        }


        if(!empty($password) && strcmp($password, $cpassword) !=0 )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The password specified does not match!
             </div>';
            return $msg;

        }

        //check if the username has not beeen registered before

        $qry = "SELECT * FROM users_tbl WHERE username = '$username' or email='$email'";

        $row = $this->db->getNumOfRows($qry);
        if($row >0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> Username or Email already in use, Please try another username or Email!
             </div>';
            return $msg;

        }
        else
        {
            //generate 4digit random number
            $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);
            //call a method that returns school's shorth form
            $minshr = "VHM";
            $curDate=date('YmdHis');
            $userid = $minshr.$curDate.$serial;//generate

            //prepare to insert
            $insertQry = "INSERT INTO users_tbl (username, user_id,fname,lname,password,sex,dob,acclevel,email,address,city_town, phone,datereg, about_me)
			VALUES('$username','$userid','$firstname','$lastname','".sha1($password)."', '$sex','$dob', '$acclevel', '$email','$address','$city_town','$phone_number',
			'".date("Y-m-d H:i:s")."','$about_me')";

            $res = $this->db->executeQuery($insertQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." added a new user - ".$username);

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully registered one user more!</p>
                              </div>';
                return $msg;


            }
        }

    }//end reg staff
    public function validateAge($then)
    {
        //, $min
        // $then will first be a string-date
        $then = strtotime($then);
        //The age to be over, over +18
        $min = strtotime('+18 years', $then);
        //echo $min;
        if(time() < $min)  {
            //die('Not 18');
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> You cannot create user who is less than 15 years!
             </div>';
            return $msg;
        }
    }
   //Update Starts here
    public function updateUserSetup()
    {
        $firstname = $this->fm->processfield($_POST['firstname']);
        $lastname = $this->fm->processfield($_POST['lastname']);
        $address = $this->fm->processfield($_POST['address']);
        $email = $this->fm->processfield($_POST['email']);
        $city_town = $this->fm->processfield($_POST['city_town']);
        $phone_number = $this->fm->processfield($_POST['phone']);
        $dob = $this->fm->processfield($_POST['dob']);
        $sex = $this->fm->processfield($_POST['sex']);
        $about_me = $this->fm->processfield($_POST['about_me']);

        /*
         * $username = $this->fm->processfield($_POST['username']);
        $password = $this->fm->processfield($_POST['password']);
        $cpassword = $this->fm->processfield($_POST['cpassword']);
        $acclevel = $this->fm->processfield($_POST['acclevel']);
         *
         */



        if(empty($firstname)||empty($lastname)||empty($email)||empty($phone_number) ||empty($dob)||empty($sex)||empty($about_me)||empty($city_town)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }

       $then = strtotime($dob);
        //The age to be over, over +18
        $min = strtotime('+15 years', $then);
        //echo $min;
        if(time() < $min) {
            //die('Not 18');
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> You cannot create user who is less than 15 years!
             </div>';
            return $msg;
        }

        //update
        //username, user_id,fname,password,sex,dob,acclevel,email,address,city_town, phone,datereg, about_me)
		//	VALUES('$username','$userid','$fullname','".sha1($password)."', '$sex','$dob', '$acclevel', '$email','$address','$city_town','$phone_number',
        //        '".date("Y-m-d H:i:s")."','$about_me')";

        $upquery = "UPDATE users_tbl SET fname = '$firstname', lname='$lastname',sex ='$sex',dob ='$dob',email = '$email',	address = '$address',city_town = '$city_town',phone = '$phone_number',about_me='$about_me', updated_date ='".date("Y-m-d H:i:s")."'  WHERE user_id = '".$_SESSION['user_id']."'";

        $res = $this->db->executeQuery($upquery);

        if($res)
        {
            $this->audit->audit_log("User ".$_SESSION['username']." updated own information. ");

            $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thank you!
                                  </h4>
                                  <p>You have successfully updated your information!</p>
                              </div>';
            return $msg;


        }



    }
    public function updateUserPassword()
    {
        $currentPassword = $this->fm->processfield($_POST['current_password']);
        $newPassword = $this->fm->processfield($_POST['new_password']);
        $rtPassword = $this->fm->processfield($_POST['rt_password']);
        $acclevel = $this->fm->processfield($_POST['acclevel']);
       if (empty($currentPassword) || empty($newPassword) || empty($rtPassword) || empty($acclevel)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }
        if (!empty($newPassword) && strcmp($newPassword, $rtPassword) != 0) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The password specified does not match!
             </div>';
            return $msg;

        }
        //For file upload
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

        //End for file upload

        //$qry = "SELECT * FROM users_tbl WHERE user_id = '".$_SESSION['user_id'] ."'";
        $qry = "SELECT * FROM users_tbl WHERE password ='" . sha1($currentPassword) . "'";

        $row = $this->db->getNumOfRows($qry);
        if ($row <= 0) {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The password you specified is not correct, Please specify another!
             </div>';
            return $msg;

        }
        elseif ($row > 0) {

            $ownerid=$_SESSION['user_id'];
            $path="userAvatar";

           $filename = $ownerid."_".$_FILES["file"]["name"];

            if ((($_FILES["file"]["type"] == "image/png")||($_FILES["file"]["type"] == "image/jpeg")
                ||($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/pjpeg")))
            {

                $target_path = "../../imgs/uploads/".$path."/".$filename;
                $realpathAvatar = "../../imgs/uploads/".$path."/".$filename;
                //check if the user has a pix before remove it and replace

                if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_path))
                {

                    $pcqy ="";
                    if($path=="userAvatar")
                    {
                        //$_SESSION['staimage']=$realpath;
                        $pcqy = "SELECT * FROM users_tbl WHERE user_id='$ownerid'";
                        $pxdata = $this->db->fetchData($pcqy);
                        $imagename=$pxdata['imagepathavatar'];
                        //"../../".

                        //chmod($imagename, 0777);
                        if(!empty($imagename))unlink($imagename);

                        //$qry="UPDATE  users_tbl SET imagepathavatar='realpathAvater' WHERE user_id='".trim($ownerid)."'";
                        $qry="UPDATE  users_tbl SET password='".sha1($newPassword)."', acclevel='".$acclevel."', imagepathavatar='$realpathAvatar' WHERE user_id='".trim($ownerid)."'";

                        $res = $this->db->executeQuery($qry);
                        if($res)
                        {
                            $_SESSION['imageAvatar']=$realpathAvatar;
                             $this->audit->audit_log("User ".$_SESSION['username']." updated own password information and uploaded avatar");

                           /* unset($_SESSION['userfullname']);
                            unset($_SESSION['username']);
                            unset($_SESSION['adlogged']);
                            unset($_SESSION['levelaccess']);
                            unset($_SESSION['imagepathavatar']);
                            unset($_SESSION['user_id']);*/

                            $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thank you!
                                  </h4>
                                  <p>You have successfully updated your information! Please you have to <a href="logout.php"> Click here </a> to completely log out and Login back.</p>
                              </div>';
                                return $msg;

                        }

                    }

                }
                else
                {
                    $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> File Upload failed, please try again!
             </div>';
                    return $msg;
                }

            }//end if checking file type
            else
            {
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Error!</strong> Invalid File selected!
             </div>';
                return $msg;


            }




        }//elseif password correct


    }//updateUserPassword







   //End new Addition
















// method to update staff
 public function Update_Staff_By_Admin()
 {
		$user = $_POST['user'];   
	    $username = $_POST['username'];
		$title = $_POST['title'];
		$lname = $this->fm->processfield(strtoupper($_POST['lname']));
		$fname = $this->fm->processfield(strtoupper($_POST['fname']));
		$mname = $this->fm->processfield(strtoupper($_POST['mname']));
		$dob= $this->fm->processfield($_POST['dob']);
		$depart = $_POST['dep'];
		$sex = $_POST['sex'];
		$email = $this->fm->processfield($_POST['email']);
		$rank = $_POST['rank'];
		$grade =$_POST['grade'];
		$qua = $_POST['qua'];
		$homeadd= $this->fm->processfield($_POST['address']);
		$access = $_POST['access'];
		$phone = $_POST['phone'];
		$imagepath = $_POST['photo'];
		
		
		if(empty($lname)||empty($fname)||empty($rank)||empty($phone))
		{
			return '<font color="#FF0000" size="-2">Please make sure all fields are filled!</font>';
		}
		
			//update
				$upquery = "UPDATE tblstaff SET fname = '$fname',mname ='$mname',lname ='$lname',sex = '$sex',	dob = '$dob',dep = '$depart',email = '$email',rank = '$rank',gralevel='$grade', qua = '$qua',acclevel = '$access', imagepath = '$imagepath' ,address = '$homeadd',phone = '$phone' WHERE staff_id = '$user'";
				
				//return $upquery;
				$res = mysql_query($upquery) or die(mysql_error());//or die('na here');
					
				 return '<font color="#006600" size="-2">The record is updated!</font>';
			
	 }
    public function Update_Staff()
{
		$user = $_POST['user'];   
		$lname = $this->fm->processfield(strtoupper($_POST['lname']));
		$fname = $this->fm->processfield(strtoupper($_POST['fname']));
		$mname = $this->fm->processfield(strtoupper($_POST['mname']));
		$depart = $_POST['dep'];
		$sex = $_POST['gender'];
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		$homeadd= $_POST['ha'];
		$phone = $_POST['phone'];
		
		
		if(empty($lname)||empty($fname))
		{
			return '<font color="#FF0000" size="-2">Please make sure all fields are filled!</font>';
		}
		
			//update
				$upquery = "UPDATE tblstaff SET fname = '$fname',mname ='$mname',lname ='$lname',sex = '$sex',	dob = '$dob',dep = '$depart',email = '$email',	address = '$homeadd',phone = '$phone' WHERE staff_id = '$user'";
				
				
				//return $upquery;
				$res = mysql_query($upquery) or die(mysql_error());//or die('na here');
					
				 return '<font color="#009900" size="-2">The record is updated!</font>';
			
	 }
function Change_Password()
{

	$staff_id = $this->fm->processfield($_POST['user']);
	 $old = $this->fm->processfield($_POST['oldpass']);
  	 $new= $this->fm->processfield($_POST['newpass']);
     $confirm = $this->fm->processfield($_POST['cpass']);

        if(empty($old)||empty($new)||empty($confirm)||empty($staff_id))
		{
			return '<font color="#FF0000" size="-2">Please make sure all fields are filled!</font>';
		}
		
		if(!empty($old) && strcmp($new, $confirm) !=0 )
		{
			return '<font color="#FF0000" size="-2">Password mismatch</font>';
		}
		
		$qry = "SELECT * FROM tblstaff WHERE staff_id='$staff_id' and password = '".sha1($old)."'";
		
		//return $qry;
		
		$row = $this->db->getNumOfRows($qry);
		if($row == 0 )
		{
			//username in use
			return '<font color="#FF0000" size="-2">The Old password is incorrect or does not exist</font>';
		}
		else
		{
		
		$upquery = "UPDATE tblstaff SET password = '".sha1($new)."' WHERE staff_id = '$staff_id'";
		//return $upquery;
		$res = mysql_query($upquery) or die(mysql_error());//or die('na here');
					
		return '<font color="#009900" size="-2">Password Changed!</font>';
		}
}//end change password

function Reset_Password()
{
	// $staff_id = $_POST['staffid'];
	 $user = $_POST['username'];
  	 
        if(empty($user))
		{
			return '<font color="#FF0000" size="-2">Please, Enter the username in the box!</font>';
		}
		
				
		$qry = "SELECT * FROM tblstaff WHERE staff_id='$user'";
		
		//return $qry;
		
		$row = $this->db->getNumOfRows($qry);
		if($row == 0 )
		{
			//username in use
			return '<font color="#FF0000" size="-2">The Username does not exist</font>';
		}
		else
		{
		 $new = "cabinet";
		$upquery = "UPDATE tblstaff SET password = '".sha1($new)."' WHERE staff_id = '$user'";
		//return $upquery;
		$res = mysql_query($upquery) or die(mysql_error());//or die('na here');
					
		return '<font color="#FF0000" size="-2">Password Reset!</font>';
		}
}
    public function Add_news()
	{
		$title = $_POST['title'];
		$body = $_POST['editor1'];
		$date =  date("l, F d, Y h:i" ,time());

		
		//validate
		if(empty($title)||empty($body)||empty($date))
		{
			return '<font color="#FF0000" size="-2">Please make sure all fields are filled!</font>';
		}
		
		
		
			$insertQry = "INSERT INTO tblnews (title,body,date) 
			VALUES('$title','$body','$date')";
			
			$res = $this->db->executeQuery($insertQry);
			
				return '<font color="#006600" size="-2">The news was successfull added in the viewing area.</font>';
			
		
		
	}//end add news
function Edit_News()
{       $id = $_GET['id'];
        $title = $_POST['title'];
		$body = $_POST['body'];
		$date =  date("l, F d, Y h:i" ,time());

		
		//validate
		if(empty($title)||empty($body)||empty($date)||empty($id))
		{
			return '<font color="#FF0000" size="-2">Please make sure all fields are filled!</font>';
		}
		
		$updateQry = "UPDATE tblnews SET  title='$title',body='$body',date='$date' WHERE id = '$id'";
			
			$res = $this->db->executeQuery($updateQry);
			
				return '<font color="#006600" size="-2">The news was successfull updated in the viewing area.</font>';

		
}	
function  Remove_Staff()
{
       $remove = $_GET['staffid'];
	   
	   $query = "select * from tblstaff where staff_id = '$remove'";
	   
	   echo $remove;
	   $result = mysql_query($query);
	   $result1 = mysql_fetch_array($result);
	  
	   
	   $fname= $result1['fname'];
	   $mname= $result1['mname'];
	   $lname= $result1['lname'];
		
	    $query1 = "delete from tblstaff where staff_id='$remove'"; 
		$res = mysql_query($query1);    
		
			
	    return '<font color="#FF0000" size="-1">' .$fname."  ".$mname."  ".$lname. '  was successfull deleted from the staff record </font>';
			
}



} 

?>