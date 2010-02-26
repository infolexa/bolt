⚡Bolt is a CMS that uses Kohana 3 as its foundational framework. 
================================================================

*Easy to Use, Easy to Extend*
-----------------------------

* **Web Bloggers, Admins and Publishers** will love it because it's very easy to use like WordPress and Joomla. 
* **Site Builders** will love it because it's modular, many aspects are inspired by Drupal.
* **Developers** will love it because it's just Kohana 3.x with a CMS module. 
* **Designers** will love it because its theming system is just simple HTML and PHP just like Joomla's.

*Status as of Feb 26, 2010:* **6%**
====================================

I. Introduction
---------------

Bolt is the fusion of many good concepts from the 3 most popular CMS: Joomla, Drupal and Wordpress. 
With years of experience using these 3, we've gathered great ideas and in some cases, improved on them.
But creating this CMS quickly would have been nearly impossible without its foundational framework - Kohana 3.

**Some terms used in Bolt:**

* **Extensions** - code that extends the functionalities of Bolt. Kohana just calls them "Modules", others call it "Plugins"(Wordpress) or "Modules"(Drupal), but it's a more general term. Everything you can use for Bolt is an Extension.
* **Apps** - the main web application that's displayed in a Bolt page. Others call it "Components"(Joomla), "Plugins"(Wordpress) or "Modules"(Drupal)
* **Widgets** - the mini content boxes of a page. Others call it "Modules"(Joomla), "Blocks"(Drupal), and also "Widgets"(Wordpress)
* **Plugins** - functions or methods that execute on certain events during the runtime of Bolt. Others call it "Plugins"(Joomla), "Hooks"(Drupal)
* **Helpers** - classes with static methods for many useful functions
* **Libraries** - classes that can be instantiated to aid in programming
* **Themes** - the look and layout of a bolt site. Themes dictate the layout of contents in a Bolt page. It is very similar to Joomla's Template system.

**What is Kohana 3?**

Kohana 3 is an HMVC(Hierarchical Model View Controller) framework written on PHP that lets developers create web applications easier and faster. Perhaps you've heard of the MVC architectural pattern. 
Frameworks like Ruby on Rails, Django, CodeIgniter, CakePHP, and many others use MVC. Kohana 3 is a little different because it is using the HMVC pattern. 
HMVC is deemed as the "logical" evolution of MVC. HMVC can be quickly described as an MVC that can have children MVC's. For a detailed description of the advantages of HMVC,
check [this article](http://techportal.ibuildings.com/2010/02/22/scaling-web-applications-with-hmvc).

**There's nothing you can't extend**

Those already familiar with Kohana 3 will know that any CMS or web application built on top of it will be very easy to extend and customize. Kohana 3's major feature is not only its ***HMVC architectural pattern*** but also its ***Cascading File System***. 
This clever and unique filesystem allows developers to extend or override anything, any extension for Bolt is extendable and overridable, even Bolt's and Kohana 3's Core files. 
Websites built with Bolt can be fully customized without hacking any core file.

**What is Bolt then?**

Kohana 3 is a lean and mean framework, it does nothing else but to provide developers with libraries and simple, non-restrictive patterns that make building web applications faster and easier than many other frameworks.
Bolt is simply a module for Kohana 3. It mainly provides the user interfaces(GUI) and libraries, and some additional conventions to easily manage a website system. 

Bolt provides the user interface to manage many aspects of a website like the following:

* Website Navigation and Web Pages, 
* Users, User Groups, and Permissions
* Contents or Articles for News or Blogging
* Content Categories
* Content Blocks or Widgets
* Extensions, Modules or Plugins
* Themes and Layouts
* Other Details like SEO, Media, etc.

II. Conventions
---------------
*Note: This section is particularly useful to developers who understand Kohana 3.*

Since Bolt is a CMS that anticipates many 3rd party developers to contribute extensions, it has added some conventions alongside Kohana 3's own conventions to avoid conflicts between extensions. 
The Cascading File System is flexible indeed, but it opens up potential conflicts if developers are not careful enough.

If you're a developer who would like to develop extensions that can be used inside Bolt, just follow these additional conventions. Bolt extensions are simply Kohana 3 Modules. 
Bolt just provides an interface that wraps around your Kohana 3 Module.

1. **Encapsulate your extensions inside a directory with the same name as your extension**

	Suppose you created a Bolt App named `myapp`. You should then put your helpers and libraries inside `classes/myapp`. 
	
	Your controllers should be located inside `classes/controller/myapp`.
	
	Your models should be located inside `classes/model/myapp` which will consequently have a table prefix `myapp_`.
	
	Keep the name of your extension as one word. Only ASCII English alphabet characters are allowed, no spaces, no underscores, no hyphen. 
	You can use the extension Title to describe your extension more clearly. Your app's name is simply a unique and short identifier for your extension.
	
	*Note: This convention can become obsolete when PHP Namespaces become widely adopted.*
	
2. **There are 2 kinds of Routes**

	Bolt has a Site section and an Admin section. Site is what we commonly call the Frontend. Admin is the Backend. Only Administrators are allowed to access the admin backend. 
	When you set Routes, you must specify which ones are for the site, and which ones are for the admin. 
	
	
	**You declare a Route for the site frontend like this:**
	
		Route::set('site/myapp', '<app>(/<controller>(/<action>(/<id>)))', array('controller' => 'defaultcontroller|mycontroller|othercontroller'))
			->defaults(array(
				'controller' => 'defaultcontroller',
				'action'     => 'index',
			));

	Notice that the Route name is prefixed with `site/`. This is used to indicate that this route is only for the site frontend.
	
	It is also strongly suggested that you specify which controllers are accessible via this route through the Regex parameter. This is a precaution to avoid conflicts.
	
	Notice also that the Route name `site/myapp` has a second segment `myapp`. The second segment should always be the name of your app. 
	You can create many other routes with different names like `site/myapp/firstroute` or `site/myapp/secondroute` but it should always begin with `site/myapp`.
	You don't need to set the `directory` parameter because it will always be the name of your app.
	
	Another important thing to mention is that you should always prefix your Route's URI with `<app>`. You don't need to adhere to this convention if you really know what you're doing.
	But it's strongly suggested to avoid conflicts with other routes. When Reverse routing is used, `<app>` will be replaced by your app's alias. Alias is a "slug" for your app. If your app doesn't have an alias,
	your app's name will be used. App aliases can be set by the Site Administrators for Search Engine Friendly and Human Readable URLs. 
	
	**You declare a Route for the admin backend like this:**
	
		Route::set('admin/myapp', '<app>(/<controller>(/<action>(/<id>)))', array('controller' => 'defaultcontroller|mycontroller|othercontroller'))
			->defaults(array(
				'controller' => 'defaultcontroller',
				'action'     => 'index',
			));

	If your app has admin pages, you need to use admin specific routes. Some magic is going on here. `admin` is automatically appended to the URI. 
	So on reverse routing, the URI can look like this: `http://www.mydomain.com/admin/defaultcontroller/index/id`. 
	
	Besides being a shortcut, the reason that you don't need to put `admin` manually in the URI like this `admin/<app>(/<controller>(/<action>(/<id>)))` is because `admin` can also have an alias.
	That means you can hide your admin backend to a different URI segment like `mysecretadminsection`. You can then access your admin section like this `http://www.mydomain.com/mysecretadminsection` instead of `http://www.mydomain.com/admin`.
	
3. **Declaring Widgets**

	Unlike other CMS's, Bolt's Widgets aren't necessarily separate from your app. Widgets are simply HMVC calls. Thus, widgets can reside in the same controller as the app. It can also be a stand alone widget.
	
	You don't need a route to make your widgets accessible, all you have to do is declare them in your extension's init.php, where you also declare your app's routes.
	
		Widgets::register('mywidget')
			->title('Title for My Widget')
			->params(array(
				'directory'  => 'myapp',
				'controller' => 'defaultcontroller',
				'action'     => 'samplewidget',
			));

	
	There will be more discussion about Widgets in another Chapter.
	
4. **Declaring Permissions**
	
	Bolt has 3 main kinds of users and nothing more: Guests, Members and Administrators. You can create unlimited groups of users under Members and also unlimited groups of users under Administrators. 
	Each Group can have fine grained permissions management similar to Drupal.
	
	You can't create a user group under Guests.

	Members can login to the Site Frontend only. Admins can login to both Site and Admin.
	
	Because of this user structure, permissions are also specific to the 3 kinds of users.
	
	For guests, you declare permissions like this on the init.php of your app:
	
		Permissions::set('guest/myapp', array(
			'access myapp page',
			'access myapp anotherpage',
			'comment on myapp apge',
		));
	
	For members, it's like this:
	
		Permissions::set('member/myapp', array(
			'create myapp page',
			'edit myapp page',
		));
	
	For admins, it's like this:
	
		Permissions::set('admin/myapp', array(
			'delete myapp page',
		));

	
	Groups under Administrators will automatically inherit the permissions for guests and members. You can't remove guest and member permissions from the Admin Groups.
	
	You can assign guest permissions to members but you can't assign Member and Admin permissions to guests. You also can't assign Admin permissions to Members.
	
	This is just a basic declaration of permissions. More details will be discussed in another chapter. 
	But as a preview, you can specify the controllers and actions related to the permission. 
	This will allow Bolt to automatically check for the user's permissions when certain controllers are accessed.
	
5. **Extending Bolt's Controllers**

	If you want your app to automatically check user permissions as declared in your init.php, you must extend `Site_Controller` or `Admin_Controller`.
	
	For your site controllers do something like this:
	
	    class myapp_defaultcontroller extends Site_Controller{

			public function action_index()
			{
			
			}
		}
	
	Or for the admin:
	
		class myapp_defaultcontroller extends Admin_Controller{
		
			public function action_index()
			{
			
			}
		}
	
	These Site and Admin controllers have a default `before()` methods that checks permissions automatically.