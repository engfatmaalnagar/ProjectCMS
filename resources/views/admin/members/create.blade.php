@extends("layouts._admin")

@section("title", "اضافة تصنيف جديد")

@section("content")
<form class="w-50" method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="name">اسم الكاتب:</label>
    <input autofocus value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="اسم الكاتب ">
    
</div>
    <div class="form-group">
    <label for="name">الاسم الوظيفي:</label>
    <input  value="{{ old('job_title') }}" type="text" class="form-control" id="name" name="job_title" placeholder="الاسم الوظيفي">

</div>
    <div class="form-group">
    <label for="email">البريد الالكتروني:</label>
    <input  value="{{ old('email') }}" type="email" class="form-control" id="name" name="email" placeholder="ادخل البريد الالكتروني ">
</div>

    <div class="form-group">
        <label for="fle_photo">صورة شخصية:</label>
        <input  type="file" class="form-control" id="name" name="fle_photo" placeholder="صورة شخصية ">
    </div>
    <div class="form-group">
    <label for="name">التفاصيل</label>
        <textarea type="text" class="form-control" id="name" name="details" placeholder="التفاصيل">{{ old('details') }}</textarea>
</div>

    <div class="form-group">
        <label for="name">رابط الفيس بوك:</label>
        <input  value="{{ old('facebook_url') }}" type="text" class="form-control" id="facebook_url" name="facebook_url" placeholder="رابط الفيس بوك">

    </div>
    <div class="form-group">
        <label for="name">رابط تويتر:</label>
        <input  value="{{ old('twitter_url') }}" type="text" class="form-control" id="twitter_url" name="twitter_url" placeholder="رابط تويتر">

    </div>
    <div class="form-group">
        <label for="name">رابط الينكدان:</label>
        <input  value="{{ old('linkedin_url') }}" type="text" class="form-control" id="linkedin_url" name="linkedin_url" placeholder="رابط النكدان">

    </div>
    <div class="form-group">
        <label for="name">رابط اليوتيوب:</label>
        <input  value="{{ old('youtube_url') }}" type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="رابط اليوتيوب">

    </div>
  <button type="submit" class="btn btn-primary">انشاء</button>
  <a class="btn btn-dark" href="{{ route('members.index') }}">الغاء الأمر</a>
</form>
@endsection
