@include('frontend.include.header')

<!--inner breadcrumb Section Start Here -->
<style>
  section.refer-friend-info-area {
    background-size: cover;
    background-position: top center;
    background-repeat: no-repeat;
}
.breadcrum-info-title p {
    color: #fff;
}
</style>


<section class="inner-banner-detail-area">

 <div class="inner-banner-img-area">

  <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[6]) }}" alt="Refer a friend">

 </div>

 <div class="breadcrum-info-main-area text-start" style="bottom:80px;">   

  <div class="container">

   <div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

     <div class="breadcrum-info-title">

     <?= $refer_friend->banner_content ?>

      <!-- <h2>Refer A Friend <br> and Earn</h2><br>
      <p class="text-white">Get a $50 referral bonus when you bring a family member,<br>friend, or coworker to BlackTECH and they enrol in one of our instructor-led courses.</p> -->
   

     </div> 

    </div> 

   </div>  

  </div> 

</div>

</section>



<!--inner breadcrumb Section end Here -->







<!--Refer Friend Section Start Here -->

<section class="refer-friend-info-area" style=" background-color:white; background-image:url(assets/frontend/images/ser-bg.png)">
 <div class="container">
 <div class="row">
  <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="refer-friend-heading-area">
    <h2>Refer A Friend</h2>
    <h2>and Earn</h2>
    <p>Get a $50 referral bonus when you bring a family member<br>friend, or coworker to BlackTECH and they enrol in one of our instructor-led courses.</p>
   </div> 
  </div> -->
   <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="refer-friend-main-box">
     <div class="refer-friend-icon">
      <img src="{{url('assets/upload_aboutus/'.$refer_friend->icon1)}}" alt="friend"> 
     </div> 
     <div class="refer-friend-content-box">
     <?= $refer_friend->icon1description ?>
      <!-- <span>Refer a</span>
      <p>Friend</p>  -->
     </div>
    </div>
   </div>
   <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="refer-friend-main-box">
     <div class="refer-friend-icon">
      <img src="{{url('assets/upload_aboutus/'.$refer_friend->icon2)}}" alt="friend"> 
     </div> 
     <div class="refer-friend-content-box">
     <?= $refer_friend->icon2description ?>
      <!-- <span>Enrol and Pay for a</span>
      <p>Program</p>  -->
     </div>
    </div>
   </div>
   <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="refer-friend-main-box">
     <div class="refer-friend-icon">
      <img src="{{url('assets/upload_aboutus/'.$refer_friend->icon3)}}" alt="friend"> 
     </div> 
     <div class="refer-friend-content-box">
      <?= $refer_friend->icon3description ?>
      <!-- <span>You and your Friend gets</span>
      <p>Referral Bonuses</p>  -->
     </div>
    </div>
   </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="refer-friend-form-heading">
    <?= $refer_friend->description ?>
    <!-- <p>Please provide the name and contact information of the person you’re referring to BlackTECH Academy</p> -->
   </div> 
   <!-- @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
      @endif  -->
   <form action="{{ url('insert_referafrnd') }}" method="post" onsubmit="return getstarted();" enctype="multipart/form-data" class="refer-friend-form-area">
    @csrf
    <div class="row">
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
       <label>First Name</label> 
       <input type="text" name="u_firstname" placeholder="First Name" class="form-control" required>
      </div>
     </div> 
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
       <label>Last Name</label> 
       <input type="text" name="u_lastname" placeholder="Last Name" class="form-control" required>
      </div>
     </div>
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
       <label>Email Address</label> 
       <input type="text" name="u_email" id="u_email" placeholder="Email Address" class="form-control" required>
       <span class="text-danger" id="u_email_error"></span>
      </div>
     </div>
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
       <label>Phone Number</label> 
       <input type="text" name="u_phone" autocomplete='off' placeholder="Phone Number" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" minlength="10" maxlength="15" class="form-control" required>
      </div>
     </div> 
     <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="form-group">
       <label>Country</label>
       <select class="refer-section-option" name="u_country" id="cars">
        <option>Select Country</option>
        @foreach($country as $countries)
        <option>{{$countries->country_name}}</option>
        @endforeach
       </select>
      </div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="form-group">
       <label>City</label>
       <input type="text" name="u_city" placeholder="City" class="form-control" required>
      </div>
     </div>
     <div class="col-lg-12 col-md-6 col-sm-6">
      <div class="form-group">
       <label>Course Recommended</label>
        <select class="refer-section-option" name="rec_course" id="cars">
         <option>Select Course Recommended</option>
         <option>Not sure</option>
         @foreach($course as $courses)
         <option>{{$courses->course_title}}</option>
         @endforeach
        </select>
      </div>
     </div> 
     <div class="who-referring-input-area">
      <p>Who is referring?</p>
     </div>
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
       <label>First Name</label> 
       <input type="text" name="r_firstname" placeholder="First Name" class="form-control" required>
      </div>
     </div> 
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
       <label>Last Name</label> 
       <input type="text" name="r_lastname" placeholder="Last Name" class="form-control" required>
      </div>
     </div>
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
       <label>Email Address</label> 
       <input type="text" name="r_email" id="r_email" placeholder="Email Address" class="form-control" required>
       <span class="text-danger" id="r_email_error"></span>
      </div>
     </div>
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
       <label>Phone Number</label> 
       <input type="text" name="r_phone" autocomplete='off' placeholder="Phone Number" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" minlength="10" maxlength="15" class="form-control" required>
      </div>
     </div>
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
      <div class="refer-friend-btn-area">
        <input type="submit" class="refer-friend-submit-btn" value="Submit">
       <!-- <a class="" href="#">Submit</a> -->
      </div>
     </div>  
    </div> 
   </form>
   <script>
    function getstarted()
    {
      var u_email=document.getElementById('u_email').value;
      var r_email=document.getElementById('r_email').value;
      var emailformat = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
      if(!u_email.match(emailformat)){
        document.getElementById('u_email_error').innerHTML="Please enter email in valid email format";
        setTimeout(() => {
          document.getElementById('u_email_error').innerHTML ="";
        }, 5000);
        return false;
      }
      if(!r_email.match(emailformat)){
        document.getElementById('r_email_error').innerHTML="Please enter email in valid email format";
        setTimeout(() => {
          document.getElementById('r_email_error').innerHTML ="";
        }, 5000);
        return false;
      }
    }
   </script>
  </div>
 </div> 
</div> 
</section>
<!--Refer Friend Section end Here -->

@include('frontend.slider-with-chatButton')

@include('frontend.include.footer')