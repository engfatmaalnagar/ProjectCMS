@extends("layouts._admin")

@section("title", "المستخدمين ")

@section("content")
    
    <form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="ادخل كلمة البحث" name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> بحث</button>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('users.create') }}"><i class='fa fa-plus'></i>   مستخدم جديد</a>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">يوجد {{ $items->total() }} نتائج لعملية البحث</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>اسم المستخدم</th>
                    <th>الايميل </th>
                    <th width="20%">آخر تعديل</th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm btn-warning" href='{{ route("users.links", ["id" => $item->id]) }}' title='صلاحيات'><i class='fa fa-lock'></i></a>  
                        <a class="btn btn-sm btn-primary" href='{{ route("users.edit", ["id" => $item->id]) }}' title='تعديل'><i class='fa fa-edit'></i></a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("users.delete", $item->id) }}' title='حذف'><i class='fa fa-trash'></i></a>
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
