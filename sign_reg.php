<?php
	require('func_show.php');

	if(isset($_COOKIE["name"]))
		header('Location: msg_board.php');

	$name=$_REQUEST['user_name'];
	$password=$_REQUEST['user_pwd'];

	$is_first=validate();

	if(!empty($name))
	{
		if(!$is_first)//初次使用 出现注册界面
		{
			if(!(empty($name)||empty($password)))
			{
				if(reg_($name,$password))//注册失败
					header('Location: sign_reg.php');
				else 
					header('Location: fail.php');
			}
		}
	}
	else show_reg_sign($is_first);
?>