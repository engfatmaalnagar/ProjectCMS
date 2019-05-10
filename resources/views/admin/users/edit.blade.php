@extends("layouts._admin")

@section("title", " تعديل المستخدم")

@section("content")
<form class="w-50" method="POST" action="{{ route('users.update', $item->id) }}">
@csrf
@method("put")
  <div class="form-group">
    <label for="name">اسم المستخدم</label>
    <input autofocus value="{{ $item->name }}" type="text" class="form-control" id="name" name="name" placeholder="اسم المستخدم ">
    
</div>

<div class="form-group">
    <label for="email"> الايميل</label>
    <input autofocus value="{{ $item->email }}" type="text" class="form-control" id="email" name="email" placeholder=" الايميل ">
    
</div>
  <button type="submit" class="btn btn-primary">حفظ</button>
  <a class="btn btn-dark" href="{{ route('users.index') }}">الغاء الأمر</a>
</form>
@endsection
