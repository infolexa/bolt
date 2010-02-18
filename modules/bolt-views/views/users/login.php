<form action="<?php echo URL::site(html::route('users', array('action' => 'login'))) ?>" method="post" name="loginform">
<fieldset>
<h3>Login</h3>
<ol>
<li>
<label>Email Address</label> 
<input type="text" name="email" value="" class="inputbox" size="20" />
</li>
<li>
<label>Password</label> 
<input type="password" name="password" value="" class="inputbox" size="20" /> <br />
<label><input type="checkbox" name="remember" value="1" /> Remember Me </label>
</li>
</ol>
<p>
<input type="submit" name="loginbutton" value="Login" />
</p>

<p class="options">
<?php echo html::aroute('users', array('action' => 'registration'), 'I Want to Sign Up!'); ?> 
&nbsp;&nbsp;|&nbsp;&nbsp; 
<?php echo html::aroute('users', array('action' => 'remind'), 'I Forgot My Password'); ?> 
</p>

</fieldset>
</form>