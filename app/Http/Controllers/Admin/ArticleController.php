<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Type;
use App\Models\Photo;
use App\Models\Writer;
use App\Models\PhotoCategory;
use App\Http\Requests\ArticleRequest;
use Session;
class ArticleController extends BaseController
{
    //
    public function index(Request $request)
    {
        $types=Type::get();
        $categories=Category::get();
        $photos=Photo::get();
        $q = $request->q;
        $categories_id=$request->categories_id;
        $types_id=$request->types_id;
        $items = Article::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(title like ? or sub_title like ?)", ["%$q%","%$q%"]);
        }
        if($categories_id){
            $items->where("categories_id", $categories_id);
        }
        if($types_id){
            $items->where("types_id", $types_id);
        }        
        $items =  $items->orderBy("id","desc")->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.article.index", compact("items","types","categories","photos"));
    }
    public function trash(Request $request)
    {
        $photos=Photo::get();
        $types=Type::get();
        $categories=Category::get();
        $q = $request->q;
        $categories_id=$request->categories_id;
        $types_id=$request->types_id;
        $items = Article::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(title like ? or sub_title like ?)", ["%$q%","%$q%"]);
        }
        if($categories_id){
            $items->where("categories_id", $categories_id);
        }
        if($types_id){
            $items->where("types_id", $types_id);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.article.trash", compact("items","types","categories","photos"));
    }

    public function create()
    {
        $types=Type::where('deleted',0)->get();
        $writers=Writer::where('deleted',0)->get();
        $categories=Category::where('deleted',0)->get();
        $photos=Photo::where('deleted',0)->get();
        return view("admin.article.create",compact("types","categories","photocategories","photos","writers"));
    }

    public function store(ArticleRequest $request)
    {
        Article::create($request->all());
        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        return redirect(route("article.create"));
    }

    public function edit($id){
        $types=Type::where('deleted',0)->get();
        $writers=Writer::where('deleted',0)->get();
        $categories=Category::where('deleted',0)->get();
        $photos=Photo::where('deleted',0)->get();
        $item = Article::find($id);
        if(!$item){
            Session::flash("msg", "e: الرجاء التأكد من الرابط");
            return redirect(route("article.index"));
        }
        return view("admin.article.edit", compact("item", "id","photos","writers","types","categories"));
    }
    
    public function update(ArticleRequest $request, $id)
    {
        Article::find($id)->update($request->all());
        Session::flash("msg","s: تمت عملية التعديل بنجاح");
        return redirect(route("article.index"));
    }

    public function destroy($id)
    {
        Article::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: تمت عملية الحذف بنجاح");
        return redirect(route("article.index"));
    }
    public function restore($id)
    {
        Article::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: تمت عملية الاسترجاع بنجاح");
        return redirect(route("article.trash"));
    }
}
