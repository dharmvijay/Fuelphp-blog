<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<fieldset>
        <div class="form-group">
            <?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
            <?php echo Auth::instance()->get_screen_name(); ?>
            <?php //echo Form::input('name', ''); ?>
        </div>
        <div class="form-group">
            <?php echo Form::label('Comment', 'comment', array('class'=>'control-label')); ?>
            <?php echo Form::textarea('comment', Input::post('comment', isset($comment) ? $comment->comment : ''), array('cols' => 60, 'rows' => 8)); ?>
        </div>
        <div class="actions">
            <?php echo Form::hidden('blog_id', Input::post('blog_id', isset($blog) ? $blog : '')); ?>
            <?php echo Form::submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
        </div>
    </fieldset>
	</fieldset>
<?php echo Form::close(); ?>