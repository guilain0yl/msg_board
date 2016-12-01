<!DOCTYPE html>
<html>
<head>
	<title>结果</title>
	<script type="text/javascript">
	window.onload=function()
	{
		<?php
		require('func_show.php');

		$name=$_REQUEST['name'];
		$msg=$_REQUEST['msg'];

		if(insert_msg($name,$msg))
			show_result("success");
		else show_result("fail");
		?>
	}
	</script>
	<?php header('Location: msg_board.php'); ?>
</head>
<body>
</body>
</html>
