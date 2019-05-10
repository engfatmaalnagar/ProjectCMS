<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Writer;
use App\Http\Requests\WriterRequest;
use Session;


class WritersController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = Writer::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.writers.index", compact("items"));
    }

    public function trash(Request $request)
    {
        $q = $request->q;
        $items = Writer::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.writers.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.writers.create");
    }

    public function store(WriterRequest $request)
    {
        if($request->fle_photo){
            $fileName = $request->fle_photo->store("public/images");
            $request['photo'] = basename($fileName);
        }
        Writer::create($request->all());
        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        return redirect(route("writers.create"));
    }

    public function edit($id)
    {
        $item = Writer::find($id);
        if(!$item){
            Session::flash("msg", "e: الرجاء التأكد من الرابط");
            return redirect(route("writers.index"));
        }
        return view("admin.writers.edit", compact("item", "id"));
    }
    
    public function update(WriterRequest $request, $id)
    {
        if($request->photo){
            $fileName = $request->photo->store("public/images");
            $request['photo'] = basename($fileName);
        }

        Writer::find($id)->update($request->all());
        Session::flash("msg","s: تمت عملية التعديل بنجاح");
        return redirect(route("writers.index"));
    }

    public function destroy($id)
    {
        Writer::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: تمت عملية الحذف بنجاح");
        return redirect(route("writers.index"));
    }
    public function restore($id)
    {
        Writer::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: تمت عملية الاسترجاع بنجاح");
        return redirect(route("writers.trash"));
    }
}
