document.write('<div id=\"ad2_div"></div>');
var ad2_len=ad2_slideimages.length;
var ad2_i=0;
function ad2_change_ad(){
  document.getElementById("ad2_div").innerHTML=ad2_check_html(ad2_slideimages[ad2_i]);

	ad2_i++;
	
	if(ad2_i>=ad2_len)	ad2_i=0;


}
function ad2_check_html(str)
{
str = !str ? "" : str;
	var pos=str.indexOf("<OBJECT");
	 if(pos==-1){return str;}else{
	 var strp=str.split('|$|');
	var nstr="";
	nstr+='<div style=\"position:relative;left:0;top:0;z-index:1;width:'+ad2_scrollwidth+'; height:'+ad2_scrollheight+'\">';
	nstr+='<div style=\"position:absolute;z-index:2;width:'+ad2_scrollwidth+'; height:'+ad2_scrollheight+'\">';
	nstr+='<A target=_blank HREF='+strp[0]+'>';
	nstr+='<img src=http://adp1.cnool.net//bg2.gif width='+ad2_scrollwidth+' height='+ad2_scrollheight+' border=0 >';
	nstr+='</a></div>';
	nstr+=strp[1];
	nstr+='</div>';
	return nstr;
	}
}

var ad2_change_ad_interval = window.setInterval("ad2_change_ad()",10000);

ad2_change_ad();