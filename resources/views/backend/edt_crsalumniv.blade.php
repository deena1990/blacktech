@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Alumni Experience Video</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Edit Alumni Experience Video</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Alumni Experience Video</h5>
           
            <!-- Horizontal Form -->
            <form action="{{ url('/admin/edt_crsalumni') }}" method="post" enctype="multipart/form-data">
              @csrf
              @if(Session::has('message'))
              <p class="alert alert-success">{{ Session::get('message') }}</p>
              @endif
              @foreach($crsalumni as $crsalumnis)
              <input type="hidden" name="editvdo_id" value="{{ $crsalumnis->id }}">
              <input type="hidden" name="editc_id" value="{{ session('courseID') }}">
              <div class="row mb-3">
                <label for="testimonials_video" class="col-sm-2 col-form-label">Upload Video</label>
                <div class="col-sm-10">
                  <input type="hidden" name="previous_vdo" value="{{ $crsalumnis->testimonial_video }}" class="form-control">
                  <input type="file" name="new_vdo" class="form-control" placeholder="Testimonials Video" id="testimonials_video">
                  <video height="100" width="200" controls>
                    <source src="{{ url('assets/testimonial_video/'.$crsalumnis->testimonial_video)}}" type="video/mp4" >
                  </video>
                  <!-- <div>{{ $crsalumnis->testimonial_video}}</div> -->
                </div>
              </div>
              @endforeach
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
<!-- End #main -->
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@include('backend.include.footer')