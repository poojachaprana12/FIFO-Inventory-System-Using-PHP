<?php 

// FUNCTIONS AND QUERIES


//----------Login Function---------

function login($username,$password){
	$password =	md5($password);
	$sql = "SELECT * FROM users WHERE `UserName`='$username' AND `PassWord`='$password' ";
	$row=mysql_query($sql);
	$data=mysql_fetch_array($row);
	return $data;
}


//-----------Task Functions----------


