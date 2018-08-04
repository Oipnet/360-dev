<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComment;
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
     * @param int $postId
     */
    public function save(Request $request)
    {
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();
    }
}