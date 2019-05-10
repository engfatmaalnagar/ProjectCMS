@extends('layouts._sailor')

@section("title", $item->title)
@section('content')
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="{{ asset('/') }}"><i class="fa fa-home"></i></a></li>
							<li class="active">الصفحات الثابتة</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<article>
							<div class="post-image">
								<div class="post-heading">
									<h3>{{ $item->title }}</h3>
								</div>
								<img src="{{ asset('thumb.php?size=800x500&src=storage/images/' . $item->image) }}" alt="" class="img-responsive" />
							</div>
							<p>
                            {{ $item->details }}
                            </p>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="fa fa-calendar"></i> {{ $item->created_at }}</li>
								</ul>
							</div>
						</article>
						<div class="clear"></div>
                    </div>
                    
                    
				</div>
			</div>
		</section>
@endsection
