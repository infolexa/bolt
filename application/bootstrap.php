<?php defined('SYSPATH') or die('No direct script access.');

/*-- Initialize Kohana --*/
spl_autoload_register(array('Kohana', 'auto_load'));
date_default_timezone_set('Asia/Manila');
Kohana::init(array('base_url' => str_replace(basename($_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_NAME']), 'index_file' => ''));

/*-- Initialize Logging --*/
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));
Kohana::$config->attach(new Kohana_Config_File);

/*-- Load the 2 basic Modules first --*/
Kohana::modules(array('database' => MODPATH.'database', 'honeycomb'  => MODPATH.'honeycomb'));
/*-- Load everything else --*/
Apps::load();

/*-- Set the route that catches everything --*/
Route::set('app/statichtml', '(<file>(.html))', array(
		'file' => '[a-z\-]*+'
	))
	->defaults(array(
		'controller' => 'statichtml',
		'action'     => 'index',
		'file'	 	 => 'welcome'
	));

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
$content = $template->set('content', $response)->render();
$head = HTML::head(TRUE);
$token = HTML::token();
echo str_replace('[HEAD-'.$token.']', $head, $content);
