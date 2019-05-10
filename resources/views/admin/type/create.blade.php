@extends("layouts._admin")

@section("title", "اضافة نوع مقال جديد")

@section("content")
<form class="w-50" method="POST" action="{{ route('type.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="name">نوع المقال</label>
    <input autofocus value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="نوع المقال">
    
</div>
  <button type="submit" class="btn btn-primary">انشاء</button>
  <a class="btn btn-dark" href="{{ route('type.index') }}">الغاء الأمر</a>
</form>
@endsection
