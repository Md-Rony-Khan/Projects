<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../helpers/Format.php');   


?>
<?php
ob_start();

class Customer {


	private $db;
	private $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm =new Format();
	}
	public function customerRegistration($data){
        
		$cust  = mysqli_real_escape_string($this->db->link,$data['user']);
		//echo $name;
		//$name  = $this->fm->validation($name);
		$city  = mysqli_real_escape_string($this->db->link,$data['city']);
		echo $city;
		$city  = $this->fm->validation($city);
		$zip  = mysqli_real_escape_string($this->db->link, $data['zip']);
		echo $zip;
		$zip  = $this->fm->validation($zip);
		$custemail  = mysqli_real_escape_string($this->db->link, $data['email']);
		//echo $email;
		//$email  = $this->fm->validation($email);
		$address  = mysqli_real_escape_string($this->db->link, $data['address']);
		echo $address;
		$address  = $this->fm->validation($address);
		$country  = mysqli_real_escape_string($this->db->link, $data['country']);
		echo $country;
		$country  = $this->fm->validation($country);
		$phone  = mysqli_real_escape_string($this->db->link, $data['phone']);
		echo $phone;
		$phone  = $this->fm->validation($phone);
		$password  = mysqli_real_escape_string($this->db->link, md5($data['password']));
		echo $password;
		$password = $this->fm->validation($password);



		if($cust == "" || $city == "" || $zip == "" || $custemail== "" || $address == "" || $country == "" ||
		   $phone == "" || $password == ""){
			$msg = "<span class='error'>Fields must not empty !</span>";
		     return $msg;
		}
		$mailquery = "SELECT * FROM tbl_customer WHERE email='cust$email' LIMIT 1";
		$mailchk  = $this->db->select($mailquery);
		if ($mailchk !=false){
			$msg = "<span class='error'>Name already exist !</span>";
			return $msg;
		}else{
			 $query = "INSERT INTO tbl_customer(name,city,zip,email,address,country,phone,pass )
                    VALUES('$user','$city','$zip','$email','$address','$country','$phone','$password' )";

          $inserted_value = $this->db->insertCart($query);
            if ($inserted_value){

            	$msg = "<span class='success'>Customer Data  Insert Successfully.</apan>";
            	return $msg;
           } else{
            	$msg = "<span class='error'>Customer Data not  Inserted.</span>";
            	return $msg;
            }
		}

	}

   public function customerLogin($data){
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
		//$email  = $this->fm->validation($email);
		$password  = mysqli_real_escape_string($this->db->link, md5($data['pass']));
		//$password = $this->fm->validation($password);
		if(empty($email) || empty($password)){
			$msg = "<span class='success'>Customer Data  not Insert Successfully.</apan>";
            	return $msg;

		}

		$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$password' ";
		$result = $this->db->select($query);
		if ($result != false){
			$value = $result->fetch_assoc();
			Session::set("custlogin",true);
			Session::set("cmrId", $value['id']);
			Session::set("cmrName", $value['user']);
			header("Location:cart_page.php");
		


		}

		else{
			$msg = "<span class='success'>EMAIL AND PASS NOT MATCH.</apan>";
            	return $msg;
		}
   }

    
    public function getCustomerData($id) {
    	$query = "SELECT * FROM  tbl_customer WHERE id ='$id'";
        $result = $this->db->select($query);
        return $result;

    }

    public function customerUpdate($data,$cmrId){

       	$user  = mysqli_real_escape_string($this->db->link,$data['name']);
		
		$city  = mysqli_real_escape_string($this->db->link,$data['city']);
		echo $city;
		$city  = $this->fm->validation($city);
		$zip  = mysqli_real_escape_string($this->db->link, $data['zip']);
		echo $zip;
		$zip  = $this->fm->validation($zip);
		$email  = mysqli_real_escape_string($this->db->link, $data['email']);
		echo $email;
		$email  = $this->fm->validation($email);
		$address  = mysqli_real_escape_string($this->db->link, $data['address']);
		echo $address;
		$address  = $this->fm->validation($address);
		$country  = mysqli_real_escape_string($this->db->link, $data['country']);
		echo $country;
		$country  = $this->fm->validation($country);
		$phone  = mysqli_real_escape_string($this->db->link, $data['phone']);
		echo $phone;
		$phone  = $this->fm->validation($phone);
		



		if($user == "" || $city == "" || $zip == "" || $email== "" || $address == "" || $country == "" ||
		   $phone == ""  ){
			$msg = "<span class='error'>Fields must not empty !</span>";
		     return $msg;
		}
		
		else{
			 

           $query = "UPDATE tbl_customer
                   SET
                   name    = '$user',
                   city    = '$city',
                   zip     = '$zip',
                   address = '$address',
                   country = '$country',
                   phone   = '$phone'
                  
                   WHERE id = '$cmrId'";

              $updated_row = $this->db->update($query);
              if ($updated_row){
                  $msg = "<span class='error'>Customer Update Successfully !</span>";
                  return $msg;
              } else{
                   $msg = "<span class='error'>Customer not Update.</span>";
                  return $msg;
              }
		}


    }


}
?>