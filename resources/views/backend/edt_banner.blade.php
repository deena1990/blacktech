@include('backend.include.header')
@include('backend.include.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Banners</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Banners</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center"></h5>
            @if(Session::has('message'))
              <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <span style="color: red;font-size: 13px;"><b>*** Note :</b> Banner Image Dimensions must be 1349 x 400 px. </span>
            <form action="{{ url('admin/edit_banners') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif -->
                  <div class="row col-md-6 mb-5 mt-5">
                      <label for="image0" class="col-sm-4 col-form-label fw-bold">Courses Banner</label>
                      <div class="col-md-8">
                        <input type="hidden" name="banner_id" value="{{$banners->id}}">
                        <input type="file" name="new_image0" class="form-control" id="image0" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[0]}}" name="image0" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[0])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="row col-md-6 mb-5 mt-5">
                      <label for="image1" class="col-sm-4 col-form-label fw-bold">About Us Banner</label>
                      <div class="col-md-8">
                        <input type="file" name="new_image1" class="form-control" id="image1" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[1]}}" name="image1" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[1])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="row col-md-6 mb-5">
                      <label for="image2" class="col-sm-4 col-form-label fw-bold">Events Banner</label>
                      <div class="col-md-8">
                        <input type="file" name="new_image2" class="form-control" id="image2" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[2]}}" name="image2" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[2])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="row col-md-6 mb-5">
                      <label for="image3" class="col-sm-4 col-form-label fw-bold">Testimonials Banner</label>
                      <div class="col-md-8">
                        <input type="file" name="new_image3" class="form-control" id="image3" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[3]}}" name="image3" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[3])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="row col-md-6 mb-5">
                      <label for="image4" class="col-sm-4 col-form-label fw-bold">Hire Our Alumni Banner</label>
                      <div class="col-md-8">
                        <input type="file" name="new_image4" class="form-control" id="image4" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[4]}}" name="image4" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[4])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="row col-md-6 mb-5">
                      <label for="image5" class="col-sm-4 col-form-label fw-bold">Contact Us Banner</label>
                      <div class="col-md-8">
                        <input type="file" name="new_image5" class="form-control" id="image5" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[5]}}" name="image5" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[5])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="row col-md-6 mb-5">
                      <label for="image6" class="col-sm-4 col-form-label fw-bold">Refer a Friend Banner</label>
                      <div class="col-md-8">
                        <input type="file" name="new_image6" class="form-control" id="image6" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[6]}}" name="image6" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[6])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="row col-md-6 mb-5">
                      <label for="image9" class="col-sm-4 col-form-label fw-bold">Apply Banner</label>
                      <div class="col-md-8">
                        <input type="file" name="new_image9" class="form-control" id="image9" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[9]}}" name="image9" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[9])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="row col-md-6 mb-5">
                      <label for="image7" class="col-sm-4 col-form-label fw-bold">Community Banner</label>
                      <div class="col-md-8">
                        <input type="file" name="new_image7" class="form-control" id="image7" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[7]}}" name="image7" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[7])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="row col-md-6 mb-5">
                      <label for="image8" class="col-sm-4 col-form-label fw-bold">Community Why Join Image</label>
                      <div class="col-md-8">
                        <input type="file" name="new_image8" class="form-control" id="image8" accept="image/png, image/jpg, image/jpeg">
                        <input type="hidden" value="{{explode(':::',$banners->status)[8]}}" name="image8" class="form-control">
                        <div><img src="{{ url('assets/upload_aboutus/'.explode(':::',$banners->status)[8])}}" width="120" height="80"></div>
                      </div>
                  </div>
                  <div class="text-center mb-5">
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