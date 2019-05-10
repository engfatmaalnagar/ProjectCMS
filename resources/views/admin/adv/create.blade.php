@extends("layouts._admin")

@section("title", "اضافة اعلان جديد")

@section("content")
<form class="w-50" method="POST" action="{{ route('adv.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="title">العنوان</label>
    <input autofocus value="{{ old('title') }}" type="text" class="form-control" id="title" name="title" placeholder="العنوان">
    </div>
    <div class="form-group">
<div class="custom-control custom-checkbox">
  <input type="hidden" value="0"  name="is_code" />
  <input  {{ old("is_code")?"checked":"" }} type="checkbox" value="1" name="is_code" class="custom-control-input" id="is_code">
  <label class="custom-control-label" for="is_code">هل هو كود؟</label>
</div>

     <div class="form-group notCode">
    <label for="url">الرابط</label>
    <input value="{{ old('url') }}" type="text" class="form-control" id="url" name="url" placeholder="الرابط">
    </div>
     <div class="form-group notCode">

      <input value="{{ old('photo') }}" type="hidden" class="form-control" id="photo" name="photo" placeholder="اصورة">
      <a title="استعراض الصور" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>اختر صورة للاعلان</span></a>
      <div class="imgShow"></div>
    </div>
     <div class="form-group code">
    <label for="code">الكود</label>
    <textarea class="form-control" id="code" name="code" placeholder="الكود">{{ old('code') }}</textarea>
    </div>
</div>
    <div class="form-group">
    <label for="adv_locations_id">مكان الاعلان</label>
    <select class="form-control" id="adv_locations_id" name="adv_locations_id">
    <option value="">اختر مكان الاعلان</option>
        @foreach($advsLocation as $advlocation)
            <option {{ old("adv_locations_id")==$advlocation->id?"selected":"" }} value="{{ $advlocation->id }}">{{ $advlocation->name }} </option>
        @endforeach
    </select>
</div>
      <div class="form-group">
    <label for="start_at">تاريخ البدء</label>
    <input autofocus value="{{ old('start_at') }}" type="text" class="form-control" id="start_at" name="start_at" placeholder="تاريخ البدء">
    </div>
 <div class="form-group">
    <label for="title">تاريخ الانتهاء</label>
    <input autofocus value="{{ old('expire_at') }}" type="text" class="form-control" id="expire_at" name="expire_at" placeholder="تاريخ الانتهاء">
    </div>

    
    
  <button type="submit" class="btn btn-primary">انشاء</button>
  <a class="btn btn-dark" href="{{ route('adv.index') }}">الغاء الأمر</a>
</form>
@endsection

@section("js")
  <script>
      $("#is_code").change(function(){
        if($(this).is(":checked")){
          $(".code").show();
          $(".notCode").hide();
        }
        else{
          $(".code").hide();
          $(".notCode").show();
        }
      }).change();


      
    function setImage(imageId, imageUrl){
      imageUrl = imageUrl.replace(/^.*[\\\/]/, '')
      $("#photo").val(imageUrl);
      $(".imgShow").html('<img src="/storage/images/'+imageUrl+'" class="img-thumbnail w-50" />');
      $("#iframeModal").modal("hide");
    }
    if($("#photo").val()!=''){
      $(".imgShow").html('<img src="/storage/images/'+$("#photo").val()+'" class="img-thumbnail w-50" />');
    }
  </script>
@endsection
