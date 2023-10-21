@include('backend.include.header')
  @include('backend.include.sidebar')  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Course Terms & Privacy</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Course Terms & Privacy</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Course Terms & Privacy</h5>

              <!-- Horizontal Form -->
              <form action="{{ url('admin/save_course_terms_privacy') }}"  onsubmit="return validate_slider();" method="post" enctype="multipart/form-data" id="course_form">
                @csrf
                @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                
                
                <input type="hidden" id="course_terms_privacy_id" name="course_terms_privacy_id" value="{{ $course_terms_privacy->id }}">
                

                <div class="row mb-3">
                  <label for="terms_heading" class="col-sm-2 col-form-label">Terms Heading</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $course_terms_privacy->term_use_heading }}" name="terms_heading" class="form-control" id="terms_heading" >
                    <span class="text-danger" id="terms_heading_error"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="terms_description" class="col-sm-2 col-form-label">Terms Description</label>
                  <div class="col-sm-10">
                    <textarea class="ckeditor form-control content_text" id="terms_description" rows="8" cols="45" name="terms_description"><?php echo $course_terms_privacy->term_use_description; ?></textarea>
                    <span class="text-danger" id="terms_description_error"></span>  
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="refund_heading" class="col-sm-2 col-form-label">Refund Heading</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $course_terms_privacy->refund_heading }}" name="refund_heading" class="form-control" id="refund_heading" >
                    <span class="text-danger" id="refund_heading_error"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="refund_description" class="col-sm-2 col-form-label">Refund Description</label>
                  <div class="col-sm-10">
                    <textarea class="ckeditor form-control content_text" id="refund_description" rows="5" cols="45" name="refund_description"><?php echo $course_terms_privacy->refund_description; ?></textarea>
                    <span class="text-danger" id="refund_description_error"></span>  
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="rescheduling_heading" class="col-sm-2 col-form-label">Rescheduling Heading</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $course_terms_privacy->rescheduling_heading }}" name="rescheduling_heading" class="form-control" id="rescheduling_heading" >
                    <span class="text-danger" id="rescheduling_heading_error"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="rescheduling_description" class="col-sm-2 col-form-label">Rescheduling Description</label>
                  <div class="col-sm-10">
                    <textarea class="ckeditor form-control content_text" id="rescheduling_description" rows="5" cols="45" name="rescheduling_description"><?php echo $course_terms_privacy->rescheduling_description; ?></textarea>
                    <span class="text-danger" id="rescheduling_description_error"></span>  
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="privacy_heading" class="col-sm-2 col-form-label">Privacy Heading</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $course_terms_privacy->privacy_heading }}" name="privacy_heading" class="form-control" id="privacy_heading" >
                    <span class="text-danger" id="privacy_heading_error"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="privacy_description" class="col-sm-2 col-form-label">Privacy Description</label>
                  <div class="col-sm-10">
                    <textarea class="ckeditor form-control content_text" id="privacy_description" rows="5" cols="45" name="privacy_description"><?php echo $course_terms_privacy->privacy_description; ?></textarea>
                    <span class="text-danger" id="privacy_description_error"></span>  
                  </div>
                </div>
                
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

  </main><!-- End #main -->
  <!-- End #main -->
  
  @include('backend.include.footer')
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
          $('.ckeditor').ckeditor();
      });
  </script>
 <script type="text/javascript">
   function validate_slider()
   {  
   var terms_heading = document.getElementById('terms_heading').value;
   var terms_description = CKEDITOR.instances.terms_description.getData();
   var refund_heading = document.getElementById('refund_heading').value;
   var refund_description = CKEDITOR.instances.refund_description.getData();
   var rescheduling_heading = document.getElementById('rescheduling_heading').value;
   var rescheduling_description = CKEDITOR.instances.rescheduling_description.getData();
   var privacy_heading = document.getElementById('privacy_heading').value;
   var privacy_description = CKEDITOR.instances.privacy_description.getData();
      if(terms_heading == ""){
        document.getElementById('terms_heading_error').innerHTML ="Enter Terms Heading";
        document.getElementById('terms_description_error').innerHTML ="";
        document.getElementById('refund_heading_error').innerHTML ="";
        document.getElementById('refund_description_error').innerHTML ="";
        document.getElementById('rescheduling_heading_error').innerHTML ="";
        document.getElementById('rescheduling_description_error').innerHTML ="";
        document.getElementById('privacy_heading_error').innerHTML ="";
        document.getElementById('privacy_description_error').innerHTML ="";
        $(window).scrollTop($('#terms_heading_error').position().top);
        return false;
      }
      else if(terms_description == ""){
        document.getElementById('terms_heading_error').innerHTML ="";
        document.getElementById('terms_description_error').innerHTML ="Enter Terms Description";
        document.getElementById('refund_heading_error').innerHTML ="";
        document.getElementById('refund_description_error').innerHTML ="";
        document.getElementById('rescheduling_heading_error').innerHTML ="";
        document.getElementById('rescheduling_description_error').innerHTML ="";
        document.getElementById('privacy_heading_error').innerHTML ="";
        document.getElementById('privacy_description_error').innerHTML ="";
        $(window).scrollTop($('#terms_description_error').position().top);
        return false;
      }
      else if(refund_heading == ""){
        document.getElementById('terms_heading_error').innerHTML ="";
        document.getElementById('terms_description_error').innerHTML ="";
        document.getElementById('refund_heading_error').innerHTML ="Enter Refund Heading";
        document.getElementById('refund_description_error').innerHTML ="";
        document.getElementById('rescheduling_heading_error').innerHTML ="";
        document.getElementById('rescheduling_description_error').innerHTML ="";
        document.getElementById('privacy_heading_error').innerHTML ="";
        document.getElementById('privacy_description_error').innerHTML ="";
        $(window).scrollTop($('#refund_heading_error').position().top);
        return false;
      }
      else if(refund_description == ""){
        document.getElementById('terms_heading_error').innerHTML ="";
        document.getElementById('terms_description_error').innerHTML ="";
        document.getElementById('refund_heading_error').innerHTML ="";
        document.getElementById('refund_description_error').innerHTML ="Enter Refund Description";
        document.getElementById('rescheduling_heading_error').innerHTML ="";
        document.getElementById('rescheduling_description_error').innerHTML ="";
        document.getElementById('privacy_heading_error').innerHTML ="";
        document.getElementById('privacy_description_error').innerHTML ="";
        $(window).scrollTop($('#refund_description_error').position().top);
        return false;
      }
      else if(rescheduling_heading == ""){
        document.getElementById('terms_heading_error').innerHTML ="";
        document.getElementById('terms_description_error').innerHTML ="";
        document.getElementById('refund_heading_error').innerHTML ="";
        document.getElementById('refund_description_error').innerHTML ="";
        document.getElementById('rescheduling_heading_error').innerHTML ="Enter Rescheduling Heading";
        document.getElementById('rescheduling_description_error').innerHTML ="";
        document.getElementById('privacy_heading_error').innerHTML ="";
        document.getElementById('privacy_description_error').innerHTML ="";
        $(window).scrollTop($('#rescheduling_heading_error').position().top);
        return false;
      }
      else if(rescheduling_description == ""){
        document.getElementById('terms_heading_error').innerHTML ="";
        document.getElementById('terms_description_error').innerHTML ="";
        document.getElementById('refund_heading_error').innerHTML ="";
        document.getElementById('refund_description_error').innerHTML ="";
        document.getElementById('rescheduling_heading_error').innerHTML ="";
        document.getElementById('rescheduling_description_error').innerHTML ="Enter Rescheduling Description";
        document.getElementById('privacy_heading_error').innerHTML ="";
        document.getElementById('privacy_description_error').innerHTML ="";
        $(window).scrollTop($('#rescheduling_description_error').position().top);
        return false;
      }
      else if(privacy_heading == ""){
        document.getElementById('terms_heading_error').innerHTML ="";
        document.getElementById('terms_description_error').innerHTML ="";
        document.getElementById('refund_heading_error').innerHTML ="";
        document.getElementById('refund_description_error').innerHTML ="";
        document.getElementById('rescheduling_heading_error').innerHTML ="";
        document.getElementById('rescheduling_description_error').innerHTML ="";
        document.getElementById('privacy_heading_error').innerHTML ="Enter Privacy Heading";
        document.getElementById('privacy_description_error').innerHTML ="";
        $(window).scrollTop($('#privacy_heading_error').position().top);
        return false;
      }
      else if(privacy_description == ""){
        document.getElementById('terms_heading_error').innerHTML ="";
        document.getElementById('terms_description_error').innerHTML ="";
        document.getElementById('refund_heading_error').innerHTML ="";
        document.getElementById('refund_description_error').innerHTML ="";
        document.getElementById('rescheduling_heading_error').innerHTML ="";
        document.getElementById('rescheduling_description_error').innerHTML ="";
        document.getElementById('privacy_heading_error').innerHTML ="";
        document.getElementById('privacy_description_error').innerHTML ="Enter Privacy Description";
        $(window).scrollTop($('#privacy_description_error').position().top);
        return false;
      }
   }
</script>

