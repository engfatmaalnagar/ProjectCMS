@extends('layouts._technos')

@section("title", $item->title)
@section('content')
@if($items->total()>0)
        <div class="alert alert-info mb-3">يوجد {{ $items->total() }} نتائج لعملية البحث</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>الاعلان</th>
                    
                    <th width="5%"> كود؟</th>
                    <th width="13%">تاريخ الانتهاء</th>
                    <th width="13%">آخر تعديل</th>
                    <th width="13%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td><input type="checkbox" disabled {{ $item->is_code?"checked":"" }} /></td>
                    <td>{{ $item->expire_at }}</td>
                    <td>{{ $item->created_at }}</td>
                   
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