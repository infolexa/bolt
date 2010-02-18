<?php defined('SYSPATH') or die('404 Not Found.');?>



<div class="toolbar">
	<?php echo HTML::aroute('users/manage', array('action' => 'create'), 'New User') ?>
</div>
<table>
	<thead>
	<tr>
		<th><input type="checkbox" name="check_all" value="0" /></th>
		<th><?php echo HTML::aroute('users/list', array('sort_by' => $sort_by, 'ordering' => ($ordering == 'ASC') ? 'DESC' : 'ASC'), 'Username') ?></th>
		<th>Roles</th>
		<th>Status</th>
		<th>Last Login</th>
	</tr>
	</thead>
	<tbody>
	<?php 
	$row = 'even';
	foreach ($users as $user): 
		$row = ($row == 'odd') ? 'even' : 'odd';
	?>
	<tr class="<?php echo $row ?>">
		<td><input type="checkbox" name="users[]" value="<?php echo $user->id ?>" /></td>
		<td><?php echo HTML::aroute('users/manage', array('action' => 'edit', 'id' => $user->username), $user->username) ?></td>
		<td>...</td>
		<td>status</td>
		<td><?php echo date('g:i A M d, Y', $user->last_login) ?></td>
	</tr>
	<?php endforeach ?>
	</tbody>
</table>
