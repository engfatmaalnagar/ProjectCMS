@extends("layouts._admin")

@section("title","تعديل مقال ")

@section("content")

<form class="w-50" method="POST" action="{{route('article.update',$item->id)}}">
@csrf
@method("put")
                  <!--add article title-->
                  <div class="form-group">
										<label for="title">عنوان المقالة</label>
										<input autofocus value="{{ $item->title }}" id="title" class="form-control" type="text" name="title" placeholder="عنوان المقالة">
                  </div>
                  <!--add article sub title-->
                  <div class="form-group">
										<label for="sub_title">العنوان الفرعي للمقالة</label>
										<input value="{{ $item->sub_title }}" id="sub_title" class="form-control" type="text" name="sub_title" placeholder="العنوان الفرعي للمقالة">
									</div>
							
                  <!--add photo to article-->
                  <div class="form-group">
                      <input type="hidden" value="{{ asset('storage/images/' . $item->photos->file) }}" id="photos_url" name="photos_url" />
                      <input type="hidden" value='{{ $item->photos_id }}' id="photos_id" name="photos_id" />
                      <a title="استعراض الصور" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>اختر صورة للمقال</span></a>
                      <div class="imgShow"></div>
                  </div>
                  <!--add type to article-->
									<div class="form-group">
										<label for="types_id">اضافة نوع للمقال</label>
											<select class="form-control" id="types_id" name="types_id">
                        <option value="">اختار نوع المقال</option>
                        @foreach($types as $type)
													<option {{ $item->types_id==$type->id?"selected":"" }} value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
											</select>
                  </div>
                  <!--add category to article-->
									<div class="form-group">
										<label for="categories_id">اضافة تصنيف للمقال</label>
											<select class="form-control"  id="categories_id" name="categories_id">
												<option value="">اختار تصنيف المقال</option>
                        @foreach($categories as $category)
													<option {{$item->categories_id==$category->id?"selected":"" }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
											</select>
                  </div>
                  <!--add content of article-->
             <div class="form-group">
                  <label for="details">تفاصيل المقالة</label>
                    <textarea name="details" class="form-control" data-provide="markdown" rows="10" >
                          {{$item->details}}
                    </textarea>    
              </div>
                <!--add date & time of article-->
                <div class="form-group">
                  <label for="date">اضافة تاريخ ووقت كتابة المقال</label> 
                  <input type='text' class="form-control" name="date" placeholder="تاريخ ووقت كتابة المقالة" id='date' value="{{$item->date}}"/>
                  
                </div>
                 <!--add article summary-->
                 
                 <div class="form-group">
										<label for="summary">ملخص المقالة</label>
												<textarea maxlength="191"  id="summary" class="form-control" name="summary" placeholder="ملخص المقالة">{{ $item->summary }}</textarea>
											</div>
                      <div class="form-group">
										<label for="writer_id"> الكاتب</label>
											<select class="form-control"  id="writer_id" name="writer_id">
												<option value="">اختار الكاتب</option>
                        @foreach($writers as $writer)
													<option {{ $item->writer_id==$writer->id?"selected":"" }} value="{{ $writer->id }}">{{ $writer->name }}</option>
                        @endforeach
											</select>
                  </div>
                <!--make article published-->
                <div class="form-group">
<div class="custom-control custom-checkbox">
  <input type="hidden" name="published" value="0" />
  <input  {{$item->published?"checked":"" }} value="1" type="checkbox" name="published" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1">نشر المقالة</label>
</div>
</div>
                  <!--make article in home-->
                  <div class="form-group">
<div class="custom-control custom-checkbox">
  <input type="hidden" name="in_home" value="0" />
  <input  {{$item->in_home?"checked":"" }} value="1" type="checkbox" name="in_home" class="custom-control-input" id="customCheck2">
  <label class="custom-control-label" for="customCheck2">نشر المقال في الصفحة الرئيسية</label>
</div>
</div>
								
										
												<button type="submit" class="btn btn-success">حفظ</button>
												<a class="btn btn-dark" href="{{ route('article.index') }}">الغاء الأمر</a>
										
									
							</form>

              <!--end::Form-->
             
                        

@endsection

@section("js")
<script src="{{ asset('metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>

  <script>
    function setImage(imageId, imageUrl){
      $("#photos_id").val(imageId);
      $("#photos_url").val(imageUrl);
      $(".imgShow").html('<img src="'+imageUrl+'" class="img-thumbnail w-50" />');
      $("#iframeModal").modal("hide");
    }
    if($("#photos_url").val()!=''){
      $(".imgShow").html('<img src="'+$("#photos_url").val()+'" class="img-thumbnail w-50" />');
    }
  </script>
@endsection



