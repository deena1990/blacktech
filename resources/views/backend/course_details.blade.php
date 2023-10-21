@include('backend.include.header')
@include('backend.include.sidebar')

<style type="text/css">
  .profile .profile-overview .label {
    line-height: 33px;
    font-weight: 700;
    color: #899bbd;
}
.learnObList ul li {
    margin: 10px 0;
}
.learnObList ul li img {
    width: 18px;
    margin-right: 10px;
}
ul.showImg{
  display: flex;
  padding: 0;
}
.showImg li{
  width: 120px;
  height: 120px;
  margin: 9px;
  overflow: hidden;
  border: 2px solid #899bbd;
  border-radius: 4px;
}
.showImg li img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.btnEnd{
  text-align: end;
}
.leftImgBox{
    height: 334px;
    min-height: 334px;
}
</style>
  <main id="main" class="main">

    <div class="pagetitle">
      <div class="row">
        <div class="col-lg-6">
          <h1>Course Details</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/show_course') }}">Courses</a></li>
              <li class="breadcrumb-item active">Course Details</li>
            </ol>
          </nav>
        </div>

        <div class="col-lg-6">
          @foreach($course as $courses)
          <?php $instructors_id = explode(',',$courses->instructor_name); 
          foreach ($instructors_id as $key => $value) {
            $instructors_name[] = DB::table('tbl_instructure')->where('id',$value)->first()->name;
          }
          $course_schedule_status = DB::table('tbl_course_schedule')->where('course_id',$courses->tbl_course_id)->first()->status;
          ?>
            <div class="btnEnd">
              <input type="hidden" value="{{ $courses->tbl_course_id}}">
              <a class="btn" href="{{ url('admin/show_crsalumni',[$courses->tbl_course_id]) }}" style="background-color:#ff6600;border-color:#ff6600; color: #fff;">Course Alumni</a>
              <a class="btn" href="{{ url('admin/show_crstestmonial',[$courses->tbl_course_id]) }}" style="background-color:#ff6600;border-color:#ff6600; color: #fff;">Course Testimonial</a>
              <a class="btn" href="{{ url('admin/show_faq',[$courses->tbl_course_id]) }}" style="background-color:#ff6600;border-color:#ff6600; color: #fff;">Course FAQs</a>
            </div>
        </div>
        @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
      </div>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card leftImgBox">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="{{ url('assets/course_img/'.explode(':::',$courses->image)[0])}}" alt="Course Image" style="max-width: 100%;" ><br/>
             <!--  <input type="hidden" value="{{ $courses->tbl_course_id}}">
              <a href="{{ url('admin/show_crsalumni',[$courses->tbl_course_id]) }}">Add alumni</a>
              <a href="{{ url('admin/show_crstestmonial',[$courses->tbl_course_id]) }}">Add Testimonial</a> -->
            </div>
          </div>

        </div>
         <div class="col-xl-8">

          <div class="card">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Course Details</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <div class="row p-3">
                    <div class="col-lg-4 col-md-4 label ">Name : </div>
                    <div class="col-lg-8 col-md-8">{{ $courses->course_title}}</div>
                
                    <div class="col-lg-4 col-md-4 label">Price : </div>
                    <div class="col-lg-8 col-md-8">{{ $courses->price}}</div>
             
                    <div class="col-lg-4 col-md-4 label">Instructors Name : </div>
                    <div class="col-lg-8 col-md-8"> <b>[ {{ count($instructors_name) }} ] => [ {{ implode(', ',$instructors_name) }} ]</b></div>
              
                    <div class="col-lg-4 col-md-4 label">Start Date : </div>
                    <div class="col-lg-8 col-md-8">{{ $courses->start_date }}</div>
                 
                    <div class="col-lg-4 col-md-4 label">Next Cohort Start Date : </div>
                    <!-- <div class="col-lg-3 col-md-4 label">Upcoming Cohort : </div> -->
                    <div class="col-lg-8 col-md-8">{{ $courses->next_date }}</div>

                    <div class="col-lg-4 col-md-4 label">Class Days : </div>
                    <div class="col-lg-8 col-md-8">{{ $courses->classDays }}</div>

                    <div class="col-lg-4 col-md-4 label">Class Times : </div>
                    <div class="col-lg-8 col-md-8">{{ $courses->classTimes }}</div>
           
                    <div class="col-lg-4 col-md-4 label">Seats : </div>
                    <div class="col-lg-8 col-md-8">{{ explode(':::',$courses->no_of_seats)[0] }}</div>

                    <?php $course_type_name = DB::table('tbl_course_list')->where('id',$courses->course_type)->first()->course; ?>
                    <div class="col-lg-4 col-md-4 label">Course Type : </div>
                    <div class="col-lg-8 col-md-8">{{ $course_type_name }}</div>

                    <div class="col-lg-4 col-md-4 label">Coupon Type : </div>
                    <div class="col-lg-8 col-md-8">{{ $courses->coupon_type }}</div>
                  </div>
                </div>
              </div>   
          </div><!--  -->
        </div>

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <div class="col-sm-12">
                      <h5 class="card-title">Short Description</h5>
                      <p class="small fst-italic">{!! $courses->short_desc !!}</p> 
                  </div>

                  <div class="col-sm-12">
                      <h5 class="card-title">About Course</h5>
                      <p class="small fst-italic">{!! $courses->about_course !!}</p> 
                  </div>

                  <div class="col-sm-12 learnObList">
                      <h5 class="card-title">Learning Objectives</h5>
                      <p class="small fst-italic">{!! $courses->learning_objective !!}</p> 
                  </div>
                  <div class="col-sm-12">
                      <h5 class="card-title">Flexible & Affordable Pricing</h5>
                      <p class="small fst-italic">{!! $courses->afordble_price !!}</p> 
                  </div> 
                  <div class="col-sm-12">
                      <h5 class="card-title">What You’ll Get</h5>
                      <ul class="showImg">
                        <li> <img src="{{ url('assets/course_img/'.$courses->uget_img) }}"></li>
                      </ul>
                  </div>
                  <!-- <div class="col-sm-12 mt-5">
                      <h5 class="card-title d-inline">Upcoming Cohort</h5>
                      <?php if(explode(':::',$course_schedule_status)[0] == 1){ ?> 
                      <a href="{{url('admin/course_schedule_status/0',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Hide Upcoming Cohort?');" class="btn btn-success">Show</a>
                      <?php }if(explode(':::',$course_schedule_status)[0] == 0){ ?> 
                      <a href="{{url('admin/course_schedule_status/0',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Show Upcoming Cohort?');" class="btn btn-danger">Hide</a>
                      <?php } ?>
                      <p class="small fst-italic">{!! $courses->upcoming_cohort !!}</p> 
                  </div> -->
                  <?php
                    $courses->module_name;
                    $courses_module_name = explode(',', $courses->module_name);
                    // $course1 = array();
                    //   foreach($courses_module_name as $courses_module_names){
                    //     $course1[] = $courses_module_names;
                    //   }
                    $courses_module_des = explode(',', $courses->module_description);
                    $course2 = array();
                      foreach($courses_module_des as $courses_module_des_1){
                        $course2[] = $courses_module_des_1;
                      }
                  ?>

                   <!-- <div class="col-lg-12 mt-3">
                    <h5 class="card-title d-inline">Course Schedule</h5>
                      <?php if(explode(':::',$course_schedule_status)[1] == 1){ ?> 
                      <a href="{{url('admin/course_schedule_status/1',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Hide Course Schedule?');" class="btn btn-success">Show</a>
                      <?php }if(explode(':::',$course_schedule_status)[1] == 0){ ?> 
                      <a href="{{url('admin/course_schedule_status/1',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Show Course Schedule?');" class="btn btn-danger">Hide</a>
                      <?php } ?>
                     <div class="accordion" id="accordionExample">
                     @for($i=0; $i< count($courses_module_name); $i++)
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <?php echo $courses_module_name[$i];?>
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong><?php echo $course2[$i] ?></strong>
                            </div>
                          </div>
                        </div>
                      @endfor
                        
                      </div>
                    </div> -->
                    <!-- <div class="col-sm-12 mt-3">
                        <h5 class="card-title d-inline">Career Roadmap</h5>
                        <?php if(explode(':::',$course_schedule_status)[2] == 1){ ?> 
                        <a href="{{url('admin/course_schedule_status/2',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Hide Career Roadmap?');" class="btn btn-success">Show</a>
                        <?php }if(explode(':::',$course_schedule_status)[2] == 0){ ?> 
                        <a href="{{url('admin/course_schedule_status/2',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Show Career Roadmap?');" class="btn btn-danger">Hide</a>
                        <?php } ?>
                    </div>  -->
                    <?php 
                        $courses->ltools_img;
                        $courses_ltools_img = explode(',', $courses->ltools_img);
                    ?>
                    <!-- <div class="col-sm-12 mt-3">
                        <h5 class="card-title d-inline">Tool You’ll Learn</h5>
                        <?php if(explode(':::',$course_schedule_status)[3] == 1){ ?> 
                        <a href="{{url('admin/course_schedule_status/3',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Hide Tool You’ll Learn?');" class="btn btn-success">Show</a>
                        <?php }if(explode(':::',$course_schedule_status)[3] == 0){ ?> 
                        <a href="{{url('admin/course_schedule_status/3',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Show Tool You’ll Learn?');" class="btn btn-danger">Hide</a>
                        <?php } ?>
                        @for($i=0; $i< count($courses_ltools_img); $i++)
                        <ul class="showImg">
                          <li> <img src="{{ url('assets/course_img/'.$courses_ltools_img[$i]) }}"></li>
                        @endfor
                        </ul>
                    </div>  -->
                    <!-- <div class="col-sm-12 mt-3">
                      <h5 class="card-title d-inline">Our Instructors</h5>
                      <?php if(explode(':::',$course_schedule_status)[4] == 1){ ?> 
                      <a href="{{url('admin/course_schedule_status/4',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Hide Our Instructors?');" class="btn btn-success">Show</a>
                      <?php }if(explode(':::',$course_schedule_status)[4] == 0){ ?> 
                      <a href="{{url('admin/course_schedule_status/4',$courses->tbl_course_id)}}" onclick="return confirm('Are you sure to Show Our Instructors?');" class="btn btn-danger">Hide</a>
                      <?php } ?>
                    </div> -->
                </div>
                 @endforeach
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>

      </div>
    </section>
    
  </main><!-- End #main -->
  @include('backend.include.footer')