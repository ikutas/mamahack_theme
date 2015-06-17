<?php get_header(); ?>

<div class="post"> 
  
  <!--ループ開始-->
  <div id="dendo"> </div>
  <!-- /#dendo -->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="entry">
    <div class="sumbox"> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
      <?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
      <?php
$title= get_the_title();
if ( function_exists('is_mobile') && is_mobile() ) :
the_post_thumbnail('thumb80');
//the_post_thumbnail(array( 80,80 ),
//array( 'alt' =>$title, 'title' => $title));
else:
the_post_thumbnail(array( 150,150 ),
array( 'alt' =>$title, 'title' => $title)); ?>
      <?php else: // サムネイルを持っていないときの処理 ?>
      <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="150" height="150" />
      <?php endif; ?>
      </a> </div>
    <!-- /.sumbox -->
    
    <div class="entry-content">
      <h3 class="entry-title-ac"> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
        </a></h3>
      <div class="blog_info contentsbox">
        <p>
          <?php the_time('Y/m/d') ?>
          |
          <?php the_category(' ') ?>
          <?php the_tags(' '); ?>
        </p>
      </div>
      <p class="dami"><?php echo mb_substr(get_the_excerpt(), 0, 0); ?>...</p>
      <p class="motto"><a class="more-link" href="<?php the_permalink() ?>">続きを見る</a></p>
    </div>
    <!-- .entry-content -->
    
    <div class="clear"></div>
  </div>
  <!--/entry-->
  
  <?php endwhile; else: ?>
  <p>記事がありません</p>
  <?php endif; ?>
  
  <!--ページナビ-->
  
  <?php if (function_exists("pagination")) {
pagination($wp_query->max_num_pages);
} ?>
  
  <!--ループ終了--> 
</div>
<!-- END div.post -->
<?php get_footer(); ?>
