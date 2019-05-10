@extends("layouts._admin")

@section("title", "تعديل نوع مقال")

@section("content")
<form class="w-50" method="POST" action="{{ route('type.update', $item->id) }}">
@csrf
@method("put")
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="name">نوع المقال</label>
    <input autofocus value="{{ $item->name }}" type="text" class="form-control" id="name" name="name" placeholder="نوع المقال">
    
</div>
  <button type="submit" class="btn btn-primary">حفظ</button>
  <a class="btn btn-dark" href="{{ route('type.index') }}">الغاء الأمر</a>
</form>
@endsection
