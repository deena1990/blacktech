@section('title', 'Course Resgistration Review Pay')
@include('frontend.include.header')
<!--inner breadcrumb Section Start Here -->

<section class="inner-banner-detail-area">
 <div class="inner-banner-img-area">
  <img src="{{ URL::asset('assets/frontend/images/refer-a-friend-bnr-2.jpg') }}" alt="Refer a friend">
 </div>
 <div class="breadcrum-info-main-area">   
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <div class="breadcrum-info-title">
      <h2>Course Resigstration Review Pay</h2>
     </div> 
    </div> 
   </div>  
  </div> 
</div>
</section>

<!--inner breadcrumb Section end Here -->



<!--back course Section start  Here -->

<section class="back-course-info-area">
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="back-course">
     <h3><i class="fa fa-angle-left" aria-hidden="true"></i> Back to course page</h3> 
    </div>
   </div>
  </div> 
 </div> 
</section>

<!--back course  Section end Here -->

<!--Course Resgistration about You Section start Here -->

<section class="course-resgistration-info">
 <div class="container">
  <div class="row">
   <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="resgistration-plan-payment-tab">
     <div class="course-plan-heading">
      <h4>Agile Project Management</h4>
     </div>
      <div class="resgistration-plan-payment-list">
       <ul>
        <li><a class="active-blank-circel" href="#">About You</a></li> 
        <li><a class="active-blank-circel" href="#">Payment Plan</a></li> 
        <li><a class="active" href="#">Review and Pay</a></li> 
       </ul> 
     </div>
     <div class="need-assistance-info">
      <p>Need Assistance?</p>
      <h5>Speak to a Learning Advisor</h5> 
     </div>
    </div> 
   </div>
   <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="course-resgistration-form-info">
     <p>STEP 3 OF 3: Review and Pay</p>
     <h4>Secure Payment</h4> 
      <div class="row">
       <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12"> 
        <div class="secure-payment-select-option">
          <ul>
            <li><img src="{{ URL::asset('assets/frontend/images/card-icon.png') }}" alt="cardicon"></li> 
            <li>Card</li>
            <li class="arrow-icon"><img src="{{ URL::asset('assets/frontend/images/arrow-icon.png') }}"></li>
          </ul> 
        </div>
        <div class="secure-payment-select-option">
          <ul>
           <li><img src="{{ URL::asset('assets/frontend/images/paypal-icon.png') }}" alt="cardicon"></li> 
           <li>Paypal</li>
           <!-- <li class="arrow-icon"><img src="images/arrow-icon.png"></li> -->
          </ul> 
        </div>
        <div class="secure-payment-select-option">
          <ul>
           <li><img src="{{ URL::asset('assets/frontend/images/fluterwave-icon.png') }}" alt="cardicon"></li> 
           <li>Flutterwave</li>
           <!-- <li class="arrow-icon"><img src="images/arrow-icon.png"></li> -->
          </ul> 
        </div>
       </div>
       <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="secure-payment-input-box">
         <form class="secure-payment-input-form">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label>Name as on Card</label> 
                <input type="text" placeholder="Name as on Card" class="form-control">
              </div>
            </div> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label>Card Number</label> 
                <input type="text" placeholder="Card Number" class="form-control">
              </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
              <div class="valid-through-info">
                <label>Valid Through</label> 
              </div>
        
              <div class="card-validation-info-area">
                <input type="text" placeholder="Valid through:" class="card-form-control">
                <div class="card-month-year-text">
                  <h5>MMYY</h5>
                </div> 
              </div> 
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
             <div class="card-cvv-info-box">
              <div class="form-group">
                <label>CCV</label> 
                <input type="text" placeholder="CCV" class="form-control">
              </div>
             </div> 
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="course-price-btn-area">
              <h4>$799.87</h4> 
              <a class="course-back-btn" href="#">Back</a>
              <a class="course-make-payment-btn" href="#">Make Payment</a>
             </div> 
            </div>
          </div> 
         </form> 
        </div> 
       </div>
      </div>
     </div> 
    </div>
    </div>
    </div>
</section>

<!--Course Resgistration about You Section end Here -->
@include('frontend.include.footer')