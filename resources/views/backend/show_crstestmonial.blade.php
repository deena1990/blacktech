@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show Speaker</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9"> <h1>Course Testimonials</h1></div>
            <div class="col-sm-3" style="text-align:right;">
               <a><button type="button" class="btn btn-primary" id="add_speakers" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i> Add Testimonial</button></a>
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Course Testimonials</h5>
                  <table class="table" id="example1" style="width:100%">
                     <thead>
                        <tr>
                           <th scope="col">Id</th>
                           <!-- <th scope="col">Course Name</th> -->
                           <th scope="col">Name</th>
                           <th scope="col">Designation</th>
                           <th scope="col">Message</th>
                           <th scope="col">Company logo</th>
                           <th scope="col">Profile Img</th>
                           <th scope="col">Action</th>
                           <th scope="col">Status</th>
                        </tr>
                     </thead>
                     <tbody>
                           @if(Session::has('message'))
                           <p class="alert alert-success">{{ Session::get('message') }}</p>
                           @endif
                           @foreach($crstestmonial as $key=>$crstestmonials)
                              <tr>
                                 <td>{{ ++$key }}</td>
                                 <!-- <td>{{ $crstestmonials->course_id }}</td> -->
                                 <td>{{ $crstestmonials->name }}</td>
                                 <td title="{!!$crstestmonials->destination!!}">{!! Str::limit($crstestmonials->destination,20) !!}</td>
                                 <td title="{!!$crstestmonials->about!!}">{!! Str::limit($crstestmonials->about,20) !!}</td>
                                 <td><img src="{{ url('assets/testimonial_img/brand_img/'.$crstestmonials->brand_image)}}" alt="Course Image" height="50" width="100"></td>
                                 <td><img src="{{ url('assets/testimonial_img/profile_img/'.$crstestmonials->profile_img)}}" alt="Course Image" height="50" width="100"></td>
                                 <td>
                                 <a href="{{ url('admin/edt_crstestmonialv', [$crstestmonials->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                                 <a href="{{ url('admin/del_crstestmonial', [$crstestmonials->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
                                 </td>
                                 <td>
                                 <?php if($crstestmonials->status == 1){ ?> 
                                  <a href="{{url('admin/crstestmonial_chng_stus',$crstestmonials->id)}}" class="btn btn-success">Active</a>

                                  <?php }if($crstestmonials->status == 0){ ?> 

                                  <a href="{{url('admin/crstestmonial_chng_stus',$crstestmonials->id)}}" class="btn btn-danger">Inactive</a>

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
   <!-- ADD EVENTS Modal -->
   <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <span class="close">&times;</span>
         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Course Testimonial</h5>
              <form action="{{ url('/admin/insert_curtestimonial') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="hidden" value="{{session('courseID')}}">
                  <input type="text" name="name" oninput="wordCount()" class="form-control" maxlength="50" placeholder="Name" id="name" required>
                  <!-- <span class="text-danger" id="headingCount"></span> -->
                </div>
              </div>

              <div class="row mb-3">
                <label for="designation" class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                  <input type="text" name="destination" oninput="wordCount2()" maxlength="50" class="form-control" placeholder="Designation" id="designation" required>
                  <!-- <span class="text-danger" id="DesignationCount"></span> -->
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                <textarea class=" form-control content_text" oninput="wordCount3()" name="about" rows="5" maxlength="150" size="150" id="about" placeholder="About Testimonial" required></textarea>
                <!-- <span id="DesignationMsg"></span>   -->
              </div>
              </div>
              
              <div class="row mb-3">
                <label for="brand_image" class="col-sm-2 col-form-label">Company logo</label>
                <div class="col-sm-10">
                  <input type="file" name="brand_image" class="form-control" id="brand_image" placeholder="Brand Image" id="inputText" accept=".jpeg, .jpg, .png" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="profile_img" class="col-sm-2 col-form-label">Profile Image</label>
                <div class="col-sm-10">
                  <input type="file" name="profile_img" id="profile_img" class="form-control" placeholder="Profile Image" id="inputText" accept=".jpeg, .jpg, .png" required>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
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
   var btn = document.getElementById("add_speakers");
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
function wordCount() {
 var text = document.getElementById("name").value;
 var count = 0;
 var trim = text.trim(' ');
 for (var i = 0; i < trim.length; i++) {
  if (trim[i] != "") {
   count ++;
  }
 }
 document.getElementById("headingCount").innerHTML = count;
}

function wordCount2() {
 var text = document.getElementById("designation").value;
 var count = 0;
 var trim = text.trim(' ');
 for (var i = 0; i < trim.length; i++) {
  if (trim[i] != "") {
   count ++;
  }
 }
 document.getElementById("DesignationCount").innerHTML = count;
}
function wordCount3() {
 var text = document.getElementById("about").value;
 var count = 0;
 var trim = text.trim(' ');
 for (var i = 0; i < trim.length; i++) {
  if (trim[i] != "") {
   count ++;
  }
 }
 document.getElementById("DesignationMsg").innerHTML = count;
}
</script>
@include('backend.include.footer')