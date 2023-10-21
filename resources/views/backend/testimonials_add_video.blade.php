@include('backend.include.header')

@include('backend.include.sidebar')



<main id="main" class="main">



  <div class="pagetitle">

    <h1>Add Testimonials Video</h1>

    <nav>

      <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>

        <li class="breadcrumb-item">Add Testimonials Video</li>

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

            <form action="{{ url('/admin/insert_testimonial_video') }}" method="post" enctype="multipart/form-data">

              @csrf

              <div class="row mb-3">

                <label for="testimonial_video" class="col-sm-2 col-form-label">Upload Video</label>

                <div class="col-sm-10">

                  <input type="file" name="testimonial_video" class="form-control" oninput="return field_validation();" placeholder="Testimonials Video" id="testimonial_video" accept="video/mp4,video/x-m4v,video/*">

                </div>

              </div>
              <!-- <pre id="infos"></pre> -->
              <div class="row">

                <div class="col-sm-2"></div>

                <div class="col-sm-10">
                <b><span class="text-danger" id="video_error"></span></b><span class="text-danger" id="video_error1"></span>

                </div>

              </div>
              <div class="row mb-3 text-center">

                <h3> <b>OR</b> </h3> 

              </div>
              
              <div class="row mb-3">

                <label for="testimonials_video_url" class="col-sm-2 col-form-label">Video URL</label>

                <div class="col-sm-10">

                  <input type="text" name="testimonials_video_url" class="form-control" placeholder="Testimonial Video URL" id="testimonials_video_url">

                </div>

              </div>
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
  <?php if(isset($_GET['error'])){ ?>
                setTimeout(() => {
                  window.location.href='<?php echo url('/admin/testimonials_add_video'); ?>'
                }, 6000);
                <?php }?> 

</script>

<script>
  function field_validation(){
    var video_size = ((document.getElementById('testimonial_video').files[0].size)/1024)/1024;
    if (video_size > 40){
      $('#video_error').text('Error !! ');
      $('#video_error1').text('video size should be less than 40 MB.');
      return false;
    }else{
      $('#video_error').text('');
    }
  }
</script>

<!-- <script>
  var myVideos = [];

  window.URL = window.URL || window.webkitURL;

  document.getElementById('testimonial_video').onchange = setFileInfo;

  function setFileInfo() {
    var files = this.files;
    myVideos.push(files[0]);
    var video = document.createElement('video');
    video.preload = 'metadata';

    video.onloadedmetadata = function() {
      window.URL.revokeObjectURL(video.src);
      var duration = video.duration;
      myVideos[myVideos.length - 1].duration = duration;
      updateInfos();
    }

    video.src = URL.createObjectURL(files[0]);;
  }


  function updateInfos() {
    var infos = document.getElementById('infos');
    infos.textContent = "";
    for (var i = 0; i < myVideos.length; i++) {
      infos.textContent += " duration: " + myVideos[i].duration + '\n';
    }
  }
</script> -->

@include('backend.include.footer')