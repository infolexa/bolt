<?php defined('SYSPATH') or die('404 Not Found.');?>

<?php foreach ($params as $key => $value): ?>
	<p>
		<label><?php echo ucwords($key) ?></label> <br />
		<?php echo Form::input('params['.$key.']', $value) ?>
	</p>
<?php endforeach ?>