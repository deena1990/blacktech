@include('backend.include.header')
@include('backend.include.sidebar')  
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Add Lecture</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Lecture</h5>

            <!-- Horizontal Form -->
            <form action="{{ url('admin/insert_lecture') }}" method="post" enctype="multipart/form-data">
              @csrf
              @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
              @endif
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Course Title</label>
                <div class="col-sm-10">
                  <input type="text" name="course_title" class="form-control" id="inputText">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input type="file" name="image" class="form-control" id="inputEmail">
                </div>
              </div>
              
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">No Of Seats</label>
                <div class="col-sm-10">
                  <input type="text" name="no_of_seats" class="form-control" id="inputText">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">About Course</label>
                <div class="col-sm-10">
                <textarea class="ckeditor form-control content_text" name="about_course" rows="5"></textarea>
                  <!-- <input type="text" name="about_course" class="form-control" id="inputText"> -->
                </div>
              </div>


              <!-- <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword">
                </div>
              </div>
              -->
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

</main><!-- End #main -->
<!-- End #main -->

@include('backend.include.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>


