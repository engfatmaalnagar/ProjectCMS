@extends("layouts._admin")
@section("title", "إدارة الفيديو")

@section("content")



<form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="ادخل كلمة البحث" name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="video_categories_id" name="video_categories_id">
                <option value="">اختيار التصنيف للفيديو</option>
                @foreach($videoCategory as $category)
                    <option {{ request()->video_categories_id ==$category->id?"selected":"" }} 
                    value="{{ $category->id }}">{{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> بحث</button>
        </div>
        
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('video.create') }}"><i class='fa fa-plus'></i> اضافة تصنيف جديد</a>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">يوجد {{ $items->total() }} نتائج لعملية البحث</div>
        <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>اسم الفيديو</th>
                <th>تصنيف الفيديو </th>
                <th width="15%">تاريخ الاضافة</th>
                <th width="5%">النشر</th>
                <th width="25%"></th>
            </tr>
        </thead>
        <tbody>
       
                @foreach($items as $item)
                <tr>
                    <td><a href='{{ $item->url }}' target='_blank'>{{ $item->title }}</a></td>
                    <td>{{ $item->VideoCategory->name}}</td>
                    <td>{{ $item->created_at }}</td>
                    <td><input type="checkbox" {{ $item->published?"checked":""}} disabled /></td>
                    <td class="text-right">           
                        <a class="btn btn-sm btn-primary" href='{{ route("video.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> تعديل</a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("video.delete", $item->id) }}'><i class='fa fa-trash'></i> حذف</a>
                        <a style="width:100px" class="btn btn-sm btn-{{ $item->published?"warning":"info" }} confirm" href='{{ route("video.published", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> {{ $item->published?"الغاء النشر":"نشر" }}</a>  
                        
                    </td>
             

            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    
    <div class="alert alert-warning">
            نأسف لا يوجد نتائج لعرضها  :(
        </div>
    @endif
@endsection
 



                             
