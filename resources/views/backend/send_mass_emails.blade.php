@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Send Emails</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Send Emails</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center"></h5>
            @if(Session::has('cmessage'))
              <p class="alert alert-success">{{ Session::get('cmessage') }}</p>
            @elseif(Session::has('emessage'))
              <p class="alert alert-success">{{ Session::get('emessage') }}</p>
            @endif
            <form action="{{ url('admin/insert_send_mass_emails') }}" method="post" onsubmit="return validatefields();" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <div class="row col-md-12">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-center">Send To</label>
                    <div class="col-sm-8">
                        <input type="radio" name="radio" id="courseRadioBtn" onclick="radioBtnFunction();"> Course Registered Users </input><br>
                        <input type="radio" name="radio" id="eventRadioBtn" onclick="radioBtnFunction();" class="mt-3"> Event Registered Users
                    </div>
                  </div>
                  <div id="courseSec" style="display: none;">
                    <div class="row col-md-12 mt-5">
                      <label for="course" class="col-sm-3 col-form-label fw-bold text-center">Course</label>
                      <div class="col-sm-8">
                        <select name="course" class="form-control" id="course" onchange="getCourseId();">
                          <option selected style="display: none;">Select Course</option>
                          @foreach($courses as $course)
                          <option value="{{$course->id}}">{{$course->course_title}}</option>
                          @endforeach
                        </select>
                        <span class="text-danger" id="course_error"></span>
                      </div>
                    </div>
                  </div>
                  <div id="courseUser" style="display: none;">
                    <div class="row col-md-12 mt-5">
                      <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-center">User</label>
                      <div class="col-sm-8">
                        <select name="courseUsers[]" class="form-control" id="courseUserOption" onchange="removeUserError();" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="">
                        </select>
                        <span class="text-danger" id="courseUsers_error"></span>
                      </div>
                    </div>
                  </div>
                  <div id="eventSec" style="display: none;">
                    <div class="row col-md-12 mt-5">
                      <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-center">Event</label>
                      <div class="col-sm-8">
                        <select name="event" class="form-control" id="event" onchange="getEventId();">
                          <option selected style="display: none;">Select Event</option>
                          @foreach($events as $event)
                          <option value="{{$event->id}}">{{$event->name}}</option>
                          @endforeach
                        </select>
                        <span class="text-danger" id="event_error"></span>
                      </div>
                    </div>
                  </div>
                  <div id="eventUser" style="display: none;">
                    <div class="row col-md-12 mt-5">
                      <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-center"> User</label>
                      <div class="col-sm-8">
                        <select name="eventUsers[]" class="form-control" id="eventUserOption" onchange="removeUserError();" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="">
                        </select>
                        <span class="text-danger" id="eventUsers_error"></span>
                      </div>
                    </div>
                  </div>
                  <div id="subMess" style="display: none;margin-top: 0px;">
                    <div class="row col-md-12 mt-5">
                      <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-center">Subject</label>
                      <div class="col-sm-8">
                        <input type="text" name="subject" class="form-control" oninput="removeSubMesError();" id="subject">
                        <span class="text-danger" id="subject_error"></span>
                      </div>
                    </div>
                    <div class="row col-md-12 mt-5">
                      <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-center">Message</label>
                      <div class="col-sm-8">
                        <textarea name="message" class="form-control ckeditor" cols="30" rows="10"></textarea>
                        <span class="text-danger" id="message_error"></span>
                      </div>
                    </div>
                    <div class="text-center mb-5 mt-5">
                      <button type="submit" class="btn btn-primary">Send</button><br>
                      <span class="text-danger" id="button_bottom_error"></span>
                    </div>
                  </div>
               </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main>
@include('backend.include.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
      $('.ckeditor').ckeditor();
    });
</script>
<script>
  function removeUserError(){
    document.getElementById('courseUsers_error').innerHTML = "";
    document.getElementById('eventUsers_error').innerHTML = "";
  }
  function  removeSubMesError(){
    document.getElementById('subject_error').innerHTML = "";
    // document.getElementById('message_error').innerHTML = "";
  }
  function validatefields(){
    if(document.getElementById('courseRadioBtn').checked) {
      if(document.getElementById('course').value == "Select Course"){
        document.getElementById('course_error').innerHTML = "Please select a course";
        document.getElementById('button_bottom_error').innerHTML = "Error !! Course is not selected by you.";
        setTimeout(() => {
          // document.getElementById('course_error').innerHTML = "";
          document.getElementById('button_bottom_error').innerHTML = "";
        }, 5000);
        return false;
      }else if(document.getElementById('courseUserOption').value == ""){
        document.getElementById('courseUsers_error').innerHTML = "Please select atleast one user";
        document.getElementById('button_bottom_error').innerHTML = "Error !! User is not selected by you.";
        setTimeout(() => {
          // document.getElementById('courseUsers_error').innerHTML = "";
          document.getElementById('button_bottom_error').innerHTML = "";
        }, 5000);
        return false;
      }else if(document.getElementById('subject').value == ""){
        document.getElementById('subject_error').innerHTML = "Please enter subject";
        document.getElementById('button_bottom_error').innerHTML = "Error !! Subject is not entered by you.";
        setTimeout(() => {
          // document.getElementById('subject_error').innerHTML = "";
          document.getElementById('button_bottom_error').innerHTML = "";
        }, 5000);
        return false;
      }else if(CKEDITOR.instances.message.getData() == ""){
        document.getElementById('message_error').innerHTML = "Please enter message";
        document.getElementById('button_bottom_error').innerHTML = "Error !! Message is not entered by you.";
        setTimeout(() => {
          document.getElementById('message_error').innerHTML = "";
          document.getElementById('button_bottom_error').innerHTML = "";
        }, 5000);
        return false;
      }
    }else{
      if(document.getElementById('event').value == "Select Event"){
        document.getElementById('event_error').innerHTML = "Please select a event";
        document.getElementById('button_bottom_error').innerHTML = "Error !! Event is not selected by you.";
        setTimeout(() => {
          // document.getElementById('event_error').innerHTML = "";
          document.getElementById('button_bottom_error').innerHTML = "";
        }, 5000);
        return false;
      }else if(document.getElementById('eventUserOption').value == ""){
        document.getElementById('eventUsers_error').innerHTML = "Please select atleast one user";
        document.getElementById('button_bottom_error').innerHTML = "Error !! User is not selected by you.";
        setTimeout(() => {
          // document.getElementById('courseUsers_error').innerHTML = "";
          document.getElementById('button_bottom_error').innerHTML = "";
        }, 5000);
        return false;
      }else if(document.getElementById('subject').value == ""){
        document.getElementById('subject_error').innerHTML = "Please enter subject";
        document.getElementById('button_bottom_error').innerHTML = "Error !! Subject is not entered by you.";
        setTimeout(() => {
          // document.getElementById('subject_error').innerHTML = "";
          document.getElementById('button_bottom_error').innerHTML = "";
        }, 5000);
        return false;
      }else if(CKEDITOR.instances.message.getData() == ""){
        document.getElementById('message_error').innerHTML = "Please enter message";
        document.getElementById('button_bottom_error').innerHTML = "Error !! Message is not entered by you.";
        setTimeout(() => {
          document.getElementById('message_error').innerHTML = "";
          document.getElementById('button_bottom_error').innerHTML = "";
        }, 5000);
        return false;
      }
    }
  }
  function radioBtnFunction(){
    if(document.getElementById('courseRadioBtn').checked) {
      document.getElementById('courseSec').style.display = "block";
      document.getElementById('eventSec').style.display = "none";
      document.getElementById('eventUser').style.display = "none";
      document.getElementById('subMess').style.display = "block";
    }else if(document.getElementById('eventRadioBtn').checked) {
      document.getElementById('courseSec').style.display = "none";
      document.getElementById('eventSec').style.display = "block";
      document.getElementById('courseUser').style.display = "none";
      document.getElementById('subMess').style.display = "block";
    }
  }
  function getCourseId(){
    document.getElementById('course_error').innerHTML = "";
  var courseId = document.getElementById('course').value;
  if(courseId){
    document.getElementById('courseUser').style.display = "block";
  }
    var token = '<?php echo csrf_token() ?>';
    // alert(token);
    $.ajax({
        type:"POST",
        url:"{{url('admin/sentCourseId')}}",
        data: {courseId:courseId,_token:token},
        success:function(data) {
          // console.log(data);
          $('#courseUserOption').html(data);
          $('.multiselect-dropdown').hide();
          MultiselectDropdown();
        }
    });
  }
  function getEventId(){
    document.getElementById('event_error').innerHTML = "";
    var eventId = document.getElementById('event').value;
    if(eventId){
      document.getElementById('eventUser').style.display = "block";
    }
      var token = '<?php echo csrf_token() ?>';
      // alert(token);
      $.ajax({
          type:"POST",
          url:"{{url('admin/sentEventId')}}",
          data: {eventId:eventId,_token:token},
          success:function(data) {
            // console.log(data);
            $('#eventUserOption').html(data);
            $('.multiselect-dropdown').hide();
            MultiselectDropdown();
          }
      });
    }
</script>