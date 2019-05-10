<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
	<title>@yield("title")</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
	<!--end::Web font -->

	<link href="{{ asset('yogalax/bootstrap-rtl/css/bootstrap.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('yogalax/css/open-iconic-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('yogalax/css/animate.css')}}">

	<link rel="stylesheet" href="{{asset('yogalax/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('yogalax/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('yogalax/css/magnific-popup.css')}}">

	<link rel="stylesheet" href="{{asset('yogalax/css/aos.css')}}">

	<link rel="stylesheet" href="{{asset('yogalax/css/ionicons.min.css')}}">

	<link rel="stylesheet" href="{{asset('yogalax/css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('yogalax/css/jquery.timepicker.css')}}">


	<link rel="stylesheet" href="{{asset('yogalax/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('yogalax/css/icomoon.css')}}">
	<link rel="stylesheet" href="{{asset('yogalax/css/style.css')}}">
	<style>
		html,
		body,
		.form-control,
		.btn {
			font-family: 'Tajawal', sans-serif;
		}

		.icon-bar {
			position: fixed;
			top: 50%;
			-webkit-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
		}

		/* Style the icon bar links */
		.icon-bar a {
			display: block;
			text-align: center;
			padding: 16px;
			transition: all 0.3s ease;
			color: white;
			font-size: 20px;
		}

		/* Style the social media icons with color, if you want */
		.icon-bar a:hover {
			background-color: #000;
		}

		.facebook {
			background: #3B5998;
			color: white;
		}

		.twitter {
			background: #55ACEE;
			color: white;
		}

		.google {
			background: #dd4b39;
			color: white;
		}

		.linkedin {
			background: #007bb5;
			color: white;
		}

		.youtube {
			background: #bb0000;
			color: white;
		}
	</style>

	@yield("css")
</head>

<body>
	<div class="container-fluid">
		<div class="row" style="background-color:grey;">
			<div class="col-md-6">
				<a class="navbar-brand" href="{{ asset('/home') }}"><img src="/yogalax/images/pho/logo.png" alt="" width="199" height="52" /></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">

				</button></div>
			<div class="col-md-6">
				<ul class="center-right-info ">
					<li><i class="fa fa-phone "></i> <a href="tel:+62 088 999 123">+62 088 999 123</a></li>
				</ul>
			</div>





		</div>


	</div>

	<div class="hero-wrap js-fullheight" style="background-image: url('/yogalax/images/home-bg.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center right-content-start  ">
				<div class="col-md-8 ftco-animate">
					<div class=" mb-3 " style="width:100px;"></div>
					<h1 class="typewrite text-right  mb-3 " style="margin-right:150px;" data-period="4000" data-type='[ "الفيديو والمونتاج","حاضنة تكنوستار.", "تطوير مواقع  ويب", "تطبيقات الموبايل"]'>
						<span class="wrap"></span>
					</h1>
					<h2 class="mb-5 text-left "> يسعدنا تواصلكم ومشاركتكم هدفنا </h2>
					<!--p><a href="#" class="btn btn-primary p-3 px-4"> </a></p!-->
				</div>
			</div>
		</div>

		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
				<div class="collapse navbar-collapse " id="ftco-nav">
					<ul class="navbar-nav ">

						<li class="nav-item active"> <a class="nav-link" href="{{ asset('/home') }}">الرئيسية</a></li>
						<li class=" nav-item  dropdown">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">عن الحاضنة <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu">
								<?php
								$pages = \App\Models\StaticPage::where("active", 1)->orderBy('id', 'desc')->take(3)->get();
								?>
								@foreach($pages as $page)

								<li><a href="{{ asset('/staticpage/'.$page->id) }}">{{ $page->title }}</a></li>
								@endforeach
							</ul>
						</li>
						<li class=" nav-item  dropdown">
							<a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">الصور <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu">
								<?php
								$categories = \App\Models\PhotoCategory::where("deleted", 0)->where("published", 1)->orderBy("name")->take(10)->get();
								?>
								@foreach($categories as $category)
								<li><a href="{{ asset('/Technophoto/'.$category->id) }}">{{ $category->name }}</a></li>
								@endforeach
								<li><a href="{{ asset('/Technophotos') }}">جميع الالبومات</a></li>
							</ul>
						</li>
						<!--li class="dropdown nav-item">
								<a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">الفيديو <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<?php
									$categories = \App\Models\VideoCategory::where("deleted", 0)->orderBy("name")->get();
									?>
									@foreach($categories as $category)
									<li><a href="{{ asset('/Technovideos/'.$category->id) }}">{{ $category->name }}</a></li>
									@endforeach
									<li class="nav-item"><a href="{{ asset('/Technovideos') }}" class=" nav-link ">جميع الالبومات</a></li>
								</ul>
							</li-->
						<li class="nav-item"><a href="{{ asset('/Technocontact') }}" class=" nav-link ">اتصل بنا</a></li>
					</ul>



				</div>


				<div class="input-group col-md-6">
					<div class="input-group-append ">
						<button class="btn btn-primary" type="button">ابحث</button>
					</div>
					<input type="text-right" class="form-control text-right" style="color:grey;" placeholder="ابحث عن">

				</div>

			</div>
			<div class="icon-bar left">
				<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
				<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
				<a href="#" class="google"><i class="fa fa-google"></i></a>
				<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
				<a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
			</div>
		</nav>
	</div>



	<!-- END nav -->

	<div class="container-fluid">
@yield("content")
</div>
	<footer class="ftco-footer ftco-section img">
		<div class="overlay"></div>



		<section class="ftco-section contact-section">


			<div class="container">
				<div class="row text-right">



                           
						<div class="col-sm-3 col-lg-4 text-right">


								<div class="row">
									<div class="col-md-12 mb-4 text-right">
										<h2 class="h4">معلومات التواصل</h2>
									</div>
									<div class="col-md-12 mb-3 text-right">
										<p><span>العنوان:</span> شارع اللبابيدي , عمارة السعيد الطابق السادس</p>
									</div>
									<div class="col-md-12 mb-3 text-right">
										<p><span>الهاتف:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
									</div>
									<div class="col-md-12 mb-3 text-right">
										<p><span class="text-right"> :البريد الالكتروني</span> <a href="mailto:TechnoStar@gmail.org">TechnoStar@gmail.org</a> </p>
									</div>
									<div class="col-md-12 mb-3 text-right">
										<p> <span class="text-right">:الموقع</span> <a href="http://youth.wac.ps/TechnoStar/">http://youth.wac.ps/TechnoStar/</a></p>
									</div>
								</div>

					</div>

				

					<div class="col-sm-3 col-lg-4 text-right">
						<div class="widget  mb-4 ">
							<div class="ftco-footer-widget mb-4">
								<h4>الصفحات</h4>
								<ul class="link-list  list-unstyled">
									<?php
									$pages = \App\Models\StaticPage::where("deleted", 0)->orderBy("title")->take(5)->select('id', 'title')->get();
									?>
									@foreach($pages as $item)
									<li><a href="{{ asset('/staticpage/'.$item->id) }}">{{ $item->title }}</a></li>
									@endforeach
									<li><a href="{{ asset('/Technocontact') }}">اتصل بنا</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-lg-4 text-right">
						<div class="widget text-right">
							<div class="ftco-footer-widget mb-4">
								<h1 class="logo"> <a class="navbar-brand" href="{{ asset('/home') }}"><img src="/yogalax/images/pho/logo.png" alt="" width="199" height="52" /></a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"></h1>
							</div>

							<p>الرجاء ادخال بريدك الالكتروني للحصول على اخر الاخبار</p>
							<div class="form-group multiple-form-group input-group text-right">
								<span class="input-group-btn">
									<button type="button" class="btn-center btn-theme btn-add text-right">اشتراك</button>
								</span>
								<input type="email" name="email" class="form-control text-right">

							</div>

						</div>
						<div class="row">

							<div class="ftco-footer-widget mb-4">
								<ul class="ftco-footer-social list-unstyled float-md-right float-lft">
									<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
									<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
									<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
								</ul>
							</div>

						</div>
					</div>









				</div>


			</div>


<div class='container'>
	
<div class="row">
				<div class="col-md-12 text-center">

					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						تم انجازهCopyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> هذا مشروع كورس php larvel <i aria-hidden="true"></i>
				</div>
			</div>
</div>
		</section>
	</footer>



	<!-- loader -->
	@yield("js")

	<script src="{{ asset('yogalax/js/jquery.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/jquery-migrate-3.0.1.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/popper.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/jquery.easing.1.3.js')}}"></script>
	<script src="{{ asset('yogalax/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/jquery.stellar.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/owl.carousel.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/aos.js')}}"></script>
	<script src="{{ asset('yogalax/js/jquery.animateNumber.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{ asset('yogalax/js/jquery.timepicker.min.js')}}"></script>
	<script src="{{ asset('yogalax/js/scrollax.min.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="{{ asset('yogalax/js/google-map.js')}}"></script>
	<script src="{{ asset('yogalax/js/main.js')}}"></script>
</body>

</html>