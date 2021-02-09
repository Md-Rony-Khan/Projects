
<?php include 'inc/header.php';?>
session_start();

<?php
     $cmrId = Session::get("cmrId");
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
     	    $productId = $_POST['productId'];
         	$insertCompare = $pd->insertCompareData($cmrId,$productId);
               
         }
    ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity'])){
           $quantity = $_POST['quantity'];
           $id = $_POST['productId'];

           $addCart = $cart->addToCART($quantity, $id);
         }

?>

	
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="#">Category</a></li>
				<li class="active">product-page</li>
			</ul>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<div class="row">
                      <?php
                           if (!isset($_GET['id']) || $_GET['id']  ==  NULL) {
                               echo "not found";	
                             } else {
                                 $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['id']);
                                 echo "found";
                    	   }
                         ?>


                         <?php    

                             $query = "SELECT * FROM  tbl_product WHERE id = '$id'";

                               $post = $db->select($query);
                                 if ($post){
                                         	while ($result = $post->fetch_assoc()){

                    ?>


				<!--  Product Details -->
			   <div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="./img/<?php echo $result['mainproductpic1'];?>" alt="">
							</div>
							<div class="product-view">
								<img src="./img/<?php echo $result['mainproductpic2'];?>" alt="">
							</div>
							<div class="product-view">
								<img src="./img/<?php echo $result['mainproductpic3'];?>" alt="">
							</div>
							<div class="product-view">
								<img src="./img/<?php echo $result['mainproductpic1'];?>" alt="">
							</div>
						</div>
						<div id="product-view">
							<div class="product-view">
								<img src="./img/<?php echo $result['thumbproductpic1'];?>" alt="">
							</div>
							<div class="product-view">
								<img src="./img/<?php echo $result['thumbproductpic2'];?>" alt="">
							</div>
							<div class="product-view">
								<img src="./img/<?php echo $result['thumbproductpic1'];?>" alt="">
							</div>
							<div class="product-view">
								<img src="./img/<?php echo $result['thumbproductpic1'];?>" alt="">
							</div>
						</div>
					</div>
					<div class="col-md-6"><!--sidebar-->					
						<div class="product-body"><!--productbody-->
     						<div class="product-label">
								<span>New</span>
								<span class="sale">-20%</span>
							</div>
							<h2 class="product-name"><?php echo $result['productName'];?></h2>
							<h3 class="product-price"> <del class="product-old-price">$45.00</del></h3>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<a href="#">3 Review(s) / Add Review</a>
							</div>
							<p><strong>Availability:</strong> In Stock</p>
							<p><strong>Brand:</strong> BestDeals</p>
							<p><?php echo $result['productNote'];?></p>
							<div class="product-options">
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
									<li class="active"><a href="#">S</a></li>
									<li><a href="#">XL</a></li>
									<li><a href="#">SL</a></li>
								</ul>
								<ul class="color-option">
									<li><span class="text-uppercase">Color:</span></li>
									<li class="active"><a href="#" style="background-color:#475984;"></a></li>
									<li><a href="#" style="background-color:#8A2454;"></a></li>
									<li><a href="#" style="background-color:#BF6989;"></a></li>
									<li><a href="#" style="background-color:#9A54D8;"></a></li>
								</ul>
							</div>
							   <div class="product-btns"
								      <div class="qty-input">
								      	 <form action = "" method = "POST">
									        <span class="text-uppercase">QUANTITY: </span>
									         <input type="hidden"  name="productId" value="<?php echo $result['id'];?>"/>

									         <input class="input" type="number" name="quantity">
             						       <button class="primary-btn add-to-cart" type=""><i class="fa fa-shopping-cart"></i> <?php echo $result['productAddToCart'];?></button>
								      </form>
								        
								       <div class="pull-right">
									    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									       <form action = "" method = "POST">
                                                <input type="hidden"  name="productId" value="<?php echo $result['id'];?>"/>

									           <button class="main-btn icon-btn" type="submit" name="compare"><i class="fa fa-exchange"></i></button>

									        </form>
									    <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								   </div>
								</div>

								   <span style ="color:red; font-size:18px;">
								   	<?php
								   	   if(isset($addCart)){
								   	   	echo $addCart;
								   	   }

								   	?>
								   	 <?php
                                             if (isset($insertCompare)){
                                             	echo $insertCompare;
                                             }

								        ?>
								   </span>
							</div>
						</div>
							
								
						</div><!--sidebar-->
					</div><!--productbody-->
					<div class="col-md-12"><!--col-->
						<div class="product-tab"><!--product-tab-->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#tab3">DEALS</a></li>
								<li><a data-toggle="tab" href="#tab2">REVIEW</a></li>   
							</ul>
						  <div class="tab-content"><!--tab-content-->
								<div id="tab1" class="tab-pane fade in active"><!--Description-->
									<p><?php echo $result['productDescription'];?></p>
								</div><!---end description---->



                               

                                <div id="tab3" class="tab-pane fade in"><!--DEAls-->

									<div class="row"><!--row-->
										<div class="col-md-12"><!--col-->
											

										  <div class="order-summary clearfix">--<!--clearfix-->
							                    <div class="section-title">
								                     <h3 class="title">DEALS REVIEW</h3>
							                    </div>
							                <table class="shopping-cart-table table">
								                    <thead>
									                  <tr>
										                 <th>PRODUCT</th>
										                 <th></th>
										                 <th class="text-center">PRICE</th>
										                 <th class="text-center">WEBSITE</th>
										                 <th class="text-center">DEALS</th>
										                 <th class="text-right"></th>
									                   </tr>
								                     </thead>
								               <tbody>
									                 <tr>
										               <td class="thumb"><img src="./img/<?php echo $result['thumbproductpic2'];?>" alt=""></td>
										               <td class="details">
										              	<a href="#"><?php echo $result['productName'];?></a>
											               <ul>
												               <li><span>Size: XL</span></li>
												               <li><span>Color: Camelot</span></li>
											                </ul>
										                </td>
                                                        <td class="price text-center"><strong><?php echo $result['webprice1'];?></strong><br><del class="font-weak"><small>$40.00</small></del></td>
                                                        <td class="total text-center"><strong class="primary-color"> <?php echo $result['website1'];?></strong></td>

										                <td class="total text-center"><h3 class="title"> <strong class="primary-color"><a href="https://www.zalora.com.my/marie-claire-buckle-hand-bag-brown-beige-1459779.html"> DEALS</a> </strong> </h3></strong></td>
										               <!-- <td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>-->
										            
									                </tr>

									                  <tr>
										               <td class="thumb"><img src="./img/<?php echo $result['thumbproductpic2'];?>" alt=""></td>
										               <td class="details">
										              	<a href="#"><?php echo $result['productName'];?></a>
											               <ul>
												               <li><span>Size: XL</span></li>
												               <li><span>Color: Camelot</span></li>
											                </ul>
										                </td>
                                                        <td class="price text-center"><strong><?php echo $result['webprice2'];?></strong><br><del class="font-weak"><small>$40.00</small></del></td>
                                                        <td class="total text-center"><strong class="primary-color"> <?php echo $result['website2'];?></strong></td>

										                </td>
										                <td class="total text-center"><h3 class="title"> <strong class="primary-color"><a href="https://www.zalora.com.my/marie-claire-buckle-hand-bag-brown-beige-1459779.html"> DEALS</a> </strong> </h3></strong></td>
										               <!-- <td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>-->
										            
									                </tr>
									              
                                                     <tr>
										               <td class="thumb"><img src="./img/<?php echo $result['thumbproductpic2'];?>" alt=""></td>
										               <td class="details">
										              	<a href="#"><?php echo $result['productName'];?></a>
											               <ul>
												               <li><span>Size: XL</span></li>
												               <li><span>Color: Camelot</span></li>
											                </ul>
										                </td>
                                                        <td class="price text-center"><strong><?php echo $result['webprice3'];?></strong><br><del class="font-weak"><small>$40.00</small></del></td>
                                                        <td class="total text-center"><strong class="primary-color"> <?php echo $result['website3'];?></strong></td>

										                <td class="total text-center"><h3 class="title"> <strong class="primary-color"><a href="https://www.zalora.com.my/marie-claire-buckle-hand-bag-brown-beige-1459779.html"> DEALS</a> </strong> </h3></strong></td>
										               <!-- <td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>-->
										            
									                </tr>
                                                      <tr>
										               <td class="thumb"><img src="./img/<?php echo $result['thumbproductpic2'];?>" alt=""></td>
										               <td class="details">
										              	<a href="#"><?php echo $result['productName'];?></a>
											               <ul>
												               <li><span>Size: XL</span></li>
												               <li><span>Color: Camelot</span></li>
											                </ul>
										                </td>
                                                        <td class="price text-center"><strong><?php echo $result['webprice4'];?></strong><br><del class="font-weak"><small>$40.00</small></del></td>
                                                        <td class="total text-center"><strong class="primary-color">  <?php echo $result['website4'];?></strong></td>

										                <td class="total text-center"><h3 class="title"> <strong class="primary-color"><a href="https://www.zalora.com.my/marie-claire-buckle-hand-bag-brown-beige-1459779.html"> DEALS</a> </strong> </h3></strong></td>
										               <!-- <td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>-->
										            
									                </tr>

                                                </tbody>
								                   
							              </table>

							                     
						            </div><!--clearfix-->
                                   </div><!--row-->

                                  </div><!--col-->

                                </div><!--end deals-->

							 <div id="tab2" class="tab-pane fade in"><!--review-->

									<div class="row"><!--row-->
										<div class="col-md-6"> <!--col-->
											<div class="product-reviews">
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>vvvvvLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<!--end sigle reviw-->

												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div><!--product review-->
										 <!--colend-->
										</div><!--colend-->
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form class="review-form">
												<div class="form-group">
													<input class="input" type="text" placeholder="Your Name" />
												</div>
												<div class="form-group">
													<input class="input" type="email" placeholder="Email Address" />
												</div>
												<div class="form-group">
													<textarea class="input" placeholder="Your review"></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Your Rating: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
									    </div><!--col-->
									  </div><!---row-->
			
                                </div><!--end review-->
							</div><!--tabcontent-->
						<!--</div><!--product-tab-->
					</div><!--col-->
				</div><!--product details-->

				
				<?php } } else { ?><!--end while loop-->
                         <P>YOUR SEARCH QUERY NOT FOUND</P>

				      <?php }  ?>







				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Picked For You</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="./img/product04.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>New</span>
							</div>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="./img/product03.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span class="sale">-20%</span>
							</div>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="./img/product02.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>New</span>
								<span class="sale">-20%</span>
							</div>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="./img/product01.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


	<!-- FOOTER -->
<?php include 'inc/footer.php';?>
