<h2>Viewing <span class='muted'>#<?php echo $blog->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $blog->title; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $blog->content; ?></p>

    <?php if (Auth::instance()->check()) : ?>
    <p><?php echo Html::anchor('comments/create/'.$message->id, 'Add new Comment'); ?></p>
    <?php endif; ?>
<?php echo Html::anchor('blog/edit/'.$blog->id, 'Edit'); ?> |
<?php echo Html::anchor('blog', 'Back'); ?>

<h3>Comments</h3>
<ul>
<?php foreach ($comments as $comment) : ?>
    <li>
        <ul>
            <li><strong>Name:</strong> <?php echo $comment->name; ?></li>
            <li><strong>Comment:</strong><br /><?php echo $comment->comment; ?></li>
            <li><p><?php echo Html::anchor('comments/edit/'.$comment->id, 'Edit'); ?>|
            <?php echo Html::anchor('comments/delete/'.$comment->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></li>
        </ul>
    </li>
<?php endforeach; ?>
</ul>