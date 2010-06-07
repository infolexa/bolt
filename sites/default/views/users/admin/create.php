<?php defined('SYSPATH') or die('404 Not Found.');?>

<h2>Create User</h2>

<form action="<?php echo URL::base().HTML::route('admin/users/manage', array('action' => 'create')) ?>" method="post" accept-charset="utf-8">
	
	
	<div class="buttons">
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="savecreatebutton" value="Save and Create Another One" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>

	<?php echo $editform ?>

	<div class="buttons">
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="savecreatebutton" value="Save and Create Another One" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>

</form>
