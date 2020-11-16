<?php

namespace App\Http\Controllers;

use App\BlogsComment;
use Illuminate\Http\Request;

class BlogsCommentController extends Controller
{
    public function addComment(Request $request, $id=null)
    {
        if($request->isMethod('post')){
			$data = $request->all();
        $rating= new BlogsComment;
        $rating->blog_id = $data['blog_id'];
        $rating->name = $data['name'];
        $rating->comment = $data['comment'];
		$rating->approve = $data['approve'];
    	$rating->save();

        return redirect()->back()->with('flash_message_success','Your comment is submitted for approval!');
        }
    }


   public function viewComments(Request $request){

		$comments = BlogsComment::get();

		$comments = json_decode(json_encode($comments));
		//echo "<pre>"; print_r($blogs); die;
		return view('admin.comments.view_Blogcomments')->with(compact('comments'));
    }

    public function approval(Request $request)
    {

    	$comment= BlogsComment::find($request->commentId);
    	$approveVal=$request->approve;
    	if($approveVal=='0'){
    		$approveVal=1;
    	}else{
    		$approveVal=0;
    	}

    	$comment->approve=$approveVal;
    	$comment->save();

    	return back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogsComment  $blogsComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogsComment $blogsComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogsComment  $blogsComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogsComment $blogsComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogsComment  $blogsComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogsComment $blogsComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogsComment  $blogsComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogsComment $blogsComment)
    {
        //
    }
}
