<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->postRepository    =  $postRepository;
        $this->urlRedirect = url()->current() . "#comment";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        $postId = $this->postRepository->getFirst($request->post_id);

        if(!$postId){
            return back()->with('error', 'L\' article n\'existe pas');
        }

        $this->commentRepository->save($request);

        return redirect($this->urlRedirect);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
