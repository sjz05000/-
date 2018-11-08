var $contentEditor = $("#content_editor"), $currentModel;
var Models, Thumbnails, SortableThumbnails, Uploader, VideoUpload, UrlVideoUpload, QRUpload, Submitter;

//缩略图对象
Thumbnails = function () {
    var $container = $("#thumbnail_box");
    var $wrapper = $container.find("ul.thumbnail_items");
    var $tip = $container.find("div.thumbnail_txt_show");

    function init() {
        //缩略图提示文字-显示事件
        $wrapper.on("mouseenter", "li", showTip);

        //缩略图提示文字-隐藏事件
        $wrapper.on("mouseleave", "li", function () {
            $tip.hide();
        });

        $wrapper.on("click", "li", function () {
            var modelId = $(this).attr("ref");
            Models.scrollToModel(modelId);
        });

        $container.find("a.thumbnail_sort_open_btn").on("click", function () {
            SortableThumbnails.show();
        });
    }

    //缩略图同步
    function sync(act) {
        if (act == "append" || act == "insert") {
            var type = $currentModel.attr("type");
            var ref = $currentModel.attr("id");
            var sort = $currentModel.index() + 1;

            if (type == "img") {
                var imgUrl = $currentModel.find("img").attr("src");
                createImgThumbnail(act, ref, sort, imgUrl, function () {
                    renumber();
                });
            } else {
                createTxtThumbnail(act, ref, sort);
            }

            if ($container.is(":hidden")) {
                $container.show();
            }
        } else if (act == "del") {
            var ref = $currentModel.attr("id");
            $wrapper.find("li[ref='" + ref + "']").remove();

            if (!$wrapper.children().length) {
                $container.hide();
            }
        } else if (act.indexOf("sort") == 0) {
            var ref = $currentModel.attr("id");
            var currentIndex = $currentModel.index();
            var item = $wrapper.find("li[ref='" + ref + "']");
            var target = $wrapper.find("li:eq(" + currentIndex + ")");
            if (act == "sortup") {
                item.insertBefore(target);
            } else {
                item.insertAfter(target);
            }
        }

        renumber();
    }

    function build() {
        $wrapper.empty();

        var items = Models.getItems();
        if (items.length) {
            if ($container.is(":hidden")) {
                $container.show();
            }
        } else {
            $container.hide();
        }

        buildItem(0);

        function buildItem(i) {
            if (i >= items.length) {
                return;
            }

            var that = items.eq(i);
            var type = that.attr("type");
            var ref = that.attr("id");
            var sort = i + 1;

            if (type == "img") {
                var imgUrl = that.find("img").attr("src");
                createImgThumbnail("append", ref, sort, imgUrl, function () {
                    buildItem(i + 1);
                });
            } else {
                createTxtThumbnail("append", ref, sort);
                buildItem(i + 1);
            }
        }
    }

    function createTxtThumbnail(act, ref, sort) {
        var html = $.templates("<li class=\"item\" ref=\"{{:ref}}\"><a href=\"javascript:;\"><em>{{:sort}}</em><img src=\"/static/images/thumbnail_txt.png\" /></a></li>")
            .render({
                ref: ref,
                sort: sort
            });

        if (act == "append") {
            $wrapper.append(html);
        } else {
            var prevRef = $currentModel.prev().attr("id");
            $wrapper.find("li[ref='" + prevRef + "']").after(html);
        }
    }

    function createImgThumbnail(act, ref, sort, imgUrl, onCreated) {
        var tmpl = $.templates("<li class=\"item\" ref=\"{{:ref}}\"><a href=\"javascript:;\"><em>{{:sort}}</em><img src=\"{{:imgUrl}}\" /></a></li>");

        if (imgUrl.indexOf("data:") == 0) {
            Uploader.scaleImage(imgUrl, 124, 82, "", function (scaleData) {
                imgUrl = scaleData;

                create();
            });
        }
        else {
            create();
        }

        function create() {
            var html = tmpl.render({
                ref: ref,
                sort: sort,
                imgUrl: imgUrl
            });

            if (act == "append") {
                $wrapper.append(html);
            } else {
                var prevRef = $currentModel.prev().attr("id");
                $wrapper.find("li[ref='" + prevRef + "']").after(html);
            }

            if (onCreated) {
                onCreated.call();
            }
        }
    }

    //显示缩略图文字提示
    function showTip() {
        var that = $(this);
        var modelId = that.attr("ref");
        var txt = $("#" + modelId).find("textarea").val();
        var top = that.position().top + that.outerHeight() + 10;
        var left = that.position().left;

        $tip.find("p").html(txt);

        if (left + 200 > 258) {
            $tip.find("span").css("text-align", "right");
            $tip.css({
                right: 20,
                top: top,
                left: "auto",
                display: "inline-block"
            });
        } else {
            $tip.find("span").css("text-align", "left");
            $tip.css({
                left: left,
                top: top,
                right: "auto",
                display: "inline-block"
            });
        }
    }

    function updateSorts(arrId) {
        if (!arrId || !arrId.length) {
            return;
        }

        for (var i = 0; i < arrId.length; i++) {
            var $item = $wrapper.children("li[ref='" + arrId[i] + "']");
            if ($item.index() != i) {
                $item.insertBefore($wrapper.children(":eq(" + i + ")"));
            }
        }

        renumber();
    }

    function renumber() {
        $wrapper.children().each(function (i) {
            $(this).find("em").text($(this).index() + 1);
        });
    }

    function multiRemove(arrId) {
        if (!arrId || !arrId.length) {
            return;
        }

        var id = $.map(arrId, function (n) {
            return "li[ref='" + n + "']";
        });

        $wrapper.children(id.join(",")).remove();

        renumber();
    }

    return init(), {
        "build": build,
        "sync": sync,
        "updateSorts": updateSorts,
        "multiRemove": multiRemove
    };
}();

//可排序缩略图对象
SortableThumbnails = function () {
    var $container = $("#thumb_sortable_container");
    var $wrapper = $container.find("ul.thumbnail_items");
    var $tip = $container.find("div.thumbnail_txt_show");
    var $prevTarget, $multiDrags;
    var isMultiSort = false, multiSortRerender = false;

    function init() {
        $container.on("click", "a.btn_cancel", hide);

        $container.on("click", "a.btn_save,a.thumb_sortable_save", function () {
            syncSorts();
            hide();
        });

        $container.on("click", "a.btn_del", multiRemove);

        //缩略图提示文字-显示事件
        $wrapper.on("mouseenter", "li:not(.ui-selected,.ui-sortable-helper)", showTip);

        //缩略图提示文字-隐藏事件
        $wrapper.on("mouseleave", "li", hideTip);

        //点击多选
        $wrapper.on("click", "li", function () {
            $(this).toggleClass("ui-selected");
            triggerMultiSelect();
        });

        sortable();
    }

    function sortable() {
        $wrapper.sortable({
            items: "li:visible",
            placeholder: "item_placeholder",
            tolerance: "pointer",
            helper: "clone",
            revert: 200,
            delay: 100,
            scroll: true,
            opacity: 0.8,
            scrollSensitivity: 50,
            scrollSpeed: 300,
            start: function () {
                $prevTarget = null;
                isMultiSort = $wrapper.find("li.ui-selected:not(.ui-sortable-helper)").length;

                if (isMultiSort) {
                    multiSortRerender = false;
                    $wrapper.find("li.ui-selected").hide();
                }
            },
            sort: function (event, ui) {
                if (isMultiSort && !multiSortRerender) {
                    multiSortRerender = true;

                    ui.helper.width(isMultiSort * ui.item.outerWidth(true))
                        .empty()
                        .show();

                    $wrapper.find("li.ui-selected:not(.ui-sortable-helper)").each(function () {
                        ui.helper.append($('<div class="item" />').append($(this).html()));
                    });
                }
            },
            beforeStop: function (event, ui) {
                if (isMultiSort) {
                    $prevTarget = ui.placeholder.prev();
                    while ($prevTarget.length && $prevTarget.is(".ui-selected")) {
                        $prevTarget = $prevTarget.prev();
                    }

                    $multiDrags = $wrapper.find("li.ui-selected:hidden");
                }
            },
            stop: function () {
                $wrapper.find("li.ui-selected").removeClass("ui-selected");
                $wrapper.find("li.item:hidden").show();

                triggerMultiSelect();
            },
            update: function () {
                if (isMultiSort) {
                    $multiDrags.css("display", "list-item").removeClass("ui-selected");
                    if ($prevTarget.length) {
                        $multiDrags.insertAfter($prevTarget);
                    } else {
                        $wrapper.prepend($multiDrags);
                    }
                }

                renumber();
            }
        });
    }

    function renumber() {
        $wrapper.children().each(function (i) {
            $(this).find("em").text($(this).index() + 1);
        });
    }

    function show() {
        $("body").css("overflow", "hidden");
        $container.slideDown(300);

        build();
    }

    function hide() {
        $container.slideUp(300);
        $("body").css("overflow", "auto");
    }

    function build() {
        $wrapper.empty();

        var items = Models.getItems();

        buildItem(0);

        function buildItem(i) {
            if (i >= items.length) {
                return;
            }

            var that = items.eq(i);
            var type = that.attr("type");
            var ref = that.attr("id");
            var sort = i + 1;

            if (type == "img") {
                var imgUrl = that.find("img").attr("src");
                createImgThumbnail(ref, sort, imgUrl, function () {
                    buildItem(i + 1);
                });
            } else {
                createTxtThumbnail(ref, sort);
                buildItem(i + 1);
            }
        }
    }

    function showTip() {
        var that = $(this);
        var modelId = that.attr("ref");
        var txt = $("#" + modelId).find("textarea").val();
        var top = that.position().top + that.outerHeight() + 10;
        var left = that.position().left;

        $tip.find("p").html(txt);

        if (left + 200 > $wrapper.width()) {
            $tip.find("span").css("text-align", "right");
            $tip.css({
                right: 20,
                top: top,
                left: "auto",
                display: "inline-block"
            });
        } else {
            $tip.find("span").css("text-align", "left");
            $tip.css({
                left: left,
                top: top,
                right: "auto",
                display: "inline-block"
            });
        }
    }

    function hideTip() {
        $tip.hide();
    }

    function triggerMultiSelect() {
        if ($wrapper.find("li.ui-selected").length) {
            $container.find("div.thumb_sortable_btns>a.btn_del").addClass("btn_del_active");
        } else {
            $container.find("div.thumb_sortable_btns>a.btn_del").removeClass("btn_del_active");
        }
    }

    function createTxtThumbnail(ref, sort) {
        var html = $.templates("<li class=\"item\" ref=\"{{:ref}}\"><span><i class=\"icon icon_hook\"></i></span><a href=\"javascript:;\"><em>{{:sort}}</em><img src=\"/static/images/thumbnail_txt.png\" /></a></li>")
            .render({
                ref: ref,
                sort: sort
            });

        $wrapper.append(html);
    }

    function createImgThumbnail(ref, sort, imgUrl, onCreated) {
        var tmpl = $.templates("<li class=\"item\" ref=\"{{:ref}}\"><span><i class=\"icon icon_hook\"></i></span><a href=\"javascript:;\"><em>{{:sort}}</em><img src=\"{{:imgUrl}}\" /></a></li>");

        if (imgUrl.indexOf("data:") == 0) {
            Uploader.scaleImage(imgUrl, 124, 82, "", function (scaleData) {
                imgUrl = scaleData;
                create();
            });
        }
        else {
            create();
        }

        function create() {
            var html = tmpl.render({
                ref: ref,
                sort: sort,
                imgUrl: imgUrl
            });

            $wrapper.append(html);

            if (onCreated) {
                onCreated.call();
            }
        }
    }

    function syncSorts() {
        var arrId = $wrapper.children().map(function () {
            return $(this).attr("ref");
        });

        Models.updateSorts(arrId);
        Thumbnails.updateSorts(arrId);
    }

    function multiRemove() {
        var $itemSelected = $wrapper.find("li.ui-selected");
        if (!$itemSelected.length) {
            return false;
        }

        openConfirm("删除的模块将无法恢复，确定要删除吗？", "删除", function () {
            var arrId = $itemSelected.map(function () {
                return $(this).attr("ref");
            });

            $itemSelected.remove();
            renumber();

            Models.multiRemove(arrId);
            Thumbnails.multiRemove(arrId);
        });
    }

    return init(), {
        "show": show
    }
}();

//模块对象
Models = function () {
    var $wrapper = $("#content_list");
    var originalIndex;

    function init() {
        $wrapper.find("textarea").each(function () {
            wordsLimit.call(this);

            $(this).on("keyup change", wordsLimit);
        });

        eventsListen();
        sortable();
    }

    function eventsListen() {
        //toolbar显示事件
        $wrapper.on("click", "a.toolbar_switch_open", function () {
            $(this).css({
                "height": "0px",
                "border-width": "0px"
            });
            $(this).next("div.box_toolbar").css({
                "height": "auto",
                "border-width": "1px",
                "padding": "20px 30px 20px 70px"
            });
        });

        //toolbar隐藏事件
        $wrapper.on("click", "a.toolbar_switch_close", function () {
            $(this).parent().css({
                "height": "0px",
                "border-width": "0px",
                "padding": "0"
            });
            $(this).parent().prev("a.toolbar_switch_open").css({
                "height": "auto",
                "border-width": "1px"
            });
        })
        //表情显示、隐藏
        $wrapper.on("click", "a.face_btn", function () {
            var facecontainer = $(this).parent().find('div').filter(".faces_list");
            if (facecontainer.is(":hidden")) {
                facecontainer.show();    //如果元素为隐藏,则将它显现
            } else {
                facecontainer.hide();     //如果元素为显现,则将其隐藏
            }
        })


        //移除内容模块事件
        $wrapper.on("click", "a.btn_remove_model", function () {
            $currentModel = $(this).closest("li");
            if ($currentModel.attr("type") == 'txt' && $currentModel.find('textarea').val() == "") {
                removeModel();
            }
            else {
                openConfirm("删除的模块将无法恢复，确定要删除吗？", "删除", function () {
                    removeModel();
                });
            }
        });
    }

    function wordsLimit() {
        var that = $(this);
        var len = that.attr("maxlength") - this.value.length;
        $(this).next(".content_limit").children("i").text(Math.max(0, len));
        if (len <= 0) {
            return false;
        }
    }

    //拖拽排序
    function sortable() {
        $wrapper.sortable({
            axis: "y",
            handle: "h3.sort_handle",
            helper: "clone",
            placeholder: "content_placeholder",
            tolerance: "pointer",
            revert: 200,
            delay: 100,
            scroll: true,
            opacity: 0.8,
            scrollSensitivity: 50,
            scrollSpeed: 300,
            start: function (event, ui) {
                originalIndex = ui.item.index();
            },
            sort: function (event, ui) {
                ui.helper.css({
                    height: "200px",
                });
            },
            update: function (event, ui) {
                $currentModel = ui.item;
                //同步缩略图
                Thumbnails.sync(originalIndex > $currentModel.index() ? "sortup" : "sortdown");
            }
        });
    }

    //添加文本模块
    function createTextModel(e) {
        var that = e.target;
        var isInsert = $(that).closest("div.box_toolbar").is(".box_toolbar_dyn");

        var id = "content" + (Math.random()).toString().replace(".", "_");
        var tmpl = $.templates("#txt_model_tmpl");
        var html = tmpl.render({
            id: id
        });

        $currentModel = $(html);
        if (isInsert) {
            $(that).closest("li").after($currentModel);
        } else {
            $wrapper.append($currentModel);
        }

        scrollToModel(id);

        //字数显示
        $currentModel.find("textarea").on("keyup change", wordsLimit);

        //同步缩略图
        Thumbnails.sync(isInsert ? "insert" : "append");
    }

    //添加表情到文本框
    $wrapper.on("click", ".faces_list li", function () {
        var obj = $(this).parent().parent().parent().find("textarea");
        var newtxt = $(this).find("img").attr("alt");
        var _obj = obj[0],
                _tmp = obj.val(),
                _default = obj.attr("placeholder");
        _tmp = (_tmp == _default) ? "" : _tmp;
        if (document.selection) {
            //var r = options.range || window.document.selection.createRange();
            obj.focus();
            var r = window.document.selection.createRange();
            r.text = newtxt;
        } else {
            obj.val(_tmp.substring(0, _obj.selectionStart) + newtxt + _tmp.substring(_obj.selectionEnd));
        }
    });

    //添加图片模块
    function createImageModel(src, imgOrgData, insertModelId) {
        var isInsert = insertModelId.length;
        var id = "content" + (Math.random()).toString().replace(".", "_");
        var tmpl = $.templates("#img_model_tmpl");
        var html = tmpl.render({
            id: id,
            imageUrl: src,
            base64: imgOrgData
        });

        $currentModel = $(html);
        if (isInsert) {
            $wrapper.find("#" + insertModelId).after($currentModel);
        } else {
            $wrapper.append($currentModel);
        }

        scrollToModel(id);

        //字数显示
        $currentModel.find("textarea").on("keyup change", wordsLimit);

        //同步缩略图
        Thumbnails.sync(isInsert ? "insert" : "append");
    }
    //添加视频模块
    function createVideoModel(youkuSrc, src, imgOrgData, Mp4Path, WebmPath, OggPath, CoverPath,youkuUrl, insertModelId) {
        var isInsert = insertModelId.length;
        var id = "content" + (Math.random()).toString().replace(".", "_");
        var tmpl = $.templates("#video_model_tmpl");
        var html = tmpl.render({
            id: id,
            youkuVideoUrl: youkuSrc,
            videoUrl: src,
            base64: imgOrgData,
            Mp4Path: Mp4Path,
            WebmPath: WebmPath,
            OggPath: OggPath,
            CoverPath: CoverPath,
            youkuUrl: youkuUrl
        });

        $currentModel = $(html);
        if (isInsert) {
            $wrapper.find("#" + insertModelId).after($currentModel);
        } else {
            $wrapper.append($currentModel);
        }

        scrollToModel(id);

        if (youkuSrc) {
            $("#" + id + " .youkuVideo").show();
            $("#" + id + " .image_wrapper img").hide();
        }

        //字数显示
        $currentModel.find("textarea").on("keyup change", wordsLimit);

        //同步缩略图
        Thumbnails.sync(isInsert ? "insert" : "append");
    }
    //添加图片模块
    function createImageModel(src, imgOrgData, insertModelId) {
        var isInsert = insertModelId.length;
        var id = "content" + (Math.random()).toString().replace(".", "_");
        var tmpl = $.templates("#img_model_tmpl");
        var html = tmpl.render({
            id: id,
            imageUrl: src,
            base64: imgOrgData
        });

        $currentModel = $(html);
        if (isInsert) {
            $wrapper.find("#" + insertModelId).after($currentModel);
        } else {
            $wrapper.append($currentModel);
        }

        scrollToModel(id);

        //字数显示
        $currentModel.find("textarea").on("keyup change", wordsLimit);

        //同步缩略图
        Thumbnails.sync(isInsert ? "insert" : "append");
    }

    function scrollToModel(modelId) {
        var top = $("#" + modelId).offset().top - 110;

        $("html, body").animate({
            scrollTop: top
        }, 300);
    }

    //删除模块
    function removeModel() {
        $currentModel.slideUp(300, function () {
            $currentModel.remove();
            //同步缩略图
            Thumbnails.sync("del");
        });
    }

    function multiRemove(arrId) {
        if (!arrId || !arrId.length) {
            return;
        }

        var id = $.map(arrId, function (n) {
            return "#" + n;
        });

        $wrapper.children(id.join(",")).remove();
    }

    function updateSorts(arrId) {
        if (!arrId || !arrId.length) {
            return;
        }

        for (var i = 0; i < arrId.length; i++) {
            var $item = $wrapper.find("#" + arrId[i]);
            if ($item.index() != i) {
                $item.insertBefore($wrapper.children(":eq(" + i + ")"));
            }
        }
    }

    function getItems() {
        return $wrapper.children();
    }

    function getImageModelCount() {
        return $wrapper.children("li[type='img']").length;
    }
    function getVideoModelCount() {
        return $wrapper.children("li[type='video']").length;
    }

    function getContents() {
        var contents = "";
        $wrapper.children().each(function () {
            var that = $(this);
            text = that.find("textarea").val() ? "<p>" + that.find("textarea").val().replace(/[\r\n]/g, "<br/>") + "</p>" : "";
            text = text.replace(" ", "&nbsp;");
            //var name = "1.jpg";
            var data_base64 = "";
            //var categoryTags = "";
            //for (i = 0; i < $(".tag_selected_item span").length; i++) {
            //    categoryTags = categoryTags + $($(".tag_selected_item span")[i]).text() + ",";
            //}
            if (that.find("img").attr("data-Mp4Path") && that.find("img").attr("data-Mp4Path").indexOf(".mp4")>0) {
                video = that.find("img").attr("src") ? "<img src='"
                    + that.find("img").attr("src")
                    + "' data-Mp4Path='"
                    + that.find("img").attr("data-Mp4Path")
                    + "' data-WebmPath='"
                    + that.find("img").attr("data-WebmPath")
                    + "' data-OggPath='"
                    + that.find("img").attr("data-OggPath")
                    + "' data-CoverPath='"
                    + that.find("img").attr("data-CoverPath")
                    + "' data-youkuUrl='"
                    + that.find("img").attr("data-youkuUrl")
                    + "' class='videoPage' />" : "";
                contents = contents + text + video;
            } else if (that.find("img").attr("data-youkuUrl") && that.find("img").attr("data-youkuUrl").length>0) {
                video = that.find("img").attr("src") ? "<img src='"
                    + that.find("img").attr("src")
                    + "' data-Mp4Path='"
                    + that.find("img").attr("data-Mp4Path")
                    + "' data-WebmPath='"
                    + that.find("img").attr("data-WebmPath")
                    + "' data-OggPath='"
                    + that.find("img").attr("data-OggPath")
                    + "' data-CoverPath='"
                    + that.find("img").attr("data-CoverPath")
                    + "' data-youkuUrl='"
                    + that.find("img").attr("data-youkuUrl")
                    + "' class='videoPage' />" : "";
                contents = contents + text + video;
            } else {
                if (that.find("img").attr("src") && that.find("img").attr("data-base64")&& that.find("img").attr("data-base64").indexOf("base64,") >= 0) {
                    data_base64 = that.find("img").attr("src").split(',')[1];
                    if (data_base64) {
                        api.uploadImage({
                            FileName: name,
                            Data: data_base64,
                            categoryTags: categoryTags
                        }, function (ret) {
                            image = ret.Images ? "<img src='" + ret.Images + "'/>" : "";
                            contents = contents + text + image;
                        })
                    } else {
                        image = that.find("img").attr("src") ? "<img src='" + that.find("img").attr("src") + "'/>" : "";
                        contents = contents + text + image;
                    }
                } else {
                    if (that.find("img").attr("src") && that.find("img").attr("src").indexOf("emote") == -1) {
                        image = "<img src='" + that.find("img").attr("src") + "'/>";
                        contents = contents + text + image;
                    } else {
                        image = "";
                        contents = contents + text + image;
                    }
                }
            }
        });
        return contents;
    }

    return init(), {
        "createTextModel": createTextModel,
        "createImageModel": createImageModel,
        "createVideoModel": createVideoModel,
        "removeModel": removeModel,
        "getItems": getItems,
        "updateSorts": updateSorts,
        "multiRemove": multiRemove,
        "getImageModelCount": getImageModelCount,
        "getVideoModelCount": getVideoModelCount,
        "getContents": getContents,
        "scrollToModel": scrollToModel
    };
}();

//图片上传对象
Uploader = function () {
    var _maxSize = 10,   //最大支持10M
        _maxCount = 50,
        _orientation = null,
        _file, _insertId;
    var $container, $progress;
    var fileCount = 0, uploadedCount = 0;

    function init() {
        $container = $("#upload_box");
        $progress = $("#upload_progress_container");

        //隐藏事件
        $container.on("click", "a.box_close", hide);

        //上传事件
        $container.on("change", "input:file", function () {
            if (!this.files || !this.files.length) {
                return;
            }

            hide(), $progress.show();
            uploadedCount = 0, fileCount = this.files.length;
            $progress.find("span.progress_count i").text(fileCount);

            var fromId = getFrom();
            for (var i = 0; i < this.files.length; i++) {
                upload(this.files[i], fromId);
            }
        });
    }

    function show(left, top, fromId) {
        if ($container.is(":visible")) {
            $container.slideUp(200, function () {
                $container
                    .attr("from", fromId)
                    .css({
                        top: top,
                        left: left - $container.width()
                    });
                $container.slideDown(200);
            });
        }
        else {
            $container
                .attr("from", fromId)
                .css({
                    top: top,
                    left: left - $container.width()
                });
            $container.slideDown(200);
        }
    }

    function hide() {
        $container.slideUp(200, function () {
            $container.attr("from", "").css({ left: 0, top: 0 });
        });
    }

    function updateProgress() {
        uploadedCount++;

        var percent = (uploadedCount / fileCount * 100).toFixed(1);

        $progress.find("span.progress_count em").text(uploadedCount);
        $progress.find("span.progress_percent em").text(percent);
        $progress.find('div.progress').width(percent + "%");

        if (uploadedCount == fileCount) {
            window.setTimeout(function () {
                $progress.hide();
                $progress.find("span.progress_count i").text("0");
                $progress.find("span.progress_count em").text("0");
                $progress.find("span.progress_percent em").text("0");
                $progress.find('div.progress').width("0%");
            }, 500);
        }
    }

    //从file读取图片
    function upload(file, insertId) {
        _file = file;
        _insertId = insertId;
        
        if (!_file.type.match(/image.*/)) {
            alert("只能选择图片文件.");
            updateProgress();
            return;
        }
        if (_file.size > _maxSize * 1024 * 1024) {
            alert("图片最大不能超过" + _maxSize + "M.");
            updateProgress();
            return;
        }
        if (overMaxCount()) {
            alert("最多只能上传" + _maxCount + "张图片.");
            updateProgress();
            return;
        }

        //获取照片方向角属性，用户旋转控制  
        EXIF.getData(_file, function () {
            EXIF.getAllTags(this);
            _orientation = EXIF.getTag(this, 'Orientation');
        });

        readImage();
    }

    //读取图片
    function readImage() {
        var reader = new FileReader();
        reader.onloadend = function () {
            if (reader.error) {
                alert("文件获取失败！");
                return;
            }
            var name = "1.jpg";

            var categoryTags = "";
            for (i = 0; i < $(".tag_selected_item span").length; i++) {
                categoryTags = categoryTags + $($(".tag_selected_item span")[i]).text() + ",";
            }
            var imgOrgData = reader.result;
            
            scaleImage(imgOrgData, 9999999, 9999999, _orientation, function (scaleData) {
                imgOrgDataUpdata = scaleData.split(',')[1];
                api.uploadImage({
                    FileName: name,
                    Data: imgOrgDataUpdata,
                    categoryTags: categoryTags
                }, function (ret) {
                    Models.createImageModel(ret.Images, "base64,", _insertId);
                    updateProgress();
                })
            });

            
        };
        reader.readAsDataURL(_file);
    }

    //缩放图片
    function scaleImage(imgOrgData, maxWidth, maxHeight, orientation, onScaled) {
        var image = new Image();
        image.onload = function () {
            var scaleWidth = this.naturalWidth,
                scaleHeight = this.naturalHeight;

            //高度超标,宽度等比例缩放
            if (scaleHeight > maxHeight) {
                scaleWidth *= maxHeight / scaleHeight;
                scaleHeight = maxHeight;
            }
            //宽度超标,高度等比例缩放
            if (scaleWidth > maxWidth) {
                scaleHeight *= maxWidth / scaleWidth;
                scaleWidth = maxWidth;
            }
            this.width = scaleWidth,
            this.height = scaleHeight;

            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext("2d");
            canvas.width = scaleWidth;
            canvas.height = scaleHeight;
            ctx.drawImage(this, 0, 0, scaleWidth, scaleHeight);

            var scaleData = null;
            //修复ios  
            if (navigator.userAgent.match(/iphone/i)) {
                //如果方向角不为1，都需要进行旋转
                if (orientation != "" && orientation != 1) {
                    switch (orientation) {
                        case 6://需要顺时针（向右）90度旋转  
                            rotateImage(this, 'right', canvas);
                            break;
                        case 8://需要逆时针（向左）90度旋转  
                            rotateImage(this, 'left', canvas);
                            break;
                        case 3://需要180度旋转
                            rotateImage(this, 'left', canvas);//转两次  
                            rotateImage(this, 'left', canvas);
                            break;
                    }
                }
                scaleData = canvas.toDataURL("image/jpeg", 0.99);
            } else if (navigator.userAgent.match(/Android/i) && !true) {// 修复android  
                var encoder = new JPEGEncoder();
                scaleData = encoder.encode(ctx.getImageData(0, 0, expectWidth, expectHeight), 80);
            } else {
                if (orientation != "" && orientation != 1) {
                    switch (orientation) {
                        case 6://需要顺时针（向右）90度旋转  
                            rotateImage(this, 'right', canvas);
                            break;
                        case 8://需要逆时针（向左）90度旋转  
                            rotateImage(this, 'left', canvas);
                            break;
                        case 3://需要180度旋转
                            rotateImage(this, 'left', canvas);//转两次  
                            rotateImage(this, 'left', canvas);
                            break;
                    }
                }
                scaleData = canvas.toDataURL("image/jpeg", 0.99);
            }

            if (onScaled) {
                onScaled.call(null, scaleData);
            }
        };

        //必须先绑定事件，才能设置src属性，否则会出同步问题。
        image.src = imgOrgData;
    }

    //旋转图片
    function rotateImage(image, direction, canvas) {
        if (image == null) return;

        //最小与最大旋转方向，图片旋转4次后回到原方向    
        var min_step = 0,
            max_step = 3,
            step = 2,
            height = image.height,
            width = image.width;

        if (direction == 'left') {
            step++;
            step > max_step && (step = min_step);
        } else {
            step--;
            step < min_step && (step = max_step);
        }

        //旋转角度以弧度值为参数    
        var degree = step * 90 * Math.PI / 180;
        var ctx = canvas.getContext('2d');
        switch (step) {
            case 0:
                canvas.width = width;
                canvas.height = height;
                ctx.drawImage(image, 0, 0, width, height);
                break;
            case 1:
                canvas.width = height;
                canvas.height = width;
                ctx.rotate(degree);
                ctx.drawImage(image, 0, -height, width, height);
                break;
            case 2:
                canvas.width = width;
                canvas.height = height;
                ctx.rotate(degree);
                ctx.drawImage(image, -width, -height, width, height);
                break;
            case 3:
                canvas.width = height;
                canvas.height = width;
                ctx.rotate(degree);
                ctx.drawImage(image, -width, 0, width, height);
                break;
        }
    }

    function overMaxCount() {
        console.log(Models.getImageModelCount())
        return Models.getImageModelCount() >= _maxCount;
    }

    function getFrom() {
        return $container.attr("from");
    }

    return init(), {
        "upload": upload,
        "scaleImage": scaleImage,
        "getFrom": getFrom,
        "show": show,
        "hide": hide
    };
}();

//视频上传对象
VideoUpload = function () {
    var _maxSize = 10,   //最大支持10M
        _maxCountvideo = 5,
        _orientation = null,
        _file, _insertId;
    var $container, $progress;
    var fileCount = 0, uploadedCount = 0;

    function init() {
        $container = $("#upload_box_video");
        $progress = $("#upload_video_progress_container");

        //隐藏事件
        $container.on("click", "a.box_close", hide);

        //上传事件
        $container.on("change", "input:file", function () {
            if (!this.files || !this.files.length) {
                return;
            }
            hide(), $progress.show();

            uploadedCount = 0, fileCount = this.files.length;
            $progress.find("span.progress_count i").text(fileCount);

            var fromId = getFrom();
            for (var i = 0; i < this.files.length; i++) {
                upload(this.files[i],this.value, fromId);
            }
            this.value = "";
        });
    }

    function show(left, top, fromId) {
        if ($container.is(":visible")) {
            $container.slideUp(200, function () {
                $container
                    .attr("from", fromId)
                    .css({
                        top: top,
                        left: left - $container.width()
                    });
                $container.slideDown(200);
            });
        }
        else {
            $container
                .attr("from", fromId)
                .css({
                    top: top,
                    left: left - $container.width()
                });
            $container.slideDown(200);
        }
    }

    function hide() {
        $container.slideUp(200, function () {
            $container.attr("from", "").css({ left: 0, top: 0 });
        });
    }

    function updateProgress() {
        uploadedCount++;

        var percent = (uploadedCount / fileCount * 100).toFixed(1);

        $progress.find("span.progress_count em").text(uploadedCount);
        $progress.find("span.progress_percent em").text(percent);
        $progress.find('div.progress').width(percent + "%");

        if (uploadedCount == fileCount) {
            window.setTimeout(function () {
                $progress.hide();
                $progress.find("span.progress_count i").text("0");
                $progress.find("span.progress_count em").text("0");
                $progress.find("span.progress_percent em").text("0");
                $progress.find('div.progress').width("0%");
            }, 500);
        }
    }

    //从file读取图片
    function upload(file, name, insertId) {
        _file = file;
        _insertId = insertId;

        var index1 = name.lastIndexOf(".");
        var index2 = name.length;
        var postf = name.substring(index1, index2);

        if (!_file.type.match(/video.*/)) {
            alert("只能选择视频文件.");
            updateProgress();
            return;
        }
        if (_file.size > _maxSize * 1024 * 1024) {
            alert("视频最大不能超过" + _maxSize + "M.");
            updateProgress();
            return;
        }
        if (overMaxCountvideo()) {
            alert("最多只能上传" + _maxCountvideo + "个视频.");
            updateProgress();
            return;
        }

        //获取照片方向角属性，用户旋转控制  
        //EXIF.getData(_file, function () {
        //    EXIF.getAllTags(this);
        //    _orientation = EXIF.getTag(this, 'Orientation');
        //});

        readVideo(postf);
    }

    //读取视频
    function readVideo(postf) {
        var reader = new FileReader();
        reader.onloadend = function () {
            if (reader.error) {
                alert("文件获取失败！");
                return;
            }

            var imgOrgData = reader.result;
            api.Videoupload({ base64Str: imgOrgData.split(',')[1], ext: postf }, function (ret) {
                Models.createVideoModel("","https://bbs.cnool.net/static/images/vedioSmall.jpg", imgOrgData, ret.data.Mp4Path, ret.data.WebmPath, ret.data.OggPath, ret.data.CoverPath,"", _insertId);
                updateProgress();
            })
            
        };
        reader.readAsDataURL(_file);
    }
   

    function overMaxCountvideo() {
        console.log(Models.getVideoModelCount())
        return Models.getVideoModelCount() >= _maxCountvideo;
    }

    function getFrom() {
        return $container.attr("from");
    }

    return init(), {
        "upload": upload,
        "getFrom": getFrom,
        "show": show,
        "hide": hide,
        "overMaxCountvideo": overMaxCountvideo
    };
}();

//上传视频网址（限优酷）
UrlVideoUpload = function () {
    var $videoTxt = $(".videotxt");
    var $videoBtn = $(".videobtn");
    $videoBtn.click(function () {
        var _insertId = VideoUpload.getFrom();
        if ($videoTxt.val()) {
            var a = document.createElement("a");
            a.href = $videoTxt.val();
            if (a.host.indexOf("youku.com") > 0) {
                VideoUpload.hide();
                var reg = /id_(.+)\.html/g;
                var ppp = a.href.match(reg)
                var html = ppp[0].replace('id_', '').replace('.html', '');
                Models.createVideoModel("https://player.youku.com/player.php/sid/" + html + "/v.swf", "https://bbs.cnool.net/static/images/vedioSmall.jpg", "", "", "", "", "", html, _insertId);
                $videoTxt.val("");
            };
        } else {
            alert("请输入网址！");
        }
    })

}();


//扫描二维码手机上传
QRUpload = function () {
    var uploadKey;

    function init(key) {
        uploadKey = key;

        setTimeout(listen, 3000);
    }

    function listen() {
        $.ajax({
            url: "/pollupload/qruploadlisten",
            cache: false,
            data: { key: uploadKey },
            dataType: "json",
            success: function (res) {
                if (res.success && res.data && res.data.UploadedCount > 0 && res.data.UploadedCount >= res.data.UploadCount) {
                    showImages();
                } else {
                    setTimeout(listen, 3000);
                }
            }
        });
    }

    function showImages() {
        $.ajax({
            url: "/pollupload/getqrupload",
            cache: false,
            data: { key: uploadKey },
            dataType: "json",
            success: function (res) {
                Uploader.hide();

                if (res.success) {
                    var images = res.data;
                    if (images && images.length) {
                        createModels(images);
                    } else {
                        setTimeout(listen, 3000);
                    }
                } else {
                    setTimeout(listen, 3000);
                }
            }
        });
    }

    function createModels(imagesData) {
        var insertId = Uploader.getFrom();
        var count = imagesData.length;

        createModel(0);

        function createModel(index) {
            if (index >= count) {
                setTimeout(listen, 3000);
                return;
            }
            var name = "1.jpg";
            var categoryTags = "";
            for (i = 0; i < $(".tag_selected_item span").length; i++) {
                categoryTags = categoryTags + $($(".tag_selected_item span")[i]).text() + ",";
            }
            var imgOrgData = imagesData[index];
            Uploader.scaleImage(imgOrgData, 9999999, 9999999, "", function (scaleData) {
                imgOrgDataUpdata = scaleData.split(',')[1];
                api.uploadImage({
                    FileName: name,
                    Data: imgOrgDataUpdata,
                    categoryTags: categoryTags
                }, function (ret) {
                    Models.createImageModel(ret.Images, "base64,", insertId);
                    createModel(++index);
                })
                //Models.createImageModel(scaleData, "base64,", insertId);
            });
        }
    }

    return {
        "init": init,
        "listen": listen
    };
}();

//
Submitter = function () {
    var $container = $("#write_operate"), $title = $("#article_title"), $id = $("#article_id");
    var orgTop = $container.offset().top, posting = false;

    function init() {
        //$container.children("div.box_submit").on("click", "a.btn_draft", saveDraft);
        $container.children("div.box_submit").on("click", "a.btn_publish", publish);
    }

    function saveDraft() {
        var title = $.trim($title.val());
        var contents = Models.getContents();
        if (!title.length) {
            openAlert("文章标题不能为空。", function () {
                $title.focus();
            });
            return false;
        }
        if (!contents || !contents.length) {
            openAlert("文章内容不能为空。");
            return false;
        }

        var emptyContent = true;
        for (var i = 0; i < contents.length; i++) {
            if (contents[i].text != "" || contents[i].images != "") {
                emptyContent = false;
                break;
            }
        }
        if (emptyContent) {
            openAlert("文章内容不能为空。");
            return false;
        }

        if (posting) {
            openAlert("文章正在提交中。");
            return;
        }

        posting = true;
        //$.ajax({
        //    url: "/usercenter/articlesubmit",
        //    data: {
        //        id: $id.val(),
        //        title: title,
        //        contents: JSON.stringify(contents),
        //        publish: 0
        //    },
        //    dataType: "json",
        //    type: "POST",
        //    success: function (res) {
        //        posting = false;
        //        if (res.success) {
        //            $id.val(res.data.articleId);
        //            openConfirm("文章保存成功！是否跳到草稿箱？", "确定", function () {
        //                window.location.href = "/usercenter/draft";
        //            });
        //        } else {
        //            openAlert(res.message);
        //        }
        //    },
        //    error: function (XMLHttpRequest, textStatus, errorThrown) {
        //        posting = false;
        //        openAlert("保存失败：服务异常，请稍后重试！");
        //    }
        //});
    }

    function publish() {
        var title = $.trim($title.val());
        var contents = Models.getContents(); //[{text:'',image:''},..],    <div><p>img</p><p>text</p></div>
        if (!title.length) {
            openAlert("文章标题不能为空。", function () {
                $title.focus();
            });
            return false;
        }
        if (!contents || !contents.length) {
            openAlert("文章内容不能为空。");
            return false;
        }

        var emptyContent = true;
        for (var i = 0; i < contents.length; i++) {
            if (contents[i].text != "" || contents[i].images != "") {
                emptyContent = false;
                break;
            }
        }
        if (emptyContent) {
            openAlert("文章内容不能为空。");
            return false;
        }

        if (posting) {
            openAlert("文章正在提交中。");
            return;
        }
        var tags = $("#article_tags").find("li").map(function () {
            return $("span", this).text();
        }).get();

        openConfirm("确定要发布吗？", "确定", function () {
            posting = true;
            if (GetQueryString("ArticleId") && window.location.href.indexOf("reply") > 0) {
                api.comment({ ArticleId: encodeURIComponent(GetQueryString("ArticleId")), Content: encodeURIComponent(contents) }, function (data) {
                    if (data != undefined && data.errorCode == 0) {
                        if (data.data.CommentStauts < 0) {
                            if (data.data.RiskLevel == 10) {
                                //by caowy 20170703 提示不明显，需刷新页面
                                //api.showWarning("发帖被审核。");
                                posting = false;
                                openAlert("您的回复已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                    location.reload();
                                });
                            } else {
                                //by caowy 20170703 提示不明显，需刷新页面
                                //api.showWarning("发帖被审核。");
                                posting = false;
                                openAlert("您的回复已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                    location.reload();
                                });
                            }
                        } else {
                            openAlert("文章回复成功！", function () {
                                window.location.href = "/" + GetQueryString("ArticleId") + ".html";
                            });
                        }
                    } else {
                        posting = false;
                        openAlert(data.errorMessage);
                    }

                });
            } else {
                if (GetQueryString("ArticleId") && GetQueryString("CommentId") && window.location.href.indexOf("ReplyUpdata") > 0) {
                    api.commentedit({ ArticleId: encodeURIComponent(GetQueryString("ArticleId")), CommentId: encodeURIComponent(GetQueryString("CommentId")), Content: encodeURIComponent(contents) }, function (data) {
                        if (data != undefined && data.errorCode == 0) {
                            if (data.data.CommentStauts < 0) {
                                if (data.data.RiskLevel == 10) {
                                    //by caowy 20170703 提示不明显，需刷新页面
                                    //api.showWarning("发帖被审核。");
                                    posting = false;
                                    openAlert("您修改的回复已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                        location.reload();
                                    });
                                    return;
                                } else {
                                    //by caowy 20170703 提示不明显，需刷新页面
                                    //api.showWarning("发帖被审核。");
                                    posting = false;
                                    openAlert("您修改的回复已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                        location.reload();
                                    });
                                    return;
                                }
                            } else {
                                openAlert("回复修改成功！", function () {
                                    window.location.href = "/" + GetQueryString("ArticleId") + ".html";
                                });
                            }
                        } else {
                            posting = false;
                            openAlert(data.errorMessage);
                        }

                    });
                } else {
                    var CategoryTags = "";
                    for (i = 0; i < tags.length; i++) {
                        CategoryTags = CategoryTags + tags[i] + ",";
                    };
                    if (!CategoryTags) {
                        openAlert("添加您想要发送的版块。");
                        posting = false;
                        return;
                    }
                    if (GetQueryString("id") && window.location.href.indexOf("update") > 0) {
                        if (TemplateId == 2) {
                            api.unitedit({ Title: encodeURIComponent(title), Content: encodeURIComponent(contents), Author: encodeURIComponent(username), categoryTags: encodeURIComponent(CategoryTags), ArticleId: encodeURIComponent(ArticleId) }, function (json, err) {
                                if (json && json.errorCode == 0) {
                                    if (json.data.ArtcleStauts < 0) {
                                        if (json.data.RiskLevel == 10) {
                                            //by caowy 20170703 提示不明显，需刷新页面
                                            //api.showWarning("发帖被审核。");
                                            posting = false;
                                            openAlert("您修改的帖子已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                                location.reload();
                                            });
                                            return;
                                        } else {
                                            //by caowy 20170703 提示不明显，需刷新页面
                                            //api.showWarning("发帖被审核。");
                                            posting = false;
                                            openAlert("您修改的帖子已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                                location.reload();
                                            });
                                            return;
                                        }
                                    } else {
                                        currentArticleId = json.data.ArticleId;
                                        posting = false;
                                        openAlert("文章修改成功！", function () {
                                            window.location.href = "/" + currentArticleId + ".html";
                                        });
                                    }
                                } else {
                                    posting = false;
                                    openAlert(json.errorMessage);
                                }
                            })
                        }
                        else {
                            api.forumedit({ Title: encodeURIComponent(title), Content: encodeURIComponent(contents), Author: encodeURIComponent(username), categoryTags: encodeURIComponent(CategoryTags), ArticleId: encodeURIComponent(ArticleId) }, function (json, err) {
                                if (json && json.errorCode == 0) {
                                    if (json.data.ArtcleStauts < 0) {
                                        if (json.data.RiskLevel == 10) {
                                            //by caowy 20170703 提示不明显，需刷新页面
                                            //api.showWarning("发帖被审核。");
                                            posting = false;
                                            openAlert("您修改的帖子已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                                location.reload();
                                            });
                                            return;
                                        } else {
                                            //by caowy 20170703 提示不明显，需刷新页面
                                            //api.showWarning("发帖被审核。");
                                            posting = false;
                                            openAlert("您修改的帖子已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                                location.reload();
                                            });
                                            return;
                                        }
                                    } else {
                                        currentArticleId = json.data.ArticleId;
                                        posting = false;
                                        openAlert("文章修改成功！", function () {
                                            window.location.href = "/" + currentArticleId + ".html";
                                        });
                                    }
                                } else {
                                    posting = false;
                                    openAlert(json.errorMessage);
                                }
                            })
                        }
                    } else {
                        api.create({ Title: encodeURIComponent(title), Content: encodeURIComponent(contents), Author: encodeURIComponent(username), categoryTags: encodeURIComponent(CategoryTags) }, function (json, err) {
                            if (json && json.errorCode == 0) {
                                currentArticleId = json.data.ArticleId;
                                posting = false;
                                if (json.data.ArtcleStauts < 0) {
                                    if (json.data.RiskLevel == 10) {
                                        //by caowy 20170703 提示不明显，需刷新页面
                                        //api.showWarning("发帖被审核。");
                                        posting = false;
                                        openAlert("您的发帖已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                            location.reload();
                                        });
                                        return;
                                    } else {
                                        //by caowy 20170703 提示不明显，需刷新页面
                                        //api.showWarning("发帖被审核。");
                                        posting = false;
                                        openAlert("您的发帖已提交，根据相关法规要求，正在后台审核，请耐心等待！", function () {
                                            location.reload();
                                        });
                                        return;
                                    }
                                } else {
                                    api.GetPostArticleCount(function (json, err) {
                                        var postAddExp = false;
                                        if (json && json.data < 20) {
                                            $.cookie("postAddExp", 'true', { path: "/", expires: 1, domain: "cnool.net", secure: false, raw: false });
                                            postAddExp = true;
                                        };
                                        openAlert("文章发布成功！", function () {
                                            window.location.href = "/" + currentArticleId + ".html?postAddExp=" + postAddExp;
                                        });
                                    })
                                }
                            } else {
                                posting = false;
                                openAlert(json.errorMessage);
                            }
                        });
                    }
                }
            }

            //$.ajax({
            //    url: "/usercenter/articlesubmit",
            //    data: {
            //        //id: $id.val(),
            //        Title: title,
            //        Content: JSON.stringify(contents),
            //        CategoryTags: CategoryTags,
            //        //publish: 1
            //        sessionid: sessionId
            //    },
            //    dataType: "json",
            //    type: "POST",
            //    success: function (res) {
            //        posting = false;
            //        if (res.success) {
            //            $id.val(res.data.articleId);
            //            openAlert("文章发布成功！", function () {
            //                window.location.href = "/usercenter/articles";
            //            });
            //        } else {
            //            openAlert(res.message);
            //        }
            //    },
            //    error: function (XMLHttpRequest, textStatus, errorThrown) {
            //        posting = false;
            //        openAlert("发布失败：服务异常，请稍后重试！");
            //    }
            //});
        });
    }

    function scrollFixed() {
        if ($(window).scrollTop() > orgTop) {
            $container.addClass('write_operate_fixed');
        }
        else {
            $container.removeClass('write_operate_fixed');
        }
    }

    return init(), {
        "scrollFixed": scrollFixed
    };
}();

//toolbar事件-添加文本模块
$contentEditor.on("click", "a.btn_insert_txt", Models.createTextModel);

//toolbar事件-显示图片上传
$contentEditor.on("click", "a.btn_insert_img", function (e) {
    var that = $(this);
    var top = that.offset().top;
    var left = that.offset().left + that.outerWidth();
    var isInsert = $(that).closest("div.box_toolbar").is(".box_toolbar_dyn");
    var fromId = isInsert ? $(that).closest("li").attr("id") : "";

    Uploader.show(left, top - 1, fromId);
});

//toolbar事件-显示视频上传
$contentEditor.on("click", "a.btn_insert_video", function (e) {
    var that = $(this);
    var top = that.offset().top;
    var left = that.offset().left + that.outerWidth();
    var isInsert = $(that).closest("div.box_toolbar").is(".box_toolbar_dyn");
    var fromId = isInsert ? $(that).closest("li").attr("id") : "";

    VideoUpload.show(left, top - 1, fromId);
});

//页面最小高度事件
$(window).on("load resize", function () {
    var minHeight = $(window).height() - $contentEditor.offset().top - $("#footer").outerHeight();
    $contentEditor.css("min-height", minHeight);
});

//右侧滚动事件
window.addEventListener("scroll", Submitter.scrollFixed);