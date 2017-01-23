<?php get_header(); ?>

<div class="post">
  <!--ループ開始-->
  <div class="kizi">

  <h1 class="entry-title">あなたがアクセスしようとしたページは削除されたかURLが変更されています。</h1>
<img src="http://mama-hack.com/wp-content/uploads/2015/12/naki_mini1.jpg" alt="naki_mini" width="546" height="364" class="alignleft size-full wp-image-4655" />
  <p><p>いつも<a href="http://mama-hack.com">ままはっく</a>をご覧頂きありがとうございます。大変申し訳ないのですが、あなたがアクセスしようとしたページは削除されたかURLが変更されています。お手数をおかけしますが、以下の方法からもう一度目的のページをお探し下さい。</p></p>

<h2>１．検索して見つける</h2>
検索ボックスにお探しのコンテンツに該当するキーワードを入力して下さい。それに近いページのリストが表示されます。<p><p>
<div id="search-box"><form action="http://www.google.com/cse" id="cse-search-box"><div><input type="hidden" name="cx" value="012971817497677167156:ko26ouk3xne" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="text" name="q" />
<input type="submit" name="sa" value="記事検索" /></div></form></div><script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=ja"></script><p />
</p></p>

<h2>２．最新記事一覧から探す</h2>
新着記事のなかに、読みたい記事はありませんか？
<!--最近のエントリ-->
    <div id="topnews">
      <div>
<?php
$args = array(
    'posts_per_page' => 10,
);
$st_query = new WP_Query($args);
?>

<?php if ($st_query->have_posts()): ?>
    <?php while ($st_query->have_posts()) : $st_query->the_post(); ?>
<dl><dt><span><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        <?php if (has_post_thumbnail()): // サムネイルを持っているときの処理 ?>
    <?php the_post_thumbnail('thumb100'); ?>
<?php else: // サムネイルを持っていないときの処理 ?>
    <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="80" height="80" />
        <?php endif; ?>
        </a></span></dt><dd><span class="date"><?php echo get_post_time('Y.m.d D'); ?></span><br />
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

</dd>
<p class="clear"></p>
</dl>
    <?php endwhile; ?>
<?php else: ?>
    <p>記事はありませんでした</p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
        <p class="motto"> <a href="<?php echo home_url(); ?>/">→もっと見る</a></p>
      </div>
    </div>
<!--/最近のエントリ-->

<h2>２．人気記事一覧から探す</h2>
人気記事のなかに、読みたい記事はありませんか？
<?php if (function_exists('wpp_get_mostpopular')) {
    $args = 'limit=10&
 range=monthly&
 order_by=views&
 thumbnail_width=100&
 thumbnail_height=100&
 stats_views=0&
 stats_comments=0';
    wpp_get_mostpopular($args);
} ?>

  <div style="padding:20px 0px;"></div>
<h2>３．カテゴリーから見つける</h2>
  <!-- カテゴリー一覧を表示 -->
  <p>それぞれのカテゴリーのトップページからもう一度目的のページをお探しになってみて下さい。</p>
  <ul>
  <?php
    wp_list_categories(
      array(
        'title_li' => '',
        'depth' => 1,
      )
    );
  ?>
  </ul>
  <div style="padding:20px 0px;">

    <?php get_template_part('ad');?>
  </div>
</div>
</div>
<!-- END div.post -->
<?php get_footer(); ?>
