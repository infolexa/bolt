<?php defined('SYSPATH') or die('404 Not Found.');?>

<div style="width: 500px; margin: 0 auto;">
	<form action="<?php echo URL::site(html::route('users/guest', array('action' => 'login'))) ?>" method="post" name="loginform">
	<fieldset class="login">
	<legend>Login</legend>

	<p>
	<label>Email Address</label> 
	<input type="text" name="email" value="" class="inputbox" size="20" />
	</p>
	<p>
	<label>Password</label> 
	<input type="password" name="password" value="" class="inputbox" size="20" /> <br />
	</p>
	<p>
		<label>Remember</label>
		<input type="checkbox" name="remember" value="1"  />
	</p>
	
	<input type="submit" class="confirm button" name="loginbutton" value="Login" />

	</fieldset>
	</form>
</div>
<div class="clear"></div>