<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if(session()->get('adminDetails')['categories_full_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

    		$category = new Category;
    		$category->name = $data['category_name'];
            $category->slug = $data['slug'];
            $category->parent_id = $data['parent_id'];
    		$category->description = $data['description'];
            $category->status = $status;

    		$category->save();
    		return redirect('/admin/view-categories')->with('flash_message_success', 'Category has been added successfully');
    	}

        $levels = Category::where(['parent_id'=>0])->get();
    	return view('admin.categories.add_category')->with(compact('levels'));
    }
    public function editCategory(Request $request,$id=null){
        if(session()->get('adminDetails')['categories_full_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

            Category::where(['id'=>$id])->update(['status'=>$status,'name'=>$data['category_name'],'parent_id'=>$data['parent_id'],'description'=>$data['description'],'slug'=>$data['slug']]);
            return redirect()->back()->with('flash_message_success', 'Category has been updated successfully');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }
    public function deleteCategory($id = null){
        if(session()->get('adminDetails')['categories_full_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        $products = Product::where(['category_id'=>$id])->count();
        if($products > 0){

            return redirect()->back()->with('flash_message_success', 'Error deleting category');
       }else{
        Category::where(['id'=>$id])->forceDelete();
        return redirect()->back()->with('flash_message_success', 'Category has been deleted successfully');
    }}
    public function viewCategories(){
        if(session()->get('adminDetails')['categories_view_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
    }

