@include('backend.include.header')
  @include('backend.include.sidebar')  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Faqs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Faqs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Faqs</h5>
              </form>
              <form action="{{ url('admin/edt_faq') }}" method="post" enctype="multipart/form-data" >
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif -->

                  @foreach($faq as $faqs)
                  <div class="row mb-3">
                     <label for="name" class="col-sm-2 col-form-label">Question</label>
                     <div class="col-sm-10">
                        <input type="hidden" name="course_id" value="{{$faqs->course_id}}">
                        <input type="hidden" name="faq_id" value="{{ $faqs->id }}">
                        <input type="text" value="{{ $faqs->question }}" name="question" class="form-control" id="name" required>
                        <span class="text-danger" id="team_name"></span>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="role" class="col-sm-2 col-form-label">Answer</label>
                     <div class="col-sm-10">
                        <textarea name="answer" class="form-control" id="role" required>{{ $faqs->answer }}</textarea>
                        <span class="text-danger" id="team_role"></span>
                     </div>
                  </div>
                  @endforeach
                  <div class="row">
                     <div class="col-sm-2"></div>
                     <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Update">
                     </div>
                  </div>
               </form>

            </div>
          </div>

          

        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <!-- End #main -->
  
  @include('backend.include.footer')
  <!-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->
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
 var text = document.getElementById("heading").value;
 var count = 0;
 var trim = text.trim(' ');
 for (var i = 0; i < trim.length; i++) {
  if (trim[i] != "") {
   count ++;
  }
 }
 document.getElementById("headingCount").innerHTML = count;
}
</script>
