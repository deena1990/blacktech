@section('title', 'Contact Us')

@include('frontend.include.header')

<!--inner breadcrumb Section Start Here -->

<style>

  section.full-name-info-area {

    background-position: top center;

}

</style>

<section class="inner-banner-detail-area">

 <div class="inner-banner-img-area">

  <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[5]) }}" alt="Refer a friend">

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

</section>



<!--inner breadcrumb Section end Here -->



<!--begin your form Section Start Here -->



<section class="begin-your-main-info" >

 <div class="container">

  <div class="row">

    <div class="col-lg-6 col-md-12 col-sm-12">

     <div class="begin-journey-info-area">

      <!-- <h2>Begin your </h2>

      <h2>Journey today!</h2>

      <p>You are a great candidate if you are…</p>  -->

     </div>

     <div class="upon-completion-list-area">

     <p>{!! $content->beginyourJourney !!}</p>

       <!-- <ul>

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Specify project management methodologies such as Waterfall and Agile</li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Manage any project from start to finish</li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Manage IT projects using the SDLC framework.</li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Define, manage, and track project’s three constraints: scope, schedule.</li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Make the switch to agile project management.</li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Tactically manage projects with best-practice tools like MS Project.</li>

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Dealing with project stakeholders, using effective soft skills.</li>

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Pass the PMP exam on the first try.</li>

       </ul> -->

      </div> 

      <!-- <div class="schedule-call-info-area">

       <h5>Speak to a learnung advisor should be changed to speak to a learning advisor chat with our learning advisor </h5> 

      </div> -->

      <div class="schedule-call-btn-area">

       <a class="schedule-call-btn" href="https://wa.me/{{explode(':::',$content->status)[0]}}">Schedule a Call</a>

      </div>

    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">

     <div class="begin-your-form-info">

      <!-- @if(Session::has('message'))

        <p class="alert alert-success">{{ Session::get('message') }}</p>

      @endif  -->

      <h5>Fill Out the Form Below to Get Started</h5>

      <!-- <p>What course are you interested in?</p>  -->

      <form class="begin-your-form-input" action="{{ url('contact_insert') }}" method="post" enctype="multipart/form-data">

        

      @csrf

       <div class="row">

         <!-- <div class="col-lg-12 col-md-6 col-sm-6">

         <div class="form-group">

          <label>Course Type</label>

          <select class="section-option" name="course_type" id="course_type" onchange="SelectCourseType()">

           <option>Choose Course Type</option> 



           

           

          </select>

         </div>

        </div> -->

        <div class="col-lg-12 col-md-6 col-sm-6">

         <div class="form-group">

          <!-- <label>Course Name</label> -->

          <label>What course are you interested in?</label>

          <select class="section-option" name="course" id="course">

          <option disabled selected style="display:none;" id="choose">Choose a Course</option>

          @foreach($courses as $course)

          <option value="{{ $course->id }}">{{ $course->course_title }}</option>

          @endforeach

          </select>

          <div style="margin: -10px 0px 6px 0px;">

            <span class="text-danger" id="course_error"></span>

          </div>

         </div>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">

         <div class="form-group">

          <label>First Name</label> 

          <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" required>

         </div>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">

         <div class="form-group">

          <label>Last Name</label>

          <input type="text" name="lname" placeholder="Last Name" class="form-control" required>

         </div>

        </div>

       <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="form-group">

          <label>Phone Number</label>

          <input type="text" name="phone" placeholder="Phone Number" autocomplete='off' onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" minlength="10" maxlength="15" class="form-control" required>

        </div>

       </div>

       <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="form-group">

          <label>Email Address</label>

          <input type="email" name="email" placeholder="Email Address" id="email" class="form-control" required>

          <span class="text-danger" id="email_error"></span>

        </div>

       </div>

       <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="form-group">

        <label for="country">Country</label>

            <select class="section-option" name="country" id="country" onchange="check_country();">

                <option selected disabled style="display:none">Select Country</option>

                @foreach($country as $countries)

                <option>{{$countries->country_name}}</option>

                @endforeach

            </select>

            <span class="text-danger" id="country_error"></span>

        </div>

       </div>

       <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="form-group">

          <label>City</label>

          <input type="text" name="city" id="city" placeholder="City" class="form-control" required readonly>

        </div>

        <span class="text-danger" id="city_error"></span>

       </div>

       <div class="col-lg-12 col-md-6 col-sm-6">

        <div class="begin-journey-btn-area">

          <input type="submit" class="begin-journey-btn" onclick="return ValidationEvent();" value="Submit">  

         <!-- <a class=""></a>   -->

         <p>By clicking “Submit” you accept our <a href="{{url('terms')}}" target="_blank"><b> Terms and Condition

        </b></a> and will also receive exclusive offers and updates about new courses, workshops and events.</p>

       </div>

      </div> 

      

      



      </div> 

      </form> 

    </div>    

  </div>

  </div>

 </div>

</section>



<!--begin your form Section end Here -->





<!--Full Name Section Start Here -->



<section class="full-name-info-area" style=" background-color:white; background-image:url(assets/frontend/images/ser-bg.png)">

 <div class="container">

  <div class="row">

   <!-- <div class="col-lg-12 col-md-12 col-sm-12">

    <div class="full-name-info-main-box">

     <div class="full-name-img-box">

      <img src="{{ URL::asset('assets/frontend/images/avatar-1.png') }}" alt="avatar"> 

     </div> 

     <div class="full-name-content-box">

      <h2>Full Name</h2> 

      <h3>Project Manager, John Doe Industries</h3>

      <p>The PM course was very insightful and relevant to the direction I was trying to take my career. It helped provide additional organizational, and leadership skills. Shortly after taking the course I got a new Leadership position with a significant pay increase. I thank the SkillHat team for facilitating my progress.</p>

      <h4>Course</h4>

      <h5>Project Management</h5>

     </div> 

    </div>

   </div> -->

   <div class="col-lg-12 col-md-12 col-sm-12">

    <div class="contact-refer-friend-detail">

     <p>Refer a colleague, family member or friend to BlackTECH and get a <strong>$100 referral reward</strong> when they sign up for any of our instructor-led courses</p> 

     <a class="contact-refer-friend-btn" href="{{url('referafrnd')}}">Refer a friend</a>

    </div>

   </div> 

  </div>

 </div>

</section>

<!-- <script>

  $(document).ready(function () {

    $('.alert').fadeOut(8000);

    $(window).scrollTop($('#alert').position().top);

  });

</script> -->

<script>

  function check_country(){

    $('#city').removeAttr('readonly');

  }

</script>

<script>

  function ValidationEvent(){

    var course = $('#course').val();

    var email = $('#email').val();

    var country = $('#country').val();

    var alphabet= /^[a-zA-Z]*$/;

    var number= /^[0-9]*$/;

    var emailformat = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;



    if (course == null) {

      document.getElementById('course_error').innerHTML ="Please select course";

      setTimeout(() => {

         document.getElementById('course_error').innerHTML ="";

      }, 5000);

      return false;

    }

    if (country == null) {

      document.getElementById('country_error').innerHTML ="Please select country";

      setTimeout(() => {

         document.getElementById('country_error').innerHTML ="";

      }, 5000);

      return false;

    }

    if(!email.match(emailformat)){

      document.getElementById('email_error').innerHTML="Please enter email in valid email format";

      setTimeout(() => {

         document.getElementById('email_error').innerHTML ="";

      }, 5000);

      return false;

     }

  }

</script>

<script>

  function SelectCourseType(){

    var id = $('#course_type').val();

    var token = '<?php echo csrf_token();?>';

      $.ajax({ 

         type:"POST",

         url:"{{url('/cousreTypeId')}}",

         data:{id:id,_token:token},

         success:function(data)

         { 

            alert(data);

            // document.write(data);

            // var obj = JSON.parse(data);

            // alert(obj.ShowData2);

            // $('#course').html(obj.ShowData2);

            // $('#choose').html(ShowData1);

            // $('#course').html(data);

         }

         }); 

  }

</script>

<!--Full Name Section end Here -->

@include('frontend.slider-with-chatButton')


@include('frontend.include.footer')

