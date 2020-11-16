<?php

namespace App\Http\Controllers;

use App\ProductsComment;
use App\Product;
use Illuminate\Http\Request;

class ProductsCommentController extends Controller
{

    public function addComment(Request $request, $id=null)
    {
        if($request->isMethod('post')){
			$data = $request->all();
        $rating= new ProductsComment;
        $rating->product_id = $data['product_id'];
        $rating->name = $data['name'];
        $rating->rating = $data['rating'];
        $rating->comment = $data['comment'];
		$rating->approve = $data['approve'];
    	$rating->save();

        return redirect()->back()->with('flash_message_success','Your review is submitted for approval!');
    }
    }


   public function viewComments(Request $request){

		$comments = ProductsComment::get();

		$comments = json_decode(json_encode($comments));
		//echo "<pre>"; print_r($blogs); die;
		return view('admin.comments.view_comments')->with(compact('comments'));
    }

    public function approval(Request $request)
    {

    	$comment= ProductsComment::find($request->commentId);
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




}
