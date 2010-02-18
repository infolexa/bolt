<?php defined('SYSPATH') or die('404 Not Found.');?>

<form action="<?php echo URL::base().HTML::route('users', array('app' => Apps::aliasof('users'), 'controller' => 'permissions', 'action' => 'save', 'id' => $id)) ?>" method="post" accept-charset="utf-8">
<table class="list">
	<tr>
		<th width="30%">App Permissions</th>	
		<?php 
		$group_permissions = array();
		foreach ($groups as $group): 
			$group_permissions[$group->name] = explode(',', $group->permissions);
		?>
			<th width="<?php echo 70/count($groups) ?>%"><?php echo $group->title ?></th>	
		<?php endforeach ?>
	</tr>
</table>

<?php foreach ($permissions as $key => $access_names): ?>
<table class="list">
	<tr>
		<td colspan="<?php echo count($groups) - 1 ?>"><?php echo $key ?></td>
	</tr>
	<?php foreach ($access_names as $name): ?>
		<tr>
			<td width="30%"><?php echo ucwords($name) ?></td>
			<?php foreach ($groups as $group): 
					$checked = FALSE;
					$disabled = FALSE;
					if (in_array($name, $group_permissions[$group->name])) 
					{
						$checked = TRUE;
					}
					
					if ($group->parent == 'login' AND preg_match('/^guest/', $key))
					{
						$checked = TRUE;
						$disabled = TRUE;
					}

					if ($group->parent == 'admin' AND preg_match('/^guest|^login/', $key))
					{
						$checked = TRUE;
						$disabled = TRUE;
					}
					
					if ($group->parent == 'login' AND preg_match('/^admin/', $key))
					{
						$checked = FALSE;
						$disabled = TRUE;
					}
					
					if ($group->parent == 'guest' AND preg_match('/^login|^admin/', $key)) 
					{
						$checked = FALSE;
						$disabled = TRUE;
					}
			?>
				<td align="center" width="<?php echo 70/count($groups) ?>%">
					<input type="checkbox" name="groups[<?php echo $group->id ?>][]" value="<?php echo $name ?>" <?php echo ($checked) ? 'checked="checked"' : '' ?> <?php echo ($disabled) ? 'disabled="disabled"' : '' ?> />	
				</td>
			<?php endforeach ?>
		</tr>
	<?php endforeach; ?>
</table>
<?php endforeach ?>
<input type="submit" name="submitbutton" value="Save" />
</form>