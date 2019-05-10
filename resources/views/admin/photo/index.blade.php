@extends("layouts._admin")

@section("title", " ادارةالصور")

@section("content")
    
    <form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="ادخل كلمة البحث" name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="photo_categories_id" name="photo_categories_id">
                <option value="">جميع التصنيفات</option>
                @foreach($categories as $photocategory)
                    <option {{ request()->photo_categories_id ==$photocategory->id?"selected":"" }} value="{{ $photocategory->id }}">{{ $photocategory->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> بحث</button>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('photo.create') }}"><i class='fa fa-plus'></i> اضافة صورة جديدة</a>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">يوجد {{ $items->total() }} نتائج لعملية البحث</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th width="20%">تصنيف الصورة</th>
                    <th width="10%">نشر</th>
                    <th width="15%">وسم الصورة</th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                <td>@if($item->file)
                <div style="width:100px;height:100px; overflow:hidden; background-image:url({{ asset("storage/images/".$item->file) }});background-size:cover">

                </div>
   
                    @endif</td>
                    <td>{{ $item->photocategory->name }}</td>
                    <td><input type="checkbox" {{ $item->published?"checked":""}} disabled /></td>
                    <td>{{ $item->tag}}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm btn-primary" href='{{ route("photo.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> تعديل</a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("photo.delete", $item->id) }}'><i class='fa fa-trash'></i> حذف</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    @else
        <div class="alert alert-warning">
            نأسف لا يوجد نتائج لعرضها  :(
        </div>
    @endif
@endsection
