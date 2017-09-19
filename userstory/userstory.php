<?php 

session_start();
require_once 'includefiles/config.php';
require_once 'includefiles/functions.php';
if( empty($_SESSION['UserName'])){
	echo '<script>window.location = "login.php";</script>';
}

$uname=$_SESSION['UserName'];
$sql1= mysql_query("select * from users where UserName='$uname'");
$num1=mysql_fetch_array($sql1);
$uId=$num1['User_Id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Userstory</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-toggle.css" rel="stylesheet">
    
</head>

<body>
<div class="top_nav">
<div class="nav_menu">
  <nav class="" role="navigation">
	<h3 class="tilele">Inventory Management</h3>

	<ul class="nav navbar-nav navbar-right">
	  <li class="">
		<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		  <img src="images/img.jpg" alt=""><?php echo $_SESSION['UserName']; ?>
		  <span class=" fa fa-angle-down"></span>
		</a>
		<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
		 
		  <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
		  </li>
		</ul>
	  </li>
	</ul>
  </nav>
</div>

</div>
<div class="content-tt">
  	<div class="main-tab">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
				<a href="#All-Task" aria-controls="All-Task" role="tab" data-toggle="tab">My To-Do List</a></li>
				
			</ul>

	<!-- Tab panes -->
	<div class="tab-content">
				
	<!-- --------------------ALL TASK LIST--------------------- -->	
	<div role="tabpanel" class="tab-pane active" id="profile">
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="All-Tasklist">
				<div class="custom-table-width">
					<div class="table-responsive">
						<form action="javascript:void(0);" id="tasklist" name="tasklist">
							<table class="table table-bordered" >
								<thead class="color-bg"> 
									<tr> 
										<th>Date#  </th>
										<th>Quantity#  </th>
										<th>Cost#</th>
										<th>Buy/Sell#</th>
										
									</tr>
								</thead>
							<?php
							$ssql= mysql_query("select * from userstory");
							$num=mysql_num_rows($ssql);
							if($num>0)
							{
							while($row = mysql_fetch_array($ssql))
							{
							?>
								<tbody> 
									<tr> 
										<td><?php echo $row['Date'] ?> </td>
										<td><?php echo $row['Quantity'] ?> </td>
										<td><?php echo $row['Cost'] ?> </td>
										<td><?php echo $row['Output'] ?> </td>
										
										
									</tr>
									
								</tbody>
							<?php 
							}
							}
							?>

							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!---------------Ends ---------------------->
		<div>
			<a class="blue-text" data-target="#myModa" data-toggle="modal" href="javascript:void(0);" id="gettask" onclick="edittask(this.id);">
			<i class="fa fa-pencil"></i> Click here for Total Inventory Left on the end of 11 jan 2016</a>
		</div>
	
	</div>

	</div>
  </div>
  <footer class="main-footer">
	<p>&copy; 2017  All rights reserved</p>
  </footer>


<!-- ---------------------Modal 6----------------------------------- -->
<div class="modal fade" id="myModa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Total Inventory Left on the end of 11 jan 2016</h4>
			</div>
			<div class="modal-body">
				<form action="javascript:void(0);" id="edit-form" name="edit-form" method="POST">
					<?php 
					$sql = mysql_query("select SUM(Quantity),Output from userstory group by  Output");
					while($rows = mysql_fetch_array($sql))
					{
						if($rows['Output'] == 'Buy') 
						{
							$buy =   $rows["SUM(Quantity)"];
						} 
						if($rows['Output'] == 'Sell') 
						{
							$sells = $rows["SUM(Quantity)"]; 
						}
					
					}
					
					?>
					<div class="form-lable">
						<label>Units in Ending Inventory:</label>
						<input type="text" class="with-border" name="tName" id="tName" value="<?php  echo  $inqnt = $buy - $sells;;?>">
					</div>
								
				</form>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>


<!-- --------------------End----------------------------------- -->



<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	
	<script src="js/ajax.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
	
	<script src="js/bootstrap-toggle.js"></script>
	
<!-- Style For Error Message -->
<style>
	.error-span {
    color: #ff0000;
    font-weight: bold;
}


</style>


</body>

</html>

<script type="text/javascript">
function totalinventoryleft(id)
{
	alert(hello);
	die();
	$.ajax({
            url: "includefiles/status_ajax.php",
            type: "POST",
            data:  "id="+id,
            
           }).success(function( msg ) 
    	    {
				setTimeout(function()
				{
				window.location.href = "#All-Task";
				$('#All-Task').load(document.URL +  ' #All-Task');
				location.reload();
				},100);
			});
	
	
}
</script>
