<?php include '../classes/AdminInfo.php';?>
<?php
     $al = new Adminlogin();
     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $adminuser = $_POST['adminuser'];
            $adminpass = md5( $_POST['adminpass']);



            $loginChk = $al->adminlogin($adminuser,$adminpass);
     }


?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span style="color:red;font-size:18px;">

                <?php

                      if (isset($loginChk)){
                      	echo $loginChk;
                      }


                ?>

		    </span>
			<div>
				<input type="text" placeholder="username"  name="adminuser"/>
			</div>
			<div>
				<input type="password" placeholder="password"  name="adminpass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">BestDeals</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>