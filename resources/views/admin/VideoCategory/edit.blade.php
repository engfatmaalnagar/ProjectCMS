@extends("layouts._admin")

@section("title", "تعديل تصنيف قيديو ")

@section("content")
<form class="w-50" method="POST" action="{{ route('video-category.update', $item->id) }}">
@csrf
@method("put")
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="name">التصنيف</label>
    <input autofocus value="{{ $item->name }}" type="text" class="form-control" id="name" name="name" placeholder="تصنيف الفيديو">
    
</div>
  <button type="submit" class="btn btn-primary">حفظ</button>
  <a class="btn btn-dark" href="{{ route('video-category.index') }}">الغاء الأمر</a>
</form>
@endsection
