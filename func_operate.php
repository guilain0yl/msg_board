<?php
	function _query_($query)
	{
		@ $db=mysql_connect("localhost","msg_board","19951004");

		if (!$db)
			die('Could not connect: ' . mysql_error());//实际运营是改为输出log

		$select_db=mysql_select_db("msg_board",$db);

		if (!$select_db)
			die ("Can\'t use test_db : " . mysql_error());

		$result=mysql_query($query);

		mysql_close($con);

		return $result;
	}

	//
	function insert_msg($name,$msg)
	{
		if(!$name)
			$name="Anonymous";
		
		$name=safe_($name);
		$msg=safe_($msg);

		$time=time();

		$query="insert into msg (name,msg,time) values ('".$name."','".$msg."','".$time."')";

		$result=_query_($query);

		if(!$result)
			return false;
		else return true;
	}

	function safe_($string)
	{
		$tmp=trim($name);

		if(!get_magic_quotes_gpc($string))
			$tmp=addslashes($tmp);


		return $string;
	}

	function show_msg()
	{
		$query="select * from msg order by id desc limit 10";

		$result=_query_($query);

		if(!$result)
			die("ERROR: no result;");
	
		$num_result=mysql_num_rows($result);

		for($i=0;$i<$num_result;$i++)
		{
		    $row=mysql_fetch_array($result);

		    $time=date('Y年n月j日 H:i:s',$row['time']);
		
			echo "<span class=\"msg\"><b>ID:".$row['name']."<br><br>".$row['msg']."<br><span class=\"time\">--发表于:".$time."</span></span></b>";
			echo "<hr>";
			echo "<br>";
		}
	}

	function is_insert()
	{
		$query="select is_insert from user";

		$result=_query_($query);

		$row=mysql_fetch_array($result);

		if($row['is_insert'])
			return true;
		else return false;
	}

	function change_insert($value)

	{

		$query="update user set is_insert=".$value." where name='".$_COOKIE["name"]."'";
		
		_query_($query);
	
		if(is_insert()==$value)
			return true;
		else return false;
	}

	function validate($name,$password)
	{
		$query="select * from user";

		$result=_query_($query);

		$row=mysql_fetch_array($result);

		if(!$name)
		{
			if($row['name'])
				return true;
			else return false;
		}

		if($row['name']===$name&&$row['password']===md5($password))
			return true;
		else return false;
	}

	function reg_($name,$password)
	{
		$name=safe_($name);
		$password=safe_($password);

		$query="insert into user (name,password,is_insert) values ('".$name."','".md5($password)."','1')";

		$result=_query_($query);

		if(!$result)
			return false;
		else return true;
	}
?>