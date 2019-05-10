<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>@yield("title")</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Bootstrap 3 template for corporate business" />
    <!-- css -->
    
	<link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
		
	<link href="{{ asset("bootstrap-rtl/css/bootstrap.css") }}" rel="stylesheet" />
    
    <link href="{{ asset("Sailor/plugins/flexslider/flexslider.css") }}" rel="stylesheet" media="screen" />
	<link href="{{ asset("Sailor/css/cubeportfolio.min.css") }}" rel="stylesheet" />
	<link href="{{ asset("Sailor/css/style.css") }}" rel="stylesheet" />

	<!-- Theme skin -->
	<link id="t-colors" href="{{ asset("Sailor/skins/default.css") }}" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="{{ asset("Sailor/bodybg/bg1.css") }}" rel="stylesheet" type="text/css" />

	@yield("css")
</head>
<body>



	<div id="wrapper">
		<!-- start header -->
		<header>
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<ul class="topleft-info">
								<li><i class="fa fa-phone"></i> <a href="tel:+62 088 999 123">+62 088 999 123</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search" title="Click to start searching"></span>
								</form>
							</div>


						</div>
					</div>
				</div>
			</div>

			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a class="navbar-brand" href="{{ asset('/home') }}"><img src="/Sailor/img/logo.png" alt="" width="199" height="52" /></a>
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
							<li><a href="{{ asset('/home') }}">الرئيسية</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">المقالات <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<?php
										$articleCategories = \App\Models\Category::where("deleted",0)->orderBy("name")->take(10)->get();
									?>
									@foreach($articleCategories as $category)
									<li><a href="{{ asset('/articles?category='.$category->id) }}">{{ $category->name }}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">الصور <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<?php
										$categories = \App\Models\PhotoCategory::where("deleted",0)->where("published",1)->orderBy("name")->take(10)->get();
									?>
									@foreach($categories as $category)
									<li><a href="{{ asset('/photo/'.$category->id) }}">{{ $category->name }}</a></li>
									@endforeach
									<li><a href="{{ asset('/photos') }}">جميع الالبومات</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">الفيديو <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<?php
										$categories = \App\Models\VideoCategory::where("deleted",0)->orderBy("name")->get();
									?>
									@foreach($categories as $category)
									<li><a href="{{ asset('/video/'.$category->id) }}">{{ $category->name }}</a></li>
									@endforeach
									<li><a href="{{ asset('/videos') }}">جميع الالبومات</a></li>
								</ul>
							</li>
							<li><a href="{{ asset('/contact') }}">اتصل بنا</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		@yield("content")
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>اتصل بنا او راسلنا</h4>
							<address>
					<strong>شركة سايلور</strong><br>
					 غزة الرمال مقابل الجامعة<br>
					 الجهة الجنوبية الغربية </address>
							<p>
								<i class="icon-phone"></i> <a href='tel:(123) 456-7890'>(123) 456-7890</a> - <a href='tel:(123) 555-7891'>(123) 555-7891</a> <br>
								<i class="icon-envelope-alt"></i> <a href='mailto:email@domainname.com'>email@domainname.com</a>
							</p>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>المقالات</h4>
							<ul class="link-list">
								@foreach($articleCategories as $category)
								<li><a href="{{ asset('/articles?category='.$category->id) }}">{{ $category->name }}</a></li>
								@endforeach
							</ul>
						</div>

					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>الصفحات</h4>
							<ul class="link-list">
								<?php
									$pages = \App\Models\StaticPage::where("deleted",0)->orderBy("title")->take(10)->select('id','title')->get();
								?>
								@foreach($pages as $item)
								<li><a href="{{ asset('/page/'.$item->id) }}">{{ $item->title }}</a></li>
								@endforeach
								<li><a href="{{ asset('/contact') }}">اتصل بنا</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>القائمة البريدية</h4>
							<p>الرجاء ادخال بريدك الالكتروني للحصول على اخر الاخبار</p>
							<div class="form-group multiple-form-group input-group">
								<input type="email" name="email" class="form-control">
								<span class="input-group-btn">
                            <button type="button" class="btn btn-theme btn-add">اشتراك</button>
                        </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="copyright">
								<p>&copy; جميع الحقوق محفوظة {{ date("Y") }} Sailor</p>
								<div class="credits">
									تم تطويره من قبل <a href="https://visionplus.ps/">Wac Group</a>
								</div>
							</div>
						</div>
						<div class="col-lg-12 text-center">
							<ul class="social-network">
								<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		
		
		
		
		
		
		</footer>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{ asset("Sailor/js/jquery.min.js") }}"></script>
	<script src="{{ asset("Sailor/js/modernizr.custom.js") }}"></script>
	<script src="{{ asset("Sailor/js/jquery.easing.1.3.js") }}"></script>
	<script src="{{ asset("Sailor/js/bootstrap.min.js") }}"></script>
	<script src="{{ asset("Sailor/plugins/flexslider/jquery.flexslider-min.js") }}"></script>
	<script src="{{ asset("Sailor/plugins/flexslider/flexslider.config.js") }}"></script>
	<script src="{{ asset("Sailor/js/jquery.appear.js") }}"></script>
	<script src="{{ asset("Sailor/js/stellar.js") }}"></script>
	<script src="{{ asset("Sailor/js/classie.js") }}"></script>
	<script src="{{ asset("Sailor/js/uisearch.js") }}"></script>
	<script src="{{ asset("Sailor/js/jquery.cubeportfolio.min.js") }}"></script>
	<script src="{{ asset("Sailor/js/google-code-prettify/prettify.js") }}"></script>
	<script src="{{ asset("Sailor/js/animate.js") }}"></script>
	<script src="{{ asset("Sailor/js/custom.js") }}"></script>
    @yield("js")

</body>

</html>
