@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Forbes Section</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Forbes Section</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center"></h5>
            @if(Session::has('message'))
              <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ url('admin/edit_forbes_section') }}" method="post" onsubmit="return validation();" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif -->
                  <div class="row col-md-12 mt-5">
                      <label for="file" class="col-sm-3 col-form-label fw-bold">Upload Image/Video</label>
                      <div class="col-md-9">
                        <input type="hidden" name="forbes_section_id" value="{{$forbes_section->id}}">
                        <input type="file" name="file" class="form-control" id="file" accept="video/*, image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{ $forbes_section->file }}" name="pre_file">
                        <div class="mt-3">
                          <?php if (str_contains($forbes_section->file, '.jpg') || str_contains($forbes_section->file, '.png') || str_contains($forbes_section->file, '.jpeg')) { ?>
                          <img src="{{ url('assets/upload_aboutus/'.$forbes_section->file)}}" width="250" height="150">
                          <?php }else{ ?>
                          <video height="100" width="200" controls>
                              <source src="{{ url('assets/upload_aboutus/'.$forbes_section->file)}}" type="video/*">
                          </video>
                          <?php } ?>  
                        </div>
                      </div>
                  </div>
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-right">Content</label>
                    <div class="col-sm-9">
                      <textarea class="ckeditor form-control content_text" id="txtarea" onclick="wordCount()" maxlength="700" size="700" rows="8" cols="45" name="content"><?= $forbes_section->content ?></textarea>
                      <label>Enter Only <span class="text-danger"><b>700</b></span> Words : </label>
                      <label class="text-success" id="showCount">{{ strlen($forbes_section->content) }}</label>
                      <span class="text-danger" id="txtarea_error"></span>
                      <br>  
                      <span class="text-danger" id="ckeditor_error"></span>  
                    </div>
                </div>
                  <div class="text-center mb-5">
                     <button type="submit" class="btn btn-primary">Update</button>
                  </div>
               </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main>
@include('backend.include.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script>
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
  function validation(){
    var content = CKEDITOR.instances.txtarea.getData();
    if(content == ""){
      document.getElementById("ckeditor_error").innerHTML = "Please enter Content";
      $('#ckeditor_error').fadeOut(8000);
      return false;
    }
  }
</script>