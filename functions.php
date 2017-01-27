<?php
//アイキャッチサムネイル
add_theme_support('post-thumbnails');
add_image_size('thumb80', 80, 80, true);
add_image_size('thumb65', 100, 65, true);
add_image_size('thumb100', 100, 100, true);
add_image_size('thumb110', 110, 110, true);

//WordPress の投稿スラッグを自動的に生成する
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
    if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
        $slug = utf8_uri_encode($post_type).'-'.$post_ID;
    }

    return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);

//カスタムメニュー
register_nav_menus(array('navbar' => 'ナビゲーションバー'));

//カスタムヘッダー
$args = array(
     'width' => 986,
     'height' => 150,
        'flex-height' => true,
     'default-image' => get_template_directory_uri().'/images/stinger3.png',
);
add_theme_support('custom-header', $args);

//RSS
add_theme_support('automatic-feed-links');

//エディタスタイル
add_theme_support('editor-style');
add_editor_style('editor-style.css');
function custom_editor_settings($initArray)
{
    $initArray['body_class'] = 'editor-area';

    return $initArray;
}
add_filter('tiny_mce_before_init', 'custom_editor_settings');

//画像に重ねる文字の色
define('HEADER_TEXTCOLOR', '');

//画像に重ねる文字を非表示にする
define('NO_HEADER_TEXT', true);

//投稿用ファイルを読み込む
get_template_part('functions/create-thread');

//カスタム背景
add_theme_support('custom-background');

//ページャー機能
function pagination($pages = '', $range = 4)
{
    $showitems = 100;

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<div class="pagination">';
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo "<a href='".get_pagenum_link(1)."'>1</a>";
        }
        for ($i = 1; $i <= $pages; ++$i) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems

)) {
                echo ($paged == $i) ? '<span class="current">♥</span>' : "<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i.'</a>';
            }
        }

        if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) {
            echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        }
        echo "<script>$('.pagination')[0].scrollLeft = $('.pagination .current').position().left - 100;</script></div>\n";
    }
}

//ヘッダーを綺麗に
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');

//moreリンク
function custom_content_more_link($output)
{
    $output = preg_replace('/#more-[\d]+/i', '', $output);

    return $output;
}
add_filter('the_content_more_link', 'custom_content_more_link');

//セルフピンバック禁止
function no_self_ping(&$links)
{
    $home = home_url();
    foreach ($links as $l => $link) {
        if (0 === strpos($link, $home)) {
            unset($links[$l]);
        }
    }
}
add_action('pre_ping', 'no_self_ping');

//ウイジェット追加
if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(4)) {
    register_sidebars(1,
    array(
    'name' => 'サイドバー1',
    'before_widget' => '<ul><li>',
    'after_widget' => '</li></ul>',
    'before_title' => '<h4 class="menu_underh2">',
    'after_title' => '</h4>',
    ));
}
register_sidebars(1,
    array(
    'name' => 'スクロール広告用',
    'before_widget' => '<ul><li>',
    'after_widget' => '</li></ul>',
    'before_title' => '<h4 class="menu_underh2" style="text-align:left;">',
    'after_title' => '</h4>',
    ));
register_sidebars(1,
    array(
    'name' => 'Googleアドセンス用',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4 style="display:none">',
    'after_title' => '</h4>',
    ));

register_sidebars(1,
    array(
    'name' => 'Googleアドセンスのスマホ用width300',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4 style="display:none">',
    'after_title' => '</h4>',
    ));

//contents widthの指定
if (!isset($content_width)) {
    $content_width = 600;
}

//更新日の追加
function get_mtime($format)
{
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if ($ptime > $mtime) {
        return get_the_time($format);
    } elseif ($ptime === $mtime) {
        return;
    } else {
        return get_the_modified_time($format);
    }
}

//ショートコードを外す
function stinger_noshotcode($content)
{
    if (!preg_match('/\[.+?\]/', $content, $matches)) {
        return $content;
    }

    $content = str_replace($matches[0], '', $content);

    return $content;
}
function is_mobile()
{
    $useragents = array(
          'iPhone',               // iPhone
          'iPod',                    // iPod touch
          'Android',               // 1.5+ Android
          'dream',               // Pre 1.5 Android
          'CUPCAKE',          // 1.5+ Android
          'blackberry9500',     // Storm
          'blackberry9530',     // Storm
          'blackberry9520',     // Storm v2
          'blackberry9550',     // Storm v2
          'blackberry9800',     // Torch
          'webOS',               // Palm Pre Experimental
          'incognito',          // Other iPhone browser
          'webmate',               // Other iPhone browser
     );
    $pattern = '/'.implode('|', $useragents).'/i';

    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// 新着記事
function new_post_list($show_num)
{
    global $post;
    $args = array('posts_per_page' => $show_num);
    $myposts = get_posts($args);
    foreach ($myposts as $post) {
        setup_postdata($post);
        ?>
        <li><a href="<?php the_permalink();
        ?>"><?php the_post_thumbnail('thumb65');
        ?><?php the_title();
        ?></a></li>
        <?php

    }
    wp_reset_postdata();
}
// ランダム記事
function random_post_list($show_num)
{
    global $post;
    $args = array('posts_per_page' => $show_num, 'orderby' => 'rand');
    $myposts = get_posts($args);
    foreach ($myposts as $post) {
        setup_postdata($post);
        ?>
        <li><a href="<?php the_permalink();
        ?>"><?php the_post_thumbnail('thumb65');
        ?><?php the_title();
        ?></a></li>
        <?php

    }
    wp_reset_postdata();
}

// 引数に指定したカテゴリIDを親に持つサブカテゴリIDを取得する関数
function get_category_ID_just_below($cat_ID = null)
{
    global $wpdb;
    if ($cat_ID == null) {
        return false;
    }
    // サブカテゴリIDを取得する
    $sub_cat_IDs = $wpdb->get_col($wpdb->prepare("SELECT term_id FROM $wpdb->term_taxonomy WHERE parent=%d", $cat_ID));

    return $sub_cat_IDs;
}

// エラー対策
function remove_hentry($classes)
{
    $classes = array_diff($classes, array('hentry'));

    return $classes;
}

add_filter('post_class', 'remove_hentry');

//more位置へ挿入
add_filter('the_content', 'adMoreReplace');
function adMoreReplace($contentData)
{
    if (is_mobile()) {
        $adTags = <<< EOD

<div class="more_pr_area">
     <div class="more_pr_advert" style="font-size:0;">
     <p>SPONSORED LINK</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ままはっく記事上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="3877928637"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>

EOD
;
    } else {
        $adTags = <<< EOD
<div class="more_pr_area">
     <div class="more_pr_advert" style="font-size:0;">
     <p>SPONSORED LINK</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ままはっく記事上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="3877928637"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>

EOD
;
    }

    if ((is_single()) && (!in_category(array('156', '178', '168')))) {
        $contentData = preg_replace('/<p><span id="more-([0-9]+?)"><\/span>(.*?)<\/p>/i', $adTags, $contentData);
        $contentData = str_replace('', '', $contentData);
        $contentData = str_replace('', '', $contentData);
    }

    return $contentData;
}

//browser shots カスタマイズ
function browser_shot_target_blank($content)
{
    return str_replace('<div class="browser-shot"><a href="', '<div class="browser-shot"><a target="_blank" href="', $content);
}
add_filter('the_content', 'browser_shot_target_blank', 9999);

//ウィジェットカテゴリカスタマイズ
function theme_list_categories($output, $args)
{
    $replaced_text = preg_replace('/<\/a> \(([0-9]*)\)/', ' <span class="count">${1}</span></a>', $output);
    if ($replaced_text != null) {
        return $replaced_text;
    } else {
        return $output;
    }
}
add_filter('wp_list_categories', 'theme_list_categories', 10, 2);

/*****2番目の見出しタグの直前にアドセンスを埋め込むコード********/
add_filter('the_content', 'my_insert_ads_into_posts');
function my_insert_ads_into_posts($content)
{
    global $my_menu_name;
    if ((is_single()) && (!in_category(array('156', '178', '168')))) {
        $pc_ad_code = '
        <!--  アドセンス 記事上のレスポンシブ -->
            <div class="more_pr_area">
            <div class="more_pr_advert">
            <p>SPONSORED LINK</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ままはっく記事中 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="5354661838"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        </div></div>
';
        $sp_ad_code = '

<!--  アドセンス 記事上のレスポンシブ -->
                <div class="more_pr_area">
                <div class="more_pr_advert">
                <p>SPONSORED LINK</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ままはっく記事中 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="5354661838"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>        </div></div>
';
        if (is_mobile()) {
            return my_insert_before($content, 2, '<h2', $sp_ad_code);
        } else {
            return my_insert_before($content, 2, '<h2', $pc_ad_code);
        }

        return $content;
    } else {
        return $content;
    }
}

/*****3番目のh2タグの直前にアドセンスを埋め込むコード********/
add_filter('the_content', 'my_insert_ads_into_posts2');
function my_insert_ads_into_posts2($content)
{
    global $my_menu_name;
    if ((is_single()) && (!in_category(array('156', '178', '168')))) {
        $pc_ad_code = '<div class="more_pr_area">
    <div class="more_pr_advert">
    <p>SPONSORED LINK</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ままはっく記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="6831395033"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div></div>
';
        $sp_ad_code = '<div class="more_pr_area">
    <div class="more_pr_advert">
    <p>SPONSORED LINK</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ままはっく記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="6831395033"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div></div>
';
        if (is_mobile()) {
            return my_insert_before($content, 3, '<h2', $sp_ad_code);
        } else {
            return my_insert_before($content, 3, '<h2', $pc_ad_code);
        }

        return $content;
    } else {
        return $content;
    }
}

function my_insert_after($my_content, $my_ikutume, $my_kugiri, $my_insert)
{
    $kugirare_parts = explode($my_kugiri, $my_content);
    foreach ($kugirare_parts as $index => $kugirare_part) {
        if (trim($kugirare_part)) {
            $kugirare_parts[$index] .= $my_kugiri;
        }
        if ($my_ikutume == $index + 1) {
            $kugirare_parts[$index] .= $my_insert;
        }
    }

    return implode('', $kugirare_parts);
}
function my_insert_before($my_content, $my_ikutume, $my_kugiri, $my_insert)
{
    $kugirare_parts = explode($my_kugiri, $my_content);
    foreach ($kugirare_parts as $index => $kugirare_part) {
        if (trim($kugirare_part) && $index != 0) {
            $kugirare_parts[$index] = $my_kugiri.$kugirare_parts[$index];
        }
        if ($my_ikutume == $index) {
            $kugirare_parts[$index] = $my_insert.$kugirare_parts[$index];
        }
    }

    return implode('', $kugirare_parts);
}

function showads()
{
    return '<div class="more_pr_area">
    <div class="more_pr_advert">
    <p>SPONSERD LINK</p><!--記事下アドセンス-->
<style>
.my_adslot { width: 336px; height: 280px; }
@media(min-width: 500px) { .my_adslot { width: 336px; height: 280px; } }
@media(min-width: 800px) { .my_adslot { width: 336px; height: 280px; } }
</style>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 記事下レスポンシブ -->
<ins class="adsbygoogle my_adslot"
     style="display:inline-block"
     data-ad-client="ca-pub-6958489098141860"
     data-ad-slot="8525077434"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div></div>';
}

add_shortcode('adsense', 'showads');

add_filter('ppp_nonce_life', 'my_nonce_life');
function my_nonce_life()
{
    return 60 * 60 * 24 * 14;    // 14 日間（秒×分×時間×日）
}

//$is_ipadを追加
function is_ipad()
{
    $is_ipad = (bool) strpos($_SERVER['HTTP_USER_AGENT'], 'iPad');
    if ($is_ipad) {
        return true;
    } else {
        return false;
    }
}

//$is_iphoneか$is_ipadがtrueの場合にwp_headにCSSを出力
if ($is_iphone or $is_ipad) {
    function noHoverForIos()
    {
        echo '<style>.hover{opacity:1 !important;}</style>';
    };
    add_action('wp_head', 'noHoverForIos');
}

//コンタクトフォーム7の読み込みを軽くする
function my_contact_enqueue_scripts()
{
    wp_deregister_script('contact-form-7');
    wp_deregister_style('contact-form-7');
    if (is_page('contact')) {
        if (function_exists('wpcf7_enqueue_scripts')) {
            wpcf7_enqueue_scripts();
        }
        if (function_exists('wpcf7_enqueue_styles')) {
            wpcf7_enqueue_styles();
        }
    }
}
add_action('wp_enqueue_scripts', 'my_contact_enqueue_scripts');

//カテゴリー説明文でHTMLタグを使う
remove_filter('pre_term_description', 'wp_filter_kses');

// 不要なコードをまとめて削除
// WordPressのバージョン情報
remove_action('wp_head', 'wp_generator');
// ブログ投稿ツール用
remove_action('wp_head', 'rsd_link');
// デフォルトURLの表記
remove_action('wp_head', 'wp_shortlink_wp_head');
// Windows Live Writer用
remove_action('wp_head', 'wlwmanifest_link');

//AMP判別関数
function is_amp()
{
    //AMPチェック
  $is_amp = false;
    if (function_exists('is_amp_endpoint') && is_amp_endpoint()) {
        $is_amp = true;
    }

    return $is_amp;
}

// AMPのscriptを制御
add_action('amp_post_template_data', 'my_amp_post_custom_add_script');
function my_amp_post_custom_add_script($data)
{
    $content = $data['post_amp_content'];

    // YouTube
    if (preg_match('/<amp-youtube[^<]*?<\/amp-youtube>/iu', $content)) {
        $data['amp_component_scripts']['amp-youtube'] = 'https://cdn.ampproject.org/v0/amp-youtube-0.1.js';
    }
    // Twitter
    if (preg_match('/<amp-twitter[^<]*?<\/amp-twitter>/iu', $content)) {
        $data['amp_component_scripts']['amp-twitter'] = 'https://cdn.ampproject.org/v0/amp-twitter-0.1.js';
    }
    // Twitter
    if (preg_match('/<amp-twitter[^<]*?<\/amp-twitter>/iu', $content)) {
        $data['amp_component_scripts']['amp-twitter'] = 'https://cdn.ampproject.org/v0/amp-twitter-0.1.js';
    }
    // instagram
    $data['amp_component_scripts']['amp-instagram'] = 'https://cdn.ampproject.org/v0/amp-instagram-0.1.js';

    // 全てのページで使うことが分かっている
    $data['amp_component_scripts']['amp-carousel'] = 'https://cdn.ampproject.org/v0/amp-carousel-0.1.js';
    $data['amp_component_scripts']['amp-ad'] = 'https://cdn.ampproject.org/v0/amp-ad-0.1.js';
    $data['amp_component_scripts']['amp-analytics'] = 'https://cdn.ampproject.org/v0/amp-analytics-0.1.js';

    return $data;
}

function convert_content_to_amp_sample($the_content)
{
  if (!is_amp()) {
      return $the_content;
  }
  // Instagramをamp-instagramに置換する
  $pattern = '/<blockquote class="instagram-media".+?"https:\/\/www.instagram.com\/p\/(.+?)\/".+?<\/blockquote>/is';
  $append = '<p><amp-instagram layout="responsive" data-shortcode="$1" width="600" height="600" ></amp-instagram></p>';
  $the_content = preg_replace($pattern, $append, $the_content);

  // スクリプトを除去する
  $pattern = '/<script.+?<\/script>/is';
  $append = '';
  $the_content = preg_replace($pattern, $append, $the_content);

  // 目次を除去する
  $pattern = '/<div id="toc_container".+?<\/div>/is';
  $append = '';
  $the_content = preg_replace($pattern, $append, $the_content);

  // adsenseを差し替える
  $pattern = '/<ins class="adsbygoogle".+?><\/ins>/is';
  $append = '<amp-ad $1></amp-ad>';
  $the_content = preg_replace($pattern, $append, $the_content);

  return $the_content;
}
add_filter('the_content', 'convert_content_to_amp_sample', 999999999);

add_action('amp_post_template_css', 'my_amp_post_custom_add_css');
function my_amp_post_custom_add_css($amp_template)
{
    if (!is_amp()) {
        return false;
    }
    include get_template_directory().'/minify.css';
    include get_template_directory().'/amp/amp.css';
}

add_filter( 'amp_post_template_analytics', 'my_amp_add_custom_analytics' );
function my_amp_add_custom_analytics( $analytics ) {
    if ( ! is_array( $analytics ) ) {
        $analytics = array();
    }

    // https://developers.google.com/analytics/devguides/collection/amp-analytics/
    $analytics['my-googleanalytics'] = array(
        'type' => 'googleanalytics',
        'attributes' => array(
            // 'data-credentials' => 'include',
        ),
        'config_data' => array(
            'vars' => array(
              'account' => "UA-46198487-1"
            ),
            'triggers' => array(
                'trackPageview' => array(
                    'on' => 'visible',
                    'request' => 'pageview',
                ),
            ),
        ),
    );
    return $analytics;
}
?>
