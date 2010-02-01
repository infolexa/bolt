<?php defined('SYSPATH') or die('404 Not Found.');


Route::set('app/statichtml', '<file>.html', array(
		'file' => '[a-z\-]*'
	))
	->defaults(array(
		'controller' => 'statichtml',
		'action'     => 'index',
		'file'	 	 => 'default'
	));

Route::set('widget/statichtml', '(<file>)', array(
		'file' => '[a-z\-]*'
	))
	->defaults(array(
		'controller' => 'statichtml',
		'action'     => 'widget',
		'file'	 	 => 'default'
	));
