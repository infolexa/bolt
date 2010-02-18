<?php defined('SYSPATH') or die('404 Not Found.');?>
<form action="<?php echo URL::base().HTML::route('widgets', array('type' => $type, 'action' => 'create')) ?>" method="post" accept-charset="utf-8">
	<input type="hidden" name="action" value="new" />
	<div>
		<?php echo Form::select('route', $routes) ?> &nbsp;
		<input type="submit" name="newwidget" value="New Widget" />
	</div>
</form>

<div id="widgetslist">
	<table class="list">
		<tr>
			<th><input type="checkbox" name="check_all" value="0" /></th>
			<th><?php echo HTML::aroute('widgets', array('sort_by' => $sort_by, 'ordering' => ($ordering == 'ASC') ? 'DESC' : 'ASC'), 'Title') ?></th>
			<th>Widget</th>
			<th>Position</th>
			<th>Enabled</th>
		</tr>
		<?php 
		$row = 'odd';
		foreach ($widgets as $widget): 
			$row = ($row == 'odd') ? 'even' : 'odd';
		?>
		<tr class="<?php echo $row ?>">
			<td><input type="checkbox" name="widgets[]" value="<?php echo $widget->id ?>" /></td>
			<td><?php echo HTML::aroute('widgets', array('action' => 'edit', 'type' => $type, 'id' => $widget->id), $widget->title) ?></td>
			<td><?php
				$route = Route::get($widget->route);
				echo ($route->meta('name')) ? $route->meta('name') : $widget->route;
			?></td>
			<td><?php echo $widget->position ?></td>
			<td><?php echo $widget->enabled ?></td>
		</tr>
		<?php endforeach ?>
		
	</table>
</div>