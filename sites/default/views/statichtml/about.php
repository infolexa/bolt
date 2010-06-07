<?php defined('SYSPATH') or die('404 Not Found.');?>

<h2 id="this_is_an_incomplete_introduction_to_bolt_cms_i_should_spend_more_time_on_coding_8230"><em>This is an incomplete introduction to Bolt CMS. I should spend more time on coding &#8230;.</em></h2>

<h1 id="some_terminologies_used_in_bolt_cms">Some Terminologies used in Bolt CMS</h1>

<ul>
<li><strong>App</strong> - The main content of a page. It is the primary Request instance. </li>
<li><strong>Widget</strong> - The mini-content boxes that can be positioned anywhere. Widget positions are determined by the Theme.</li>
<li><strong>Themes</strong> - The layout and the aesthetic skin of Bolt. Can override views of any app or widget.</li>
<li><strong>Libraries</strong> - Collection of PHP Classes that helps Kohana perform specific tasks. Library examples: authentication, models or ORMs, mptt.</li>
<li><strong>Plugins</strong> - Modules classified as plugins for WYSIWYG&#8220; editors, comments, or anything that inserts content on certain events</li>
</ul>

<p>Apps, Widgets, Libraries, and Plugins are all Kohana Modules which follow a certain naming convention for Routes.</p>

<h1 id="the_3_files_that_bolt_extended_from_kohana">The 3 Files that Bolt extended from Kohana</h1>

<p><strong>Bolt extended 3 important files:</strong></p>

<ul>
<li><strong>application/bootstrap.php</strong> to initialize the modules and catch the primary Request&#8217;s response so it can be inserted and rendered within the theme.</li>
<li><strong>classes/route.php</strong> Change the way how routes are initialized. Some conventions are implented to differentiate internal from external requests. Widgets and Plugin requests are internal.</li>
<li><strong>classes/view.php</strong> To figure out if the theme provides an override to the view that&#8217;s being called.</li>
</ul>

<p>For those who are not yet familiar with how Kohana works, changing or overriding these files aren&#8217;t illegal in Kohana. Kohana is built to be extended and overridden. It&#8217;s not equivalent to &#8220;hacking the core&#8221;.</p>

<h2 id="file_1_bootstrapphp">File #1: bootstrap.php</h2>

<p>Bolt is loaded as the first module so it can initialize other modules that are marked as &#8220;active&#8221;. Modules are configured in config/modules.php
A Helper loads the rest of the modules based on how the modules are configured.</p>

<h2 id="file_2_classes_routephp">File #2: classes/route.php</h2>

<p>Routes in the module&#8217;s init.php should follow simple a convention in naming the route. This is to avoid conflicts with other modules.</p>

<h3 id="how_does_routes_in_bolt_work">How does Routes in Bolt work?</h3>

<p>Bolt will not limit module developers from having routes customized to their wants. The developer is responsible in composing routes that won&#8217;t conflict with other module&#8217;s routes.</p>

<p><strong>A Simple Route Naming Convention</strong></p>

<p>The only thing that Bolt requires in creating routes is their proper naming. Honeycomb needs to distiguish which routes are for Apps, Widgets, and Plugins.</p>

<p>Routes for Apps are accessible via the Main Request.</p>

<p>The format for App routes is like this:</p>

<pre><code>//This first route is generally recommended to avoid conflicts with other routes. Your app is namespaced under an alias. 
//Aliases for apps can be changed by the admin using the backend control panel(For, it's managed through a config file).

Route::set('app/appname', '&lt;alias&gt;(/&lt;controller&gt;(/&lt;action&gt;(/&lt;id&gt;)))', array('alias' =&gt; Apps::aliasof('appname'), 'controller' =&gt; 'controller1|controller2'))
    -&gt;defaults(array(
        //better put your controllers and classes inside a uniquely named directory to avoid conflicts with others
        'directory'  =&gt; 'appdirectory', 
        'controller' =&gt; 'controller1',
        'action'     =&gt; 'action1',
    ));

//You can add more routes for more customization. This one, if you want to bypass the controller/action and just go straight to the id.

Route::set('app/appname/default', '&lt;alias&gt;(/&lt;id&gt;)', array('alias' =&gt; Apps::aliasof('appname'), 'id' =&gt; '[a-z0-9\-]*$'))
    -&gt;defaults(array(
        'directory'  =&gt; 'appdirectory',
        'controller' =&gt; 'controller1',
        'action'     =&gt; 'action1',
        'id'         =&gt; null
    ));

//The above route is useful if you want something like this: http://www.mysite.com/product/slug-name-of-product where /product is an alias or name of an app.
</code></pre>

<p>The format for Widget routes is like this:</p>

<pre><code>Route::set('widget/appname/widget', '&lt;param1&gt;/&lt;param2&gt;/&lt;param3&gt;')
    -&gt;defaults(array(
        'directory'  =&gt; 'appdirectory',
        'controller' =&gt; 'controller1',
        'action'     =&gt; 'action1',
    ));

/* 
 *  A Real life application example: 
 *      If your app is an ecommerce app, the widget to lists the 
 *      10 latest products is something like this
*/
Route::set('widget/mystore/listtop', '(&lt;count&gt;)')
    -&gt;defaults(array(
        'directory'  =&gt; 'mystoredirectory',
        'controller' =&gt; 'products',
        'action'     =&gt; 'lists',
        'count'      =&gt; 10
    ));
</code></pre>

<p>Widgets are requests to a module&#8217;s controller actions which are not accessible via the main request. The change in route.php is the addition of a uniquely generated token that is prefixed to the uri when a widget route is set. 
This is to prevent public access and to have it&#8217;s own namespace so that the arrangement of route params need not to be unique from other widget routes.</p>

<p>In order to output the response of a widget, it must be rendered using Widgets::load(&#8216;position&#8217;, $chrome) most commonly inside the Theme&#8217;s template. More explanation about the Widgets and Themes on another chapter.</p>

<p>The format for Plugins is just similar to Widgets. But plugins are not yet implemented because events are not yet implemented.</p>

<h2 id="file_3_classes_viewphp">File #3: classes/view.php</h2>

<p>The last file that extends Kohana is the View class. Kohana_View was extended to add something simple: look for overrides in the Theme&#8217;s views.</p>

<h1 id="so_what8217s_so_different_about_this_cms">So What&#8217;s so Different About this CMS?</h1>

<p>This CMS is being developed alongside a huge project. So I&#8217;ll make sure it&#8217;s as usable/stable as possible when it&#8217;s released.</p>

<p>Me and my friends who&#8217;ll contribute are coming from an extensive CMS experience primarily with Joomla, then Drupal and Wordpress. 
I think we have a pretty good idea of how to build a good CMS. This project is inspired by those Big 3. If there is a Framework that can take the best features from those CMSs and put it into one dream CMS, that&#8217;s Kohana 3. </p>

<p>So the difference of this CMS from other Kohana 3 CMSs will be the &#8220;experience&#8221;. Take Wordpress&#8217;s ease of use, Drupal&#8217;s modularity, Joomla&#8217;s balance of both,
then the powerful flexibility of Kohana 3&#8217;s HMVC Framework, put it into one CMS &#8212; that&#8217;s Bolt CMS. At least that&#8217;s what we&#8217;re planning.</p>

<p>Of course everyone can dream and promise all those nice things. But I&#8217;m determined to make this dream come true because of one practical reason: our livelihood depends on it. 
However, this practical reason is not my primary reason. My primary reason is simple: I enjoy doing it.</p>

<p>Another difference I can think of, is that this project is not created by a programming genius. It will not have the tendency of being too cryptic that only geeks can understand.
We&#8217;ll get principles from Apple style, not Linux style.</p>

<h1 id="here_are_some_development_principles_that_this_project_is_following">Here are some development principles that this project is following:</h1>

<ul>
<li><strong>Pollute the Kohana Core as little as possible</strong> - In this case I only extended 3 files with very minimal changes</li>
<li><strong>Use what&#8217;s available</strong> - I don&#8217;t have(and I don&#8217;t want) to code everything, I&#8217;ll rely on the Kohana community to provide libraries like Sprig, Auth, AACL, MPTT, etc.</li>
<li><strong>Focus on the Users first</strong> - In the development process, I just built the core(which is basically done already) then my focus will move to the user interface. 
I would love to provide some &#8220;developer friendly&#8221; tools like easy creation of tables, and database syncing utilities but I think the developers can take care of themselves. 
It&#8217;s the end users that we&#8217;ll have to focus on first.</li>
<li><strong>Easy Come, Easy Go</strong> - Existing apps for Kohana 3 can easily be used or ported inside Bolt. Apps for Bolt can also be easily used outside of it.</li>
</ul>

<h1 id="some_technical_mumbo_jumbo">Some Technical Mumbo-Jumbo</h1>

<h2 id="more_on_widgets">More on Widgets</h2>

<p>With HMVC comes a very practical way of rendering Widgets. Bolt Widgets is very similar to how &#8220;Modules&#8221; in Joomla work, 
except that it doesn&#8217;t necessarily have to be separate from the main app. </p>

<p>Apps can have controllers and actions that responds to internal requests. Other apps can call these actions, and Bolt
can render the response as Widgets. It&#8217;s not even necessary that only internal request calls
can access it. As long as there&#8217;s a widget or app route to this controller-action, it can be called.</p>

<p>Widgets are commonly rendered inside a theme&#8217;s template. Widgets are not rendered alone. 
They are organized into groups called &#8220;positions&#8221;. The Bolt template does not render a single Widget directly,
it renders a widget position. A widget position can have one or more widgets. If a position doesn&#8217;t have a widget, nothing will be rendered.</p>

<p>Widgets are managed on a config file for now. A GUI in the admin backend is planned in the future. Widgets are configured in config/widgets.php</p>

<p>Example Widget Configuration:</p>

<pre><code>return array(
    'topmenu' =&gt; array(
        array(
            'route'         =&gt; 'widget/pages',  //this is the route name that will be used to call the widget
            'title'         =&gt; 'Main Menu',
            'show_title'    =&gt; FALSE,
            'enabled'       =&gt; TRUE,
            'show_where'    =&gt; array(
                                'all',          //URI's where you want the widget to be shown.
                            ),
            'hide_where'    =&gt; array(
                                'users/login'   //URI's where you want the widget to be hidden. Use this only when show_where is set to "all"
                            ),
            //various parameters that are accepted by the route.
            'params'        =&gt; array(
                                'layout'    =&gt; 'vertical',
                                'class'     =&gt; '',
                                'group'     =&gt; 'topmenu'
                            ),
            'usergroups'    =&gt; 'all'
        )
    ),

    'left' =&gt; array(
        array(
            'route'         =&gt; 'widget/statichtml',
            'title'         =&gt; 'Sign-up Steps',
            'show_title'    =&gt; TRUE,
            'enabled'       =&gt; TRUE,
            'show_where'    =&gt; array(
                                'users/registration',
                                'members/registration'
                            ),
            'hide_where'    =&gt; array(),
            'params'        =&gt; array(
                                'file' =&gt; 'regsteps',   //this file will be searched inside views/statichtml/regsteps.php
                                'class' =&gt; ''
                            ),
            'usergroups'    =&gt; '0'
        ),
    )
);
</code></pre>

<p>In the template.php of the Theme, a widget can be loaded like this:</p>

<pre><code>&lt;div&gt;
    &lt;?php echo Widgets::load('left', 'xhtml') ?&gt;
&lt;/div&gt;
</code></pre>

<p>This widget will then be rendered like this</p>

<pre><code>&lt;div&gt;
    &lt;div class="widget"&gt;
        &lt;h3&gt;Main Menu&lt;/h3&gt;
        &lt;div class="content"&gt;

            &lt;ul&gt;
                &lt;li&gt;&lt;a href="/"&gt;Home&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="/page/one"&gt;Page 1&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="/page/two"&gt;Page 2&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;

        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code></pre>

<p>The divs surrounding the <strong>ul</strong> tag is the &#8220;chrome&#8221;. The xhtml chrome is used here. It can easily be changed using the Theme&#8217;s views overrides.If the chrome is raw, only the <strong>ul</strong> html will be rendered.
The chrome is very useful for themers. They can wrap the modules around anything they want for styling.</p>

<h2 id="more_on_themes">More on Themes</h2>

<h2 id="more_on_apps">More on Apps</h2>

<h1 id="planned_features_for_version_10">Planned Features for Version 1.0</h1>

<ul>
<li><strong>Admin Interface</strong> Admin section organizes all administrative actions allowed for an app.</li>
<li><strong>Pages App</strong> Pages arrange the frontend contents of your site. You can classify them into groups. A page can be a simple static html(from file or database) or it can point to an app or a remote link. 
Pages app provides a widget to display groups of links. Displaying a page group widget is how you display &#8220;Menus&#8221;.</li>
<li><strong>User Manager</strong> Basic user manager for Bolt. Admin panel for managing users, login forms, and registration forms.</li>
<li><strong>App Manager</strong> Enable/Disable apps. Set various configurations for the app like <em>alias</em>.</li>
<li><strong>Widget Manager</strong> Position Widgets anywhere depending on the Theme. Create instances of Widgets with different configurations. Widgets can be displayed or hidden in different pages.</li>
<li><strong>Global Configuration</strong> Admin GUI for site-wide configuration.</li>
</ul>
