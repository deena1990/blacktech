@section('title', 'Testimonials')
@include('frontend.include.header')
<!--inner breadcrumb Section Start Here -->
<style type="text/css">
  .even-video-testimonials-box1 {
    width: 100%;
    height: 30px;
    display: block;
  }
  .testimonials-alumnih-content-area p {
        margin: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        word-break: break-all;
    }
    .testimonials-alumnih-content-area {
    width: 75%;
    margin: 0px 0px 0px auto;
    height: 220px;
    overflow: auto;
}
  .testimonials-alumnih-content-area::-webkit-scrollbar {
       width: 7px;
   }
   .testimonials-alumnih-content-area::-webkit-scrollbar-thumb {
       background: #dbd8d8; 
       border-radius: 10px;
   }
   .testimonials-brand-icon {
    position: absolute;
    top: 30px;
    right: 30px;
    font-size: 40px;
    width: 72px;
    height: 44px;
    border: 1px solid #ccc;
    overflow: hidden;
}
.testimonials-brand-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.even-video-testimonials-box iframe {
  margin: 40px 0px 0px 0px;
  object-fit: initial;
  width: 580px;
  height: 300px;
  border-radius: 10px;
}
 .testimonials-info-main-area {
    background-size: 100% 100%;
    background-position: top center;
    background-repeat:no-repeat;
}
.testimonials-alumnih-content-area p {
    word-break: break-word;
    text-align: justify;
    padding-right: 10px;
}
</style>
<section class="inner-banner-detail-area">
 <div class="inner-banner-img-area">
  <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[3]) }}" alt="Refer a friend">
 </div>
 <div class="breadcrum-info-main-area">   
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <div class="breadcrum-info-title">
      <h2>Hear from our Alumni</h2>
     </div> 
    </div> 
   </div>  
  </div> 
</div>
</section>
<!--inner breadcrumb Section end Here -->

<!--Testimonials Section Start Here -->

<section class="testimonials-info-main-area"  style=" background-color:white; background-image:url(assets/frontend/images/ser-bg.png)">
 <div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
     <div class="testimonials-heading-area">
      <h2>YOU TOO CAN PIVOT INTO IN-DEMAND AND HIGH-PAYING TECH CAREER</h2> 
    </div>
   <!--  <form action="#" method="post" enctype="multipart/form-data">
    <div class="testimonial-text-fill-area">
        <input type="text" placeholder="Little write-up" class="form-control">
        <div class="text-msg-smbt-info">
          <button type="submit" class="text-msg-submit-btn">Submit</button>
        </div>
    </div>
    </form> -->
    </div>
    
    @foreach($testimonial as $testimonials)

    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="testimonials-alumni-box">
       <div class="testimonials-alumni-area">
        <img src="{{ url('assets/testimonial_img/profile_img/'.$testimonials->profile_img	)}}" alt="Profile Image"> 
       </div>
       <div class="testimonials-alumnih-content-area">
        <h4>{{ $testimonials->name}}</h4>
         <!-- <div class="testimonials-brand-icon">
          <img src="{{ url('assets/testimonial_img/brand_img/'.$testimonials->brand_image	)}}" alt="Brand Image">
         </div> -->
          <h5>{{ $testimonials->destination }}</h5>
          <p><?php echo $testimonials->about ?></p>
        </div> 
       </div> 
      </div> 
      @endforeach

    </div>
    
  </div> 
</section>

<!--Testimonials Section end Here -->

<!--Even more Testimonials Section Start Here -->

<section class="even-testimonials-info-area" style=" background-color:white; background-image:url(assets/frontend/images/abs-bg.png)">
 <div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
     <div class="testimonials-heading-area">
      <h2>Even more Testimonials</h2> 
    </div>
   </div> 
   @foreach($tvdo as $tvdos)
    <div class="col-lg-6 col-md-12 col-sm-12 video_url">
      <div class="even-video-testimonials-info">
        <div class="even-video-testimonials-box">
        @if($tvdos->testimonial_video != "no file upload")
        <video controls="">
          <source src="{{ url('assets/testimonial_video/'.$tvdos->testimonial_video) }}" type="video/mp4">
        </video>
        @endif
        @if($tvdos->testimonial_video_url != "no video url")
        <iframe width="580" height="345" src="https://www.youtube.com/embed/<?php echo explode('&',explode('?v=',$tvdos->testimonial_video_url)[1])[0]; ?>">
        </iframe>
        @endif
        </div> 
      </div>
    </div>
   @endforeach
   
  </div>
 </div> 
</section>
<!-- Testimonials View More Btn Section Start Here -->
<section class="view-more-testimonials-btn-info">
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="view-more-testimonials-btn-area">
     <a class="view-more-testimonials-btn" href="https://www.youtube.com/playlist?list=PLPGP9otYbd5LxwiqIiP1TkBTqPNZAGOAk">View More Testimonials</a> 
    </div>
   </div>
  </div>
 </div> 
</section>
<!--Testimonials View More Btn Section End Here -->


<!--Testimonials View More Btn Section Start Here -->
<section class="you-too-can-pivot-info">
 <div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="you-too-can-pivot-img-area">
        <img src="{{ url('assets/upload_aboutus/'.$section_three->image)}}" alt="can pivot"> 
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="pivot-into-demand-list-info">
        <h2>{{ $section_three->title }}</h2> 
      </div>
      <div class="you-too-can-pivot-listing">
        <p>{!! $section_three->description !!}</p>
      </div>
     <div class="get-Started-today-btn-info">
      <a href="{{ url('courses?courseType=Accelerator_Programs') }}" class="get-Started-today-btn">Get Started Today</a>
     </div>
     </div>
   </div> 
  </div>
 </div> 
</section>
<!--Testimonials View More Btn Section End Here -->

<!--Even more Testimonials Section end Here -->
@include('frontend.slider-with-chatButton')
@include('frontend.include.footer')