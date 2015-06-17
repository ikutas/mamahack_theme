<?php 
if(strpos($_SERVER['HTTP_USER_AGENT'],'ipod')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false){
?>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(4) ) : else : ?>
<?php endif; ?>
<?php 
}else{
?>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(3) ) : else : ?>
<?php endif; ?>
<?php
}
?>
