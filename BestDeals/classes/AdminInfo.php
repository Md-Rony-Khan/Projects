<?php
     include '../lib/Session.php';
     Session::checkLogin();
     include_once '../lib/Database.php';
     include_once '../helpers/Format.php';

?>


<?php

class Adminlogin
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();


	}
	public function adminlogin($adminuser,$adminpass){
		$adminuser = $this->fm->validation($adminuser);
		$adminpass = $this->fm->validation($adminpass);

		$adminuser = mysqli_real_escape_string($this->db->link,$adminuser);
	    $adminpass = mysqli_real_escape_string($this->db->link,$adminpass);

         if (empty($adminuser) || empty($adminpass)){
         	$loginmsg = "Username or Password must not be empty ";
         	return $loginmsg;
         } else {


         	    $query = "Select * From  tbl_customer Where name = '$adminuser' And 
         	             pass = '$adminpass'";

         	     $result = $this->db->select($query);

         	     if ($result !=false){
         	     	$value = $result->fetch_assoc();

         	     	Session::set("adminlogin",true);
         	     	Session::set("adminid",$value['adminid']);
         	     	Session::set("adminuser",$value['adminuser']);
                    Session::set("adminname",$value['adminname']);

         	     	header("Location:index.php");
         	        } else {
         	        	$loginmsg = "Username or Password doesn't match!";
         	        	return $loginmsg ;
         	        }
                }
	        }
    
}
?>