<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

/**
 * Set the default time zone.
 *
 * @see  http://docs.kohanaphp.com/features/localization#time
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Asia/Manila');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://docs.kohanaphp.com/features/autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

//-- Configuration and initialization -----------------------------------------

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array('base_url' => str_replace(basename($_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_NAME']), 'index_file' => ''));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Kohana_Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */

/**
 * Process#1 The 1st module to be loaded is HoneyComb
 */
Kohana::modules(array('honeycomb'  => MODPATH.'honeycomb'));

/**
 * Process#2 Load all Modules as controlled by HoneyComb
 * 	TOD0: Load this from a config file
 */
Apps::load();

/**
 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
 * If no source is specified, the URI will be automatically detected.
 * HoneyComb catches the main request's response.
 */
$response = Request::instance()
	->execute()
	->send_headers()
	->response;
	
//TODO: Run event pre-render and post-render

//Output the response without the template for Ajax or Media requests
if (Request::$is_ajax OR Request::instance()->action == 'media')
{
	echo $response;
	exit;
}

//Insert the content inside the theme template, render widgets too.
$content = View::factory('template')->set('content', $response)->render();

//Get the <head> items. Widgets and Apps can add anything inside the <head> using the HeneyComb HTML Helper.
$head = HTML::head(TRUE);
$token = HTML::token();

//Put the <head> items inside the template then output the response resulting in a complete webpage.
echo str_replace('[HEAD-'.$token.']', $head, $content);



