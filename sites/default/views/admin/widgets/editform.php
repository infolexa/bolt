<?php defined('SYSPATH') or die('404 Not Found.');?>


<div class="grid_9">
	<div class="box">
	<fieldset>
	<legend>Edit Widget</legend>
	<p>
    <label></label><label for="route">Widget</label> <br>
	<?php echo Widgets::get($widget->widget)->title ?>
	<input type="hidden" name="widget" value="<?php echo $widget->widget ?>" />
	<p>
    <label></label><label for="title">Title</label> <br>
	<input name="title" value="<?php echo $widget->title ?>" type="text"></p>
	<p>
    <label></label><label for="region">Region</label> <br>
	<input name="region" value="<?php echo $widget->region ?>" type="text"></p>
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
	</fieldset>
	</div>
</div>

<div class="grid_3">
	<div class="box">
		<fieldset>
			<legend>Parameters</legend>
	<?php 

	$params = ( ! is_null($widget->params)) ? unserialize($widget->params) : array();
	
	try 
	{
		$parameters = Widgets::get($widget->widget)->params($params)->execute('config')->response;
		if (strlen($parameters) > 3) 
		{
			echo $parameters;
		}else
		{
			echo Form::hidden('params[]');
		}
	}
	catch(ReflectionException $e)
	{
		echo __('No Configuration Found!');
	}
	 ?>
		</fieldset>
	</div>
</div>
<div class="clear"></div>