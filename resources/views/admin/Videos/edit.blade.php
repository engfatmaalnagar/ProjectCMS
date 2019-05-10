@extends("layouts._admin")

@section("title", " تعديل فيديو ")

@section("content")
<form class="w-50" method="POST" action="{{ route('video.update', $item->id) }}">
@csrf
@method("put")
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="title">الفيديو</label>
    <input type="text" class="form-control" id="title"  autofocus value="{{ $item->title }}" name="title" placeholder="أدخل اسم الفيديو">
    
</div>
    
<div class="form-group">
    <label for="url"> الرابط</label>
    <input type="text" class="form-control" id="url" name="url" value="{{ $item->url }}" placeholder="أدخل رابط الفيديو">
    <a href="#url"> </a>
</div>
    <div class="form-group">
    <label for="photo_categories_id">تصنيفات الفيديو</label>
    <select class="form-control" id="video_categories_id" name="video_categories_id">
        <option value="">اختيار التصنيف للفيديو</option>
        @foreach($videoCategory as $category)
            <option {{ $item->video_categories_id==$category->id?"selected":"" }} 
            value="{{ $category->id }}">{{ $category->name }}
            </option>
        @endforeach
    </select>
</div>



  <button type="submit" class="btn btn-primary">حفظ</button>
  <a class="btn btn-dark" href="{{ route('video.index')}}">إلغاء الامر</a>
</form>
@endsection
