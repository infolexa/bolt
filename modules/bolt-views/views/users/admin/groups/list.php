<?php defined('SYSPATH') or die('404 Not Found.');?>
<form action="<?php echo URL::base().HTML::route('users', array('app' => Apps::aliasof('users'), 'controller' => 'groups', 'action' => 'create')) ?>" method="post" accept-charset="utf-8">
	<table>
		<thead>
			<tr>
				<th>Group</th>
				<th>Description</th>
				<th>Permissions</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$row = 'even';
		foreach ($roles as $role): 
			$row = ($row == 'odd') ? 'even' : 'odd';
		?>
		<tr class="<?php echo $row ?>">
			<td><?php echo HTML::aroute('users', array('app' => Apps::aliasof('users'), 'controller' => 'groups', 'action' => 'edit', 'id' => $role->name), $role->title) ?> <em>(<?php echo $role->name ?>)</em></td>
			<td><?php echo $role->description ?></td>
			<td><?php echo HTML::aroute('users', array('app' => Apps::aliasof('users'), 'controller' => 'permissions', 'action' => 'list', 'id' => $role->name), 'Edit Permissions') ?></td>
		</tr>
		<?php endforeach ?>
		</tbody>
		<tr>
			<td><input type="text" name="name" value="" /></td>
			<td>
				<input type="text" name="description" value="" size="40" /> <br />
				Group Type:
				<label><input type="radio" name="parent" value="login" /> Login Access </label>
				<label><input type="radio" name="parent" value="admin" /> Administrator </label>
			</td>
			<td><input type="submit" name="addrole" value="Add Role" /></td>
		</tr>
		
	</table>
</form>
