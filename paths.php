<?php defined('DOCROOT') or die('No direct script access.');

/**
 * The directory in which your site application specific resources are located.
 * The site application directory must contain the config/kohana.php file.
 * This automatically detects multi-site configuration found in 'sites' directory
 *
 * @see  http://docs.kohanaphp.com/install#application
 */
$application = 'sites'.DIRECTORY_SEPARATOR.$_SERVER['HTTP_HOST'];
$application = (is_dir($application)) ? $application: 'sites'.DIRECTORY_SEPARATOR.'default';

/**
 * The directory in which the Apps are located. 
 * Apps are modules that has views, and has controllers for site or admin
 * Apps are accessed "on demand" - meaning they included in the cascading file system only when they are accessed
 *
 * @see  http://docs.kohanaphp.com/install#system
 */
$apps = 'apps';

/**
 * The directory in which your modules are located.
 * Module is a Kohana term for anything that is included in the cascading file system
 * 	that follows the Kohana file structure conventions.
 * All active modules in this directory are included in the CFS unlike apps which are loaded on demand.
 *
 * @see  http://docs.kohanaphp.com/install#modules
 */
$modules = 'lib';

/**
 * The directory in which the Kohana resources are located. The system
 * directory must contain the classes/kohana.php file.
 *
 * @see  http://docs.kohanaphp.com/install#system
 */
$system = 'system';