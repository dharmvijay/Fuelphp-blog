<ul class="nav nav-pills">
    <?php if ($comment->name == Auth::instance()->get_screen_name()) : ?>
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('comments/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('comments/create','Create');?></li>
    <?php endif; ?>
</ul>
<h2>Editing Comment</h2>
<br/>
<?php $blog = isset($blog) ? $blog : ''; ?>
<?php echo $form; ?>
<p><?php echo Html::anchor('blog/view/'.$comment->blog_id, 'Back'); ?></p>
<p>Edit</p>