<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\VideoCategory;
use App\Http\Requests\VideoCategoryRequest;
use Session;
class VideoCategoryController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = VideoCategory::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.VideoCategory.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = VideoCategory::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.VideoCategory.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.VideoCategory.create");
    }

    public function store(VideoCategoryRequest $request)
    {
        VideoCategory::create($request->all());

        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        return redirect(route("video-category.create"));
    }

    public function edit($id)
    {
        $item = VideoCategory::find($id);
        if(!$item){
            Session::flash("msg", "e: الرجاء التأكد من الرابط");
            return redirect(route("video-category.index"));
        }
        return view("admin.VideoCategory.edit", compact("item", "id"));
    }
    

    public function published($id)
    {  
        $videCategory = VideoCategory::find($id);
        $videCategory->published = !$videCategory->published;
        $videCategory->save();
        Session::flash("msg","s: تمت عملية النشر  بنجاح");
        return redirect(route("video-category.index"));
    }
    public function update(VideoCategoryRequest $request, $id)
    {
        VideoCategory::find($id)->update($request->all());
        Session::flash("msg","s: تمت عملية التعديل بنجاح");
        return redirect(route("video-category.index"));
    }

    public function destroy($id)
    {
        VideoCategory::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: تمت عملية الحذف بنجاح");
        return redirect(route("video-category.index"));
    }
    public function restore($id)
    {
        VideoCategory::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: تمت عملية الاسترجاع بنجاح");
        return redirect(route("video-category.trash"));
    }
}