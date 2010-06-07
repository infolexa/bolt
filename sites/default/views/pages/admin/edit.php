<?php defined('SYSPATH') or die('404 Not Found.');?>

<form action="<?php echo URL::base().HTML::route('admin/pages', array('group' => $group, 'action' => $action, 'id' => $id)) ?>" method="post" accept-charset="utf-8">
	<div>
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>

	<div class="grid_12">
		
	<div class="grid_9">
		<div class="box">
			<fieldset>
				<legend><?php echo $title ?></legend>
				<p>
				<label>URL</label> <br />
				<?php //echo $url ?>
				</p>
				<p>
				<label>Title</label> <br />
				<?php echo $page->input('title') ?>
				</p>
				<p>
				<label>Description</label> <br />
				<?php echo $page->input('description') ?>
				</p>

				<p>
					<label>Parent</label>

					<?php
					$options = array($parent->id => '--'.$parent->title.'--');
					foreach ($groups as $group)
					{
						if ($group->lft < $page->lft OR $group->rgt > $page->rgt) 
						{
							$options[$group->id] = str_repeat('-', ( $group->lvl - 2)) . $group->title;
						}
					}

					echo Form::select('parent', $options, $page->parent->id);
					?>
				</p>

				<?php if (isset($roles) AND $roles->count()): ?>
					<p>
						<label>User Groups</label>
						<select name="roles[]" multiple="multiple">
							<?php foreach($roles as $role): ?>
								<?php if (in_array($role->name, $page->roles)): ?>
									<option value="<?php echo $role->name ?>" selected='selected'><?php echo $role->title?></option>
								<?php else: ?>
									<option value="<?php echo $role->name ?>"><?php echo $role->title ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</p>
				<?php endif ?>

			</fieldset>
		</div>
	<?php //echo $pageconfig ?>
	</div>

	<div class="grid_3">
		<?php //echo $pagemeta ?>
	</div>

	</div>
	
	<div style="clear:both">
		<input type="submit" name="createbutton" value="Save and Go Back to List" />
		<input type="button" name="applybutton" value="Apply Changes" />
		<input type="button" name="cancelbutton" value="Cancel" />
	</div>

</form>