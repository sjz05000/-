//首页大广告
var gg960ShowTime = 8000; //播放时间
var gg960Time = null;

function open_gg960(showBtn) {
    var rnd = Math.random();
    if (rnd > 0) {
        $('.gg_full .gg_fcon').html(gg960Con).slideDown(1170, function () {
            if (showBtn !== false) {
                $('.gg_full .gg_fbtn').fadeIn();
            }
            if (gg960Time) { clearTimeout(gg960Time); }
            gg960Time = setTimeout(close_gg960, gg960ShowTime);
        });
    }
}
function close_gg960() {
    $('.gg_full .gg_fcon').slideUp(350, function () {
        $(this).html('');
        $('.gg_fclose').hide();
        $('.gg_freplay').show();
    });
}
$('.gg_fclose').click(function(){
    if(gg960Time){clearTimeout(gg960Time);}
    close_gg960();
    return false;
});
$('.gg_freplay').click(function(){
    if(gg960Time){clearTimeout(gg960Time);}
    open_gg960(false);
    $('.gg_freplay').hide();
    $('.gg_fclose').show();
    return false;
});

var gg960Con;
var fullAdType = 'swf';
var fullAdUrl = ''
var fullAdName = '';;

$.getJSON("https://ida.cnool.net/AdShowCache2013?cnool-syts|1|2637&callback=?", function (ret) {
    if (ret.Src != "") {
        fullAdName = ret.Src;
        fullAdUrl = ret.Url;
        $("#taishan").show();

        if (fullAdName) {
            if (fullAdType == 'swf') {
                gg960Con = '<a href="' + fullAdUrl + '" target="_blank"><img width="1170" height="350" src="' + fullAdName + '"/></a>';
                //gg960Con = '<embed wmode="transparent" height="400" width="1000" flashvars="alink1='+fullAdUrl+'" allowscriptaccess="always" quality="high" name="Advertisement" id="Advertisement" style="" src="images/qpad.swf" type="application/x-shockwave-flash"></embed>';
            }
            else {
                gg960Con = '<a href="' + fullAdUrl + '" target="_blank"><img width="1170" height="350" src="' + fullAdName + '"/></a>'; //flash无法显示时，显示JPG广告
            }

            setTimeout(open_gg960, 8000);//延迟显示
        }
    }
});
