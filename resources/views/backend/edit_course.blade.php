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
  width: 80px;
  height: 50px;
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
</style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('admin/show_course') }}">Courses</a></li>
          <li class="breadcrumb-item active">Edit Course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Edit Course</h5>

              <!-- Horizontal Form -->
              <!-- Multi Columns Form -->
              <form action="{{ url('admin/course_edit') }}" method="post" onsubmit="return validate_course();" enctype="multipart/form-data" id="course_form" class="row g-3">
                @csrf
                @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                @if(Session::has('error'))
                  <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
                <input type="hidden" value="{{$courses->tbl_course_id}}" name="course_id">
                <input type="hidden" value="{{$courses->tbl_course_schedule_id}}" name="course_schedule_id">
                <input type="hidden" value="{{$courses->tbl_course_toolsimg_id}}" name="course_toolsimg_id">
                <!-- <div class="col-md-12">
                  <div id="inputs">
                    <p class='pt-2'><b>Add Course Schedule</b>&emsp;<button onclick="getinput()" class="btn" style="background:#ff6600;color:#fff;"><i class="bi bi-plus-circle"></i></button></p> -->
                    <!-- <button onclick="getinput()" class="form-control" style="background-color:#ff6600;color:#fff;">Add Class Schedule</button> -->
                  <!-- </div>
                </div> -->
                
                <?php
                    $courses->module_name;
                    $courses_module_name = explode(',', $courses->module_name);
                    $courses_module_des = explode(',', $courses->module_description);
                    $course2 = array();
                      foreach($courses_module_des as $courses_module_des_1){
                        $course2[] = $courses_module_des_1;
                      }
                  ?>

                <!-- <div class="col-md-12">
                <div id="inputs1">
                @for($i=0; $i< count($courses_module_name); $i++)
                  &emsp;<p class='pt-2'><b>Course Schedule</b>&emsp; <a href="{{url('admin/removeModule')}}/{{$courses->tbl_course_id}}"> <span onclick='removeModule()' class='btn' style='background:#ff6600;color:#fff;'><i class='bi bi-dash-circle'></i></span></a></p>
                  <input type="text" value="<?php echo $courses_module_name[$i];?>" placeholder="Module Name" name="modulename[]" class="form-control mb-2" required>
                  <textarea name="moduledesc[]" placeholder="Description" class="form-control" aria-label="With textarea" cols="30" rows="5" required><?php echo $course2[$i] ?></textarea>
                @endfor 
                </div>
                <div id="inputs2">
                </div>
                </div> -->
              
                <div class="col-md-3">
                 <label for="Select Course" class="form-label">Select Course</label>
                  <select id="Select Course" name="select_course" class="form-select">
                  @foreach($courselist as $courselists) 
                  <option value="{{$courselists->id}}" <?php if($courselists->id==$courses->course_type){ echo "selected";}?>>{{ $courselists->course }}</option>
                   @endforeach
                  </select>
                </div>  

                <div class="col-md-3">
                  <label for="coupon_type" class="form-label">Type of Coupon</label>
                  <select id="coupon_type" name="coupon_type" class="form-select coupon_type" required>
                    <option value="">Choose Coupon...</option>
                    <option value="Free" <?php if($courses->coupon_type == "Free"){ echo "selected";} ?>>Free</option>
                    <option value="Flat Discount" <?php if($courses->coupon_type == "Flat Discount"){ echo "selected";} ?>>Flat Discount</option>
                    <option value="% Discount" <?php if($courses->coupon_type == "% Discount"){ echo "selected";} ?>>% Discount</option>
                  </select>
                </div> 

                <div class="col-md-3">
                  <label for="course_title" class="form-label">Course Title</label>
                  <input type="text" value="{{ $courses->course_title }}" name="course_title" class="form-control" id="course_title">
                </div>

                <div class="col-md-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" name="price" value="{{ $courses->price }}" class="form-control" id="price" required>
                </div>

                <div class="col-md-4">
                  <label for="course_instructors" class="form-label">Course Instructors</label>
                  <select id="course_instructors" name="course_instructors[]" class="form-select" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3">
                    <!-- <option value="">Select Instructor...</option> -->
                    @if(isset($instructures) && count($instructures) > 0)
                      @foreach($instructures as $instructure)
                      <option value="{{ $instructure->id }}" <?php if(in_array($instructure->id,explode(',',$courses->instructor_name))){echo "selected";} ?>>{{ $instructure->name }}</option>
                      @endforeach
                    @endif
                  </select>
                  <span id="course_instructors_error" class="text-danger"></span>
                </div>

                <div class="col-md-4">
                  <label for="afordble_price" class="form-label">Flexible & Affordable Pricing</label>
                  <input type="text" value="{{ $courses->afordble_price}}" name="afordble_price" class="form-control" id="afordble_price" required>
                </div>  

                <div class="col-md-4">
                  <label for="class_days" class="form-label">Class Days</label>
                  <select id="class_days" name="class_days[]" class="form-select" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3">
                    <option value="Monday" <?php if(in_array('Monday',explode(',',$courses->classDays))){echo "selected";} ?>>Monday</option>
                    <option value="Tuesday" <?php if(in_array('Tuesday',explode(',',$courses->classDays))){echo "selected";} ?>>Tuesday</option>
                    <option value="Wednesday" <?php if(in_array('Wednesday',explode(',',$courses->classDays))){echo "selected";} ?>>Wednesday</option>
                    <option value="Thursday" <?php if(in_array('Thursday',explode(',',$courses->classDays))){echo "selected";} ?>>Thursday</option>
                    <option value="Friday" <?php if(in_array('Friday',explode(',',$courses->classDays))){echo "selected";} ?>>Friday</option>
                    <option value="Saturday" <?php if(in_array('Saturday',explode(',',$courses->classDays))){echo "selected";} ?>>Saturday</option>
                    <option value="Sunday" <?php if(in_array('Sunday',explode(',',$courses->classDays))){echo "selected";} ?>>Sunday</option>
                  </select>
                  <span id="class_days_error" class="text-danger"></span>
                </div>

                <div class="col-md-3">
                  <label for="class_times" class="form-label">Class Times</label>
                  <input type="time" value="{{ $courses->classTimes }}" name="class_times" class="form-control" id="class_times" required>
                </div>

                <div class="col-md-3">
                  <label for="start_date" class="form-label">Start Date</label>
                  <input type="date" value="{{ $courses->start_date }}" name="start_date" class="form-control" id="start_date">
                </div>

                <div class="col-md-3">
                  <label for="next_date" class="form-label">Next Date</label>
                  <!-- <label for="next_date" class="form-label">Upcoming Cohort</label> -->
                  <input type="date" value="{{ $courses->next_date }}" name="next_date" class="form-control" id="next_date">
                </div>

                <div class="col-md-3">
                  <label for="seats" class="form-label">Seats</label>
                  <input type="number" value="{{ explode(':::',$courses->no_of_seats)[0]}}" name="no_of_seats" class="form-control" id="seats" required>
                </div>

                <div class="col-md-4">
                  <label for="image" class="form-label">Course Image ( For Home & Course  Page )</label>
                  <input type="hidden" name="previous" value="{{ explode(':::',$courses->image)[0] }}" id="image">
                  <input type="file" name="new" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg">
                  <!-- <span class="text-danger"><small><b>Note : Upload image size ( 363.2*300 px )</b></small></span> -->
                  <span style="color: red;font-size: 13px;">( <b>Note :</b> Image Dimensions must be 363.2 x 300 px )</span>
                  <ul class="showImg">
                    <li> <img src="{{ url('assets/course_img/'.explode(':::',$courses->image)[0])}}" width="50%"></li>
                  </ul>
                </div>

                <div class="col-md-4">
                  <label for="image1" class="form-label">Course Image ( For Course Details Page )</label>
                  <input type="hidden" name="previous1" value="{{ explode(':::',$courses->image)[1] }}" id="image1">
                  <input type="file" name="new1" class="form-control" id="image1" accept="image/png, image/jpg, image/jpeg">
                  <!-- <span class="text-danger"><small><b>Note : Upload image size ( 496.83*537 px )</b></small></span> -->
                  <span style="color: red;font-size: 13px;">( <b>Note :</b> Image Dimensions must be 496.83 x 537 px )</span>
                  <ul class="showImg">
                    <li> <img src="{{ url('assets/course_img/'.explode(':::',$courses->image)[1])}}" width="10%"></li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <label for="get_image" class="form-label">What You’ll Get</label>
                  <input type="hidden" value="{{ $courses->uget_img }}" name="pre_get_image">
                  <input type="file" name="get_image" class="form-control" id="get_image" accept="image/png, image/jpg, image/jpeg">
                  <!-- <span style="color: red;font-size: 13px;">( <b>Note :</b> Image Dimensions must be 1920 x 1080 )</span> -->
                  <span style="color: red;font-size: 13px;">( <b>Note :</b> Image Dimensions must be 150 x 84.47 px )</span>
                  <!-- <span class="text-danger"><small><b>Note : Upload image size ( 150*84.47 px )</b></small></span> -->
                  <ul class="showImg">
                    <li> <img src="{{ url('assets/course_img/'.$courses->uget_img)}}"></li>
                  </ul>
                </div>
                <?php 
                    $courses->ltools_img;
                    $courses_ltools_img = explode(',', $courses->ltools_img);
                    $ltools_img1 = array();
                    foreach($courses_ltools_img as $ltools_imgs){
                      $ltools_img1[] = $ltools_imgs;
                    }
                    // dd($ltools_img1); 

                ?>
                
                <!-- <div class="col-md-4">
                  <label for="learn_tool" class="form-label">Tool You’ll Learn</label>
                  <input type="file" name="learn_tool[]" class="form-control" id="learn_tool" accept="image/png, image/jpg, image/jpeg" multiple >
                  <ul class="showImg">
                    <?php $image_val = array(); ?>
                     @for($i=0; $i< count($ltools_img1); $i++)
                    <?php $image_val[] = $ltools_img1[$i]; ?>
                    <li> <img src="{{ url('assets/course_img/'.$ltools_img1[$i])}}" width="10%"></li>
                    <input type="hidden" value="<?php echo $image_val[$i]; ?>" name="pre_learn_tool[]">
                     @endfor
                  
                 
                  </ul>

                </div> -->

                <!-- <div class="col-md-4">
                  <label for="upcoming_cohort" class="form-label">Upcoming Cohort</label>
                  <input type="text" value="{{ $courses->upcoming_cohort}}" name="upcoming_cohort" class="form-control" id="upcoming_cohort" required>
                </div> -->

                <div class="col-md-4">
                  <label for="short_desc" class="form-label">Short Description</label>
                  <textarea class="ckeditor form-control content_text" name="short_desc" id="short_desc" rows="2">
                    {!! $courses->short_desc !!}
                  </textarea>
                  <span id="short_desc_error" class="text-danger"></span>
                </div>

                <div class="col-md-4">
                  <label for="short_desc" class="form-label">About the Course</label>
                  <textarea class="ckeditor form-control content_text" name="about_course" rows="5" id="about_course">{!! $courses->about_course !!}</textarea>
                  <span id="about_course_error" class="text-danger"></span>
                </div>

                <div class="col-md-4">
                  <label for="learning_objective" class="form-label">Learning Objectives</label>
                  <textarea class="ckeditor form-control content_text" name="learning_objective" rows="3" id="learning_objective">{!! $courses->learning_objective !!}</textarea>
                  <span id="learning_objective_error" class="text-danger"></span>
                </div>
                <div class="text-center">
                   <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
             
              <!-- End Horizontal Form -->

            </div>
          </div>

          

        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <!-- End #main -->
  
  @include('backend.include.footer')
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
          $('.ckeditor').ckeditor();
      });     
  </script>
  <script>
    function getinput()
    { 
      var name="<p class='pt-2'><b>Remove Course Schedule</b>&emsp;<button onclick='removeModule1()' class='btn' style='background:#ff6600;color:#fff;''><i class='bi bi-dash-circle'></i></button></p><input type='text' placeholder='Module Name' class='form-control mb-2' name='module_name[]' id='modulename' required><span class='text-danger' id='mod_error'></span>";
      var description="<textarea class='form-control' name='module_description[]' id='moduledesc' placeholder='Description' rows='5' cols='10' required></textarea>";
      $("#inputs2").append(name,description);
      }
  </script>
  <script>
    function removeModule()
      {
        $("#inputs1").hide();
      }
  </script>
  <script>
    function removeModule1()
      {
        $("#inputs2").hide();
        window.location.reload();
      }
  </script>
  <script>
    $(document).ready(function(){
      $('.coupon_type').change(function(){
        var coupon_type = $('.coupon_type').val();
        if (coupon_type == "Free"){
          $('#price').val('0');
        }else{
          $('#price').val('');
        }
      });
    });
  </script>
  <script>
    function validate_course(){
      var course_instructors = $('#course_instructors').val();
      var class_days = $('#class_days').val();
      var short_desc = CKEDITOR.instances.short_desc.getData();
      var about_course = CKEDITOR.instances.about_course.getData();
      var learning_objective = CKEDITOR.instances.learning_objective.getData();
      if(short_desc==""){
        $('#short_desc_error').text('Please enter text in Short Description Field');
        return false;
      }
      if(about_course==""){
        $('#short_desc_error').text('');
        $('#about_course_error').text('Please enter text in About the Course Field');
        return false;
      }
      if(learning_objective==""){
        $('#short_desc_error').text('');
        $('#about_course_error').text('');
        $('#learning_objective_error').text('Please enter text in Learning Objectives Field');
        return false;
      }
      if(course_instructors==""){
        $('#short_desc_error').text('');
        $('#about_course_error').text('');
        $('#learning_objective_error').text('');
        $('#course_instructors_error').text('Please select atleast one instructor');
        $(window).scrollTop($('#course_instructors_error').position().top)
        return false;
      }
      if(class_days==""){
        $('#short_desc_error').text('');
        $('#about_course_error').text('');
        $('#learning_objective_error').text('');
        $('#course_instructors_error').text('');
        $('#class_days_error').text('Please select atleast one day');
        $(window).scrollTop($('#class_days_error').position().top)
        return false;
      }
    }
  </script>