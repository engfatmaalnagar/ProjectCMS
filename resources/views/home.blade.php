@extends('layouts._technos')

@section('content')
		

<div class="row"> 
				<div class="col-md-12 text-right"  >
			
				<?php
								$advs=\App\Models\Adv::find(3);
									?>
	                <div class="container-fluid">
									<a href='{{ $advs->url }}'>
									<img class="media-object" style="	padding-right: 40px;"src="{{ asset('thumb.php?size=950x200&src=storage/images/' . $advs->photo) }}" alt="{{ $advs->title }}">
									</a>																				
									</div>
														</div>	</div>


							
								
		<section class="ftco-secion ftco-intro text-right" style= "background-image: url('/yogalax/images/about.jpg');">
		
		<div class="container-fluid"><div class="row"> 
		
		<div class="col-md-6">
			
		<h2  class="  mb-4">من نحن</h2>
		<?php
					$page=\App\Models\StaticPage::find(1);
						?>
		
			<p class="ftco-animate text-left"> {{$page->details}}</p>
			<h2  class="  mb-4">أقسام الحاضنة </h2>
			<ul class="mt-5 do-list">
				
				
			<?php
					$types=\App\Models\Type::where("deleted",0)->get();
					?>@foreach($types as $type)
 <li class="ftco-animate"><a href="#"> <span class="ion-ios-checkmark-circle mr-3"></span>{{$type->name}}</a></li>			
			
						@endforeach
</ul>

					</div>
				</div>
				<div class="col-md-5"  style="height:50px;"></div>
			</div></div>
		</section>
	
    






    <section class="ftco-section ftco-section-services bg-light">
    	<div class="container">
    		<div class="row">
				<?php
								$pages=\App\Models\StaticPage::where("deleted",0)->orderBy('id','desc')->take(2)->get();
									?>
									@foreach($pages as $page)
    			<div class="col-md-6 text-right">
						<div class="services ftco-animate">
					<tr><td>
								<span class="justify-content-center align-items-center"><a href="{{ asset('staticpage/' . $page->id ) }}"   >
						    	<img class=" icon justify  d-flex " src="{{ asset('thumb.php?size=100x100&src=storage/images/' . $page->image) }}" alt="{{ $page->title }}">
                                      </a></span></td>
																		<td class="text-left">	<h3>{{$page->title}}</h3></td>
                           </tr>
							<div class="text mt-4">
							
								<p>{{$page->details}}</p>
							</div>
						</div>
					</div>
					@endforeach
					
					
				</div>
    	</div>
    </section>

		








    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            
            <h2 class="mb-1">أعضاء تكنوستار</h2>
          </div>
        </div>
        <div class="row">
					<?php 
					$members=\App\Models\Member::where("deleted",0)->orderBy('created_at','desc')->take(3)->get();
					?>
					@foreach($members as $member)

				
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7">
	            <div class="text-center">
							<h2 class="heading">  <a href="#"  class="thumbnail" >
						                                             	<img class="media-object" src="{{ asset('thumb.php?size=200x150&src=storage/images/' . $member->photo) }}" alt="{{$member->name }}">
                                      </a></h2>
	        
	            <span class="excerpt d-block">{{$member->name}}</span>
	            
	            <h3 class="heading-2 my-4">{{$member->job_title}}</h3>
	            
	            <ul class="pricing-text mb-5">
	              <li>Onetime Access To All Club</li>
	              <li>Group Trainer</li>
	              <li>Book A Group Class</li>
	              <li>Fitness Orientation</li>
	            </ul>

	            <a href="#" class="btn btn-primary d-block px-2 py-4">Get Started</a>
	            </div>
	          </div>
					</div>
					@endforeach
	       
	      </div>
      </div>
    </section>



    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="5000">0</strong>
		              	<span>إرضاء الزبون</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="4560">0</strong>
		              	<span>مشاريعنا</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="570">0</strong>
		              	<span>خبرتنا </span>
		              </div>
		            </div>
		          </div>
		         
		        </div>
		      </div>
        </div>
      </div>
    </section>
	
<section class="ftco-section bg-light">
										<?php
								$types=\App\Models\Type::get();
								$categories=\App\Models\Category::get();
								$items = \App\Models\Article::where("deleted",0)->where("published",1)->orderBy('id','desc')->take(3)->get();
									?>
		
                  

      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h3 class="subheading">أقسام تكنوستار</h3>
           
          </div>
        </div>
			

        <div class="row d-flex">
				@foreach($items as $article)
					              <div class="col-sm-6 article-item col-md-4" style="margin-bottom:30px;">
                         <div class="col d-flex ftco-animate" style="margin-bottom:30px;">
                            	<div class="blog-entry justify-content-end">
                                      <a href="{{ asset('article/' . $article->id ) }}"  class="block-20 thumbnail" >
						                                             	<img class="media-object" src="{{ asset('thumb.php?size=350x230&src=storage/images/' . $article->photos->file) }}" alt="{{ $article->title }}">
                                      </a>
                                      <div class="text  p-4 float-right d-block">
                                       	            <div class="d-flex align-items-center pt-2 mb-4">
              		                             <div class="one">
              		                                     	<span class="day">{{ date('d',strtotime($article->created_at)) }}</span>
              		                                   </div>
              	                         	       <div class="two">
              		                               	<span class="yr">{{ date('Y',strtotime($article->created_at)) }}</span>
              		                             	<span class="mos">{{ date('F',strtotime($article->created_at)) }}</span>
              		                                  </div>
                                        	         </div>
                                                <h3 class="heading text-right mt-2"><a href="#"> {{ $article->title }}</a></h3>
                                                 <p class='text-right' style='height:120px;overflow:hidden'>{{ $article->summary }}</p>
								                                 <div class='label text-right label-info'>{{ $article->category->name }}</div>
					                            </div>
																</div>  
													</div>
												</div>									
					@endforeach														 
        
          
      </div>
</section>

		
<section class="ftco-gallery ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h3 class="subheading">الاستديو</h3>
            <h2 class="mb-1">شاهد أخر الصور</h2>
          </div>

				</div>
    		<div class="row mb-3">
				<?php
										$photos = \App\Models\Photo::where("deleted",0)->where("published",1)->take(3)->get();
									?>
									@foreach($photos as $photo)
					             <div class="col-md-4 ftco-animate mb-3"  style="margin-bottom:30px;">
				                  	<a target="_blank" href="{{ asset('thumb.php?size=600x500&src=storage/images/' . $photo->file) }}" class="thumbnail">
					                     	<img class="media-object  gallery image-popup img d-flex align-items-center" src="{{ asset('thumb.php?size=350x230&src=storage/images/' . $photo->file) }}" alt="{{ $photo->name }}">
	                   
										 	      <div class="icon mb-4 d-flex align-items-center justify-content-center">
    						           <span class="icon-instagram"></span>
    				                
													   <div class="caption">
                              <h4>{{ $photo->name }}</h4>
                               <span class='label label-info'># {{ $photo->tag }}</span>
							
                               <div class='text-left'><small>{{ $photo->created_at }}</small></div>
					              	    </div>
													  </div>
													</div>
						@endforeach	
						</div>
						
    </section>

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
