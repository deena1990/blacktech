@include('frontend.include.header')

<style type="text/css">

  .tech-companies-box img {

   object-fit: contain;

   border-radius: unset;

   height:100%;

   width:100%;

   }



   .col-lg-1.col-md-3.col-6 {

    width: 12%;

   }



   .tech-companies-box {

      background-color: unset;

      height:100%;

      width: 100%;

   }



   .connect-hiring-circle-ara img {

   width: 140px;

   height: 140px;

   object-fit: contain;

   padding: 20px;

   }

   .our-customers-rate-text-area {

   padding: 20px 20px 20px 20px;

   overflow: auto;

   height: 176px;

   }

   .our-customers-rate-text-area p{

   word-break: break-word;

   }

   .owl-carousel .owl-item .our-customers-img-area {

   width: 110px;

   height: 110px;

   border-radius: 50%;

   overflow: hidden;

   }

   .owl-carousel .owl-item .our-customers-img-area img {

   width: 100% !important;

   height: 100%;

   object-fit: cover;

   }

   .user-name-main-area {

   margin: 10px 0px 0px 20px;

   height: 99px;

   overflow: auto;

   width: 355px;

   }

   .user-name-main-area p {

   word-break: break-word;

   }

   .explore-programs-text {

   height: auto;

   }



   .explore-programs-main-box  {

      cursor: pointer;

   }

     .Forbes-image-area {

      padding: 60px 0px 220px 0px;

    }

     .explore-programs-main-area {

    background-size: 100% 100%;

    background-repeat: no-repeat;

}

 .tech-advantage-main-area {

    background-size: cover;

    background-position: top, center;

}

.ready-started-heading p {

    text-align: justify;

}
</style>

<!-- Slider Section Start Here -->

<section class="slider-info-main-area">

   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

      <div class="carousel-indicators">

         @for($s=0;$s < count($slider);$s++)

         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $s; ?>" <?php if($s==0){ echo 'class="active" aria-current="true"'; }else{ echo '';} ?> aria-label="Slide <?php echo $s+1; ?>"></button>

         @endfor

         <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>

         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>

         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button> -->

      </div>

      <?php $i=1; ?>

      @foreach($slider as $sliders)

      <div class="carousel-inner">

         <div class="carousel-item <?php if($i==1){ ?>active <?php } ?>">

            <img src="{{ url('assets/upload_slider/'.$sliders->image)}}" class="d-block w-100" alt="...">

            <div class="carousel-caption">

               <h3>{{ $sliders->heading }}</h3>

               <p>{!! Str::limit($sliders->about,150) !!}</p>

               <div class="courses-contact-btn-area">

                  <a href="{{ $sliders->btn_link }}" class="our-courses-btn">{{ $sliders->btn_name }}</a>

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

      <img src="{{URL::asset('assets/frontend/images/image_peoples_raising_hands.png') }}" alt="immersive learning"> 

   </div>

   <div class="immersive-learning-experience-content">

   <div class="container">

      <div class="row">

         <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="immersive-experience-text">

               <h2>THE LEADING HANDS-ON TECH ECOSYSTEM IN CANADA</h2>

            </div>

         </div>

      </div>

   </div>

</section>

<!-- Immersive Learning experience Section End Here -->

<!-- Our Talent section start Here -->

<!-- <section class="our-talent-main-area">

   <div class="container">

      <div class="row justify-content-between">

         <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="our-talent-hading-area">

               <h4>Our Talent work with many of these leading companies</h4>

            </div>

         </div>

         @foreach($ldingcompns as $ldingcompn)

         <div class="col-lg-1 col-md-3 col-6">

            <div class="tech-companies-box">

               <img src="{{ url('assets/upload_stpartners/'.$ldingcompn->image)}}" height="100%" width="100%" alt="">

            </div>

         </div>

         @endforeach	

      </div>

   </div>

</section> -->

<!-- Our Talent section end Here -->



<section class="Forbes-image-area">

   <div class="container">

      <div class="row">

         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

            <div class="">

               <?php if (str_contains($forbes_section->file, '.jpg') || str_contains($forbes_section->file, '.png') || str_contains($forbes_section->file, '.jpeg')) { ?>

               <img src="{{ url('assets/upload_aboutus/'.$forbes_section->file)}}" height="100%" width="100%">

               <?php }else{ ?>

               <video height="100%" width="100%" controls>

                  <source src="{{ url('assets/upload_aboutus/'.$forbes_section->file)}}" type="video/*">

               </video>

               <?php } ?>

            </div>

         </div>

         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

            <div class="">

               <p> <?= $forbes_section->content ?></p>

            </div>

         </div>

      </div>

   </div>

</section>



<!-- Explore Our Programs section Start Here -->

      

<section class="explore-programs-main-area" style=" background-color:white; background-image:url(assets/frontend/images/ser-bg.png);">

   <div class="container counter-position-main-box">

      <div class="row">

         <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="explore-programs-hading-area">

               <h4>Explore our Programs</h4>

               <p>Programs have been designed to ensure they bridge the conventional training gaps - thereby</p>

               <p>equipping you with all you need to succeed.</p>

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

                     <a class="nav-link" data-bs-toggle="tab" href="#menu3">Career Mentorship</a>

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

                           @foreach($ap_courses as $ap_course) 

                           <div class="col-lg-4 col-md-6 col-sm-12">

                              <!-- <a href="{{ url('courses') }}"> -->

                              <!-- <a href="{{ url('course/'.$ap_course->course_title.'/'.base64_encode($ap_course->id)) }}"> -->

                                 <div class="explore-programs-main-box mb-3">

                                    <div class="explore-programs-img-box">

                                       <img src="{{ url('assets/course_img/'.explode(':::',$ap_course->image)[0])}}" alt="" onclick="course_detail('{{$ap_course->id}}');"> 	

                                    </div>

                                    <div class="explore-programs-text">

                                    <h5 onclick="course_detail('{{$ap_course->id}}');">{{ $ap_course->course_title }}</h5> 

                                    <form action="{{ url('course/'.$ap_course->course_title) }}" method="post">

                                    @csrf

                                       <input type="hidden" name="id" value="{{base64_encode($ap_course->id)}}">

                                       <button type="submit" class="enrol-now-btn" id="submit{{$ap_course->id}}">Register Now</button>

                                    </form>

                              </div>  	

                              </div>

                              <!-- </a> -->

                           </div>

                           @endforeach

                        </div>

                     </div>

                  </div>

                  <div id="menu1" class="tab-pane fade">

                     <div class="container">

                        <div class="row">

                           @foreach($cc_courses as $cc_course)

                           <div class="col-lg-4 col-md-6 col-sm-12">

                              <!-- <a href="{{ url('courses') }}"> -->

                              <!-- <a href="{{ url('course/'.$cc_course->course_title.'/'.base64_encode($cc_course->id)) }}"> -->

                                 <div class="explore-programs-main-box mb-3">

                                    <div class="explore-programs-img-box">

                                       <img src="{{ url('assets/course_img/'.$cc_course->image)}}" alt="" onclick="course_detail('{{$cc_course->id}}');"> 	

                                    </div>

                                    <div class="explore-programs-text">

                                    <h5 onclick="course_detail('{{$cc_course->id}}');">{{ $cc_course->course_title }}</h5> 

                                    <form action="{{ url('course/'.$cc_course->course_title) }}" method="post">

                                    @csrf

                                       <input type="hidden" name="id" value="{{base64_encode($cc_course->id)}}">

                                       <button type="submit" class="enrol-now-btn" id="submit{{$cc_course->id}}">Register Now</button>

                                    </form>

                              </div>  	

                              </div>

                              <!-- </a> -->

                           </div>

                           @endforeach

                        </div>

                     </div>

                  </div>

                  <div id="menu3" class="tab-pane fade">

                     <div class="container">

                        <div class="row">

                           @foreach($cm_courses as $cm_course)

                           <div class="col-lg-4 col-md-6 col-sm-12">

                              <div class="explore-programs-main-box mb-3">

                                 <div class="explore-programs-img-box">

                                    <img src="{{ url('assets/course_img/'.$cm_course->image)}}" alt="" onclick="course_detail('{{$cm_course->id}}');"> 	

                                 </div>

                                 <div class="explore-programs-text">

                                    <h5 onclick="course_detail('{{$cm_course->id}}');">{{ $cm_course->course_title }}</h5> 

                                    <form action="{{ url('course/'.$cm_course->course_title) }}" method="post">

                                    @csrf

                                       <input type="hidden" name="id" value="{{base64_encode($cm_course->id)}}">

                                       <button type="submit" class="enrol-now-btn" id="submit{{$cm_course->id}}">Register Now</button>

                                    </form>

                                 </div>  	

                              </div>

                           </div>

                           @endforeach

                        </div>

                     </div>

                  </div>

                  <div id="menu2" class="tab-pane fade">

                     <div class="container">

                        <div class="row">

                           @foreach($fc_courses as $fc_course)

                           <div class="col-lg-4 col-md-6 col-sm-12">

                              <!-- <a href="{{ url('courses') }}"> -->

                              <!-- <a href="{{ url('course/'.$fc_course->course_title.'/'.base64_encode($fc_course->id)) }}"> -->

                              <div class="explore-programs-main-box mb-3">

                                 <div class="explore-programs-img-box">

                                    <img src="{{ url('assets/course_img/'.$fc_course->image)}}" alt="" onclick="course_detail('{{$fc_course->id}}');"> 	

                                 </div>

                                 <div class="explore-programs-text">

                                    <h5 onclick="course_detail('{{$fc_course->id}}');">{{ $fc_course->course_title }}</h5> 

                                    <form action="{{ url('course/'.$fc_course->course_title) }}" method="post">

                                    @csrf

                                       <input type="hidden" name="id" value="{{base64_encode($fc_course->id)}}">

                                       <button type="submit" class="enrol-now-btn" id="submit{{$fc_course->id}}">Register Now</button>

                                    </form>

                                 </div>  	

                              </div>

                              <!-- </a> -->

                           </div>

                           @endforeach

                        </div>

                     </div>

                  </div>

                  <div class="explore-more-btn-area">

                     <a href="{{ url('courses?courseType=Accelerator_Programs') }}" class="explore-more-btn">Explore More</a> 	

                  </div>

               </div>

            </div>

         </div>

         <script>

            function course_detail(id){

               $('#submit'+id).trigger('click');

            }

         </script>

         <div class="explore-programs-count-info">

            <div class="explore-programs-main">

               @foreach($metrics_counters as $metrics_counter)

               <div class="explore-programs-box counter">

                  <div class="icon-box">	

                     <img src="{{ URL::asset('assets/course_img/'.$metrics_counter->image) }}" alt="user">	

                  </div>

                  <span id="first{{$metrics_counter->id}}" class="count-digit">{{preg_replace('/[^0-9]/', '', $metrics_counter->count)}}</span>

                  <span id="second{{$metrics_counter->id}}" style="display:none;">{{$metrics_counter->count}}</span>

                  <p>

                     @foreach(explode(' ',$metrics_counter->name) as $counter_name )

                     {{$counter_name}}

                     <br>

                     @endforeach

                  </p>

               </div>

               <script>

                  $(window).scroll(function(){



                     if(visible($('.count-digit')))

                     {

                        setTimeout(() => {

                        $('#first{{$metrics_counter->id}}').hide();

                        $('#second{{$metrics_counter->id}}').show();

                     }, 5000);

                     }

                  });

               </script>

               @endforeach

            </div>

         </div>

      </div>

   </div>

</section>

<!-- Explore Our Programs section end Here -->

<!--tech advantage section start Here -->

<section class="tech-advantage-main-area" style=" background-color:white; background-image:url(assets/frontend/images/team-bg-info.jpg);">

   <div class="container">

      <div class="row">

         <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="tech-advantage-heading-area">

               <h2>The Black Tech Advantage</h2>

               <p>Experential Learning</p>

            </div>

            <div class="advantage-box-detail-info advantageImg">

               <div class="advantage-box-img-area">

                  <img src="{{ URL::asset('assets/frontend/images/matrix2.jpg  ') }}" alt="color game">	

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

                        @foreach($testimonial as $testimonials)

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

                                 <p>{!! $testimonials->about !!}</p>

                              </div>

                              <div class="our-customers-user-area">

                                 <div class="our-customers-img-area">

                                    <img src="{{ url('assets/testimonial_img/profile_img/'.$testimonials->profile_img)}}" alt="avatar">

                                 </div>

                                 <div class="user-name-main-area">

                                    <h5>{{ $testimonials->name}}</h5>

                                    <p>{{ $testimonials->destination}}</p>

                                 </div>

                              </div>

                              <div class="quote-icon-area">

                                 <img src="{{ URL::asset('assets/frontend/images/quote.png') }}" alt="quote">

                              </div>

                           </div>

                        </div>

                        @endforeach

                     </div>

                     <!--/owl-carousel-->

                  </div>

                  <!--/carousel-wrap -->

               </div>

               <!--/pkg-slider -->	

            </div>
            <div class="row">
               <div class="col-lg-6">
                  <div class="videoThub">
                     <iframe width="580" height="345" src="https://www.youtube.com/embed/<?php echo explode('&',explode('?v=','https://www.youtube.com/watch?v=bSKeEFQBMfc&t=5s')[1])[0]; ?>">
                     </iframe>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="videoThub">
                     <iframe width="580" height="345" src="https://www.youtube.com/embed/<?php echo explode('&',explode('?v=','https://www.youtube.com/watch?v=CJkCvWbD79I')[1])[0]; ?>">
                     </iframe>
                   </div>
               </div>
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

               <h2>Transitioning Into Tech</h2>

            </div>

            <div class="advantage-box-detail-info">

               <div class="info-session-img-area">

                  <img src="{{ URL::asset('assets/frontend/images/info-session.jpg  ') }}" alt="Image">	

               </div>

            </div>

            <div class="register-now-btn-area">

               <a class="register-now-btn" href="{{explode(':::',$content->status)[3]}}">Register Now</a>	

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

            <div class="connect-hiring-heading-main pb-5">

               <!-- <h2>Connect with our Hiring and Strategic Partners</h2> -->

               <h2>Our Talents Work With Many of these Leading Tech Companies</h2>

            </div>

         </div>

         <div class="col-lg-12 col-md-12 col-sm-12">

            



            <div class="row">

      <?php 

      $asd = array();

      $asd1 = array();

      $asd2 = array();

      $asd3 = array();

      $asd4 = array();



      foreach ($stpartner as $key => $value) {

        if(count($asd) < intval(explode('.',(count($stpartner)/5))[0])){

           array_push($asd, $value);

        }else if(count($asd1) < intval(explode('.',(count($stpartner)/5))[0])){

          array_push($asd1, $value);

        }else if(count($asd2) < intval(explode('.',(count($stpartner)/5))[0])){

          array_push($asd2, $value);

        }else if(count($asd3) < intval(explode('.',(count($stpartner)/5))[0])){

          array_push($asd3, $value);

        }else if(count($asd4) < intval(explode('.',(count($stpartner)/5))[0])){

          array_push($asd4, $value);

        }

      } 

// dd(intval(explode('.',(count($stpartner)/5))[0]));

      ?>

        <logo-slider>

          @if(count($asd) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd1) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd1 as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd2) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd2 as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd3) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd3 as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd4) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd4 as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

      </div>





         </div>

      </div>

   </div>

</section>

<!-- connect hiring strategic section end Here -->

<!-- Ready to Get Started section start Here -->

<section class="ready-started-main-area">

   <div class="container">

   <div class="row align-items-center">

      <div class="col-lg-6 col-md-12 col-sm-12">

         <div class="ready-started-heading pe-5">

            <h2>Ready to Get Started?</h2>

            <p>Join a network of over 250,000 professionals who are transforming and accelerating their careers through premium tech skills.  Speak with a Career Advisor today to  help answer all your questions and align you   to the best program for seamless transition.</p>

         </div>

         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="refer-friend-btn-area">

               <h4 class="d-inline">Chat or Connect with a Career Advisor</h4>
               <a href="https://wa.me/{{explode(':::',$content->status)[0]}}" class="refer-friend-btn ml-5">
               <img src="{{url('assets/frontend/images/whatsapp.png')}}" alt="">
                  <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
               </a>

            </div>

         </div>

      </div>

      <div class="col-lg-6 col-md-12 col-sm-12">

         <div class="ready-started-form-area">

            <form class="ready-started-input-area" method="post" onsubmit="return getstarted();" enctype="multipart/form-data" action="{{ url('insert_advisor') }}">

               @csrf

               <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-6">

                     <div class="form-group">

                        <label for="fname">First Name</label> 

                        <input type="text" name="first_name" placeholder="First Name" class="form-control vali" id="fname" required>

                        <span id="fname_error" class="text-danger"></span>

                     </div>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6">

                     <div class="form-group">

                        <label>Last Name</label>

                        <input type="text" name="last_name" placeholder="Last Name" class="form-control vali" id="lname" required>

                        <span id="lname_error" class="text-danger"></span>

                     </div>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6">

                     <div class="form-group">

                        <label>Phone Number</label>

                        <input type="text" name="phone" autocomplete='off' placeholder="Phone Number" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" minlength="10" maxlength="15" class="form-control vali" id="phone" required>

                        <span id="phone_error" class="text-danger"></span>

                     </div>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6">

                     <div class="form-group">

                        <label>Email</label>

                        <input type="email" name="email" placeholder="Email" class="form-control vali" id="email" required>

                        <span class="text-danger" id="email_error"></span>

                     </div>

                  </div>

                  <div class="col-lg-12 col-md-6 col-sm-6">

                     <div class="form-group">

                        <label>Course Interested In</label>

                        <select class="section-option" name="course_interest" id="course_interest">

                           <option selected disabled style="display:none;">Choose a Course</option>

                           @foreach($courses as $course)

                           <option>{{$course->course_title}}</option>

                           @endforeach

                        </select>

                        <span class="text-danger" id="course_interest_error"></span>

                     </div>

                  </div>

                  <div class="col-lg-12 col-md-6 col-sm-6">

                     <div class="submit-btn-main-area">

                        <input type="submit" class="submit-btn" id="submit" value="Submit">	

                        <!-- <button type="submit" >Submit</button>	 -->

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

       items: 1

     },

     1000: {

       items: 2

     }

   }

   })

</script>

<script type = "text/javascript">

   function getstarted()

   {

     var fname=document.getElementById('fname').value;

     var lname=document.getElementById('lname').value;

     var phone=document.getElementById('phone').value;

     var email=document.getElementById('email').value;

     var course_interest=$('#course_interest').val();

     //alert(email);

     var alphabet= /^[a-zA-Z]*$/;

     var number= /^[0-9]*$/;

     var emailformat = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

     if(!fname.match(alphabet)){

       document.getElementById('fname_error').innerHTML="First Name should be alphabets only";

      //  $('#fname_error').fadeOut(5000);

       setTimeout(() => {

         document.getElementById('fname_error').innerHTML ="";

      }, 5000);

       return false;

     }

     else if(!lname.match(alphabet)){

       document.getElementById('lname_error').innerHTML="Last Name should be alphabets only";

      //  $('#lname_error').fadeOut(5000);

       setTimeout(() => {

         document.getElementById('lname_error').innerHTML ="";

      }, 5000);

       return false;

     }

     else if(!phone.match(number)){

       document.getElementById('phone_error').innerHTML="Phone number should be characters only";

      //  $('#phone_error').fadeOut(5000);

      setTimeout(() => {

         document.getElementById('phone_error').innerHTML ="";

      }, 5000);

       return false;

     }

     else if(!email.match(emailformat)){

      document.getElementById('email_error').innerHTML="Please enter email in valid email format";

      //  $('#email_error').fadeOut(5000);

      setTimeout(() => {

         document.getElementById('email_error').innerHTML ="";

      }, 5000);

      return false;

     }

     else if(course_interest == null){

       document.getElementById('course_interest_error').innerHTML="Please choose a course";

      //  $('#course_interest_error').fadeOut(5000);

      setTimeout(() => {

         document.getElementById('course_interest_error').innerHTML ="";

      }, 5000);

       return false;

     }

     

   }

</script>