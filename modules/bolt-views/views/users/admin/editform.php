<?php defined('SYSPATH') or die('404 Not Found.');?>


	
<?php foreach ($user->inputs() as $label => $input): ?>
	<p>
    <label><?php echo $label ?></label> <br />
	<?php echo $input ?>
	</p>
<?php endforeach ?>
	