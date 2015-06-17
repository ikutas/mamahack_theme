<!--ここにgoogleアドセンスコードを貼ると規約違反になるので注意して下さい-->
<?php if ( function_exists('is_mobile') && is_mobile() ) :?> 
<?php else: ?>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
<?php endif; ?>
<?php endif; ?>