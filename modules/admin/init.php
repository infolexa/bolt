<?php defined('SYSPATH') or die('404 Not Found.');

Route::set('admin/widgets', 'widgets(/<type>(/<action>(/<id>)))', array('action' => 'list|create|edit|save', 'type' => 'site|admin'))
	->defaults(array(
		'app'		 => 'widgets',
		'directory'  => 'admin',
		'controller' => 'widgets',
		'action'     => 'list',
		'type'		 => 'site',
		'id'		 => NULL
	));

Permissions::set('admin/widgets', array(
	'administer site widgets',
	'administer admin widgets'
));