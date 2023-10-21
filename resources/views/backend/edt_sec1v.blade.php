@include('backend.include.header')
  @include('backend.include.sidebar')  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit About US Section 1</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit About US Section 1</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit About US Section 1</h5>

              <!-- Horizontal Form -->
              <form action="{{ url('admin/save_edt_sec1v') }}"  onsubmit="return validate_slider();" method="post" enctype="multipart/form-data" id="course_form">
                @csrf
                @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                
                
                <input type="hidden" id="ausec1_id" name="ausec1_id" value="{{ $ausec1->id }}">
                <div class="row mb-3">
                  <label for="image1" class="col-sm-2 col-form-label">Image1</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="image1" value="{{ $ausec1->image1 }}" class="form-control">
                    <input type="file" name="new_ausec1_image1" class="form-control" accept=".jpeg, .jpg, .png">
                    <span style="color: red;font-size: 13px;">( <b>Note :</b> Image Dimensions must be 570.94 x 400 px )</span>
                    <div><img src="{{ url('assets/upload_aboutus/'.$ausec1->image1)}}" alt="ausec1 Image1" height="300" width="100%"></div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="image2" class="col-sm-2 col-form-label">Image2</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="image2" value="{{ $ausec1->image2 }}">
                    <input type="file" name="new_ausec1_image2" class="form-control" accept=".jpeg, .jpg, .png">
                    <span style="color: red;font-size: 13px;">( <b>Note :</b> Image Dimensions must be 570.94 x 400 px )</span>
                    <div><img src="{{ url('assets/upload_aboutus/'.$ausec1->image2)}}" alt="ausec1 Image2" height="300" width="100%"></div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="title" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text"  value="{{ $ausec1->title }}" name="title" oninput="wordCount2()" maxlength="50" size="50" class="form-control" id="title" >
                    <label>Enter Only <span class="text-danger"><b>50</b></span> Words:</label>
                    <label id="titleCount"></label>
                    <span class="text-danger" id="title_error"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="description" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                  <textarea class="ckeditor form-control content_text" id="txtarea" oninput="wordCount()" maxlength="700" size="700" rows="8" cols="45" name="description" rows="5"><?php echo $ausec1->description; ?></textarea>
                  <label>Enter Only <span class="text-danger"><b>700</b></span> Words : </label>
                  <label id="showCount"></label>
                  <span class="text-danger" id="txtarea_error"></span>  
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
}

function wordCount2() {
 var text = document.getElementById("title").value;
 var count = 0;
 var trim = text.trim(' ');
 for (var i = 0; i < trim.length; i++) {
  if (trim[i] != "") {
   count ++;
  }
 }
 document.getElementById("titleCount").innerHTML = count;
}
</script>
 <script type="text/javascript">
   function validate_slider()
   {
      function fun() {  
      document.getElementById('title_error').innerHTML ="";
      }
      function fun2() {  
      document.getElementById('txtarea_error').innerHTML ="";
      }  
   var title = document.getElementById('title').value;
   var txtarea = document.getElementById('txtarea').value;
   var alphabet = "[(a-zA-Z)+(\!\@\#\$\%\^\&\*\(\))+]";
      if(!title.match(alphabet)){
        document.getElementById('title_error').innerHTML ="Enter Only Alphabet";
        title = setTimeout(fun, 1000);
        return false;
      }
      if(!txtarea.match(alphabet)){
        document.getElementById('txtarea_error').innerHTML ="Enter Only Alphabet";
        txtarea = setTimeout(fun2, 1000);
        return false;
      }
   //alert(title);
   }
</script>

