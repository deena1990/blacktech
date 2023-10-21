@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Refer Friend</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Refer Friend</li>
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
            <form action="{{ url('admin/edt_refer_friend') }}" method="post" onsubmit="return validation();" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-right">Content</label>
                    <div class="col-sm-9">
                      <textarea class="ckeditor form-control content_text" id="txtarea" rows="8" cols="45" name="banner_content"><?= $refer_friend->banner_content ?></textarea>
                    </div>
                  </div>
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-right">Icon 1</label>
                    <div class="col-sm-9">
                      <input type="file" name="icon1" class="form-control" id="icon1" accept="image/png, image/jpg, image/jpeg">
                      <input type="hidden" value="{{ $refer_friend->icon1 }}" name="pre_file1">
                      <img src="{{ url('assets/upload_aboutus/'.$refer_friend->icon1 )}}" width="120" height="80">
                    </div>
                  </div>
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-right">Icon 1 Description</label>
                    <div class="col-sm-9">
                      <textarea class="ckeditor form-control content_text" id="txtarea" rows="8" cols="45" name="icon1description"><?= $refer_friend->icon1description ?></textarea>
                    </div>
                  </div>
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-right">Icon 2</label>
                    <div class="col-sm-9">
                      <input type="file" name="icon2" class="form-control" id="icon2" accept="image/png, image/jpg, image/jpeg">
                      <input type="hidden" value="{{ $refer_friend->icon2 }}" name="pre_file2">
                      <img src="{{ url('assets/upload_aboutus/'.$refer_friend->icon2 )}}" width="120" height="80">
                    </div>
                  </div>
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-right">Icon 2 Description</label>
                    <div class="col-sm-9">
                      <textarea class="ckeditor form-control content_text" id="txtarea" rows="8" cols="45" name="icon2description"><?= $refer_friend->icon2description ?></textarea>
                    </div>
                  </div>
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-right">Icon 3</label>
                    <div class="col-sm-9">
                      <input type="file" name="icon3" class="form-control" id="icon3" accept="image/png, image/jpg, image/jpeg">
                      <input type="hidden" value="{{ $refer_friend->icon3 }}" name="pre_file3">
                      <img src="{{ url('assets/upload_aboutus/'.$refer_friend->icon3 )}}" width="120" height="80">
                    </div>
                  </div>
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-right">Icon 3 Description</label>
                    <div class="col-sm-9">
                      <textarea class="ckeditor form-control content_text" id="txtarea" rows="8" cols="45" name="icon3description"><?= $refer_friend->icon3description ?></textarea>
                    </div>
                  </div>
                  <div class="row col-md-12 mt-5">
                    <label for="txtarea" class="col-sm-3 col-form-label fw-bold text-right">Description</label>
                    <div class="col-sm-9">
                      <textarea class="ckeditor form-control content_text" id="txtarea" rows="8" cols="45" name="description"><?= $refer_friend->description ?></textarea>
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