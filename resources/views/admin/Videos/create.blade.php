@extends("layouts._admin")

@section("title", " إنشاء فيديو جديد")

@section("content")
<form class="w-50" method="POST" action="{{ route('video.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="title">الفيديو</label>
    <input type="text" autofocus value="{{ old('title') }}" class="form-control" id="title" name="title" placeholder="أدخل اسم الفيديو">
    
</div>
    
<div class="form-group">
    <label for="url"> الرابط</label>
    <input type="text"  value="{{ old('url') }}"class="form-control" id="url" name="url" placeholder="أدخل رابط الفيديو">
    <a href="#url"> </a>
</div>
    <div class="form-group">
    <label for="photo_categories_id">تصنيفات الفيديو</label>
    <select class="form-control" id="video_categories_id" name="video_categories_id">
        <option value="">اختيار التصنيف للفيديو</option>
        @foreach($videoCategory as $category)
            <option {{ old("video_categories_id")==$category->id?"selected":"" }} 
            value="{{ $category->id }}">{{ $category->name }}
            </option>
        @endforeach
    </select>
</div>



  <button type="submit" class="btn btn-primary">إنشاء</button>
  <a class="btn btn-dark" href="{{ route('video.index')}}">إلغاء الامر</a>
</form>
@endsection
