<?php get_header(); ?>

<div class="post kizi">


  <!--ループ開始-->
  <div id="dendo"> </div>
  <!-- /#dendo! -->


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();$loop_count++; ?>

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
		<h5><span class="entry-date"><i class="fa fa-calendar"></i> <?php the_time('Y/m/d') ?></span>
<div class="cat-smart">
<?php
foreach((get_the_category()) as $cat) {
$cat_id = $cat->cat_ID ;
break ;
}
$category_link = get_category_link( $cat_id );
?>
<a href="<?php echo $category_link; ?>" title="<?php echo $cat->cat_name; ?>"> <?php echo $cat->cat_name; ?></a>
</div>
</h5>
      <?php if (!(function_exists('is_mobile') && is_mobile())) :?>
		<h3 class="entry-title-ac">
      <?php else: ?>
    <h3 class="entry-title-smart">
    <?php endif;?>
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
		</a></h3>

		<?php if ( function_exists('is_mobile') && is_mobile() ) :?>
		<!--携帯の時はシェアカウントだけ-->
	<span class="shares">
<?php if(function_exists('scc_get_share_total')) echo (scc_get_share_total()==0)?'':scc_get_share_total().' shares'; ?> 		</span>

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
	<br><!--消すやつ-->
    <div class="clear"></div>
  </div>

  <!--/entry-->

<?php if ( $loop_count == 3 || $loop_count == 7 || $loop_count == 11 ) : ?>

<?php if(is_mobile()) { ?>

	<div class="more_pr_area">
	<div class="more_pr_advert">
	<p>スポンサードリンク</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 336×280 PCトップページ（３つ） -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="5672497439"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div></div>

<?php } else { ?>

	<div class="more_pr_area-top">
	<div class="more_pr_advert-top">
	<p>スポンサードリンク</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 336×280 PCトップページ（３つ） -->
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

<?php if (is_mobile()) :?>
<?php else: ?>

  <?php get_template_part('sns02');?>

<?php endif; ?>

  <!--ページナビ-->

  <?php if (function_exists("pagination")) {
pagination($wp_query->max_num_pages);
} ?>



  <!--ループ終了-->
</div>
<!-- END div.post -->
<?php get_footer();
