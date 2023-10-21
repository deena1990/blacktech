@section('title', 'Get Started')

@include('frontend.include.header')

<!--inner breadcrumb Section Start Here -->



<section class="inner-banner-detail-area">

 <div class="inner-banner-img-area">

  <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[7]) }}" alt="Refer a friend">

 </div>

 <div class="breadcrum-info-main-area">   

  <div class="container">

   <div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

     <div class="breadcrum-info-title">

      <h2>Community BlackTECH Academy</h2>

      <h2></h2>

     </div> 

    </div> 

   </div>  

  </div> 

</div>

</section>



<!--inner breadcrumb Section end Here -->
<style type="text/css">
    .why-join-detail-main-area {
    margin: 0px 0px 60px 0px;
}
.why-join-detail-main-area p {
    font-size: 24px;
    line-height: 35px;
}
.why-join-detail-main-area ul {
    padding: 0px 0px 0px 0px;
    margin: 0px 0px 0px 0px;
}
.why-join-detail-main-area ul li {
    list-style: none;
    position: relative;
    display: block;
    padding-left: 20px;
    color: #000;
    font-size: 18px;
    margin: 15px 0px 0px 0px;
}
.why-join-detail-main-area ul li:before {
    content: "\f111";
    font-family: FontAwesome;
    left: -5px;
    position: absolute;
    top: 0;
    font-size: 10px;
    color: #ff6600;
}
.what-member-say img {
    width: 100%;
}
.contact-form-heading-area {
    margin: 0px 0px 40px 0px;
}
.contact-form-heading-area h3 {
    font-size: 30px;
    font-size: 600;
    text-align: center;
}
.contact-form-detail-are {
    margin: auto;
}
.communityForm legend{
    font-size: 20px;
   font-weight: 600;
}
.communityForm fieldset .form-control, .communityForm fieldset .form-select{
    border-radius: 0px;
    background: #D9D9D9;
    color: #000;
    padding: 12px 0px 12px 10px;
}
.registeringcommunity{
    font-size: 18px;
    font-weight: 500;
    padding: 40px 0;
}
</style>


<section class="refer-friend-info-area" style="background-color:white; background-image:url(assets/frontend/images/ser-bg.png)">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="why-join-detail-main-area">
                    <h3>Why Join?</h3>
                    <p>Join BlackTECH Hub and enjoy the following benefits:</p>
                    <ul>
                        <li>Access to BlackTECH community slack group and curated resources</li>
                        <li>Access to numerous job opportunities in tech</li>
                        <li>Connections to grow and expand your network</li>
                        <li>Tools and resources to advance your career</li>
                        <li>Support, community and belonging</li>
                        <li>Be inspired to achieve more!</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="what-member-say">
                    <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[8]) }}">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="contact-form-heading-area">
                   <h3>Join Our Network</h3>
                </div>
                <div class="contact-form-detail-are">
                    <form class="communityForm">
                      <fieldset class="row">
                        <legend>Personal Data</legend>
                        <div class="mb-3 col-lg-6">
                          <label for="firstname" class="form-label"> First Name*</label>
                          <input type="text" id="firstname" class="form-control" placeholder="First Name">
                        </div>
                        <div class="mb-3 col-lg-6">
                          <label for="lastname" class="form-label"> Last Name*</label>
                          <input type="text" id="lastname" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="mb-3 col-lg-6">
                          <label for="email" class="form-label"> Email*</label>
                          <input type="text" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3 col-lg-6">
                          <label for="agerange" class="form-label">Age Range </label>
                          <select id="agerange" class="form-select">
                            <option> Age Range</option>
                            <option> Under 20</option>
                            <option> 20-29</option>
                            <option> 30-39</option>
                            <option> 40-49</option>
                            <option> 50-59</option>
                            <option> 60+</option>
                          </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                          <label for="phonenumber" class="form-label"> Phone Number</label>
                          <input type="text" id="phonenumber" class="form-control" placeholder="pired to achieve more!  Join Our Network Personal Data First Name*">
                        </div>
                        
                        <div class="mb-3 col-lg-6">
                          <label for="country" class="form-label"> Country of Residence</label>
                          <select id="country" class="form-select">
                            <option> Country</option>
                            <option> Country1</option>
                            <option> Country2</option>
                            <option> Country3</option>
                          </select>
                        </div>
                         <div class="mb-3 col-lg-6">
                          <label for="city" class="form-label"> City*</label>
                          <input type="text" id="city" class="form-control" placeholder="City">
                        </div>

                        <legend>Professional Data</legend>



                        <div class="mb-3 col-lg-6">
                          <label for="employment" class="form-label"> Employment Information</label>
                          <input type="text" id="employment" class="form-control" placeholder="input">
                        </div>
                        <div class="mb-3 col-lg-6">
                          <label for="company" class="form-label"> Company information</label>
                          <input type="text" id="company" class="form-control" placeholder="input">
                        </div>
                        <div class="mb-3 col-lg-6">
                          <label for="expertise" class="form-label">Domain of Expertise </label>
                          <select id="expertise" class="form-select">
                            <option> select</option>
                          </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                          <label for="situation" class="form-label">Current Job Situation </label>
                          <select id="situation" class="form-select">
                            <option> select</option>
                          </select>
                        </div>

                        <legend>Select all that apply to you</legend>
                        
                        <div class="col-lg-12">
                            <div class="form-check mb-3">
                              <input class="form-check-input" type="checkbox" value="" id="belowoptions">
                              <label class="form-check-label" for="belowoptions">
                                All of the below options
                              </label>
                            </div>
                            <div class="form-check mb-3">
                              <input class="form-check-input" type="checkbox" value="" id="receiveupdates">
                              <label class="form-check-label" for="receiveupdates">
                                I agree to receive updates about future BlackTECH events.
                              </label>
                            </div>
                            <div class="form-check mb-3">
                              <input class="form-check-input" type="checkbox" value="" id="communications">
                              <label class="form-check-label" for="communications">
                                I agree to get marketing communications from BlackTECH.
                              </label>
                            </div>
                            <div class="form-check mb-3">
                              <input class="form-check-input" type="checkbox" value="" id="aboveoptions">
                              <label class="form-check-label" for="aboveoptions">
                                None of the above options.
                              </label>
                            </div>
                            <div class="form-check mb-3">
                              <input class="form-check-input" type="checkbox" value="" id="conditionsClick">
                              <label class="form-check-label" for="conditionsClick">
                                I agree to the BlackTECH terms and conditionsClick here to review terms and condition
                              </label>
                            </div>
                        </div>


                        <div class="mt-3 col-lg-12">
                            <div class="">
                                <form action="?" method="POST">
                                  <div class="g-recaptcha" data-sitekey="6Lfwa0UoAAAAANgNYMfeW9XDK7fJ7-xsGFCVO75_"></div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-3 col-lg-12">
                            <button type="submit" class="refer-friend-submit-btn">Submit</button>
                        </div>

                        <p class="registeringcommunity">By registering you are now a BlackTECH member - Welcome to the BlackTECH community !</p>

                      </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>





<!--Enroll Pay Get Started Section Start Here -->

<!-- 

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
 -->


<!--Enroll Pay Get Started Section end Here -->

@include('frontend.include.footer')