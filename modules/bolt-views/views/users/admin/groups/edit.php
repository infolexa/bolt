<?php defined('SYSPATH') or die('404 Not Found.');?>

<div id="groupslist">
	<form action="<?php echo URL::base().HTML::route('users', array('app' => Apps::aliasof('users'), 'controller' => 'groups', 'action' => 'edit', 'id' => $role->name)) ?>" method="post" accept-charset="utf-8">
	<fieldset id="edit_group" class="">
		<legend>Edit Group</legend>
		<p>
			<label>Unique Name</label> <br />
			<input type="text" name="name" value="<?php echo $role->name ?>" />
		</p>
		
		<p>
			<label>Group Title</label> <br />
			<input type="text" name="title" value="<?php echo $role->title ?>" />
		</p>
		
		<p>
			<label>Description</label> <br />
			<textarea cols="20" rows="5" name="description"><?php echo $role->description ?></textarea>
		</p>
		<p>
			<input type="submit" name="savebutton" value="Save" />
		</p>
	</fieldset>
	</form>
</div>