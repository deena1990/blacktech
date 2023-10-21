@include('backend.include.header')
  @include('backend.include.sidebar')  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Instructor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Instructor</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Instructor</h5>

              <!-- Horizontal Form -->
              <form action="{{ url('admin/edt_instructure') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif -->

                @foreach($instructure as $instructures)
                <input type="hidden" id="instructure_id" name="instructure_id" value="{{ $instructures->id }}">
                <div class="row mb-3">
                  <label for="new_team" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="pre_img" value="{{ $instructures->image }}" class="form-control">
                    <input type="file" name="new" class="form-control" accept=".jpeg, .jpg, .png">
                    <div><img src="{{ url('assets/course_img/'.$instructures->image)}}" id="new_team" alt="Instructor Image" height="100" width="20%"></div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{ $instructures->name }}" class="form-control" id="name" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="role" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                  <input type="text" name="role" value="{{ $instructures->role }}" class="form-control" id="role" required>
                  </div>
                </div>
                @endforeach
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