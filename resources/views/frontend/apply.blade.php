@section('title', 'About Us')
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

<!--Apply Section Start Here -->
<style>
  .apply-speaker-btn {
  display: inline-block;
}

.what-apply i {
  font-size: 25px;}

.what-apply {
  margin-left: 10px;}
  a.apply-speaker-btn {
  transition: all 0.5s linear;
}
.parent-speak {
    display: flex;
    width: 400px;
}
a.apply-speaker-btn {
    padding: 10px 16px;
    font-size:18px;
}

.child-whatt i {
    color: white;
    font-size: 25px;
}
.child-whatt {
    background: #05af04;
    padding: 10px 10px 6px 10px;
    border-radius: 5px;
    margin-left: 7px;
    transition: all 0.5s linear;
}
.child-whatt:hover {
    color: #fff;
    background: #000000;
}

</style>
<section class="apply-main-info-area">
 <div class="apply-main-info-detail">
  <div class="apply-detail-img-box">
   <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[9]) }}" alt="">
  </div> 
  <div class="apply-speak-career-advisor">
    <div class="apply-speak-career-btn-area"> 
      <div class="parent-speak">
        <div class="child speak">
        <a aria-label="Chat on WhatsApp" href="https://wa.me/{{explode(':::',$content->status)[0]}}" class="apply-speaker-btn" href="#">Chat or Connect with a Career Advisor</a>
        </div>
        <div class="child-whatt">
       <a href="https://wa.me/{{explode(':::',$content->status)[0]}}"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> 
        </div>
      </div>
     
      
      </span></a> 

    </div>
  </div>
 </div> 
</section>
<!--Apply Section end Here -->
@include('frontend.include.footer')