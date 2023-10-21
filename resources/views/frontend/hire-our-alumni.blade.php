@include('frontend.include.header')

<!--inner breadcrumb Section Start Here -->

<style type="text/css">

.recruiting-partner-testimonail-content {

    width: 75%;

    margin: 0px 0px 0px auto;

    overflow: auto;

    height: 220px;

}

.recruiting-partner-testimonail-content::-webkit-scrollbar {

   width: 7px;

}

.recruiting-partner-testimonail-content::-webkit-scrollbar-thumb {

   background: #dbd8d8; 

   border-radius: 10px;

}

.recruiting-partner-testimonail-content p {

        margin: 0px 0px 0px 0px;

        padding: 0px 0px 0px 0px;

        word-break: break-all;

        /* text-transform: capitalize; */

} 

.recruiting-partner-testimonials-brand-icon {

    position: absolute;

    top: 30px;

    right: 30px;

    font-size: 40px;

    width: 72px;

    height: 44px;

    border: 1px solid #ccc;

    overflow: hidden;

}

.recruiting-partner-testimonials-brand-icon img {

    width: 100%;

    height: 100%;

    object-fit: cover;

}

.recruiting-partner-testimonail-user img {

    width: 130px;

    height: 130px;

    border-radius: 50%;

    border: 5px solid #FFA552;

    object-fit: cover;

}

.recruiting-partner-testimonail-content h4, .recruiting-partner-testimonail-content h5 {

    text-transform: capitalize;

}

.meet-our-team-img-area {

    overflow: hidden;

    width: 140px;

    height: 140px;

}

.meet-our-team-img-area img {

    width: 100%;

    height: 100%;

    border-radius: 50%;

    object-fit: revert;

}

input.multiselect-dropdown-search.form-control {

    margin-top: 0px;

}

 .recruiting-partners-main-info {

    background-position: top center;

}

.recruiting-partner-testimonail-content p {

    word-break: break-word;

    text-align: justify;

    padding-right: 10px;

}

</style>

<section class="inner-banner-detail-area">

 <div class="inner-banner-img-area">

  <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[4]) }}" alt="Refer a friend">

 </div>

 <div class="breadcrum-info-main-area">   

  <div class="container">

   <div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

     <div class="breadcrum-info-title">

      <h2>Hire Our Alumni</h2>

     </div> 

    </div> 

   </div>  

  </div> 

</div>

</section>



<!--inner breadcrumb Section end Here -->



<!-- hire alumni Section start here -->



<section class="hire-begin-journey-main" style=" background-color:white; background-image:url(assets/frontend/images/ser-bg.png)">

 <div class="container">

  <div class="row">

   <div class="col-lg-6 col-md-12 col-sm-12"> 

    <div class="hire-begin-journey-heading">

    <h2>Begin your</h2>

    <h2>Journey today!</h2>

    <p>You are a great candidate if you are…</p>

    </div>

    <div class="hire-begin-journey-content">

     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> 
      
   </div>

    <div class="our-story-img-area mb-5">

      <img style="width:100%;height:330px;" src="{{ url('assets/upload_aboutus/'.$section_ones[0]->image1)}}">

    </div>

   </div>

   <div class="col-lg-6 col-md-12 col-sm-12">

    <div class="hire-begin-journey-form-info">

     <h4>Fill Out the Form Below to Get Started</h4>

     <p>What talent are you interested in?</p> 

     <form action="{{ url('/insert_hreoalumni') }}" class="hire-begin-journey-form" method="post" enctype="multipart/form-data" >

     @csrf 

      <!-- @if(Session::has('message'))

        <p class="alert alert-success">{{ Session::get('message') }}</p>

      @endif -->

      <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6">

          <div class="form-group">

            <input type="text" name="first_name" placeholder="First Name" id="first_name" class="form-control">

          </div>

          <span id="fname_error" class="text-danger"></span>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">

          <div class="form-group">

            <input type="text" name="last_name" placeholder="Last Name" id="last_name" class="form-control">

          </div>

          <span id="lname_error" class="text-danger"></span>

        </div> 

        <div class="col-lg-6 col-md-6 col-sm-6">

          <div class="form-group">

            <input type="text" name="email" placeholder="Email Address" class="form-control" id="email">

          </div>

          <span class="text-danger" id="email_error"></span>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">

          <div class="form-group">

            <input type="text" name="phone" autocomplete='off' onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" minlength="10" maxlength="15" id="phone" placeholder="Phone Number" class="form-control">

          </div>

          <span id="phone_error" class="text-danger"></span> 

        </div>

        <div class="col-lg-12 col-md-6 col-sm-6">

          <div class="form-group">

            <input type="text" name="company" placeholder="Name of Company" id="company" class="form-control">

          </div>

          <span id="company_error" class="text-danger"> 

        </div>

        <div class="col-lg-12 col-md-6 col-sm-6 mt-3">

          <div class="form-group">

            <label>Talent Required</label>

            <input type="text" name="talent" placeholder="Role(s) required" id="talent" class="form-control mt-0">

            <!-- <label>Talent Required</label> -->

            <!-- <select name="talent[]" id="talent" class="form-control" multiple multiselect-search="true" multiselect-select-all="false" multiselect-max-items="{{count($talents)}}">

              @if(isset($talents) && count($talents) > 0)

                @foreach($talents as $val)

                  <option value="{{$val->talent_name}}">{{$val->talent_name}}</option>

                @endforeach

              @endif

            </select> -->

          </div>

          <span class="text-danger" id="talent_error"></span>

          <!-- <div class="business-software-developer-info mt-3">

            <div class="business-analyst-main">

              <p>Business Analyst</p> 

            </div>

            <div class="software-developer-main">

              <p>Software Developer</p> 

            </div>

          </div> -->

        </div>

        <!-- <div class="col-lg-12 col-md-6 col-sm-6 mt-3" id="">

          <input type="checkbox" name="" id="talent_checkbox" onclick="talent_others();"> Enter Talent not listed above ?

        </div>

        <div class="col-lg-12 col-md-6 col-sm-6" id="talent_others_input" style="display:none">

          <div class='form-group' id='talent_div'>

            <input type='text' name='talent_input' title="If you have more than one Talent then separate each talent with comma (,)" placeholder='eg. Business Analyst, Software Developer, Web Designer etc.' id='talent_input' class='form-control'>

          </div>

          <span id='talent_input_error' class='text-danger'>

        </div> -->

        <div class="col-lg-12 col-md-6 col-sm-6">

          <div class="hire-btn-info-area"> 

            <button type="submit" class="hire-alumni-sbmt-btn" id="submit" onclick="return hreoalumni();">Submit</button>

          </div> 

          <div class="hire-content-area-info">

            <p>By clicking “Submit” you accept our <a href="{{url('terms')}}" target="_blank"><span> Terms </span></a> and will also receive exclusive offers and updates about new talents, workshops and events.</p>

          </div>

        </div>

      </div> 

     </form> 

    </div>

   </div>

  </div>

  </div>

</section>



<!-- hire alumni Section end here -->



<!--  recruiting partners Section Start here -->



<section class="recruiting-partners-main-info" style=" background-color:white; background-image:url(assets/frontend/images/abs-bg.png)">

 <div class="container">

  <div class="row">

   <div class="col-lg-12 col-md-12 col-sm-12">

    <div class="recruiting-partner-heading-main text-center">

     <h2>What Our recruiting partners are saying</h2> 

    </div>

   </div> 



   @foreach($testimonial as $testimonials)

   <div class="col-lg-6 col-md-6 col-sm-6">

    <div class="recruiting-partner-testimonail-info">

     <div class="recruiting-partner-testimonail-user">

      <img src="{{ url('assets/testimonial_img/profile_img/'.$testimonials->profile_img	)}}" alt="avatar">

     </div> 

     <div class="recruiting-partner-testimonail-content">

      <h4>{{ $testimonials->name}}</h4>

      <!-- <div class="recruiting-partner-testimonials-brand-icon">

       <img src="{{ url('assets/testimonial_img/brand_img/'.$testimonials->brand_image	)}}" alt="bell">

      </div> -->

      <h5>{{ $testimonials->destination }}</h5>

      <p>{!! $testimonials->about !!}</p>

     </div> 

    </div> 

   </div>

   @endforeach



  </div>

 </div>

</section>



<!--recruiting partners Section End here -->



<!-- here our recruiting partners Section start here-->



<!-- <section class="here-recruiting-partners-info">

 <div class="container">

  <div class="row">

   <div class="col-lg-12 col-md-12 col-sm-12">

    <div class="here-recruiting-heading-info">

     <h2>Here are our Recruiting Partners</h2>

    </div> 

   </div>

   <div class="col-lg-12 col-md-12 col-sm-12">



    <div class="row">

    @foreach($recupartner as $recupartners)

     <div class="col-lg-3 col-md-3 col-6">

     <div class="here-recruiting-circle-ara">

     <div class="meet-our-team-img-area">

        <img src="{{ url('assets/upload_aboutus/'.$recupartners->image)}}" alt="">

      </div>

     </div> 

    </div> 

    @endforeach

    </div> 

   </div>

  </div> 

 </div> 

</section> -->

<!-- here our recruiting partners Section end here-->

@include('frontend.slider-with-chatButton')

@include('frontend.include.footer')

<script src="{{url('/')}}/assets/frontend/js/multiselect.js"></script>

<!-- <script>

  $(document).ready(function () {

    $('.alert').fadeOut(8000);

    $(window).scrollTop($('#alert').position().top);

  });

</script> -->

<script>

  function talent_others(){



    var talent_checkbox = $('#talent_checkbox').prop('checked');

    if(talent_checkbox == true){

      $("#talent_others_input").show();

      return false;

    }else{

      $("#talent_others_input").hide();

      $("#talent_input").val('');

      return false;

    }

  }

</script>

<script type="text/javascript">

  function hreoalumni(){

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

      document.getElementById('company_error').innerHTML ="";

    }

    function funtalent() {  

      document.getElementById('talent_error').innerHTML ="";

    }

    // function funtalentinput() {  

    //   document.getElementById('talent_input_error').innerHTML ="";

    // }

  var fname=document.getElementById('first_name').value;

  var lname=document.getElementById('last_name').value;

  var email=document.getElementById('email').value;

  var phone = document.getElementById('phone').value;

  var company = document.getElementById('company').value;

  var talent= document.getElementById('talent').value;

  // var talent_input= document.getElementById('talent_input').value;

  var alphabet= /^[a-zA-Z]*$/;

  var number= /^[0-9]*$/;

  var validRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;



    if(fname == ""){

      document.getElementById('fname_error').innerHTML="Please enter First Name";

      fname = setTimeout(funfname, 5000);

      return false;

    }

    else if(!fname.match(alphabet)){

      document.getElementById('fname_error').innerHTML="First Name should be alphabets onlyt";

      fname = setTimeout(funfname, 5000);

      return false;

    }

    else if(lname == ""){

      document.getElementById('lname_error').innerHTML="Please enter Last Name";

      lname = setTimeout(funlname, 5000);

      return false;

    }

    else if(!lname.match(alphabet)){

      document.getElementById('lname_error').innerHTML="Last Name should be alphabets only";

      lname = setTimeout(funlname, 5000);

      return false;

    }

    else if(email == ""){

      document.getElementById('email_error').innerHTML="Please enter email id";

      email = setTimeout(funemail, 5000);

      return false;

    }

    else if(!email.match(validRegex)){

      document.getElementById('email_error').innerHTML="Please enter email in valid email format";

      email = setTimeout(funemail, 5000);

      return false;

    }

    else if (phone == "") {

      document.getElementById("phone_error").innerHTML ="Please enter Phone Number";

      phone = setTimeout(funphone, 5000);

      return false;

    }

    else if (isNaN(phone)) {

      document.getElementById("phone_error").innerHTML ="Please enter Numeric value";

      phone = setTimeout(funphone, 5000);

      return false;

    }

    else if(company == ""){

      document.getElementById('company_error').innerHTML="Please enter Company Name";

      company = setTimeout(funcompany, 5000);

      return false;

    }

    else if(talent == ""){

      document.getElementById('talent_error').innerHTML="Please enter Talent Required";

      talent = setTimeout(funtalent, 5000);

      return false;

    }

    // else if(talent == "" && talent_input == ""){

    //   document.getElementById('talent_input_error').innerHTML="Please select or enter Talent";

    //   talent_input = setTimeout(funtalentinput, 5000);

    //   return false;

    // }

    

    

  }

</script>

<script>

  function success() {

	 if(document.getElementById("talent").value==="") { 

            document.getElementById('submit').disabled = true; 

        } else { 

            document.getElementById('submit').disabled = false;

        }

    }

</script>