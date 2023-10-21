@include('backend.include.header')
  @include('backend.include.sidebar')  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Slider</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Slider</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Slider</h5>

              <!-- Horizontal Form -->
              <form action="{{ url('admin/edt_slider') }}" method="post" enctype="multipart/form-data" id="course_form">
                @csrf
                @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                
                @foreach($slider as $sliders)
                <input type="hidden" id="slider_id" name="slider_id" value="{{ $sliders->id }}">
                <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="image" value="{{ $sliders->image }}" class="form-control">
                    <input type="file" name="new_slider" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg">
                    <span style="color: red;font-size: 13px;">( <b>Note :</b> Image Dimensions must be 1349 x 600 px )</span>
                    <div><img src="{{ url('assets/upload_slider/'.$sliders->image)}}" alt="Slider Image" height="80" width="120"></div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="heading" class="col-sm-2 col-form-label">Heading</label>
                  <div class="col-sm-10">
                    <input type="text"  value="{{ $sliders->heading }}" name="heading" oninput="wordCount2()" minlength="30" maxlength="50" size="50" class="form-control" id="heading" required>
                    <label>Enter Only <span class="text-danger"><b>50</b></span> Words:</label>
                    <label class="text-success" id="headingCount">{{ strlen($sliders->heading) }}</label>
                    <span class="text-danger" id="heading_error"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-sm-2 col-form-label">About</label>
                  <div class="col-sm-10">
                  <textarea class="ckeditor form-control content_text" id="txtarea" oninput="wordCount()" minlength="50" maxlength="700" size="700" rows="8" cols="45" name="about" rows="5" required><?php echo $sliders->about; ?></textarea>
                  <label>Enter Only <span class="text-danger"><b>700</b></span> Words : </label>
                  <label class="text-success" id="showCount">{{ strlen($sliders->about) }}</label>
                  <span class="text-danger" id="txtarea_error"></span>  
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="btn_name" class="col-sm-2 col-form-label">Button Name</label>
                  <div class="col-sm-10">
                    <input type="text"  value="{{ $sliders->btn_name }}" name="btn_name" class="form-control" id="btn_name" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="btn_link" class="col-sm-2 col-form-label">Button Link</label>
                  <div class="col-sm-10">
                    <input type="text"  value="{{ $sliders->btn_link }}" name="btn_link" class="form-control" id="btn_link" required>
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

  </main><!-- End #main -->
  <!-- End #main -->
  
  @include('backend.include.footer')
<script type="text/javascript">
 function wordCount() {
 var text = document.getElementById("txtarea").value;
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
   document.getElementById("txtarea_error").innerHTML = "Limit Exceeded!";
   $('#txtarea_error').fadeOut(8000);
 }
}

function wordCount2() {
 var text = document.getElementById("heading").value;
 var count = 0;
 var trim = text.trim(' ');
 for (var i = 0; i < trim.length; i++) {
  if (trim[i] != "") {
   count ++;
  }
 }
 document.getElementById("headingCount").innerHTML = count;
 if(count==50)
 {
   document.getElementById("heading_error").innerHTML = "Limit Exceeded!";
   $('#heading_error').fadeOut(8000);
 }
}
</script>

