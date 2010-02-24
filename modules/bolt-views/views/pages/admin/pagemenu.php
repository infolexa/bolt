<?php defined('SYSPATH') or die('404 Not Found.');?>

<div class="box menu">
	<h2><?php echo HTML::aroute('pages', array('group' => $group, 'action' => 'create'), 'New Page') ?></h2>
	<div class="block" id="section-menu">
		<ul class="section menu">
			<li>
				<?php foreach ($modules as $module): ?>
					<?php
					$title = ($module->title) ? $module->title: $module->name;
					echo HTML::aroute('pages', array('group' => $group, 'action' => 'create', 'type' => 'app', 'id' => $module->name), $title, array('class' => 'menuitem'));
					?>

					<?php if (count($module->routes)): ?>
						<ul class="submenu">
							<?php foreach ($module->routes as $key => $route): ?>
								<?php
								$name = ($route->meta('name')) ? $route->meta('name') : $key;
								$segments = explode('/', $key);
								echo '<li>' . HTML::aroute('pages', array('group' => $group, 'action' => 'create', 'type' => 'route', 'id' => $key), $name ) .'</li>';
								?>
							<?php endforeach ?>
						</ul>
					<?php endif ?>

				<?php endforeach ?>
			</li>
			<li>
				<a href="#" class="menuitem">External Links</a>
				<ul class="submenu">
					<li><?php echo HTML::aroute('pages', array('group' => $group, 'action' => 'create', 'type' => 'external', 'id' => 'redirect'), 'Redirect'); ?></li>
					<li><?php echo HTML::aroute('pages', array('group' => $group, 'action' => 'create', 'type' => 'external', 'id' => 'direct'), 'Direct Link');?></li>
				</ul>
			</li>
		</ul>
	</div>
</div>