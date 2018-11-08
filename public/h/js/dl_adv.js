//东方热线对联广告
//2008.12.31 by 阿锴


//对联随屏幕移动
var bdy2 = (document.documentElement && document.documentElement.clientWidth)?document.documentElement:document.body;
var mark=0;
lastScrollY=0;
function heartBeat(){
	diffY=bdy2.scrollTop;
	percent=.3*(diffY-lastScrollY);
	if(percent>0)percent=Math.ceil(percent);
	else percent=Math.floor(percent);
	document.all.dl_left.style.pixelTop+=percent;
	document.all.dl_right.style.pixelTop+=percent;
	document.all.dl_left_s.style.pixelTop+=percent;
	document.all.dl_right_s.style.pixelTop+=percent;
	lastScrollY=lastScrollY+percent;
}

//显示对联
function ShowDL()
{
	dl_left_s.style.visibility="hidden"; 
	dl_right_s.style.visibility="hidden";
	dl_left.style.visibility="visible"; 
	dl_right.style.visibility="visible";
	setTimeout("CloseDL();",8000);
}

//缩小对联
function CloseDL()
{
	if(mark==0){
	dl_left.style.visibility="hidden"; 
	dl_right.style.visibility="hidden";
	dl_left_s.style.visibility="visible"; 
	dl_right_s.style.visibility="visible";
	}
}
//关闭对联
function CloseDL2()
{
	mark=1;
	dl_left.style.visibility="hidden"; 
	dl_right.style.visibility="hidden";
	dl_left_s.style.visibility="hidden"; 
	dl_right_s.style.visibility="hidden";
}

//初始化对联
function InitDL()
{
	dl_left_code="<DIV id=dl_left style='Z-INDEX: 10; LEFT: 6px; POSITION: fixed; TOP: 35px; width: 80; height: 300px;'>";
//	dl_left_code+="<a href='"+dl_link+"' target='_blank'><img src='"+dl_src1+"' width='80' height='240' border='0'></a>";
	dl_left_code+=GetAD('left');
	dl_left_code+="<table width='80' bgcolor='#EDF6FF' border='0' cellpadding='0' cellspacing='0'><tr><td style='padding-top:0px;padding-left:2px;' align=left><a href='#' onclick='javascript:CloseDL();return false;' style='font-size:12px;color:#000000;text-decoration:none;;line-height:130%'>关闭</a></td></tr></table></DIV>";
	document.write(dl_left_code);

	dl_right_code="<DIV id=dl_right style='Z-INDEX: 10; Right: 6px; POSITION: fixed; TOP: 35px; width: 80; height: 300px;'>";
//	dl_right_code+="<a href='"+dl_link+"' target='_blank'><img src='"+dl_src2+"' width='80' height='240' border='0'></a>";
	dl_right_code+=GetAD('right');
	dl_right_code+="<table width='80' bgcolor='#EDF6FF' border='0' cellpadding='0' cellspacing='0'><tr><td style='padding-top:0px;padding-left:2px;' align=right><a href='#' onclick='javascript:CloseDL();return false;' style='font-size:12px;color:#000000;text-decoration:none;;line-height:130%'>关闭</a></td></tr></table></DIV>";
	document.write(dl_right_code);

	dl_left_s_code="<DIV id=dl_left_s style='Z-INDEX: 10; LEFT: 6px; POSITION: fixed; TOP: 35px; width: 20; height: 300px;'>";
	//dl_left_s_code+="<a href='"+dl_link+"' target='_blank'><img src='"+dl_img+"' width='20' height='240' border='0'></a>";
	dl_left_s_code+=GetAD('small');
	dl_left_s_code+="<table width=\"20\" bgcolor=\"#EDF6FF\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td style=\'text-align:center;padding-top:3px;\' bgcolor=\'#ffffff\'><a href=\'#\' onclick=\'javascript:ShowDL();return false;\' style=\'font-size:12px;color:#000000;text-decoration:none;line-height:130%\'>重 播</a></td></tr></table><div style='text-align:center'><a href='javascript:CloseDL2();' style=\'font-size:12px;color:#000000;text-decoration:none;line-height:130%\'>x</a></div></DIV>";

	dl_right_s_code="<DIV id=dl_right_s style='Z-INDEX: 10; Right: 6px; POSITION: fixed; TOP: 35px; width: 20; height: 300px;'>";
	//dl_right_s_code+="<a href='"+dl_link+"' target='_blank'><img src='"+dl_img+"' width='20' height='240' border='0'></a>";
	dl_right_s_code+=GetAD('small');
	dl_right_s_code+="<table width=\"20\" bgcolor=\"#EDF6FF\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td style=\'text-align:center;padding-top:3px;\' bgcolor=\'#ffffff\'><a href=\'#\' onclick=\'javascript:ShowDL();return false;\' style=\'font-size:12px;color:#000000;text-decoration:none;line-height:130%\'>重 播</a></td></tr></table><div style='text-align:center'><a href='javascript:CloseDL2();' style=\'font-size:12px;color:#000000;text-decoration:none;line-height:130%\'>x</a></div></DIV>";
	document.write(dl_left_s_code);
	document.write(dl_right_s_code);

	dl_left_s.style.visibility="hidden"; 
	dl_right_s.style.visibility="hidden";

	setTimeout("CloseDL();",8000);
	//flash格式调用方法
	//<EMBED src='flash.swf' quality=high  WIDTH=100 HEIGHT=300 TYPE='application/x-shockwave-flash' id=ad wmode=opaque></EMBED>
}

//获取广告实体
function GetAD(type)
{
	dl_w=80;
	if(type=='left')
	{
		dl_src=dl_src1;
		
	}else if(type=='right')
	{
		dl_src=dl_src2;
		
	}else
	{
		dl_src=dl_img;
		dl_w=20;
	}
	suffix=dl_src.substr(dl_src.length-4);
	//alert(suffix);
	if(suffix=='.swf')
	{
		adobject="<div  style=\"POSITION: absolute;TOP:0;LEFT:0;z-index:1\"><a href='"+dl_link+"' target=_blank><img src=http://adp1.cnool.net/bg2.gif width="+dl_w+" height=240 border=0></a></div>";

		adobject+="<EMBED src='"+dl_src+"' quality=high  WIDTH='"+dl_w+"' HEIGHT='240' TYPE='application/x-shockwave-flash' id=ad wmode=opaque></EMBED>";
	}else{
		adobject="<a href='"+dl_link+"' target='_blank'><img src='"+dl_src+"' width='"+dl_w+"' height='240' border='0'></a>";
	}
	return adobject;
	 
}

if(typeof(dl_img) == "undefined")
{
	//document.write("cl_img has not been defined.");
}else{
	InitDL();
	//window.setInterval("heartBeat()",1);
}
