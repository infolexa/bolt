<?php defined('SYSPATH') or die('404 Not Found.');?>
<div class="grid_9">
	<table class="list">
		<thead>
			<tr>
				<th><input type="checkbox" name="check_all" value="0" /></th>
				<th><?php echo HTML::aroute('admin/widgets', array('sort_by' => $sort_by, 'ordering' => ($ordering == 'ASC') ? 'DESC' : 'ASC'), 'Title') ?></th>
				<th>Widget</th>
				<th>Template Region</th>
				<th>Enabled</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$row = 'odd';
		foreach ($widgets as $widget): 
			$row = ($row == 'odd') ? 'even' : 'odd';
		?>
		<tr class="<?php echo $row ?>">
			<td><input type="checkbox" name="widgets[]" value="<?php echo $widget->id ?>" /></td>
			<td><?php echo HTML::aroute('admin/widgets', array('action' => 'edit', 'type' => $type, 'id' => $widget->id), $widget->title) ?></td>
			<td><?php echo Widgets::get($widget->widget)->title() ?></td>
			<td><?php echo $widget->region ?></td>
			<td><?php echo $widget->enabled ?></td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>
<div class="grid_3">
	<?php echo $createmenu ?>	
</div>

<div class="clear"></div>