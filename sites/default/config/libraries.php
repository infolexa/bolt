<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'default' => array(
		'database' => MODPATH.'database', 
		'image'      => MODPATH.'image',      // Image manipulation
		'cache'      => MODPATH.'cache',      // Caching with multiple backends
		'pagination' => MODPATH.'pagination', // Paging of results
		'codebench'  => MODPATH.'codebench',  // Benchmarking tool
		'jelly' => MODPATH.'jelly',
		'bolt'  => MODPATH.'bolt',
		'bolt-auth'  => MODPATH.'bolt-auth',
	)
);
