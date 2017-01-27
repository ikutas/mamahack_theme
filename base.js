/*--------------------------------
広告のフロート
-------------------------------*/

(function($) {
    $(document).ready(function() {
        /*
		Ads Sidewinder
		by Hamachiya2. http://d.hatena.ne.jp/Hamachiya2/20120820/adsense_sidewinder
		*/
        var main = $('#main'); // メインカラムのID
        var side = $('#side'); // サイドバーのID
        var wrapper = $('#ad1'); // 広告を包む要素のID

        if (main.length === 0 || side.length === 0 || wrapper.length === 0) {
            return;
        }

        var w = $(window);
        var wrapperHeight = wrapper.outerHeight();
        var wrapperTop = wrapper.offset().top;
        var sideLeft = side.offset().left;

        var sideMargin = {
            top: side.css('margin-top')
                ? side.css('margin-top')
                : 0,
            right: side.css('margin-right')
                ? side.css('margin-right')
                : 0,
            bottom: side.css('margin-bottom')
                ? side.css('margin-bottom')
                : 0,
            left: side.css('margin-left')
                ? side.css('margin-left')
                : 0
        };

        var winLeft;
        var pos;

        var scrollAdjust = function() {
            sideHeight = side.outerHeight();
            mainHeight = main.outerHeight();
            mainAbs = main.offset().top + mainHeight;
            var winTop = w.scrollTop();
            winLeft = w.scrollLeft();
            var winHeight = w.height();
            var nf = (winTop > wrapperTop) && (mainHeight > sideHeight)
                ? true
                : false;
            pos = !nf
                ? 'static'
                : (winTop + wrapperHeight) > mainAbs
                    ? 'absolute'
                    : 'fixed';
            if (pos === 'fixed') {
                side.css({
                    position: pos,
                    top: '',
                    bottom: winHeight - wrapperHeight,
                    left: sideLeft - winLeft,
                    margin: 0
                });

            } else if (pos === 'absolute') {
                side.css({
                    position: pos,
                    top: mainAbs - sideHeight,
                    bottom: '',
                    left: sideLeft,
                    margin: 0
                });

            } else {
                side.css({position: pos, marginTop: sideMargin.top, marginRight: sideMargin.right, marginBottom: sideMargin.bottom, marginLeft: sideMargin.left});
            }
        };

        var resizeAdjust = function() {
            side.css({position: 'static', marginTop: sideMargin.top, marginRight: sideMargin.right, marginBottom: sideMargin.bottom, marginLeft: sideMargin.left});
            sideLeft = side.offset().left;
            winLeft = w.scrollLeft();
            if (pos === 'fixed') {
                side.css({
                    position: pos,
                    left: sideLeft - winLeft,
                    margin: 0
                });

            } else if (pos === 'absolute') {
                side.css({position: pos, left: sideLeft, margin: 0});
            }
        };
        w.on('load', scrollAdjust);
        w.on('scroll', scrollAdjust);
        w.on('resize', resizeAdjust);
    });
})(jQuery);

/*--------------------------------
フッターを最下部に
-------------------------------*/
/*--------------------------------------------------------------------------*
 *
 *  footerFixed.js
 *
 *  MIT-style license.
 *
 *  2007 Kazuma Nishihata [to-R]
 *  http://blog.webcreativepark.net
 *
 *--------------------------------------------------------------------------*/

new function() {

    var footerId = "footer";
    //メイン
    function footerFixed() {
        //ドキュメントの高さ
        var dh = document.getElementsByTagName("body")[0].clientHeight;
        //フッターのtopからの位置
        document.getElementById(footerId).style.top = "0px";
        var ft = document.getElementById(footerId).offsetTop;
        //フッターの高さ
        var fh = document.getElementById(footerId).offsetHeight;
        //ウィンドウの高さ
        if (window.innerHeight) {
            var wh = window.innerHeight;
        } else if (document.documentElement && document.documentElement.clientHeight != 0) {
            var wh = document.documentElement.clientHeight;
        }
        if (ft + fh < wh) {
            document.getElementById(footerId).style.position = "relative";
            document.getElementById(footerId).style.top = (wh - fh - ft - 1) + "px";
        }
    }

    //文字サイズ
    function checkFontSize(func) {

        //判定要素の追加
        var e = document.createElement("div");
        var s = document.createTextNode("S");
        e.appendChild(s);
        e.style.visibility = "hidden"
        e.style.position = "absolute"
        e.style.top = "0"
        document.body.appendChild(e);
        var defHeight = e.offsetHeight;

        //判定関数
        function checkBoxSize() {
            if (defHeight != e.offsetHeight) {
                func();
                defHeight = e.offsetHeight;
            }
        }
        setInterval(checkBoxSize, 1000)
    }

    //イベントリスナー
    function addEvent(elm, listener, fn) {
        try {
            elm.addEventListener(listener, fn, false);
        } catch (e) {
            elm.attachEvent("on" + listener, fn);
        }
    }

    addEvent(window, "load", footerFixed);
    addEvent(window, "load", function() {
        checkFontSize(footerFixed);
    });
    addEvent(window, "resize", footerFixed);

}

/*-------------
ページスクロール
-----------*/

$(function() {
    var pageTop = $('#page-top');
    pageTop.hide();
    //スクロールが400に達したら表示
    $(window).scroll(function() {
        if ($(this).scrollTop() > 400) {
            pageTop.fadeIn();
        } else {
            pageTop.fadeOut();
        }
    });
    //スクロールしてトップ
    pageTop.click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});

/*---------------------------
ｱｺｰﾃﾞｨｵﾝ
------------------------------*/

$(document).ready(function() {
    //acordion_treeを一旦非表示に
    $(".acordion_tree").css("display", "none");
    //triggerをクリックすると以下を実行
    $(".trigger").click(function() {
        //もしもクリックしたtriggerの直後の.acordion_treeが非表示なら
        if ($("+.acordion_tree", this).css("display") == "none") {
            //classにactiveを追加
            $(this).addClass("active");
            //直後のacordion_treeをスライドダウン
            $("+.acordion_tree", this).slideDown("normal");
        } else {
            //classからactiveを削除
            $(this).removeClass("active");
            //クリックしたtriggerの直後の.acordion_treeが表示されていればスライドアップ
            $("+.acordion_tree", this).slideUp("normal");
        }
    });
});

/*---------------------------
ドロップダウン
------------------------------*/

$(document).ready(function() {
    $(".menu ul.children").hide();
    $("li.page_item").hover(function() {
        $("ul.children", this).slideDown("slow");
    }, function() {
        $("ul.children", this).slideUp("slow");
    });
});

/* http://shufulife.com/footer-menu/　の内容追記 */
$(function() {
    var pageTop = $('#mobile-top');
    //スクロールしてトップ
    pageTop.click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});
