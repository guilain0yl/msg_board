var btn=document.getElementById("btn");
var user=document.getElementById("user");
var pwd=document.getElementById("pwd");
var sign_err=document.getElementById("sign_err");
var no_info=document.getElementById("no_info");
var checkbox=document.getElementById("check_status");
var xmlHttp;
var info;


//登录验证
btn.onclick=function()
{
	exec();
}

function keyword()
{
	switch(event.keyCode)
	{
		case 13: exec();
	}
}


function exec()
{
	sign_err.style.display="none";
	if(user.value==""||pwd.value=="")
	{
		no_info.style.display="block";
		return;
	}
	else
		no_info.style.display="none";
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request");
  		return;
	}
	info="user_name="+user.value+"&user_pwd="+pwd.value;
	xmlHttp.onreadystatechange=GetResult;
	xmlHttp.open("POST","validate.php",true);
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttp.send(info);
}

function GetResult()
{
	if(xmlHttp.readyState==4||xmlHttp.readyState=="complete")
	{
		if(xmlHttp.responseText=="success")
		{
			window.location.href="msg_board.php";
			return;
		}else
		{
			sign_err.style.display="block";
		}
	}
}

function GetXmlHttpObject()
{
	var XmlHttp=null;
	try
	{
		XmlHttp=new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			XmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			XmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return XmlHttp;
}


