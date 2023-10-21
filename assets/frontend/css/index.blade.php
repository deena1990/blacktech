  @include('frontend.include.header')

  <!-- Slider Section Start Here -->
  <section class="slider-info-main-area">
   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
<?php $i=1; ?>
  @foreach($slider as $sliders)
  <div class="carousel-inner">
    <div class="carousel-item <?php if($i==1){ ?>active <?php } ?>">
      <img src="{{ url('assets/upload_slider/'.$sliders->image)}}" class="d-block w-100" alt="...">
      <div class="carousel-caption">
         <h3>{{ $sliders->heading }}</h3>
         <p>{!! $sliders->about !!}</p>
         <div class="courses-contact-btn-area">
         <a href="{{ url('courses') }}" class="our-courses-btn">Our Courses</a>
         <a href="{{ url('contactus') }}" class="connect-btn">Contact Us</a>
        </div>
      </div>
    </div>
    <?php $i++; ?>
   @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>	
</section>
<!-- Slider Section End Here -->

<!-- Immersive Learning experience Section Start Here -->
<section class="immersive-learning-experience">
 <div class="immersive-learning-experience-info">
  <img src="{{URL::asset('assets/frontend/images/immersive-learning.jpg') }}" alt="immersive learning"> 
 </div> 
 <div class="immersive-learning-experience-content"> 
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12"> 
    <div class="immersive-experience-text">
     <h2>An Immersive Learning<br>experience</h2> 
   </div>
  </div>
 </div> 
</div>
</section>
<!-- Immersive Learning experience Section End Here -->

<!-- Our Talent section start Here -->

<section class="our-talent-main-area">
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="our-talent-hading-area">
    <h4>Our Talent work with many of these leading companies</h4>	
    </div>	
   </div>
   @foreach($ldingcompns as $ldingcompn)
   <div class="col-lg-2 col-md-2 col-sm-12">
   	<div class="tech-companies-box">
	   <img src="{{ url('assets/upload_stpartners/'.$ldingcompn->image)}}" height="100%" width="100%" alt="">
   	</div>
   </div>
   @endforeach	
  </div>	
 </div>	
</section>

<!-- Our Talent section end Here -->
<!-- Explore Our Programs section Start Here -->

<section class="explore-programs-main-area">
 <div class="container counter-position-main-box">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="explore-programs-hading-area">
    <h4>Explore our Programs</h4>	
    <p>Learn to lead Business growth & Digital transformation.</p>
    <p>Learn to lead Business growth.</p>
    </div>	
   </div>
   	<div class="col-lg-12 col-md-12 col-sm-12">
     <div class="explore-programs-tab-area">
	   <!-- Nav tabs -->
	    <ul class="nav nav-tabs" role="tablist">
	     <li class="nav-item">
	        <a class="nav-link active" data-bs-toggle="tab" href="#home">Accelerator Programs</a>
	     </li>
	     <li class="nav-item">
	        <a class="nav-link" data-bs-toggle="tab" href="#menu1">Get Certified</a>
	     </li>
	     <li class="nav-item">
	        <a class="nav-link" data-bs-toggle="tab" href="#menu2">Free Courses</a>
	     </li>
	    </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div id="home" class="tab-pane active">
	     <div class="container">
	      <div class="row">
          
		  @foreach($course as $courses)
	       <div class="col-lg-3 col-md-12 col-sm-12">
	        <div class="explore-programs-main-box">	
	         <div class="explore-programs-img-box">
	          <img src="{{ url('assets/course_img/'.$courses->image)}}" alt=""> 	
	         </div>
	         <div class="explore-programs-text">
	         	
	          <h5>{{ $courses->course_title }}</h5> 
	          <!-- <h5>{{ $courses->instructor_name }}</h5>  -->
	         
	         </div>  	
	        </div>
	       </div>
		   @endforeach
	      </div>	
	     </div> 
	    </div>
	    <div id="menu1" class="tab-pane fade">
	     <div class="container">
	      <div class="row">
	      	<div class="col-lg-3 col-md-12 col-sm-12">
	        <div class="explore-programs-main-box">	
	         <div class="explore-programs-img-box">
	          <img src="{{ URL::asset('assets/frontend/images/section-4.jpg') }}" alt=""> 	
	         </div>
	         <div class="explore-programs-text">
	          <a href="#"> 
	           <h5>Web </h5> 
	           <h5>Design</h5> 	
	          </a>
	         </div>  	
	        </div>
	       </div>
	       <div class="col-lg-3 col-md-12 col-sm-12">
	        <div class="explore-programs-main-box">	
	         <div class="explore-programs-img-box">
	          <img src="{{ URL::asset('assets/frontend/images/section-1.jpg') }}" alt=""> 	
	         </div>
	         <div class="explore-programs-text">
	          <a href="#"> 	
	          <h5>Business</h5> 
	          <h5>Analyst</h5> 
	          </a>	
	         </div>  	
	        </div>
	       </div>
	       <div class="col-lg-3 col-md-12 col-sm-12">
	        <div class="explore-programs-main-box">	
	         <div class="explore-programs-img-box">
	          <img src="{{ URL::asset('assets/frontend/images/section-2.jpg') }}" alt=""> 	
	         </div>
	         <div class="explore-programs-text">
	          <a href="#"> 
	           <h5>Project </h5> 
	           <h5>Management</h5> 
	          </a>	
	         </div>  	
	        </div>
	       </div>	
	       <div class="col-lg-3 col-md-12 col-sm-12">
	        <div class="explore-programs-main-box">	
	         <div class="explore-programs-img-box">
	          <img src="{{ URL::asset('assets/frontend/images/section-3.jpg') }}" alt=""> 	
	         </div>
	         <div class="explore-programs-text">
	          <a href="#"> 
	           <h5>Web </h5> 
	           <h5>Development</h5> 
	          </a>	
	         </div>  	
	        </div>
	       </div>
	      </div>	
	     </div> 
	    </div>
	    <div id="menu2" class="tab-pane fade">
	      <div class="container">
	      <div class="row">
	       <div class="col-lg-3 col-md-12 col-sm-12">
	        <div class="explore-programs-main-box">	
	         <div class="explore-programs-img-box">
	          <img src="{{ URL::asset('assets/frontend/images/section-2.jpg') }}" alt=""> 	
	         </div>
	         <div class="explore-programs-text">
	          <a href="#"> 
	           <h5>Project </h5> 
	           <h5>Management</h5> 
	          </a>	
	         </div>  	
	        </div>
	       </div>	
	       <div class="col-lg-3 col-md-12 col-sm-12">
	        <div class="explore-programs-main-box">	
	         <div class="explore-programs-img-box">
	          <img src="{{ URL::asset('assets/frontend/images/section-1.jpg') }}" alt=""> 	
	         </div>
	         <div class="explore-programs-text">
	          <a href="#"> 	
	          <h5>Business</h5> 
	          <h5>Analyst</h5> 
	          </a>	
	         </div>  	
	        </div>
	       </div>
	       <div class="col-lg-3 col-md-12 col-sm-12">
	        <div class="explore-programs-main-box">	
	         <div class="explore-programs-img-box">
	          <img src="{{ URL::asset('assets/frontend/images/section-3.jpg') }}" alt=""> 	
	         </div>
	         <div class="explore-programs-text">
	          <a href="#"> 
	           <h5>Web </h5> 
	           <h5>Development</h5> 
	          </a>	
	         </div>  	
	        </div>
	       </div>
	       <div class="col-lg-3 col-md-12 col-sm-12">
	        <div class="explore-programs-main-box">	
	         <div class="explore-programs-img-box">
	          <img src="{{ URL::asset('assets/frontend/images/section-4.jpg') }}" alt=""> 	
	         </div>
	         <div class="explore-programs-text">
	          <a href="#"> 
	           <h5>Web </h5> 
	           <h5>Design</h5> 	
	          </a>
	         </div>  	
	        </div>
	       </div>
	      </div>	
	     </div> 
	    </div>
	    <div class="explore-more-btn-area">
	     <a href="#" class="explore-more-btn">Explore More</a> 	
	    </div>
	  </div>	
     </div>	
   	</div>

   	<div class="explore-programs-count-info">
     <div class="explore-programs-main">
      <div class="explore-programs-box">
       <div class="icon-box">	
        <img src="{{ URL::asset('assets/frontend/images/user-icon.png') }}" alt="user">	
       </div>
       <span class="count">7000</span>
       <span>+</span>
       <p>Students<br>Trained</p>
      </div>
      <div class="explore-programs-box">
       <div class="icon-box">
       <img src="{{ URL::asset('assets/frontend/images/meeting-icon.png') }}" alt="user">	
       </div>
       <span class="count">100</span>
       <span>+</span>
       <p>Hiring<br>Partners</p>
      </div>
      <div class="explore-programs-box">
      	<div class="icon-box">
       <img src="{{ URL::asset('assets/frontend/images/teacher-icon.png') }}" alt="user">
       </div>	
       <span class="count">50</span>
       <span>+</span>
       <p>Expert<br>Faculties</p>
      </div>
      <div class="explore-programs-box">
      	<div class="icon-box">
        <img src="{{ URL::asset('assets/frontend/images/hand-icon.png') }}" alt="user">	
       </div>
       <span class="count">20</span>
       <span>+</span>
       <p>Strategic<br>Partners</p>
      </div>
      <div class="explore-programs-box">
       <div class="icon-box">	
       <img src="{{ URL::asset('assets/frontend/images/social-icon.png') }}" alt="user">	
       </div>
       <span class="count">10</span>
       <span>+</span>
       <p>In-demand<br>Courses</p>
      </div>	
     </div>		
   	</div>
  </div>	
 </div>	
</section>

<!-- Explore Our Programs section end Here -->




<!--tech advantage section start Here -->

<section class="tech-advantage-main-area">
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
   	<div class="tech-advantage-heading-area">
   	 <h2>Black Tech Advantage</h2>
   	 <p>Experential Learning</p>	
   	</div>
    <div class="advantage-box-detail-info">
    <div class="advantage-box-img-area">
     <img src="{{ URL::asset('assets/frontend/images/color-game.png') }}" alt="color game">	
    </div>
    <div class="advantage-2">
     <img src="{{ URL::asset('assets/frontend/images/Vector-17.png') }}" alt="Vector-17">	
    </div>	
    <div class="advantage-2-text">
     <p>Advantage 2</p>	
    </div>
    <div class="advantage-5">
     <img src="{{ URL::asset('assets/frontend/images/Vector-20.png') }}" alt="Vector-20">	
    </div>
    <div class="advantage-5-text">
     <p>Advantage 5</p>
    </div>
    <div class="advantage-1">
     <img src="{{ URL::asset('assets/frontend/images/Vector-16.png') }}" alt="Vector-16">	
    </div>
    <div class="advantage-1-text">
     <p>Advantage 1</p>
    </div>
    <div class="advantage-7">
     <img src="{{ URL::asset('assets/frontend/images/Vector-37.png') }}" alt="Vector-37">	
    </div>
     <div class="advantage-7-text">
     <p>Advantage 7</p>
    </div>
    <div class="advantage-3">
     <img src="{{ URL::asset('assets/frontend/images/Vector-18.png') }}" alt="Vector-18">	
    </div>
     <div class="advantage-3-text">
     <p>Advantage 3</p>
    </div>
    <div class="advantage-6">
     <img src="{{ URL::asset('assets/frontend/images/Vector-21.png') }}" alt="Vector-21">	
    </div>
     <div class="advantage-6-text">
     <p>Advantage 6</p>
    </div>
    <div class="advantage-4">
     <img src="{{ URL::asset('assets/frontend/images/Vector-19.png') }}" alt="Vector-19">	
    </div>
     <div class="advantage-4-text">
     <p>Advantage 4</p>
    </div>
    <div class="advantage-8">
     <img src="{{ URL::asset('assets/frontend/images/Vector-38.png') }}" alt="Vector-38">	
    </div>
     <div class="advantage-8-text">
     <p>Advantage 8</p>
    </div>	
   </div>	
   </div>
  </div>	
 </div>
</section>

<!-- tech advantage section end Here -->
<!-- Our Testimonial section start Here -->

<section class="our-testimonial-main-area">
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="our-testimonial-heading-area">
     <h2>What our students are saying</h2> 	
    </div>	
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12">
   	<div class="our-testimonial">
   	 <div class="pkg-slider">
      <div class="carousel-wrap">
       <div class="owl-carousel">
       	<div class="item">
         <div class="our-customers-box-main-area">
	      <div class="our-customers-rate-text-area">
	       <span>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	       </span>
	        <h4>Excellent service support!!</h4>
	         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nam id facilis, provident doloremque placeat eveniet molestias laboriosam. Optio, esse. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nam id facilis, provident doloremque placeat eveniet molestias laboriosam. Optio, esse.</p>
	      </div>
		   <div class="our-customers-user-area">
		    <div class="our-customers-img-area">
		     <img src="{{ URL::asset('assets/frontend/images/avatar-1.png') }}" alt="avatar">
		    </div>
		    <div class="user-name-main-area">
		     <h5>Junaid Hasan</h5> 
		     <p>CEO, Themeland</p>
		    </div>
		   </div>
		   <div class="quote-icon-area">
		    <img src="{{ URL::asset('assets/frontend/images/quote.png') }}" alt="quote">
		   </div>
	     </div>	
	    </div><!--item-->
	    <div class="item">
         <div class="our-customers-box-main-area">
	      <div class="our-customers-rate-text-area">
	       <span>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	       </span>
	        <h4>Excellent service support!!</h4>
	         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nam id facilis, provident doloremque placeat eveniet molestias laboriosam. Optio, esse. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nam id facilis, provident doloremque placeat eveniet molestias laboriosam. Optio, esse.</p>
	      </div>
		   <div class="our-customers-user-area">
		    <div class="our-customers-img-area">
		     <img src="{{ URL::asset('assets/frontend/images/avatar-2.png') }}" alt="avatar">
		    </div>
		    <div class="user-name-main-area">
		     <h5>Junaid Hasan</h5> 
		     <p>CEO, Themeland</p>
		    </div>
		   </div>
		   <div class="quote-icon-area">
		    <img src="{{ URL::asset('assets/frontend/images/quote.png') }}" alt="quote">
		   </div>
	     </div>	
	    </div><!--item-->
	    <div class="item">
         <div class="our-customers-box-main-area">
	      <div class="our-customers-rate-text-area">
	       <span>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	       </span>
	        <h4>Excellent service support!!</h4>
	         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nam id facilis, provident doloremque placeat eveniet molestias laboriosam. Optio, esse. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nam id facilis, provident doloremque placeat eveniet molestias laboriosam. Optio, esse.</p>
	      </div>
		   <div class="our-customers-user-area">
		    <div class="our-customers-img-area">
		     <img src="{{ URL::asset('assets/frontend/images/avatar-3.png') }}" alt="avatar">
		    </div>
		    <div class="user-name-main-area">
		     <h5>Junaid Hasan</h5> 
		     <p>CEO, Themeland</p>
		    </div>
		   </div>
		   <div class="quote-icon-area">
		    <img src="{{ URL::asset('assets/frontend/images/quote.png') }}" alt="quote">
		   </div>
	     </div>	
	    </div><!--item-->
       </div><!--/owl-carousel-->
      </div><!--/carousel-wrap -->
     </div><!--/pkg-slider -->	
   	</div>
   	<div class="view-more-testimonials-btn-area">
   	 <a href="{{ url('testimonials') }}" class="testimonials-btn">View More Testimonials</a>	
   	</div>
   </div>
  </div>	
 </div>	
</section>

<!-- Our Testimonial section end Here -->


<!-- monthly-consutation section start Here -->

<section class="monthly-consutation-main-area"> 
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
   	<div class="monthly-consutation-content">
     <h5>Free Monthly Consultation / Info Session</h5>	
     <h2>Transitioning Into</h2>
     <h2>Tech</h2>
    </div>
    <div class="register-now-btn-area">
     <a class="register-now-btn" href="#">Register Now</a>	
    </div>
   </div>	
  </div>	
 </div>	
</section>

<!-- monthly-consutation section end Here -->

<!-- connect hiring strategic section start Here -->
<section class="connect-hiring-strategic-main">
 <div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
   <div class="connect-hiring-heading-main">
   	<h2>Connect with our Hiring and Strategic Partners</h2>
   </div>
  </div>
  <div class="col-lg-6 col-md-12 col-sm-12">
   <div class="row">
   @foreach($stpartner as $stpartners)
   	<div class="col-lg-3 col-md-12 col-sm-12">
   	<div class="connect-hiring-circle-ara">
      <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" height="100%" width="100%" alt=""> 
     </div>	
   	</div>
   @endforeach
   </div>	
  </div>
  </div>	
 </div>
</section>
<!-- connect hiring strategic section end Here -->

<!-- Ready to Get Started section start Here -->

<section class="ready-started-main-area">
 <div class="container">
  <div class="row">
  	<div class="col-lg-6 col-md-12 col-sm-12">
  	 <div class="ready-started-heading">
  	  <h2>Ready to Get Started?</h2>
  	  <p>Join a network of over 250,000 professionals<br> who are transforming and accelerating their<br> careers through cutting edge tech skills.<br> Speak with a Learning Advisor, who can <br>help answer any of your questions.</p>	
  	 </div>	
  	</div>
  	<div class="col-lg-6 col-md-12 col-sm-12">
     <div class="ready-started-form-area">	
     <form class="ready-started-input-area" method="post" enctype="multipart/form-data" action="{{ url('insert_advisor') }}">
		@csrf
		@if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif 
      <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
          <label>First Name</label> 
          <input type="text" name="first_name" placeholder="First Name" class="form-control">
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="last_name" placeholder="Last Name" class="form-control">
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
          <label>Phone Number</label>
          <input type="number" name="phone" placeholder="Phone Number" class="form-control">
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" placeholder="Email" class="form-control">
        </div>
       </div>
       <div class="col-lg-12 col-md-6 col-sm-6">
        <div class="form-group">
          <label>Course Interested In</label>
          <select class="section-option" name="course_interest" id="cars">
		    <option>Course Interested In</option>
			@foreach($course_list as $course_lists)
		   <option>{{$course_lists->course}}</option>
		    @endforeach
		 </select>
        </div>
       </div>
       <div class="col-lg-12 col-md-6 col-sm-6">
        <div class="submit-btn-main-area">	
         <!-- <a class="" href="#">Submit</a>  -->
		 <button type="submit" class="submit-btn">Submit</button>	
       </div>
      </div>	
     </form> 	
  	</div>
  </div>	
 </div>	
</div>
</section>
@include('frontend.include.footer')
<script type="text/javascript">
$('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration:1000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });	
</script>
<script>
$('.pkg-slider .owl-carousel').owlCarousel({
  loop: true,
  margin:10,
  nav: true,
  navText: [
    "<i class='fa fa-angle-left'></i>",
    "<i class='fa fa-angle-right'></i>"
  ],
  autoplay:50,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items: 2
    }
  }
})
</script>