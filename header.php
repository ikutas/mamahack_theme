<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html lang="ja" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if(is_category()): ?>
<?php elseif(is_archive()): ?>
<meta name="robots" content="noindex">
<?php elseif(is_tag()): ?>
<meta name="robots" content="noindex">
<?php endif; ?>


<title>


<?php
global $page, $paged;
if(is_front_page()):
bloginfo('name');
elseif(is_single()):
wp_title('');
elseif(is_page()):
wp_title('');
elseif(is_archive()):
wp_title('|',true,'right');
bloginfo('name');
elseif(is_search()):
wp_title('-',true,'right');
elseif(is_404()):
echo'404 - ';
bloginfo('name');
endif;
if($paged >= 2 || $page >= 2):
echo'-'.sprintf('%sページ',
max($paged,$page));
endif;
?>
</title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="http://m.t-tu.com/wp-content/uploads/2014/07/mamahack_dotlogo.png" />

<!---css切り替え--->
<?php
if(strpos($_SERVER['HTTP_USER_AGENT'],'ipod')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false){
?>
<link rel="apple-touch-icon-precomposed" href="http://m.t-tu.com/wp-content/uploads/2014/07/mamahack_dotlogo2.png" />
<link rel="apple-touch-icon-precomposed" href="http://m.t-tu.com/wp-content/uploads/2014/07/android.png" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/smart.css" type="text/css" media="all" />
<?php
}else{
?>
<meta name="viewport" content="width=1024, maximum-scale=1, user-scalable=yes">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<?php
}
?>
<?php wp_head(); ?>


<link rel="author" href="https://plus.google.com/112193508553448280907/posts" />



<!--webフォント　Googleフォント読み込み-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/webfont/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/icomoon/style.css">
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Play:400,700' rel='stylesheet' type='text/css'>

<!--LINE ref検知-->
<script>
//URLの文字列を取得
function getQueryString(){
    var result = {};
    if( 1 < window.location.search.length ){
        var query = window.location.search.substring( 1 );
        var parameters = query.split( '&' );
        for( var i = 0; i < parameters.length; i++ ){
            var element = parameters[ i ].split( '=' );
            var paramName = decodeURIComponent( element[ 0 ] );
            var paramValue = decodeURIComponent( element[ 1 ] );
            result[ paramName ] = paramValue;
        }
    }
    return result;
}
var lineref = "http://line.me/";
if(getQueryString().ref == "line"){
    delete window.document.referrer;
    window.document.referrer = lineref;
    window.document.__defineGetter__('referrer', function () {
        return lineref;
    });
    window.history.pushState(null,null,document.location.origin + document.location.pathname);
}
</script>

<!--geogoole analyticsコード-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46198487-1', 'auto');
ga('require', 'displayfeatures');
ga('require', 'linkid', 'linkid.js');
  ga('send', 'pageview');

</script>

<!--OGP開始-->
<meta property="fb:app_id" content="592550390888614">
<meta property="og:locale" content="ja_JP">
<meta property="og:type" content="blog">
<meta name="twitter:card" content="summary_large_image">

<?php
if (is_single()){// 投稿記事
     if(have_posts()): while(have_posts()): the_post();
     echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'">';echo "\n";//抜粋から
     echo '<meta name="twitter:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'">';echo "\n";//抜粋から
     endwhile; endif;
     echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";//投稿記事タイトル
     echo '<meta name="twitter:title" content="'; the_title(); echo '">';echo "\n";//投稿記事タイトル
     echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";//投稿記事パーマリンク
     echo '<meta name="twitter:site" content="' ; the_permalink(); echo '">';echo "\n";//「一般設定」で入力したブログのURL
} else {//投稿記事以外（ホーム、カテゴリーなど）
     echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";//「一般設定」で入力したブログの説明文
     echo '<meta name="twitter:description" content="'; bloginfo('description'); echo '">'; echo "\n";//抜粋から
     echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";//「一般設定」で入力したブログのタイトル
     echo '<meta name="twitter:title" content="'; bloginfo('name'); echo '">';echo "\n";//投稿記事タイトル
     echo '<meta property="og:url" content="'; home_url('/'); echo '">';echo "\n";//「一般設定」で入力したブログのURL
     echo '<meta name="twitter:site" content="' ; home_url('/'); echo '">';echo "\n";//「一般設定」で入力したブログのURL
}
?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<?php
$str = $post->post_content;
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿記事に画像があるか調べる
if (is_single() or is_page()){//投稿記事か固定ページの場合
if (has_post_thumbnail()){//アイキャッチがある場合
     $image_id = get_post_thumbnail_id();
     $image = wp_get_attachment_image_src( $image_id, 'full');
     echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
     echo '<meta name="twitter:image" content="'.$image[0].'">';echo "\n";
} else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//アイキャッチは無いが画像がある場合
     echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
     echo '<meta name="twitter:image" content="'.$imgurl[2].'">';echo "\n";
} else {//画像が1つも無い場合
     echo '<meta property="og:image" content="http://mama-hack.com/wp-content/uploads/2016/09/mamahack_dot.png">';echo "\n";
     echo '<meta name="twitter:image" content="http://mama-hack.com/wp-content/uploads/2016/09/mamahack_dot.png">';echo "\n";
}
} else {//投稿記事や固定ページ以外の場合（ホーム、カテゴリーなど）
     echo '<meta property="og:image" content="http://mama-hack.com/wp-content/uploads/2016/09/mamahack_dot.png">';echo "\n";
     echo '<meta name="twitter:image" content="http://mama-hack.com/wp-content/uploads/2016/09/mamahack_dot.png">';echo "\n";
}
?>

<!--OGP完了-->

<meta name="google-site-verification" content="gp1gEZNEkaID9ymnAs_8-GBXZVUjUvNVYuniNjSvfQQ" />

<!--ページ分割正規化-->

<?php
global $paged, $wp_query;
if ( !$max_page )
$max_page = $wp_query->max_num_pages;
if ( !$paged )
$paged = 1;
$nextpage = intval($paged) + 1;
if ( null === $label )
$label = __( 'Next Page &raquo;' );
if ( !is_singular() && ( $nextpage <= $max_page ) )
{
?>
<link rel="next" href="<?php echo next_posts( $max_page, false ); ?>" />
<?php
}
global $paged;
if ( null === $label )
$label = __( '&laquo; Previous Page' );
if ( !is_singular() && $paged > 1  )
{
?>
<link rel="prev" href="<?php echo previous_posts( false ); ?>" />
<?php
}
?>
<!--ページ分割正規化ここまで-->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '499679120214540');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=499679120214540&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<!-- Bing webmastertool code -->
<meta name="msvalidate.01" content="2935ABAACE18C437DA1D94E883CA243B" />

</head>

<body <?php body_class(); ?>>


<div id="container">
<div id="header">
  <div id="header-in">
    <div id="h-l">
      <p class="sitename"><a href="<?php echo home_url(); ?>/"><img alt="ままはっく" src="http://mama-hack.com/wp-content/themes/stinger3ver20131023/images/mamahack_dot.png"></a></p>
      <?php if (is_home()) { ?>
      <h1 class="descr">
        <?php bloginfo('description'); ?>
      </h1>
      <?php } else { ?>
      <p class="descr">
        <?php bloginfo('description'); ?>
      </p>
      <?php } ?>
    </div>
    <!-- /#h-l -->
  </div>
  <!-- /#header-in -->
</div>
<!-- /#header -->
<div id="gazou">
  <div id="gazou-in">
    <?php if (is_home()) { ?>
    <?php //カスタムヘッダー画像// ?>
    <?php if(get_header_image()): ?>
    <p id="headimg"><img src="<?php header_image(); ?>" alt="*" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" /></p>
    <?php endif; ?>
    <?php } else { ?>
    <?php //カスタムヘッダー画像// ?>
    <?php if(get_header_image()): ?>
    <p id="headimg"><img src="<?php header_image(); ?>" alt="*" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" /></p>
    <?php endif; ?>
    <?php } ?>
  </div>
  <!-- /#gazou-in -->
</div>
<!-- /#gazou -->
<div class="clear"></div>

<?php
if(strpos($_SERVER['HTTP_USER_AGENT'],'ipod')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false){
?>


<!--  スマホ新記事上　広告入れるならここ　-->
<?php if (is_mobile()) :?>
<div style="margin:0px -10px;">


</div>
<div style="padding:0px 0px;"></div>

<?php else: ?>
<?php endif; ?>



<?php }else{ ?>

<!--pcnavi　PCの場合-->
<div class="smanone">
  <div id="navi-in2">
    <ul>
      <li><?php wp_nav_menu(array('theme_location' => 'navbar'));?></li>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<!--/pcnavi-->

<?php
}
?>
<!-- カード型記事 -->
<div id="wrap">
  <div id="wrap-in">

    <?php if(is_mobile()) { ?> <!-- スマホサイト用 -->
	<div id="main">
    <?php } else { ?> <!-- PCトップページ＆カテゴリページ -->
      <?php if(is_front_page() ): ?> <!-- トップページとカテゴリ#homemain -->
	<div id="homemain">
      <?php else :?> <!-- 他のページは元のまま -->
        <div id="main">
      <?php endif; ?>
    <?php } ?>
<!-- カード型記事終わり -->
