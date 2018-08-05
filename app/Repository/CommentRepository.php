<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Comment;

/**
 * App CommentRepository
 */
class CommentRepository extends Repository
{

    /**
	 * @var Comment
	 */
    protected $model;

	public function __construct(Comment $comment)
	{
		$this->model    = $comment;
	}

    /**
     * @param int $postId
     * @return Builder
     */
    public function getAllByPost(int $postId)
    {
        return $this->model->newQuery()->where('post_id', $postId)->orderBy('created_at', 'desc');
    }

    /**
     * @param Request $request
     */
    public function save(Request $request)
    {
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->content = $request->content;
        $comment->save();
    }

    /**
     * @param Request $request
     */
    public function delete(Request $request)
    {
        Comment::find($request->comment_id)->delete();
    }
}