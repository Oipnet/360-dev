<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use App\Http\Requests\StoreComment;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;
    
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var string
     * redirect link
     */
    private $urlRedirect;

    /**
     * @param CommentRepository
     * 
     */
    public function __construct(CommentRepository $commentRepository, PostRepository $postRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->postRepository    = $postRepository;
        $this->urlRedirect       = url()->current() . "#comment";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request) : RedirectResponse
    {
        $postId = $this->postRepository->getFirst($request->post_id);

        if(!$postId){
            return back()->with('error', 'L\' article n\'existe pas');
        }

        $this->commentRepository->save($request);

        return redirect($this->urlRedirect);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreComment $request) : RedirectResponse
    {
        $this->authorize('update', Comment::find($request->comment_id));

        $this->commentRepository->update($request);

        return redirect($this->urlRedirect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) : RedirectResponse
    {
        $this->authorize('delete', Comment::find($request->comment_id));

        $this->commentRepository->delete($request);

        return redirect($this->urlRedirect);
    }
}
