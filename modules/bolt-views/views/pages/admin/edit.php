<?php defined('SYSPATH') or die('404 Not Found.');?>

<form action="<?php echo URL::base().HTML::route('admin/pages', array('group' => $group, 'action' => 'edit', 'id' => $page->id)) ?>" method="post" accept-charset="utf-8">
	<div>
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>

	<div class="grid_12">
	<?php 
	if (strtolower($group) == 'root'):
		echo View::factory('pages/admin/groupform')->set('page', $page)->render();
	else:
		echo View::factory('pages/admin/pageform')->set('page', $page)->set('parent', $parent)->set('groups', $groups)->render();
	endif?>
	</div>
	
	<div>
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>

</form>