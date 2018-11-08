// cnool基本功能js
jQuery(document).ready(function ($) {
    //tab页
    settabs('01');
    settabs('02');
    settabs('03');
    settabs('04');
    setstat();
})

function showForSB(options, c, n) {
    n ? n = 1 : n = 0;
    c.data("target")[options.show[n]]();
}

function selectBox (trig, options) {
    var _that = this, target = trig.find("dd"), def = { target: target, event: "hover", show: ["show", "hide"], slide: ["slideDown", "slideUp"], isSlide: false };
    options = $.extend(def, options);
    target = options.target;
    trig.each(function (index, callback) {
        var that = $(this);
        that.data("target", target.eq(index));
        if (options.isSlide) {
            options.show = options.slide;
        }
        if (options.event === "hover") {
            that.hover(function () {
                var _obj = that.find("dd"),
							_objWidth = that.width() + 8,
							_setWidth = _obj.width();
                if (_objWidth > _setWidth) {
                    that.find("dd").width(_objWidth);
                }
                showForSB(options, $(this), false)
            }, function () {
                showForSB(options, $(this), true)
            });
        }
        if (options.fn) {
            options.fn(that, that.data("target"));
        } else {
            that.find("a").click(function (ev) {
                var val = this.innerHTML;
                that.find("dt").html(val);
                showForSB(options, that, 1);
                ev.stopPropagation();
                return false;
            });
        }
    });
}

function settabs(divid) {
    //
    (function ($) {
        $("#homeBook-menu" + divid + " H2.homemenutitle SPAN:first").addClass("on");
        $("#homeBook-menu" + divid + " div.homemenubody:gt(0)").hide();
        $("#homeBook-menu" + divid + " H2.homemenutitle SPAN").mouseover(function () {
            $(this).addClass("on").siblings(" H2.homemenutitle SPAN").removeClass();
            $("div.homeBook-body" + divid + ":eq(" + $(this).index() + ")").show().siblings("div.homeBook-body" + divid).hide();
        });
    })(jQuery);
}

function setstat() {
    (function ($) {
        $("a").click(function () {
            var newsid = $(this).attr("id");

            if (IsNum(newsid)) {
                var title = $(this).attr("title");
                var url = $(this).attr("href");

                $.ajax({
                    async: false,
                    url: "http://header.cnool.net/Stat/Stat.ashx?newsid=" + newsid + "&title=" + escape(title) + "&url=" + escape(url) + "&" + new Date().getTime(),  // 跨域URL
                    type: 'GET',
                    dataType: 'jsonp',  //跨域必须是jsonp
                    jsonp: 'jsoncallback', //默认callback
                    timeout: 5000,
                    success: function (json) {
                    },
                    error: function (xhr) {

                    }
                });

            }
        });
    })(jQuery);
}

function IsNum(s) {
    if (s != null && s != "") {
        return !isNaN(s);
    }
    return false;
}

(function ($) {
    $.fn.reorder = function () {

        function randOrd() { return (Math.round(Math.random()) - 0.5); }

        return ($(this).each(function () {
            var $this = $(this);
            var $children = $this.children();
            var childCount = $children.length;

            if (childCount > 1) {
                $children.remove();

                var indices = new Array();
                for (i = 0; i < childCount; i++) { indices[indices.length] = i; }
                indices = indices.sort(randOrd);
                $.each(indices, function (j, k) { $this.append($children.eq(k)); });

            }
        }));
    }
})(jQuery);



/*
==轮播{对象|对象属性}==
对象属性{宽度|高度|文字大小|自动切换时间}
*/
function cnool_slideplayer(object, config) {
    this.obj = object;
    this.config = config ? config : { width: "305px", height: "335px", fontsize: "14px", right: "10px", bottom: "10px", time: "5000" };
    this.pause = false;
    var _this = this;
    if (!this.config.right) {
        this.config.right = "0px"
    }
    if (!this.config.bottom) {
        this.config.bottom = "3px"
    }
    if (this.config.fontsize == "14px" || !this.config.fontsize) {
        this.size = "14px";
        this.height = "34px";
        this.right = "6px";
        this.bottom = "10px";
    } else if (this.config.fontsize == "14px") {
        this.size = "14px";
        this.height = "23px";
        this.right = "6px";
        this.bottom = "15px";
    }
    this.count = jQuery(this.obj + " li").size();
    this.n = 0;
    this.j = 0;
    this.factory = function () {
        jQuery(this.obj).css({ position: "relative", zIndex: "0", margin: "0", padding: "0", width: this.config.width, height: this.config.height, overflow: "hidden" })
        jQuery(this.obj).prepend("<div style='position:absolute;z-index:20;right:" + this.config.right + ";bottom:" + this.config.bottom + "'></div>");
        jQuery(this.obj + " li").css({ width: "100%", height: "100%", overflow: "hidden" }).each(function (i) { jQuery(_this.obj + " div").append("<a>" + (i + 1) + "</a>") });

        jQuery(this.obj + " img").css({ border: "none", width: "100%", height: "100%" })

        this.resetclass(this.obj + " div a", 0);

        jQuery(this.obj + " p").each(function (i) {
            jQuery(this).parent().append(jQuery(this).clone(true));
            jQuery(this).html("");
            jQuery(this).css({ position: "absolute", margin: "0", padding: "0", zIndex: "1", bottom: "0", left: "0", height: _this.height, width: "100%", background: "#000", opacity: "0.7", overflow: "hidden" })
            jQuery(this).next().css({ position: "absolute", margin: "0", padding: "0", zIndex: "2", bottom: "0", left: "0", height: _this.height, lineHeight: _this.height, textIndent: "5px", width: "100%", textDecoration: "none", fontSize: _this.size, color: "#FFFFFF", background: "none", zIndex: "1", opacity: "1", overflow: "hidden" })
            if (i != 0) { jQuery(this).hide().next().hide() }
        });

        this.slide();
        this.addhover();
        t = setInterval(this.autoplay, this.config.time);
    }

    var play = function (target) {
        _this.j = jQuery(target).text() - 1;
        _this.n = _this.j;
        if (_this.j >= _this.count) { return; }
        jQuery(_this.obj + " li").hide();
        jQuery(_this.obj + " p").hide();
        jQuery(_this.obj + " li").eq(_this.j).show();
        jQuery(_this.obj + " li").eq(_this.j).find("p").show();
        _this.resetclass(_this.obj + " div a", _this.j);
    };

    this.slide = function () {
        jQuery(this.obj + " div a").mouseover(function () {
            play(this);
        });
    }

    this.addhover = function () {
        jQuery(this.obj).hover(function () {
            clearInterval(t);
        }, function () {
            t = setInterval(_this.autoplay, _this.config.time);
        });
    }

    this.autoplay = function () {
        _this.n = _this.n >= (_this.count - 1) ? 0 : ++_this.n;
        play(jQuery(_this.obj + " div a").eq(_this.n));
    }

    this.resetclass = function (obj, i) {
        jQuery(obj).css({ float: "left", marginRight: "3px", width: "15px", height: "14px", lineHeight: "15px", textAlign: "center", fontWeight: "800", fontSize: "12px", color: "#fff", background: "#666", cursor: "pointer" });
        jQuery(obj).eq(i).css({ color: "#FFFFFF", background: "#FFA800", textDecoration: "none" });
    }
}

//simplescroll
(function ($) {
    $.fn.cnool_simplescroll = function (options) {
        var opt = $.extend({}, $.fn.cnool_simplescroll.defaults, options);
        var $this = $(this);
        var scrollPause = false //是否暂停自动播放
        var scrollWrapId = "scrollWrap_" + $this.attr('id'); //包裹对象id
        var $scrollWrap; //包裹对象
        var ChildSize = $this.children().size(); //获得子节点数量
        var singleSize = opt.type == "x" ? $this.children().outerWidth() : $this.children().outerHeight(); //获得单个子节点尺寸
        var overPlus = opt.type == "x" ? $this.width() - ChildSize * singleSize : $this.height() - ChildSize * singleSize;

        if (overPlus >= 0) { return false } //内容不够多时候自动退出

        if (opt.auto) {
            opt.cycle = true;
            opt.action = "single";
        }

        //初始化
        var init = function () {
            $this.css({ position: "relative", zIndex: 0 });

            if (opt.cycle) { //循环播放时将类容复制3份
                opt.action = "single";
                $this.html("<div id='" + scrollWrapId + "' style='position:absolute;z-index:0;'>" + $this.html() + $this.html() + $this.html() + "</div>");
            } else {
                $this.html("<div id='" + scrollWrapId + "' style='position:absolute;z-index:0;'>" + $this.html() + "</div>");
            }
            $scrollWrap = $this.find("#" + scrollWrapId);

            if (opt.type == "x") {
                $scrollWrap.width(singleSize * $scrollWrap.children().size()).css({ left: 0, top: 0 });
                if (opt.cycle) {
                    $scrollWrap.css("left", singleSize * ChildSize * (-1));
                }
            } else {
                $scrollWrap.height(singleSize * $scrollWrap.children().size()).css({ top: 0, left: 0 });
                if (opt.cycle) {
                    $scrollWrap.css("top", singleSize * ChildSize * (-1));
                }
            }

            //绑定事件
            if (opt.nextId) {
                $("#" + opt.nextId).click(function () {
                    if (opt.auto) { clearInterval(timeout); }
                    if (opt.action == "single") {
                        doanimate(-1);
                    } else if (opt.action == "group") {
                        if (opt.type == "x") {
                            doanimate(0 - $this.width() / singleSize);
                        } else {
                            doanimate(0 - $this.height() / singleSize);
                        }
                    }
                    return false;
                });
            };
            if (opt.prevId) {
                $("#" + opt.prevId).click(function () {
                    if (opt.auto) { clearInterval(timeout); }
                    if (opt.action == "single") {
                        doanimate(1);
                    } else if (opt.action == "group") {
                        if (opt.type == "x") {
                            doanimate($this.width() / singleSize);
                        } else {
                            doanimate($this.height() / singleSize);
                        }
                    }
                    return false;
                });
            }
            if (opt.auto) {
                $this.hover(function () {
                    clearInterval(timeout);
                    timeout = "mmover";
                },
					function () {
					    timeout = window.setInterval(function () {
					        doanimate(-1);
					    }, opt.autotime)
					}
				)
            }
        }

        //移动事件
        var doanimate = function (n) {
            if (scrollPause) { return false; }
            scrollPause = true;
            var tmpPosVal = opt.type == "x" ? parseInt($scrollWrap.css("left")) : parseInt($scrollWrap.css("top"));
            if (tmpPosVal == 0 && n > 0) { scrollPause = false; return false; }
            if (tmpPosVal <= overPlus && !opt.cycle && n < 0) { scrollPause = false; return false; }
            if (opt.type == "x") {
                $scrollWrap.animate({ left: tmpPosVal + n * singleSize }, opt.speed, function () {
                    checkPosition(tmpPosVal + n * singleSize, "x");
                });
            } else {
                $scrollWrap.animate({ top: tmpPosVal + n * singleSize }, opt.speed, function () {
                    checkPosition(tmpPosVal + n * singleSize, "y");
                });
            }
        }

        //检测
        var checkPosition = function (v, p) {
            scrollPause = false;
            if (opt.cycle) {
                if (v == 0) {
                    if (p == "x") {
                        $scrollWrap.css("left", singleSize * ChildSize * (-1));
                    } else {
                        $scrollWrap.css("top", singleSize * ChildSize * (-1));
                    }
                }
                if (v <= singleSize * ChildSize * (-2)) {
                    if (p == "x") {
                        $scrollWrap.css({ left: singleSize * ChildSize * (-1) });
                    } else {
                        $scrollWrap.css({ top: singleSize * ChildSize * (-1) });
                    }
                }
            }
            if (opt.auto && timeout != "mmover") {
                clearInterval(timeout);
                timeout = window.setInterval(function () {
                    doanimate(-1);
                }, opt.autotime)
            }
        }

        if (opt.auto) {
            var timeout = window.setInterval(function () {
                doanimate(-1);
            }, opt.autotime)
        }

        init();

    }

    $.fn.cnool_simplescroll.defaults = {
        type: "x",         //滚动方向{x|y} 横向、纵向 默认x
        action: "single",    //滚动方式{single|group}单张、组 默认single
        cycle: false,       //是否循环 默认false
        auto: false,        //是否自动播放，自动播放时cycle默认为true 默认false
        autotime: 3000,      //自动播放间隔时间 默认为3000毫秒(3秒)
        speed: 500           //速度 300 默认500毫秒(5秒)
    }
})(jQuery);
     
