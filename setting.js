var checkbox=document.getElementById("check_status");
var xmlHttp;

//状态改变

function SettingResult()
{
	if(xmlHttp.readyState==4||xmlHttp.readyState=="complete")
	{
		if(xmlHttp.responseText=="success")
		{
			return;
		}else
			checkbox.checked=!checkbox.checked;
	}
}


function changestatus()
{
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request");
  		return;
	}
	if(checkbox.checked)
		status=1;
	else
		status=0;
	info="setting="+status;
	xmlHttp.onreadystatechange=SettingResult;
	xmlHttp.open("POST","setting.php",true);
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttp.send(info);
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