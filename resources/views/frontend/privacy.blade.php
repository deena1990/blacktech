@section('title', 'Privacy Policy')
@include('frontend.include.header')
<!--inner breadcrumb Section Start Here -->


<!-- <section class="inner-banner-detail-area">
 <div class="inner-banner-img-area">
  <img src="{{ URL::asset('assets/frontend/images/refer-a-friend-bnr-2.jpg') }}" alt="Refer a friend">
 </div>
 <div class="breadcrum-info-main-area">   
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <div class="breadcrum-info-title">
      <h2>Privacy Policy</h2>
     </div> 
    </div> 
   </div>  
  </div> 
</div>
</section> -->

<!--inner breadcrumb Section end Here -->

<!--Our Story Section Start Here -->

<section class="our-story-info-area">
 <div class="container">
  <div class="row">
    <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
    </div>
  
    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
     <div class="our-story-detail-area">
     
     <h2 class="text-center">{{ $privacy->privacy_heading}}</h2>
      <p>{!! $privacy->privacy_description !!}</p>
   
    </div>
    </div>
    
    <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
    </div>
  </div>
 </div>
</section>

<!--Our Story Section end Here -->
@include('frontend.include.footer')