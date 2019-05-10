@extends("layouts._admin")

@section("title", "تعديل تصنيف مقال")

@section("content")
<form class="w-50" method="POST" action="{{ route('members.update', $item->id) }}">
@csrf
@method("put")
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
    <div class="form-group">
        <label for="name">اسم الكاتب:</label>
        <input autofocus value="{{ $item->name }}" type="text" class="form-control" id="name" name="name" placeholder="اسم الكاتب ">

    </div>
    <div class="form-group">
        <label for="name">الاسم الوظيفي:</label>
        <input  value="{{ $item->job_title }}" type="text" class="form-control" id="name" name="job_title" placeholder="الاسم الوظيفي">

    </div>
    <div class="form-group">
        <label for="email">البريد الالكتروني:</label>
        <input  value="{{ $item->email }}" type="email" class="form-control" id="name" name="email" placeholder="ادخل البريد الالكتروني ">
    </div>

    <div class="form-group">
        <label for="fle_photo">صورة شخصية:</label>
        <input type="file" class="form-control" id="fle_photo" name="fle_photo" placeholder="صورة شخصية ">
        @if($item->photo)
            <img src='{{ asset("storage/images/" . $item->photo) }}' class="mt-2 w-50 img-fluid img-thumbnail" />
        @endif
    </div>
    <div class="form-group">
        <label for="name">التفاصيل</label>
        <textarea type="text" class="form-control" id="name" name="details" placeholder="التفاصيل">{{ $item->details }}</textarea>
    </div>

    <div class="form-group">
        <label for="name">رابط الفيس بوك:</label>
        <input  value="{{$item->facebook_url }}" type="text" class="form-control" id="name" name="facebook_url" placeholder="رابط الفيس بوك">

    </div>
    <div class="form-group">
        <label for="name">رابط تويتر:</label>
        <input  value="{{ $item->twitter_url }}" type="text" class="form-control" id="name" name="twitter_url" placeholder="رابط تويتر">

    </div>
    <div class="form-group">
        <label for="name">رابط الينكدان:</label>
        <input  value="{{$item->linkedin_url }}" type="text" class="form-control" id="name" name="linkedin_url" placeholder="رابط النكدان">

    </div>
    <div class="form-group">
        <label for="name">رابط اليوتيوب:</label>
        <input  value="{{ $item->youtube_url }}" type="text" class="form-control" id="name" name="youtube_url" placeholder="رابط اليوتيوب">

    </div>
  <button type="submit" class="btn btn-primary">حفظ</button>
  <a class="btn btn-dark" href="{{ route('members.index') }}">الغاء الأمر</a>
</form>
@endsection
