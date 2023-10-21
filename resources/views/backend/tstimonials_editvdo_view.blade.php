@include('backend.include.header')

@include('backend.include.sidebar')



<main id="main" class="main">



  <div class="pagetitle">

    <h1>Update Testimonials Video</h1>

    <nav>

      <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>

        <li class="breadcrumb-item">Update Testimonials Video</li>

      </ol>

    </nav>

  </div><!-- End Page Title -->

  <section class="section">

    <div class="row">

      <div class="col-lg-12">



        <div class="card">

          <div class="card-body">

            <h5 class="card-title">Testimonials Video</h5>

            @if(Session::has('message'))

              <p class="alert alert-success">{{ Session::get('message') }}</p>

            @endif

            <!-- Horizontal Form -->

            <form action="{{ url('/admin/tstimonials_editvdo') }}" method="post" enctype="multipart/form-data">

              @csrf

             

              @foreach($editvdo as $editvdos)

              <input type="hidden" name="editvdo_id" class="editvdo_id" value="{{ $editvdos->id }}">

              <div class="row mb-3">

                <label for="testimonials_video" class="col-sm-2 col-form-label">Upload Video</label>

                <div class="col-sm-10">

                  <input type="hidden" name="previous_vdo" value="{{ $editvdos->testimonial_video }}" class="form-control">

                  <input type="file" name="new_vdo" class="form-control" placeholder="Testimonials Video" id="testimonials_video">

                  <video height="100" width="200" controls>

                    <source src="{{ url('assets/testimonial_video/'.$editvdos->testimonial_video)}}" type="video/mp4" >

                  </video>

                  <!-- <div>{{ $editvdos->testimonial_video}}</div> -->

                </div>

              </div>
              <div class="row mb-3 text-center">

                <h3> <b>OR</b> </h3> 

              </div>
              
              <div class="row mb-3">

                <label for="testimonials_video_url" class="col-sm-2 col-form-label">Video URL</label>

                <div class="col-sm-10">

                  <input type="text" name="testimonials_video_url" class="form-control" placeholder="Testimonial Video URL" id="testimonials_video_url" value="{{ $editvdos->testimonial_video_url }}">

                </div>

              </div>

              @endforeach

              
              <div class="row">

                <div class="col-sm-2"></div>

                <div class="col-sm-10">

                <?php if(isset($_GET['error'])){ ?>
                <p class="text-danger">Please upload a video OR enter video link OR Both if you have</p>
                <?php }?> 

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

<!-- End #main -->

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">

    $(document).ready(function () {

        $('.ckeditor').ckeditor();

    });

</script>
<script>
  <?php if(isset($_GET['error'])){ $url=$_SERVER['REQUEST_URI'];
    $a=str_replace('/blacktech','',str_replace('?error=error','',$url));
  ?>
    setTimeout(() => {
      window.location.href='<?php echo url($a); ?>'
    }, 6000);
  <?php }?> 

</script>

@include('backend.include.footer')