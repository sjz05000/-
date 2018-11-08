document.write('<div id=\"ad6_div"></div>');
var ad6_len=ad6_slideimages.length;
var ad6_i=0;
function ad6_change_ad(){
  document.getElementById("ad6_div").innerHTML=ad6_check_html(ad6_slideimages[ad6_i]);

	ad6_i++;
	
	if(ad6_i>=ad6_len)	ad6_i=0;


}
function ad6_check_html(str)
{
str = !str ? "" : str;
	var pos=str.indexOf("<OBJECT");
	 if(pos==-1){return str;}else{
	 var strp=str.split('|$|');
	var nstr="";
	nstr+='<div style=\"position:relative;left:0;top:0;z-index:1;width:'+ad6_scrollwidth+'; height:'+ad6_scrollheight+'\">';
	nstr+='<div style=\"position:absolute;z-index:2;width:'+ad6_scrollwidth+'; height:'+ad6_scrollheight+'\">';
	nstr+='<A target=_blank HREF='+strp[0]+'>';
	nstr+='<img src=http://adp1.cnool.net//bg2.gif width='+ad6_scrollwidth+' height='+ad6_scrollheight+' border=0 >';
	nstr+='</a></div>';
	nstr+=strp[1];
	nstr+='</div>';
	return nstr;
	}
}

var ad6_change_ad_interval = window.setInterval("ad6_change_ad()",10000);

ad6_change_ad();