<?php 
//-----Session Start-------------
session_start();

//-----Connection File--------------
require_once 'includefiles/config.php';
//-----Functions File with Queries--
require_once 'includefiles/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		
	</head>
	<body>
	
		<!--login modal-->
		<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
			  <div class="modal-header">
				   <h1 class="text-center">Login</h1>
			  </div>
			  <?php 
				//--------------------Username and Password--------
				if(isset($_POST['submit']))
				{
					if($_POST['username']=="")
					{
						$error="Please enter username";
						echo "<div style='color:red;margin-left: 28px;'>";
						echo $error;
						echo "</div>";
					}
					elseif($_POST['password']=="")
					{
						$error1="Please enter password";
						echo "<div style='color:red;margin-left: 28px;'>";
						echo $error1;
						echo "</div>";
					}
			  
					else
					{
						$username=$_POST['username'];
						$password=$_POST['password'];
						$user_login=login($username,$password);
						$_SESSION['UserName']=$user_login['UserName'];
						if(isset($_SESSION['UserName']) & !empty($_SESSION['UserName']))
							{
								echo '<script>window.location = "userstory.php";</script>';
								exit;
							}
							
						else
							{
								echo "<div style='color:red;margin-left: 28px;'>";
								echo "Not valid detail enter";
								echo "</div>";
							}
					}
				}
			  ?>
	<!-----------------------Login Form-------------------------->		  
			  <div class="modal-body">
				  <form class="form col-md-12 center-block" id="loginForm" method="post" action="" >
					<div class="form-group">
					  <input type="text" class="form-control input-lg" placeholder="Username" name="username" >
					</div>
					<div class="form-group">
					  <input type="password" class="form-control input-lg" placeholder="Password" name="password">
					</div>
					<div class="form-group">
					  <button class="btn btn-primary btn-lg btn-block"  name="submit">Log In</button>
					</div>
				  </form>
			  </div>
			  
			  
	<!-----------------------Login Form End-------------------------->	
			  <div class="modal-footer">
				 <!---Outer background--->
			  </div>
			</div>
		  </div>
		</div>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>