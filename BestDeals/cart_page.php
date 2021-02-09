<?php include 'inc/header.php';?>
<?php

     $login = Session::get("custlogin");
     if($login ==false){
     	header("Location:userregis.php");
     }
?>

<?php
    if(isset($_GET['delpro'])){
    	  $delId = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delpro']);
    	  $delProduct = $cart->delProductByCart($delId);

    }
?>
<?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];

        $updateCart = $cart->updateCartQuantity($cartId, $quantity);
        
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

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<div class="col-md-100">

			<?php
               if (isset($updateCart)){
               	   echo $updateCart;
               }
               if (isset( $delProduct)){
               	   echo  $delProduct;
               }
			?>
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Cart Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
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
										<td class="thumb"><img src="<?php echo $result['image'] ?>" alt=""></td>
										<td class="details">
											<a href="#"><?php echo $result['productName'] ?></a>
											<ul>
												<li><span>Size: XL</span></li>
												<li><span>Color: Camelot</span></li>
											</ul>
										</td>
										<td class="price text-center"><strong><?php echo $result['price'] ?></strong><br><del class="font-weak"><small>$40.00</small></del></td>
										<td>
                                             <form action= "cart_page.php" method="POST" >
                                                <input  type="hidden" name="cartId" value="<?php echo $result['cartId'];?>" </>
											    <input  type="number" name="quantity" value="<?php echo $result['quantity'];?>" </>
											    <!--<div class="buttons"><div><button class="grey" name="login">UPDATE</button></div></div>-->

											    
											    <button class="primary-btn add-to-cart" name="update"><i class=""></i>UPDATE</>
											    <!--<input  type="submit" name="submit" value="Update" </>-->
                                                 
											  </form>
										</td>
										<td class="total text-center"><strong class="primary-color">
											     <?php
											         $total = $result['price'] * $result['quantity'];
											         echo $total; ?></strong>
										</td>
									
										<!--<td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>-->
										<td><a onclick="return confirm('Are you sure to delete!');" href="?delpro=<?php echo $result['cartId'];?>">X</a></td>								
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
							<div class="pull-right">
								<a href="payment.php"><button class="primary-btn">Place Order</a></button>
							</div>
						</div>



						

					</div>
				</form>
			</div>
		  </div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<?php include 'inc/footer.php';?>

