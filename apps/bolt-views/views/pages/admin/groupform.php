<?php defined('SYSPATH') or die('404 Not Found.');?>

<div class="grid_12">
	<div class="box">
		<fieldset>
			<legend>Create Page Group</legend>
		<p>
		<label>Title</label> <br />
		<?php echo $page->input('title') ?>
		</p>
		<p>
		<label>Description</label> <br />
		<?php echo $page->input('description') ?>
		</p>
		</fieldset>
	</div>
</div>