@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Speakers</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Edit Speakers</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Edit Speakers</h5>

            <form action="{{ url('admin/edit_speakers') }}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif -->

                @foreach($speaker as $speakers)
                <div class="col-md-12">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="hidden" name="speaker_id" value="{{ $speakers->id }}">
                  <input type="hidden" name="image" value="{{ $speakers->image }}">
                  <input type="file"  name="nimage" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg">
                  <div><img src="{{ url('assets/upload_speakers/'.$speakers->image)}}" width="10%" height="80"></div>
                </div>

                <div class="col-md-6">
                  <label for="speaker_name" class="form-label">Name</label>
                  <input type="text" value="{{ $speakers->speaker_name }}"  name="speaker_name" class="form-control" id="speaker_name" oninput="paragragh1()" maxlength="50" required>
                  <label>Enter Only <span class="text-danger"><b>50</b></span> Words:</label>
                  <label class="text-success" id="nameCount">{{ strlen($speakers->speaker_name) }}</label>
                  <span class="text-danger" id="name_error"></span>
                </div>

                <div class="col-md-6">
                  <label for="job_title" class="form-label">Job Title</label>
                  <input type="text" value="{{ $speakers->job_title }}" name="job_title" class="form-control" id="job_title" oninput="paragragh2()" maxlength="70" required>
                  <label>Enter Only <span class="text-danger"><b>70</b></span> Words:</label>
                  <label class="text-success" id="titleCount">{{ strlen($speakers->job_title) }}</label>
                  <span class="text-danger" id="title_error"></span>
                </div>

                <div class="col-md-12">
                  <label for="company" class="form-label">Company</label>
                  <input type="text" value="{{ $speakers->company }}" name="company" class="form-control" id="company" oninput="paragragh3()" maxlength="50" required>
                  <label>Enter Only <span class="text-danger"><b>50</b></span> Words:</label>
                  <label class="text-success" id="companyCount">{{ strlen($speakers->company) }}</label>
                  <span class="text-danger" id="company_error"></span>
                </div>
           
                <div class="col-md-12">
                  <label for="brief_description" class="form-label">Brief Description</label>
                  <textarea class="ckeditor form-control content_text" name="brief_description" oninput="paragragh()" maxlength="700" size="700" rows="8" cols="45" id="brief_description" required>{{ $speakers->brief_description }}</textarea>
                  <label>Enter Only <span class="text-danger"><b>700</b></span> Words : </label>
                  <label class="text-success" id="showCount">{{ strlen($speakers->brief_description) }}</label>
                  <span class="text-danger" id="description_error"></span>
                </div>
                 
                @endforeach
                <div class="text-center">
                   <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>

          </div>
        </div>

      </div>
    </div>
  </section>

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
@include('backend.include.footer')