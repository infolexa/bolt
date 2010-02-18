<?php defined('SYSPATH') or die('404 Not Found.');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php 
	echo HTML::head();		
	HTML::styles('themes/css/screen.css', 'screen');
	?>

	
  </head>
  <body>
    <div class="container">
      <h1><?php echo HTML::title() ?></h1>
      <hr>
		<?php echo Widgets::load('menu', 'xhtml') ?>
	  <hr>
      <h2 class="alt">This sample page demonstrates a tiny fraction of what you get with Bolt.</h2>
      <hr>
      <div class="span-7 colborder">
        <h6>Here's a box</h6>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
      </div>
      <div class="span-8 colborder">
        <h6>And another box</h6>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat laboris nisi ut aliquip.</p>
      </div>
      <div class="span-7 last">
        <h6>This box is aligned with the sidebar</h6>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
      </div>
      <hr>
      <hr class="space">
      <div class="span-15 prepend-1 colborder">
        <?php echo $content ?>
      </div>
      <div class="span-7 last">
        <?php echo Widgets::load('right', 'xhtml') ?>
      </div>
      <hr>
      <h2 class="alt">You may pick and choose amongst these and many more features, so be bold.</h2>
      <hr>
    </div>
  </body>
</html>
