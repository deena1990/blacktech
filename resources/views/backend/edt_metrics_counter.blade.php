@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Metrics Counter</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Metrics Counter</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Edit Metrics Counter</h5>

            <form action="{{ url('admin/insert_metrics_counter') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success" id="alert">{{ Session::get('message') }}</p>
                  @endif -->
                  <div class="col-md-12">
                    <input type="hidden" value="{{$metrics_counter->id}}" name="metrics_counter_id">
                     <label for="image" class="form-label">Upload Image</label>
                     <input type="file"  name="image" class="form-control" id="image" accept=".jpeg, .jpg, .png">
                     <input type="hidden" value="{{$metrics_counter->image}}" name="preimg">
                     <div><img src="{{ url('assets/course_img/'.$metrics_counter->image)}}" id="new_team" alt="Counter Image" height="100" width="20%"></div>
                    
                  </div>
                  <div class="col-md-12">
                     <label for="name" class="form-label">Name</label>
                     <input type="text"  name="name" class="form-control" id="name" value="{{$metrics_counter->name}}" required>
                  </div>
                  <div class="col-md-12">
                     <label for="count" class="form-label">Count</label>
                     <input type="text"  name="count" class="form-control" id="count" value="{{$metrics_counter->count}}" required>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main>
@include('backend.include.footer')