  <?php
if(have_comments()):
?>
  <h3 id="resp"><i class="fa fa-comments"></i>&nbsp; コメント欄</h3>
  <ol class="commets-list">
    <?php wp_list_comments('avatar_size=55'); ?>
  </ol>
  <?php
endif;
$args=array('title_reply' => '<i class="fa fa-comments"></i>&nbsp; Message',
'
lavel_submit' => ('Submit Comment')
);
//comment_form($args);
comment_form();
?>

<!-- END div#comments -->
