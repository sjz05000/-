var api = {
    ucenter_url: "https://ucenterapi.cnool.net/wrapper",
    platform_url: "https://platformapi.cnool.net",
    api_url: "https://api.cnool.net",
    mail_url: "https://mallapi.cnool.net",
    recommended_url:"https://recommended-platformapi.cnool.net",

    //积分商品列表查询
    GetGoodsList: function (onSuccess) {
        api.getData(api.mail_url, "Goods/GetGoodsList", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //积分商品内页详情
    GetOrderDetail: function (GoodsId, onSuccess) {
        api.getData(api.mail_url, "Goods/GetOrderDetail", { GoodsId: GoodsId }, function (json) {
            if (onSuccess)
                onSuccess(json)
        });
    },
    //订单列表
    GetOrdersList: function (pageId, pageSize, onSuccess) {
        api.getData(api.mail_url, "/Order/GetOrdersList", { pageId: pageId, pageSize: pageSize }, function (json) {
            if (onSuccess)
                onSuccess(json)
        })
    },
    //订单详情
    GetOrderDetails: function (OrderId, onSuccess) {
        api.getData(api.mail_url, "/Goods/GetOrderDetails", { OrderId: OrderId }, function (json) {
            if (onSuccess)
                onSuccess(json)
        })
    },
    //订单提交
    ordersave: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/ordersave.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //企业开票
    SaveEnterpriseBilling: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/SaveEnterpriseBilling.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //个人开票
    SaveBilling: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/SaveBilling.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //GetEventById
    GetEventById: function (EventId, onSuccess) {
        api.getData(api.platform_url, "Event/GetEventById", { EventId: EventId }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //ApplySubmit
    ApplySubmit: function (datas, onSuccess) {
        return $.ajax({
            type: "post",
            url: "/user/EventApply",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //bbsRuleText
    getRuleText: function (onSuccess) {
        api.getData(api.ucenter_url, "Other/eula", {}, function (json) {
            if (json != undefined && json.ResponseCode == 0) {
                json.Content = json.Content.replace(/\r\n/g, "<br/>");
            }
            if (onSuccess)
                onSuccess(json);
        });
    },
    //判断管理员
    CheckAdmin: function (username, onSuccess) {
        api.getData(api.platform_url, "admin/CheckAdmin", { username: username }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //根据版块显示广告
    GetForumBannerAdv: function (tagName, onSuccess) {
        api.getData(api.platform_url, "Advertisement/GetMobileBannerAdv", { tagName: tagName }, function (json) {
            if (onSuccess)
                onSuccess(json);
        })
    },
    //删除文章
    delarticle: function (articleId, log, onSuccess) {
        api.getData(api.platform_url, "article/delarticle", {
            articleId: articleId,
            log: log
        }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //http://ucenterapi.cnool.net/wrapper/User/GetCnoolUserInfo
    //获取个人信息
    getUserInfo: function (onSuccess) {
        api.getData(api.ucenter_url, "User/GetCnoolUserInfo", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },

    //获取其他用户属性
    getFriendUserInfo: function (FriendUserName, onSuccess) {
        api.getData(api.ucenter_url, "User/GetFriendUserInfo", { FriendUserName: FriendUserName }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },

    //http://ucenterapi.cnool.net/wrapper/User/ChangeCnoolUserInfo
    //修改用户的信息
    changeCnoolUserInfo: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/ChangeCnoolUserInfo.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //http://ucenterapi.cnool.net/wrapper/User/ChangeUserName
    //修改用户的用户名
    changeUserName: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/ChangeUserName.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //上传视频
    Videoupload: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/Videoupload.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //栏目信息
    getColunmList: function (onSuccess) {
        api.getData(api.platform_url, "column/GetColunmList", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //APP栏目标签列表
    getColunm: function (id, onSuccess) {
        api.getData(api.platform_url, "column/GetColunm", { id: id }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //APP热门板块
    getHotForumStat: function (onSuccess) {
        api.getData(api.ucenter_url, "Statistics/GetHotForumStat", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //获取单个标签
    getTagByName: function (tagName, onSuccess) {
        api.getData(api.platform_url, "tag/GetTagByName", { tagName: tagName }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //版块文章列表/article/GetForumList
    getForumList: function (tagName, page, onSuccess) {
        api.getData(api.platform_url, "article/GetForumList", { tagName: tagName, page: page, pageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
        //apicmd.getData(API_LIST.platform, "article", "GetForumList", "tagname=" + tagname + "&page=" + page + "&pageSize=10", {}, function (data, err) {
        //    if (fn)
        //        fn(data, err);
        //}, 'json');
    },
    //用户所关注的栏目列表
    getColunmsByUserId: function (onSuccess) {
        api.getData(api.ucenter_url, "UserFavorite/GetColunmsByUserId", { PageId: 1, PageSize: 100 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    getColunmsByUserIdPage: function (PageId, onSuccess) {
        api.getData(api.ucenter_url, "UserFavorite/GetColunmsByUserId", { PageId: PageId, PageSize: 100 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //http://ucenterapi.cnool.net/wrapper/UserFavorite/AttentedOrCacnleColunm
    //关注或取消关注某个栏目
    attentedOrCacnleColunm: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/attentedOrCacnleColunm.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },


    //首页文章列表
    getArticleListIndex: function (page, onSuccess) {
        api.getData(api.platform_url, "article/GetAppIndexList", { page: page, pageSize: 10 }, function (json) {
            for (i = 0; i < json.data.length; i++) {
                if (!json.data[i].CoverImage) {
                    json.data[i].CoverImage = [];
                }
                for (j = 0; j < json.data[i].CoverImage.length; j++) {
                    json.data[i].CoverImage[j] = replaceImg(json.data[i].CoverImage[j]);
                }
            };
            if (onSuccess)
                onSuccess(json);
        });
    },
    //首页热点列表
    getHotList: function (PageId, onSuccess) {
        api.getData(api.platform_url, "article/GetHotArticleHistory", { time: PageId }, function (json) {
            for (i = 0; i < json.data.length; i++) {
                if (!json.data[i].CoverImage) {
                    json.data[i].CoverImage = [];
                }
                for (j = 0; j < json.data[i].CoverImage.length; j++) {
                    json.data[i].CoverImage[j] = replaceImg(json.data[i].CoverImage[j]);
                }
            };
            if (onSuccess)
                onSuccess(json);
        }, 'json');
    },
    //栏目文章列表
    getArticleListByColunm: function (ColumnId, page, onSuccess) {
        api.getData(api.platform_url, "article/GetArticleListByColumn", { ColumnId: ColumnId, page: page, pageSize: 10 }, function (json) {
            for (i = 0; i < json.data.length; i++) {
                if (!json.data[i].CoverImage) {
                    json.data[i].CoverImage = [];
                }
                for (j = 0; j < json.data[i].CoverImage.length; j++) {
                    json.data[i].CoverImage[j] = replaceImg(json.data[i].CoverImage[j]);
                }
            };
            if (onSuccess)
                onSuccess(json);
        });
    },
    //板块热帖列表
    getForumViewRankList: function (tagname, onSuccess) {
        api.getData(api.platform_url, "article/GetViewRankList", { tagname: tagname, pageSize: 15 }, function (json) {
            for (i = 0; i < json.data.length; i++) {
                if (!json.data[i].CoverImage) {
                    json.data[i].CoverImage = [];
                }
                for (j = 0; j < json.data[i].CoverImage.length; j++) {
                    json.data[i].CoverImage[j] = replaceImg(json.data[i].CoverImage[j]);
                }
            };
            if (onSuccess)
                onSuccess(json);
        });
    },
    ///recommendByUser
    recommendByUser: function (datas, onSuccess,onErr) {
        return $.ajax({
            type: "get",
            url: "/ajax/m/recommendByUser.aspx",
            data: datas,
            dataType: "json",
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            },
            error: function (err) {
                if (onErr) {
                    onErr(err)
                }
            }
        });
    },

    //文章详情信息
    getArticleById: function (id, onSuccess) {
        api.getData(api.platform_url, "article/GetArticleById", { id: id }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //文章评论信息
    getCommentByArticleId: function (ArticleId, page, onSuccess) {
        api.getData(api.platform_url, "comment/getCommentByArticleId", { ArticleId: ArticleId, page: page, pageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //管理员判断
    CheckAdmin: function (username, onSuccess) {
        api.getData(api.platform_url, "admin/CheckAdmin", { username: username }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //栏目标签信息
    getTagCategory: function (onSuccess) {
        api.getData(api.platform_url, "tag/GetTagCategory", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //栏目标签列表信息
    getListByCategory: function (Category, onSuccess) {
        api.getData(api.platform_url, "tag/getListByCategory", { Category: Category, page: 1, pageSize: 999 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //http://testapi.platform.cnool.net/forum/create
    //发帖
    create: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        var useragent = useragent;
        datas["useragent"] = useragent;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/create.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },

    //编辑帖子
    unitedit: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        var useragent = useragent;
        datas["useragent"] = useragent;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/unitedit.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    forumedit: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        var useragent = useragent;
        datas["useragent"] = useragent;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/forumedit.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //http://testapi.platform.cnool.net/comment/create
    //评论
    comment: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        var useragent = useragent;
        datas["useragent"] = useragent;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/comment.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //修改评论
    commentedit: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        var useragent = useragent;
        datas["useragent"] = useragent;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/commentedit.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //删除评论
    delcomment: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        var useragent = useragent;
        datas["useragent"] = useragent;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/delcomment.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //发布点
    newslist: function (datas, onSuccess) {
        //var $sessionId = localStorage.SessionId;
        var PointId = datas.PointId;
        datas["PointId"] = PointId;
        return $.ajax({
            type: "get",
            url: "/ajax/m/newslist.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //点赞
    addlike: function (ArticleId, onSuccess) {
        api.getData(api.platform_url, "article/addlike", { ArticleId: ArticleId }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //评论点赞
    addreplylike: function (ArticleId, commentId, onSuccess) {
        api.getData(api.platform_url, "comment/addlike", { ArticleId: ArticleId, commentId: commentId }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //点踩
    addunlike: function (ArticleId, onSuccess) {
        api.getData(api.platform_url, "article/addunlike", { ArticleId: ArticleId }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },

    //我的最新动态
    getMyTimeline: function (PageId, onSuccess) {
        api.getData(api.ucenter_url, "Timeline/GetUserEventsByUser", { PageId: PageId, PageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //好友最新动态
    getFriendTimeline: function (PageId, onSuccess) {
        api.getData(api.ucenter_url, "Timeline/GetTimeline", { PageId: PageId, PageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },

    //是否关注
    getConcernState: function (FriendUserName, onSuccess) {
        api.getData(api.ucenter_url, "t_api/GetConcernState", { FriendUserName: FriendUserName }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },

    //我的收藏
    getCollect: function (PageId, onSuccess) {
        api.getData(api.ucenter_url, "UserFavorite/GetCollectArticlesByUserId", { PageId: PageId, PageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //判断某篇文章是否被收藏
    IsArticelCollected: function (ArticleId, onSuccess) {
        api.getData(api.ucenter_url, "UserFavorite/IsArticelCollected", { ArticleId: ArticleId }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //收藏或取消收藏某篇文章
    collectOrCacnleArticle: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/collectOrCacnleArticle.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //粉丝列表
    getfanusers: function (UserName, PageId, onSuccess) {
        api.getData(api.ucenter_url, "t_api/getfanusers", { UserName: UserName, PageId: PageId, PageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //关注列表
    getfollowusers: function (UserName, PageId, onSuccess) {
        api.getData(api.ucenter_url, "t_api/getfollowusers", { UserName: UserName, PageId: PageId, PageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //关注/取消关注
    follow: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/follow.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //最近私信联系人列表
    getLatestPrivatemessageChatUsers: function (PageId, onSuccess) {
        api.getData(api.ucenter_url, "t_api/GetLatestPrivatemessageChatUsers", { PageId: PageId }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //获取别人@我的通知
    getUserAtEventsByUser: function (PageId, onSuccess) {
        api.getData(api.ucenter_url, "AtEvent/GetUserAtEventsByUser", { PageId: PageId, PageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //http://ucenterapi.cnool.net/wrapper/t_api/NewPrivatePost
    //发送私信
    newPrivatePost: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/newPrivatePost.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //获取与某人的最近私信聊天记录
    getPrivatemessageChatLog: function (FriendUserName, PageId, pagesize, onSuccess) {
        api.getData(api.ucenter_url, "t_api/GetPrivatemessageChatLog", { FriendUserName: FriendUserName, PageId: PageId, pagesize: pagesize }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //实时查询最新聊天私信记录
    realTimeGetLatestPrivatemessage: function (FriendUserName, MinId, onSuccess) {
        api.getData(api.ucenter_url, "t_api/RealTimeGetLatestPrivatemessage", { FriendUserName: FriendUserName, MinId: MinId }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //从聊天面板中移除某个私信联系人
    removeLatestPrivatemessageChatUser: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/removeLatestPrivatemessageChatUser.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //个人中心文章列表
    getUserArticleList: function (page, onSuccess) {
        api.getData(api.platform_url, "article/GetUserArticleList", { page: page, pageSize: 10 }, function (json) {
            for (i = 0; i < json.data.length; i++) {
                if (!json.data[i].CoverImage) {
                    json.data[i].CoverImage = [];
                }
                for (j = 0; j < json.data[i].CoverImage.length; j++) {
                    json.data[i].CoverImage[j] = replaceImg(json.data[i].CoverImage[j]);
                }
            };
            if (onSuccess)
                onSuccess(json);
        });
    },
    //个人中心列表  帖子
    getOtherArticleList: function (AuthorUserName, page, onSuccess) {
        api.getData(api.platform_url, "article/GetUserArticleList", { AuthorUserName: AuthorUserName, page: page, pageSize: 10 }, function (json) {
            for (i = 0; i < json.data.length; i++) {
                if (!json.data[i].CoverImage) {
                    json.data[i].CoverImage = [];
                }
                for (j = 0; j < json.data[i].CoverImage.length; j++) {
                    json.data[i].CoverImage[j] = replaceImg(json.data[i].CoverImage[j]);
                }
            };
            if (onSuccess)
                onSuccess(json);
        });
    },
    //个人中心列表  回复
    getOtherReplyList: function (AuthorUserName, page, onSuccess) {
        api.getData(api.platform_url, "comment/GetUserCommentsIncludeArticleInfor", { AuthorUserName: AuthorUserName, page: page, pageSize: 10 }, function (json) {
            for (i = 0; i < json.data.length; i++) {
                if (!json.data[i].CoverImage) {
                    json.data[i].CoverImage = [];
                }
                for (j = 0; j < json.data[i].CoverImage.length; j++) {
                    json.data[i].CoverImage[j] = replaceImg(json.data[i].CoverImage[j]);
                }
            };
            if (onSuccess)
                onSuccess(json);
        });
    },
    //我的消息
    getNotificationListByUser: function (PageId, onSuccess) {
        api.getData(api.ucenter_url, "UserNotification/GetNotificationListByUser", { PageId: PageId, PageSize: 5 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },

    //黑名单用户
    ConetntBalckList: function (onSuccess) {
        api.getData(api.platform_url, "UserAction/ConetntBalckList", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //移除黑名单用户
    RemoveBalckList: function (blacklistid, onSuccess) {
        api.getData(api.platform_url, "UserAction/RemoveBalckList", { blacklistid: blacklistid }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //积分经验
    GetScorelogByUserId: function (PageId, onSuccess) {
        api.getData(api.ucenter_url, "UserLog/GetScorelogByUserId", { PageId: PageId, PageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    GetExpLogByUserId: function (PageId, onSuccess) {
        api.getData(api.ucenter_url, "UserLog/GetExpLogByUserId", { PageId: PageId, PageSize: 10 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },

    //我的消息条数
    mymsgcount: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/mymsgcount.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //未读消息条数清零
    setmsg0: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/setmsg0.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },

    //设置@消息已读
    setnews: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/setnews.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //获取@未读消息
    getnews: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/getnews.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //获取未读私信
    getprinews: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/getprinews.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //我的消息条数
    mymsgcount: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/mymsgcount.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //选择私信发送
    GetAllFollowingAndFans: function (onSuccess) {
        api.getData(api.ucenter_url, "t_api/GetAllFollowingAndFans", {}, function (data) {
            if (onSuccess)
                onSuccess(data);
        });
    },
    //黑名单
    getMyPrivatemessageblacklist: function (onSuccess) {
        api.getData(api.ucenter_url, "t_api/GetMyPrivatemessageblacklist", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //添加黑名单
    addToMyPrivatemessageblacklist: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/addToMyPrivatemessageblacklist.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //移除黑名单
    deleteFromMyPrivatemessageblacklist: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/deleteFromMyPrivatemessageblacklist.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },

    //未读条数清零
    cleanmsg: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/setPrivateMessageChatStateAsRead.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },

    //图形验证码获取Key
    imgValCodeKey: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/imgValCodeKey.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //图形验证码获取图片
    imgValCodeSrc: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/imgValCodeSrc.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //图形验证码验证
    imgValCodeValidate: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/imgValCodeValidate.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //三方登陆
    threelogin: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/registerForThirdParty.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },

    //登录
    login: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/login.aspx",
            data: datas,
            success: function (json) {
                if (json != undefined && json.ResponseCode == 0) {
                    //localStorage.SessionId = json.SessionId;
                    //localStorage.UserName = json.UserName;
                    //$.cookie("SessionId", json.SessionId, { path: "/", expires: 3650, domain: "cnool.net", secure: false, raw: false })
                    //$.cookie("UserName", json.UserName, { path: "/", expires: 3650, domain: "cnool.net", secure: false, raw: false })
                    //sessionStorage.SessionId = json.SessionId;
                    //alert("localStorage:" + localStorage.SessionId);
                    //alert("sessionStorage:" + sessionStorage.SessionId);
                }
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //快捷登录
    quickLogin: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/quickLogin.aspx",
            data: datas,
            success: function (json) {
                if (json != undefined && json.ResponseCode == 0) {
                    //localStorage.SessionId = json.SessionId;
                    //$.cookie("SessionId", json.SessionId, { path: "/", expires: 3650, domain: "cnool.net", secure: false, raw: false })
                    //$.cookie("UserName", json.UserName, { path: "/", expires: 3650, domain: "cnool.net", secure: false, raw: false })
                }
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //
    register: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/register.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //绑定东论
    registerWithBindOldCnoolUser: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/registerWithBindOldCnoolUser.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //手机登录发送验证码
    sendMobilegCode: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/sendMobilegCode.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //ActiveUserByMobile
    activeUserByMobile: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/ActiveUserByMobile.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //注册  检测账号是否已注册
    isRegisteredUser: function (RegisterName, onSuccess) {
        api.getData(api.ucenter_url, "User/IsRegisteredUser", { RegisterName: RegisterName, Type: 2 }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //检测手机验证码
    checkRegMobilegCode: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/checkRegMobilegCode.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //根据手机获取账户
    getUserListByAuthMobile: function (Mobile, onSuccess) {
        api.getData(api.ucenter_url, "User/GetUserListByAuthMobile", { Mobile: Mobile }, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },

    //举报
    reportIllegal: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        var useragent = useragent;
        datas["useragent"] = useragent;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/reportIllegal.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //拉黑
    blackSomeone: function (blackUserId, fn) {
        api.getData(api.platform_url, "UserAction/FillInBlackList", {
            blackUserId: blackUserId
        }, function (data) {
            if (fn)
                fn(data);
        });
    },

    //单条评论
    getCommentById: function (articleid, CommentId, fn) {
        api.getData(api.platform_url, "comment/getCommentById", { articleid: articleid, CommentId: CommentId }, function (data) {
            if (fn)
                fn(data);
        });
    },
    //单条评论子评论
    GetCommentsByCommentId: function (ArticleId, CommentId, page, fn) {
        api.getData(api.platform_url, "comment/GetCommentsByCommentId", { ArticleId: ArticleId, CommentId: CommentId, page: page, pagesize: 20 }, function (data) {
            if (fn)
                fn(data);
        });
    },

    //APP搜索列表
    restSearch: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        var $sessionId = api.getSessionId();
        var IP = userip;
        var Port = userport;
        datas["IP"] = IP;
        datas["Port"] = Port;
        datas["AppId"] = AppId;
        datas["SessionId"] = $sessionId;
        return $.ajax({
            type: "post",
            url: "/ajax/m/restSearch.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },

    //清除html保留img,p,br
    clearContentHtml: function (str) {
        //只保留img,p,br标签 
        str = str.replace(/<img/g, "#####");
        //str = str.replace(/<p/g, "%%%%%");
        //str = str.replace(/<\/p>/g, "&&&&&");

        //str = str.replace(/<blockquote/g, "!!!!!");
        //str = str.replace(/<\/blockquote>/g, "~~~~~");
        str = str.replace(/<br[^>]+>/g, "@@@@@");
        //str = str.replace(/data-src/g, "src");
        //过滤style class
        str = str.replace(/style\s*=(['\"\s]?)[^'\"]*?\1/g, "");
        str = str.replace(/class\s*=(['\"\s]?)[^'\"]*?\1/g, "");
        //删除脚本
        str = str.replace(/<script[^>]*?>.*?<\/script>/g, "");
        //替换符号
        str = str.replace(/&nbsp;/g, " ")
        str = str.replace(/&(quot|#34);/g, "\"")
        str = str.replace(/&(amp|#38);/g, "&")
        str = str.replace(/&(lt|#60);/g, "<")
        str = str.replace(/&(gt|#62);/g, ">")
        //str = str.replace(/&(nbsp|#160);/g, " ")
        str = str.replace(/&(iexcl|#161);/g, "\xa1")
        str = str.replace(/&(cent|#162);/g, "\xa2")
        str = str.replace(/&(pound|#163);/g, "\xa3")
        str = str.replace(/&(copy|#169);/g, "\xa9")
        str = str.replace(/&#(\d+);/g, "")
        //清楚html
        str = str.replace(/<\/?[^>]*>/g, "");
        //还原img,p,br标签
        str = str.replace(/#####/g, "<img");
        //str = str.replace(/%%%%%/g, "<p");
        //str = str.replace(/&&&&&/g, "</p>");
        //str = str.replace(/!!!!!/g, "<blockquote");
        //str = str.replace(/~~~~~/g, "</blockquote>");
        str = str.replace(/@@@@@/g, "<br/>");
        return str;
    },

    //解析Url  获取Url中的参数值
    getParam: function (paramName) {
        paramValue = "";
        isFound = false;
        if (window.location.search.indexOf("?") == 0 && window.location.search.indexOf("=") > 1) {
            arrSource = decodeURI(window.location.search).substring(1, window.location.search.length).split("&");
            i = 0;
            while (i < arrSource.length && !isFound) {
                if (arrSource[i].indexOf("=") > 0) {
                    if (arrSource[i].split("=")[0].toLowerCase() == paramName.toLowerCase()) {
                        paramValue = (arrSource[i].split("=")[1]);
                        isFound = true;
                    }
                }
                i++;
            }
        }
        return paramValue;
    },
    //页面传输数据
    //sessionStorage

    //获取时间格式
    getdate: function (time) {
        var now = new Date(time),
            y = now.getFullYear(),
            m = now.getMonth() + 1,
            d = now.getDate();
        return y + "-" + (m < 10 ? "0" + m : m) + "-" + (d < 10 ? "0" + d : d) + " " + now.toTimeString().substr(0, 8);
    },
    //显示提示
    showWarning: function (text) {
        var $toast = document.getElementById("toast");
        if ($toast.style.display != 'none') {
            return;
        }
        $(".weui_toast_content").html(text);
        //document.getElementById('weui_toast_content').innerHTML = text;
        $('#toast').show();
        //document.getElementById('toast').style.display = "block"
        setTimeout(function () {
            $('#toast').hide();
            //document.getElementById('toast').style.display = "none"
        }, 2000);
    },
    //显示提示
    toast_show: function (text) {
        var $toast = document.getElementById("toast");
        if ($toast.style.display != 'none') {
            return;
        }
        $(".weui_toast_content").html(text);
        $('#toast').show();
    },
    //隐藏提示
    toast_hide: function () {
        setTimeout(function () {
            $('#toast').hide();
        }, 2000);
    },
    getPassport: function () {
        return $.cookie("CNOOL.passport");
    },
    getSessionId: function () {
        return sessionId;
    },
    // 获取数据
    getData: function (apiUrl, invoke, datas, onSuccess) {
        var appId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        datas["app_Id"] = appId;
        datas["SessionId"] = $sessionId;
        //datas["callback"] = "json";
        return $.ajax({
            type: "get",
            url: apiUrl + "/" + invoke,
            async: false,
            cache: false,
            dataType: "jsonp",
            //jsonp: "callback",
            //jsonpCallback: "json",
            data: datas,
            success: function (json) {
                //alert(JSON.stringify(json));
                if (onSuccess) {
                    onSuccess(json);
                }
            },
            error: function (e) {
                console.log(invoke + "接口传输出错...");
            }
        });
    },
    // 提交数据
    submitData: function (apiUrl, invoke, datas, onSuccess) {
        var appId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        var $sessionId = api.getSessionId();
        datas["app_Id"] = appId;
        datas["SessionId"] = $sessionId;
        //datas["callback"] = "json";
        return $.ajax({
            type: "post",
            url: apiUrl + "/" + invoke,
            async: false,
            cache: false,
            dataType: "jsonp",
            //jsonp: "callback",
            //jsonpCallback: "json",
            data: datas,
            success: function (json) {
                //alert(JSON.stringify(json));
                if (onSuccess) {
                    onSuccess(json);
                }
            },
            error: function (e) {
                console.log(invoke + "接口传输出错...");
            }
        });
    },
    //上传图片
    uploadImage: function (data, onSuccess) {
        return $.ajax({
            type: "post",
            url: "/ajax/m/upload.aspx",
            data: data,
            async: false,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //转小图
    Convert2SmallImg: function (url) {
        if (url == undefined) return url;
        if (url.indexOf("https://upload2007.cnool.net/") >= 0) {
            url = url.replace(".jpg", "_m.jpg");
            url = url.replace(".png", "_m.png");
            url = url.replace(".jpeg", "_m.jpeg");
            return url;
        }
        if (url.indexOf("https://upload2016.cnool.net/") >= 0) {
            url = url.replace("https://upload2016.cnool.net/uploads_large/", "https://upload2016.cnool.net/uploads_mobile/");
            return url;
        }
        return url;
    },
    Convert2SmallImg200: function (url) {
        if (url == undefined) return url;
        if (url.indexOf("https://upload2007.cnool.net/") >= 0) {
            url = url.replace(".jpg", "_s.jpg");
            url = url.replace(".png", "_s.png");
            url = url.replace(".jpeg", "_s.jpeg");
            return url;
        }
        if (url.indexOf("https://upload2016.cnool.net/") >= 0) {
            url = url.replace("https://upload2016.cnool.net/uploads_large/", "https://upload2016.cnool.net/uploads_thumbnail/");
            return url;
        }
        return url;
    },
    Convert2BigImg: function (url) {
        if (url == undefined) return url;
        if (url.indexOf("https://upload2007.cnool.net/") >= 0) {
            url = url.replace("_m.jpg", ".jpg");
            url = url.replace("_m.png", ".png");
            url = url.replace("_m.jpeg", ".jpeg");
            return url;
        }
        if (url.indexOf("https://upload2016.cnool.net/") >= 0) {
            url = url.replace("https://upload2016.cnool.net/uploads_mobile/", "https://upload2016.cnool.net/uploads_large/");
            return url;
        }
        return url;
    },
    Convert2BigImg200: function (url) {
        if (url == undefined) return url;
        if (url.indexOf("https://upload2007.cnool.net/") >= 0) {
            url = url.replace("_s.jpg", ".jpg");
            url = url.replace("_s.png", ".png");
            url = url.replace("_s.jpeg", ".jpeg");
            return url;
        }
        if (url.indexOf("https://upload2016.cnool.net/") >= 0) {
            url = url.replace("https://upload2016.cnool.net/uploads_thumbnail/", "https://upload2016.cnool.net/uploads_large/");
            return url;
        }
        return url;
    },
    replaceImg: function (url) {
        if (url) {
            if (url.indexOf("http://upload2007.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/upload2007\.cnool\.net/g, "https://upload2007.cnool.net");
            }
            if (url.indexOf("http://upload2016.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/upload2016\.cnool\.net/g, "https://upload2016.cnool.net");
            }
            if (url.indexOf("http://avatar.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/avatar\.cnool\.net/g, "https://avatar.cnool.net");
            }
            if (url.indexOf("http://static.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/static\.cnool\.net/g, "https://static.cnool.net");
            }
            if (url.indexOf("http://img2011.bbs.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/img2011\.bbs\.cnool\.net/g, "https://avatar.cnool.net");
            }
            if (url.indexOf("http://img.bbs.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/img\.bbs\.cnool\.net/g, "https://static.cnool.net");
            }
            if (url.indexOf("http://source.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/source\.cnool\.net/g, "https://source.cnool.net");
            }
            return url;
        } else {
            return;
        }
    },
    //获取一点登陆sessionid
    ConvertPassportToSessionId: function (datas, onSuccess) {
        var AppId = 0;
        browserRedirect(function () {
            AppId = 10002;
        });
        //var $sessionId = localStorage.SessionId;
        //var $sessionId = api.getSessionId();
        datas["AppId"] = AppId;
        datas["CnoolPassport"] = $.cookie('CNOOL.passport');
        return $.ajax({
            type: "post",
            url: "/ajax/m/ConvertPassportToSessionId.aspx",
            data: datas,
            success: function (json) {
                if (onSuccess) {
                    onSuccess(json);
                }
            }
        });
    },
    //判断每日发帖数
    GetPostArticleCount: function (onSuccess) {
        api.getData(api.platform_url, "UserAction/GetPostArticleCount", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //判断每日回帖数
    GetPostCommentCount: function (onSuccess) {
        api.getData(api.platform_url, "UserAction/GetPostCommentCount", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
    //判断每日点赞数
    GetAddLikeCount: function (onSuccess) {
        api.getData(api.platform_url, "UserAction/GetAddLikeCount", {}, function (json) {
            if (onSuccess)
                onSuccess(json);
        });
    },
};
//remove数组指定元素
function removeByValue(arr, val) {
    for (var i = 0; i < arr.length; i++) {
        if (arr[i] == val) {
            arr.splice(i, 1);
            break;
        }
    }
}
function replaceImg(obj) {
    var replaceoneImg = function (url) {
        if (url) {
            if (url.indexOf("http://upload2007.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/upload2007\.cnool\.net/g, "https://upload2007.cnool.net");
            }
            if (url.indexOf("http://upload2016.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/upload2016\.cnool\.net/g, "https://upload2016.cnool.net");
            }
            if (url.indexOf("http://avatar.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/avatar\.cnool\.net/g, "https://avatar.cnool.net");
            }
            if (url.indexOf("http://static.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/static\.cnool\.net/g, "https://static.cnool.net");
            }
            if (url.indexOf("http://img2011.bbs.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/img2011\.bbs\.cnool\.net/g, "https://avatar.cnool.net");
            }
            if (url.indexOf("http://img.bbs.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/img\.bbs\.cnool\.net/g, "https://static.cnool.net");
            }
            if (url.indexOf("http://source.cnool.net") >= 0) {
                url = url.replace(/http\:\/\/source\.cnool\.net/g, "https://source.cnool.net");
            }
            return url;
        } else {
            return;
        }
    }

    if (typeof (obj) == "string") {
        return replaceoneImg(obj);
    } else if (typeof (obj) == "object" && obj.length > 0) {
        for (i = 0; i < obj.length; i++) {
            replaceoneImg(obj[i]);
        }
    }
}
function timematch($postDate) {
    var date_now = new Date();
    $postDate = $postDate.replace(/-/g, "/")
    var date_end = new Date($postDate);

    var time = parseInt((date_now.getTime() - date_end.getTime()) / 1000);

    var second = time % 60;
    var all_minute = parseInt(time / 60);
    var minute = all_minute % 60;
    var all_hour = parseInt(all_minute / 60);
    var hour = all_hour % 24;
    var all_day = parseInt(all_hour / 24);
    var all_month = parseInt(all_day / 30);
    var all_year = parseInt(all_day / 365);
    if (all_year >= 1) {
        return $postDate = all_year + "年前"
    } else {
        if (all_month >= 1) {
            return $postDate = all_month + "月前"
        }
        else {
            if (all_day >= 1) {
                return $postDate = all_day + "天前"
            } else {
                if (all_hour >= 1) {
                    return $postDate = all_hour + "小时前"
                } else {
                    if (minute > 10) {
                        return $postDate = minute + "分钟前"
                    } else {
                        return $postDate = "刚刚";
                    }
                }
            }
        }
    }
};
function escape2Html(str) {
    var arrEntities = { 'lt': '<', 'gt': '>', 'nbsp': ' ', 'amp': '&', 'quot': '"' };
    return str.replace(/&(lt|gt|nbsp|amp|quot);/ig, function (all, t) {
        return arrEntities[t];
    }).replace(/&#([^;]*);/g, function () {
        var args = arguments,
            len = args.length,
            //当前匹配的字符串
            match = args[0],
            //所有分组$1, $2, ..., $n，跟上面replace(RegExp, str)中的$n一样，只不过这里的下标从0开始
            $ = Array.prototype.slice.call(args, 1, len - 2),
            //当前匹配的开始位置
            index = args[len - 2],
            //原字符串
            str = args[len - 1];
        return String.fromCharCode($[0]);
    });
}
function GetQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return decodeURI(r[2]); return null;
};

//判断浏览器为oc端还是wap端
function browserRedirect(callback) {
    var sUserAgent = navigator.userAgent.toLowerCase();
    //var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
    var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
    var bIsAndroid = sUserAgent.match(/android/i) == "android";
    //if (bIsIpad || bIsIphoneOs || bIsAndroid) {
    if (bIsIphoneOs || bIsAndroid) {
        if (callback) {
            callback();
        }
    }
};

//判断浏览器为oc端还是wap端
function browserRedirect_toPC(callback) {
    var sUserAgent = navigator.userAgent.toLowerCase();
    //var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
    var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
    var bIsAndroid = sUserAgent.match(/android/i) == "android";
    //if (!(bIsIpad || bIsIphoneOs || bIsAndroid)) {
    if (!(bIsIphoneOs || bIsAndroid)) {
        if (callback) {
            callback();
        }
    }
};


var emojMap = [
    { code: ":em101:", img: "https://static.cnool.net/images/emote/em101.gif" },
    { code: ":em102:", img: "https://static.cnool.net/images/emote/em102.gif" },
    { code: ":em103:", img: "https://static.cnool.net/images/emote/em103.gif" },
    { code: ":em104:", img: "https://static.cnool.net/images/emote/em104.gif" },
    { code: ":em105:", img: "https://static.cnool.net/images/emote/em105.gif" },
    { code: ":em106:", img: "https://static.cnool.net/images/emote/em106.gif" },
    { code: ":em107:", img: "https://static.cnool.net/images/emote/em107.gif" },
    { code: ":em108:", img: "https://static.cnool.net/images/emote/em108.gif" },
    { code: ":em109:", img: "https://static.cnool.net/images/emote/em109.gif" },
    { code: ":em110:", img: "https://static.cnool.net/images/emote/em110.gif" },
    { code: ":em111:", img: "https://static.cnool.net/images/emote/em111.gif" },
    { code: ":em112:", img: "https://static.cnool.net/images/emote/em112.gif" },
    { code: ":em113:", img: "https://static.cnool.net/images/emote/em113.gif" },
    { code: ":em114:", img: "https://static.cnool.net/images/emote/em114.gif" },
    { code: ":em115:", img: "https://static.cnool.net/images/emote/em115.gif" },
    { code: ":em116:", img: "https://static.cnool.net/images/emote/em116.gif" },
    { code: ":em117:", img: "https://static.cnool.net/images/emote/em117.gif" },
    { code: ":em118:", img: "https://static.cnool.net/images/emote/em118.gif" },
    { code: ":em119:", img: "https://static.cnool.net/images/emote/em119.gif" },
    { code: ":em120:", img: "https://static.cnool.net/images/emote/em120.gif" },
    { code: ":em121:", img: "https://static.cnool.net/images/emote/em121.gif" },
    { code: ":em122:", img: "https://static.cnool.net/images/emote/em122.gif" },
    { code: ":em123:", img: "https://static.cnool.net/images/emote/em123.gif" },
    { code: ":em124:", img: "https://static.cnool.net/images/emote/em124.gif" },
    { code: ":em125:", img: "https://static.cnool.net/images/emote/em125.gif" },
    { code: ":em126:", img: "https://static.cnool.net/images/emote/em126.gif" },
    { code: ":em127:", img: "https://static.cnool.net/images/emote/em127.gif" },
    { code: ":em128:", img: "https://static.cnool.net/images/emote/em128.gif" },
    { code: ":em129:", img: "https://static.cnool.net/images/emote/em129.gif" },
    { code: ":em130:", img: "https://static.cnool.net/images/emote/em130.gif" },
    { code: ":em131:", img: "https://static.cnool.net/images/emote/em131.gif" },
    { code: ":em132:", img: "https://static.cnool.net/images/emote/em132.gif" },
    { code: ":em133:", img: "https://static.cnool.net/images/emote/em133.gif" },
    { code: ":em134:", img: "https://static.cnool.net/images/emote/em134.gif" },
    { code: ":em135:", img: "https://static.cnool.net/images/emote/em135.gif" },
    { code: ":em136:", img: "https://static.cnool.net/images/emote/em136.gif" },
    { code: ":em137:", img: "https://static.cnool.net/images/emote/em137.gif" },
    { code: ":em138:", img: "https://static.cnool.net/images/emote/em138.gif" },
    { code: ":em139:", img: "https://static.cnool.net/images/emote/em139.gif" },
    { code: ":em140:", img: "https://static.cnool.net/images/emote/em140.gif" },
    { code: ":em141:", img: "https://static.cnool.net/images/emote/em141.gif" },
    { code: ":em142:", img: "https://static.cnool.net/images/emote/em142.gif" },
    { code: ":em143:", img: "https://static.cnool.net/images/emote/em143.gif" },
    { code: ":em144:", img: "https://static.cnool.net/images/emote/em144.gif" },
    { code: ":em145:", img: "https://static.cnool.net/images/emote/em145.gif" },
    { code: ":em146:", img: "https://static.cnool.net/images/emote/em146.gif" },
    { code: ":em147:", img: "https://static.cnool.net/images/emote/em147.gif" },
    { code: ":em148:", img: "https://static.cnool.net/images/emote/em148.gif" },
    { code: ":em01:", img: "https://static.cnool.net/images/emote/em01.gif" },
    { code: ":em02:", img: "https://static.cnool.net/images/emote/em02.gif" },
    { code: ":em03:", img: "https://static.cnool.net/images/emote/em03.gif" },
    { code: ":em04:", img: "https://static.cnool.net/images/emote/em04.gif" },
    { code: ":em05:", img: "https://static.cnool.net/images/emote/em05.gif" },
    { code: ":em06:", img: "https://static.cnool.net/images/emote/em06.gif" },
    { code: ":em07:", img: "https://static.cnool.net/images/emote/em07.gif" },
    { code: ":em08:", img: "https://static.cnool.net/images/emote/em08.gif" },
    { code: ":em09:", img: "https://static.cnool.net/images/emote/em09.gif" },
    { code: ":em10:", img: "https://static.cnool.net/images/emote/em10.gif" },
    { code: ":em11:", img: "https://static.cnool.net/images/emote/em11.gif" },
    { code: ":em12:", img: "https://static.cnool.net/images/emote/em12.gif" },
    { code: ":em13:", img: "https://static.cnool.net/images/emote/em13.gif" },
    { code: ":em14:", img: "https://static.cnool.net/images/emote/em14.gif" },
    { code: ":em15:", img: "https://static.cnool.net/images/emote/em15.gif" },
    { code: ":em16:", img: "https://static.cnool.net/images/emote/em16.gif" },
    { code: ":em17:", img: "https://static.cnool.net/images/emote/em17.gif" },
    { code: ":em18:", img: "https://static.cnool.net/images/emote/em18.gif" },
    { code: ":em19:", img: "https://static.cnool.net/images/emote/em19.gif" },
    { code: ":em20:", img: "https://static.cnool.net/images/emote/em20.gif" },
    { code: ":em21:", img: "https://static.cnool.net/images/emote/em21.gif" },
    { code: ":em22:", img: "https://static.cnool.net/images/emote/em22.gif" },
    { code: ":em23:", img: "https://static.cnool.net/images/emote/em23.gif" },
    { code: ":em24:", img: "https://static.cnool.net/images/emote/em24.gif" },
    { code: ":em25:", img: "https://static.cnool.net/images/emote/em25.gif" },
    { code: ":em26:", img: "https://static.cnool.net/images/emote/em26.gif" },
    { code: ":em27:", img: "https://static.cnool.net/images/emote/em27.gif" },
    { code: ":em28:", img: "https://static.cnool.net/images/emote/em28.gif" },
    { code: ":em29:", img: "https://static.cnool.net/images/emote/em29.gif" },
    { code: ":em30:", img: "https://static.cnool.net/images/emote/em30.gif" },
    { code: ":em31:", img: "https://static.cnool.net/images/emote/em31.gif" },
    { code: ":em32:", img: "https://static.cnool.net/images/emote/em32.gif" },
    { code: ":em33:", img: "https://static.cnool.net/images/emote/em33.gif" },
    { code: ":em34:", img: "https://static.cnool.net/images/emote/em34.gif" },
    { code: ":em35:", img: "https://static.cnool.net/images/emote/em35.gif" },
    { code: ":em36:", img: "https://static.cnool.net/images/emote/em36.gif" },
    { code: ":em37:", img: "https://static.cnool.net/images/emote/em37.gif" },
    { code: ":em38:", img: "https://static.cnool.net/images/emote/em38.gif" },
    { code: ":+1:", img: "https://static.cnool.net/images/emote/em700.gif" },
    { code: ":啊哈:", img: "https://static.cnool.net/images/emote/em701.gif" },
    { code: ":爱心:", img: "https://static.cnool.net/images/emote/em702.gif" },
    { code: ":拜拜:", img: "https://static.cnool.net/images/emote/em703.gif" },
    { code: ":鄙视:", img: "https://static.cnool.net/images/emote/em704.gif" },
    { code: ":不要啊:", img: "https://static.cnool.net/images/emote/em705.gif" },
    { code: ":大汗:", img: "https://static.cnool.net/images/emote/em706.gif" },
    { code: ":大哭:", img: "https://static.cnool.net/images/emote/em707.gif" },
    { code: ":大笑:", img: "https://static.cnool.net/images/emote/em708.gif" },
    { code: ":呆呆:", img: "https://static.cnool.net/images/emote/em709.gif" },
    { code: ":得瑟:", img: "https://static.cnool.net/images/emote/em710.gif" },
    { code: ":顶:", img: "https://static.cnool.net/images/emote/em711.gif" },
    { code: ":发火:", img: "https://static.cnool.net/images/emote/em712.gif" },
    { code: ":激动:", img: "https://static.cnool.net/images/emote/em713.gif" },
    { code: ":惊吓:", img: "https://static.cnool.net/images/emote/em714.gif" },
    { code: ":纠结:", img: "https://static.cnool.net/images/emote/em715.gif" },
    { code: ":可怜:", img: "https://static.cnool.net/images/emote/em716.gif" },
    { code: ":抠鼻:", img: "https://static.cnool.net/images/emote/em717.gif" },
    { code: ":哭:", img: "https://static.cnool.net/images/emote/em718.gif" },
    { code: ":困:", img: "https://static.cnool.net/images/emote/em719.gif" },
    { code: ":泪奔:", img: "https://static.cnool.net/images/emote/em720.gif" },
    { code: ":潜水:", img: "https://static.cnool.net/images/emote/em721.gif" },
    { code: ":亲亲:", img: "https://static.cnool.net/images/emote/em722.gif" },
    { code: ":伤心:", img: "https://static.cnool.net/images/emote/em723.gif" },
    { code: ":偷乐:", img: "https://static.cnool.net/images/emote/em724.gif" },
    { code: ":吐:", img: "https://static.cnool.net/images/emote/em725.gif" },
    { code: ":晚安:", img: "https://static.cnool.net/images/emote/em726.gif" },
    { code: ":围观:", img: "https://static.cnool.net/images/emote/em727.gif" },
    { code: ":献花:", img: "https://static.cnool.net/images/emote/em728.gif" },
    { code: ":疑问:", img: "https://static.cnool.net/images/emote/em729.gif" },
    { code: ":晕:", img: "https://static.cnool.net/images/emote/em730.gif" },
    { code: ":赞:", img: "https://static.cnool.net/images/emote/em731.gif" },
    { code: ":早安:", img: "https://static.cnool.net/images/emote/em732.gif" },
];
function replaceEmoji(html) {
    for (var i = 0; i < emojMap.length; i++) {
        //html = html.replace(/'/g, "\"");
        //alert(html);
        html = html.replace(new RegExp("<img src=\"" + emojMap[i].img + "\"[^>]*>", "gi"), emojMap[i].code);
    }
    return html;
}

function ExpScoreFun(name, exp, score) {
    if (document.querySelector('body #ExpScore')) {
        document.getElementById("ExpScoreName").innerHTML = name;
        document.getElementById("ExpName").innerHTML = '经验：<b>' + exp + '</b>';
        document.getElementById("ScoreName").innerHTML = '积分：<b>' + score + '</b>';
        document.getElementById("ExpScore").style.display = "block";
    } else {
        var temple = '<div class="ExpScore">\
                    <div class="hd" id="ExpScoreName">'+ name + '</div >\
                    <div class="bd">\
                        <span class="exp" id="ExpName">经验：<b>'+ exp + '</b></span>\
                        <span class="score" id="ScoreName">积分：<b>'+ score + '</b></span>\
                    </div>\
                    <label class="moneyOh"><img src="/static/images/moneyOh.png" /></label>\
                </div>';
        var descDiv = document.createElement('div');
        descDiv.id = 'ExpScore';
        descDiv.innerHTML = temple;
        document.body.appendChild(descDiv);
    }
    setTimeout(function () {
        document.getElementById("ExpScore").style.display = "none";
    }, 2000)
}

function isNewsTag(catgoryTags) {
    if (newsTags && catgoryTags) {
        var tag = catgoryTags[0];
        for (var i = 0; i < newsTags.length; i++) {
            if (tag == newsTags[i]) {
                return true;
            }
        }
        return false;
    } else {
        return false;
    }
};

//列表图片处理
function setPicHeight() {
    var pic_1_width = (screen.width - 20);
    var pic_1_height = pic_1_width * 0.65;
    var pic_2_width = (screen.width - 20) * 0.33;
    var pic_2_height = pic_2_width * 0.65;
    var pic_3_width = (screen.width - 20) * 0.33;
    var pic_3_height = pic_3_width * 0.65;

    var index_pic_1 = $('.index-pic-1');
    for (i = 0; i < index_pic_1.length; i++) {
        $(index_pic_1[i]).height(pic_1_height);
    }
    var index_pic_2 = $('.index-pic-2');
    for (i = 0; i < index_pic_2.length; i++) {
        $(index_pic_2[i]).height(pic_2_height);
    }
    var index_pic_3 = $('.index-pic-3');
    for (i = 0; i < index_pic_3.length; i++) {
        $(index_pic_3[i]).height(pic_3_height);
    }
    var $img_1 = $('.index-pic-1 img');
    for (i = 0; i < $img_1.length; i++) {
        var pic1_h_w_ratio = $($img_1[i]).height() / $($img_1[i]).width();
        if (pic1_h_w_ratio > 0.65) {
            $($img_1[i]).height('auto');
            $($img_1[i]).width(pic_1_width);
        } else {
            $($img_1[i]).height(pic_1_height);
            $($img_1[i]).width('auto');
        }
    }
    var $img_2 = $('.index-pic-2 img');
    for (i = 0; i < $img_2.length; i++) {
        var pic2_h_w_ratio = $($img_2[i]).height() / $($img_2[i]).width();
        if (pic2_h_w_ratio > 0.65) {
            $($img_2[i]).height('auto');
            $($img_2[i]).width(pic_2_width);
        } else {
            $($img_2[i]).height(pic_2_height);
            $($img_2[i]).width('auto');
        }
    }
    var $imgList = $('.index-pic-3 img');
    for (i = 0; i < $imgList.length; i++) {
        var pic3_h_w_ratio = $($imgList[i]).height() / $($imgList[i]).width();
        if (pic3_h_w_ratio > 0.65) {
            $($imgList[i]).height('auto');
            $($imgList[i]).width(pic_3_width);
        } else {
            $($imgList[i]).height(pic_3_height);
            $($imgList[i]).width('auto');
        }
    }
};
function setPicHeightSimple() {
    var $picBoxImg = $('.hotlist-pic img');
    for (var i = 0; i < $picBoxImg.length; i++) {
        var $picBoxImgRatio = $($picBoxImg[i]).height() / $($picBoxImg[i]).width();
        if ($picBoxImgRatio > 0.65) {
            $($picBoxImg[i]).height('auto');
            $($picBoxImg[i]).width('120px');
        } else {
            $($picBoxImg[i]).height('80px');
            $($picBoxImg[i]).width('auto');
        }
    }
}

