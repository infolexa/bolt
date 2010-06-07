⚡Bolt is a CMS that uses Kohana 3 as its foundational framework. 
================================================================

*Easy to Use, Easy to Extend*
-----------------------------

* **Web Bloggers, Admins and Publishers** will love it because it's very easy to use like WordPress and Joomla. 
* **Site Builders** will love it because it's modular, many aspects are inspired by Drupal without that hook system and unreusable functions. 
* **Developers** will love it because it's based on Kohana 3.x. 
* **Designers** will love it because its theming system is just simple HTML and PHP just like Joomla's.

*Status as of June 7, 2010:* **3%**
====================================

Notes for Kohana Developers
===========================
The CMS is being designed and redesigned. The initial idea was to take Kohana's best ideas and conventions and use it to build a powerful CMS. 
It turns out that it's not that easy. There are many scenarios to consider. If it's gonna be a CMS system that can accomodate hundreds of 
Modules(Extensions/Plugins), Kohana's Cascading File System and File Naming Conventions for Auto-Loading will make the system convolluted. 

So to those hoping that this is just a simple CMS module for Kohana, nope this isn't one. The only thing that's pure Kohana in Bolt is the "system"
directory. Everything else was modified in some way, index.php, bootstrap, the way modules are loaded, etc are all modified. Kohana is a great Foundational Framework for web Apps, but it needs to have some steroids injected to it
if it's gonna be used for a CMS wherein multiple apps from different developers run on a single website system.