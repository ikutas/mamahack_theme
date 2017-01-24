<?php get_header(); ?>

<div class="kuzu">


<div class="entry-head-related">
最近の人気記事<br>
<?php
$cat_now = get_the_category();
$cat_now = $cat_now[0];
$now_id = $cat_now->cat_ID;
?>

<?php
if (function_exists('wpp_get_mostpopular')) {
    $args = '
limit=3&
range=monthly&
order_by=views&
cat="'.$now_id.'"&
stats_views=0&
stats_comments=0';
    wpp_get_mostpopular($args);
}
?><p style="margin:5px 0px;"></p>
<span class="prsankou">育児</span><a href="http://mama-hack.com/ergo-adapt">エルゴから新作抱っこひもが出ました。新生児から使える最強の抱っこ紐はこちら</a>
</div>
<p style="margin:10px 0px;"></p>


  <div id="breadcrumb">
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"> <a href="<?php echo home_url(); ?>" itemprop="url"> <span itemprop="title"><i class="fa fa-home"></i> ホーム</span> </a> &gt; </div>
    <?php $postcat = get_the_category(); ?>
    <?php $catid = $postcat[0]->cat_ID; ?>
    <?php $allcats = array($catid); ?>
    <?php
while (!$catid == 0) {
    $mycat = get_category($catid);
    $catid = $mycat->parent;
    array_push($allcats, $catid);
}
array_pop($allcats);
$allcats = array_reverse($allcats);
?>
    <?php foreach ($allcats as $catid): ?>
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"> <a href="<?php echo get_category_link($catid); ?>" itemprop="url"> <span itemprop="title"><?php echo get_cat_name($catid); ?></span> </a> &gt; </div>
    <?php endforeach; ?>
  </div>



</div>

<!--/kuzu-->
<div id="dendo"> </div>
<!-- /#dendo -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div style="padding:2px 0px;"></div>


  <!--ループ開始-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="kizi">
    <h1 class="entry-title">
      <?php the_title(); ?>
    </h1>




    <div class="blogbox" align="right">
      <p>

	<span class="kdate">

		<?php if ($mtime = get_mtime('Y/m/d')): ?>

		更新日：
		<time class="rewrite-date" datetime="<?php echo get_mtime('c');?>">
			<?php echo $mtime; ?>
		</time>
		<?php else: ?>

		<i class="fa fa-calendar"></i>：
		<time class="entry-date" datetime="<?php the_time('c');?>">
        	  <?php the_time('Y/m/d');?>
		</time>

		<?php endif;?>
	</span>
<span class="entry-views">
<?php if (function_exists('wpp_get_views')) { echo wpp_get_views( get_the_ID() ); } ?> views
</span>

	<br>

	<span class="tag-blogbox">
        <?php the_tags('', ''); ?>
	</span>
        <br>
      </p>
    </div>

<?php
  $url_encode = urlencode(get_permalink());
  $title_encode = urlencode(get_the_title());
?>

<div class="sns-top-btn sns-btn" id="sns-top-pc">

<a class="sns-btn-twitter" rel="nofollow" href=http://twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&via=manami1030&tw_p=tweetbutton><i class="fa fa-twitter"></i><br><span class="sns-btn-style"><?php if (function_exists('scc_get_share_twitter')) {
    echo (scc_get_share_twitter() == 0) ? '' : scc_get_share_twitter();
} ?></span></a>

<a rel="nofollow" class="sns-btn-facebook" href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="fa fa-facebook"></i><br><span class="sns-btn-style"><?php if (function_exists('scc_get_share_facebook')) {
    echo (scc_get_share_facebook() == 0) ? '' : scc_get_share_facebook();
} ?></span></a>

<a rel="nofollow" class="sns-btn-googleplus" href="https://plus.google.com/share?url=<?php echo $url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;"><i class="fa fa-google-plus"></i><br><span class="sns-btn-style"><?php if (function_exists('scc_get_share_gplus')) {
    echo (scc_get_share_gplus() == 0) ? '' : scc_get_share_gplus();
} ?></span></a>

<a rel="nofollow" class="sns-btn-hatebu" href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;"><i class="fa fa-hatena"></i><br><span class="sns-btn-style"><?php if (function_exists('scc_get_share_hatebu')) {
    echo (scc_get_share_hatebu() == 0) ? '' : scc_get_share_hatebu();
} ?></span></a>

<a rel="nofollow" class="sns-btn-pocket" href="http://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>"><span class="icon-pocket"></span><br><span class="sns-btn-style"><?php if (function_exists('scc_get_share_pocket')) {
    echo (scc_get_share_pocket() == 0) ? '' : scc_get_share_pocket();
} ?></span></a>

<?php if (is_mobile()) :?>

<a rel="nofollow" class="sns-btn-line" href="http://line.me/R/msg/text/?<?php echo $title_encode.'%0A'.$url_encode.'?ref=line';?>"><span class="icon-line"></span></a>

<?php else: ?>
<?php endif; ?>

</div>

<div style="padding:10px 0px;"></div>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 記事上レスポンシブ -->

<?php
if((is_single())&&(!in_category(array('156','178','168')))){
?>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="1155404633"
     data-ad-format="rectangle"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<div style="padding:10px 0px;"></div>
<?php
  }
?>

<div class="kizi single">


<?php if (is_mobile()) :?>
<?php else: ?>

  <?php get_template_part('sns02');?>

<?php endif; ?>



    <?php the_content(); ?>
    <?php
    $linkpagearg = array(
        'before' => '<p class="link_page">',
        'after' => '</p>',
        'link_before' => '<span>',
        'link_after' => '</span>',
        'next_or_number' => 'number',
        'separator' => ' ',
        'nextpagelink' => __('Next page'),
        'previouspagelink' => __('Previous page'),
        'pagelink' => '%',
        'echo' => 1,
    );
    wp_link_pages($linkpagearg); ?>


  <?php endwhile; else: ?>
  <p>記事がありません</p>
  <?php endif; ?>


<div style="padding:10px 0px;"></div>

<span class="prsankou">育児</span><a href="http://mama-hack.com/ergo-adapt">エルゴから新作抱っこひもが出ました。新生児から使える最強の抱っこ紐はこちら</a>
<p></p>

<?php
 if (in_category('147')) {
     ?>

<h3>【Perfume】新作アルバムが2年半ぶりに発売！</h3>
<p>2年半ぶりにPerfumeの新作アルバムが出ました！私も聴きましたがとても良かったです。</p>
<p>＼アルバムタイトルにもなっている「COSMIC EXPLORER」は必聴！／</p>

<div class="kaerebalink-box" style="text-align:left;padding-bottom:20px;font-size:small;/zoom: 1;overflow: hidden;"><div class="kaerebalink-image" style="float:left;margin:0 15px 10px 0;"><a href="http://c.af.moshimo.com/af/c/click?a_id=437650&p_id=170&pc_id=185&pl_id=4062&s_v=b5Rz2P0601xu&url=http%3A%2F%2Fwww.amazon.co.jp%2Fexec%2Fobidos%2FASIN%2FB01BRG63HE%2Fref%3Dnosim" target="_blank" rel="nofollow" ><img src="http://ecx.images-amazon.com/images/I/61IFhTAX5XL._SL160_.jpg" style="border: none;" /></a><img src="http://i.af.moshimo.com/af/i/impression?a_id=437650&p_id=170&pc_id=185&pl_id=4062" width="1" height="1" style="border:none;"></div><div class="kaerebalink-info" style="line-height:120%;/zoom: 1;overflow: hidden;"><div class="kaerebalink-name" style="margin-bottom:10px;line-height:120%"><a href="http://c.af.moshimo.com/af/c/click?a_id=437650&p_id=170&pc_id=185&pl_id=4062&s_v=b5Rz2P0601xu&url=http%3A%2F%2Fwww.amazon.co.jp%2Fexec%2Fobidos%2FASIN%2FB01BRG63HE%2Fref%3Dnosim" target="_blank" rel="nofollow" >COSMIC EXPLORER(初回限定盤A)(2CD+Blu-ray)</a><img src="http://i.af.moshimo.com/af/i/impression?a_id=437650&p_id=170&pc_id=185&pl_id=4062" width="1" height="1" style="border:none;"><div class="kaerebalink-powered-date" style="font-size:8pt;margin-top:5px;font-family:verdana;line-height:120%">posted with <a href="http://kaereba.com" rel="nofollow" target="_blank">カエレバ</a></div></div><div class="kaerebalink-detail" style="margin-bottom:5px;">Perfume Universal Music =music= 2016-04-06    </div><div class="kaerebalink-link1" style="margin-top:10px;"><div class="shoplinkamazon" style="margin:5px 0"><a href="http://c.af.moshimo.com/af/c/click?a_id=437650&p_id=170&pc_id=185&pl_id=4062&s_v=b5Rz2P0601xu&url=http%3A%2F%2Fwww.amazon.co.jp%2Fgp%2Fsearch%3Fkeywords%3DCOSMIC%2520EXPLORER%26__mk_ja_JP%3D%2583J%2583%255E%2583J%2583i" target="_blank" rel="nofollow" >Amazon</a><img src="http://i.af.moshimo.com/af/i/impression?a_id=437650&p_id=170&pc_id=185&pl_id=4062" width="1" height="1" style="border:none;"></div></div></div><div class="booklink-footer" style="clear: left"></div></div>
<?php

 };
?>

<?php
 if (in_category(array(102, 100, 99, 104, 101, 96))) {
     ?>
<h3>【PR】妊婦さんへ：葉酸は取れていますか？</h3>
<p>とくにつわりでつらい妊娠初期なんかは、赤ちゃんの体を作る上でもとても大事な時期です。赤ちゃんの頭や脳などが作られているんですね。<strong>そこで重要なのが、母親がきちんと栄養を取れているか？ということです。</strong></p>
<p>とくに<strong>「葉酸」</strong>をきちんと取ろうと言われていて、私もそれだけは親に言われてきちんと取っていました。食事があまりとれなくとも、この葉酸だけは取りましょう。というか、取ってほしいです。</p>
<p>なぜなら、この葉酸が不足すると、赤ちゃんの先天性異常（神経管閉鎖障害）が起こる可能性が高くなり、危険だからです。厚生労働省は、妊娠の可能性のある人にたいして、葉酸を摂取するように言っています。</p>
<p>そこで、数ある葉酸サプリの中でおすすめなのが、「ベルタ葉酸サプリ」です。</p>
<a href="http://px.a8.net/svt/ejp?a8mat=2BNVFY+123RHU+2M7O+NX735" target="_blank">
<img border="0" width="200" height="200" alt="" src="http://www23.a8.net/svt/bgt?aid=140521966064&wid=001&eno=01&mid=s00000012210004018000&mc=1"></a>
<img border="0" width="1" height="1" src="http://www10.a8.net/0.gif?a8mat=2BNVFY+123RHU+2M7O+NX735" alt="">
<p>安く売られている葉酸サプリも同じなのでは、と私も思っていたのですが、<strong>入っている栄養成分が全然違うようです。</strong>こちらは厚生労働省も推奨している栄養価の高い成分を配合していて、めちゃくちゃ売れている葉酸サプリなんですね。栄養士も推奨している、高品質な葉酸サプリです。雑誌「たまごクラブ」にも掲載されています。</p>
<p>赤ちゃんのためにも、つわりで食事は取れなくとも、こういった葉酸サプリはしっかり摂取しましょう。</p>
<p>↓↓</p>
<a href="http://px.a8.net/svt/ejp?a8mat=2BNVFY+123RHU+2M7O+NVHCY" target="_blank">妊娠中のママのための<br>☆ベルタ葉酸サプリ☆</a>
<img border="0" width="1" height="1" src="http://www19.a8.net/0.gif?a8mat=2BNVFY+123RHU+2M7O+NVHCY" alt="">
<?php

 };
?>

<?php
 if (in_category('105')) {
     ?>
<h3>こんなフリマアプリもあります</h3>
<p>楽天のやっている「ラクマ」というフリマアプリもあります。なんと現在出品手数料が無料♪</p>
<p>出品数も急増中です。</p>

<div id="appreach-box" style="text-align:left;">
    <img id="appreach-image" src="//lh3.googleusercontent.com/706n6rqkT_8O9teW9BA61Prp_YSO-qJEmwAqdWBBOQIJsBw5rbfGNAJ9q1UCWmx21A=w170" alt="フリマアプリ ラクマ - 出品手数料無料の楽天のフリマアプリ" style="float:left; margin:10px; width:25%; max-width:120px; border-radius:10%;" pagespeed_url_hash="248610482" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
    <div class="appreach-info" style="margin: 10px;">
        <div id="appreach-appname">フリマアプリ ラクマ - 出品手数料無料の楽天のフリマアプリ</div>
        <div id="appreach-developer" style="font-size:80%; display:inline-block; _display:inline;"></div>
        <div id="appreach-price" style="font-size:80%; display:inline-block; _display:inline;">無料</div>
        <div class="appreach-powered" style="font-size:80%; display:inline-block; _display:inline;">
            posted with <a href="http://mama-hack.com/app-reach/" title="アプリーチ" target="_blank" rel="nofollow">アプリーチ</a>
        </div>
        <div class="appreach-links" style="float: left;">
            <div id="appreach-itunes-link" style="display: inline-block; _display: inline;">
                <a id="appreach-itunes" href="https://t.adcrops.net/ad/p/r?_site=8154&amp;_article=23095&amp;_image=8952" target="_blank" rel="nofollow">
                    <img src="https://nabettu.github.io/appreach/img/itune_en.png" style="height:40px;" pagespeed_url_hash="179731595" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                </a>
            </div>
            <div id="appreach-gplay-link" style="display:inline-block; _display:inline;">
                <a id="appreach-gplay" href="https://t.adcrops.net/ad/p/r?_site=8154&amp;_article=23095&amp;_image=8952" target="_blank" rel="nofollow">
                    <img src="https://nabettu.github.io/appreach/img/gplay_en.png" style="height:40px;" pagespeed_url_hash="3445212709" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                </a>
            </div>
        </div>
    </div>
    <div class="appreach-footer" style="margin-bottom:10px; clear: left;"></div>
</div>

<?php
};
?>

<?php
if(has_tag('108')){
?>
<h3>大人気のディズニーゲームアプリ[PR]</h3>
<p>ディズニーツムツム、もうプレイした？</p>
<p>ミッキーやプーさん、ドナルドなど可愛いディズニーキャラのぬいぐるみを3つつなげて消すパズルゲーム♪</p>


<div id="appreach-box" style="text-align:left;">
    <img id="appreach-image" src="//lh3.googleusercontent.com/EDhag29Wlld36SQubs0Kb6ETo--i0i7KfL6zkaJWRyyyXJW46U1kmI0evSDBAhZrXRjw=w170" alt="LINE：ディズニー ツムツム" style="float:left; margin:10px; width:25%; max-width:120px; border-radius:10%;" pagespeed_url_hash="248610482" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
    <div class="appreach-info" style="margin: 10px;">
        <div id="appreach-appname">LINE：ディズニー ツムツム</div>
        <div id="appreach-developer" style="font-size:80%; display:inline-block; _display:inline;"></div>
        <div id="appreach-price" style="font-size:80%; display:inline-block; _display:inline;">無料</div>
        <div class="appreach-powered" style="font-size:80%; display:inline-block; _display:inline;">
            posted with <a href="http://mama-hack.com/app-reach/" title="アプリーチ" target="_blank" rel="nofollow">アプリーチ</a>
        </div>
        <div class="appreach-links" style="float: left;">
            <div id="appreach-itunes-link" style="display: inline-block; _display: inline;">
                <a id="appreach-itunes" href="https://t.adcrops.net/ad/p/r?_site=8154&_article=23395&_image=9060a" target="_blank" rel="nofollow">
                    <img src="https://nabettu.github.io/appreach/img/itune_en.png" style="height:40px;" pagespeed_url_hash="179731595" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                </a>
            </div>
            <div id="appreach-gplay-link" style="display:inline-block; _display:inline;">
                <a id="appreach-gplay" href="https://t.adcrops.net/ad/p/r?_site=8154&_article=23396&_image=9061" target="_blank" rel="nofollow">
                    <img src="https://nabettu.github.io/appreach/img/gplay_en.png" style="height:40px;" pagespeed_url_hash="3445212709" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                </a>
            </div>
        </div>
    </div>
    <div class="appreach-footer" style="margin-bottom:10px; clear: left;"></div>
</div>

<h3>ディズニーの映画が31日間無料で見られる[PR]</h3>

<p><a href="http://h.accesstrade.net/sp/cc?rk=0100fpqt00evbg" target="_blank" rel="nofollow">U-NEXT（ユーネクスト）</a>という動画配信サービスをご存知でしょうか？</p>

<p>Huluも有名ですが、ユーネクストが個人的にはおすすめです。</p>

<p>アナと雪の女王、ズートピアやトイ・ストーリー3など、<strong>ディズニー関連なんと70作品以上を、31日間無料</strong>で見ることができます。（31日間後は税別月額1990円）</p>

<p>スマホやパソコンなど、ネット環境があればどこでも見ることができます。</p>

<p><img src="http://mama-hack.com/wp-content/uploads/2015/03/397d7fc1f3baeea88493e83c96d8efe0.jpg" alt="ユーネクスト　ディズニー" width="800" height="439" class="alignleft size-full wp-image-5667" /></p>

<p><a href="https://www.amazon.co.jp/%E3%82%BA%E3%83%BC%E3%83%88%E3%83%94%E3%82%A2-%E5%90%B9%E6%9B%BF%E7%89%88-%E4%B8%8A%E6%88%B8-%E5%BD%A9/dp/B01I9D048M/ref=as_li_ss_il?ie=UTF8&qid=1475495778&sr=8-2&keywords=%E3%82%BA%E3%83%BC%E3%83%88%E3%83%94%E3%82%A2&linkCode=li3&tag=smanami1030-22&linkId=21e2c5ff53dbb83d818492b8fb625a42" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B01I9D048M&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=smanami1030-22" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=smanami1030-22&l=li3&o=9&a=B01I9D048M" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" /></p>

<p>我が家もズートピアを鑑賞しました。とても良い映画で、家族で楽しく鑑賞できました。1ヶ月無料なので、ぜひ登録してみてくださいね。</p>

<p><div class="cvr-btn"><a href="http://h.accesstrade.net/sp/cc?rk=0100fpqt00evbg" rel="nofollow" target="_blank">動画を見るならU-NEXT <img src="http://h.accesstrade.net/sp/rr?rk=0100fpqt00evbg" width="1" height="1" border="0" alt="" /></a></div></p>


<?php
};
?>



</div>


  <!--ループ終了-->



<?php if (is_mobile()) :?>


<div style="margin:0px 0px 0px -10px;">


</div>

      <div class="likeButton twList likeButton-bottom">

      <div class="likeButton-bottom-bg" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>')"></div>

        <div class="likeButton__cont">
          <div class="likeButton__a-cont">
            <div class="likeButton__a-cont__img" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>')"></div>
            <div class="likeButton__a-cont__btn">
              <p>この記事がよかったら<br>いいね！で最新情報お届け<br>ヽ(=´▽`=)ﾉ</p>
              <div class="likeButton__fb-cont likeButton__fb">
                <div class="fb-like" data-href="https://www.facebook.com/manamishibata.blog" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                <span class="likeButton__fb-unable"></span>
              </div>
            </div>
          </div>
	<div class="likeBtn-twline-area">
	<a rel="nofollow" href="https://twitter.com/manami1030" class="twitter-follow-btn"><i class="fa fa-twitter"></i> フォロー</a>
	<a rel="nofollow" href="http://line.me/ti/p/%40iwr5009y" class="line-follow-btn"><span class="icon-line"></span> 友だち追加</span>
</a>
</div>

        </div>



 </div>

<?php else: ?>

<div style="padding:10px 0px;"></div>


 <!-- 記事がよかったらいいね -->
            <div class="pclike__push">
              <div class="pclike__pushThumb" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>')"></div>
              <div class="pclike__pushLike">
                <p>この記事がよかったら<br>いいね！お願いします<br>ヽ(=´▽`=)ﾉ</p>
                <div class="pclike__pushButton">
<div class="fb-like" data-href="https://www.facebook.com/manamishibata.blog" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                </div>
                <p class="pclike__note">ままはっくの最新情報を<br>お届けします</p>
              </div>
            </div>

                        <div class="pclike__tw-follow">
              <div class="pclike__tw-follow__cont">
                <p class="pclike__tw-follow__item">Twitterでまなしばをフォローしよう！</p>
                <a rel="nofollow" href="https://twitter.com/manami1030" class="twitter-follow-button pclike__tw-follow__item" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @manami1030</a>

              </div>
</div>


 <!-- 記事がよかったらいいね　ここまで -->


<?php endif; ?>

<div style="padding:10px 0px;"></div>

<?php
if((is_single())&&(!in_category(array('156','178','168')))){
?>


  <?php if (is_mobile()) :?>
    <p></p>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- ままはっく記事下最下部 -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:336px;height:280px"
         data-ad-client="ca-pub-6958489098141860"
         data-ad-slot="5786984632"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <p></p>
    <!--      fluct グループ名「ままはっく（スマホ）_300×250_Web_インライン_記事下」      -->
    <script type="text/javascript" src="https://cdn-fluct.sh.adingo.jp/f.js?G=1000039529"></script>
    <!--      fluct ユニット名「ままはっく（スマホ）_300×250_Web_iOS_インライン_記事下」     -->
    <script type="text/javascript">
    //<![CDATA[
    if(typeof(adingoFluct)!="undefined") adingoFluct.showAd('1000060886');
    //]]>
    </script>
    <!--      fluct ユニット名「ままはっく（スマホ）_300×250_Web_Android_インライン_記事下」     -->
    <script type="text/javascript">
    //<![CDATA[
    if(typeof(adingoFluct)!="undefined") adingoFluct.showAd('1000060887');
    //]]>
    </script>
    <p></p>
  <?php else: ?>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- ままはっく記事下最下部 -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:336px;height:280px"
         data-ad-client="ca-pub-6958489098141860"
         data-ad-slot="5786984632"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

    <p></p>

    <!--      fluct グループ名「ままはっく：300×250（サイト下部）」      -->
    <script type="text/javascript" src="https://cdn-fluct.sh.adingo.jp/f.js?G=1000039556"></script>
    <!--      fluct ユニット名「ままはっく：300×250（サイト下部）」     -->
    <script type="text/javascript">
    //<![CDATA[
    if(typeof(adingoFluct)!="undefined") adingoFluct.showAd('1000060925');
    //]]>
    </script>
  <?php endif; ?>
<?php } ?>

<p></p>

<div class="kizi02">

<div id="related">

<h3><i class="fa fa-book"></i> 関連する記事</h3>


	<ul>
<?php
    $original_post = $post;
    $tags = wp_get_post_tags($post->ID);
    $tagIDs = array();
    if ($tags) {
        $tagcount = count($tags);
        for ($i = 0; $i < $tagcount; ++$i) {
            $tagIDs[$i] = $tags[$i]->term_id;
        }
        $args = array(
    'tag__in' => $tagIDs,
    'post__not_in' => array($post->ID),
    'showposts' => 5,
    'caller_get_posts' => 1,
    );
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) : $my_query->the_post();
            ?>
        <li>
         <span class="cat-thum">
           <a href="<?php the_permalink();
            ?>" title="<?php the_title();
            ?>の詳細へ"><?php
           if (has_post_thumbnail()) {
               the_post_thumbnail('thumbnail');
           } else {
               echo '<img src="'.get_bloginfo('template_url').'/images/no-image.gif" alt="hoge" />';
           };
            ?></a>
         </span>
                <a href="<?php the_permalink();
            ?>" rel="bookmark" title="<?php the_title_attribute();
            ?>"><?php the_title();
            ?></a>
        </li>
<?php endwhile;
            wp_reset_query();
            ?>
<?php
        } else {
            ?>
    関連する記事は見当たりません…
<?php
        }
    } ?>
	</ul>
</div>

<h3>この記事を書いている「まなしば」って誰？</h3>

<div class="ilink"><div class="midashi"><i class="fa fa-heart"></i>ブログで生計を立てています</div><p class="first"><a href="http://mama-hack.com/about" class="cf"><span class="ilink_inner"><img src="http://mama-hack.com/wp-content/uploads/2016/07/150928-4566-1.jpg" alt="ままはっく" scale="0"><span class="title">まなしばのプロフィールはこちら</span></span></a></p></div>


<?php get_template_part('sns');?>

<div style="padding:10px 0px;"></div>

<div style="padding:10px 0px;"></div>



<h3><i class="fa fa-edit"></i> こちらの記事もよく読まれています</h3>
<?php wp_related_posts()?>


<?php if (is_mobile()) :?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:390px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="2306840633"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<?php else: ?>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="6237512635"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>


<h3><i class="fa fa-trophy"></i> 今日の人気記事</h3>
<div class="ninki-post" align="center">

<?php if (function_exists('wpp_get_mostpopular')) {
    wpp_get_mostpopular('range=daily&limit=8&post_type=post&order_by=views&stats_comments=0&thumbnail_height=110&thumbnail_width=110&thumbnail_selection =usergenerated&stats_views=0');
} ?>
</div><!-- ninki post -->

<?php endif; ?>
<!-- 人気記事終わり -->

<p style="clear: left;"></p>
<!--ループ終了-->
<p> </p>


</div>

<p style="clear: left;"></p>

  <!--/エントリ-->

  <!--ページナビ　スマホなし-->
<?php if (is_mobile()) :?>
  <div class="p-navi clearfix">
<dl>
      <?php
        $prev_post = get_previous_post();
        if (!empty($prev_post)): ?>
       <dt>前記事</dt><dd><a href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo $prev_post->post_title; ?></a></dd>
      <?php endif; ?>
      <?php
        $next_post = get_next_post();
        if (!empty($next_post)): ?>
       <dt>次記事</dt><dd><a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo $next_post->post_title; ?></a></dd>
      <?php endif; ?>
</dl>
  </div>
<?php endif; ?>

<p style="clear: left;"></p>
<p style="clear: left;"></p>
</div>
</div>



<!-- END div.post -->
<?php get_footer(); ?>
