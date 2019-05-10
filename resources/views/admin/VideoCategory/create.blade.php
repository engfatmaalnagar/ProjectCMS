@extends("layouts._admin")

@section("title", "اضافة تصنيف للفيديو ")

@section("content")
<form class="w-50" method="POST" action="{{ route('video-category.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="name">التصنيفات للفيديو</label>
    <input autofocus value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="اضافة تصنيف فيديو">
    
</div>
  <button type="submit" class="btn btn-primary">انشاء</button>
  <a class="btn btn-dark" href="{{ route('video-category.index') }}">الغاء الأمر</a>
</form>
@endsection
