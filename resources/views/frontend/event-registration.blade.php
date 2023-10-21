@section('title', 'Event Registeration')
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
      <h2>Join us at our Events</h2>
     </div> 
    </div> 
   </div>  
  </div> 
</div>
</section> -->

<!--inner breadcrumb Section end Here -->


<!--Event Registeration Section end Here -->

<section class="event-registeration-info-area">
 <div class="container">
  <div class="row">
    @foreach($event as $events)
    <div class="col-lg-12 col-md-12 col-sm-12">
     <div class="event-name"> 
      <h5><a href="{{url('events')}}">Events</a> > {{ $events->name }} > Register</h5> 
    </div> 
    </div>
    <div class="col-lg-5 col-md-12 col-sm-12">
     <div class="effect-general-public-info">
      <h2>{{ $events->name }}</h2>
      <!-- <h2>General Public</h2> -->
      <div class="event-registeration-date-time-venu">
       <ul>
        <li><img src="{{ URL::asset('assets/frontend/images/calendar.png') }}" alt=""><?php echo date("F d Y", strtotime($events->event_date))?></li> 
        <li><img src="{{ URL::asset('assets/frontend/images/clock.png') }}" alt=""><?php echo date("H:i:s" , strtotime($events->event_time) ) ?></li> 
        <!-- <li><img src="{{ URL::asset('assets/frontend/images/camera.png') }}" alt=""><a href="{{ $events->event_wblink}}">{{ $events->event_wblink}}</a></li>  -->
       </ul> 
      </div> 
     </div>
    </div>
    <div class="col-lg-7 col-md-12 col-sm-12">
     <div class="event-registeration-form-info"> 
      <form class="event-registeration-form-input" onsubmit="return evntreg();" action="{{ url('insert_registration') }}" method="post" enctype="multipart/form-data">
      @csrf
      <!-- @if(Session::has('message'))
        <p class="alert alert-success" id="alert">{{ Session::get('message') }}</p>
      @endif -->
       <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
         <div class="form-group">
          <input type="hidden" name="event_id" value="{{$events->id}}">
          <label>First Name</label> 
          <input type="text" name="first_name" placeholder="First Name" id="first_name" class="form-control" required>
          <span class="text-danger" id="fname_error"></span>
         </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
         <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="last_name" placeholder="Last Name" id="last_name" class="form-control" required>
          <span class="text-danger" id="lname_error"></span>
         </div>
        </div>
        <div class="col-lg-12 col-md-6 col-sm-6">
         <div class="form-group">
          <label>Gender</label>
          <select class="section-option" name="gender" id="gender" required>
           <option value="">Select Gender</option> 
           <option value="male">Male</option>
           <option value="female">Female</option>
           <option value="other">Other</option>
          </select>
         </div>
        </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" autocomplete='off' onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" name="phone" minlength="10" maxlength="15" placeholder="Phone Number" id="phone" class="form-control" required>
          <span id="text-danger" id="phone_error"></span>
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" placeholder="Email" id="email" class="form-control" required>
          <span class="text-danger" id="email_error"></span>
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
         <label>City</label>
          <input type="text" name="city" placeholder="City" id="city" class="form-control" required>
          <span class="text-danger" id="city_error"></span>
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
         <label>Country</label>
          <select class="section-option" name="country" id="cars" required>
           <option value="">Select Country</option>
           @foreach($country as $countries) 
           <option value="{{ $countries->country_name }}">{{ $countries->country_name }}</option>
           @endforeach
          </select>
        </div>
       </div>
       <div class="col-lg-12 col-md-6 col-sm-6">
        <div class="event-registeration-btn-area">
        <input type="submit" class="event-registeration-btn" value="Submit">  
       </div>
      </div>   
      </div> 
      </form> 
    </div> 
    @endforeach
  </div>
 </div> 
</div>
</section>

<!--Event Registeration Section end Here -->

@include('frontend.include.footer')
<script type="text/javascript">
  function evntreg(){
    function funfname() {  
      document.getElementById('fname_error').innerHTML ="";
    }
    function funlname() {  
      document.getElementById('lname_error').innerHTML ="";
    }
    function funemail() {  
      document.getElementById('email_error').innerHTML ="";
    }
    function funphone() {  
      document.getElementById('phone_error').innerHTML ="";
    }
    function funcompany() {  
      document.getElementById('city_error').innerHTML ="";
    }
  var fname=document.getElementById('first_name').value;
  var lname=document.getElementById('last_name').value;
  var email=document.getElementById('email').value;
  var phone = document.getElementById('phone').value;
  var city = document.getElementById('city').value;
  //alert(city);
  var alphabet= /^[a-zA-Z]*$/;
  //var pattern = /[0-9!"£$%^&*()_+-=]/;
  var validRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    if(!fname.match(alphabet)){
      document.getElementById('fname_error').innerHTML="First Name should be alphabets only";
      fname = setTimeout(funfname, 5000);
      return false;
    }
    if(!lname.match(alphabet)){
      document.getElementById('lname_error').innerHTML="Last Name should be alphabets only";
      lname = setTimeout(funlname, 5000);
      return false;
    }
    
    if(!email.match(validRegex)){
      document.getElementById('email_error').innerHTML="Please enter email in valid email format";
      email = setTimeout(funemail, 5000);
      return false;
    }
    if(!city.match(alphabet)){
      document.getElementById('city_error').innerHTML="City Name should be alphabets only";
      city = setTimeout(funcompany, 5000);
      return false;
    }
  }
</script>
<!-- <script>
  $("document").ready(function(){
    setTimeout(function(){
       $("#alert").remove();
    }, 5000 ); // 5 secs

});
</script> -->