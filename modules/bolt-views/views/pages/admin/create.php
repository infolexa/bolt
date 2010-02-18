<?php defined('SYSPATH') or die('404 Not Found.');?>

<form action="<?php echo URL::base().HTML::route('pages', array('group' => $group, 'action' => 'create', 'type' => $type)) ?>" method="post" accept-charset="utf-8">
	<div>
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>
	<div class="span-20 last">
		<div class="span-14">
			<?php echo $formbody ?>
		</div>
		<div class="span-6 last">
			<?php echo $config ?>
		</div>
	</div>
	<div>
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>

</form>