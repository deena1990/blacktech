@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Alumni Talent</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Edit Alumni Talent</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Edit Alumni Talent</h5>
            @if(Session::has('message'))
              <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ url('admin/edt_alumni_talent') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-6">
                     <label for="name" class="form-label">Name</label>
                     <input type="text"  name="name" value="{{$talent->talent_name}}" class="form-control" id="name" required>
                     <input type="hidden"  name="talent_id" value="{{$talent->id}}">
                  </div>
                  <div class="col-md-3">
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary">Update</button>
                  </div>
               </form>

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