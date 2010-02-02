<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

date_default_timezone_set('Asia/Manila');
spl_autoload_register(array('Kohana', 'auto_load'));
Kohana::init(array('base_url' => str_replace(basename($_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_NAME']), 'index_file' => 'index.php'));
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));
Kohana::$config->attach(new Kohana_Config_File);
Kohana::modules(array('honeycomb'  => MODPATH.'honeycomb'));
Apps::load();
$response = Request::instance()->execute()->send_headers()->response;
if (Request::$is_ajax OR Request::instance()->action == 'media')
{
	echo $response;
	exit;
}
$content = View::factory('template')->set('content', $response)->render();
$head = HTML::head(TRUE);
$token = HTML::token();
echo str_replace('[HEAD-'.$token.']', $head, $content);


