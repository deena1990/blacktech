@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Leading Companies</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Edit Leading Companies</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Edit Leading Companies</h5>
            @if(Session::has('message'))
              <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ url('admin/edit_ldingcompns') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif -->
                  @foreach($ldingcompns as $ldingcompn)
                  <div class="col-md-12">
                    <input type="hidden" name="ldingcompns_id" value="{{$ldingcompn->id}}">
                     <label for="image" class="form-label">Upload Image</label>
                     <input type="file"  name="new_image" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg">
                     <input type="hidden" value="{{$ldingcompn->image}}"  name="image" class="form-control" id="image">
                     <img src="{{ url('assets/upload_stpartners/'.$ldingcompn->image)}}" width="120" height="80">
                  </div>
                  <div class="col-md-12">
                     <label for="name" class="form-label">Name</label>
                     <input type="text" value="{{$ldingcompn->name }}"  name="name" class="form-control" id="name" required>
                  </div>
                  @endforeach
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