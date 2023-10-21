@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Hiring and Strategic Partners</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Edit Hiring and Strategic Partners</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Edit Hiring and Strategic Partners</h5>
            <!-- @if(Session::has('message'))
              <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif -->
            <form action="{{ url('admin/edit_stpartners') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif -->
                  @foreach($stpartners as $stpartner)
                  <div class="col-md-12">
                    <input type="hidden" name="stpartners_id" value="{{$stpartner->id}}">
                     <label for="image" class="form-label">Upload Image</label>
                     <input type="file"  name="new_image" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg">
                     <input type="hidden" value="{{$stpartner->image}}" name="image" class="form-control">
                     <div><img src="{{ url('assets/upload_stpartners/'.$stpartner->image)}}" width="120" height="80"></div>
                  </div>
                  <div class="col-md-12">
                     <label for="name" class="form-label">Name</label>
                     <input type="text" value="{{$stpartner->name }}"  name="name" class="form-control" id="name" required>
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
@include('backend.include.footer')