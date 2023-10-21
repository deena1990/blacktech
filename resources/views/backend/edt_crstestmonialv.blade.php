@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Course Testimonial</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Edit Course Testimonial</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Course Testimonial</h5>
            <!-- @if(Session::has('message'))
              <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif -->
            <!-- Horizontal Form -->
            <form action="{{ url('/admin/edt_crstestmonial') }}" method="post" enctype="multipart/form-data">
              @csrf
              
              @foreach($crstestmonial as $crstestmonials)
              <input type="hidden" name="testimonial_id" value="{{ session('courseID') }}">
              <input type="hidden" name="testimonials_id" value="{{ $crstestmonials->id }}">
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" oninput="wordCount()" id="name" maxlength="50" class="form-control" value="{{ $crstestmonials->name }}" placeholder="Name" required>
                  <!-- <span class="text-danger" id="headingCount"></sapn> -->
                </div>
              </div>

              <div class="row mb-3">
                <label for="designation" class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                  <input type="text" name="destination" oninput="wordCount2()" maxlength="50" value="{{ $crstestmonials->destination}}" class="form-control" placeholder="Designation" id="designation" required>
                  <!-- <span class="text-danger" id="DesignationCount"></span> -->
                </div>
              </div>

              <div class="row mb-3">
                <label for="about" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                <textarea class="form-control content_text" oninput="wordCount3()" id="about" maxlength="150" size="150" name="about" rows="5" placeholder="About Testimonial" required>{{ $crstestmonials->about}}</textarea>
                <!-- <span class="text-danger" id="DesignationMsg"></span>    -->
              </div>
              </div>
              
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Brand Image</label>
                <div class="col-sm-10">
                  <input type="hidden" name="brand_previous" value="{{ $crstestmonials->brand_image }}" class="form-control">
                  <input type="file" name="brand_image" class="form-control" placeholder="Brand Image" accept=".jpeg, .jpg, .png">
                  <img src="{{ url('assets/testimonial_img/brand_img/'.$crstestmonials->brand_image)}}" alt="Brand Image" id="brand_image" height="50" width="111">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Image</label>
                <div class="col-sm-10">
                  <input type="hidden" name="profile_previous" value="{{ $crstestmonials->profile_img }}" class="form-control">
                  <input type="file" name="profile_img" class="form-control" placeholder="Profile Image"  accept=".jpeg, .jpg, .png">
                  <img src="{{ url('assets/testimonial_img/profile_img/'.$crstestmonials->profile_img)}}" id="profile_img" alt="Profile Image" height="50" width="111">
                </div>
              </div>
              @endforeach
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
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