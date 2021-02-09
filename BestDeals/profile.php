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
	.tblone {width:2000px:margin:10auto:border:9px solid #ddd;}
    .tblone tr td{text-align: justify;}

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
            <div>
            </div>
							
						</div>
			</div>
	</div>

<?php include 'inc/footer.php';?>

