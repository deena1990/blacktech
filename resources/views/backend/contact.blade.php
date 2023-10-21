@include('backend.include.header')
@include('backend.include.sidebar')
<!-- ======= Main Section Start ======= -->
<main id="main" class="main">
   <div class="pagetitle">
      <h1>Contact Info Update</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Contact Info Update</li>
         </ol>
      </nav>
   </div>
   <section class="section contact">
      <div class="row gy-4">
         <div class="col-xl-12">
            <div class="card p-4">
               <form action="{{ url('admin/insert_ftr_cnt') }}" onsubmit="return validate_slider();" method="post" enctype="multipart/form-data">
                  @csrf
                  @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif
                  <div class="row mb-3">
                     <label for="logo" class="col-sm-2 col-form-label">Upload Logo</label>
                     <div class="col-sm-10">
                        <input type="hidden" name="contact_update_id" value="{{$content->id}}">
                        <input type="hidden" name="image" value="{{ $content->logo }}" class="form-control" id="image">
                        <input type="file" name="logo" class="form-control" id="logo" accept=".jpeg, .jpg, .png">
                        <div><img src="{{url('assets/upload_logo/'.$content->logo)}}" alt="Image" width="30%" height="150"></div>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="email" class="col-sm-2 col-form-label">Email</label>
                     <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" value="{{$content->email}}" id="email" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                     <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" value="{{$content->phone}}" id="phone" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="linkedIn" class="col-sm-2 col-form-label">LinkedIn URL</label>
                     <div class="col-sm-10">
                        <input type="text" name="linkedIn" class="form-control" value="{{$content->linkedIn}}" id="linkedIn" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="twitter" class="col-sm-2 col-form-label">Twitter URL</label>
                     <div class="col-sm-10">
                        <input type="text" name="twitter" class="form-control" value="{{$content->twitter}}" id="twitter" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="facebook" class="col-sm-2 col-form-label">Facebook URL</label>
                     <div class="col-sm-10">
                        <input type="text" name="facebook" class="form-control" value="{{$content->facebook}}" id="facebook" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="instagram" class="col-sm-2 col-form-label">Instagram URL</label>
                     <div class="col-sm-10">
                        <input type="text" name="instagram" class="form-control" value="{{$content->instagram}}" id="instagram" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="spotlight" class="col-sm-2 col-form-label">Spotlight URL</label>
                     <div class="col-sm-10">
                        <input type="text" name="spotlight" class="form-control" value="{{explode(':::',$content->status)[3]}}" id="spotlight" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp Number</label>
                     <div class="col-sm-10">
                        <input type="text" name="whatsapp" class="form-control" value="{{explode(':::',$content->status)[0]}}" id="whatsapp" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="beginyourJourney" class="col-sm-2 col-form-label">Begin Your Journey</label>
                     <div class="col-sm-10">
                        <textarea class="ckeditor form-control content_text" id="beginyourJourney" name="beginyourJourney" rows="5"><?php echo $content->beginyourJourney; ?></textarea>
                        <span class="text-danger" id="beginyourJourney_error"></span>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="footer_heading" class="col-sm-2 col-form-label">Footer Heading</label>
                     <div class="col-sm-10">
                        <input type="text" name="footer_heading" class="form-control" value="{{explode(':::',$content->status)[1]}}" id="footer_heading" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="footer_content" class="col-sm-2 col-form-label">Footer Content</label>
                     <div class="col-sm-10">
                        <textarea class="ckeditor form-control content_text" id="footer_content" name="footer_content" rows="5"><?php echo explode(':::',$content->status)[2]; ?></textarea>
                        <span class="text-danger" id="footer_content_error"></span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-2"></div>
                     <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </div>
               </form>
               <!-- End Horizontal Form -->
            </div>
         </div>
      </div>
   </section>
</main>
<!-- ======= Main Section End ======= -->
<!-- <script>
   function validateForm()
   {
      alert('hi');
   }
   </script> -->
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
   var beginyourJourney = CKEDITOR.instances.beginyourJourney.getData();
   var footer_content = CKEDITOR.instances.footer_content.getData();
      if(beginyourJourney == ""){
        document.getElementById('beginyourJourney_error').innerHTML ="Enter Begin Your Journey";
        document.getElementById('footer_content_error').innerHTML ="";
        $(window).scrollTop($('#beginyourJourney_error').position().top);
        return false;
      }
      else if(footer_content == ""){
        document.getElementById('footer_content_error').innerHTML ="Enter Footer Content";
        document.getElementById('beginyourJourney_error').innerHTML ="";
        $(window).scrollTop($('#footer_content_error').position().top);
        return false;
      }
   }
</script>