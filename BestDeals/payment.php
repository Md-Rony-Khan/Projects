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
 .payment{width:500px;min-height: 400px;text-align: center;border: 1px solid #ddd;margin: 0 auto;padding: 40px;}
 .payment h2{border-bottom:10px sollid #ddd;margin-bottom:30px;padding-bottom: 10px;}
 .payment a{
    background:  #ff0000 none repeat scroll 0 0;
    border-radius: 3px;
    color: #fff;
    font-size: 25px;padding: 5px 5px;
 }
 .back a{width:160px;margin:5px auto 0;padding: 7px 0;text-align: center;display: block;background: #555;border: 1px solid #333;color: #fff;border-radius: 3px;font-size: 25px;}



 </style>
  
       <div class="main">
       	     <div class="container">
                 <div class="col-md-200">

                    <div class="section group">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="payment">
                                    <h2>Choose Payment Option</h2>
                                     <a href="offline.php">OFFline Payment</a>
                                     <a href="online.php">ONline Payment</a>




                                </div>

                                <div class="back">
                                    <a href="cart_page.php">Previous</a>
                                </div>
	
                           </div>
                        <div>
                    </div>
			    				
			   </div>
		   </div>
	   </div>

<?php include 'inc/footer.php';?>

