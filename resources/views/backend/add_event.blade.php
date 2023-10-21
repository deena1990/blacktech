@include('backend.include.header')
  @include('backend.include.sidebar')  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Event</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Add Event</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Event</h5>

              <!-- Horizontal Form -->
              <!-- Multi Columns Form -->
              <form action="{{ url('admin/insert_event') }}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif

                <div class="col-md-12">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="file"  name="image" class="form-control" id="image">
                </div>

                <div class="col-md-6">
                  <label for="name" class="form-label">Event Name</label>
                  <input type="text"  name="name" class="form-control" id="name">
                </div>

                <div class="col-md-6">
                  <label for="event_wblink" class="form-label">Event Weblink</label>
                  <input type="text" name="event_wblink" class="form-control" id="event_wblink">
                </div>

                <div class="col-md-6">
                  <label for="event_date" class="form-label">Event Date</label>
                  <input type="date" name="event_date" class="form-control" id="event_date">
                </div>
           
                <div class="col-md-6">
                  <label for="event_time" class="form-label">Event Time</label>
                  <input type="time" name="event_time" class="form-control" id="event_time">
                </div> 

                <div class="col-md-12">
                  <label for="about_event" class="form-label">About Event</label>
                  <textarea class="ckeditor form-control content_text" name="about_event" rows="2"></textarea>
                </div>

               
                <div class="text-center">
                   <button type="submit" class="btn btn-primary">Submit</button>
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
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
          $('.ckeditor').ckeditor();
      });
  </script>