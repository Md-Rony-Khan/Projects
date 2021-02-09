<?php include 'inc/header.php';?>
<?php

     $login = Session::get("custlogin");
     if($login ==false){
     	header("Location:userregis.php");
     }
?>
<?php
     $cmrId = Session::get("cmrId");
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $updatecustomer = $customer->customerUpdate($_POST,$cmrId);
                         
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
		.tblone {width:500px:margin:10auto:border:9px solid #ddd;}
    .tblone tr td{text-align: justify;}
    .tblone input[type ="text"]{width: 400px;padding:5px;font-size:15px;}

   </style>
       <div class="main">
       	        <div class="container">
                     <div class="col-md-200">

       	        	<div class="section group">
                        <div class="row">
                            <div class="col-md-9">

       	        		   	<!--<div id="main" class="col-md-9">-->


       	        		<?php
							   $id = Session::get("cmrId");
							   $getdata = $customer->getCustomerData($id);
							   if($getdata){
							   	    while ( $result = $getdata->fetch_assoc()) {
							   	    	# code...
							?>
                    <form action="" method="post">
       	        	<table class="tblone">

                    <?php
                        if(isset( $updatecustomer)){
                            echo "<tr><td colspan='2'>". $updatecustomer."</td></tr>";

                              }

                         ?>

                                 <tr>
                                    <td colspan="2"><h2>UPDATE PROFILE DETAILS</h2></td>
                                  </tr>
                                 <tr>           
         		                       <td width="20%">Name</td>
                                       <td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>

                        	           </tr>
                                     <tr>
                                        <td>Email</td>
                                        <td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>

                                    </tr>


         	                        <tr>
         	                        	<td>City</td>
                                        <td><input type="text" name="city" value="<?php echo $result['city']; ?>"></td>

         	                        </tr>
         	                        <tr>
         		                       <td>ZIP-CODE</td>
                                       <td><input type="text" name="zip" value="<?php echo $result['zip']; ?>"></td>

         	                        </tr>
                                 	<tr>
         	                        	<td>Address</td>

                                         <td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>

                                    	</tr>
         	                        <tr>
         		                        <td>Country</td>

                                         <td><input type="text" name="country" value="<?php echo $result['country']; ?>"></td>
                           	            </tr>
                                   	<tr>
         	                          <td>PHONE</td>
                                      <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>

         	                       </tr>	
                                 <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="Save"></td>
                                 </tr>        										
								
							</table>
                        </form>
							<?php } } ?>
							
						</div>
                    </div>
                    </div>
                </div>
			</div>
	</div>

<?php include 'inc/footer.php';?>

