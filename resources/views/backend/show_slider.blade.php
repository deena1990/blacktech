
@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <!-- <h1>Add / Show Sliders</h1> -->
         <nav>
            <div class="row">
                  <div class="col-sm-9"><h1>Add / Show Sliders</h1>
                  <!-- <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item">Add / Show Sliders</li>
                  </ol> -->
                  </div>
                  <div class="col-sm-3" style="text-align:right;">
                  <a><button type="button" id="add_sliders" class="btn btn-primary" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i>  Add Slider</button></a>
                  </div>
            </div>
         </nav>
       </div>
       <section class="section">
          <div class="row">
             <div class="col-lg-12">
                <div class="card">
                   <div class="card-body table-responsive">
                      <h5 class="card-title">Show Sliders</h5>
                      <table class="table datatable" id="example1" style="width:100%">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Heading</th>
                               <th scope="col">About</th>
                               <th scope="col">Image</th>
                               <th scope="col">Button Name</th>
                               <th scope="col">Button Link</th>
                               <th scope="col">Action</th>
                               <th scope="col">Status</th>
                            </tr>
                         </thead>
                         <tbody>
                           @if(Session::has('message'))
                           <p class="alert alert-success">{{ Session::get('message') }}</p>
                           @endif
                           @foreach($slider as $key=>$sliders)
                           <tr>
                           <td>{{ ++$key }}</td>
                           <td title="{{ $sliders->heading }}">{{ Str::limit($sliders->heading,20) }}</td>
                           <td title="{!! $sliders->about !!}">{!! Str::limit($sliders->about,30) !!}</td>
                           <td><img src="{{ url('assets/upload_slider/'.$sliders->image)}}" alt="Course Image" height="80" width="100"></td>
                           <td title="{{ $sliders->btn_name }}">{{ Str::limit($sliders->btn_name,20) }}</td>
                           <td title="{{ $sliders->btn_link }}">{{ Str::limit($sliders->btn_link,20) }}</td>
                           <td>
                              <a href="{{ url('admin/edt_sliderv', [$sliders->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/del_slider', [$sliders->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
                           </td>
                           <td>
                           <?php if($sliders->status == 1){ ?> 
                             
                                <a href="{{url('admin/slider_change_status',$sliders->id)}}" onclick="return confirm('Are you sure to Inactive Status?');" class="btn btn-success">Active</a>

                                <?php }if($sliders->status == 0){ ?> 

                                <a href="{{url('admin/slider_change_status',$sliders->id)}}" onclick="return confirm('Are you sure to Active Status?');" class="btn btn-danger">Inactive</a>

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
       <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <span class="close">&times;</span>
         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Slider</h5>

              <!-- Horizontal Form -->
              <form action="{{ url('admin/insert_slider') }}" method="post" enctype="multipart/form-data" id="course_form">
                @csrf
                <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif -->
                <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg" required>
                    <span style="color: red;font-size: 13px;">( <b>Note :</b> Image Dimensions must be 1349 x 600 px )</span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="heading" class="col-sm-2 col-form-label">Heading</label>
                  <div class="col-sm-10">
                    <input type="text" name="heading" oninput="wordCount2()" maxlength="50" size="50" class="form-control" id="heading" required>
                    <label>Enter Only <span class="text-danger"><b>50</b></span> Words:</label>
                    <label class="text-success" id="headingCount"></label>
                    <span class="text-danger" id="heading_error"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-sm-2 col-form-label">About</label>
                  <div class="col-sm-10">
                  <textarea class="ckeditor form-control content_text" id="txtarea" oninput="wordCount()" maxlength="700" size="700" rows="8" cols="45" name="about" rows="5" required></textarea>
                  <label>Enter Only <span class="text-danger"><b>700</b></span> Words : </label>
                  <label class="text-success" id="showCount"></label>
                  <span class="text-danger" id="txtarea_error"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="btn_name" class="col-sm-2 col-form-label">Button Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="btn_name" class="form-control" id="btn_name" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="btn_link" class="col-sm-2 col-form-label">Button Link</label>
                  <div class="col-sm-10">
                    <input type="text" name="btn_link" class="form-control" id="btn_link" required>
                  </div>
                </div>

                <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
               
                </div>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

      </div>
      <!-- End Modal content -->
   </div>
    </main>
    <!-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->
   <script>
   function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
   }
   </script>
   <script>
   var modal = document.getElementById("myModal");
   var btn = document.getElementById("add_sliders");
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

<script type="text/javascript">
 function wordCount() {
 var text = document.getElementById("txtarea").value;
 var count = 0;
 var trim = text.trim(' ');
 for (var i = 0; i < trim.length; i++) {
  if (trim[i] != "") {
   count ++;
  }
 }
 document.getElementById("showCount").innerHTML = count;
 if(count==700)
 {
   document.getElementById("txtarea_error").innerHTML = "Limit Exceeded!";
   $('#txtarea_error').fadeOut(8000);

 }
}

function wordCount2() {
 var text = document.getElementById("heading").value;
 var count = 0;
 var trim = text.trim(' ');
 for (var i = 0; i < trim.length; i++) {
  if (trim[i] != "") {
   count ++;
  }
 }
 document.getElementById("headingCount").innerHTML = count;
 if(count==50)
 {
   document.getElementById("heading_error").innerHTML = "Limit Exceeded!";
   $('#heading_error').fadeOut(8000);

 }
}
</script> 
@include('backend.include.footer')
