@extends("layouts._admin")

@section("title", "اضافة شريحة جديد")

@section("content")
<form class="w-50" method="POST" action="{{ route('slider.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="title">العنوان</label>
    <input autofocus value="{{ old('title') }}" type="text" class="form-control" id="title" name="title" placeholder="العنوان">
    </div>
    <div class="form-group">
    <label for="title">العنوان الفرعي</label>
    <input value="{{ old('subtitle') }}" type="text" class="form-control" id="subtitle" name="subtitle" placeholder="العنوان الفرعي">
    </div>
    <div class="form-group">
    <label for="button_text">نص الزر</label>
    <input value="{{ old('button_text') }}" type="text" class="form-control" id="button_text" name="button_text" placeholder="النص بداخل الزر">
    </div>
     <div class="form-group">
    <label for="url">الرابط</label>
    <input value="{{ old('url') }}" type="text" class="form-control" id="url" name="url" placeholder="الرابط">
    </div>
     <div class="form-group">

      <input value="{{ old('image') }}" type="hidden" class="form-control" id="image" name="image" placeholder="اصورة">
      <a title="استعراض الصور" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>اختر صورة للاعلان</span></a>
      <div class="imgShow"></div>
    </div>
    <div class="form-group">
<div class="custom-control custom-checkbox">
  <input type="hidden" name="active" value="0" />
  <input  {{ old("active")?"checked":"" }} value="1" type="checkbox" name="active" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1">فعالية الشريحة</label>
</div>
</div>
    
  <button type="submit" class="btn btn-primary">انشاء</button>
  <a class="btn btn-dark" href="{{ route('slider.index') }}">الغاء الأمر</a>
</form>
@endsection

@section("js")
  <script>
    function setImage(imageId, imageUrl){
      imageUrl = imageUrl.replace(/^.*[\\\/]/, '')
      $("#image").val(imageUrl);
      $(".imgShow").html('<img src="/storage/images/'+imageUrl+'" class="img-thumbnail w-50" />');
      $("#iframeModal").modal("hide");
    }
    if($("#image").val()!=''){
      $(".imgShow").html('<img src="/storage/images/'+$("#image").val()+'" class="img-thumbnail w-50" />');
    }
  </script>
@endsection
