@section('title', 'Get Started')
@include('frontend.include.header')
<!--inner breadcrumb Section Start Here -->

<!-- <section class="inner-banner-detail-area">
 <div class="inner-banner-img-area">
  <img src="images/refer-a-friend-bnr-2.jpg" alt="Refer a friend">
 </div>
 <div class="breadcrum-info-main-area">   
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <div class="breadcrum-info-title">
      <h2>Contact our team today!</h2>
      <h2></h2>
     </div> 
    </div> 
   </div>  
  </div> 
</div>
</section> -->

<!--inner breadcrumb Section end Here -->




<!--Enroll Pay Get Started Section Start Here -->

<section class="enroll-pay-get-support">
 <div class="enroll-pay-info-area">
  <div class="enroll-pay-img-box">
   <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[7]) }}"> 
  </div> 
  <div class="enroll-pay-content-box">
   <h4>"I know what course I am interested in. I’m ready to enroll and pay"</h4>
  </div>
  <div class="enroll-pay-btn-info">
   <a class="enroll-pay-btn" href="{{ url('courses?courseType=Accelerator_Programs') }}">Enroll and Pay</a> 
  </div>
 </div> 
  <div class="enroll-pay-info-area">
  <div class="enroll-pay-img-box">
   <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[8]) }}"> 
  </div> 
  <div class="enroll-pay-content-box">
   <h4>"I need help deciding the perfect course fit for my career goals"</h4>
  </div>
  <div class="enroll-pay-btn-info">
   <a class="enroll-pay-btn" href="{{ url('apply')}}">Get Support</a> 
  </div>
 </div> 
</section>

<!--Enroll Pay Get Started Section end Here -->
@include('frontend.include.footer')