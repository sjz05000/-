var dailog;
var dailogConfirmTmpl = [
    '<div class="dailog_mask"></div>',
    '<div class="dailog_box dailog_confirm">',
        '<h3>{{:message}}</h3>',
        '<div class="dailog_btns">',
            '{{if confirm}}',
            '<a href="javascript:;" class="btn_cancel">取消</a>',
            '{{/if}}',
            '<a href="javascript:;" class="btn_confirm">{{:confirmText}}</a>',
        '</div>',
    '</div>'
].join("");

//打开确认提示框
function openConfirm(message, confirmText, onOk, onCancel) {
    var tmpl = $.templates(dailogConfirmTmpl);
    var html = tmpl.render({
        confirm: true,
        message: message,
        confirmText: confirmText
    });
    dailog = $(html).appendTo("body");
    dailog
        .on('click', 'a.btn_cancel', function () {
            dailog.remove();
            if (onCancel) {
                onCancel.call(this);
            }
        })
        .on('click', 'a.btn_confirm', function () {
            dailog.remove();
            if (onOk) {
                onOk.call(this);
            }
        });
}

//打开提示框
function openAlert(message, onOk) {
    var tmpl = $.templates(dailogConfirmTmpl);
    var html = tmpl.render({
        confirm: false,
        message: message,
        confirmText: "确定"
    });
    dailog = $(html).appendTo("body");
    dailog
        .on('click', 'a.btn_confirm', function () {
            dailog.remove();
            if (onOk) {
                onOk.call(this);
            }
        });
}

function delArticle(id) {
    openConfirm("是否要删除这篇文章？", "确定", function () {
        $.getJSON("/usercenter/delete", { id: id }, function (res) {
            if (res.success) {
                openAlert("删除成功！", function () {
                    window.location.reload();
                });
            } else {
                openAlert(res.message);
            }
        });
    });
}