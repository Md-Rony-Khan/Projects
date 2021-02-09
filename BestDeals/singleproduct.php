<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

<?php include 'inc/header1.php';?>

<?php

    $db = new Database();

?>


	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
					<!-- aside widget -->
                    <?php include 'filtering/sidbar.php';?>



				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					 <?php include 'filtering/topfilter.php';?>

					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
         			    <!--<div class="coloum">-->
							<!-- Product Single -->
                            <?php

                                $query = "select * from  tbl_addproextra";
                                $post = $db->select($query);
                                 if ($post){
                                         	while ($result = $post->fetch_assoc()){

                             ?>

                         <div class="coloum">


							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
											<span class="sale">-20%</span>
										</div>
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i><?php echo $result['quickview'];?></button>
										<img src="./img/<?php echo $result['image'];?>" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price"><?php echo $result['price'];?> <del class="product-old-price">$45.00</del></h3>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<h2 class="product-name"><a href="product-page.php?id=<?php echo $result['id'];?>"><?php echo $result['name']; ?></a></h2>
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> <?php echo $result['addpro'];?></button>
										</div>
									</div>
								</div>

                                


							</div>
							<!-- /Product Single -->

							<!-- Product Single -->
							
							<!-- /Product Single -->

							<div class="clearfix visible-sm visible-xs"></div>

							<!-- Product Single -->
							
							<!-- /Product Single -->

							<!--<div class="clearfix visible-md visible-lg"></div>--!>

							<!-- Product Single -->
							
							<!-- /Product Single -->


							<!-- Product Single -->
							
							<!-- /Product Single -->

							<!-- Product Single -->
							
							<!-- /Product Single -->


							<!-- Product Single -->
							
							<!-- /Product Single -->

							<!-- Product Single -->
							
							<!-- /Product Single -->


							<!-- Product Single -->
							
							<!-- /Product Single -->
						</div>
						<!-- /row -->

                       <?php }  ?><!--end while loop-->

				       <?php }  ?>



					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<?php include 'filtering/botomfiltering.php';?>

					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

		<?php include 'inc/footer.php';?>
