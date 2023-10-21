@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Career Road Map</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Edit Career Road Map</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Edit Career Road Map</h5>

            <form action="{{ url('admin/edt_careermapsv') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success" id="alert">{{ Session::get('message') }}</p>
                  @endif -->
                  <div class="col-md-12">
                     <label for="name" class="form-label">Title</label>
                     <input type="text"  name="status" class="form-control" id="name" value="{{$careermap->status}}" required>
                  </div>
                  <div class="col-md-12">
                    <input type="hidden" value="{{$careermap->id}}" name="careermapid">
                     <label for="image" class="form-label">Upload Image</label>
                     <input type="file"  name="image" class="form-control" id="image" accept=".jpeg, .jpg, .png">
                     <input type="hidden" value="{{$careermap->image}}" name="preimg">
                     <div><img src="{{ url('assets/course_img/'.$careermap->image)}}" id="new_team" alt="Career Road Map Image" height="100" width="20%"></div>
                    
                     <!-- <img src="{{url('assets/course_img')}}/{{$careermap->image}}" alt=""> -->
                  </div>
                 
                  <div class="col-md-12">
                     <label for="name" class="form-label">Content</label>
                     <input type="text"  name="name" class="form-control" id="name" value="{{$careermap->title}}" required>
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