  @include('backend.include.header')
  @include('backend.include.sidebar')
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Testimonials</h1>
            <nav>
               <div class="row">
                  <div class="col-sm-9">
                  <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item">Testimonials</li>
                  </ol>
                  </div>
                  <div class="col-sm-3" style="text-align:right;">
                  <a href="{{ url('admin/addtestimonials') }}"><button type="button" class="btn btn-primary" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i> Add Testimonials</button></a>
                  </div>
               </div>
            </nav>
         </div>
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Testimonials</h5>
                        <table class="table datatable" id="example1">
                           <thead>
                              <tr>
                                 <th scope="col">Id</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Designation</th>
                                 <th scope="col">Message</th>
                                 <th scope="col">Company Logo</th>
                                 <th scope="col">Profile Image</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @if(Session::has('message'))
                           <p class="alert alert-success">{{ Session::get('message') }}</p>
                           @endif
                           @foreach($testimonial as $key=>$testimonials)
                              <tr>
                                 <td>{{ ++$key }}</td>
                                 <td>{{ $testimonials->name }}</td>
                                 <td title="{!!$testimonials->destination!!}">{!! Str::limit($testimonials->destination,20) !!}</td>
                                 <td title="{!!$testimonials->about!!}">{!! Str::limit($testimonials->about,20) !!}</td>
                                 <td><img src="{{ url('assets/testimonial_img/brand_img/'.$testimonials->brand_image)}}" alt="Course Image" height="50" width="100"></td>
                                 <td><img src="{{ url('assets/testimonial_img/profile_img/'.$testimonials->profile_img)}}" alt="Course Image" height="50" width="100"></td>
                                 <td>
                                 <a href="{{ url('admin/testimonial_edit_view', [$testimonials->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                                 <a href="{{ url('admin/delete_testimonial', [$testimonials->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
      <script>
      function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
      }
      </script>
  @include('backend.include.footer')  