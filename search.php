<?php get_header(); ?>

<div class="post"> 
  <!--ループ開始-->
  <h2> 
    <!--検索結果数--> 
    「<?php echo esc_html($s); ?>」の検索結果
    <?php $mySearch =& new WP_Query("s=$s & showposts=-1"); echo $mySearch->post_count; ?>
    件 
    <!--検索結果数終わり--> 
  </h2>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="entry">
    <div class="sumbox">
      <?php the_post_thumbnail( array(150, 150) ); ?>
    </div>
    <!-- /.sumbox -->
    <div class="entry-content">
      <h3 class="entry-title-ac"> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
        </a></h3>
      <p><?php echo mb_substr(get_the_excerpt(), 0, 35); ?>...</p>
      <p><a class="more-link" href="<?php the_permalink() ?>">続きを見る</a></p>
      <div class="blog_info contentsbox">
        <ul class="clearfix">
          <li class="cal">
            <i class="fa fa-calendar"></i>　<?php the_time('Y/m/d') ?>
          </li>
          <li class="cat">
            <i class="fa fa-folder"></i> <?php the_category(', ') ?>
          </li>
          <li class="tag">
            <i class="fa fa-tag"></i> <?php the_tags('', ', '); ?>
          </li>
        </ul>
      </div>
    </div>
    <!-- .entry-content -->
    <div class="clear"></div>
  </div>
  <!--/entry-->
  <?php endwhile; else: ?>
  <p>申し訳ありません。探している記事は現在ありません。</p>
  <?php endif; ?>
  <div style="padding:20px 0px;">
    <?php get_template_part('ad');?>
  </div>
  <!--ページナビ-->
  <?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
  <!--ループ終了--> 
</div>
<!-- END div.post -->
<?php get_footer(); ?>
