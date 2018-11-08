document.write('<div id=\"ad3_div"></div>');
var ad3_len=ad3_slideimages.length;
var ad3_i=0;
function ad3_change_ad(){
  document.getElementById("ad3_div").innerHTML=ad3_check_html(ad3_slideimages[ad3_i]);

	ad3_i++;
	
	if(ad3_i>=ad3_len)	ad3_i=0;


}
function ad3_check_html(str)
{
str = !str ? "" : str;
	var pos=str.indexOf("<OBJECT");
	 if(pos==-1){return str;}else{
	 var strp=str.split('|$|');
	var nstr="";
	nstr+='<div style=\"position:relative;left:0;top:0;z-index:1;width:'+ad3_scrollwidth+'; height:'+ad3_scrollheight+'\">';
	nstr+='<div style=\"position:absolute;z-index:2;width:'+ad3_scrollwidth+'; height:'+ad3_scrollheight+'\">';
	nstr+='<A target=_blank HREF='+strp[0]+'>';
	nstr+='<img src=http://adp1.cnool.net//bg2.gif width='+ad3_scrollwidth+' height='+ad3_scrollheight+' border=0 >';
	nstr+='</a></div>';
	nstr+=strp[1];
	nstr+='</div>';
	return nstr;
	}
}

var ad3_change_ad_interval = window.setInterval("ad3_change_ad()",10000);

ad3_change_ad();