<?php get_header(); ?>

<div class="kuzu">
<?php /*--- パンくずリスト --- */ ?>

<div class="entry-head-related">
このカテゴリの人気記事<br>
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
<p>

<div id="breadcrumb">
<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="<?php echo home_url(); ?>" itemprop="url">
<span itemprop="title"><i class="fa fa-home"></i> ホーム</span>
</a> &rsaquo;
</div>
<?php /*--- カテゴリーが階層化している場合に対応させる --- */ ?>
<?php $catid = $cat; /* 表示中のカテゴリーIDをセット */ ?>
<?php $allcats = array(); /* 親カテゴリーをセットする配列を初期化しておく */ ?>
<?php 
while(!$catid==0) {    /* すべてのカテゴリーIDを取得し配列にセットするループ */
    $mycat = get_category($catid);     /* カテゴリーIDをセット */
    $catid = $mycat->parent;     /* 上で取得したカテゴリーIDの親カテゴリーをセット */
    array_push($allcats, $catid);
}
array_pop($allcats);
$allcats = array_reverse($allcats);
?>
<?php /*--- 親カテゴリーがある場合は表示させる --- */ ?>
<?php foreach($allcats as $catid): ?>
<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="<?php echo get_category_link($catid); ?>" itemprop="url">
<span itemprop="title"><?php echo get_cat_name($catid); ?></span>
</a> &rsaquo;
</div>
<?php endforeach; ?>
<?php /*--- 最下層のカテゴリ名を表示 --- */ ?>
<div><?php single_cat_title(); ?></div>
</div>    <!--- end [breadcrumb] -->
</div>

<div class="post"> 


  <h2>「
    <?php if( is_category() ) { ?>
    <?php single_cat_title(); ?>
    <?php } elseif( is_tag() ) { ?>
    <?php single_tag_title(); ?>
    <?php } elseif( is_tax() ) { ?>
    <?php single_term_title(); ?>
    <?php } elseif (is_day()) { ?>
    日別アーカイブ：<?php echo get_the_time('Y年m月d日'); ?>
    <?php } elseif (is_month()) { ?>
    月別アーカイブ：<?php echo get_the_time('Y年m月'); ?>
    <?php } elseif (is_year()) { ?>
    年別アーカイブ：<?php echo get_the_time('Y年'); ?>
    <?php } elseif (is_author()) { ?>
    投稿者アーカイブ：<?php echo esc_html(get_queried_object()->display_name); ?></h2>
  <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    ブログアーカイブ
    <?php } ?>
  」記事一覧
  </h2>

<?php
	if(is_category()){
		//表示中のカテゴリページのカテゴリIDを取得
		$category = get_category(get_query_var('cat'));
		$current_cat_ID = $category->cat_ID;
		//カテゴリIDから現在表示中のカテゴリの説明文を取得
		$description = strip_tags(category_description($current_cat_ID));
		//説明文が空でなければ、meta descriptionとして説明文を表示
		if($description){
	?>
	<div><?php echo $description ?></div>
<?php } }?>

  <div style="padding:10px 0px;"></div>

<!-- 子カテゴリ表示 -->

<?php
	if(is_category()){
		//表示中のカテゴリページのカテゴリIDを取得
		$category = get_category(get_query_var('cat'));
		$current_cat_ID = $category->cat_ID;
		$sub_cat_IDs = get_category_ID_just_below($current_cat_ID);
		if($sub_cat_IDs) {
	?>
	  	このカテゴリには、以下のサブカテゴリがあります。
	    <ul>
	  		<?php
				// ループでサブカテゴリのリンクを生成
				foreach($sub_cat_IDs as $sub_cat_ID) :
			?>
		  		<li><a href="<?php echo get_category_link($sub_cat_ID); ?>"><?php echo get_catname($sub_cat_ID); ?></a></li>
			<?php endforeach; ?>
		</ul>
<?php }} ?>


<!-- 記事上アドセンス -->
<?php if (is_mobile()) : ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- スマホ記事上（アーカイブ、固定ページ） -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="2445524639"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<div style="padding:40px 0px;"></div>

<?php else: ?>

	<div class="more_pr_area">
	<div class="more_pr_advert">
	<p>SPONSERD LINK</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- PC記事上（アーカイブ、固定ページ） -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="5962647838"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</div>
	</div>
<?php endif; ?>




  <!--ループ開始-->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();$loop_count++; ?>

  <div class="kizi">
    <div class="entry">

      <div class="sumbox"
	<?php if ( function_exists('is_mobile') && is_mobile() ) :?>style="float:left;"<?php endif; ?>
	　> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
      <?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
<?php if ( function_exists('is_mobile') && is_mobile() ) :?>
<?php
the_post_thumbnail( 'thumb80' );
?>
<?php else: ?>
      <?php
$title= get_the_title();
//the_post_thumbnail( 'thumb150' );
the_post_thumbnail(array( 150,150 ),
array( 'alt' =>$title, 'title' => $title)); ?>
<?php endif; ?>
      <?php else: // サムネイルを持っていないときの処理 ?>
      <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="150" height="150" />
      <?php endif; ?>
      </a> </div>
    <!-- /.sumbox -->
    
    <div class="entry-content">
		<h5><span class="entry-date"><i class="fa fa-calendar"></i> <?php the_time('Y/m/d') ?></span><div class="cat-smart">
<?php
$cats = get_the_category();
$cat = $cats[0];
if($cat->parent){
$parent = get_category($cat->parent);
echo $parent->cat_name;
}else{
echo $cat->cat_name;
}
?>
</div>
</h5>

      <?php if (!(function_exists('is_mobile') && is_mobile())) :?>
		<h3 class="entry-title-ac">
      <?php else: ?>
    <h1 class="entry-title-smart">
    <?php endif;?>
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
		</a></h3>
		
		<?php if ( function_exists('is_mobile') && is_mobile() ) :?>

		<!--携帯の時はシェアカウントだけ-->
	<span class="shares">
<?php if(function_exists('scc_get_share_total')) echo (scc_get_share_total()==0)?'':scc_get_share_total().' shares'; ?> 	</span>

		<?php else: ?>
      <div class="blog_info contentsbox">
        <p>
	<span class="shares">
<?php if(function_exists('scc_get_share_total')) echo (scc_get_share_total()==0)?'':scc_get_share_total().' shares'; ?> 		</span>&nbsp;
	<span class="tag-blogbox">
        <?php the_tags('',''); ?>
	<span>
        </p>
      </div>
      <p class="dami"><?php echo mb_substr( strip_tags( stinger_noshotcode( $post->post_content ) ), 0, 0 ) . ''; ?></p>
      <p class="motto"><a class="more-link" href="<?php the_permalink() ?>">記事を見る</a></p>
	        <?php endif; ?>

      </div>
      <!-- .entry-content -->
      
      <div class="clear"></div>
    </div>
  </div>
  <!--/entry-->
  <?php if ( $loop_count == 4 || $loop_count == 8 ) : ?>

<?php if(is_mobile()) { ?>

	<div class="more_pr_area">
	<div class="more_pr_advert">
	<p>SPONSERD LINK</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- スマホ記事上（アーカイブ、固定ページ） -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="2445524639"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>

<?php } else { ?>

	<div class="more_pr_area">
	<div class="more_pr_advert">
	<p>SPONSERD LINK</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- PCトップページ上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="5672497439"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>

<?php } ?>
<?php endif; ?>

  <?php endwhile; else: ?>
  <p>記事がありません</p>
  <?php endif; ?>
  <div style="padding:5px 0px;">
    <?php get_template_part('ad');?>
  </div>
  
  <!--ページナビ-->
  <?php if (function_exists("pagination")) {
pagination($wp_query->max_num_pages);
} ?>
  <!--ループ終了--> 
</div>
<!-- END div.post -->
<?php get_footer(); ?>