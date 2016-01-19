<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('comments/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('comments/create','Create');?></li>

</ul>
<?php $blog = isset($blog) ? $blog : ''; ?>
<h2 class="first">New Comment</h2>
<?php echo $form; ?>
<p><?php echo Html::anchor('blog/view/'.$message, 'Back'); ?></p>
<p>Create</p>