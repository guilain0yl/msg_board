<?php
	
	require('func_operate.php');

	function show_result($bool)
	{
		if($bool=="success")
		{
			echo "alert(\"留言成功！\")";
		}
		if($bool=="fail")
		{
			echo "alert(\"留言失败！\")";
		}
	}

	function show_button($is_first)
	{
		if(!$is_first)
			echo "<button type=\"submit\">注册</button>";
		else
			echo "<input type=\"button\" id=\"btn\" value=\"登录\" />";
	}

	function show_reg_sign($is_first)
	{
		if(!$is_first)
			$reg_sign="注册";
		else $reg_sign="登录";
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title><?php echo $reg_sign; ?></title>
			<link rel="stylesheet" type="text/css" href="style.css">
			<script type="text/javascript">
			window.onload=function()
			{
				document.getElementById("h1").style.left="37%"
				document.getElementById("h1").style.top="30%"
			}
			</script>
		</head>
		<body>
			<h1 id="h1"><?php echo $reg_sign; ?></h1>
			<form class="reg_sign_">
				<label>姓名:</label>
				<input type="text" name="user_name" id="user"><br><br>
				<label>密码:</label>
				<input type="password" name="user_pwd" id="pwd"><br><br>
				<div class="tip" id="sign_err"><b>用户名或密码输入错误</b></div>
				<div class="tip_" id="no_info"><b>请输入用户名或密码</b></div>
				<span class="reg_sign"><button type="reset">重置</button>
				<?php show_button($is_first); ?></span>
			</form>
		</body>
		<script src="validate.js"></script>
		</html>
		<?php
	}

function is_checked()
{
	if(is_insert())
		echo "checked";
}

	function show_user_info($is_signed)
	{
		if($is_signed)
		{
			?>
			<div class="user_info">guilain | <a class="setting">设置
			<span class="menu">留言功能
			<label class="switch_all">
			<input type="checkbox" id="check_status" class="switch" onclick="changestatus();" <?php is_checked(); ?> />
			<div class="contout">
				<div class="dot">
				</div>
			</div>
			</label>
			</span>
			</a> | <a href="msg_board.php?mod=quit">退出</a></div>
		<?php
		}
		else {
			?>
			<p class="sign"><a href="sign_reg.php">登录</a></p>
			<?php
		}
	}

	function show_msg_board()
	{
		$is_signed=false;
		$is_insert=is_insert();
		if(isset($_COOKIE["name"]))
		{
			$is_signed=true;
			$is_insert=true;
		}
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>MSG</title>
			<link rel="stylesheet" type="text/css" href="style.css">
			<link rel="stylesheet" type="text/css" href="menu-style.css">
			<link rel="stylesheet" type="text/css" href="switch-style.css">
			<?php
			if(!$is_insert)
			{
				?>
				<script type="text/javascript">
					window.onload=function()
					{
						document.getElementById("bk").style.height="95%";
						document.getElementById("show").style.height="95%";
					}
				</script>
				<?php
			}
			?>
		</head>
		<body>

			<h1>留言板</h1>
			<h2>说点什么吧...</h2>
			<?php show_user_info($is_signed); ?>
			<div class="MSG_BOARD">
				<!--留言板背景-->
				<div class="bkground" id="bk"></div>
				<!--写入留言内容-->
				<div class="show_msg" id="show">
					<?php show_msg(); ?>
				</div>
				<?php
			if($is_insert)
			{
				?>
				<div class="insert_msg">
					<form action="insert_msg.php" method="post">
						<textarea required name="msg" maxlength="10000" placeholder="留下点记忆吧..." cols="154" rows="10" class="msg_insert"></textarea>
						<input type="text" name="name" placeholder="让我知道你是谁？" maxlength="7" class="name">
						<button type="submit" class="send">发表</button>
					</form>
				</div>
				<?php
			}
			?>
			</div>
		</body>
		<script src="setting.js"></script>
		</html>
		<?php
	}
?>