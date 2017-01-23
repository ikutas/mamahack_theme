<?php get_header(); ?>


<div class="kuzu">
<?php /*--- パンくずリスト --- */ ?>

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
  <!--ループ開始-->
  <h2>
    <!--検索結果数-->
    「<?php echo esc_html($s); ?>」の検索結果
    <?php $mySearch = new WP_Query("s=$s & showposts=-1"); echo $mySearch->post_count; ?>
    件
    <!--検索結果数終わり-->
  </h2>

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
		<span class="entry-date"><i class="fa fa-calendar"></i> <?php the_time('Y/m/d') ?></span><div class="cat-smart">
<?php
foreach((get_the_category()) as $cat) {
$cat_id = $cat->cat_ID ;
break ;
}
$category_link = get_category_link( $cat_id );
?>
<a href="<?php echo $category_link; ?>" title="<?php echo $cat->cat_name; ?>"> <?php echo $cat->cat_name; ?></a>
</div>


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
	        <?php endif; ?>

      </div>
      <!-- .entry-content -->

      <div class="clear"></div>
    </div>
  </div>
  <!--/entry-->

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
