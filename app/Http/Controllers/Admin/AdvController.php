<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Adv;
use App\Models\AdvLocation;
use App\Http\Requests\AdvRequest;
use Session;
class AdvController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = adv::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(title like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.adv.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = adv::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(title like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.adv.trash", compact("items"));
    }

    public function create()
    {
         $advsLocation = AdvLocation::get();
        return view("admin.adv.create", compact("advsLocation"));
    }

    public function store(AdvRequest $request)
    {
        adv::create($request->all());
        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        return redirect(route("adv.create"));
    }

    public function edit($id)
    {
        $item = adv::find($id);
        if(!$item){
            Session::flash("msg", "e: الرجاء التأكد من الرابط");
            return redirect(route("adv.index"));
        }
        $advsLocation = AdvLocation::get();
        return view("admin.adv.edit", compact("item", "id", "advsLocation"));
    }
    
    public function update(AdvRequest $request, $id)
    {
        adv::find($id)->update($request->all());
        Session::flash("msg","s: تمت عملية التعديل بنجاح");
        return redirect(route("adv.index"));
    }

    public function destroy($id)
    {
        adv::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: تمت عملية الحذف بنجاح");
        return redirect(route("adv.index"));
    }
    public function restore($id)
    {
        adv::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: تمت عملية الاسترجاع بنجاح");
        return redirect(route("adv.trash"));
    }
}