<?php defined('SYSPATH') or die('404 Not Found.');?>

<?php 

echo Kohana::debug(Request::factory(Route::get('widget/magicthemes/loading')->uri())->execute()->response); 
echo __("hello, :user", array(':user' => Auth::instance()->get_user()->username));

?>
