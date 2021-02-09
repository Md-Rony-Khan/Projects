<?php include 'inc/header.php';?>
<?php

     $login = Session::get("custlogin");
     if($login ==false){
     	header("Location:userregis.php");
     }
?>
<?php
    if (isset($_GET['orderid']) && $_GET['orderid']=='order'){
         $cmrId = Session::get("cmrId");
         $insertOrder = $cart->orderProduct($cmrId);

         $delId       = $cart->delProductByCart($delId);
         header("Location:success.php");

    }


?>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
 <style>

 .division{width:50%; float:left;}
 .tblone {width:2000px:margin:10auto:border:9px solid #ddd;}
 .tblone tr td{text-align: justify;}
 .ordernow{padding-bottom: 30px;}
 .ordernow a{width:200px;margin:20px auto 0;text-align: center;padding: 5px;font-size: 30px;display: block;background: #ff0000;color: #fff;border-radius: 3px;}


 </style>
  
       <div class="main">
       	     <div class="container">
                 <div class="col-md-200">

                    <div class="section group">
                        <div class="row">
                            <div class="col-left-15">
 
                             <div class="pull-left">
                                <div class="division">
                                   

                        <table class="shopping-cart-table table">
                                <thead>
                                    <tr>

                                        <th class="text-center">Product</th>
                                        <th class="text-center"></th>


                                        <th class="text-center">Price</th>

                                        <th class="text-center">Quantity</th>

                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>

                                <?php

                                    $getPro = $cart->getCartProduct();
                                    if($getPro){
                                        $i = 0;
                                        $sum = 0;
                                        while($result = $getPro->fetch_assoc()){
                                            $val= $result['price'];
                                            $i++;
                                ?>
                                
                                <tbody>
                                    <tr>
                                        <td class="price text-center"><strong><?php echo $result['productName'] ?></strong><br></td>

                                        <td class="price text-center"><strong></strong><br></td>

                                        <td class="price text-center"><strong><?php echo $result['price'] ?></strong><br></td>
                                        
                                         <td class="price text-center"><strong><?php echo $result['quantity'] ?></strong><br></td>
                                        
                                         
                                        <td class="total text-center"><strong class="primary-color">
                                                 <?php
                                                     $total = $result['price'] * $result['quantity'];
                                                     echo $total; ?></strong>
                                        </td>
                                    
                                                                    
                                        </tr>
                                    <?php
                                       $sum = $sum + $total;
                                    ?>
                                    <?php }} else {
                                        //echo "Cart empty ! Please shop now.";
                                          header("Location:index.php");


                                    } ?>
                                    
                                <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>SUBTOTAL</th>
                                        <th colspan="2" class="sub-total"><?php echo $sum;?></th>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>VAT</th>
                                        <td colspan="2">10%</td>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>TOTAL</th>
                                        <th colspan="2" class="total">
                                            <?php
                                               $vat    = $sum * 0.01;
                                               $gtotal = $sum + $vat;
                                               echo $gtotal;
                                           ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    </div>
                     <div class="col-right-5">

                        <div class="pull-right">

                                <div class="division">
                            <?php
                               $id = Session::get("cmrId");
                               $getdata = $customer->getCustomerData($id);
                               if($getdata){
                                    while ( $result = $getdata->fetch_assoc()) {
                                        # code...
                            ?>
                    <table class="tblone">

                                 <tr>
                                   
                                    <td colspan="3"><h2>YOUR PROFILE DETAILS</h2></td>
                                  </tr>
                                 <tr>           
                                       <td width="50%">Name</td>
                                       <td width="5%">:</td>
                                       <td><?php echo $result['name']; ?></td>
                                    </tr>
                                   <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $result['email']; ?></td>
                                  </tr>

                                    <tr>
                                        <td>City</td>
                                        <td>:</td>
                                        <td><?php echo $result['city']; ?></td>
                                    </tr>
                                    <tr>
                                       <td>ZIP-CODE</td>
                                       <td>:</td>
                                       <td><?php echo $result['zip']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td><?php echo $result['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>:</td>
                                        <td><?php echo $result['country']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>PHONE</td>
                                        <td>:</td>
                                        <td><?php echo $result['phone']; ?></td>
                                   </tr>    
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td><a href="editprofile.php">UPDATE DETAILS</a></td>
                                 </tr>                                              
                                
                            </table>
                            <?php } } ?>
                                   
                                 

                            </div>
                         </div>

                                
	
                           </div>
                        <div>
                    </div>
			    				
			   </div>
		   </div>
           <div class="ordernow"><a href="?orderid=order">Order</a></div>
	   </div>

<?php include 'inc/footer.php';?>

