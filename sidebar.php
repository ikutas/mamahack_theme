<div id="side">
  <div class="sidead">  </div>

  <div class="kizi02"> 
    <div id="twibox">
      <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
      <?php endif; ?>
    </div>
  </div>
 
  <!--/kizi--> 

  <!--only mobile-->
  <div style="text-align:left;">
	  <?php if ( function_exists('is_mobile') && is_mobile() ) :
	//else:  
	get_template_part('ad');
	  endif; ?>
</div>
  <!--only mobile-->


  <!--アドセンス-->
  <div id="ad1">
    <div style="text-align:left;">
      <?php get_template_part('scroll-ad');?>
    </div>
  </div>

</div>
<!-- /#side -->