<?php defined('SYSPATH') or die('404 Not Found.');?>

<div class="box menu">
	<h2><?php echo HTML::aroute('admin/widgets', array('action' => 'create', 'type' => $type, 'id' => 'custom'), 'New Widget') ?></h2>
	<div class="block" id="section-menu">
		<ul class="section menu">
			<?php foreach (Widgets::all() as $widget): ?>
			<li>
			<?php
			$title = ($widget->title) ? $widget->title: $widget->name;
			echo HTML::aroute('admin/widgets', array('action' => 'create', 'type' => $type, 'id' => $widget->name), $title, array('class' => 'menuitem'));
			?>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>