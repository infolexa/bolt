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

bootstrap.php
-------------

HoneyComb is loaded as the first module so it can initialize other modules that are marked as "active". Modules are configured in config/modules.php
A Helper loads the rest of the modules based on how the modules are configured.

classes/route.php
-----------------

Routes in the module's init.php should follow simple a convention in naming the route. This is to avoid conflicts with other modules.

### How does Routes in HoneyComb work?

HoneyComb will not limit module developers from having routes customized to their wants. The developer is responsible in composing routes that won't conflict with other module's routes.

**A Simple Route Naming Convention**

The only thing that HoneyComb requires in creating routes is their proper naming. Honeycomb needs to distiguish which routes are for Apps, Widgets, and Plugins.

Routes for Apps are accessible via the Main Request.

The format for App routes is like this:

	//This first route is generally recommended to avoid conflicts with other routes. Your app is namespaced under an alias. Aliases for apps can be changed by the admin using the backend control panel(For, it's managed through a config file).
	
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



Widgets are requests to a module's controller actions which are not accessible via the main request. The change in route.php is the addition of a uniquely generated token that is appended to the uri when a widget route is set. This is to prevent public access. 

In order to output the response of a widget, it must be rendered using Widgets::load('position', $chrome) most commonly inside the Theme's template. More explanation about the Widgets and Themes on another chapter.

The format for Plugins is just similar to Widgets. But plugins are not yet implemented because events are not yet implemented.

classes/view.php
----------------

The last file that extends Kohana is the View class. Kohana_View was extended to add something simple: look for overrides in the Theme's views.

So What's so Different About this CMS?
======================================

This CMS is being developed alongside a huge project. So we'll make sure it's as usable/stable as possible when it's released.

The developers of this CMS are also coming from an extensive CMS experience primarily with Joomla, then Drupal and Wordpress. 
I think we have a pretty good idea of how to build a good CMS. This project is inspired by those Big 3. If there is a Framework that can take the best features from those CMSs and put it into one dream CMS, that's Kohana 3. 
We think that using Kohana 3 in this CMS will solve almost all extensibility problems that are faced by those CMSs. 

So the difference of this CMS from other Kohana 3 CMSs will be the "experience". Take Wordpress's ease of use, Drupal's modularity and customizability, then Joomla's balance of user-friendliness and power, 
put it into one CMS -- that's HoneyComb CMS. At least that's what we're planning.

Of course everyone can dream and promise all those nice things. But we're determined to make this dream come true because of one practical reason: our livelihood depends on it. 
However, this practical reason is not our primary reason. Our primary reason is simple: we enjoy doing it.

Here are some development principles that we follow:
====================================================

* **Pollute the Kohana Core as little as possible** - In this case we only extended 3 files with very minimal changes
* **Use what's available** - We don't have(and we don't want) to code everything, we'll rely on the Kohana community to provide libraries like Sprig, Auth, AACL, MPTT, etc.
* **Focus on the Users first** - In our development process, we just built the core(which is basically done already) then our focus will move to the user interface. 
We would love to provide some "developer friendly" tools like easy creation of tables, and database syncing utilities but I think the developers can take care of themselves. 
It's the end users that we'll have to focus on first.
* **Easy Come, Easy Go** - Existing apps for Kohana 3 can easily be used or ported inside HoneyComb. Apps for HoneyComb can also be easily used outside of it.

Some Technical Mumbo-Jumbo
==========================

More on Widgets
---------------

Because of HMVC, there is now a better way to generate widgets.

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

