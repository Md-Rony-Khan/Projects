<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../helpers/Format.php');   


?>
<?php
ob_start();

class Product {


	private $db;
	private $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm =new Format();
	}
	public function insertCompareData($cmrId,$productId){


		$cmrId  = mysqli_real_escape_string($this->db->link, $cmrId);
		echo $cmrId;
		$cmrId  = $this->fm->validation($cmrId);
		$productId = mysqli_real_escape_string($this->db->link, $productId);
		echo $productId;
		$productId  = $this->fm->validation($productId);
    $query = "SELECT * FROM  tbl_compare WHERE cmrId ='$cmrId' AND productId = '$productId'";
    $chckcompare = $this->db->select($query);
    if($chckcompare){
          $msg = "<span class='error'>product already added.</span>";

            return $msg;
    }

		$cquery = "SELECT * FROM  tbl_product WHERE id ='$productId'";
          $result = $this->db->select($cquery)->fetch_assoc();
          if($result){
              $productId   = $result['id'];
              $productName = $result['productName'];
              $price       = $result['webprice2']  ;
              $website      = $result['website1']  ;

              $image       = $result['thumbproductpic2'];
              $query = "INSERT INTO tbl_compare(cmrId,productId,productName,price,image,website)
                    VALUES('$cmrId',' $productId','$productName','$price','$image','$website' )";

                $inserted_value = $this->db->insertCart($query);

                if (!$inserted_value){
                     $msg = "<span class='error'>Add to compare.</span>";
                     return $msg;
                } else{
                     $msg = "<span class='error'>Add not to compare.</span>";

            	return $msg;

        }
    }
                
    }

    public function getCompareData($cmrId){
      $cquery = "SELECT * FROM  tbl_compare WHERE cmrId ='$cmrId'";
      $result = $this->db->select($cquery);
      return $result;
    }
    
}
?>