<?php
class Controller_Blog extends Controller_Template
{

	public function action_index()
	{
        $blogs = Model_Blog::find('all');
        $comment_links = array();
        foreach ($blogs as $blog)
        {
             $results  = DB::select()
            ->from('comments')
            ->where('blog_id', $blog->id)
            ->execute();
            
            $count = count($results);
            
            //$comment_links[$message->id] = "View | $count Comment(s)";
            if ($count == 0)
            {
                $comment_links[$blog->id] = 'View';
            }
            else
            {
                $comment_links[$blog->id] = $count.' '.Inflector::pluralize('Comment', $count);
            }
        }
        $view = View::forge('blog/index');
        $view->set('comment_links', $comment_links);
        $view->set('blogs', $blogs);
        
        //$view = View::forge('blog/index', array('blog' => $blogs));
        $this->template->title = "Blogs";
        $this->template->content = $view;

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('blog');

		if ( ! $blog = Model_Blog::find($id))
		{
			Session::set_flash('error', 'Could not find blog #'.$id);
			Response::redirect('blog');
		}
        $comments = Model_Comment::find('all', array('where' => array('blog_id' => $id)));
 
        $data = array(
            'blog' => $blog,
            'comments' => $comments
        );
 

		$this->template->title = "Blog";
		$this->template->content = View::forge('blog/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Blog::validate('create');

			if ($val->run())
			{
				$blog = Model_Blog::forge(array(
					'title' => Input::post('title'),
					'content' => Input::post('content'),
				));

				if ($blog and $blog->save())
				{
					Session::set_flash('success', 'Added blog #'.$blog->id.'.');

					Response::redirect('blog');
				}

				else
				{
					Session::set_flash('error', 'Could not save blog.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Blogs";
		$this->template->content = View::forge('blog/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('blog');

		if ( ! $blog = Model_Blog::find($id))
		{
			Session::set_flash('error', 'Could not find blog #'.$id);
			Response::redirect('blog');
		}

		$val = Model_Blog::validate('edit');

		if ($val->run())
		{
			$blog->title = Input::post('title');
			$blog->content = Input::post('content');

			if ($blog->save())
			{
				Session::set_flash('success', 'Updated blog #' . $id);

				Response::redirect('blog');
			}

			else
			{
				Session::set_flash('error', 'Could not update blog #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$blog->title = $val->validated('title');
				$blog->content = $val->validated('content');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('blog', $blog, false);
		}

		$this->template->title = "Blogs";
		$this->template->content = View::forge('blog/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('blog');

		if ($blog = Model_Blog::find($id))
		{
			$blog->delete();

			Session::set_flash('success', 'Deleted blog #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete blog #'.$id);
		}

		Response::redirect('blog');

	}

}
