<?php defined('SYSPATH') or die('404 Not Found.');?>


<div class="span-11">	
	<p>
    <label></label><label for="route">Widget</label> <br>
	<?php echo ($route['route']->meta('name')) ? $route['route']->meta('name') : $route['name'] ?>
	<input type="hidden" name="route" value="<?php echo $route['name'] ?>" />
	<p>
    <label></label><label for="title">Title</label> <br>
	<input name="title" value="<?php echo $widget->title ?>" type="text"></p>
	<p>
    <label></label><label for="position">Position</label> <br>
	<input name="position" value="<?php echo $widget->position ?>" type="text"></p>
	<p>
    <label></label><label for="ordering">Ordering</label> <br>
	<input name="ordering" value="<?php echo $widget->ordering ?>" type="text"></p>
	<p>
    <label></label><label for="show_where">Show Where</label> <br>
	<textarea name="show_where"><?php echo $widget->show_where ?></textarea>
		
	</p>
	<p>
    <label></label><label for="hide_where">Hide Where</label> <br>
	<textarea name="hide_where"><?php echo $widget->hide_where ?></textarea></p>
	<p>
    <label></label><label for="roles">Roles</label> <br>
	<textarea name="roles"><?php echo $widget->roles ?></textarea>	</p>

    <label></label><label for="type">Type</label> <br>
	<?php echo Form::select('type', array('admin' => 'Admin', 'site' => 'Site'), $widget->type) ?>
	</p>
	<p>
    <label></label><label for="show_title">Show Title</label> <br>
	<?php echo Form::select('show_title', array('1' => 'Show', '0' => 'Hide'), $widget->show_title) ?>
	</p>
	<p>
    <label></label><label for="enabled">Enabled</label> <br>
	<?php echo Form::select('enabled', array('1' => 'Enabled', '0' => 'Disabled'), $widget->enabled) ?>
	</p>
</div>

<div class="span-5 last">
	<h3>Parameters</h3>
	<?php 
	$params = unserialize($widget->params);
	if ($route['route']->meta('config'))
	{
		echo View::factory($route['route']->meta('config'))
				->set('params', $params)
				->render();
	}else
	{
		echo View::factory('admin/widgets/config')
				->set('params', $route['route']->params($params))
				->render();
	}
	 ?>
</div>