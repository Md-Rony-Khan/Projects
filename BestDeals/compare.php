<?php include 'inc/header.php';?>
session_start();


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
       table.tbody img {
       	height :10px;
       	width: 10px;
       }

	</style>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<div class="col-md-100">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Compare</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
                                        <th>Image</th>

										<th class="text-center">ProductName</th>
                                        <th></th>
                                        <th class="text-center">ProductId</th>
                                        <th class="text-center">CustomerId</th>


										<th class="text-center">Price</th>
										<th class="text-center">website</th>

										<th class="text-center">Action</th>

										<th class="text-right"></th>
									</tr>
								</thead>

								<?php
                                    $cmrId = Session::get("cmrId");

                                    $getPd = $pd->getCompareData($cmrId);
                                    if($getPd){
                                    	$i = 0;
                                    	while($result = $getPd->fetch_assoc()){
                                    		$i++;
								?>
								
								<tbody>
									<tr>
										<td class="thumb"><img src="<?php echo $result['image'] ?>" alt=""></td>

										 <td class="price text-center"><strong><?php echo $result['productName'] ?></strong><br></td>

                                        <td class="price text-center"><strong></strong><br></td>

                                        <td class="price text-center"><strong><?php echo $result['productId'] ?></strong><br></td>
                                        
                                        <td class="price text-center"><strong><?php echo $result['cmrId'] ?></strong><br></td>
                                        <td class="price text-center"><strong><?php echo $result['price'] ?></strong></td>
                                        <td class="price text-center"><strong><?php echo $result['website'] ?></strong></td>

                                        <td class="price text-center"><a href="product-page.php?id=<?php echo $result['productId'] ?>"<strong>View</strong></a></td>







										<!--<td class="thumb"><img src="<?php echo $result['image'] ?>" alt=""></td>
										<td class="price text-center"><strong><?php echo $result['productName'] ?></strong></td>
									    <td class="price text-center"><strong><?php echo $result['productId'] ?></strong></td>
									    <td class="price text-center"><strong><?php echo $result['cmrId'] ?></strong></td>										
									    <td class="price text-center"><strong><?php echo $result['price'] ?></strong></td>-->
									
									
										</tr>
									
									<?php }}  ?>
									
								</tbody>
							</table>
							
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

