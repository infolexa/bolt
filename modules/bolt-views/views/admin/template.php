<?php defined('SYSPATH') or die('404 Not Found.');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<?php 
		echo HTML::head();		
		HTML::styles(array(
			'themes/default/css/reset.css',
			'themes/default/css/text.css',
			'themes/default/css/grid.css',
			'themes/default/css/layout.css',
			'themes/default/css/nav.css'), 'screen');
	?>

	</head>
	<body>
		<div class="container_12">
			<div class="grid_12">
				<h1 id="branding">Admin -<?php echo HTML::title() ?></h1>
			</div>
			
			<div class="grid_12">
				<h2 id="page-heading">Hm...</h2>
			</div>
			<div class="grid_12">
				<div class="grid_3">
					<?php echo Widgets::display('left', 'xhtml') ?>
				</div>
				<div class="grid_9">
					<?php if (count($messages)): ?>
						
						<div class="box">
							<h2>Messages</h2>
							<div class="block">
							<?php
								foreach ($messages as $key => $value) 
								{
									echo '<div class="messages '.$key.'">';
									if (is_array($value)) 
									{
										echo '<ul>';
										foreach ($value as $message) 
										{
											echo '<li>'.$message.'</li>';
										}
										echo '</ul>';
									}else
									{
										echo $value;
									}
									echo '</div>';
								}
							?>
							</div>
						</div>
					<?php endif ?>
					<?php echo $content ?>	
				</div>
			</div>
			<div class="grid_12">
				<?php echo Widgets::display('footer', 'xhtml') ?>
				<div id="kohana-profiler">
				<?php echo View::factory('profiler/stats') ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</body>
</html>
