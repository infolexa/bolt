<?php defined('SYSPATH') or die('404 Not Found.');?>

<?php 

echo __("hello, :user", array(':user' => Auth::instance()->get_user()->username));

$user = Jelly::select('user')->where('username', '=', 'testuser02')->limit(1)->execute();
//$user->remove('roles', 2);
//$user->save();
//$user->roles= array(7,8);
/*
foreach ($user->roles as $role) 
{
	echo Kohana::debug($role);
	
}
*/


//echo Kohana::debug(Jelly::delete('me'));

?>
