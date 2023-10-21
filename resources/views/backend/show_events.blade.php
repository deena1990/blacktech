@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      
      <nav>
         <div class="row">
            <div class="col-sm-9"><h1>Add / Show Events</h1></div>
            <div class="col-sm-3" style="text-align:right;">
               <a><button type="button" class="btn btn-primary" id="add_events" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i>  ADD EVENTS</button></a>
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show Events</h5>
                  <table class="table datatable" id="example1" style="width:100%">
                     <thead>
                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col">Image</th>
                           <th scope="col">Event Name</th>
                           <th scope="col">About</th>
                           <th scope="col">Date</th>
                           <th scope="col">Time</th>
                           <th scope="col">Event Weblink</th>   
                           <!-- Code start by Deena Nath -->
                           <th scope="col">Total Speakers</th>   
                           <!-- Code end by Deena Nath -->
                           <th scope="col">Total Registraion</th>
                           <th scope="col">Action</th>
                           <th scope="col">Status</th>
                           <th scope="col">Event Reminder</th>

                        </tr>
                     </thead>
                     <tbody>
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($event as $key=>$events)
                        <?php
                        $speaker_count = count(explode(',',DB::table('tbl_event')->where('id',$events->id )->first()->event_speakers));
                        $event_users_count=DB::table('tbl_evnt_registered_users')->where('event_id',$events->id )->count();
                        ?>
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/upload_events/'.$events->image)}}" alt="Events Image" height="50" width="50"></td>
                           <td title="{!! $events->name !!}">{{ Str::limit($events->name,20) }}</td>
                           <td title="{!! $events->about_event !!}">{!! Str::limit($events->about_event,20) !!}</td>
                           <td>{{ $events->event_date }}</td>
                           <td><?php echo date("h:i:s" , strtotime($events->event_time) ) ?></td>
                           <td>{{ $events->event_wblink }}</td>
                           <!-- Code start by Deena Nath -->
                           <td>
                              <a href="{{ url('admin/event_speakers',[$events->id])}}" class="btn btn-success">{{$speaker_count}}</a>
                           </td>
                           
                           <!-- Code end by Deena Nath -->
                           <td>
                              <a href="{{ url('admin/evnt_registerd',[$events->id])}}" class="btn btn-success">{{$event_users_count}}</a>
                           </td>
                           <td>
                              <a href="{{ url('admin/edt_eventv', [$events->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/del_events', [$events->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
                           </td>
                           <td>
                                <?php if($events->status == 1){ ?> 
                             
                                <a href="{{url('admin/event_change_status',$events->id)}}" onclick="return confirm('Are you sure to Inactive Status?');" class="btn btn-success">Active</a>

                                <?php }if($events->status == 0){ ?> 

                                <a href="{{url('admin/event_change_status',$events->id)}}" onclick="return confirm('Are you sure to Active Status?');" class="btn btn-danger">Inactive</a>

                                <?php } ?>
                           </td>
                           <td>
                              <!-- <a href="{{ url('admin/send_event_reminder',[$events->id])}}" class="btn btn-success">Send</a> -->
                              <button id="add_events{{$events->id}}" onclick="return OpenModel({{$events->id}});" class="btn btn-success">Send</button>
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
   @foreach($event as $key=>$events)
   <!-- ADD EVENTS Modal -->
   <div id="myModal{{$events->id}}" class="modal">
   <!-- Modal content -->
   <div class="modal-content">
      <span class="close{{$events->id}}">&times;</span>
      <div class="card">
         <div class="card-body">
         <h5 class="card-title text-center">Send Event Reminder</h5>

         <!-- Horizontal Form -->
         <!-- Multi Columns Form -->
         <form action="{{ url('admin/send_event_reminder') }}" method="post" onsubmit="return evnt_reminder_validation();" enctype="multipart/form-data" class="row g-3">
            @csrf
            <input type="hidden" name="event_id" value="{{$events->id}}">
            <div class="col-md-12 text-center">
               <label class="form-label">Event Name : </label>
               <h5 class="card-title text-center d-inline">{{$events->name}}</h5>
            </div> 
            <div class="col-md-12">
               <label for="reminder_message" class="form-label">Reminder Message</label>
               <textarea class="form-control content_text" maxlength="700" oninput="wordCount1()" name="reminder_message" id="reminder_message" size="5" rows="5" required></textarea>
               <label>Enter Only <span class="text-danger"><b>700</b></span> Words : </label>
               <label id="showWordCount"></label>
               <span class="text-danger" id="reminder_message_error"></span>
               <span class="text-danger" id="reminder_message_error1"></span>
            </div>

            
            <div class="text-center">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
         
         <!-- End Horizontal Form -->

         </div>
      </div>

   </div>
   <!-- End Modal content -->
   </div>
   @endforeach
   <!-- ADD EVENTS Modal End-->
   <!-- ADD EVENTS Modal -->
   <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <span class="close">&times;</span>
         <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Add Event</h5>

              <!-- Horizontal Form -->
              <!-- Multi Columns Form -->
              <form action="{{ url('admin/insert_event') }}" method="post" onsubmit="return evnt_validation();" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-6">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="file" name="image" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg" required>
                </div>

                <div class="col-md-6">
                  <label for="name" class="form-label">Event Name</label>
                  <input type="text"  name="name" class="form-control" maxlength="70" id="name" required>
                  <span class="text-danger" id="name_error"></span>
                </div>
               <!-- Code start by Deena Nath -->
                <div class="col-md-6">
                  <label for="event_wblink" class="form-label">Event Weblink</label>
                  <input type="text" name="event_wblink" class="form-control" id="event_wblink" required>
                  <span class="text-danger" id="weblink_error"></span>
                </div>
                <div class="col-md-6">
                  <label for="event_speakers" class="form-label">Event Speakers</label>
                  <select name="event_speakers[]" class="form-control" id="event_speakers" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="" onclick="return selectSpeaker();">
                     @if(isset($speakers) && count($speakers) > 0)
                        @foreach($speakers as $speaker)
                        <option value="{{$speaker->id}}">{{$speaker->speaker_name}}</option>
                        @endforeach
                     @endif
                  </select>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6"><div id="error_msg" class="text-danger mt-2"></div></div>
               <!-- Code end by Deena Nath -->
                <div class="col-md-6">
                  <label for="date_picker" class="form-label">Event Date</label>
                  <input type="date" name="event_date" class="form-control" id="date_picker" min="<?php echo date('Y-m-d'); ?>" required>
                </div>
           
                <div class="col-md-6">
                  <label for="event_time" class="form-label">Event Time</label>
                  <input type="time" name="event_time" class="form-control" id="event_time" required>
                </div> 

                <div class="col-md-12">
                  <label for="about_event" class="form-label">About Event</label>
                  <textarea class="form-control content_text" maxlength="700" oninput="wordCount()" name="about_event" id="about_event" size="5" rows="5" id="about_event" required></textarea>
                  <label>Enter Only <span class="text-danger"><b>700</b></span> Words : </label>
                  <label id="showCount"></label>
                  <span class="text-danger" id="aboutevnt_error"></span>
                  <span id="aboutevnt_error1"></span>
                </div>

               
                <div class="text-center">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
             
              <!-- End Horizontal Form -->

            </div>
          </div>

      </div>
      <!-- End Modal content -->
   </div>
   <!-- ADD EVENTS Modal End-->
   
</main>
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
   var modal = document.getElementById("myModal");
   var btn = document.getElementById("add_events");
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
<script>
   function OpenModel(event_id){
      var modal = document.getElementById("myModal"+event_id);
      var btn = document.getElementById("add_events"+event_id);
      var span = document.getElementsByClassName("close"+event_id)[0];
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
   }
</script>
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
         document.getElementById("aboutevnt_error").innerHTML = count + ' /700 limit exceeded';
      }else{
         document.getElementById("aboutevnt_error1").innerHTML = count + '/700';
      }
   }

   function wordCount1() {
      var text = document.getElementById("reminder_message").value;
      var count = 0;
      var trim = text.trim(' ');
      for (var i = 0; i < trim.length; i++) {
         if (trim[i] != "") {
            count ++;
         }
      }
      if (count == 700){
         document.getElementById("reminder_message_error1").style.display = "none";
         document.getElementById("reminder_message_error").innerHTML = count + ' /700 limit exceeded';
      }else{
         document.getElementById("reminder_message_error1").innerHTML = count + '/700';
      }
   }
</script>
@include('backend.include.footer')