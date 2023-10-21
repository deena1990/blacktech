@include('frontend.include.header')

<!--inner breadcrumb Section Start Here -->

<style type="text/css">

   ul li.radio-item input[type=radio]{

      accent-color: #f16000;

    }

   /* .fa-angle-left {

      line-height: 40px !important;

    }*/

    .back-course h3{

      font-size: 22px;

    }

    .fa-angle-left {

    width: 36px;

    height: 36px;

    border-radius: 50%;

    background: #ff6600;

    color: #fff;

    text-align: center;

    font-size: 34px !important;

    margin-right: 10px;

    line-height: 32px !important;
}
.paymentsIncluded {
    margin-bottom: 0;
}
ul.paymentsIncluded li {
    font-size: 14px;
 }
ul.paymentsIncluded li::marker {
    font-size: 18px;
    color: #f60;
 }
.stripeImg {
    width: 95%;
}
</style>

<!-- <section class="inner-banner-detail-area">

   <div class="inner-banner-img-area">

      <img src="{{ URL::asset('assets/frontend/images/refer-a-friend-bnr-2.jpg') }}" alt="Refer a friend">

   </div>

   <div class="breadcrum-info-main-area">

      <div class="container">

         <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

               <div class="breadcrum-info-title">

                  <h2>Course Registration About You</h2>

               </div>

            </div>

         </div>

      </div>

   </div>

</section> -->

<!--inner breadcrumb Section end Here -->

<!--back course Section start  Here -->

<section class="back-course-info-area">

   <div class="container">

      <div class="row">

         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="back-course">

                  <!-- @if(Session::has('success'))

                  <p class="alert alert-success">{{Session::get('success')}}</p>

                  @endif -->

               <a href="{{ url('courses?courseType=Accelerator_Programs') }}">

                  <h3><i class="fa fa-angle-left" aria-hidden="true"></i>Back to course page</h3>

               </a>

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

               <!-- <h4>Agile Project Management</h4> -->

               <h4 class="text-center">{{$course->course_title}}</h4>

            </div>

            <div class="resgistration-plan-payment-list">

               <ul class="nav nav-tabs" role="tablist">

                  <li><a class="active-blank-circel active">

                     <button class="tablinks" style="border:none; outline: none; background-color: inherit;" id="defaultOpen">About You</button>

                  </a></li>

                  <li><a class="active-blank-circel" id="payment_plan">

                  <button class="tablinks" style="border:none; outline: none; background-color: inherit;">Payment Plan</button>

                  </a></li>

                  <li><a class="active-blank-circel" id="review_pay">

                  <button class="tablinks" style="border:none; outline: none; background-color: inherit;">Review and Pay</button>

                  </a></li>

               </ul>

            </div>

            <div class="need-assistance-info">

               <p>Need Assistance?</p>

               <h5>Speak to a learning advisor OR Chat with our learning advisor</h5>
               
               <a href="https://wa.me/{{explode(':::',$content->status)[0]}}" class="refer-friend-btn" target="_blank">
                  <img src="{{url('assets/frontend/images/whatsapp.png')}}" alt="">
               </a>
            
            </div>

         </div>

      </div>

      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

         <!-- Tab panes -->

         <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">

         @csrf

            <div class="tab-content">



               <div id="aboutu" class="tabcontent">

                  <div class="course-resgistration-form-info">

                     <p>STEP 1 OF 3: ABOUT YOU</p>

                     <h4>Tell us about yourself.</h4>

                     <div class="course-resgistration-form-input">

                        <div class="row">

                           <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                              <div class="form-group">

                                 <label>First Name</label> 

                                 <input type="text" placeholder="First Name" name="first_name" class="form-control first_name" required>

                                 <span class="first_name_error text-danger"></span>

                              </div>

                           </div>

                           <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                              <div class="form-group">

                                 <label>Last Name</label> 

                                 <input type="text" placeholder="Last Name" name="last_name" class="form-control last_name" required>

                                 <span class="last_name_error text-danger"></span>

                              </div>

                           </div>

                           <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                              <div class="form-group">

                                 <label>Email Address</label> 

                                 <input type="email" placeholder="Email Address" name="email" class="form-control email" required>

                                 <span class="email_error text-danger"></span>

                              </div>

                           </div>

                           <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                              <div class="form-group">

                                 <label>Phone Number</label> 

                                 <input type="text" placeholder="Phone Number" autocomplete='off' name="phone" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" minlength="10" maxlength="15" class="form-control phone" required>

                                 <span class="phone_error text-danger"></span>

                              </div>

                           </div>

                           <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                              <div class="form-group">

                                 <label>Country</label>

                                 <select class="refer-section-option country" name="country" style="margin-bottom: 0px;" id="country" onchange="return onSelectCanada();">

                                   <option selected disabled>Select Country</option>

                                    @foreach($country as $countries)

                                    <option>{{$countries->country_name}}</option>

                                    @endforeach

                                 </select>

                                 <span class="country_error text-danger"></span>

                              </div>

                           </div>

                           <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                              <div class="form-group" style="display:none;" id="state_div">

                                 <label>State/Province</label>

                                 <select class="refer-section-option state" name="state" style="margin-bottom: 0px;" id="state">

                                   <option value="" selected style="display:none;">Select State</option>
                                   <option value="Alberta">Alberta</option>
                                   <option value="British Columbia">British Columbia</option>
                                   <option value="Manitoba">Manitoba</option>
                                   <option value="New Brunswick">New Brunswick</option>
                                   <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                   <option value="Nova Scotia">Nova Scotia</option>
                                   <option value="Northwest Territories">Northwest Territories</option>
                                   <option value="Nunavut">Nunavut</option>
                                   <option value="Ontario">Ontario</option>
                                   <option value="Prince Edward Island">Prince Edward Island</option>
                                   <option value="Quebec">Quebec</option>
                                   <option value="Saskatchewan">Saskatchewan</option>
                                   <option value="Yukon">Yukon</option>

                                 </select>

                                 <span class="state_error text-danger" id="state_error"></span>

                              </div>
                              <div class="form-group" style="display:none;" id="state_input_div">

                                 <label>State/Province</label>

                                 <input type="text" name="state_input" class="form-control state_input" placeholder="State/Province" id="state_input">

                                 <span class="state_input_error text-danger" id="state_input_error"></span>

                              </div>
                           </div>

                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                              <div class="course-resgistration-btn-area">

                                 <input type="button" class="resgistration-continue-btn" onclick="stepOne()" value="Continue">

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>



               <div id="payment-plan" class="tabcontent" class="tab-pane fade" style="display:none;">

                  <div class="course-resgistration-form-info">

                     <p>STEP 2 OF 3: PAYMENT PLAN</p>

                     <h4>Choose payment plan</h4>

                     <ul class="paymentsIncluded">
                        <li>All Payments are in CAD</li>
                        <li>Taxes are included</li>
                     </ul>

                     <label for="threemonths" class="course-installment-month mt-2" onclick="OpenAmountDetails();">

                        <ul>

                           <li class="radio-item">

                              <input type="radio" id="threemonths" name="month" value="3 months">

                              <input type="hidden" id="threemonthsPrice" value="{{ceil(($course->price+$installment_charge->three_months_charge)/3)}}">

                              <label for="threemonths">3 months</label>

                           </li>

                           <li class="price-position">${{ceil(($course->price+$installment_charge->three_months_charge)/3)}}/month</li>

                        </ul>

                     </label>

                     <label class="course-installment-month" style="margin: 0px;display: none;background: #ECECEC;" id="three_month_amount_datails">

                        <ul>

                           <li class="radio-item">

                              <label>Payment Amount</label>

                           </li>

                           <li class="price-position">${{$course->price}}</li>

                        </ul>

                        <ul>

                           <li class="radio-item">

                              <label>Instalment Processing Fee</label>

                           </li>

                           <li class="price-position">+ ${{ $installment_charge->three_months_charge }}</li>

                        </ul>

                        <hr>

                        <ul>

                           <li class="radio-item">

                              <label>Total Amount</label>

                           </li>

                           <li class="price-position">${{ $course->price+$installment_charge->three_months_charge }}</li>

                        </ul>

                     </label>

                     <label for="twomonths" class="course-installment-month" onclick="OpenAmountDetails();">

                        <ul>

                           <li class="radio-item">

                              <input type="radio" id="twomonths" name="month" value="2 months">

                              <input type="hidden" id="twomonthsPrice" value="{{ceil(($course->price+$installment_charge->two_months_charge)/2)}}">

                              <label for="twomonths">2 months</label>

                           </li>

                           <li class="price-position">${{ceil(($course->price+$installment_charge->two_months_charge)/2)}}/month</li>

                        </ul>

                     </label>

                     <label class="course-installment-month" style="margin: 0px;display: none;background: #ECECEC;" id="two_month_amount_datails">

                        <ul>

                           <li class="radio-item">

                              <label>Payment Amount</label>

                           </li>

                           <li class="price-position">${{$course->price}}</li>

                        </ul>

                        <ul>

                           <li class="radio-item">

                              <label>Instalment Processing Fee</label>

                           </li>

                           <li class="price-position">+ ${{ $installment_charge->two_months_charge }}</li>

                        </ul>

                        <hr>

                        <ul>

                           <li class="radio-item">

                              <label>Total Amount</label>

                           </li>

                           <li class="price-position">${{ $course->price+$installment_charge->two_months_charge }}</li>

                        </ul>

                     </label>

                     <div class="course-price-option-box">

                        <p>OR</p>

                     </div>

                     <label for="singlePayment" class="course-installment-month"  onclick="OpenAmountDetails();">

                        <ul>

                           <li class="radio-item">

                              <input type="radio" id="singlePayment" name="month" value="Single Payment">

                              <input type="hidden" id="singlePaymentPrice" value="{{$course->price}}">

                              <label for="singlePayment">Single Payment</label>

                           </li>

                           <li class="price-position">${{$course->price}}</li>

                        </ul>

                     </label>

                     <br><span class="payment_plan_options_error text-danger"></span>

                     <div class="course-payment-back-btn">

                        <a class="back-btn" style="cursor: pointer;" onclick="reg(event, 'aboutu')">Back</a>

                        <a class="continue-btn" style="cursor: pointer;" onclick="stepTwo()">Continue</a> 

                     </div>

                  </div>

               </div>



               <div id="review-pay" class="tabcontent" class="tab-pane fade" style="display:none;">

                  <div class="course-resgistration-form-info">

                     <p>STEP 3 OF 3: Review and Pay</p>

                     <h4>Secure Payment</h4>

                     <div class="row">

                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                           <div class="secure-payment-select-option" onclick="getSection(1)">

                              <ul>

                                 <li><img src="{{ URL::asset('assets/frontend/images/card-icon.png') }}" alt="cardicon"></li>

                                 <li>Card</li>

                                 <li class="arrow-icon Card"><img src="{{ URL::asset('assets/frontend/images/arrow-icon.png') }}"></li>

                              </ul>

                              <img src="{{url('assets/frontend/images/stripeImg.png')}}" alt="" class="stripeImg">

                           </div>

                           <div class="secure-payment-select-option" id="Paypal_button" onclick="getSection(2)">

                              <ul>

                                 <li><img src="{{ URL::asset('assets/frontend/images/paypal-icon.png') }}" alt="cardicon"></li>

                                 <li>Paypal</li>

                                 <li class="arrow-icon Paypal" style="display:none;"><img src="{{ URL::asset('assets/frontend/images/arrow-icon.png') }}"></li>

                              </ul>

                           </div>

                           <div class="secure-payment-select-option" id="Flutterwave_button" onclick="getSection(3)">

                              <ul>

                                 <li><img src="{{ URL::asset('assets/frontend/images/fluterwave-icon.png') }}" alt="cardicon"></li>

                                 <li>Flutterwave (Naira)</li>

                                 <li class="arrow-icon Flutterwave" style="display:none;"><img src="{{ URL::asset('assets/frontend/images/arrow-icon.png') }}"></li>

                              </ul>

                           </div>

                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" id="Card_button">

                           <div class="secure-payment-input-box">

                              <div class="secure-payment-input-form">

                                    <div class="row">

                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card_hide card_show">

                                          <div class="form-group ">

                                             <label>Name as on Card</label> 

                                             <input type="text" placeholder="Name as on Card" class="form-control" id="name_on_card" name="name_on_card" required>

                                          </div>

                                       </div>

                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card_hide card_show">

                                       <div class="form-group ">

                                          <label>Card Number</label> 

                                          <input type="text" placeholder="Card Number" name="card_number" id="card_number" class="form-control card-number" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" maxlength='16' autocomplete='off' required>

                                       </div>

                                    </div>

                                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 card_hide card_show">

                                       <div class="valid-through-info">

                                          <label>Valid Through</label> 

                                       </div>

                                       <div class="card-validation-info-area" style="border:none;">

                                       <input class='form-control card-expiry-month' name="exp_month" id="exp_month" placeholder='MM' onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" maxlength='2' type='text' required>&emsp;

                                       <input class='form-control card-expiry-year' name="exp_year" id="exp_year" placeholder='YYYY' onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" maxlength='4' type='text' required>

                                       </div>

                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 card_hide card_show">

                                       <div class="card-cvv-info-box">

                                          <div class="form-group">

                                             <label>CVV</label> 

                                             <input autocomplete='off' name="card_cvv" id="card_cvv" class='form-control card-cvc' placeholder='ex. 311' onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" maxlength='3' type='text' required>

                                          </div>

                                       </div>

                                    </div>

                                    <!-- @if($course->coupon_type == "Flat Discount" || $course->coupon_type == "% Discount") -->
                                    @if($course->price != 0)

                                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

                                       Do you have Coupon Code? <input type="checkbox" id="coupon_checkbox"> 

                                    </div>

                                    <!-- @endif  -->
                                    @endif 

                                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" id="coupon_code_field" style="display:none;margin-top:15px;">

                                       <div class="valid-through-info">

                                          <label>Apply Coupon</label>

                                       </div>

                                       <div class="news-latter-info-area" style="margin-top:0px;">

                                          <input type="hidden" name="course_id" id="course_id" value="{{$course->tbl_course_id}}">

                                          <input type="hidden" name="course_id_encode" id="course_id_encode" value="{{base64_encode($course->tbl_course_id)}}">

                                          <input type="hidden" name="course_name" class="course_name" value="{{$course->course_title}}">

                                          <input type="hidden" name="course_paymentPlanprice" id="course_paymentPlanprice">

                                          <input type="text" name="coupon_code" id="coupon_code" placeholder="Enter Your Coupon Code Here" class="form-control">

                                          <input type="button" onclick="getCoupon()" class="subscribe-btn" value="Apply">

                                       </div>

                                       <span id="coupon_code_error" style="color:red;"></span>

                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                       <div class="course-price-btn-area">

                                          @if($course->coupon_type == "Flat Discount" || $course->coupon_type == "% Discount")

                                          <h4>Total Amount : $<span id="discounted_price"></span></h4>

                                          <input type="hidden" name="discounted_price" id="paid_amount">

                                          @else

                                          <h4>Total Amount : $0</h4>

                                          <input type="hidden" name="discounted_price" value="0" id="paid_amount">

                                          @endif

                                          <a class="course-back-btn" style="cursor: pointer;" onclick="reg(event, 'payment-plan')">Back</a>

                                          <button class="course-make-payment-btn card_hide tree" onclick="tgif_loader()" type="submit">Make Payment</button>

                                          <input class="course-make-payment-btn paypal_hide" style="display:none;" onclick="paypalPayment()" type="button" value="Pay With Paypal">

                                          <button class="course-make-payment-btn flutterwave_hide" style="display:none;" onclick="makePayment()" type="button">Pay Now</button>

                                          <div id="LoaderGIF">

                                             <img src="{{url('assets/frontend/images')}}/Loader_Gif.gif" width="120px" alt="LoaderGIF">

                                          </div>

                                          <!-- <a href="{{url('stripess')}}" class="course-make-payment-btn">Make Payment</a> -->

                                       </div>

                                       <div class="payment-diclaration-info">

                                          <p>By placing this order, you expressly confirm that you have read and you agree to BlackTECH’s <a href="{{url('terms')}}" target="_blank"><span> Terms of Use

                                             </span></a>, <a href="{{url('refund')}}" target="_blank"><span>Refund</span></a>

                                             <!-- , <a href="{{url('rescheduling')}}" target="_blank"><span>Rescheduling</span></a> -->

                                              and <a href="{{url('privacy')}}" target="_blank"><span>Privacy Policy</span></a>

                                          </p>

                                       </div>

                                    </div>



                                    </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

            </div>

         </form>

      </div>

   </div>

</section>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script src="https://checkout.flutterwave.com/v3.js"></script>

<script>

   function onSelectCanada(){ 
      var selectedCountry = document.getElementById("country").value;
      if (selectedCountry == "Canada"){
         document.getElementById("state_div").style.display = "block";
         document.getElementById("state_input_div").style.display = "none";
         document.getElementById("state").value = "";
      }else{
         document.getElementById("state_div").style.display = "none";
         document.getElementById("state_input_div").style.display = "block";
         document.getElementById("state_input").value = "";
      }
   }

   function OpenAmountDetails(){

      if(document.getElementById('threemonths').checked) {

         document.getElementById('three_month_amount_datails').style.display = "block";

         document.getElementById('two_month_amount_datails').style.display = "none";

      }else if(document.getElementById('twomonths').checked) {

         document.getElementById('three_month_amount_datails').style.display = "none";

         document.getElementById('two_month_amount_datails').style.display = "block";

      }else if(document.getElementById('singlePayment').checked){

         document.getElementById('three_month_amount_datails').style.display = "none";

         document.getElementById('two_month_amount_datails').style.display = "none";

      }

   }

   function paypalPayment(){

      var first_name = $('.first_name').val().replace(/\s+/g, '-');

      var last_name = $('.last_name').val().replace(/\s+/g, '-');

      var email = $('.email').val();

      var phone = $('.phone').val().replace(/\s+/g, '-');

      var country = $('#country').val().replace(/\s+/g, '-');

      var state = $('#state').val().replace(/\s+/g, '-');

      var state_input = $('#state_input').val().replace(/\s+/g, '-');

      if($('#threemonths').prop('checked') == true){

         // var paymentPlan = $('#threemonths').val();

         var paymentPlan = 'threemonths';

      }else if($('#twomonths').prop('checked') == true){

         // var paymentPlan = $('#twomonths').val();

         var paymentPlan = 'twomonths';

      }else if($('#singlePayment').prop('checked') == true){

         // var paymentPlan = $('#singlePayment').val();

         var paymentPlan = 'singlePayment';

      }

      var course_id = $('#course_id').val();

      // var course_id_encode = $('#course_id_encode').val();

      var coupon_code = $('#coupon_code').val();

      var course_name = $('.course_name').val().replace(/\s+/g, '-');

      var paid_amount = $('#paid_amount').val();

      var token='<?php echo csrf_token();?>'

      $.ajax({ 

         type:"POST",

         url:"{{url('/postPaymentWithpaypal')}}",

         data:{first_name:first_name,last_name:last_name,email:email,phone:phone,country:country,state:state,state_input:state_input,paymentPlan:paymentPlan,course_id:course_id,coupon_code:coupon_code,course_name:course_name,paid_amount:paid_amount,_token:token},

         success:function(data)

         { 

            // alert(data);

               // window.location.href=data;
               window.open(data, '_blank');
         }

      });

   }

</script>

<!-- <script>

   function phoneNumberValidation(){

      var phone = $('.phone').val();

      var reg = /^\d+$/;

      if(!reg.test(phone)){

         $('.first_name_error').text('');

         $('.last_name_error').text('');

         $('.email_error').text('');

         $('.phone_error').text('Please enter Numbers/Integers only');

         $('.phone').val('');

         // $('.phone_error').fadeOut(6000);

      }else{

         $('.phone_error').text('');

      }

   }

</script> -->

<script>

   function makePayment() {

      var first_name = $('.first_name').val().replace(/\s+/g, '-');

      var last_name = $('.last_name').val().replace(/\s+/g, '-');

      var email = $('.email').val();

      var phone = $('.phone').val().replace(/\s+/g, '-');

      var country = $('#country').val().replace(/\s+/g, '-');

      var state = $('#state').val().replace(/\s+/g, '-');

      var state_input = $('#state_input').val().replace(/\s+/g, '-');

      if($('#threemonths').prop('checked') == true){

         var paymentPlan = $('#threemonths').val();

      }else if($('#twomonths').prop('checked') == true){

         var paymentPlan = $('#twomonths').val();

      }else if($('#singlePayment').prop('checked') == true){

         var paymentPlan = $('#singlePayment').val();

      }

      var course_id = $('#course_id').val();

      // var course_id_encode = $('#course_id_encode').val();

      var coupon_code = $('#coupon_code').val();

      var course_name = $('.course_name').val().replace(/\s+/g, '-');

      var paid_amount = $('#paid_amount').val();

      // var current_url = $(location).attr('href');

      // window.location.replace(current_url+'/'+course_id_encode);



         FlutterwaveCheckout({

            // public_key: "FLWPUBK_TEST-eb4a1d39a52c3a1665201895dd4b9e81-X",

            public_key: "FLWPUBK-f4e5ab97aaabaeed64646768c5727966-X",

            tx_ref: "BT_{{substr(rand(0,time()),0,7)}}",

            amount: paid_amount,

            currency: "CAD",

            payment_options: "card",

            redirect_url: "{{url('fwpaymentStatus')}}"+'?&first_name='+first_name+'&last_name='+last_name+'&email='+email+'&phone='+phone+'&country='+country+'&state='+state+'&state_input='+state_input+'&paymentPlan='+paymentPlan+'&course_id='+course_id+'&coupon_code='+coupon_code+'&paid_amount='+paid_amount,

            customer: {

               email: email,

               phone_number: phone,

               name: first_name+' '+last_name,

            },

            customizations: {

               title: "BlackTECH Academy",

               description: course_name+" Course Payment",

               logo: "{{URL::asset('assets/upload_logo/'.$content->logo) }}",

            },

         });

   }

</script>

<script type="text/javascript">

$(function() {

  var $form = $(".require-validation");

  $('form.require-validation').bind('submit', function(e) {

   // alert("hiii");

    var $form = $(".require-validation"),

    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),

    $inputs = $form.find('.required').find(inputSelector),

    $errorMessage = $form.find('div.error'),

    valid = true;

    $errorMessage.addClass('hide');

    $('.has-error').removeClass('has-error');

    $inputs.each(function(i, el) {

        var $input = $(el);

        if ($input.val() === '') {

            $input.parent().addClass('has-error');

            $errorMessage.removeClass('hide');

            e.preventDefault();

        }

    });

    if (!$form.data('cc-on-file')) {

      e.preventDefault();

      Stripe.setPublishableKey($form.data('stripe-publishable-key'));

      Stripe.createToken({

          number: $('.card-number').val(),

          cvc: $('.card-cvc').val(),

          exp_month: $('.card-expiry-month').val(),

          exp_year: $('.card-expiry-year').val()

      }, stripeResponseHandler);

    }

  });



  function stripeResponseHandler(status, response) {

      if (response.error) {

          $('.error')

              .removeClass('hide')

              .find('.alert')

              .text(response.error.message);

      } else {

          /* token contains id, last4, and card type */

          var token = response['id'];

          $form.find('input[type=text]').empty();

          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

          $form.get(0).submit();

      }

  }

});

</script>

<script>

  $(document).ready(function(){

   document.getElementById('LoaderGIF').style.display='none';

  });

</script>

<script>

  function gif_loader(){

   var name_on_card = document.getElementById('name_on_card').value;

   var card_number = document.getElementById('card_number').value;

   var exp_month = document.getElementById('exp_month').value;

   var exp_year = document.getElementById('exp_year').value;

   var card_cvv = document.getElementById('card_cvv').value;

   if (name_on_card == "" || card_number == "" || exp_month == "" || exp_year == "" || card_cvv == ""){

    document.getElementById('LoaderGIF').style.display='none';

   }else{

    document.getElementById('LoaderGIF').style.display='inline-block';

   }

  }

</script>

<script>

   function stepOne(){

      var first_name = $('.first_name').val();

      var last_name = $('.last_name').val();

      var email = $('.email').val();

      var phone = $('.phone').val();

      var country = $('.country').val();

      var state = $('#state').val();

      var state_input = $('#state_input').val();

      var alphabet= /^[a-zA-Z]*$/;

      var number= /^[0-9]*$/;

      var emailformat = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

      if (first_name == ""){

         $('.first_name_error').text('Please enter your First Name');

         return false;

      }else if(last_name == ""){

         $('.first_name_error').text('');

         $('.last_name_error').text('Please enter your Last Name');

         return false;

      }else if(email == ""){

         $('.first_name_error').text('');

         $('.last_name_error').text('');

         $('.email_error').text('Please enter your Email');

         return false;

      }else if(!email.match(emailformat)){

         $('.first_name_error').text('');

         $('.last_name_error').text('');

         $('.email_error').text('Please enter email in valid email format');

         return false;

      }else if(phone == ""){

         $('.first_name_error').text('');

         $('.last_name_error').text('');

         $('.email_error').text('');

         $('.phone_error').text('Please enter your Phone');

         return false;

      }else if(country == null){

         $('.first_name_error').text('');

         $('.last_name_error').text('');

         $('.email_error').text('');

         $('.phone_error').text('');

         $('.country_error').text('Please select your Country');

         return false;

      }else if(state == "" && state_input == ""){

         $('.first_name_error').text('');

         $('.last_name_error').text('');

         $('.email_error').text('');

         $('.phone_error').text('');

         $('.country_error').text('');

         if (country == "Canada"){

            $('.state_error').text('Please select your State');
            return false;

         }else{

            $('.state_input_error').text('Please enter your State');
            return false;

         }

      
      }else {

         $('.first_name_error').text('');

         $('.last_name_error').text('');

         $('.email_error').text('');

         $('.phone_error').text('');

         $('.country_error').text('');

         if (country == "Canada"){

         $('.state_error').text('');

         }else{

         $('.state_input_error').text('');

         }

         reg(event, 'payment-plan');

         $('#payment_plan').addClass(' active');



      }



      

   }

</script>

<script>

   function stepTwo(){

         var singlePayment = $('#singlePayment').prop('checked');

         var twomonths = $('#twomonths').prop('checked');

         var threemonths = $('#threemonths').prop('checked');

         if (singlePayment == false && twomonths == false && threemonths == false){

            $('.payment_plan_options_error').text('Please select atleast one payment plan');

            return false;

         }else{

            if(singlePayment == true){

               var singlePaymentPrice = $('#singlePaymentPrice').val();

               $('#discounted_price').text(singlePaymentPrice);

               $('#paid_amount').val(singlePaymentPrice);

               $('#course_paymentPlanprice').val(singlePaymentPrice);

            }

            if(twomonths == true){

               var twomonthsPrice = $('#twomonthsPrice').val();

               $('#discounted_price').text(twomonthsPrice);

               $('#paid_amount').val(twomonthsPrice);

               $('#course_paymentPlanprice').val(twomonthsPrice);

            }

            if(threemonths == true){

               var threemonthsPrice = $('#threemonthsPrice').val();

               $('#discounted_price').text(threemonthsPrice);

               $('#paid_amount').val(threemonthsPrice);

               $('#course_paymentPlanprice').val(threemonthsPrice);

            }

            var paid_amount = $('#paid_amount').val();

            if(paid_amount >= 1000){

               $('#Flutterwave_button').hide();

            }else{

               $('#Flutterwave_button').show();

            }

            $('.payment_plan_options_error').text('');

            reg(event, 'review-pay');

            $('#review_pay').addClass(' active');

         }

      }

</script>



<script>

function reg(evt, tabs) {

  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");

  for (i = 0; i < tabcontent.length; i++) {

    tabcontent[i].style.display = "none";

  }

  tablinks = document.getElementsByClassName("tablinks");

  for (i = 0; i < tablinks.length; i++) {

    tablinks[i].className = tablinks[i].className.replace(" active", "");

  }

  document.getElementById(tabs).style.display = "block";

  evt.currentTarget.className += " active";

}



// Get the element with id="defaultOpen" and click on it

document.getElementById("defaultOpen").click();

</script>

<script>

   $('#coupon_checkbox').change(function() {

      $('#coupon_code_field').toggle();

   });

</script>

<script>

   function getCoupon(){

      var course_paymentPlanprice = $('#course_paymentPlanprice').val();

      var coupon_code = $('#coupon_code').val();

      var course_id = $('#course_id').val();

      // alert(course_id)

      var token='<?php echo csrf_token();?>'

      $.ajax({ 

         type:"POST",

         url:"{{url('/apply_coupon')}}",

         data:{course_id:course_id,coupon_code:coupon_code,course_paymentPlanprice:course_paymentPlanprice,_token:token},

         success:function(data)

         { 

            // console.log(data);

            if(data == ""){

               $('#coupon_code_error').text('Please enter coupon code'); 

               return false;

            }else if(data == "DNE"){

               $('#coupon_code_error').text('Coupon code "'+coupon_code+'" does not exist'); 

               $('#coupon_code').val(''); 

               return false;

            }else if(data == "Inactive"){

               $('#coupon_code_error').text('Inactive coupon code "'+coupon_code+'"'); 

               $('#coupon_code').val(''); 

               return false;

            }else if(data == "Invalid"){

               $('#coupon_code_error').text('Coupon code "'+coupon_code+'" has been expired'); 

               $('#coupon_code').val(''); 

               return false;

            }else{

               $('#coupon_code_error').text('Coupon code "'+coupon_code+'" applied successfully');

               $('#discounted_price').text(data);

               $('#paid_amount').val(data);

               $('#coupon_code_error').css('color','green'); 

               return false;

            }

         }

         }); 

            

         }

</script>

<script>

   function getSection(id){

      if (id == 1){

         $('.card_hide').show();

         $('.paypal_hide').hide();

         $('.flutterwave_hide').hide();

         $('.Card').show();

         $('.Paypal').hide();

         $('.Flutterwave').hide();

         $('#name_on_card').attr('required','required');

         $('#card_number').attr('required','required');

         $('#exp_month').attr('required','required');

         $('#exp_year').attr('required','required');

         $('#card_cvv').attr('required','required');

         $('#paypal_email').removeAttr('required','required');

      }else if(id == 2){

         $('.paypal_hide').show();

         $('.card_hide').hide();

         $('.flutterwave_hide').hide();

         $('.Card').hide();

         $('.Paypal').show();

         $('.Flutterwave').hide();

         $('#name_on_card').removeAttr('required','required');

         $('#card_number').removeAttr('required','required');

         $('#exp_month').removeAttr('required','required');

         $('#exp_year').removeAttr('required','required');

         $('#card_cvv').removeAttr('required','required');

         $('#paypal_email').removeAttr('required','required');

      }else if(id == 3){

         $('.paypal_hide').hide();

         $('.card_show').hide();

         $('.flutterwave_hide').show();

         $('.tree').hide();

         $('.Card').hide();

         $('.Paypal').hide();

         $('.Flutterwave').show();

         $('#paypal_email').removeAttr('required','required');



         

      }

   }

</script>

<!--Course Resgistration about You Section end Here -->

@include('frontend.include.footer')

