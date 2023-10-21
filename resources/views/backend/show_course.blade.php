@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Show Course</h1>
         <nav>
            <div class="row">
                  <div class="col-sm-9">
                  <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item">Show Course</li>
                  </ol>
                  </div>
                  <div class="col-sm-3" style="text-align:right;">
                   <a><button type="button" class="btn btn-primary" id="add_courses" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i> Add Course</button></a>
                  </div>
            </div>
         </nav>
       </div>
     
       <section class="section">
          <div class="row">
             <div class="col-lg-12">
                <div class="card">
                   <div class="card-body table-responsive">
                      <h5 class="card-title">Show Course</h5>
                      <table class="table text-center" id="example1" style="width:100%">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Course Image</th>
                               <th scope="col">Course Type</th>
                               <th scope="col">Course Name</th>
                               <th scope="col">Start Date</th>
                               <!-- <th scope="col">Upcoming Cohort</th> -->
                               <th scope="col">Next Date</th> 
                               <th scope="col">Action</th>
                               <!-- <th scope="col">No. of Seats</th> -->
                               <th scope="col">Status</th>
                            </tr>
                         </thead>
                         <tbody class="row_position">
                           @if(Session::has('message'))
                           <p class="alert alert-success">{{ Session::get('message') }}</p>
                           @endif
                            <p class="alert alert-success" style="display:none;" id="orderUpdateMsg">Course order updated successfully !!</p>
                           @foreach($course as $key=>$courses)

                           <?php $courseType = DB::table('tbl_course_list')->where('id',$courses->course_type)->first();?>
                           <tr id="<?php echo $courses->id; ?>">
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/course_img/'.explode(':::',$courses->image)[0])}}" alt="Course Image" height="50" width="50"></td>
                           <td>{{ $courseType->course }}</td>
                           <td>{{ Str::limit($courses->course_title,20) }}</td>
                           <td>{{ $courses->start_date }}</td>
                           <td>{{ $courses->next_date }}</td>
                           <td>
                              <a href="{{ url('admin/course_details', [$courses->id]) }}"><i class="fa fa-eye"></i></a> &nbsp;
                              <a href="{{ url('admin/course_edit_view', [$courses->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/course_delete', [$courses->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
                           </td>
                           <!-- <td>
                                <?php $sheets_number_status = DB::table('tbl_course')->where('id',$courses->id)->first()->no_of_seats; 
                                $getSheetsStatus = explode(':::',$sheets_number_status)[1]; 
                                if($getSheetsStatus == 1){ ?> 
                             
                                <a href="{{url('admin/sheets_number_status',$courses->id)}}" onclick="return confirm('Are you sure to Hide No. of Sheets?');" class="btn btn-success">Show</a>

                                <?php }if($getSheetsStatus == 0){ ?> 

                                <a href="{{url('admin/sheets_number_status',$courses->id)}}" onclick="return confirm('Are you sure to Show No. of Sheets?');" class="btn btn-danger">Hide</a>

                                <?php } ?>
                           </td> -->
                           <td>
                           <?php if($courses->status == 1){ ?> 
                             
                                <a href="{{url('admin/course_change_status',$courses->id)}}" onclick="return confirm('Are you sure to Inactive Status?');" class="btn btn-success">Active</a>

                                <?php }if($courses->status == 0){ ?> 

                                <a href="{{url('admin/course_change_status',$courses->id)}}" onclick="return confirm('Are you sure to Active Status?');" class="btn btn-danger">Inactive</a>

                                <?php } ?>
                           </td>
                           </tr>
                           @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </section>
   <!-- ADD Courses Modal -->
   <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <span class="close">&times;</span>
         <div class="card">
            <div class="card-body">
               <h5 class="card-title text-center">Add Course</h5>
               <!-- Horizontal Form -->
               <form action="{{ url('admin/insert_course') }}" method="post" onsubmit="return validate_course();" enctype="multipart/form-data" id="course_form" class="row g-3">
                @csrf
                <!-- <div class="col-md-12">
                  <div id="inputs">
                    <p class='pt-2'><b>Add Course Schedule</b>&emsp;<button onclick="getinput()" class="btn" style="background:#ff6600;color:#fff;"><i class="bi bi-plus-circle"></i></button></p>
                    <input type='text' placeholder='Module Name' class='form-control' name='module_name[]' id='modulename' required>&emsp;
                    <span class='text-danger' id='mod_error'></span>
                    <textarea class='form-control' name='module_description[]' id='moduledesc' placeholder='Description' rows='5' cols='10' required></textarea>
                  </div>
                  <div id="inputs1">

                  </div>
                </div> -->
                <div class="col-md-3">
                  <label for="select_course" class="form-label">Type of Program</label>
                  <select id="select_course" name="select_course" class="form-select" onchange="return decidePrice();" required>
                    <option value="">Choose Course...</option>

                    @foreach($courselist as $course_lists)
                    <option value="{{ $course_lists->id }}">{{ $course_lists->course }}</option>
                    @endforeach
                    
                  </select>
                </div>  

                <div class="col-md-3">
                  <label for="coupon_type" class="form-label">Type of Coupon</label>
                  <select id="coupon_type" name="coupon_type" class="form-select" onchange="return decidePrice();" required>
                    <option value="">Choose Coupon...</option>
                    <option value="Free">Free</option>
                    <option value="Flat Discount">Flat Discount</option>
                    <option value="% Discount">% Discount</option>
                  </select>
                </div>

                <div class="col-md-3">
                  <label for="course_title" class="form-label">Course Title</label>
                  <input type="text"  name="course_title" class="form-control" id="course_title" required>
                  <span class="text-danger" id="title_error"></span>
                </div>

                <div class="col-md-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" name="price" id="price" class="form-control" required>
                  <span id="price_error" class="text-danger"></span>
                </div>
                
                <div class="col-md-4">
                  <label for="course_instructors" class="form-label">Course Instructors</label>
                  <select id="course_instructors" name="course_instructors[]" class="form-select" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3">
                    <!-- <option value="">Select Instructor...</option> -->
                    @if(isset($instructures) && count($instructures) > 0)
                      @foreach($instructures as $instructure)
                      <option value="{{ $instructure->id }}">{{ $instructure->name }}</option>
                      @endforeach
                    @endif
                  </select>
                  <span id="course_instructors_error" class="text-danger"></span>
                </div>

                <div class="col-md-4">
                  <label for="afordble_price" class="form-label">Flexible & Affordable Pricing</label>
                  <input type="text" name="afordble_price" class="form-control" id="afordble_price" required>
                </div>

                <div class="col-md-4">
                  <label for="class_days" class="form-label">Class Days</label>
                  <select id="class_days" name="class_days[]" class="form-select" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                  </select>
                  <span id="class_days_error" class="text-danger"></span>
                </div>

                <div class="col-md-3">
                  <label for="class_times" class="form-label">Class Times</label>
                  <input type="time" value="{{ $courses->next_date }}" name="class_times" class="form-control" id="class_times" required>
                </div>

                <div class="col-md-3">
                  <label for="start_date" class="form-label">Start Date</label>
                  <input type="date" name="start_date" class="form-control" min="<?php echo date('Y-m-d'); ?>" id="start_date" required>
                </div>

                <div class="col-md-3">
                  <label for="next_date" class="form-label">Next Date</label>
                  <!-- <label for="next_date" class="form-label">Upcoming Cohort</label> -->
                  <input type="date" name="next_date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="next_date" required>
                </div>

                <div class="col-md-3">
                  <label for="seats" class="form-label">Seats</label>
                  <input type="number" name="no_of_seats" class="form-control" id="seats" required>
                </div>

                <div class="col-md-4">
                  <label for="image" class="form-label">Course Image ( For Home & Course )</label>
                  <input type="file" name="image" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg" required>
                  <!-- <span class="text-danger"><small><b>Note : Upload image size ( 363.2*300 px )</b></small></span> -->
                  <span style="color: red;font-size: 13px;">( <b>Note :</b> Dimensions must be 363.2x300 px )</span>
                </div>

                <div class="col-md-4">
                  <label for="image1" class="form-label">Course Image ( For Course Details )</label>
                  <input type="file" name="image1" class="form-control" id="image1" accept="image/png, image/jpg, image/jpeg" required>
                  <!-- <span class="text-danger"><small><b>Note : Upload image size ( 496.83*537 px )</b></small></span> -->
                  <span style="color: red;font-size: 13px;">( <b>Note :</b> Dimensions must be 496.83x537 px )</span>
                </div>

                <div class="col-md-4">
                  <label for="get_image" class="form-label">What You’ll Get</label>
                  <input type="file" name="get_image" class="form-control" id="get_image" accept="image/png, image/jpg, image/jpeg" required>
                  <!-- <span class="text-danger"><small><b>Note : Upload image size ( 150*84.47 px )</b></small></span> -->
                  <span style="color: red;font-size: 13px;">( <b>Note :</b> Dimensions must be 150x84.47 px )</span>
                </div>

                <!-- <div class="col-md-4">
                  <label for="learn_tool" class="form-label">Tool You’ll Learn</label>
                  <input type="file" name="learn_tool[]" class="form-control" id="learn_tool" accept="image/png, image/jpg, image/jpeg" multiple required>
                </div> -->

                <!-- <div class="col-md-4">
                  <label for="upcoming_cohort" class="form-label">Upcoming Cohort</label>
                  <input type="text" name="upcoming_cohort" class="form-control" id="upcoming_cohort" required>
                </div> -->

                <div class="col-md-4">
                  <label for="short_desc" class="form-label">Short Description</label>
                  <textarea class="ckeditor form-control content_text" name="short_desc" id="short_desc" rows="2"></textarea>
                  <span id="short_desc_error" class="text-danger"></span>
                </div>

                <div class="col-md-4">
                  <label for="short_desc" class="form-label">About the Course</label>
                  <textarea class="ckeditor form-control content_text" name="about_course" rows="3" id="about_course"></textarea>
                  <span id="about_course_error" class="text-danger"></span>
                </div>

                <div class="col-md-4">
                  <label for="learning_objective" class="form-label">Learning Objectives</label>
                  <textarea class="ckeditor form-control content_text" name="learning_objective" rows="3" id="learning_objective"></textarea>
                  <span id="learning_objective_error" class="text-danger"></span>
                </div>
                <div class="text-center">
                   <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                </div>
              </form>
               <!-- End Horizontal Form -->
            </div>
         </div>
      </div>
      <!-- End Modal content -->
   </div>
   <!-- ADD Courses Modal End-->
    </main>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>
    <script type="text/javascript">
      $(".row_position").sortable({
          delay: 150,
          stop: function () {
            var selectedData = new Array();
            $(".row_position>tr").each(function(){
                selectedData.push($(this).attr("id"))
            });
            updateOrder(selectedData);
          }
      });
      function updateOrder(aData){ 
          var token = "<?php echo csrf_token(); ?>";
          $.ajax({
            url: "{{url('updateCourseOrder')}}",
            type: "POST",
            data: {allData:aData,_token:token},
            success: function(data){
                // if(data == 1){
                  // alert(data);
                  console.log(data);
                  // location.reload();
                  $("#orderUpdateMsg").show();
                  $("#orderUpdateMsg").fadeOut(6000);
                  setTimeout(() => {
                      location.reload();
                  }, 6000);
                // }
            }
          });
      }
    </script>
   <script>
   
   function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
   }

   $("#example").dataTable( {
      "sScrollX": '100%'
   } );
   </script>
   <script>
   // Get the modal
   var modal = document.getElementById("myModal");
   var btn = document.getElementById("add_courses");
   var span = document.getElementsByClassName("close")[0];
   btn.onclick = function() {
     modal.style.display = "block";
   }
   span.onclick = function() {
     modal.style.display = "none";
   }
   window.onclick = function(event) {
     if (event.target == modal) {
       modal.style.display = "none";
     }
   }
</script>
   
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
      var name="<p class='pt-2'><b>Remove Course Schedule</b>&emsp;<button onclick='removeModule()' class='btn' style='background:#ff6600;color:#fff;''><i class='bi bi-dash-circle'></i></button></p><input type='text' placeholder='Module Name' class='form-control' name='module_name[]' id='modulename' required>&emsp;<span class='text-danger' id='mod_error'></span>";
      var description="<textarea class='form-control' name='module_description[]' id='moduledesc' placeholder='Description' rows='5' cols='10' required></textarea>";
      $("#inputs1").append(name,description);
      }
  </script>
  <script>
    function removeModule()
      {
        $("#inputs1").hide();
      }
  </script>
  <script>
    function decidePrice(){
      var select_course = $('#select_course').val();
      var coupon_type = $('#coupon_type').val();
      if (select_course == 3 || coupon_type == "Free"){
        $('#price').val('0');
      }else{
        $('#price').val('');
      }
    }
  </script>
  <script>
    function validate_course(){course_instructors
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