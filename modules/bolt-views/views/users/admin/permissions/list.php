<?php defined('SYSPATH') or die('404 Not Found.');?>

<form action="<?php echo URL::base().HTML::route('admin/users', array('app' => Apps::aliasof('users'), 'controller' => 'permissions', 'action' => 'save', 'id' => $id)) ?>" method="post" accept-charset="utf-8">
<table class="list">
	<thead>
	<tr>
		<th width="30%">App Permissions</th>	
		<?php 
		$role_permissions = array();
		foreach ($roles as $role): 
			$role_permissions[$role->name] = explode("\n", $role->permissions);
		?>
			<th width="<?php echo 70/count($roles) ?>%"><?php echo $role->title ?></th>	
		<?php endforeach ?>
	</tr>
	</thead>
</table>

<?php foreach ($permissions as $key => $access_names): ?>
<table class="list">
	<thead>
	<tr>
		<th colspan="<?php echo count($roles) + 1 ?>"><?php echo $key ?></th>
	</tr>
	</thead>
	<?php foreach ($access_names as $name): ?>
		<tr>
			<td width="30%"><?php echo ucwords($name) ?></td>
			<?php foreach ($roles as $role): 
					$checked = FALSE;
					$disabled = FALSE;
					if (in_array($name, $role_permissions[$role->name])) 
					{
						$checked = TRUE;
					}

					if ($role->parent == 'admin' AND preg_match('/^guest|^login/', $key))
					{
						$checked = TRUE;
						$disabled = TRUE;
					}
					
					if ($role->parent == 'login' AND preg_match('/^admin/', $key))
					{
						$checked = FALSE;
						$disabled = TRUE;
					}
					
					if ($role->parent == 'guest' AND preg_match('/^login|^admin/', $key)) 
					{
						$checked = FALSE;
						$disabled = TRUE;
					}
			?>
				<td align="center" width="<?php echo 70/count($roles) ?>%">
					<input type="checkbox" name="roles[<?php echo $role->id ?>][]" value="<?php echo $name ?>" <?php echo ($checked) ? 'checked="checked"' : '' ?> <?php echo ($disabled) ? 'disabled="disabled"' : '' ?> />	
				</td>
			<?php endforeach ?>
		</tr>
	<?php endforeach; ?>
</table>
<?php endforeach ?>
<input type="submit" name="submitbutton" value="Save" />
</form>