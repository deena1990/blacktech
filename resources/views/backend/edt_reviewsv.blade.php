@include('backend.include.header')
  @include('backend.include.sidebar')  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Reviews</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Reviews</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Reviews</h5>

              <!-- Horizontal Form -->
              <form action="{{ url('admin/edt_reviews') }}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif -->
               
                @foreach($reviews as $reviews)
                <div class="col-md-12">
                  <input type="hidden" value="{{ $reviews->id }}" name="reviews_id" id="reviews_id">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="hidden" value="{{ $reviews->image }}"  name="image" class="form-control" id="image">
                  <input type="file" name="new_image" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg">
                  <div><img src="{{ url('assets/upload_aboutus/'.$reviews->image)}}" alt="Reviews Image" height="100" width="20%"></div>
                </div>

                <div class="col-md-12">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" value="{{ $reviews->name }}" name="name" class="form-control" id="name" required>
                </div>
                
                <div class="col-md-6">
                  <label for="rating" class="form-label">Star Rating</label>
                  <input type="text" value="{{ $reviews->rating }}" name="rating" class="form-control" autocomplete="off" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" id="rating" required>
                </div>

                <div class="col-md-6">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" value="{{ $reviews->title}}" name="title" class="form-control" id="title" required>
                </div>


                <div class="col-md-12">
                  <label for="designation" class="form-label">Designation</label>
                  <input type="text" value="{{ $reviews->designation }}" name="designation" class="form-control" id="designation" required>
                </div>
           
                <div class="col-md-12">
                  <label for="brief_description" class="form-label">Brief Description</label>
                  <textarea class="ckeditor form-control content_text" name="brief_description" rows="5" required>{{ $reviews->brief_description}}</textarea>
                </div>

               @endforeach
                <div class="text-center">
                   <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            <!-- End Horizontal Form -->

            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <!-- End #main -->
  
  @include('backend.include.footer')