<?php include 'inc/header.php';?>

	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
<?php

     $login = Session::get("custlogin");
     if($login ==true){
     	header("Location:Cart_page.php");
     }
?>

<?php
		 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){

             $customerreg = $customer->customerRegistration($_POST);
                       	 
              }
?>

 
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php
		             if(isset($customerreg)){
			          echo $customerreg;
			       }
                 ?>
				<form action="" method="POST">

					<div class="col-md-6">
						<div class="billing-details">
							<p>Already a customer ? <a href="#">Login</a></p>

							<div class="section-title">
								<h3 class="title">Register New Account</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="user" placeholder="User Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip" placeholder="ZIP-Code">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address">
							</div>
							<div>
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="phone" placeholder="Phone">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="password" placeholder="Password">
							</div>
                            <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
                                   
                           <div class="clear"></div>
							
						</div>
					</div>



					<?php
	                     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
                         $custlogin = $customer->customerLogin($_POST);
                       	 
                          }
                     ?> 
                     <?php
	                     if(isset($custlogin)){
		                 echo $custlogin;
			             }
		               ?>

                     <div class="col-md-6">
						<div class="shiping-methods">
							<div class="Login_Panel">
								<h3>Existing Customer</h3>

								<p>Sing In with the form below.</p>

								<form action="index.php" method="post" >
									<input name="email" placeholder="Email" type="text" />
									<input name="pass" placeholder="password" type="text" />
									<div class="buttons"><div><button class="grey" name="login">SignIn</button></div></div>

								</form>


							</div>

						</div>
					</div>
				 </div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<?php include 'inc/footer.php';?>

