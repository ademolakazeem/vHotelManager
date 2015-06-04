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
        $discount = $this->fm->processfield($_POST['discount']);

        $userInAttendance=$_SESSION['username'];
        $delimiter=',';
        $rate=str_replace($delimiter, '', $rate);
        $discount=str_replace($delimiter, '', $discount);
        $pricePaid=floatval($rate)-floatval($discount);
        $rate=number_format($rate,2);
        $discount=number_format($discount,2);
        $pricePaid=number_format($pricePaid,2);


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
        if(floatval($rate) < floatval($discount))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Please discounts cannot be more than rate!
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

                $insertQry = "INSERT INTO room_feature_tbl (feature_name,full_description, rate, discount, price_paid, created_date, created_by)
			VALUES('$featurename','$featuredescription','$rate','$discount', '$pricePaid', '".date("Y-m-d H:i:s")."', '$userInAttendance')";

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
        //$hallNumber = $this->fm->processfield($_POST['hallNumber']);
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

                $insertQry = "INSERT INTO hall_setup_tbl (hall_name,hall_feature_id,availability, created_date)
			VALUES('$hallName','$featureId','$availability','".date("Y-m-d H:i:s")."')";
//'$hallNumber',
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
        //$delimiter=',';
        $itemType = $this->fm->processfield($_POST['itemType']);
        //if(isset($_POST['hallNumber']))$hallNumber = $this->fm->processfield($_POST['hallNumber']);
        $itemName = $this->fm->processfield($_POST['itemName']);
        $itemRate = $this->fm->processfield($_POST['rate']);
        //$itemRate = str_replace($delimiter, '', $this->fm->processfield($_POST['rate']));
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
            }

            else

            {
                $userInAttendance=$_SESSION['username'];
                $insertQry = "INSERT INTO bar_setup_tbl (item_type, item_name,item_rate,quantity,quantity_available,threshold,created_by, created_date)
			VALUES('$itemType','$itemName','$itemRate','$quantity','$quantity','$threshold','$userInAttendance','".date("Y-m-d H:i:s")."')";

                $insertHstQry = "INSERT INTO bar_setup_history_tbl (item_type, item_name,item_rate,quantity,quantity_available,threshold,created_by, created_date)
			VALUES('$itemType','$itemName','$itemRate','$quantity','$quantity','$threshold','$userInAttendance','".date("Y-m-d H:i:s")."')";

                $res = $this->db->executeQuery($insertQry);
                $resHist = $this->db->executeQuery($insertHstQry);

                if ($res && $resHist) {
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

        $qry = "SELECT * FROM users_tbl WHERE lower(username) = '".strtolower($username)."' or lower(email)='".strtolower($email)."'";

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
//setup ends here

    public function addRoomReservation()
    {
        $client_name = $this->fm->processfield($_POST['client_name']);
        $client_address = $this->fm->processfield($_POST['client_address']);
        $client_phone = $this->fm->processfield($_POST['client_phone']);
        $client_email = $this->fm->processfield($_POST['client_email']);
        $room_number = $this->fm->processfield($_POST['room_number']);
        $room_rate = $this->fm->processfield($_POST['room_rate']);
        $number_of_nights = $this->fm->processfield($_POST['number_of_nights']);
        $number_of_people = $this->fm->processfield($_POST['number_of_people']);
        $dateIn = $this->fm->processfield($_POST['dateIn']);
        $timeIn = $this->fm->processfield($_POST['timeIn']);
        $dateOut = $this->fm->processfield($_POST['dateOut']);
        //$timeOut = $this->fm->processfield($_POST['timeOut']);
        $visit_purpose = $this->fm->processfield($_POST['visit_purpose']);
        $reg_number = $this->fm->processfield($_POST['reg_number']);
        $model = $this->fm->processfield($_POST['model']);
        $color = $this->fm->processfield($_POST['color']);


        //echo date_diff(date("Y-m-d"),$dob);


        //validate
        if(empty($client_name)||empty($client_address)||empty($client_phone)||empty($room_number)||empty($room_rate) ||empty($number_of_nights)||empty($number_of_people)
            ||empty($dateIn)||empty($timeIn) ||empty($visit_purpose) ||empty($dateOut)
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

        if(!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }
        //, $min
        // $then will first be a string-date
        $inDate = strtotime($dateIn);
        $outDate=strtotime($dateOut);
        $inTime=strtotime($timeIn);

        if($outDate < $inDate)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Date Check out cannot come first!
               </div>';
            return $msg;


        }

        /* $then = strtotime($dateTimeIn);
         //The age to be over, over +18
       /* $min = strtotime('+15 years', $then);
          //echo $min;
       /* if(time() < $min) {
              //die('Not 18');
              $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> You cannot create user who is less than 15 years!
               </div>';
              return $msg;
          }*/



        //check if the username has not beeen registered before

        $qry = "SELECT * FROM room_reservation_tbl WHERE lower(client_name) = '". strtolower($client_name)."' and date_in='$dateIn'";

        $row = $this->db->getNumOfRows($qry);
        if($row >0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The client \'s accommodation has already in been reserved, Please try another Client!
             </div>';
            return $msg;

        }
        else
        {
            /*//generate 4digit random number
            $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);
            //call a method that returns school's shorth form
            $minshr = "VHM";
            $curDate=date('YmdHis');
            $userid = $minshr.$curDate.$serial;//generate*/
            $userInAttendance=$_SESSION['username'];
            $delimiter=',';
            $room_rate=str_replace($delimiter, '', $room_rate);
            $totalPrice= floatval($room_rate)*floatval($number_of_nights);
            $room_rate=number_format($room_rate,2);
            $totalPrice=number_format($totalPrice,2);


            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert
            $insertQry = "INSERT INTO room_reservation_tbl
                  (client_name, client_address,client_phone,client_email,room_number,rate,number_of_people,date_in,time_in,number_of_days,date_out, visit_purpose, car_reg_number,car_model,car_color,price_paid, attended_to_by, date_created)
			VALUES('$client_name','$client_address','$client_phone','$client_email','$room_number', '$room_rate','$number_of_people', '$dateIn', '$timeIn','$number_of_nights','$dateOut','$visit_purpose','$reg_number','$model', '$color','$totalPrice','$userInAttendance', '".date("Y-m-d H:i:s")."')";

            $updateQryAvail="UPDATE room_setup_tbl SET availability='Not Available', updated_date='".date("Y-m-d H:i:s")."' where room_number = '$room_number'";

            $res = $this->db->executeQuery($insertQry);
            $resUpd = $this->db->executeQuery($updateQryAvail);

            if($res && $resUpd)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." added a new user - ".$userInAttendance);

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully booked an accommodation for a client!</p>
                              </div>';
                return $msg;


            }
        }

    }//end addRoomReservation
    public function addHallReservation()
    {
        $client_name = $this->fm->processfield($_POST['client_name']);
        $client_address = $this->fm->processfield($_POST['client_address']);
        $client_phone = $this->fm->processfield($_POST['client_phone']);
        $client_email = $this->fm->processfield($_POST['client_email']);
        $hall_number = $this->fm->processfield($_POST['hall_number']);
        $hall_feature_rate = $this->fm->processfield($_POST['hall_feature_rate']);
        $purpose = $this->fm->processfield($_POST['purpose']);
        $number_of_days = $this->fm->processfield($_POST['number_of_days']);
        $startDate = $this->fm->processfield($_POST['startDate']);
        $startTime = $this->fm->processfield($_POST['startTime']);
        $endDate = $this->fm->processfield($_POST['endDate']);
        $endTime = $this->fm->processfield($_POST['endTime']);
        //echo date_diff(date("Y-m-d"),$dob);


        //validate
        if(empty($client_name)||empty($client_address)||empty($client_phone)||empty($hall_number)||empty($hall_feature_rate) ||empty($number_of_days)||empty($startDate)
            ||empty($startTime)||empty($endDate) ||empty($purpose) ||empty($endTime)
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

        if(!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }
        //, $min
        // $then will first be a string-date
        $inDate = strtotime($startDate);
        $outDate=strtotime($endDate);
        //$inTime=strtotime($startTime);

        if($outDate < $inDate)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Check out date cannot come first!
               </div>';
            return $msg;


        }

        //check if the username has not beeen registered before

        $qry = "SELECT * FROM hall_reservation_tbl WHERE lower(client_name) = '". strtolower($client_name)."' and start_date='$startDate'";

        $row = $this->db->getNumOfRows($qry);
        if($row >0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The hall has already in been reserved, Please try another Hall!
             </div>';
            return $msg;

        }
        else
        {
            /*//generate 4digit random number
            $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);
            //call a method that returns school's shorth form
            $minshr = "VHM";
            $curDate=date('YmdHis');
            $userid = $minshr.$curDate.$serial;//generate*/
            $userInAttendance=$_SESSION['username'];
            $delimiter=',';
            $hall_feature_rate=str_replace($delimiter, '', $hall_feature_rate);
            $totalPrice= floatval($hall_feature_rate)*floatval($number_of_days);
            $room_rate=number_format($hall_feature_rate,2);
            $totalPrice=number_format($totalPrice,2);


            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert

            $insertQry = "INSERT INTO hall_reservation_tbl
                  (client_name, client_address,client_email,client_phone,purpose_of_use,start_date,startTime,no_of_days,end_date,end_time, rate, hall_number,price_paid, attended_to_by, created_date)
			VALUES('$client_name','$client_address','$client_email','$client_phone','$purpose','$startDate','$startTime','$number_of_days','$endDate', '$endTime','$hall_feature_rate','$hall_number','$totalPrice','$userInAttendance', '".date("Y-m-d H:i:s")."')";

            $res = $this->db->executeQuery($insertQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." added a new user - ".$userInAttendance);

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully booked an hall for a client!</p>
                              </div>';
                return $msg;


            }
        }

    }//end addHallReservation
    public function addBarItem()
    {
        $delimiter=',';
        $itemId = $this->fm->processfield($_POST['item_id']);
        $itemRate=str_replace($delimiter, '', $this->fm->processfield($_POST['item_rate']));
        //echo "Item Rate:".$itemRate;
        $quantity= $this->fm->processfield($_POST['quantity']);



        //validate
        if(empty($itemId)||empty($itemRate)||empty($quantity)
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



       /* if($outDate < $inDate)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Check out date cannot come first!
               </div>';
            return $msg;


        }*/

        //check if the username has not beeen registered before

        /*$qry = "SELECT * FROM hall_reservation_tbl WHERE lower(client_name) = '". strtolower($client_name)."' and start_date='$startDate'";

        $row = $this->db->getNumOfRows($qry);
        if
        ($row >0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The hall has already in been reserved, Please try another Hall!
             </div>';
            return $msg;

        }
        else
        {*/

            /*//generate 4digit random number
            $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);
            //call a method that returns school's shorth form
            $minshr = "VHM";
            $curDate=date('YmdHis');
            $userid = $minshr.$curDate.$serial;//generate*/


            $userInAttendance=$_SESSION['username'];
            //$delimiter=',';
            //$itemRate=str_replace($delimiter, '', $itemRate);
            // echo "Item Rate".$itemRate;
            // echo "Quantity". $quantity;
            $totalPrice= floatval($itemRate)*floatval($quantity);
            //echo "Total Price".$totalPrice;
            $itemRate=number_format($itemRate,2);
            $totalPrice=number_format($totalPrice,2);
            //echo "Total Price after format".$totalPrice;

            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert

            $insertQry = "INSERT INTO bar_tbl
                  (item_id, quantity_sold,rate,total,attended_to_by, date_created)
			VALUES('$itemId','$quantity','$itemRate','$totalPrice','$userInAttendance', '".date("Y-m-d H:i:s")."')";

            $res = $this->db->executeQuery($insertQry);

            if($res)
            {

                $qtyQuery = "SELECT quantity_available qtyAvailable FROM `bar_setup_tbl` where quantity_available > 0 and item_id=$itemId";
                //echo "I got here after string qtyQuery and item_id:".$itemId;
                $qtyRow = $this->db->fetchData($qtyQuery);
                $qtyCounted=$qtyRow['qtyAvailable'];

                $newQtyAvail=floatval($qtyCounted) - floatval($quantity);
                //echo "<br>I got here after counted qtyCounted=".$qtyCounted.", quantity= ".$quantity." newQtyAvail =".$newQtyAvail;
                $updQuery = "UPDATE bar_setup_tbl SET quantity_available = '$newQtyAvail', updated_date ='".date("Y-m-d H:i:s")."'  WHERE item_id=$itemId";
                $upRes = $this->db->executeQuery($updQuery);
                //echo "<br>I got here after counted qtyCounted=".$qtyCounted.", quantity= ".$quantity." newQtyAvail =".$newQtyAvail;

               // echo "I got here after update";
                $this->audit->audit_log("User ".$_SESSION['username']." added a new user - ".$userInAttendance);

               /* $itemId=empty($itemId);
                    //= $this->fm->processfield($_POST['item_id']);
                $itemRate=empty($itemRate);
                //echo "Item Rate:".$itemRate;
                $quantity= empty($quantity);
                    //$this->fm->processfield($_POST['quantity']);*/
                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully saved item information!</p>

                              </div>';
                return $msg;


            }
        //}

    }//end addBarItem
    //addition ends here
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
    public function updateRoomReservation()
    {
        $clt_id = $this->fm->processfield($_POST['client_id']);
        $client_name = $this->fm->processfield($_POST['client_name']);
        $client_address = $this->fm->processfield($_POST['client_address']);
        $client_phone = $this->fm->processfield($_POST['client_phone']);
        $client_email = $this->fm->processfield($_POST['client_email']);
        $room_number = $this->fm->processfield($_POST['room_number']);
        $room_rate = $this->fm->processfield($_POST['room_rate']);
        $number_of_nights = $this->fm->processfield($_POST['number_of_nights']);
        $number_of_people = $this->fm->processfield($_POST['number_of_people']);
        $dateIn = $this->fm->processfield($_POST['dateIn']);
        $timeIn = $this->fm->processfield($_POST['timeIn']);
        $dateOut = $this->fm->processfield($_POST['dateOut']);
        //$timeOut = $this->fm->processfield($_POST['timeOut']);
        $visit_purpose = $this->fm->processfield($_POST['visit_purpose']);
        $reg_number = $this->fm->processfield($_POST['reg_number']);
        $model = $this->fm->processfield($_POST['model']);
        $color = $this->fm->processfield($_POST['color']);


        //echo date_diff(date("Y-m-d"),$dob);


        //validate
        if(empty($client_name)||empty($client_address)||empty($client_phone)||empty($room_number)||empty($room_rate) ||empty($number_of_nights)||empty($number_of_people)
            ||empty($dateIn)||empty($timeIn) ||empty($visit_purpose) ||empty($dateOut)
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

        if(!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }
        //, $min
        // $then will first be a string-date
        $inDate = strtotime($dateIn);
        $outDate=strtotime($dateOut);
        $inTime=strtotime($timeIn);

        if($outDate < $inDate)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Date Check out cannot come first!
               </div>';
            return $msg;


        }

        //check if the username has not beeen registered before

        $qry = "SELECT * FROM room_reservation_tbl WHERE room_reservation_id=$clt_id";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The client information does not exist, please create this client first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            /*//generate 4digit random number
            $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);
            //call a method that returns school's shorth form
            $minshr = "VHM";
            $curDate=date('YmdHis');
            $userid = $minshr.$curDate.$serial;//generate*/
            $userInAttendance=$_SESSION['username'];
            $delimiter=',';
            $room_rate=str_replace($delimiter, '', $room_rate);
            $totalPrice= floatval($room_rate)*floatval($number_of_nights);
            $room_rate=number_format($room_rate,2);
            $totalPrice=number_format($totalPrice,2);


            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert
            $insertQry = "UPDATE room_reservation_tbl SET client_name='$client_name', client_address='$client_address',client_phone='$client_phone',client_email='$client_email'
,room_number='$room_number',rate='$room_rate',number_of_people='$number_of_people',date_in='$dateIn',time_in='$timeIn',number_of_days='$number_of_nights',date_out='$dateOut',
visit_purpose='$visit_purpose', car_reg_number='$reg_number',car_model='$model',car_color='$color',price_paid='$totalPrice', attended_to_by='$userInAttendance', date_updated='".date("Y-m-d H:i:s")."' where room_reservation_id=".$clt_id."";

            $res = $this->db->executeQuery($insertQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated client information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an accommodation information for a client!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateRoomReservation
    public function updateHallReservation()
    {
        $clt_id = $this->fm->processfield($_POST['client_id']);
        $client_name = $this->fm->processfield($_POST['client_name']);
        $client_address = $this->fm->processfield($_POST['client_address']);
        $client_phone = $this->fm->processfield($_POST['client_phone']);
        $client_email = $this->fm->processfield($_POST['client_email']);
        $hall_number = $this->fm->processfield($_POST['hall_number']);
        $hall_feature_rate = $this->fm->processfield($_POST['hall_feature_rate']);
        $purpose = $this->fm->processfield($_POST['purpose']);
        $number_of_days = $this->fm->processfield($_POST['number_of_days']);
        $startDate = $this->fm->processfield($_POST['startDate']);
        $startTime = $this->fm->processfield($_POST['startTime']);
        $endDate = $this->fm->processfield($_POST['endDate']);
        $endTime = $this->fm->processfield($_POST['endTime']);

        //validate
        if(empty($client_name)||empty($client_address)||empty($client_phone)||empty($hall_number)||empty($hall_feature_rate) ||empty($number_of_days)||empty($startDate)
            ||empty($startTime)||empty($endDate) ||empty($purpose) ||empty($endTime)
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

        if(!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }
        //, $min
        // $then will first be a string-date
        $inDate = strtotime($startDate);
        $outDate=strtotime($endDate);
        //$inTime=strtotime($startTime);

        if($outDate < $inDate)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Check out date cannot come first!
               </div>';
            return $msg;


        }

        //check if the username has not beeen registered before

        $qry = "SELECT * FROM hall_reservation_tbl WHERE hall_reservation_id=$clt_id";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The client information does not exist, please create this client first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            /*//generate 4digit random number
            $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);
            //call a method that returns school's shorth form
            $minshr = "VHM";
            $curDate=date('YmdHis');
            $userid = $minshr.$curDate.$serial;//generate*/

            $userInAttendance=$_SESSION['username'];
            $delimiter=',';
            $hall_feature_rate=str_replace($delimiter, '', $hall_feature_rate);
            $totalPrice= floatval($hall_feature_rate)*floatval($number_of_days);
            $hall_feature_rate=number_format($hall_feature_rate,2);
            $totalPrice = number_format($totalPrice, 2);


            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert
            $updateQry = "UPDATE hall_reservation_tbl SET client_name='$client_name', client_address='$client_address',client_phone='$client_phone',client_email='$client_email'
,purpose_of_use='$purpose',rate='$hall_feature_rate',no_of_days='$number_of_days',start_date='$startDate',startTime='$startTime',end_date='$endDate',
price_paid='$totalPrice', attended_to_by='$userInAttendance', updated_date='".date("Y-m-d H:i:s")."' where hall_reservation_id=".$clt_id."";

            $res = $this->db->executeQuery($updateQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated client:".$client_name." hall information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an hall information for a client!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateHallReservation
    public function updateBarItem()
    {
        $itm_id = $this->fm->processfield($_POST['iitm_id']);
        $itemId = $this->fm->processfield($_POST['item_id']);
        $itemRate = $this->fm->processfield($_POST['item_rate']);
        $quantity= $this->fm->processfield($_POST['quantity']);

        //validate
        if(empty($itemId)||empty($itemRate)||empty($quantity) || empty($itm_id)
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


        //check if the username has not beeen registered before

        $qry = "SELECT * FROM bar_tbl WHERE bar_item_id=$itm_id";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The item information does not exist, please create this item first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            //Get the bar quantity for that item
            $qryQty=$this->db->fetchData($qry);
            $rowQSold=$qryQty['quantity_sold'];
            $rowItemId=$qryQty['item_id'];

            //Get the barsetup available quantity for the item
            $qtyQuery = "SELECT quantity_available qtyAvailable FROM `bar_setup_tbl` where quantity_available > 0 and item_id=$rowItemId";
            $qtyRow = $this->db->fetchData($qtyQuery);
            $qtyCounted=$qtyRow['qtyAvailable'];
            //echo "//Get the barsetup available quantity for the item ". $qtyCounted;

            //add them together
            $addQSold=floatval($rowQSold)+floatval($qtyCounted);
            echo "<br/>//add them together ".$addQSold;
            //update barsetup
            $updQSold = "UPDATE bar_setup_tbl SET quantity_available = '$addQSold', updated_date ='".date("Y-m-d H:i:s")."'  WHERE item_id=$rowItemId";
            $upResQSold = $this->db->executeQuery($updQSold);

            //Get the new quantity from form
            //Get the barsetup available quantity
            $qtyNewSold = "SELECT quantity_available qtyAvailable FROM `bar_setup_tbl` where quantity_available > 0 and item_id=$itemId";
            $qtyNewRowSold = $this->db->fetchData($qtyNewSold);
            $qtyNewCounted=$qtyNewRowSold['qtyAvailable'];

            //echo "//add them together ".$qtyNewCounted;

            //subtract them from each other
            $newQtyAvail=floatval($qtyNewCounted) - floatval($quantity);
            //echo "<br/>//subtract them from each other". $newQtyAvail;


            //update barsetup
            $updFinishQuery = "UPDATE bar_setup_tbl SET quantity_available = '$newQtyAvail', updated_date ='".date("Y-m-d H:i:s")."'  WHERE item_id=$itemId";
            $upResFinishQuery = $this->db->executeQuery($updFinishQuery);

            //echo "<br/>after //update barsetup";

            $userInAttendance=$_SESSION['username'];
            $delimiter=',';
            $itemRate=str_replace($delimiter, '', $itemRate);
            $totalPrice= floatval($itemRate)*floatval($quantity);
            $itemRate=number_format($itemRate,2);
            $totalPrice=number_format($totalPrice,2);
            //echo "<br/> after total price: ".$totalPrice ."and before last update updateQry";
            $updateQry = "UPDATE bar_tbl SET item_id='$itemId', quantity_sold='$quantity', rate='$itemRate',total='$totalPrice',attended_to_by='$userInAttendance', date_created= '".date("Y-m-d H:i:s")."' where bar_item_id='$itm_id'";
            $res = $this->db->executeQuery($updateQry);
            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated bar item of Item Id:".$itemId." information!");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an bar Item information!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateBarItem
    public function updateAccFeat()
    {
        $feature_id = $this->fm->processfield($_POST['feature_id']);
        $feature_name = $this->fm->processfield($_POST['feature_name']);
        $feature_description = $this->fm->processfield($_POST['full_description']);
        $rate = $this->fm->processfield($_POST['rate']);
        $discount = $this->fm->processfield($_POST['discount']);

        $delimiter=',';
        $rate=str_replace($delimiter, '', $rate);
        $discount=str_replace($delimiter, '', $discount);


        //validate
        if(empty($feature_name)||empty($feature_description)||empty($rate)||empty($discount)
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




        if(floatval($rate) < floatval($discount))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Please discounts cannot be more than rate!
               </div>';
            return $msg;


        }

        $qry = "SELECT * FROM room_feature_tbl WHERE feature_id=$feature_id";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The accommodation feature information does not exist, please create the feature first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            $userInAttendance=$_SESSION['username'];
            //$delimiter=',';
            //$rate=str_replace($delimiter, '', $rate);
            //$discount=str_replace($delimiter, '', $discount);
            $pricePaid=floatval($rate)-floatval($discount);
            $rate=number_format($rate,2);
            $discount=number_format($discount,2);
            $pricePaid=number_format($pricePaid,2);
            //$totalPrice= floatval($hall_feature_rate)*floatval($number_of_days);
            //$totalPrice = number_format($totalPrice, 2);


            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert
            $updateQry = "UPDATE room_feature_tbl SET feature_name='$feature_name', full_description='$feature_description', rate='$rate', discount='$discount', price_paid='$pricePaid', created_by='$userInAttendance', updated_date='".date("Y-m-d H:i:s")."' where feature_id=".$feature_id."";

            $res = $this->db->executeQuery($updateQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated :".$feature_name." room feature information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an Accommodation Feature information!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateAccFeat

    public function updateRoomSetup()
    {
        $roomId = $this->fm->processfield($_POST['room_id']);
        $roomNumber= $this->fm->processfield($_POST['roomNumber']);
        $roomName = $this->fm->processfield($_POST['roomName']);
        $featureId = $this->fm->processfield($_POST['featureId']);
        $availability = $this->fm->processfield($_POST['availability']);

/*
        $delimiter=',';
        $rate=str_replace($delimiter, '', $rate);
        $discount=str_replace($delimiter, '', $discount);*/


        //validate
        if(empty($roomId)||empty($roomNumber)||empty($roomName)||empty($featureId) || empty($availability)
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


        $qry = "SELECT * FROM room_setup_tbl WHERE room_id=$roomId";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The accommodation setup information does not exist, please create the information first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            $userInAttendance=$_SESSION['username'];
           /*
            *  //$delimiter=',';
            //$rate=str_replace($delimiter, '', $rate);
            //$discount=str_replace($delimiter, '', $discount);
            $pricePaid=floatval($rate)-floatval($discount);
            $rate=number_format($rate,2);
            $discount=number_format($discount,2);
            $pricePaid=number_format($pricePaid,2);
            //$totalPrice= floatval($hall_feature_rate)*floatval($number_of_days);
            //$totalPrice = number_format($totalPrice, 2);
           */


            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert
            $updateQry = "UPDATE room_setup_tbl SET room_number='$roomNumber', room_name='$roomName', feature_id='$featureId', availability='$availability', updated_date='".date("Y-m-d H:i:s")."' where room_id=".$roomId."";

            $res = $this->db->executeQuery($updateQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated :".$roomName." room setup information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an Accommodation Setup information!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateRoomSetup

    public function updateHallFeat()
    {
        $feature_id = $this->fm->processfield($_POST['feature_id']);
        $feature_name = $this->fm->processfield($_POST['feature_name']);
        $feature_description = $this->fm->processfield($_POST['full_description']);
        $rate = $this->fm->processfield($_POST['rate']);
        $discount = $this->fm->processfield($_POST['discount']);

        $delimiter=',';
        $rate=str_replace($delimiter, '', $rate);
        $discount=str_replace($delimiter, '', $discount);


        //validate
        if(empty($feature_name)||empty($feature_description)||empty($rate)||empty($discount)
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




        if(floatval($rate) < floatval($discount))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Please discounts cannot be more than rate!
               </div>';
            return $msg;


        }

        //check if the username has not beeen registered before

        $qry = "SELECT * FROM hall_feature_tbl WHERE hall_feature_id=$feature_id";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The hall feature information does not exist, please create the feature first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            $userInAttendance=$_SESSION['username'];
            //$delimiter=',';
            //$rate=str_replace($delimiter, '', $rate);
            //$discount=str_replace($delimiter, '', $discount);
            $pricePaid=floatval($rate)-floatval($discount);
            $rate=number_format($rate,2);
            $discount=number_format($discount,2);
            $pricePaid=number_format($pricePaid,2);
            //$totalPrice= floatval($hall_feature_rate)*floatval($number_of_days);
            //$totalPrice = number_format($totalPrice, 2);


            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert
            $updateQry = "UPDATE hall_feature_tbl SET feature_name='$feature_name', feature_description='$feature_description', feature_rate='$rate', discount='$discount', price_paid='$pricePaid', created_by='$userInAttendance', updated_date='".date("Y-m-d H:i:s")."' where hall_feature_id=".$feature_id."";

            $res = $this->db->executeQuery($updateQry);

            if($res)
            {
                // header('Location: '.$_SERVER['REQUEST_URI']);
                $this->audit->audit_log("User ".$_SESSION['username']." updated :".$feature_name." hall feature information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an hall Feature information!</p>
                              </div>';

                return $msg;


            }
        }

    }//end updateHallFeat

    public function updateHallSetup()
    {
        $hallNumber = $this->fm->processfield($_POST['hall_number']);
        $hallName= $this->fm->processfield($_POST['hall_name']);
        $featureId = $this->fm->processfield($_POST['feature_id']);
        $availability = $this->fm->processfield($_POST['availability']);

        /*
                $delimiter=',';
                $rate=str_replace($delimiter, '', $rate);
                $discount=str_replace($delimiter, '', $discount);*/


        //validate
        if(empty($hallNumber)||empty($hallName) ||empty($featureId) || empty($availability)
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


        $qry = "SELECT * FROM hall_setup_tbl WHERE hall_number=$hallNumber";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The hall setup information does not exist, please create the information first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            $userInAttendance=$_SESSION['username'];
            /*
             *  //$delimiter=',';
             //$rate=str_replace($delimiter, '', $rate);
             //$discount=str_replace($delimiter, '', $discount);
             $pricePaid=floatval($rate)-floatval($discount);
             $rate=number_format($rate,2);
             $discount=number_format($discount,2);
             $pricePaid=number_format($pricePaid,2);
             //$totalPrice= floatval($hall_feature_rate)*floatval($number_of_days);
             //$totalPrice = number_format($totalPrice, 2);
            */


            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert
            $updateQry = "UPDATE  hall_setup_tbl SET hall_name='$hallName', hall_feature_id='$featureId', availability='$availability', updated_date='".date("Y-m-d H:i:s")."', maker='$userInAttendance' where hall_number=".$hallNumber."";

            $res = $this->db->executeQuery($updateQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated :".$hallName." room setup information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an Hall Setup information!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateHallSetup
    public function updateBarSetup()
    {
        $item_id=$this->fm->processfield($_POST['item_id']);
        $itemType = $this->fm->processfield($_POST['itemType']);
        $itemName = $this->fm->processfield($_POST['itemName']);
        $itemRate = $this->fm->processfield($_POST['rate']);
        $quantity = $this->fm->processfield($_POST['quantity']);
        $quantityAvailable = $this->fm->processfield($_POST['quantityAvailable']);
        $oldQuantity=$this->fm->processfield($_POST['oldQuantity']);
        $threshold = $this->fm->processfield($_POST['threshold']);


        $userInAttendance=$_SESSION['username'];
        $delimiter=',';
        $oldQuantity=str_replace($delimiter, '', $oldQuantity);
        $quantity=str_replace($delimiter, '', $quantity);
        $newQty=floatval($oldQuantity)+floatval($quantity);
        $cmpQty=floatval($oldQuantity)+floatval($quantity);
        $oldQuantity=number_format(floatval($oldQuantity),2);
        $quantity=number_format(floatval($quantity),2);
        $newQty=number_format(floatval($newQty),2);
        $threshold=str_replace($delimiter, '', $threshold);
        $threshold=number_format(floatval($threshold),2);
        $quantityAvailable=str_replace($delimiter, '', $quantityAvailable);
        $quantityAvailable=number_format(floatval($quantityAvailable), 2);
        $newQtyAvailable=$quantityAvailable+$quantity;



        //validate
        if(empty($itemType)||empty($itemName)||empty($itemRate)||empty($threshold))
        {
            //empty($quantity)||
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all fields are filled!
             </div>';
            return $msg;
        }
        else if($threshold >= $cmpQty )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please threshold cannot be greater than or equal to quantity:'.$cmpQty.'
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
        }

        /*
                $delimiter=',';
                $rate=str_replace($delimiter, '', $rate);
                $discount=str_replace($delimiter, '', $discount);*/


        //validate


        $qry = "SELECT * FROM bar_setup_tbl WHERE item_id=$item_id";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The bar setup information does not exist, please create the information first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {



            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //$newQty=$oldQuantity+$quantity;
            //prepare to insert

            $updateQry = "UPDATE  bar_setup_tbl SET item_type='$itemType', item_name='$itemName', item_rate='$itemRate', quantity='$newQty', quantity_available='$newQtyAvailable', threshold='$threshold', updated_date='".date("Y-m-d H:i:s")."', created_by='$userInAttendance' where item_id=".$item_id."";
            $insertQry = "INSERT INTO bar_setup_history_tbl(item_type, item_name, item_rate, quantity, quantity_available, threshold, created_by, created_date, status)
                          VALUES('$itemType','$itemName', '$itemRate', '$quantity', '$quantityAvailable', '$threshold', '$userInAttendance','".date("Y-m-d H:i:s")."', 'Update: After Updating an item information');";
            //SET item_type='$itemType', item_name='$itemName', item_rate='$itemRate', quantity='$newQty', threshold='$threshold', updated_date='".date("Y-m-d H:i:s")."', created_by='$userInAttendance' where item_id=".$item_id."";

            $res = $this->db->executeQuery($updateQry);
            echo "I got here before the update statement";
            $resIns = $this->db->executeQuery($insertQry);

            if($res && $resIns)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated :".$itemName." item setup information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an Item Setup information!</p>
                              </div>';
                return $msg;


            }
        }

    }//End updateBarSetup


   // End new Addition
















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