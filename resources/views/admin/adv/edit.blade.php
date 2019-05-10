@extends("layouts._admin")

@section("title","تعديل اعلان ")

@section("content")
<div id="app">
    <form class="w-50" method="POST" action="{{route('adv.update',$item->id)}}">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="title">العنوان</label>
            <input autofocus value="{{ $item->title }}" type="text" class="form-control" id="title" name="title" placeholder="العنوان">
        </div>
        
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="hidden" name="is_code" value="0" />
                <input v-model="is_code" type="checkbox" value="1" name="is_code" class="custom-control-input" id="is_code">
                <label class="custom-control-label" for="is_code">هل هو كود؟</label>
            </div>
        </div>
        <div v-if="!is_code" class="form-group">
            <label for="url">الرابط</label>
            <input value="{{ $item->url }}" type="text" class="form-control" id="url" name="url" placeholder="الرابط">
        </div>
        
        <div v-if="!is_code" class="form-group notCode">

            <input value="{{ $item->photo }}" type="hidden" class="form-control" id="photo" name="photo" placeholder="اصورة">
            <a title="استعراض الصور" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>اختر صورة للاعلان</span></a>
            <div class="imgShow"></div>
        </div>
        <div v-if="is_code" class="form-group">
            <label for="code">الكود</label>
            <textarea class="form-control" id="code" name="code" placeholder="الكود">{{ $item->code }}</textarea>
        </div>
        <div class="form-group">
            <label for="adv_locations_id">مكان الاعلان</label>
            <select class="form-control" id="adv_locations_id" name="adv_locations_id">
            <option value="">اختر مكان الاعلان</option>
            
                @foreach($advsLocation as $advlocation)
                    <option {{ $item->adv_locations_id==$advlocation->id?"selected":"" }} value="{{ $advlocation->id }}">{{ $advlocation->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_at">تاريخ البدء</label>
            <input autofocus value="{{  $item->start_at }}" type="text" class="form-control" id="start_at" name="start_at" placeholder="تاريخ البدء">
        </div>
        <div class="form-group">
            <label for="title">تاريخ الانتهاء</label>
            <input autofocus value="{{ $item->expire_at }}" type="text" class="form-control" id="expire_at" name="expire_at" placeholder="تاريخ الانتهاء">
        </div>
        <button type="submit" class="btn btn-primary">تعديل</button>
        <a class="btn btn-dark" href="{{ route('adv.index') }}">الغاء الأمر</a>		
    </form>
</div>
   
@endsection



@section("js")
    <script src="{{ asset('js/vue.js') }}"></script>
    <script>
        new Vue({
            el:"#app",
            data:{
                is_code: {{ $item->is_code?"true":"false"}}
            }
        })
    </script>

  <script>
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
