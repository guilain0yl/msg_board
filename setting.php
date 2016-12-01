<?php
	require('func_show.php');

	$status=$_REQUEST['setting'];

	if($status)
		$result=change_insert(1);
	else $result=change_insert(0);

	if($result)
		echo "success";
?>