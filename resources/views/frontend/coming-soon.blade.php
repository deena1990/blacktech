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
      <h2>Coming Soon</h2>
      <h2></h2>
     </div> 
    </div> 
   </div>  
  </div> 
</div>
</section> -->

<!--inner breadcrumb Section end Here -->
<!--Coming sonn section start here-->


<section class="coming-soon-info-area">
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-6">
    <div class="coming-detail-text-area">
        <!-- @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif   -->
     <h1>GREAT SPIRIT<br>WE'RE COMING SOON</h1> 
     <p>Shaping your creative project and bring it to the top in a minute<br>Advanced design for modern and awesome people</p>
    </div>
    <div class="go-home-btn-info-area">
     <a href="{{url('/')}}" class="go-home-btn">Go Home</a> 
    </div>
   </div> 
  </div>
 </div> 
</section>
<!--Coming sonn section end here-->
@include('frontend.include.footer')