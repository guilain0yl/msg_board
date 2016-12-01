<?php
	require('func_show.php');
	
	$user_name=$_REQUEST['user_name'];
	$user_pwd=$_REQUEST['user_pwd'];

	if(validate($user_name,$user_pwd))
	{
		echo "success";
		setcookie("name",$user_name,time()+3600);
	}
?>