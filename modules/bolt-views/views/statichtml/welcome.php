<?php defined('SYSPATH') or die('404 Not Found.');?>

<?php 

echo __("hello, :user", array(':user' => Auth::instance()->get_user()->username));

?>
