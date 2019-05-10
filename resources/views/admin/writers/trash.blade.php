@extends("layouts._admin")

@section("title", "الكتاب - سلة المهملات")

@section("content")
    
    <form class="row mb-3">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="ادخل كلمة البحث" name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> بحث</button>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">يوجد {{ $items->total() }} نتائج لعملية البحث</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>الكاتب</th>
                    <th>الاسم الوظيفي</th>
                    <th>البريد الالكتروني</th>
                    <th width="20%">آخر تعديل</th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                <td>{{ $item->name }}</td>
                    <td>{{ $item->job_title }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm confirm btn-warning" href='{{ route("writers.restore", ["id" => $item->id]) }}'><i class='fa fa-redo'></i> استرجاع</a>
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
