@extends('layouts._sailor')

@section("title", 'اتصل بنا')
@section('content')

<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumb">
              <li><a href="{{ asset('/') }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
              <li class="active">اتصل بنا</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2>اتصل بنا <small>الرجاء تعبئة الحقول بالاسفل</small></h2>
            <hr class="colorgraph">
            <div id="sendmessage">تم ارسال الرسالة شكرا لك!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="اسمك" data-rule="minlen:4"
                  data-msg="الرجاء ادخل على الاقل 4 حروف" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="بريدك الالكتروني" data-rule="email"
                  data-msg="الرجاء ادخل بريد صحيح" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="العنوان" data-rule="minlen:4"
                  data-msg="الرجاء ادخل على الاقل 8 حروف" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="الرجاء اكتب رسالتك الينا"
                  placeholder="الرسالة"></textarea>
                <div class="validation"></div>
              </div>

              <div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md">ارسال</button></div>
            </form>
            <hr class="colorgraph">

          </div>
        </div>
      </div>
    </section>

@endsection

@section("js")
<script src="contactform/contactform.js"></script>

@endsection