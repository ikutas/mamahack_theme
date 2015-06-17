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
?>
</div>
<p style="margin:10px 0px;"></p>


  <div id="breadcrumb">
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"> <a href="<?php echo home_url(); ?>" itemprop="url"> <span itemprop="title"><i class="fa fa-home"></i> ホーム</span> </a> &gt; </div>
    <?php $postcat = get_the_category(); ?>
    <?php $catid = $postcat[0]->cat_ID; ?>
    <?php $allcats = array($catid); ?>
    <?php
while(!$catid==0) {
    $mycat = get_category($catid);
    $catid = $mycat->parent;
    array_push($allcats, $catid);
}
array_pop($allcats);
$allcats = array_reverse($allcats);
?>
    <?php foreach($allcats as $catid): ?>
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
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="kizi">
    <h1 class="entry-title">
      <?php the_title(); ?>
    </h1>




    <div class="blogbox" align="right">
      <p><span class="kdate"><i class="fa fa-calendar"></i>：
        <time class="entry-date" datetime="<?php the_time('c') ;?>">
          <?php the_time('Y/m/d') ;?>
        </time>
        &nbsp;
        <?php if ($mtime = get_mtime('Y/m/d')) echo ' <i class="fa fa-repeat"></i>：' , $mtime; ?>
        </span><br>

	<span class="tag-blogbox">
        <?php the_tags('',''); ?>
	</span>
        <br>
      </p>
    </div>

<?php
  $url_encode=urlencode(get_permalink());
  $title_encode=urlencode(get_the_title());
?>

<div class="sns-top-btn sns-btn" id="sns-top-pc">

<a class="sns-btn-twitter" href=http://twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&via=manami1030&tw_p=tweetbutton><i class="fa fa-twitter"></i><br><span class="sns-btn-style"><?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></span></a>

<a class="sns-btn-facebook" href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="fa fa-facebook"></i><br><span class="sns-btn-style"><?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></span></a>

<a class="sns-btn-googleplus" href="https://plus.google.com/share?url=<?php echo $url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;"><i class="fa fa-google-plus"></i><br><span class="sns-btn-style"><?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'':scc_get_share_gplus(); ?></span></a>

<a class="sns-btn-hatebu" href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;"><i class="fa fa-hatena"></i><br><span class="sns-btn-style"><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></span></a>

<a class="sns-btn-pocket" href="http://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>"><span class="icon-pocket"></span><br><span class="sns-btn-style"><?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></span></a>

<?php if (is_mobile()) :?>

<a class="sns-btn-line" href="http://line.me/R/msg/text/?<?php echo $title_encode . '%0A' . $url_encode;?>"><span class="icon-line"></span></a>

<?php else: ?>
<?php endif; ?>

</div>


<div style="padding:10px 0px;"></div>


<div class="kizi single">



<?php if (is_mobile()) :?>
<?php else: ?>

  <?php get_template_part('sns02');?>

<?php endif; ?>



    <?php the_content(); ?>
    <?php wp_link_pages(); ?>


  <?php endwhile; else: ?>
  <p>記事がありません</p>
  <?php endif; ?>
</div>

  <!--ループ終了-->

<?php if (is_mobile()) :?>

      <div class="likeButton twList likeButton-bottom">


        <div class="likeButton__cont">
          <div class="likeButton__a-cont">
            <div class="likeButton__a-cont__img" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>')"></div>
            <div class="likeButton__a-cont__btn">
              <p>この記事がよかったら<br>いいね！で最新情報お届け<br>ヽ(=´▽`=)ﾉ</p>
              <div class="likeButton__fb-cont likeButton__fb">
                <div class="fb-like" data-href="https://www.facebook.com/manamishibata.blog" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                <span class="likeButton__fb-unable"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="twFollowUs__twitter">
          <div class="twFollowUs__twitter__cont">
            <p class="twFollowUs__twitter__item">Twitterでまなしばを</p>
            <a href="https://twitter.com/manami1030" class="twitter-follow-button twFollowUs__twitter__item" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @manami1030</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
          </div>
        </div>



<div id="line_atto">
<a href="http://line.me/ti/p/%40iwr5009y"><span class="icon-line"></span> LINEで友だちになる</a>
<span class="line_atto_ms">▲更新情報配信中。保育園とかブログ運営の相談受けてまーす。気軽に話しかけてくださいな( ´∀｀)bｸﾞｯ!</span>
</div>

 </div>
<?php else: ?>

<div style="padding:10px 0px;"></div>

 <!-- 記事がよかったらいいね -->
            <div class="pclike__push">
              <div class="pclike__pushThumb" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>')"></div>
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
                <a href="https://twitter.com/manami1030" class="twitter-follow-button pclike__tw-follow__item" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @manami1030</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
              </div>
</div>


 <!-- 記事がよかったらいいね　ここまで -->

<?php endif; ?>

<div style="padding:10px 0px;"></div>

<?php
//$catids = get_the_category();
//$catid = $catids[0];
//echo "<script>console.log('".$catid."');</script>";
// 12,69,34,131,146,147,の時に出す
?>

<a href="http://mama-hack.com/wimax" title="月額2000円台から！ワイマックス徹底比較。おすすめ順に紹介"><img src="http://mama-hack.com/wp-content/uploads/2015/05/234e4c131a79b4ca690e64d4533194d51.jpg" alt="月額2000円台から！ワイマックス徹底比較。おすすめ順に紹介" height="250" width="300"></a>

<?php if (is_mobile()) :?>


<p></p>
<!--スマホ300×250記事中adstir-->
<script type="text/javascript">
var adstir_vars = {
  ver    : "4.0",
  app_id : "MEDIA-ca90b81b",
  ad_spot: 1,
  center : false
};
</script>
<script type="text/javascript" src="http://js.ad-stir.com/js/adstir.js?20130527"></script>
<!--スマホ300×250記事中adstir-->

<p></p>

<?php else: ?>

<div style="float:left;">


<!--PC300×250記事下ダブルレクタングルadstir-->
<script type="text/javascript">
var adstir_vars = {
  ver    : "4.0",
  app_id : "MEDIA-6d4067c1",
  ad_spot: 4,
  center : false
};
</script>
<script type="text/javascript" src="http://js.ad-stir.com/js/adstir.js?20130527"></script>


</div>



<p style="clear:left"></p>

<?php endif; ?>

<div style="padding:10px 0px;"></div>

<?php get_template_part('sns');?>


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
        for ($i = 0; $i < $tagcount; $i++) {
            $tagIDs[$i] = $tags[$i]->term_id;
        }
    $args=array(
    'tag__in' => $tagIDs,
    'post__not_in' => array($post->ID),
    'showposts'=>4,
    'caller_get_posts'=>1
    );
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <li>
         <span class="cat-thum">
           <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>の詳細へ"><?php
           if ( has_post_thumbnail()) {
                the_post_thumbnail('thumbnail');
               } else {
              echo '<img src="'.get_bloginfo('template_url').'/images/no-image.gif" alt="hoge" />';
              };
           ?></a>
         </span>
            <h5>
                <a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h5>
	<p>
	<span class="shares">
<?php if(function_exists('scc_get_share_total')) echo (scc_get_share_total()==0)?'':scc_get_share_total(); ?> shares		</span>
	</p>
        </li>

<?php endwhile; wp_reset_query(); ?>
<?php } else { ?>
    関連する記事は見当たりません…
<?php } } ?>
	</ul>
</div>

<a href="<?php echo get_category_link($allcats[0]); ?>"><div class="category-btn">「<?php echo get_cat_name($allcats[0]); ?>」カテゴリの他の記事を見る</div></a>

<?php if (is_mobile()) :?>

<!--スマホ300×250記事下adstir-->
<script type="text/javascript">
var adstir_vars = {
  ver    : "4.0",
  app_id : "MEDIA-ca90b81b",
  ad_spot: 5,
  center : false
};
</script>
<script type="text/javascript" src="http://js.ad-stir.com/js/adstir.js?20130527"></script>



<?php else: ?>
<div style="padding-top:0px;"></div>

<div style="float:left;">

<!--PC300×250PC記事中adstir-->
<script type="text/javascript">
var adstir_vars = {
  ver    : "4.0",
  app_id : "MEDIA-6d4067c1",
  ad_spot: 1,
  center : false
};
</script>
<script type="text/javascript" src="http://js.ad-stir.com/js/adstir.js?20130527"></script>
<!--PC300×250PC記事中adstir-->

</div>

<div style="float:left; margin:0px 0px 0px 5px;">

<!--300×250PC記事下adstir-->
<script type="text/javascript">
var adstir_vars = {
  ver    : "4.0",
  app_id : "MEDIA-6d4067c1",
  ad_spot: 3,
  center : false
};
</script>
<script type="text/javascript" src="http://js.ad-stir.com/js/adstir.js?20130527"></script>

</div>

<p style="clear:left"></p>


<?php endif; ?>



<h3><i class="fa fa-edit"></i> こちらの記事もよく読まれています</h3>
<?php wp_related_posts()?>

<?php if (is_mobile()) :?>
<?php else: ?>
<div class="fb-like-box" data-href="https://www.facebook.com/manamishibata.blog" data-width="610" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>




<h3><i class="fa fa-trophy"></i> 今日の人気記事</h3>
<div class="ninki-post" align="center">

<?php if (function_exists('wpp_get_mostpopular')) wpp_get_mostpopular('range=daily&limit=8&post_type=post&order_by=views&stats_comments=0&thumbnail_height=110&thumbnail_width=110&thumbnail_selection =usergenerated&stats_views=0'); ?>
</div><!-- ninki post -->

<?php endif; ?>
<!-- 人気記事終わり -->
<p style="clear: left;"></p>
<!--ループ終了-->
<p> </p>


</div>

  <!--/エントリ-->

  <!--ページナビ　スマホなし-->
<?php if (is_mobile()) :?>

<?php else: ?>
  <div class="p-navi clearfix">
<dl>
      <?php
        $prev_post = get_previous_post();
        if (!empty( $prev_post )): ?>
       <dt>前記事</dt><dd><a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post->post_title; ?></a></dd>
      <?php endif; ?>
      <?php
        $next_post = get_next_post();
        if (!empty( $next_post )): ?>
       <dt>次記事</dt><dd><a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a></dd>
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
