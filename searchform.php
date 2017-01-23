<div id="search">
  <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
    <label class="hidden" for="s">
      <?php _e('', 'kubrick'); ?>
    </label>
    <input type="text" value="<?php the_search_query(); ?>"  name="s" id="s" />
    <!--input type="image" src="http://mama-hack.com/wp-content/uploads/2014/06/btn2.gif" alt="検索" id="searchsubmit"  value="<?php _e('Search', 'kubrick'); ?>" /-->
    <button id="searchsubmit"  value="<?php _e('Search', 'kubrick'); ?>" ></button>
  </form>
</div>
