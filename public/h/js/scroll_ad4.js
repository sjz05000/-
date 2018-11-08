document.write('<div id=\"ad4_div"></div>');
var ad4_len=ad4_slideimages.length;
var ad4_i=0;
function ad4_change_ad(){
  document.getElementById("ad4_div").innerHTML=ad4_check_html(ad4_slideimages[ad4_i]);

	ad4_i++;
	
	if(ad4_i>=ad4_len)	ad4_i=0;


}
function ad4_check_html(str)
{
str = !str ? "" : str;
	var pos=str.indexOf("<OBJECT");
	 if(pos==-1){return str;}else{
	 var strp=str.split('|$|');
	var nstr="";
	nstr+='<div style=\"position:relative;left:0;top:0;z-index:1;width:'+ad4_scrollwidth+'; height:'+ad4_scrollheight+'\">';
	nstr+='<div style=\"position:absolute;z-index:2;width:'+ad4_scrollwidth+'; height:'+ad4_scrollheight+'\">';
	nstr+='<A target=_blank HREF='+strp[0]+'>';
	nstr+='<img src=http://adp1.cnool.net//bg2.gif width='+ad4_scrollwidth+' height='+ad4_scrollheight+' border=0 >';
	nstr+='</a></div>';
	nstr+=strp[1];
	nstr+='</div>';
	return nstr;
	}
}

var ad4_change_ad_interval = window.setInterval("ad4_change_ad()",10000);

ad4_change_ad();