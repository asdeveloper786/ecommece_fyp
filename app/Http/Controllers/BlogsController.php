<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogsComment;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogsController extends Controller
{
    public function addBlog(Request $request){

        if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

    		$blog = new Blog;
    		$blog->title = $data['title'];
            $blog->slug = $data['slug'];
            $blog->description = $data['description'];

           	// Upload Image
               if($request->hasFile('image')){
                ini_set('memory_limit','256M');
            	$image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/frontend_images/blog/large'.'/'.$fileName;
                    $medium_image_path = 'images/frontend_images/blog/medium'.'/'.$fileName;
                    $small_image_path = 'images/frontend_images/blog/small'.'/'.$fileName;

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                     $blog->image = $fileName;


                }
            }


            $blog->status = $status;

    		$blog->save();
    		return redirect('/admin/view-blogs')->with('flash_message_success', 'blog has been added successfully');
    	}


    	return view('admin.blogs.add_blog');
    }
    public function viewBlogs(Request $request){

		$blogs = Blog::get();

		$blogs = json_decode(json_encode($blogs));
		//echo "<pre>"; print_r($blogs); die;
		return view('admin.blogs.view_blogs')->with(compact('blogs'));
    }

    public function deleteBlog($id = null){

        Blog::where(['id'=>$id])->forceDelete();
        return redirect()->back()->with('flash_message_success', 'Blog has been deleted successfully');
    }
    public function editBlog(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

			// Upload Image
            if($request->hasFile('image')){
            	$image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/frontend_images/blog/large'.'/'.$fileName;
                    $medium_image_path = 'images/frontend_images/blog/medium'.'/'.$fileName;
                    $small_image_path = 'images/frontend_images/blog/small'.'/'.$fileName;

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                }
            }else if(!empty($data['current_image'])){
            	$fileName = $data['current_image'];
            }else{
            	$fileName = '';
            }

            Blog::where(['id'=>$id])->update(['status'=>$status,'title'=>$data['title'],'slug'=>$data['slug'],'description'=>$data['description'],'image'=>$fileName]);
            return redirect()->back()->with('flash_message_success', 'Blog has been updated successfully');
        }
        $blogDetails = Blog::where(['id'=>$id])->first();

        return view('admin.blogs.edit_blog')->with(compact('blogDetails'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function blogs(Request $request){

	$blogs = Blog::get();

		$blogs = json_decode(json_encode($blogs));
		//echo "<pre>"; print_r($blogs); die;
		return view('blogs.all')->with(compact('blogs'));

}
public function blog($id){

	   // Get blog Details
       $blogDetails = Blog::where('id',$id)->first();
       $blogDetails = json_decode(json_encode($blogDetails));

       $comments=BlogsComment::where('blog_id',$id)->get();

          return view('blogs.detail')->with(compact('blogDetails','comments'));

}
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
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
