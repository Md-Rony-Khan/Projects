<?php
    include 'lib/Session.php';
    Session::init();
    include 'lib/Database.php';
    include 'helpers/Format.php';
    spl_autoload_register(function($class){
    	include_once "classes/".$class.".php";
    });

    $db = new Database();
    $fm = new Format();
    $cart = new Cart();
    $customer = new Customer();

?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>BEST-DEALS</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />		

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to BEST-DEALS!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="#">Store</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">FAQ</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">English (ENG)</a></li>
								<li><a href="#">Bangla (BNG)</a></li>

								<li><a href="#">Russian (Ru)</a></li>
								<li><a href="#">French (FR)</a></li>
								<li><a href="#">Spanish (Es)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">TAKA ($)</a></li>

								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="./img/bestDeals.PNG" alt="">
						</a>
					</div>


					<!--</div>
                     logo <div class="pull-right">

                    <div class="searchbtn clear">
			           <form action="search.php" method="get">
				       <input type="text" name="search" placeholder="Search keyword..."/>
				       	<button class="search-btn"><i class="fa fa-search"></i></button>

				      <!-- <input type="submit" name="submit" value="Search"/>-->
			       <!-- </form>
			       <!--</div>
			      <!--</div> --> 





					<!-- /Logo -->

					<!-- Search--> 
					<div class="header-search">
						<form action="search.php" method="get">
							<input class="input search-input"  type="text" name="search" placeholder="Enter your keyword">
							<select class="input search-categories">
								<option value="0">All Categories</option>
								<option value="1">WOMEN'S CLOTHING</option>
								<option value="1">MEN'S CLOTHING</option>
								<option value="1">PHONES & ACCESSORIES</option>
								<option value="1">ELECTRONICS</option>
								<option value="1">SPORTS,BOOKS&MORE</option>


							</select>
                            
							   <button class="search-btn"><i class="fa fa-search"></i></button> 
						
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="#" class="text-uppercase">Login</a> / <a href="#" class="text-uppercase">Join</a>
							<ul class="custom-menu">
								<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
								<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">3</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span>35.20$</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="./img/thumb-product01.jpg" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="./img/thumb-product01.jpg" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
									</div>
									<div class="shopping-cart-btns">
										<button class="main-btn">View Cart</button>
										<button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- /container -->

			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women's Fashion<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Clothing</h3></li>
											<li><a href="#">Saree</a></li>
											<li><a href="#">Koti & Jackets</a></li>
											<li><a href="#">Salwar Kameez</a></li>
											<li><a href="#">Kurti</a></li>
											<li><a href="#">Lehengas</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Jewelry & Watches</h3></li>
											<li><a href="#">Anklets</a></li>
											<li><a href="#">Bracelets</a></li>
											<li><a href="#">Necklaces</a></li>
											<li><a href="#">Rings</a></li>
											<li><a href="#">Watches</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Shoes & Bags</h3></li>
											<li><a href="#">Athletic</a></li>
											<li><a href="#">Fashion Sneakers</a></li>
											<li><a href="#">Sandals</a></li>
											<li><a href="handbags.php">Handbags</a></li>
											<li><a href="#">Backpack</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Men's Fashion<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Clothing</h3></li>
											<li><a href="#">Shirts</a></li>
											<li><a href="#">Pants</a></li>
											<li><a href="#">Suits & Blazers</a></li>
											<li><a href="#">Hoodies & Sweatshirts</a></li>
											<li><a href="#">Jacket & Coats</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Men's Accessories</h3></li>
											<li><a href="#">Belts And Wallets</a></li>
											<li><a href="#">Hats & Caps</a></li>
											<li><a href="#">Bags</a></li>
											<li><a href="#">Sunglasses</a></li>
											<li><a href="#">Watches</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Men's Footware</h3></li>
											<li><a href="#">Formal Shoes</a></li>
											<li><a href="#">Fashion Converse & Sneakers</a></li>
											<li><a href="#">Sandals</a></li>
											<li><a href="#">Sports Shoes</a></li>
											<li><a href="casualshoe.php">Casual Shoes</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>

						<li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Phones & Accessories <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Smartphones</h3></li>
											<li><a href="#">iPhone</a></li>
											<li><a href="samsung.php">Samsung</a></li>
											<li><a href="#">Xiaomi</a></li>
											<li><a href="#">Huawei</a></li>
											<li><a href="#">Oneplus</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Accessories</h3></li>
											<li><a href="#">Selfi Stick</a></li>
											<li><a href="#">Earphones</a></li>
											<li><a href="#">Cover & Display Protector</a></li>
											<li><a href="#">Powerbank/Charger/Battery</a></li>
											<li><a href="#">Gadgets</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4 hidden-sm hidden-xs">
										<a class="banner banner-2" href="#">
											<img src="./img/banner04.jpg" alt="">
											<div class="banner-caption">
												<h3 class="white-color">NEW<br>COLLECTION</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Electronics<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Computer</h3></li>
											<li><a href="#">Laptop</a></li>
											<li><a href="#">Notebook</a></li>
											<li><a href="#">Monitor</a></li>
											<li><a href="#">Tablet</a></li>
											<li><a href="#">LDesktop</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Computer Accessories</h3></li>
											<li><a href="#">Mouse & Keyboard</a></li>
											<li><a href="#">Headphones & Speakers</a></li>
											<li><a href="#">Modem,Router,Hub & Switches</a></li>
											<li><a href="#">HDD,Processors,RAM,Flash Memory</a></li>
											<li><a href="#">Others</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Home Applience</h3></li>
											<li><a href="#">TV</a></li>
											<li><a href="#">Refigerator</a></li>
											<li><a href="#">Air Cooler</a></li>
											<li><a href="#">Blender/Grinder/Juicer</a></li>
											<li><a href="#">Cooker/ovens/Coffee maker</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>

						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Sports,Books & More<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Sports</h3></li>
											<li><a href="#">Cricket</a></li>
											<li><a href="#">Football</a></li>
											<li><a href="#">Skating</a></li>
											<li><a href="#">Swimming</a></li>
											<li><a href="#">Camping & Hiking</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Books</h3></li>
											<li><a href="#">Academic</a></li>
											<li><a href="#">Business</a></li>
											<li><a href="#">Literature & Fiction</a></li>
											<li><a href="#">Children</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Gaming</h3></li>
											<li><a href="#">xbox one games</a></li>
											<li><a href="#">ps4 games</a></li>
											<li><a href="#">Gaming Console</a></li>
											<li><a href="#">Gameing Accessories</a></li>
											<li><a href="#">Smart Glasses(VR)</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>

						
						<li><a href="#">View All</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Shop</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Clothing</h3></li>
											<li><a href="#">Saree</a></li>
											<li><a href="#">Koti & Jackets</a></li>
											<li><a href="#">Salwar Kameez</a></li>
											<li><a href="#">Kurti</a></li>
											<li><a href="#">Lehengas</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Jewelry & Watches</h3></li>
											<li><a href="#">Anklets</a></li>
											<li><a href="#">Bracelets</a></li>
											<li><a href="#">Necklaces</a></li>
											<li><a href="#">Rings</a></li>
											<li><a href="#">Watches</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Shoes & Bags</h3></li>
											<li><a href="#">Athletic</a></li>
											<li><a href="#">Fashion Sneakers</a></li>
											<li><a href="#">Sandals</a></li>
											<li><a href="#">Handbags</a></li>
											<li><a href="#">Backpack</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>

						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Men <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
											   <h3 class="list-links-title">Clothing</h3></li>
											<li><a href="#">Shirts</a></li>
											<li><a href="#">Pants</a></li>
											<li><a href="#">Suits & Blazers</a></li>
											<li><a href="#">Hoodies & Sweatshirts</a></li>
											<li><a href="#">Jacket & Coats</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Men's Accessories</h3></li>
											<li><a href="#">Belts And Wallets</a></li>
											<li><a href="#">Hats & Caps</a></li>
											<li><a href="#">Bags</a></li>
											<li><a href="#">Sunglasses</a></li>
											<li><a href="#">Watches</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Men's Footware</h3></li>
											<li><a href="#">Formal Shoes</a></li>
											<li><a href="#">Fashion Converse & Sneakers</a></li>
											<li><a href="#">Sandals</a></li>
											<li><a href="#">Sports Shoes</a></li>
											<li><a href="#">Casual Shoes</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>



                        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">TOP BRANDS<i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="products.php">Lee</a></li>
								<li><a href="products.php">Armani</a></li>
								<li><a href="products.php">Wrangler</a></li>
								<li><a href="products.php">Jockey</a></li>
								<li><a href="products.php">Libas</a></li>
								<li><a href="products.php">Adidas</a></li>
								<li><a href="products.php">Nike</a></li>
								<li><a href="products.php">Reebok</a></li>
								<li><a href="products.php">Puma</a></li>
								<li><a href="products.php">Samsung</a></li>
								<li><a href="products.php">Sony</a></li>
								<li><a href="products.php">Appler</a></li>
								<li><a href="products.php">MI</a></li>
								<li><a href="products.php">LG</a></li>
								<li><a href="products.php">Micosoft</a></li>
								<li><a href="products.php">Logitech</a></li>
								<li><a href="products.php">Phillips</a></li>
								<li><a href="products.php">BeatBox</a></li>
								
								
							</ul>

						</li>

						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="index.php">Homeeeeeeeeeeeee</a></li>
								<li><a href="singleproduct.php">Products</a></li>
								<li><a href="product-page.php">Product Details</a></li>
								<li><a href="cart_page.php">Checkout</a></li>
							</ul>
						</li>

					</ul>
				</div><!--navigation-->

				<!-- menu nav -->
			</div>
		</div>
	</div>
</body>
</html>