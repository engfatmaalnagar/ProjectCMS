@extends("layouts._admin")

@section("title", "المقالات - سلة المهملات ")

@section("content")
<form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="ادخل كلمة البحث" name="q" autofocus class="form-control" />
        </div>
        <div class="form-group col-sm-3">
          <select class="form-control" id="categories_id" name="categories_id">
          <option value="">اختر التصنيف</option>
            @foreach($categories as $category)
             <option {{ $category->categories_id==$category->id?"selected":"" }} value="{{ $category->id }}">{{ $category->name }} </option>
            @endforeach
         </select>
        </div>
        <div class="form-group col-sm-3">
          <select class="form-control" id="types_id" name="types_id">
          <option value="">اختر النوع</option>
            @foreach($types as $type)
             <option {{ $type->types_id==$type->id?"selected":"" }} value="{{ $type->id }}">{{ $type->name }} </option>
            @endforeach
         </select>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> بحث</button>
        </div>
        
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">يوجد {{ $items->total() }} نتائج لعملية البحث</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>عنوان المقال</th>
                    <th width="10%">تصنيف المقال </th>
                    <th width="10%">نوع المقال </th>
                    <th width="10%"> نشر المقال</th>
                    <th width="10%">نشر بالرئيسية </th>
                    <th width="10%"> آخر تعديل </th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->type->name }}</td>
                    <td><input type="checkbox" disabled {{ $item->published?"checked":""}} /></td>
                    <td><input type="checkbox" disabled {{ $item->in_home?"checked":""}} /></td>
                    <td>{{ $item->date }}</td><td> 
                    <td> 
                    <div class="btn-group" role="group" aria-label="Basic example">          
                        <a class="btn btn-sm confirm btn-warning" href='{{ route("article.restore", ["id" => $item->id]) }}'><i class='fa fa-redo'></i> استرجاع</a>
                    </div>
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
