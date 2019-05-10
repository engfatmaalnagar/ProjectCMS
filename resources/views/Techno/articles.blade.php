
@extends('layouts._technos')
@section("title", 'المقالات')
@section('content')

<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="{{ asset('/') }}"><i class="fa fa-home"></i></a></li>
							<li class="active">المقالات</li>
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
        <div class="form-group col-sm-3">
          <select class="form-control" id="category" name="category">
          <option value="">اختر التصنيف</option>
            @foreach($categories as $category)
             <option {{ request()->category==$category->id?"selected":"" }} value="{{ $category->id }}">{{ $category->name }} </option>
            @endforeach
         </select>
        </div>
        <div class="form-group col-sm-3">
          <select class="form-control" id="types_id" name="types_id">
          <option value="">اختر النوع</option>
            @foreach($types as $type)
             <option {{ request()->types_id==$type->id?"selected":"" }} value="{{ $type->id }}">{{ $type->name }} </option>
            @endforeach
         </select>
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
    @foreach($items as $article)
					<div class="col-sm-6 article-item col-md-4" style="margin-bottom:30px;">
						<a href="{{ asset('article/' . $article->id ) }}" class="thumbnail">
						<img class="media-object" src="{{ asset('thumb.php?size=350x230&src=storage/images/' . $article->photos->file) }}" alt="{{ $article->title }}">
						<div class="caption">
							<h4>{{ $article->title }}</h4>
                            <p>{{ $article->summary }}</p>
                            <span class='label label-info'>{{ $article->category->name }}</span>
							<div class='text-left'><small>{{ $article->created_at }}</small></div>
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