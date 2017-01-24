</div>
<!-- /#main -->



<?php get_sidebar(); ?>

<div class="clear"></div>
<!-- /.cler -->
</div>
<!-- /#wrap-in -->

</div>
<!-- /#wrap -->
</div>
<!-- /#container -->


<?php if(is_mobile()) { ?>

<!-- このリンクでモーダルが表示-->

<div class="modal-window" id="modal-p01">
<div class="modal-inner"><!-- ここからモーダルウィンドウの中身-->
<?php
  $url_encode=urlencode(get_permalink());
  $title_encode=urlencode(get_the_title());
?>
    <ul class="clearfix">
<!--ツイートボタン-->
      <li class="twitter">
       <a href="http://twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&via=manami1030 &tw_p=tweetbutton"><i class="fa fa-twitter"></i>&nbsp;<?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></a>
      </li>
<!--Facebookいいね！/シェアボタン-->
      <li class="facebook">
       <a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>"><i class="fa fa-facebook"></i>&nbsp;<?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></a>
      </li>
<!--Google+1ボタン-->
       <li class="googleplus">
  <a href="https://plus.google.com/share?url=<?php echo $url_encode;?>" ><i class="fa fa-google-plus"></i>&nbsp;<?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'':scc_get_share_gplus(); ?></a>
      </li>
<!--はてブボタン-->
      <li class="hatebu">
      <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>"><i class="fa fa-hatena"></i>&nbsp;<?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></a>
      </li>

 <!--LINEボタン-->
      <li class="line">
  <a href="http://line.me/R/msg/text/?<?php echo $title_encode . '%0A' . $url_encode . "?ref=line";?>"><span class="icon-line"></span>&nbsp;</a>
  </li>
<!--ポケットボタン-->
<li class="pocket">
<a href="http://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>"><span class="icon-pocket"></span>&nbsp;<?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></a></li>

    </ul>
<!-- ここまでモーダルウィンドウの中身-->
</div>
 <a href="#!" class="modal-close">&times;</a>
 </div>

     <ul class="footer_menu">
      <?php if(is_single()) { ?>
 <?php
        $prev_post = get_previous_post();
        if (!empty( $prev_post )): ?>
  <li><a href="<?php echo get_permalink( $prev_post->ID ); ?>"><i class="fa fa-chevron-circle-left"></i><br>前記事</a></li>
   <?php endif; ?>
   <?php
        $next_post = get_next_post();
        if (!empty( $next_post )): ?>
  <li><a href="<?php echo get_permalink( $next_post->ID ); ?>"><i class="fa fa-chevron-circle-right"></i><br>次記事</a></li>
     <?php endif; ?>
  <?php } else { ?>
     <?php } ?>
<!--
<li>
<a href="http://mama-hack.com/ranking"><i class="fa fa-trophy"></i><br>人気記事</a>
</li>
-->
<li><a href="http://mama-hack.com"><i class="fa fa-home"></i><br>ホーム</a></div></li>
<li><!-- このリンクでモーダルが表示-->
 <a href="#modal-p01"><i class="fa fa-share"></i><br>シェア</a>
</li>
<li><!-- ページトップへ戻る-->
<div id="page-top"><a href="#wrapper"><i class="fa fa-chevron-circle-up"></i><br>トップ</a></div>
</li>
    </ul>

<?php } else { ?>
<div id="testfoot">
<div id="testfoot-in">

<!-- ここからPCフッター内容１つめ　-->

<div id="testfoot-cont1">
<p class="foottitle">ままはっくについて</p>

<p class="describe">
アクセスありがとうございます。<br>
このブログは育児ブロガー・まなしばが、妊娠出産・子育て・WEBサービスについて書いている“ママ術”的ブログです。<br>
よろしくどうぞ！ヽ(=´▽`=)ﾉ<br>
→<a href="http://mama-hack.com/about">まなしばの詳しいプロフィール</a><br>
→<a href="https://twitter.com/manami1030" rel="nofollow">Twitter</a> | <a href="https://www.facebook.com/manamishibata.blog/" rel="nofollow">Facebook</a><br>
→<a href="http://mama-hack.com/privacy">プライバシーポリシー</a>
</p>
</div>

<div id="testfoot-cont1">
<p class="foottitle">夫と開発したブロガー向けツール</p>
<p class="describe">
iOSとAndroidアプリ両方を探して紹介できるアプリ紹介ツール：<br>
→<a href="http://mama-hack.com/app-reach/" target="_blank">アプリーチ</a>
</p>
</div>

<!-- ここまでフッター内容１つめ　-->
<!-- ここからフッター内容２つめ　-->

<div id="testfoot-cont2">
<p class="foottitle2">最新の記事</p>
<ul>
<?php
foreach((get_the_category()) as $cat) {
$cat_id = 0;
break ;
}$cat_id = NULL;
$query = 'cat=' . $cat_id. '&showposts=6'; //表示本数
query_posts($query) ;
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<li>
<span style="font-family: 'Quicksand', sans-serif"><i class="fa fa-calendar"></i> <?php the_time('Y/m/d') ?></span>　<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>


<?php endwhile; else: ?>
<p>エントリがありません</p>
<?php endif; ?>
<?php wp_reset_query(); ?>
</ul>

</div>
<p class="clear"></p>
<!-- ここまでフッター内容２つめ　＆　横並び終わり　-->

<!-- ここからフッター内容３つめ　-->
<div id="testfoot-cont3">
<p class="foottitle3">Menu</p>
<ul class="testnavi">
<?php wp_nav_menu(array('theme_location' => 'navbar'));?>
</ul>
<p class="clear"></p>

</div>

<!-- ここまでフッター内容３つめ　-->
</div>
</div>
<?php } ?>
<!-- testfoot終わり　-->

 <?php if(is_mobile()) { ?>
<?php } else { ?>

<!-- ページトップへ戻る-->
<div id="page-top"><a href="#wrapper">TOP <i class="fa fa-chevron-up"></i></a></div>


<?php } ?>



<div id="footer">
  <div id="footer-in">
    <div id="gadf"> </div>
    <h4><a href="<?php echo home_url(); ?>/">
      <?php /*wp_title('');*/bloginfo('name'); ?>
      </a></h4>
    <h4><a href="<?php echo home_url(); ?>/">
      <?php bloginfo('description'); ?>
      </a></h4>
<!--著作権リンク-->
    <p class="copy">Copyright&copy;
      <?php bloginfo('name');?>
      ,
      <?php the_date('Y');?>
      All Rights Reserved.</p>
  </div>
  <!-- /#footer-in -->
</div>
<?php wp_footer(); ?>




<!---js切り替え--->
<?php
if(strpos($_SERVER['HTTP_USER_AGENT'],'ipod')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false){
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/smartbase.js" async defer ></script>
<?php
}else{
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/base.js"></script>
<?php
}
?>

<!-- ソーシャルボタンスクリプト読み込み -->

<script>
(function (w, d) {
w.___gcfg = {lang: "ja"};
var s, e = d.getElementsByTagName("script")[0],
a = function (u, i) {
if (!d.getElementById(i)) {
s = d.createElement("script");
s.src = u;
if (i) {s.id = i;}
e.parentNode.insertBefore(s, e);
}
};
a(("https:" == location.protocol ? "//ssl" : "//www") + ".google-analytics.com/ga.js", "ga");
a("https://apis.google.com/js/plusone.js");
a("//b.st-hatena.com/js/bookmark_button_wo_al.js");
a("//platform.twitter.com/widgets.js", "twitter-wjs");
a("//connect.facebook.net/ja_JP/all.js#xfbml=1", "facebook-jssdk");
})(this, document);
</script>

<!-- GAイベントトラッキング仕込み -->
<script type="text/javascript">jQuery(function() {
    jQuery("a").click(function(e) {
        var ahref = jQuery(this).attr('href');
        if (ahref.indexOf("mama-hack.com") != -1 || ahref.indexOf("http") == -1 ) {
            ga('send', 'event', '内部リンク', 'クリック', ahref);}
        else {
            ga('send', 'event', '外部リンク', 'クリック', ahref);}
        });
    });
</script>


<!-- リマーケティング タグの Google コード -->
<!--------------------------------------------------
リマーケティング タグは、個人を特定できる情報と関連付けることも、デリケートなカテゴリに属するページに設置することも許可されません。タグの設定方法については、こちらのページをご覧ください。
http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 986836582;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/986836582/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Yahoo Code for your Target List -->
<script type="text/javascript">
/* <![CDATA[ */
var yahoo_ss_retargeting_id = 1000322821;
var yahoo_sstag_custom_params = window.yahoo_sstag_params;
var yahoo_ss_retargeting = true;
/* ]]> */
</script>
<script type="text/javascript" src="//s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//b97.yahoo.co.jp/pagead/conversion/1000322821/?guid=ON&script=0&disvt=false"/>
</div>
</noscript>

<!-- Yahoo Code for your Target List -->
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
var yahoo_retargeting_id = 'A5ZGRTGSHU';
var yahoo_retargeting_label = '';
var yahoo_retargeting_page_type = '';
var yahoo_retargeting_items = [{item_id: '', category_id: '', price: '', quantity: ''}];
/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="//b92.yahoo.co.jp/js/s_retargeting.js"></script>

<script src="http://mama-hack.com/wp-content/convget/script.js"></script>

</body></html>
