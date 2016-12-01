<?php
	require('func_show.php');

	$mod=$_REQUEST['mod'];

	if($mod==="quit")
	{
		setcookie("name",$name,time()-3600);
		header('Location: msg_board.php');
	}

	show_msg_board();
?>