<?php defined('SYSPATH') or die('No direct script access.');

/*-- Initialize Kohana --*/
spl_autoload_register(array('Kohana', 'auto_load'));
date_default_timezone_set('Asia/Manila');
Kohana::init(array('base_url' => str_replace(basename($_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_NAME']), 'index_file' => ''));

/*-- Initialize Logging --*/
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));
Kohana::$config->attach(new Kohana_Config_File);

/*-- Load the 2 basic Modules first --*/
Kohana::modules(array('database' => MODPATH.'database', 'bolt'  => MODPATH.'bolt'));
/*-- Load everything else --*/
Apps::load();

/*-- Set the routes --*/
Route::set('admin/users/guest', '<action>', array('action' => 'login|logout'))
	->defaults(array(
		'directory'	 => 'admin',
		'controller' => 'users',
		'action'	 => 'login'
	));

Route::set('admin/default', '(/<controller>(/<action>(/<id>)))')
	->defaults(array(
		'directory' => 'admin',
		'controller' => 'statichtml',
		'action'     => 'index',
		'file'	 	 => 'welcome'
	));

/* Route for Media files */
Route::set('config', '<directory>/<action>', array('directory' => '[a-z0-9_\-]*+', 'action' => '[a-z0-9_\-]*+'))
	->defaults(array(
		'controller' => 'config'
	));

Route::set('media', 'media(/<file>)', array('file' => '.+'))
	->defaults(array(
		'controller' => 'media',
		'action'     => 'media',
		'file'       => NULL,
	));
	
Route::set('pages', '<page>(.<extension>)', array('page' => '^[a-z0-9\-\/].+$', 'extension' => 'html|xml'))
	->defaults(array(
		'app'		 => 'pages',
		'controller' => 'page',
		'action'     => 'page'
	));

//this catches everything else
Route::set('default', '(<blank>)', array('blank'=> '.*$'));	

/*
echo Kohana::debug(Route::name(Request::instance()->route));
die();
*/

/*
echo Kohana::debug(Request::instance()->uri());
die();
*/

/*
echo Kohana::debug(Route::all());
die();
*/

/*-- Check if Admin is being accessed --*/
if (Request::instance()->param('mode') == 'admin') 
{
	$template = View::factory('admin/template');
}else
{
	$template = View::factory('template');
}

$response = Request::instance()->execute()->send_headers()->response;

if (Request::$is_ajax OR Request::instance()->action == 'media')
{
	echo $response;
	exit;
}

$messages = unserialize(Session::instance()->get('messages', serialize(array())));
Session::instance()->delete('messages');

$content = $template->set('content', $response)
	->set('messages', $messages)
	->render();

$head = HTML::head(TRUE);
$token = HTML::token();
echo str_replace('[HEAD-'.$token.']', $head, $content);
