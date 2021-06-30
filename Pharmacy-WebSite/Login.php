<?php require_once('DBconnect.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login_fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login_fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="login_css/main.css">
</head>

<?php

if ($_SERVER['REQUEST_METHOD'] =='POST') {
     
     $Useremail     = $_POST['email'];
     $userpassword  = $_POST['pass'];
     //$hashedpassword= sha1($userpassword);
   
     //$stmt = $con->prepare("SELECT UserID, UserEmail, UserPassword FROM users WHERE UserEmail = ? AND UserPassword = ? AND GroupID = 1 ");
     //$stmt->execute(array($Useremail, $hashedpassword,));
     //$row = $stmt->fetch(); 
     //$count = $stmt->rowCount();
   
     if (empty($Useremail) || empty($userpassword)) {
       echo "Please insert all data";
     }else{
       
     $stmt = $con->prepare("SELECT * FROM users WHERE Email = ? AND Password = ? ");
     $stmt->execute(array($Useremail, $userpassword));
     $profile = $stmt->fetch();
     $count = $stmt->rowCount();
   
    
   
     if ($count > 0) {
       # code...
       $_SESSION['USER'] = $Useremail;
       $_SESSION['ID']   = $profile['User_ID'];
       $_SESSION['GroupID'] = $profile['Group_ID'];
   
       
       
       header('Location: index.php');
   
     }else{
      ?>
      <div class="alert alert-danger" role="alert">
          Incorrect mail or password, please try again!
      </div>
      <?php
     }
     }
   
   
     
   
   }
   
   ?>











<body>
	<?php if (!isset($_SESSION['ID'])) {
      
     ?>
	<div class="limiter">


		<div class="container-login100">
			<div class="wrap-login100">

				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">

					
					<span class="login100-form-logo">
						<img src="logo.png" width="80px" height="80px">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>


					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email"  required placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>



					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" required placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Login">
					</div>

					
				</form>
			</div>
		</div>



	</div>
</body>
<?php }else{


   ?>
      <div class="alert alert-danger" role="alert">
          Already Logged in!

        </div>
   <?php
      }
   ?>
</html>