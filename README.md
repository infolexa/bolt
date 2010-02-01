*This is an incomplete introduction to HoneyComb CMS. I should spend more time on coding ....*
----------------------------------------------------------------------------------------------

Some Terminologies used in HoneyComb CMS
========================================

* **App** - The main content of a page. It is the primary Request instance. 
* **Widget** - The mini-content boxes that can be positioned anywhere. Widget positions are determined by the Theme.
* **Themes** - The layout and the aesthetic skin of HoneyComb. Can override views of any app or widget.
* **Libraries** - Collection of PHP Classes that helps Kohana perform specific tasks. Library examples: authentication, models or ORMs, mptt.
* **Plugins** - Modules classified as plugins for WYSIWYG`` editors, comments, or anything that inserts content on certain events

Apps, Widgets, Libraries, and Plugins are all Kohana Modules which follow a certain naming convention for Routes.

The 3 Files that HoneyComb extended from Kohana
===============================================

**HoneyComb extended 3 important files:**

* **application/bootstrap.php** to initialize the modules and catch the primary Request's response so it can be inserted and rendered within the theme.
* **classes/route.php** Change the way how routes are initialized. Some conventions are implented to differentiate internal from external requests. Widgets and Plugin requests are internal.
* **classes/view.php** To figure out if the theme provides an override to the view that's being called.

For those who are not yet familiar with how Kohana works, changing or overriding these files aren't illegal in Kohana. Kohana is built to be extended and overridden. It's not equivalent to "hacking the core".

File #1: bootstrap.php
----------------------

HoneyComb is loaded as the first module so it can initialize other modules that are marked as "active". Modules are configured in config/modules.php
A Helper loads the rest of the modules based on how the modules are configured.

File #2: classes/route.php
--------------------------

Routes in the module's init.php should follow simple a convention in naming the route. This is to avoid conflicts with other modules.

### How does Routes in HoneyComb work?

HoneyComb will not limit module developers from having routes customized to their wants. The developer is responsible in composing routes that won't conflict with other module's routes.

**A Simple Route Naming Convention**

The only thing that HoneyComb requires in creating routes is their proper naming. Honeycomb needs to distiguish which routes are for Apps, Widgets, and Plugins.

Routes for Apps are accessible via the Main Request.

The format for App routes is like this:

	//This first route is generally recommended to avoid conflicts with other routes. Your app is namespaced under an alias. 
	//Aliases for apps can be changed by the admin using the backend control panel(For, it's managed through a config file).
	
	Route::set('app/appname', '<alias>(/<controller>(/<action>(/<id>)))', array('alias' => Apps::aliasof('appname'), 'controller' => 'controller1|controller2'))
		->defaults(array(
			//better put your controllers and classes inside a uniquely named directory to avoid conflicts with others
			'directory'  => 'appdirectory', 
			'controller' => 'controller1',
			'action'     => 'action1',
		));
	
	//You can add more routes for more customization. This one, if you want to bypass the controller/action and just go straight to the id.
	
	Route::set('app/appname/default', '<alias>(/<id>)', array('alias' => Apps::aliasof('appname'), 'id' => '[a-z0-9\-]*$'))
		->defaults(array(
			'directory'  => 'appdirectory',
			'controller' => 'controller1',
			'action'     => 'action1',
			'id'		 => null
		));
		
	//The above route is useful if you want something like this: http://www.mysite.com/product/slug-name-of-product where /product is an alias or name of an app.


The format for Widget routes is like this:

	Route::set('widget/appname/widget', '<param1>/<param2>/<param3>')
		->defaults(array(
			'directory'  => 'appdirectory',
			'controller' => 'controller1',
			'action'     => 'action1',
		));
		
	/* 
	 *	A Real life application example: 
	 *		If your app is an ecommerce app, the widget to lists the 
	 *		10 latest products is something like this
	*/
	Route::set('widget/mystore/listtop', '(<count>)')
		->defaults(array(
			'directory'  => 'mystoredirectory',
			'controller' => 'products',
			'action'     => 'lists',
			'count'		 => 10
		));



Widgets are requests to a module's controller actions which are not accessible via the main request. The change in route.php is the addition of a uniquely generated token that is prefixed to the uri when a widget route is set. 
This is to prevent public access and to have it's own namespace so that the arrangement of route params need not to be unique from other widget routes.

In order to output the response of a widget, it must be rendered using Widgets::load('position', $chrome) most commonly inside the Theme's template. More explanation about the Widgets and Themes on another chapter.

The format for Plugins is just similar to Widgets. But plugins are not yet implemented because events are not yet implemented.

File #3: classes/view.php
-------------------------

The last file that extends Kohana is the View class. Kohana_View was extended to add something simple: look for overrides in the Theme's views.

So What's so Different About this CMS?
======================================

This CMS is being developed alongside a huge project. So I'll make sure it's as usable/stable as possible when it's released.

Me and my friends who'll contribute are coming from an extensive CMS experience primarily with Joomla, then Drupal and Wordpress. 
I think we have a pretty good idea of how to build a good CMS. This project is inspired by those Big 3. If there is a Framework that can take the best features from those CMSs and put it into one dream CMS, that's Kohana 3. 

So the difference of this CMS from other Kohana 3 CMSs will be the "experience". Take Wordpress's ease of use, Drupal's modularity, Joomla's balance of both,
then the powerful flexibility of Kohana 3's HMVC Framework, put it into one CMS -- that's HoneyComb CMS. At least that's what we're planning.

Of course everyone can dream and promise all those nice things. But I'm determined to make this dream come true because of one practical reason: our livelihood depends on it. 
However, this practical reason is not my primary reason. My primary reason is simple: I enjoy doing it.

Another difference I can think of, is that this project is not created by a programming genius. It will not have the tendency of being too cryptic that only geeks can understand.
We'll get principles from Apple style, not Linux style.

Here are some development principles that this project is following:
====================================================================

* **Pollute the Kohana Core as little as possible** - In this case I only extended 3 files with very minimal changes
* **Use what's available** - I don't have(and I don't want) to code everything, I'll rely on the Kohana community to provide libraries like Sprig, Auth, AACL, MPTT, etc.
* **Focus on the Users first** - In the development process, I just built the core(which is basically done already) then my focus will move to the user interface. 
I would love to provide some "developer friendly" tools like easy creation of tables, and database syncing utilities but I think the developers can take care of themselves. 
It's the end users that we'll have to focus on first.
* **Easy Come, Easy Go** - Existing apps for Kohana 3 can easily be used or ported inside HoneyComb. Apps for HoneyComb can also be easily used outside of it.

Some Technical Mumbo-Jumbo
==========================

More on Widgets
---------------

With HMVC comes a very practical way of rendering Widgets. HoneyComb Widgets is very similar to how "Modules" in Joomla work, 
except that it doesn't necessarily have to be separate from the main app. 

Apps can have controllers and actions that responds to internal requests. Other apps can call these actions, and HoneyComb
can render the response as Widgets. It's not even necessary that only internal request calls
can access it. As long as there's a widget or app route to this controller-action, it can be called.

Widgets are commonly rendered inside a theme's template. Widgets are not rendered alone. 
They are organized into groups called "positions". The HoneyComb template does not render a single Widget directly,
it renders a widget position. A widget position can have one or more widgets. If a position doesn't have a widget, nothing will be rendered.

Widgets are managed on a config file for now. A GUI in the admin backend is planned in the future. Widgets are configured in config/widgets.php

Example Widget Configuration:

	return array(
		'topmenu' => array(
			array(
				'route' 		=> 'widget/pages', 	//this is the route name that will be used to call the widget
				'title' 		=> 'Main Menu',
				'show_title'	=> FALSE,
				'enabled'		=> TRUE,
				'show_where'	=> array(
									'all',			//URI's where you want the widget to be shown.
								),
				'hide_where'	=> array(),
				//various parameters that are accepted by the route.
				'params'		=> array(
									'layout' 	=> 'vertical',
									'class' 	=> '',
									'group' 	=> 'topmenu'
								),
				'usergroups'	=> 'all'
			)
		),
		
		'left' => array(
			array(
				'route'			=> 'widget/statichtml',
				'title'			=> 'Sign-up Steps',
				'show_title'	=> TRUE,
				'enabled'		=> TRUE,
				'show_where'	=> array(
									'users/registration',
									'members/registration'
								),
				'hide_where'	=> array(
									'users/login'		//URI's where you want the widget to be hidden
								),
				'params'		=> array(
									'file' => 'regsteps',	//this file will be searched inside views/statichtml/regsteps.php
									'class' => ''
								),
				'usergroups'	=> '0'
			),
		)
	);

More on Themes
--------------

More on Apps
------------


Planned Features for Version 1.0
=================================

* **Admin Interface** Admin section organizes all administrative actions allowed for an app.
* **Pages App** Pages arrange the frontend contents of your site. You can classify them into groups. A page can be a simple static html(from file or database) or it can point to an app or a remote link. 
Pages app provides a widget to display groups of links. Displaying a page group widget is how you display "Menus".
* **User Manager** Basic user manager for HoneyComb. Admin panel for managing users, login forms, and registration forms.
* **App Manager** Enable/Disable apps. Set various configurations for the app like *alias*.
* **Widget Manager** Position Widgets anywhere depending on the Theme. Create instances of Widgets with different configurations. Widgets can be displayed or hidden in different pages.
* **Global Configuration** Admin GUI for site-wide configuration.

