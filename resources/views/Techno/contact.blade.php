@extends('layouts._technos')

@section("title", 'اتصل بنا')
@section('content')

<section id="inner-headline text-right">
 
        <div class="row text-right ">
          <div class="col-lg-12 text-right">
            <ul class="breadcrumb ">
              <li><a href="{{ asset('/') }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
              <li class="active text-right">اتصل بنا</li>
            </ul>
          </div>
        </div>
     

    </section>

    
	  <section class="ftco-section contact-section">
      <div class="container">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate bg-light p-4">
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
	              <p> <a href="mailto:TechnoStar@gmail.org"><span class="text-right"> :البريد الالكتروني</span>TechnoStar@gmail.org</a> </p>
	            </div>
	            <div class="col-md-12 mb-3 text-right">
	              <p> <a href="http://youth.wac.ps/TechnoStar/"> <span class="text-right">:الموقع</span>http://youth.wac.ps/TechnoStar/</a> </p>
	            </div>
						</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form action="#" class="contact-form text-right">
            	<div class="row">
              <h2>اتصل بنا <small>الرجاء تعبئة الحقول بالاسفل</small></h2>
            <hr class="colorgraph">
            <div id="sendmessage">تم ارسال الرسالة شكرا لك!</div>
            <div id="errormessage"></div>
              <div class="col-md-6">
	                <div class="form-group text-right">
	                  <input type="text" class="form-control text-right" placeholder="البريد الالكتروني" data-rule="email">
                    <div class="validation"></div>
                  </div>
	                </div>
            		<div class="col-md-6">
	                <div class="form-group text-right">
	                  <input type="text" class="form-control text-right" placeholder="الاسم " data-rule="minlen:4">
                    <div class="validation"></div>
                  </div>
                </div>
               
              </div>
              <div class="form-group text-right">
                <input type="text" class="form-control text-right" placeholder="الموضوع" data-rule="minlen:4">
                <div class="validation"></div>
              </div>
              <div class="form-group text-right">
                <textarea name="" id="" cols="30" rows="7" class="form-control text-right" placeholder="رسالتك"></textarea>
                <div class="validation"></div>
                <hr class="colorgraph">
              </div>
              <div class="form-group text-right">
               
            <input type="submit" value="ارسل الرسالة" data-rule="required" class="btn btn-primary py-3 px-5 text-right">
            <div class="validation"></div>
           
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
     
    </section>

@endsection

@section("js")
<script src="contactform/contactform.js"></script>

@endsection