@section('title', 'Course Description')

@include('frontend.include.header')

<!-- Course Description Section Start Here -->

@foreach($course as $courses)



<style type="text/css">

.course-date-info-area {
    display: inline-flex;
    width: 100%;
    padding: 15px 20px;
}
.course-user-text-area p {
    word-break: break-all;
}
.course-user-text-area {
    width: 75%;
    margin: 0px 0px 0px auto;
    height: 178px;
    overflow: auto;
}
.course-tutor-details h5 {
    font-size: 16px;
    margin: 6px 0px 4px 0px;
}
.course-tutor-details p {
    font-weight: 500;
    margin-bottom: 0;
    font-size: 14px;
    color: #918f8f;
}
.tech-companies-box img {
    object-fit: contain;
    border-radius: unset;
}
.tech-companies-box {
    background-color: unset;
}
.sidebar {

    overflow: auto;

    position: sticky;

    top: 4%;

}

.what-get-box-area {

    margin: 0px 15px 20px 0px;

}

.tools-you-learn-main {

    justify-content: center;

}

#process {

  margin-bottom: 40px;



}



#process .section-heading {

  margin-bottom: 40px;

}



.steps-pane img {

  height: 70px;

  margin-top: 18px;

  -ms-transform: skewX(-15deg);

  /* IE 9 */

  -webkit-transform: skewX(-15deg);

  /* Safari */

  -o-transform: skewX(-15deg);

  /* Standard syntax */

  -moz-transform: skewX(-15deg);

}



.pane-warp {

  height: 100px;

  width: 25px;

  margin-left: 20%;

  margin-top: 20px;

  -ms-transform: skewX(15deg);

  /* IE 9 */

  -webkit-transform: skewX(15deg);

  /* Safari */

  -o-transform: skewX(15deg);

  /* Standard syntax */

  -moz-transform: skewX(15deg);

}



.steps-pane {

  height: 100px;

  width: 140px;

  margin-left: 30px;

  box-shadow: 7px 0px 5px #bcbcbc;

}



.inverted-pane-warp {

  height: 100px;

  width: 25px;

  margin-left: 20%;

  -ms-transform: skewX(-15deg);

  /* IE 9 */

  -webkit-transform: skewX(-15deg);

  /* Safari */

  -o-transform: skewX(-15deg);

  /* Standard syntax */

  -moz-transform: skewX(-15deg);

}



.inverted-steps-pane {

  height: 100px;

  width: 140px;

  background: #bcbcbc;

  margin-left: 30px;

  box-shadow: 7px 0px 5px #bcbcbc;

}



.inverted-steps-pane p {

  -ms-transform: skewX(15deg);

  /* IE 9 */

  -webkit-transform: skewX(15deg);

  /* Safari */

  -o-transform: skewX(15deg);

  /* Standard syntax */

  -moz-transform: skewX(15deg);

  padding: 20px 10px 10px 10px;

}



.reequest-course-outline-btn-info p {

  cursor: pointer;

}



@media(min-width: 900px) {

  .steps-timeline {

    border-top: 5px double #fc6429;

    padding-top: 29px;

    margin-top: 29px;



  }

  .steps-one,

  .steps-two,

  .steps-three,

  .steps-four,

  .steps-five {

    float: left;

    width: 20%;

    margin-top: -99px;

  }

  .step-wrap {

    height: 50px;

    width: 50px;

    border-radius: 50%;

    background: transparent;

    margin-left: 39%;

    border: 2px solid #fc6429;

  }

  .verticle-line {

    position: absolute;

    height: 57px;

    width: 5px;

    margin-left: 10px;

    marker-top: 10px;

  }

  .steps-stops {

    height: 25px;

    width: 25px;

    margin: 11px 10.1px;

    border-radius: 50%;

    background: #fc6429;

  }

  .end-circle {

    height: 15px;

    width: 15px;

    border-radius: 50%;

    position: absolute;

    margin-top: 19px;

    margin-left: -13px;

  }

  .inverted-end-circle {

    height: 15px;

    width: 15px;

    border-radius: 50%;

    position: absolute;

    margin-top: 19px;

    margin-left: 11.1%;

  }

}



@media(max-width: 899px) {

  #process .container-fluid {

    width: 50%;

  }

  .steps-timeline {

    border-left: 5px double #fc6429;

    margin-left: 35px;

  }

  .steps-one,

  .steps-two,

  .steps-three,

  .steps-four,

  .steps-five {

    margin-left: -25px;

  }

  .step-wrap,

  .steps-stops {

    float: left;

  }

  .steps-timeline {

    border-left: 2px solid $brand-primary;

    margin-left: 30px;

  }

  .pane-warp {

    margin-left: 30%;

  }

  .inverted-pane-warp {

    margin-left: 30%;

  }

  .verticle-line {

    position: absolute;

    width: 125px;

    height: 5px;

    margin-left: 5px;

    margin-top: 10px;

  }

  .steps-stops {

    height: 25px;

    width: 25px;

    margin: 11px 10px;

    border-radius: 50%;

    background: #fc6429;

  }

  .step-wrap {

    height: 50px;

    width: 50px;

    border-radius: 50%;

    background: transparent;

    margin-top: 125px;

    margin-left: -2px;

    border: 2px solid #fc6429;

  }

  .end-circle {

    height: 15px;

    width: 15px;

    border-radius: 50%;

    position: absolute;

    margin-top: -45px;

    margin-left: 13px;

  }

  .inverted-end-circle {

    height: 15px;

    width: 15px;

    border-radius: 50%;

    position: absolute;

    margin-top: 280px;

    margin-left: 15px;

  }

}



@media (max-width: 600px) {

  #process .container-fluid {

    width: 90%;

  }

}



@media (max-width: 400px) {

  .verticle-line {

    width: 105px;

  }

}



.back-orange {

  background: #fc6429;

}



.back-blue {

  background:rgb(40, 40, 40);

}



.fitContent {

  padding-top: 80px !important;

}



.customAccordion .accordion-button:focus {

  box-shadow: none;

}



.customAccordion .accordion-button {

  padding: 8px 20px;

  font-weight: bold;

}



.customAccordion {

  border-top-right-radius: 20px;

  border-top-left-radius: 20px;

  border: 1px solid #dee2e6;

}



.customAccordion .accordion-item:first-child { 

  border-top-right-radius: 20px;

  border-top-left-radius: 20px;

}



.customAccordion .accordion-item:first-child button {

  border-top-right-radius: 20px !important;

  border-top-left-radius: 20px !important;

}



</style>

<?php $course_schedule_status = DB::table('tbl_course_schedule')->where('course_id',$courses->tbl_course_id)->first()->status; ?>

<section class="course-description-info-area">

 <div class="container">

  <div class="row">

    

        <!-- @if(Session::has('message'))

          <p class="alert alert-success">{{ Session::get('message') }}</p>

        @endif -->

    <div class="col-lg-7 col-md-6 col-sm-6">

     <div class="course-short-description">

      <h2>{{ $courses->course_title}}</h2>

      <p>Instructor – Virtual Led</p>

      <!-- <p>{{ $courses->instructor_name}} – Virtual Led</p> -->

     </div> 

     <div class="course-date-info-area">

      <!-- <div class="course-date-icon">

       <img src="images/clock-icon.png" alt=""> 

      </div> -->

      <div class="course-date-details">

       <p>Start Date : <?php echo date("F d, Y", strtotime($courses->start_date))?></p>

       <p>Next Cohort Start Date : <?php echo date("F d, Y", strtotime($courses->next_date))?></p> 

       <p>Class Days : <?php echo $courses->classDays; ?> </p> 

       <p>Class Times : <?php echo date("h:i A", strtotime($courses->classTimes)) ?> </p> 

      </div> 

     </div>

     <div class="course-description">

      <p>{!! $courses->short_desc !!}</p>

     </div>

     @if(explode(':::',$courses->no_of_seats)[0] == 0)

     <div class="course-enrol-now-btn-area">

      <!-- <a class="course-enrol-now-btn" href="{{ url('course-registration') }}/{{base64_encode($courses->tbl_course_id)}}">Enrol Now</a> -->

     </div>

     @else

     <div class="course-enrol-now-btn-area">

      <!-- <a class="course-enrol-now-btn" href="{{ url('course-registration/'.$courses->course_title.'/'.base64_encode($courses->tbl_course_id)) }}">Enrol Now</a> -->

      <form action="{{ url('course-registration/'.str_replace(' ','-',$courses->course_title)) }}" method="post">

      @csrf

          <input type="hidden" name="id" value="{{base64_encode($courses->tbl_course_id)}}">

          <input type="submit" class="course-enrol-now-btn" value="Enrol Now">

      </form>

    </div>

     @endif

    </div>



    <div class="col-lg-5 col-md-6 col-sm-6">

     <div class="course-description-img-area"> 

      <img src="{{ url('assets/course_img/'.explode(':::',$courses->image)[1])}}" alt="accelerate course"> 

     </div>

    </div>



    <div class="sider-scroll">

     <div class="row"> 

     <div class="col-lg-3 col-md-6 col-sm-6">

     <div class="course-description-sidebar sidebar"> 

     <div class="course-description-menu-area"> 

      <div class="course-description-menu-info">

       <div class="course-description-menu-heading">

        <!-- <h4>Agile Project Management</h4> -->

        <h4 class="text-center">{{ $courses->course_title}}</h4>

       </div> 

       <div class="course-description-menu-tab">

        <ul>

         <li><a href="#aboutCourse">About the Course </a></li> 

         <li><a href="#learningObje">Learning Objectives</a></li> 

         <li><a href="#whatyouget">What you’ll get</a></li> 

         <!-- <?php if(explode(':::',$course_schedule_status)[1] == 1){ ?>  

         <li><a href="#courseSchedule">Course Schedule</a></li>

         <?php } ?> -->

         <!-- <li><a href="#weeklySchedule">Weekly Schedule</a></li> -->

         <!-- <?php if(explode(':::',$course_schedule_status)[0] == 1){ ?>  

         <li><a href="#upcomingCohort">Upcoming Cohort</a></li>

         <?php } ?> -->

         <li><a href="#paymentOption">Payment Options</a></li>

         <!-- <?php if(explode(':::',$course_schedule_status)[2] == 1){ ?> 

         <li><a href="#careerRoadMap">Career Road Map</a></li>

         <?php } ?> -->

         <!-- <?php if(explode(':::',$course_schedule_status)[3] == 1){ ?>  

         <li><a href="#toolslearn">Tools you’ll learn</a></li>

         <?php } ?> -->

         <li><a href="#alumniExperience">Alumni Experience</a></li>

         <li><a href="#faqs">FAQs</a></li>

         <!-- <?php if(explode(':::',$course_schedule_status)[4] == 1){ ?> 

         <li><a href="#ourInstructors">Our Instructors</a></li>

         <?php } ?> -->

         <li><a href="#talentwork">Where our talent work</a></li>

        </ul>

       </div>

       @if(explode(':::',$courses->no_of_seats)[0] == 0)

       <div class="course-description-menu-btn-area">

        <!-- <a class="course-description-enroll-btn" href="{{ url('course-registration/'.$courses->course_title.'/'.base64_encode($courses->tbl_course_id)) }}">Enrol Now</a> -->

       </div>

      @else

      <div class="course-description-menu-btn-area">

        <!-- <a class="course-enrol-now-btn" href="{{ url('course-registration/'.$courses->course_title.'/'.base64_encode($courses->tbl_course_id)) }}">Enrol Now</a> -->

        <form action="{{ url('course-registration/'.str_replace(' ','-',$courses->course_title)) }}" method="post">

        @csrf

            <input type="hidden" name="id" value="{{base64_encode($courses->tbl_course_id)}}">

            <input type="submit" class="course-enrol-now-btn" value="Enrol Now">

        </form>

      </div>

      @endif

     </div>

      <!-- <div class="reequest-course-outline-btn-info">

         <p onclick="show_form()" class="reequest-course-outline-btn">Request Course Outline</p>

       </div>   -->

    </div>



    <div class="course-outlin-form-info" id="course_outline_form" style="display:none;">

     <form action="{{url('/insert_course_outline')}}" method="post" onsubmit="return getstarted();" class="course-outlin-input-detail">

      @csrf

      <div class="row">

       <div class="col-lg-12">

        <div class="form-group">

          <input type="hidden" name="course_id" value="{{ $courses->tbl_course_id}}">

          <input type="text" placeholder="First Name" name="first_name" class="form-control" required>

        </div>

       </div> 

       <div class="col-lg-12">

        <div class="form-group">

          <input type="text" placeholder="Last Name" name="last_name" class="form-control" required>

        </div>

       </div>

       <div class="col-lg-12">

        <div class="form-group">

          <input type="text" placeholder="Phone Number" autocomplete='off' onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" minlength="10" maxlength="15" name="phone" class="form-control" required>

        </div>

       </div>

       <div class="col-lg-12">

        <div class="form-group">

          <input type="email" placeholder="Email" name="email" id="email" class="form-control" required>

          <span class="text-danger" id="email_error"></span>

        </div>

       </div>

       <div class="col-lg-12">

        <div class="course-outlin">

          <button type="submit" class="course-outlin-btn">Get Course Outline</button>

        </div>

       </div>

      </div> 

     </form> 

     <script>

      function getstarted()

      {

        var email=document.getElementById('email').value;

        var emailformat = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

        if(!email.match(emailformat)){

          document.getElementById('email_error').innerHTML="Please enter email in valid email format";

          setTimeout(() => {

            document.getElementById('email_error').innerHTML ="";

          }, 5000);

          return false;

        }

      }

     </script>

    </div>

    

  </div>

  <script>

    function show_form(){

      $('#course_outline_form').toggle();

    }

  </script>

  <!-- <script>

    $(document).ready(function(){

      $('.alert').fadeOut(6000);

    });

  </script> -->

  </div>

    <div class="col-lg-9 col-md-6 col-sm-6">

     <div class="about-the-course-info" id="aboutCourse">

      <h4 class="">About the Course</h4> <!--  fitContent -->

      <p>{!! $courses->about_course !!}</p>

      </div> 

     <div class="learning-advisor-btn-area">

      <a class="speak-advisor-btn" href="https://wa.me/{{explode(':::',$content->status)[0]}}">Connect with a Career advisor</a>

     @if(explode(':::',$courses->no_of_seats)[0] == 0)

      <!-- <a class="enrol-now-btn" href="{{ url('course-registration/'.$courses->course_title.'/'.base64_encode($courses->tbl_course_id)) }}">Enrol Now</a>  -->

      @else

      <!-- <a class="enrol-now-btn" href="{{ url('course-registration/'.$courses->course_title.'/'.base64_encode($courses->tbl_course_id)) }}">Enrol Now</a> -->

      <form action="{{ url('course-registration/'.str_replace(' ','-',$courses->course_title)) }}" method="post" style="display:inline;">

      @csrf

        <input type="hidden" name="id" value="{{base64_encode($courses->tbl_course_id)}}">

        <input type="submit" class="enrol-now-btn" value="Enrol Now">

      </form>

      @endif

    </div>

     <div class="learning-Objectives-main-area" id="learningObje">

      <h4 class="fitContent">Learning Objectives</h4>

      <h4>Upon completion of this program, you will learn to</h4>

       <p>{!! $courses->learning_objective !!}</p>

      <!-- <div class="upon-completion-list-area">

       <ul>

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Specify project management methodologies such as Waterfall and Agile (Scrum)

        </li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Manage any project from start to finish</li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Manage IT projects using the SDLC framework.</li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Define, manage, and track project’s three constraints: scope, schedule, and budget.</li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Make the switch to agile project management.</li> 

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Tactically manage projects with best-practice tools like MS Project, Smartsheet, and JIRA.</li>

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Dealing with project stakeholders, using effective soft skills.</li>

        <li><img src="{{ URL::asset('assets/frontend/images/arrow.png') }}" alt="arrow">Pass the PMP exam on the first try.</li>

       </ul>

      </div>

      -->

     </div>

     

     <?php

     $courses->uget_img;

     $courses_uget_img = explode(',', $courses->uget_img);

     $uget_img1 = array();

     foreach($courses_uget_img as $uget_imgs){

       $uget_img1[] = $uget_imgs;

     }

    //  for($i=0; $i<= count(array($uget_img1)); $i++){             

    //   echo $uget_img1[$i];             

    //   }

     ?>



     <div class="what-get-main-info-area" id="whatyouget">

      <h4 class="fitContent">What You’ll Get</h4>

       <div class="row">

       @for($i=0; $i< count($uget_img1); $i++)

        <!-- <div class="col-lg-3 col-md-6 col-sm-6"> -->

         <div class="what-get-box-area whatGetImg">

          <!-- echo $uget_img1[$i]; -->

          <a href="{{ url('assets/course_img/'.$uget_img1[$i]) }}"><img src="{{ url('assets/course_img/'.$uget_img1[$i])}}" alt="Course"></a>

         </div> 

        <!-- </div> -->

        @endfor

       </div> 

     </div>

    

     <?php if(explode(':::',$course_schedule_status)[1] == 1){ ?> 

     <?php

        $module_name = strpos($courses->module_name,',');

        if ($module_name == ""){

          $courses_module_name = array($courses->module_name); 

        }else{

          $courses_module_name = explode(',', $courses->module_name);

        }

          $course1 = array();

            foreach($courses_module_name as $courses_module_names){

              $course1[] = $courses_module_names;

            }

          $courses_module_des = explode(',', $courses->module_description);

          $course2 = array();

            foreach($courses_module_des as $courses_module_des_1){

              $course2[] = $courses_module_des_1;

            }
      ?>

     <!-- <div class="course-schedule-info-area" id="courseSchedule">

      <h4 class="fitContent">Course Schedule</h4> -->

     

      <!-- @for($i=0; $i< count($course1); $i++)

       <div class="ourse-schedule-accordina-area">

        <div class="accordion" id="accordionExample">

          <div class="accordion-item">

            <h2 class="accordion-header" id="headingOne">

              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapseOne">

                <div class="course-schedule-heading-area">{{  $course1[$i] }}

                </div>

              </button>

            </h2>

            <div id="collapse{{$i}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

              <div class="accordion-body">

               <div class="course-schedule-cotent-area">{{  $course2[$i] }}

               </div>

              </div>

            </div>

          </div>

         

        </div>

       </div>

       @endfor -->

       <!-- <div class="accordion accordion-flush customAccordion" id="accordionFlushExample">

        @for($i=0; $i< count($course1); $i++)

        <div class="accordion-item">

          <h2 class="accordion-header">

            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$i}}" aria-expanded="false" aria-controls="flush-collapseOne">

            {{  $course1[$i] }}

            </button>

          </h2>

          <div id="flush-collapse{{$i}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">

            <div class="accordion-body">{{  $course2[$i] }}</div>

          </div>

        </div>

        @endfor

      </div>

 

     </div> -->

     <?php } ?>

     <!-- <div class="Weekly-schedule-main-area">

        <h4>Weekly Schedule</h4>

        <div class="Weekly-schedule-box-info">

         <div class="Weekly-schedule-box">

          <div class="day-box">

           <p>Tues</p> 

          </div> 

          <div class="content-box">

           <p>Personal Study & Collaboration</p>

          </div>

         </div> 

         <div class="Weekly-schedule-box">

          <div class="day-box">

           <p>Wed</p> 

          </div> 

          <div class="content-box">

           <p>Live Class</p>

           <p>6-8:30pm</p>

          </div>

         </div>

         <div class="Weekly-schedule-box">

          <div class="day-box">

           <p>Thurs</p> 

          </div> 

          <div class="content-box">

           <p>Personal Study & Collaboration</p>

          </div>

         </div>

         <div class="Weekly-schedule-box">

          <div class="day-box">

           <p>Fri</p> 

          </div> 

          <div class="content-box">

           <p>Personal Study & Collaboration</p>

          </div>

         </div>

         <div class="Weekly-schedule-box">

          <div class="day-box">

           <p>Sat</p> 

          </div> 

          <div class="content-box">

           <p>Live Class</p>

           <p>1-3:30pm</p>

          </div>

         </div> 

      </div> 

    </div> -->

    <!-- <?php if(explode(':::',$course_schedule_status)[0] == 1){ ?>  

    <div class="upcoming-cohort-info-area" id="upcomingCohort">

     <div class="upcoming-cohort-heading-text">

      <h4 class="fitContent">Upcoming Cohort</h4>

      <p>{!! $courses->upcoming_cohort !!}</p>

     </div> 

     <div class="upcoming-cohort-month-btn-area">

      <a class="month-btn" href="#"><?php echo date("F d , Y", strtotime($courses->start_date))?></a>

      <a class="next-month-btn" href="#"><?php echo date("F d , Y", strtotime($courses->next_date))?></a>

     </div>

     <div class="upcoming-cohort-time-slot-info">

      <div class="upcoming-cohort-time-info">

       <p><?php echo date("l ", strtotime($courses->start_date))?> 1:00pm - 2:30pm EST</p>

       <p><?php echo date("l ", strtotime($courses->next_date))?> 1:00pm - 2:30pm EST</p> 

      </div>

      @if(explode(':::',$courses->no_of_seats)[0] == 0)

      <div class="upcoming-cohort-slot-info">

        <p class="text-danger">Seats Full</p> -->

       <!-- <p>0 Seats left</p>  -->

      <!-- </div>

      <div class="upcoming-cohort-btn-info"> -->

       <!-- <a class="upcoming-cohort-enrol-btn" href="{{ url('course-registration/'.$courses->course_title.'/'.base64_encode($courses->tbl_course_id)) }}">Enrol Now</a>  -->

      <!-- </div>

      @else

      <div class="upcoming-cohort-slot-info">

        @if(explode(':::',$courses->no_of_seats)[1] == 1)

        <p>Total Seat Left : {{ explode(':::',$courses->no_of_seats)[0]}}</p>

        @endif -->

       <!-- <p>0 Seats left</p>  -->

      <!-- </div>

      <div class="upcoming-cohort-btn-info"> -->

       <!-- <a class="upcoming-cohort-enrol-btn" href="{{ url('course-registration/'.$courses->course_title.'/'.base64_encode($courses->tbl_course_id)) }}">Enrol Now</a>  -->

        <!-- <form action="{{ url('course-registration/'.str_replace(' ','-',$courses->course_title)) }}" method="post">

        @csrf

          <input type="hidden" name="id" value="{{base64_encode($courses->tbl_course_id)}}">

          <input type="submit" class="upcoming-cohort-enrol-btn" value="Enrol Now">

        </form>

      </div>

      @endif

     </div>

    </div> -->

    <!-- <?php } ?> -->



    <div class="payment-options-info-area" id="paymentOption">

     <div class="payment-options-heading-text">

      <h4 class="fitContent">Payment Options</h4>

      <h2>Flexible & Affordable Pricing</h2>

      <p>{!! $courses->afordble_price !!}</p>

      

     </div>
     <form class="mt-4" action="{{ url('course-registration/'.str_replace(' ','-',$courses->course_title)) }}" method="post">

        @csrf

          <input type="hidden" name="id" value="{{base64_encode($courses->tbl_course_id)}}">

          <input type="submit" class="upcoming-cohort-enrol-btn" value="Enrol Now">

        </form>

     <!-- <div class="payment-options-tab-area">

      <ul class="nav nav-tabs" role="tablist">

       <li class="nav-item" role="presentation">

          <a class="nav-link active" data-bs-toggle="tab" href="#menu1" aria-selected="true" role="tab">PM (Pay Now)</a>

       </li>

       <li class="nav-item" role="presentation">

        <a class="nav-link" data-bs-toggle="tab" href="#menu2" aria-selected="false" tabindex="-1" role="tab">PM (Installment)</a>

       </li>

       <li class="nav-item" role="presentation">

          <a class="nav-link" data-bs-toggle="tab" href="#menu3" aria-selected="false" tabindex="-1" role="tab">PM + Accelerator (Pay Now)</a>

       </li>

       <li class="nav-item" role="presentation">

          <a class="nav-link" data-bs-toggle="tab" href="#menu4" aria-selected="false" tabindex="-1" role="tab">PM + Accelerator (Installment)</a>

       </li>

      </ul>

     </div>

     <div class="payment-options-price-deails">

      <div class="tab-content">

      <div id="menu1" class="tab-pane active" role="tabpanel">

       <div class="container">

        <div class="row">

         <div class="payment-options-btn-area">

          <a href="{{ url('course_res_about_u') }}" class="payment-options-btn">Enrol & Pay Now</a>  

         </div>

        </div>  

       </div> 

      </div>

      <div id="menu2" class="tab-pane fade" role="tabpanel">

       <div class="container">

        <div class="row">

         <div class="payment-options-btn-area">

          <a href="#" class="payment-options-btn">Enrol & Pay Now</a>  

         </div> 

        </div>  

       </div> 

      </div>

      <div id="menu3" class="tab-pane fade" role="tabpanel">

        <div class="container">

        <div class="row">

         <div class="payment-options-btn-area">

          <a href="#" class="payment-options-btn">Enrol & Pay Now</a>  

         </div>

        </div>  

       </div> 

      </div>

      <div id="menu4" class="tab-pane fade" role="tabpanel">

        <div class="container">

        <div class="row">

         <div class="payment-options-btn-area">

          <a href="#" class="payment-options-btn">Enrol & Pay Now</a>  

         </div>

        </div>  

       </div> 

      </div>

     </div>

     </div> -->

    </div>

    <!-- <?php if(explode(':::',$course_schedule_status)[2] == 1){ ?>  

    <div class="career-journey-map-info" id="careerRoadMap">

     <h4 class="fitContent">Career Road Map</h4>  -->

     <!-- <div class="career-journey-three-box">

      <div class="career-journey-box">

       <img src="{{ URL::asset('assets/frontend/images/book-icon.png') }}" alt="book icon"> 

       <p>Course</p>

       <p>completion</p>

      </div>

      <div class="line-area-1">

       <img src="{{ URL::asset('assets/frontend/images/line-icon-1.png') }}" alt="line icon">

      </div> 

      <div class="career-journey-box">

       <img src="{{ URL::asset('assets/frontend/images/career-icon.png') }}" alt="book icon"> 

       <p>Career</p>

       <p>Coaching</p>

      </div>

      <div class="line-area-2">

       <img src="{{ URL::asset('assets/frontend/images/line-icon-2.png') }}" alt="line icon">

      </div>

      <div class="career-journey-box">

       <img src="{{ URL::asset('assets/frontend/images/land-job-icon.png') }}" alt="book icon"> 

       <p>Land the job</p>

      </div>

      <div class="line-area-3">

       <img src="{{ URL::asset('assets/frontend/images/line-icon-3.png') }}" alt="line icon">

      </div>

     </div> -->

<!-- prtaima roadmap -->





<!-- <section id="process">

  <div class="row">

    <div class="section-heading">

   



    </div>

  </div>

  <div class="container-fluid">

    <div class="row">

   

      <div class="steps-timeline text-center"> 

      @foreach($careermap as $careermaps)

        <div class="steps-one">

        <p>{{$careermaps->status}}</p>

          <div class="end-circle back-orange"></div>

          <div class="step-wrap">

            <div class="steps-stops">

              <div class="verticle-line back-orange"></div>

            </div>

          </div>

          <div class="pane-warp back-blue">

            <div class="steps-pane">

            <img src="{{ url('assets/course_img/'.$careermaps->image)}}" width="40%" height="60" alt="">

            </div>

          </div>

          <div class="inverted-pane-warp back-blue">

            <div class="inverted-steps-pane">

              <p>{{$careermaps->title}}</p>

            </div>

          </div>

      </div>

      @endforeach -->

      <!-- /.steps-timeline -->

    <!-- </div>

  </div>

</section> -->



<!-- pratima roadmap end -->

     <!-- <div class="emloyer-career-info-area">

      <div class="emloyer-career-box">

        <div class="career-journey-box">

       <img src="{{ URL::asset('assets/frontend/images/employer-networking-icon.png') }}" alt="book icon"> 

       <p>Employer Networking</p>

      </div>

      <div class="career-journey-box">

       <img src="{{ URL::asset('assets/frontend/images/career-accelerator-icon.png') }}" alt="book icon"> 

       <p>Career </p>

       <p>Accelerator</p>

      </div> 

      <div class="line-area-4">

       <img src="{{ URL::asset('assets/frontend/images/line-icon-4.png') }}" alt="line icon">

      </div>

      </div>

     </div>  -->

    <!-- </div>

    <?php } ?> -->

    <!-- <?php if(explode(':::',$course_schedule_status)[3] == 1){ ?>  -->

    <!--Tool You’ll Learn section start here-->

    <!-- <?php 

     $courses->ltools_img;

     $courses_ltools_img = explode(',', $courses->ltools_img);

     $ltools_img1 = array();

     foreach($courses_ltools_img as $ltools_imgs){

       $ltools_img1[] = $ltools_imgs;

     }

    //  for($i=0; $i<= count(array($ltools_img1)); $i++){             

    //   echo $ltools_img1[$i];             

      // }

    ?> -->

    <!-- <div class="tools-you-learn-info" id="toolslearn">

      <h4 class="fitContent">Tool You’ll Learn</h4> 

      <div class="tools-you-learn-main">

      @for($i=0; $i< count($ltools_img1); $i++)

      <div class="what-get-box-area"> -->

        <!-- echo $ltools_img1[$i]; -->

         <!-- <a href="{{ url('assets/course_img/'.$ltools_img1[$i])}}"><img src="{{ url('assets/course_img/'.$ltools_img1[$i])}}" alt="Course"></a>

      </div> 

      @endfor -->

      <!-- <div class="tools-you-learn-box"></div>  -->

         

      <!-- </div> 

    </div> -->

    <!--Tool You’ll Learn section end here-->

    <!-- <?php } ?> -->

    <div class="alumni-experience-info-area" id="alumniExperience">

      <h4 class="fitContent">Alumni Experience</h4> 

      <div class="alumni-experience-video-info">

        @foreach($tvdo as $tvdos)

        @if($tvdos->testimonial_video == "no file upload")

        @else

        <div class="alumni-experience-video-box">

          <video controls>

            <source src="{{ url('assets/testimonial_video/'.$tvdos->testimonial_video) }}" type="video/mp4">

          </video> 

        </div>

        @endif

        @endforeach

      </div> 

    </div>
    
    <div class="course-testimonials-info-area">

      @foreach($testimonial as $testimonials)

      <div class="course-testimonials-box">

        <div class="course-user-img-area">

          <img src="{{ url('assets/testimonial_img/profile_img/'.$testimonials->profile_img	)}}" alt="avatar"> 

        </div>

        <div class="course-user-text-area">

          <h4 class="fitContent">{{ $testimonials->name}}</h4>

          <div class="testimonials-brand-icon">

            <img src="{{ url('assets/testimonial_img/brand_img/'.$testimonials->brand_image	)}}" width="60%" alt="Brand Image">

          </div>

          <h5>{{$testimonials->destination}}</h5>

          <p><?php echo $testimonials->about ?></p>

        </div> 

      </div> 

      @endforeach

    </div>

    

      <div class="course-faq-main-info" id="faqs">

        <div class="course-faq-heading-info">

          <h4 class="fitContent">Frequently Asked Questions</h4>

        </div> 

        @if(count($faq) > 0)

        <div class="course-faq-detail-info">

          <div class="accordion" id="Course-Faq-Accordion">

            @foreach($faq as $faqs)

            <div class="accordion-item">

              <div class="accordion-header" id="Faq-Two">

                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faqs->id }}" aria-expanded="false" aria-controls="collapseTwo">

                  <h4>{{ $faqs->question }}</h4>

                </button>

              </div>

              <div id="collapse{{ $faqs->id }}" class="accordion-collapse collapse" aria-labelledby="Faq-Two" data-bs-parent="#Course-Faq-Accordion">

                <div class="accordion-body">

                  <div class="faq-detail-description">

                    <p>{{ $faqs->answer }}</p>

                  </div>

                </div>

              </div>

            </div>

            @endforeach

          </div>

        </div>
        @else

        <p> No FAQs </p>

        @endif

      </div>
    

    <!-- <?php if(explode(':::',$course_schedule_status)[4] == 1){ ?>  

    <div class="our-data-analyst-info" id="ourInstructors"> -->

     <!-- <div class="our-data-analyst-heading-text">

      <h4 class="fitContent">Our {{ $courses->course_title}} Instructors</h4>

      <p>Instructors in BlackTECH's {{ $courses->course_title}} courses are experienced professionals who work at the world's most innovative companies. In our {{ $courses->course_title}} classes, you'll learn from experts who have years of industry experience and who know the most up-to-date and practical skills companies around the world are looking for.</p>

     </div>  -->



     <!-- <div class="course-tutor-name-info row">

      @foreach($instructure as $instructures)

      <div class="col-sm-12 col-md-4 col-lg-3 mb-3">

        <div class="course-tutor-box-info">

        <div class="course-tutor-img-area">

          <img src="{{ url('assets/course_img/'.$instructures->image)}}" alt="">

        </div>

        <div class="course-tutor-details">

          <h5>{{ $instructures->name }}</h5>

          <p>{{ $instructures->role }}</p>

        </div> 

        </div>

      </div>

      @endforeach

     </div> -->

    <!-- </div>

    <?php } ?> -->

  </div>

 </div>

 </div>

 </div>

 </div>

</section>

@endforeach

<!--Course Description Section End Here -->





<!--Accelerate Course leading companies Section Start Here -->

<!-- <section class="accelerate-leading-companies-info" id="talentwork">

 <div class="container">

  <div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">

     <div class="accelerate-leading-companies-heading"> 

      <h4 class="fitContent">Our Talent work with many of these leading companies</h4> 

     </div>

    </div>



    @foreach($ldingcompns as $ldingcompnses)

    <div class="col-lg-2 col-md-12 col-sm-12">

    <div class="tech-companies-box">

      <img src="{{ url('assets/upload_stpartners/'.$ldingcompnses->image)}}" height="100%" width="100%" alt="">

   </div>

    </div>

    @endforeach



  </div> 

 </div> 

</section> -->

<!--Accelerate Course leading companies Section end Here -->

@include('frontend.slider-with-chatButton')

@include('frontend.include.footer')