
@extends('layouts._technos')
@section("title", 'البوم الصور - ' . $item->name)
@section('content')

<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="{{ asset('/') }}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{{ asset('/Technophotos') }}"><i class="fa fa-picture"></i> البومات الصور</a></li>
                    <li class="active">{{$item->name}}</li>
                </ul>
            </div>
        </div>

        
    </div>
</section>



<section id="content">
			<div class="container">
   @if($item->photos->count()>0)
        <div class="row">
    @foreach($item->photos as $photo)
					<div class="col-sm-6 article-item col-md-4" style="margin-bottom:30px;">
						<a target="_blank" href="{{ asset('thumb.php?size=900x700&src=storage/images/' . $photo->file) }}" class="thumbnail">
						<img class="media-object" src="{{ asset('thumb.php?size=350x230&src=storage/images/' . $photo->file) }}" alt="{{ $item->name }}">
						<div class="caption">
                            <h4>{{ $item->name }}</h4>
                            <span class='label label-info'># {{ $photo->tag }}</span>
							
                            <div class='text-left'><small>{{ $item->created_at }}</small></div>
						</div>
						</a>
					</div>
                    @endforeach
      </div>
    @else
        <div class="alert alert-warning">
            نأسف لا يوجد نتائج لعرضها  :(
        </div>
    @endif
            </div></section>
@endsection