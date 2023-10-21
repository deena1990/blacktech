@include('backend.include.header')
  @include('backend.include.sidebar')  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Event</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Update Event</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Event</h5>

              <!-- Horizontal Form -->
              <!-- Multi Columns Form -->
              <form action="{{ url('admin/edt_event') }}" onsubmit="return evnt_validation();" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif

                @foreach($event as $events)
                <div class="col-md-6">
                  <input type="hidden" id="event_id" name="event_id" value="{{ $events->id }}">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="hidden" value="{{ $events->image }}" name="pre_event" class="form-control" id="image">
                  <input type="file"  name="new_event" class="form-control" accept="image/png, image/jpg, image/jpeg">
                  <div><img src="{{ url('assets/upload_events/'.$events->image)}}" alt="Event Image" height="100" width="20%"></div>
                </div>

                <div class="col-md-6">
                  <label for="name" class="form-label">Event Name</label>
                  <input type="text" value="{{ $events->name }}"  name="name" maxlength="70" class="form-control" id="name" required>
                  <span class="text-danger" id="name_error"></span>
                </div>

                <!-- Code start by Deena Nath -->

                <div class="col-md-6">
                  <label for="event_wblink" class="form-label">Event Weblink</label>
                  <input type="text" value="{{ $events->event_wblink }}" name="event_wblink" class="form-control" id="event_wblink" required>
                  <span class="text-danger" id="weblink_error"></span>
                </div>
                
              <div class="col-md-6">
                  <label for="event_speakers" class="form-label">Event Speakers</label>
                  <select checked name="event_speakers[]" class="form-control" id="event_speakers" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="" onclick="return selectSpeaker();">
                     @if(isset($speakers) && count($speakers) > 0)
                          @foreach($speakers as $speaker)
                            <option value="{{$speaker->id}}" <?php if(in_array($speaker->id,explode(',',$events->event_speakers))){echo "selected";} ?>>{{$speaker->speaker_name}}</option>
                          @endforeach 
                     @endif
                  </select>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6"><div id="error_msg" class="text-danger mt-2"></div></div>
                
               <!-- Code end by Deena Nath -->

                <div class="col-md-6">
                  <label for="event_date" class="form-label">Event Date</label>
                  <input type="date" value="{{ $events->event_date }}" name="event_date" id="date_picker" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="event_date" required>
                </div>
           
                <div class="col-md-6">
                  <label for="event_time" class="form-label">Event Time</label>
                  <input type="time" value="{{ $events->event_time }}" name="event_time" class="form-control" id="event_time" required>
                </div> 

                <div class="col-md-12">
                  <label for="about_event" class="form-label">About Event</label>
                  <textarea class="form-control content_text" oninput="wordCount()" maxlength="700" name="about_event" id="about_event" rows="5" required>{{ $events->about_event}}</textarea>
                  <label>Enter Only <span class="text-danger"><b>700</b></span> Words : </label>
                  <label id="showCount"></label>
                  <span class="text-danger" id="aboutevnt_error"></span>
                  <span id="aboutevnt_error1"></span>
                </div>

                @endforeach
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
<script>
   function selectSpeaker(){
      document.getElementById('error_msg').innerHTML = "";
   }
</script>
  <script type="text/javascript">
   function evnt_validation()
   {
      var event_speakers=document.getElementById('event_speakers').value;
      if(event_speakers == ""){
        document.getElementById('error_msg').innerHTML = "Plese Select Atleast One Speaker";
        return false;
      }
   }
</script> 
<script>
function wordCount() {
 var text = document.getElementById("about_event").value;
 var count = 0;
 var trim = text.trim(' ');
 for (var i = 0; i < trim.length; i++) {
  if (trim[i] != "") {
   count ++;
  }
 }
 if (count == 700){
 document.getElementById("aboutevnt_error1").style.display = "none";
 document.getElementById("aboutevnt_error").innerHTML = count + ' /700 limit exceeded.';
 }else{
 document.getElementById("aboutevnt_error1").innerHTML = count;
 }
}
</script> 