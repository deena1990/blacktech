@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show Speaker</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9"> <h1>Add / Show Speakers</h1></div>
            <div class="col-sm-3" style="text-align:right;">
               <a><button type="button" class="btn btn-primary" id="add_speakers" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i> Add Speaker</button></a>
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show Speakers</h5>
                  <table class="table datatable" id="example1" style="width:100%">
                     <thead>
                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col">Image</th>
                           <th scope="col">Name</th>
                           <th scope="col">Job Title</th>
                           <th scope="col">Company</th>
                           <th scope="col">Brief Description</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($speaker as $key=>$speakers)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/upload_speakers/'.$speakers->image)}}" alt="Speakers Image" height="80" width="100"></td>
                           <td>{{ $speakers->speaker_name }}</td>
                           <td>{{ $speakers->job_title }}</td>
                           <td>{{ $speakers->company }}</td>
                           <td>{!! Str::limit($speakers->brief_description,100)!!}</td>
                           <td>
                              <a href="{{ url('admin/edit_speakersv', [$speakers->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/del_speakers', [$speakers->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
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
              <h5 class="card-title">Add Speakers</h5>
              <!-- Multi Columns Form -->
              <form action="{{ url('admin/insert_speakers') }}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif -->

                <div class="col-md-12">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="file"  name="image" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg" required>
                </div>

                <div class="col-md-6">
                  <label for="speaker_name" class="form-label">Name</label>
                  <input type="text"  name="speaker_name" class="form-control" id="speaker_name" oninput="paragragh1()" maxlength="50" required>
                  <label>Enter Only <span class="text-danger"><b>50</b></span> Words:</label>
                  <label class="text-success" id="nameCount"></label>
                  <span class="text-danger" id="name_error"></span>
                </div>

                <div class="col-md-6">
                  <label for="job_title" class="form-label">Job Title</label>
                  <input type="text" name="job_title" class="form-control" id="job_title" oninput="paragragh2()" maxlength="70" required>
                  <label>Enter Only <span class="text-danger"><b>70</b></span> Words:</label>
                  <label class="text-success" id="titleCount"></label>
                  <span class="text-danger" id="title_error"></span>
                </div>

                <div class="col-md-12">
                  <label for="company" class="form-label">Company</label>
                  <input type="text" name="company" class="form-control" id="company" oninput="paragragh3()" maxlength="50" required>
                  <label>Enter Only <span class="text-danger"><b>50</b></span> Words:</label>
                  <label class="text-success" id="companyCount"></label>
                  <span class="text-danger" id="company_error"></span>
                </div>
           
                <div class="col-md-12">
                  <label for="brief_description" class="form-label">Brief Description</label>
                  <textarea class="ckeditor form-control content_text" name="brief_description" oninput="paragragh()" maxlength="700" size="700" rows="8" cols="45" id="brief_description" required></textarea>
                  <label>Enter Only <span class="text-danger"><b>700</b></span> Words : </label>
                  <label class="text-success" id="showCount"></label>
                  <span class="text-danger" id="description_error"></span>
                </div>

                <div class="text-center">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>

      </div>
      <!-- End Modal content -->
   </div>
   <!-- ADD EVENTS Modal End-->

   
</main>
<script type="text/javascript">
   function paragragh() {
      // alert();
   var text = document.getElementById("brief_description").value;
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
      document.getElementById("description_error").innerHTML = "Limit Exceeded!";
      $('#description_error').fadeOut(8000);
   }
   }
   function paragragh1() {
      // alert();
   var text = document.getElementById("speaker_name").value;
   var count = 0;
   var trim = text.trim(' ');
   for (var i = 0; i < trim.length; i++) {
   if (trim[i] != "") {
      count ++;
   }
   }
   document.getElementById("nameCount").innerHTML = count;
   if(count==50)
   {
      document.getElementById("name_error").innerHTML = "Limit Exceeded!";
      $('#name_error').fadeOut(8000);
   }
   }

   function paragragh2() {
      // alert();
   var text = document.getElementById("job_title").value;
   var count = 0;
   var trim = text.trim(' ');
   for (var i = 0; i < trim.length; i++) {
   if (trim[i] != "") {
      count ++;
   }
   }
   document.getElementById("titleCount").innerHTML = count;
   if(count==70)
   {
      document.getElementById("title_error").innerHTML = "Limit Exceeded!";
      $('#title_error').fadeOut(8000);
   }
   }

   function paragragh3() {
      // alert();
   var text = document.getElementById("company").value;
   var count = 0;
   var trim = text.trim(' ');
   for (var i = 0; i < trim.length; i++) {
   if (trim[i] != "") {
      count ++;
   }
   }
   document.getElementById("companyCount").innerHTML = count;
   if(count==50)
   {
      document.getElementById("company_error").innerHTML = "Limit Exceeded!";
      $('#company_error').fadeOut(8000);
   }
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
@include('backend.include.footer')