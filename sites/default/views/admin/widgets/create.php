<?php defined('SYSPATH') or die('404 Not Found.');?>

<h2>Create Widget</h2>

<form action="<?php echo URL::base().HTML::route('admin/widgets', array('type' => $type, 'action' => 'create')) ?>" method="post" accept-charset="utf-8">
	
	<div class="span-16 buttons last">
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>

<?php 
echo View::factory('admin/widgets/editform')
	->set('widget', $widget)
	->render() 
?>

	<div class="span-16 buttons last">
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>

</form>
