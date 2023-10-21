<!DOCTYPE html>

<html>

<head>

	<title>BlackTECH Academy  @yield('title')</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/frontend/images/fav-icons.png') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/frontend/css/bootstrap.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/frontend/css/style.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/frontend/css/responsive.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/frontend/font-awesome/css/font-awesome.min.css') }}">

	<link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/owl.carousel.min.css') }}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



  <style type="text/css">

.footer-info-main-area {

    background:#141414 !important;

}

.footer-info-main-area a {

    color: white !important;

}

.footer-info-main-area p {

    color: white !important;

}

.footer-info-main-area h5 {

    color: 

    white !important;

     

}

button.subscribe-btn {

    background: #ff5909  !important;

}

.partner-logo-info h5{

  background-color: #ff5909;

}

.social-contact-menu-info ul li a i{

  color:white !important;

}

.copyright-area {

    background: black !important;

 

}

.copyright-area-text p{

  color:white;

}

/* footer */

    .sticky{

        position: fixed;

        top: 0;

        left: 0;

        width: 100%;

        background: #ededed;

        box-shadow: 0px 0px 10px #c7c4c4;

        z-index: 999;
        padding: 0;

    }

  

  logo-slider {  

    padding: 0px;

    overflow: hidden;

    width: 100%;

    margin: 0 auto;   

    position: relative;

    display: flex;

  }

  logo-slider:hover div {

    /* animation-play-state: paused; */

  }

  logo-slider div { 

    display: flex;

    position: relative;

    animation: marquee 10s linear infinite;

    justify-content: space-around;

  }

  logo-slider div img {

    display: block;

    height: 80px;

    width: 100px;

    margin: 0 1vw;

    object-fit: contain;

  }

  logo-slider div img:after {

    content: "";

    position: absolute;

    width: 100%;

    height: 100%;

    left: 0;

    top: 0;

    background: linear-gradient(to right, white, rgba(white, 0) 80px, rgba(white, 0) calc(100% - 80px), white);

  }

  @keyframes marquee {

      0%   { transform: translateX(0%); }

      100% { transform: translateX(-100%); }

  }

  .subCourse {
    list-style: none;
    padding: unset;
    background: #ff6600;
    padding: 15px 0px;
    display:none;
    position:absolute;
    z-index: 999999;
    width:224px;
    border-radius: 4px;
    box-shadow: 0px 0px 10px #00000045;
}
.subCourse li{
  line-height:2.1;
  padding: 0px 20px;
}
.subCourse input{
  line-height:2.1;
  padding: 0px 20px;
}
.subCourse li a {
  color:white;
  font-weight:500;
}
.subCourse input.btn {
  color:white;
  font-weight:500;
}
.maimlistCourses:hover .subCourse {
  display: block;
}
.maimlistCourses{
position: relative;
}
/* ************Arjun css******************** */

ul.submenuList {
    list-style: none;
    background: #ff6600;
    padding: 15px 0px;
    position: absolute;
    width: 223px;
    left: 224px;
    z-index: 99999;
    top: 20px;
    border-radius: 4px;
    display: none;
    border-radius: 4px;
    box-shadow: 0px 0px 10px #00000045;
}
ul.submenuList li{
  line-height:2.1;
  padding: 0px 20px !important; 
}
.subCourse li.showsubMenu:hover > .submenuList{
  display: block;
}

  </style>

</head>

<body>

<!-- Header Top Section Start Here -->

<header class="header-navication-info-area">

  <section class="hrd-top-info">

    <div class="container">

      <div class="row">

        <div class="col-lg-12 col-md-12 right-box-info">

          <div class="hrd-right-info-area">

           <ul><?php ?>

           	<li class="divider-line"><a href="tel:{{$content->phone}}"><i class="fa fa-phone"></i>{{$content->phone}}</a></li>

           	<li class="divider-line"><a href="{{ url('referafrnd')}}">Refer a Friend</a></li>

           	<li><a href="{{ url('coming_soon') }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign In</a></li>

           </ul> 

          </div>

        </div>

      </div>

  </div>

 </section>

 <!-- Button trigger modal -->

<button type="button" class="btn btn-primary d-none" id="trigger_button" data-bs-toggle="modal" data-bs-target="#exampleModal1">

  Launch demo modal

</button>

@if(Session::has('message'))

<!-- Modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h1 class="modal-title fs-8 text-success" id="exampleModalLabel">Success !!!</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <p class="alert alert-success">{{Session::get('message')}}</p>

      </div>

    </div>

  </div>

</div>

@endif

@if(Session::has('message1'))

<!-- Modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h1 class="modal-title fs-8 text-success" id="exampleModalLabel">Success !!!</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <p class="alert alert-success">{{Session::get('message1')}}</p>

      </div>

    </div>

  </div>

</div>

@endif

@if(Session::has('message2'))

<!-- Modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h1 class="modal-title fs-8 text-danger" id="exampleModalLabel">Sorry !!!</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <p class="alert alert-danger">{{Session::get('message2')}}</p>

      </div>

    </div>

  </div>

</div>

@endif



<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h1 class="modal-title fs-5" id="exampleModalLabel">Log in to Black Tech Academy</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <div class="col-lg-12 col-md-12 col-sm-12">

          <div class="shing-form-main-info">

            <form class="shing-form-input-info" action="{{ url('/insert_signin') }}" method="post" onsubmit="return validateEmailId();" enctype="multipart/form-data">

              @csrf

            <div class="shing-input-detail-area">

              <label>Email Address</label> 

              <input type="email" name="email" placeholder="Email Address" id="email_Id" class="form-control" required>

              <span class="text-danger" id="email_Id_error"></span>

            </div> 

            <div class="shing-input-detail-area">

              <label>Password</label> 

              <input type="Password" name="password" placeholder="Password" class="form-control" required>

            </div> 

            <div class="sign-submit-btn-info">

            <button type="submit" class="sign-submit-btn">Submit</button> 

            </div>

            </form>

          </div>

          <script>

            function validateEmailId(){

              var email = document.getElementById('email_Id').value;

              var emailformat = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

              if(!email.match(emailformat)){

                document.getElementById('email_Id_error').innerHTML="Please enter email in valid email format";

                setTimeout(() => {

                  document.getElementById('email_Id_error').innerHTML ="";

                }, 5000);

                return false;

              }

            }

          </script>

        </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary">Save changes</button>

      </div>

    </div>

  </div>

</div>



 <nav class="navbar navbar-expand-lg stikymenu">

  <div class="container">

    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{URL::asset('assets/upload_logo/'.$content->logo) }}" alt="logo"></a>

    <!-- <a class="navbar-brand" href="{{ url('/') }}"><img src="{{URL::asset('assets/frontend/images/logoblack.png') }}" alt="logo"></a> -->

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>

    </button>
  <?php 
    $ap_course=DB::table('tbl_course')->where('course_type', "1")->where('status', 1)->orderby('id','desc')->get();

    $cc_course=DB::table('tbl_course')->where('course_type', "2")->where('status', 1)->orderby('id','desc')->get();

    $fc_course=DB::table('tbl_course')->where('course_type', "3")->where('status', 1)->orderby('id','desc')->get();

    $cm_course=DB::table('tbl_course')->where('course_type', "4")->where('status', 1)->orderby('id','desc')->get();

  ?>

    <div class="collapse navbar-collapse blacktechMenu" id="navbarNavAltMarkup">

      <ul class="navbar-nav">

        <li class="nav-item">

          <a class="nav-link <?php if($menubar === "index") echo "active"; ?>" aria-current="page" href="{{ url('/') }}">Home</a>

        </li>

        <li class="nav-item maimlistCourses">

          <a class="nav-link <?php if($menubar === "courses") echo "active"; ?>">Courses <i class=" headIcon 	fa fa-angle-down"></i></a>


          <style>
            /* input.btn:not(.btn-check)+.btn:active {
                border: none;
            } */
            .btn-check:checked+.btn, .btn.active, .btn.show, .btn:first-child:active, :not(.btn-check)+.btn:active {
                color: var(--bs-btn-active-color);
                background-color: var(--bs-btn-active-bg);
                border-color: transparent;
            }
            ul.submenuList.getList{
               top:50px;
            }
            ul.submenuList.careerMentorship{
              top:85px;
            }
            ul.submenuList.freeCourses{
              top:120px;
            }
          </style>
          <ul class="subCourse">

            <li class="coursItem <?php if(count($ap_course) > 0){ echo 'showsubMenu'; } ?>"> <a  class="" href="{{ url('courses?courseType=Accelerator_Programs') }}">Accelerator Programs <?php if(count($ap_course) > 0){ echo '<i class="headIcon fa fa-angle-down"></i>'; } ?></a>
              <?php if(count($ap_course) > 0){ ?>
              <ul class="submenuList">
                @foreach($ap_course as $apCourse)
                <form action="{{url('course')}}/{{str_replace(' ','-',$apCourse->course_title)}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{base64_encode($apCourse->id)}}"> 
                  <input type="submit" title="{{$apCourse->course_title}}" class="btn" value="<?php if(strlen($apCourse->course_title) > 18){ echo substr($apCourse->course_title, 0, 18).'...'; }else{ echo $apCourse->course_title; } ?>"> 
                </form>
                @endforeach
              </ul>
              <?php } ?> 
            </li>

            <li class="coursItem <?php if(count($cc_course) > 0){ echo 'showsubMenu'; } ?>"> <a href="{{ url('courses?courseType=Get_Certified') }}">Get Certified <?php if(count($cc_course) > 0){ echo '<i class="headIcon fa fa-angle-down"></i>'; } ?></a>
              <?php if(count($cc_course) > 0){ ?>
              <ul class="submenuList getList">
                @foreach($cc_course as $ccCourse)
                <form action="{{url('course')}}/{{str_replace(' ','-',$ccCourse->course_title)}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{base64_encode($ccCourse->id)}}"> 
                  <input type="submit" title="{{$ccCourse->course_title}}" class="btn" value="<?php if(strlen($ccCourse->course_title) > 18){ echo substr($ccCourse->course_title, 0, 18).'...'; }else{ echo $ccCourse->course_title; } ?>"> 
                </form>
                @endforeach
              </ul>
              <?php } ?>
            </li>

            <li class="coursItem <?php if(count($cm_course) > 0){ echo 'showsubMenu'; } ?>"> <a href="{{ url('courses?courseType=Career_Mentorship') }}">Career Mentorship <?php if(count($cm_course) > 0){ echo '<i class="headIcon fa fa-angle-down"></i>'; } ?></a>
              <?php if(count($cm_course) > 0){ ?>
              <ul class="submenuList careerMentorship">
                @foreach($cm_course as $cmCourse)
                <form action="{{url('course')}}/{{str_replace(' ','-',$cmCourse->course_title)}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{base64_encode($cmCourse->id)}}"> 
                  <input type="submit" title="{{$cmCourse->course_title}}" class="btn" value="<?php if(strlen($cmCourse->course_title) > 18){ echo substr($cmCourse->course_title, 0, 18).'...'; }else{ echo $cmCourse->course_title; } ?>"> 
                </form>
                @endforeach
              </ul>
              <?php } ?>
            </li>

            <li class="coursItem <?php if(count($fc_course) > 0){ echo 'showsubMenu'; } ?>"> <a href="{{ url('courses?courseType=Free_Courses') }}">Free Courses <?php if(count($fc_course) > 0){ echo '<i class="headIcon fa fa-angle-down"></i>'; } ?></a>
              <?php if(count($fc_course) > 0){ ?>
              <ul class="submenuList freeCourses">
                @foreach($fc_course as $fcCourse)
                <form action="{{url('course')}}/{{str_replace(' ','-',$fcCourse->course_title)}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{base64_encode($fcCourse->id)}}"> 
                  <input type="submit" title="{{$fcCourse->course_title}}" class="btn" value="<?php if(strlen($fcCourse->course_title) > 18){ echo substr($fcCourse->course_title, 0, 18).'...'; }else{ echo $fcCourse->course_title; } ?>"> 
                </form>
                @endforeach
              </ul>
              <?php } ?>
            </li>

          </ul>

       </li>

       <li class="nav-item">

         <a class="nav-link <?php if($menubar === "about") echo "active"; ?>" href="{{ url('about') }}">About Us</a>

       </li>

       <li class="nav-item">

         <a class="nav-link <?php if($menubar === "joinevent") echo "active"; ?>" href="{{ url('events')}}">Events</a>

       </li>

       <li class="nav-item">

         <a class="nav-link <?php if($menubar === "testimonials") echo "active"; ?>" href="{{ url('testimonials') }}">Testimonials</a>

       </li>

       <li class="nav-item">

        <a class="nav-link <?php if($menubar === "hreoalumni") echo "active"; ?> " href="{{ url('hreoalumni') }}">Hire Our Alumni</a>

       </li>

       <li class="nav-item">

        <a class="nav-link <?php if($menubar === "contactus") echo "active"; ?>" href="{{ url('contactus') }}">Contact Us</a>

      </li>

      <li class="nav-item">

         <div class="header-get-started-btn-area">

          <a href="{{ url('community') }}" class="header-get-started-btn">Community</a>

         </div>	

      </li>

      </ul>

    </div>

  </div>

</nav>

 </header>

  <!-- Header Top Section End Here -->

