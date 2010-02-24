<?php defined('SYSPATH') or die('404 Not Found.');?>

<h2>Edit Widget [<?php echo $widget->title ?>]</h2>

<form action="<?php echo URL::base().HTML::route('widgets', array('type' => $type, 'action' => 'edit', 'id' => $id)) ?>" method="post" accept-charset="utf-8">
	
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