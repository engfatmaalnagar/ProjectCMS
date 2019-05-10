
@extends('layouts._sailor')
@section("title", 'البوم الفيديو')
@section('content')

<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="{{ asset('/') }}"><i class="fa fa-home"></i></a></li>
							<li class="active">البوم الفيديو</li>
						</ul>
					</div>
				</div>
			</div>
        </section>
        <section id="content">
			<div class="container">
    <form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="ادخل كلمة البحث" name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-2">
            <select name='order_by' class='form-control'>
                <option value="">رتب حسب</option>
                <option {{ request()->order_by=='1'?'selected':'' }} value="1">الاحدث الى الاقدم</option>
                <option {{ request()->order_by=='2'?'selected':'' }} value="2">الاقدم الى الاحدث </option>
                <option {{ request()->order_by=='3'?'selected':'' }} value="3">ابجدي تصاعدي</option>
                <option {{ request()->order_by=='4'?'selected':'' }} value="4">ابجدي تنازلي</option>
            </select>
        </div>
        <div class="col-sm-1">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> بحث</button>
        </div>
        
    </form>
    @if($items->total()>0)
    <div class="row">
    @foreach($items as $video)
					<div class="col-sm-6 article-item col-md-4" style="margin-bottom:30px;">
                        <a href="{{ asset('video/' . $video->id ) }}" class="thumbnail">
                        <div class="caption">
							<h4>{{ $video->name }} ({{ $video->Video->count() }})</h4>
                            <small>{{ $video->created_at }}</small>
                        </div>
						</a>
					</div>
                    @endforeach
</div>
        {{ $items->links() }}
    @else
        <div class="alert alert-warning">
            نأسف لا يوجد نتائج لعرضها  :(
        </div>
    @endif
            </div></section>
@endsection