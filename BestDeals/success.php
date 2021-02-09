<?php include 'inc/header.php';?>
<?php

     $login = Session::get("custlogin");
     if($login ==false){
     	header("Location:userregis.php");
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
 .psuccess{width:500px;min-height: 400px;text-align: center;border: 1px solid #ddd;margin: 0 auto;padding: 40px;}
 .psuccess h2{border-bottom:10px sollid #ddd;margin-bottom:20px;padding-bottom: 10px;}
 
 .psuccess p{font-size:18px;line-height: 25px;text-align: left;}



 </style>
  
       <div class="main">
       	     <div class="container">

                    <div class="section group">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="psuccess">
                                   <h2>Success</h2>

                                    <?php
                                        $cmrId = Session::get("cmrId");
                                        $amount = $cart->payableAmount($cmrId);
                                        if($amount){
                                           $sum = 0;

                                          while($result = $amount->fetch_assoc()){
                                              $price = $result['price'];
                                              $sum = $sum + $price;
                                          
            
                                       ?>
                                         <p>Total payable amount(Including Vat): $
                                          <?php
                                             $vat = $sum * 0.1;
                                             $total = $sum + $vat;
                                             echo $total;
                                           ?>
                                      <?php }} ?>
                    
                                       

                                       </p>

                                       <p>Thanks for purchase.Receive your order successfully.we will contact you ASAP with delivery details.Here is your order details.......<a href="orderdetails.php">...Visit Here...</a></p>


                                </div>

                               
                        <div>
                    </div>
			    				
			   </div>
		   </div>
	   </div>

<?php include 'inc/footer.php';?>

