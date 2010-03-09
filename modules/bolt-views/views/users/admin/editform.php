<?php defined('SYSPATH') or die('404 Not Found.');?>

<fieldset>
	<legend>Login Information</legend>
	<p>
    	<label><?php echo __('Username'); ?>:</label> <br />
		<?php echo Form::input('username', $user->username) ?>
	</p>
	
	<p>
    	<label><?php echo __('Email Address'); ?>:</label> <br />
		<?php echo Form::input('email', $user->email); ?>
	</p>
	
	<p>
    	<label><?php echo __('Password'); ?>:</label> <br />
		<?php echo Form::password('password', NULL); ?>
	</p>
	
	<p>
    	<label><?php echo __('Confirm Password') ?>:</label> <br />
		<?php echo Form::password('password_confirm', NULL); ?>
	</p>
	
	<p>
    	<label><?php echo __('Roles'); ?>:</label> <br />
		<?php echo $user->input('roles'); ?>
	</p>
</fieldset>