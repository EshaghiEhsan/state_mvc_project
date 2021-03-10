<?php
namespace App\Http\Controllers\Admin;



use App\Categore;
use System\Request\Request;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends AdminController{

    public function index()
    {
        $categories=Categore::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        $categories=Categore::whereNull('parent_id')->get();
        return view('admin.category.create',compact('categories'));
    }

    public function store()
    {
        $request=new CategoryRequest();
        $inputs=$request->all();
        if (empty($request->parent_id)){
            unset($inputs['parent_id']);
        }
        Categore::create($inputs);
        return redirect('admin/category');
    }

    public function edit($id)
    {
        $category=Categore::find($id);
        $categories=Categore::all();
        return view('admin.category.edit',compact('categories','category'));
    }

    public function update($id)
    {

        $request=new CategoryRequest();
        $inputs=$request->all();
        Categore::update(array_merge($inputs,['id'=>$id]));
        return redirect('admin/category');
    }

    public function destroy($id)
    {
        Categore::delete($id);
        return back();
    }




}
