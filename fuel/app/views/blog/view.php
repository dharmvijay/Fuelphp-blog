<h2>Viewing <span class='muted'>#<?php echo $blog->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $blog->title; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $blog->content; ?></p>

    <?php if (Auth::instance()->check()) : ?>
    <p><?php echo Html::anchor('comments/create/'.$blog->id, 'Add new Comment'); ?></p>
    <?php echo Html::anchor('blog/edit/'.$blog->id, 'Edit'); ?> |
    <?php endif; ?>
<?php echo Html::anchor('blog', 'Back'); ?>

<h3>Comments</h3>
<ul>
<?php foreach ($comments as $comment) : ?>
    <li>
        <ul>
            <li><strong>Name:</strong> <?php echo $comment->name; ?></li>
            <li><strong>Comment:</strong><br /><?php echo $comment->comment; ?></li>
            <?php
                if (Auth::instance()->check())
                {
                    echo "<li><p>". Html::anchor('comments/edit/'.$comment->id, 'Edit')." |"; 
                }
                ?>
            <?php
                if (Auth::instance()->check())
                {
                    echo Html::anchor('comments/delete/'.$comment->id, 'Delete', array('onclick' => "return confirm('Are you sure?')"))."</li>";
                }
                ?>
        </ul>
    </li>
<?php endforeach; ?>
</ul>