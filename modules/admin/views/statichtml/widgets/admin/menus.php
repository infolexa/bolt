<?php defined('SYSPATH') or die('404 Not Found.');?>
<h4>User Menus</h4>
<ul>
	<li><?php echo HTML::aroute('users/manage', array('app' => Apps::aliasof('users'), 'controller' => 'users', 'action' => 'list'), 'Users List') ?></li>
	<li><?php echo HTML::aroute('users', array('app' => Apps::aliasof('users'), 'controller' => 'groups', 'action' => 'list'), 'User Groups') ?></li>
	<li><?php echo HTML::aroute('users', array('app' => Apps::aliasof('users'), 'controller' => 'permissions', 'action' => 'list'), 'Group Permissions') ?></li>
</ul>

<h4>Widget Management</h4>
<ul>
	<li><?php echo HTML::aroute('widgets', array('action' => 'list'), 'Site Widgets') ?></li>
	<li><?php echo HTML::aroute('widgets', array('type' => 'admin', 'action' => 'list'), 'Admin Widgets') ?></li>
</ul>

<h4>Web Pages</h4>
<div>
<?php echo HTML::aroute('pages', array('group' => 'root', 'action' => 'create'), 'New Page Group') ?>
</div>
<ul>
	<?php
	
	$pages = Sprig::factory('page')->load();
	$groups = $pages->children;
	?>
	<?php foreach ($groups as $group): ?>
	<li><?php echo HTML::aroute('pages', array('group' => $group->alias, 'action' => 'list'), $group->title) ?></li>	
	<?php endforeach ?>
</ul>