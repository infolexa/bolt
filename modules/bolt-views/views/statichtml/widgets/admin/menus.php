<?php defined('SYSPATH') or die('404 Not Found.');?>
<div class="box menu">
	<h2><a href="#" id="toggle-section-menu">Admin Menu</a></h2>
	<div class="block" id="section-menu">
		<ul class="section menu">
			<li>
				<a class="menuitem" href="#">User Menus</a>
				<ul class="submenu">
					<li><?php echo HTML::aroute('admin/users/manage', array('app' => Apps::aliasof('users'), 'controller' => 'users', 'action' => 'list'), 'Users List') ?></li>
					<li><?php echo HTML::aroute('admin/users', array('app' => Apps::aliasof('users'), 'controller' => 'roles', 'action' => 'list'), 'User Groups') ?></li>
					<li><?php echo HTML::aroute('admin/users', array('app' => Apps::aliasof('users'), 'controller' => 'permissions', 'action' => 'list'), 'Group Permissions') ?></li>
				</ul>
			</li>
			<li>
				<a class="menuitem" href="#">Widget Management</a>
				<ul class="submenu">
					<li><?php echo HTML::aroute('admin/widgets', array('action' => 'list'), 'Site Widgets') ?></li>
					<li><?php echo HTML::aroute('admin/widgets', array('type' => 'admin', 'action' => 'list'), 'Admin Widgets') ?></li>
				</ul>
			</li>
			<li>
				<a href="menuitem" href="#">Web Pages</a>
				<ul class="submenu">
					<li><?php echo HTML::aroute('admin/pages', array('action' => 'create', 'type' => 'group'), 'New Page Group') ?></li>
					<?php

					$pages = Sprig::factory('page')->load();
					$groups = $pages->children;
					?>
					<?php foreach ($groups as $group): ?>
					<li><?php echo HTML::aroute('admin/pages', array('group' => $group->alias, 'action' => 'list'), $group->title) ?></li>	
					<?php endforeach ?>
				</ul>
			</li>
			<li>
				<?php echo HTML::aroute('admin/users/guest', array('action' => 'logout'), 'Log Out', array('class' => 'menuitem')) ?>
			</li>
		</ul>
	</div>
</div>