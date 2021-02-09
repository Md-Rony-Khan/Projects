<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../helpers/Format.php');


 ?>    


<?php
ob_start();


class Cart {

	private $db;
	private $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addToCART($quantity, $id){
///echo "<script>window.alert('$quantity $id')</script>";
		$quantity  = $this->fm->validation($quantity);
		$quantity  = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);
		$sId       = session_id();
        //$squery     = "SELECT * FROM  tbl_product WHERE id ='$productId'";
    $squery = "select * from  tbl_product where id = $productId";
    $result = $this->db->select($squery)->fetch_assoc();
    $productName = $result['productName'];
    $price       = $result['webprice2'];
    $image       = $result['thumbproductpic2'];


    $psquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
    
    $getpro = $this->db->select($psquery);
    if ($getpro){
      $msg = "Product Already Added";
      return $msg;
    } else{
    $query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image )
                    VALUES('$sId','$productId','$productName','$price','$quantity','$image' )";

    $inserted_value = $this->db->insertCart($query);
      if ($inserted_value){
          $msg = "<span class='error'>product not found.</span>";
              return $msg;
         // header("Location:cart_page.php");
         } else{
            $msg = "<span class='error'>Product  found.</span>";
              header("Location:cart_page.php");

            	return $msg;
             // header("Location:cart_page.php");

        }
      }

       
 }
 public function getCartProduct(){
 	$sId = session_id();
 	$cquery = "SELECT * FROM  tbl_cart WHERE sId ='$sId'";
  $result = $this->db->select($cquery);
  return $result;



 }

 public function updateCartQuantity($cartId, $quantity){
    $cartId    = mysqli_real_escape_string($this->db->link, $cartId);
    $quantity  = mysqli_real_escape_string($this->db->link, $quantity);
   

    $query     = "UPDATE tbl_cart
                   SET
                   quantity = '$quantity'
                   WHERE cartId = '$cartId'";

              $updated_row = $this->db->update($query);
              if ($updated_row){
                  $msg = "<span class='error'>Quantity Update Successfully !</span>";
                  return $msg;
              } else{
                   $msg = "<span class='error'>Quantity not Update.</span>";
                  return $msg;
              }

 }
 public function delProductByCart($delId){
         $delId   = mysqli_real_escape_string($this->db->link, $delId);
         $query = "DELETE FROM tbl_cart WHERE cartId = '$delId'";
         $deldata = $this->db->delete($query);
         if($deldata){
                  $msg = "<span class='error'>Product not Deleted.</span>";
                  return $msg;
               
             } else{
                  echo "<script>window.Location = 'cart_page.php';</script>";

                  

           }
         }

      public function orderProduct($cmrId){
          $sId = session_id();
          $cquery = "SELECT * FROM  tbl_cart WHERE sId ='$sId'";
          $getpro = $this->db->select($cquery);
          if($getpro){
            while($result = $getpro->fetch_assoc()){
              $productId   = $result['productId'];
              $productName = $result['productName'];
              $quantity    = $result['quantity'];
              $price       = $result['price'] * $quantity ;
              $image       = $result['image'];
              $query = "INSERT INTO tbl_order(cmrId,productId,productName,quentity,price,image)
                    VALUES('$cmrId',' $productId','$productName','$quantity','$price','$image' )";

                $inserted_value = $this->db->insertCart($query);
                
          }

      }
    }

    public function payableAmount($cmrId){
      $cquery = "SELECT price FROM  tbl_order WHERE cmrId='$cmrId' AND date = now()";
      $result = $this->db->select($cquery);
      return $result;

    }


}
?>