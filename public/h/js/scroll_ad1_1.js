document.write('<div id=\"ad1_div\"></div>');
var ad1_len=ad1_slideimages.length;
var ad1_i=0;
function ad1_change_ad(){
  document.getElementById("ad1_div").innerHTML=ad1_check_html(ad1_slideimages[ad1_i]);

	ad1_i++;
	
	if(ad1_i>=ad1_len)	ad1_i=0;


}
function ad1_check_html(str)
{
str = !str ? "" : str;
	var pos=str.indexOf("<OBJECT");
	 if(pos==-1){return str;}else{
	 var strp=str.split('|$|');
	var nstr="";
	nstr+='<div style=\"position:relative;left:0;top:0;z-index:1;width:'+ad1_scrollwidth+'; height:'+ad1_scrollheight+'\">';
	nstr+='<div style=\"position:absolute;z-index:2;width:'+ad1_scrollwidth+'; height:'+ad1_scrollheight+'\">';
	nstr+='<A target=_blank HREF='+strp[0]+'>';
	nstr+='<img src=http://adp1.cnool.net//bg2.gif width='+ad1_scrollwidth+' height='+ad1_scrollheight+' border=0 >';
	nstr+='</a></div>';
	nstr+=strp[1];
	nstr+='</div>';
	return nstr;
	}
}

var ad1_change_ad_interval = window.setInterval("ad1_change_ad()",10000);

ad1_change_ad();