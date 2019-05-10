<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\MemberRequest;
use Session;


class MembersController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = Member::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.members.index", compact("items"));
    }

    public function trash(Request $request)
    {
        $q = $request->q;
        $items = Member::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.members.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.members.create");
    }

    public function store(MemberRequest $request)
    {
        if($request->fle_photo){
            $fileName = $request->fle_photo->store("public/images");
            $request['photo'] = basename($fileName);
        }
        Member::create($request->all());
        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        return redirect(route("members.create"));
    }

    public function edit($id)
    {
        $item = Member::find($id);
        if(!$item){
            Session::flash("msg", "e: الرجاء التأكد من الرابط");
            return redirect(route("members.index"));
        }
        return view("admin.members.edit", compact("item", "id"));
    }
    
    public function update(MemberRequest $request, $id)
    {
        if($request->photo){
            $fileName = $request->photo->store("public/images");
            $request['photo'] = basename($fileName);
        }

        Member::find($id)->update($request->all());
        Session::flash("msg","s: تمت عملية التعديل بنجاح");
        return redirect(route("members.index"));
    }

    public function destroy($id)
    {
        Member::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: تمت عملية الحذف بنجاح");
        return redirect(route("members.index"));
    }
    public function restore($id)
    {
        Member::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: تمت عملية الاسترجاع بنجاح");
        return redirect(route("members.trash"));
    }
}
