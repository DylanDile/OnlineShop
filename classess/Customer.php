<?php
ob_start();
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

class Customer{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();

	}
public function customerRegistration($data){

$name = mysqli_real_escape_string($this->db->link, $data['name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);
$country = mysqli_real_escape_string($this->db->link, $data['country']);
$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));


if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $pass == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}

  $mailquery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
  $mailchk = $this->db->select($mailquery);
  if ($mailchk != false) {
  	$msg = "<span class='error'>Email already exist !</span>";
	return $msg;
  }else{


  	 $query = "INSERT INTO tbl_customer(name,address,city,country,zip,phone,email,pass) VALUES('$name','$address','$city','$country','$zip','$phone','$email','$pass')";

	 $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				$msg = "<span class='success'>Customer Data inserted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Customer Data Not inserted.</span>";
				return $msg;
		}
  }
}

public function customerLogin($data){
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
if (empty($email) || empty($pass)) {
$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}
$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass'";
$result = $this->db->select($query);
if ($result != false) {
	$value = $result->fetch_assoc();
	$bytes = random_bytes(3);
	$ran = bin2hex($bytes);
	$this->deleteOTP($email);
	$sql = "INSERT INTO otps(OTP, email, status) VALUES('$ran', '$email', 'active')";
	$this->db->insert($sql);
	header("Location:enterOTP.php");
	$this->SendOTP($value['phone'], $ran);
	ob_end_flush();
}else{
	$msg = "<span class='error'>Email or Password not matched !</span>";
				return $msg;
}
}
public function SendOTP($phone, $otp)
{
	//ob_start();
    //error_reporting(0);
    $username = 'Dylan';
    $token = 'c1393e713ffa5b83423f22da9bc41f72';
    $bulksms_ws = 'http://portal.bulksmsweb.com/index.php?app=ws';
    $destinations = $phone;
    $message = "Dear Client your Gtel Online Shop OTP is ".$otp.". Thank you for doing business with us.";
    $ws_str = $bulksms_ws . '&u=' . $username . '&h=' . $token . '&op=pv';
    $ws_str .= '&to=' . urlencode($destinations) . '&msg='.urlencode($message);
    $ws_response = @file_get_contents($ws_str);
    echo $ws_response;
    //ob_end_flush();
   // return $true;
}
public function verifyOTP($data)
{
    $email = mysqli_real_escape_string($this->db->link, $data['email']);
    $otp = mysqli_real_escape_string($this->db->link, $data['otp']);
    $query = "SELECT * FROM tbl_customer WHERE email = '$email' ";    
    $sql  = "SELECT * FROM otps WHERE email = '$email' ";
    $res = $this->db->select($sql);	
	if ($res != false) 
	{
		$otps = $res->fetch_assoc();
		//var_dump($otps);
		if($otps['OTP'] == $otp)
		{
			$result = $this->db->select($query);
	    	$value = $result->fetch_assoc();
			Session::set("cuslogin",true);
			Session::set("cmrId",$value['id']);
			Session::set("cmrEmail",$value['email']);
			Session::set("cmrName",$value['name']);
			header("Location:cart.php");

		}
		else
		{
			$msg = "<span class='error'>Invalid OTP!</span>";
			return $msg;
		}
		
	}
	else
	{
		$msg = "<span class='error'>Invalid OTP!</span>";
		return $msg;
	}
}
public function deleteOTP($email)
{
	$sql  = "DELETE FROM otps WHERE email = '$email' ";
	$res = $this->db->delete($sql);	
    return;
}
public function getCustomerData($id){
	$query = "SELECT * FROM tbl_customer WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
}

public function customerUpdate($data,$cmrId){

$name = mysqli_real_escape_string($this->db->link, $data['name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);
$country = mysqli_real_escape_string($this->db->link, $data['country']);
$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);


if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}else{


  	 $query = "INSERT INTO tbl_customer(name,address,city,country,zip,phone,email) VALUES('$name','$address','$city','$country','$zip','$phone','$email',)";

	$query = "UPDATE tbl_customer

	SET
	name = '$name',
	address = '$address', 
	city = '$city', 
	country = '$country', 
	zip = '$zip', 
	phone = '$phone', 
	email = '$email' 

	WHERE id = '$cmrId'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success'>Customer Data Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Customer Data Not Updated !</span>";
				return $msg;
	}
  }
}

}