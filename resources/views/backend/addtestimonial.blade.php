@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Testimonials</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Add Testimonials</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Testimonials</h5>
            <!-- @if(Session::has('message'))
              <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif -->
            <!-- Horizontal Form -->
            <form action="{{ url('/admin/insert_testimonial') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
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
                <label for="inputEmail3" class="col-sm-2 col-form-label">Company logo</label>
                <div class="col-sm-10">
                  <input type="file" name="brand_image" class="form-control" id="brand_image" placeholder="Brand Image" id="inputText" accept=".jpeg, .jpg, .png" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Image</label>
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
            </form><!-- End Horizontal Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main>
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