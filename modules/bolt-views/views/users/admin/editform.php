<?php defined('SYSPATH') or die('404 Not Found.');?>


	
<?php foreach ($user->meta()->fields as $label => $field): ?>
	<p>
    <label><?php echo ucwords(Inflector::humanize($label)) ?></label> <br />
	<?php echo $user->input($label) ?>
	</p>
	
<?php endforeach ?>
	