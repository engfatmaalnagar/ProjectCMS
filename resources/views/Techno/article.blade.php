@extends('layouts._technos')

@section("title", $item->title)
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
				<div class="row">
					<div class="col-lg-8">
						<article>
							<div class="post-image">
								<div class="post-heading">
									<h3>{{ $item->title }}</h3>
								</div>
								<img src="{{ asset('thumb.php?size=800x500&src=storage/images/' . $item->photos->file) }}" alt="" class="img-responsive" />
							</div>
							<p>
                            {{ $item->details }}
                            </p>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="fa fa-calendar"></i> {{ $item->created_at }}</li>
									<li><i class="fa fa-user"></i>{{ $item->writer?$item->writer->name:'' }}</li>
									<li><i class="fa fa-folder-open"></i><a href="{{ asset('/articles?category='.$item->categories_id) }}"> {{ $item->category->name }}</a></li>
						
								</ul>
							</div>
						</article>
						<div class="clear"></div>
                    </div>
                    
                    
					<div class="col-lg-4">
						<aside class="right-sidebar">
							<div class="widget">
                                <h5 class="widgetheading">التصنيفات</h5>
                                
								<ul class="cat">
                                    <?php
                                        $articleCategories = \App\Models\Category::where("deleted",0)->orderBy("name")->take(10)->get();
                                    ?>
                                    @foreach($articleCategories as $category)
                                    <li><i class="fa fa-angle-left"></i> <a href="{{ asset('/articles?category='.$category->id) }}">{{ $category->name }} ({{ $category->articles->count() }})</a></li>
                                    @endforeach
                                </ul>
							</div>
							<div class="widget">
								<h5 class="widgetheading">اخر المقالات</h5>
								<ul class="recent">
                                    @foreach($articles as $article)
									<li>
                                        
										<img src="{{ asset('thumb.php?size=100x60&src=storage/images/' . $article->photos->file) }}" class="pull-left" alt="" />
										<h6><a href="{{ asset('article/' . $article->id ) }}">{{ $article->title }}</a></h6>
										<p>
                                            {{ $article->summary }}
                                        </p>
                                        {{ $article->created_at }}
                                        <hr>
                                    </li>
                                    @endforeach
								</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</section>
@endsection
