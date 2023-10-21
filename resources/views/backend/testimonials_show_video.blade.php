@include('backend.include.header')

@include('backend.include.sidebar')

    <main id="main" class="main">

       <div class="pagetitle">

          <h1>Show Testimonials Video</h1>

          <nav>

          <div class="row">

                  <div class="col-sm-9">

                  <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>

                  <li class="breadcrumb-item">Show Testimonials Video</li>

                  </ol>

                  </div>

                  <div class="col-sm-3" style="text-align:right;">

                  <a href="{{ url('admin/testimonials_add_video') }}"><button type="button" class="btn btn-primary" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i>  Add Testimonials Video</button></a>

                  </div>

            </div>

            </nav>

       </div>

       <section class="section">

          <div class="row">

             <div class="col-lg-12">

                <div class="card">

                   <div class="card-body table-responsive">

                      <h5 class="card-title">Show Testimonials Video</h5>

                      @if(Session::has('message'))

                        <p class="alert alert-success">{{ Session::get('message') }}</p>

                      @endif

                      <table class="table datatable" id="example1">

                         <thead>

                            <tr>

                               <th scope="col">Id</th>

                               <th scope="col">Video</th>

                               <th scope="col">Video URL</th>

                               <th scope="col">Status</th>

                               <th scope="col">Action</th>

                            </tr>

                         </thead>

                         <tbody>

                            @foreach($tvideo as $key=>$tvideos)

                           <tr>

                            <td>{{ ++$key }}</td>
                            <td>
                              <?php if($tvideos->testimonial_video == "no file upload"){ ?>
                              No Video
                              <?php }else{ ?>
                              <video height="100" width="200" controls>
                                 <source src="{{ url('assets/testimonial_video/'.$tvideos->testimonial_video)}}" type="video/mp4">
                              </video>
                              <?php } ?>
                            </td>
                            <td>
                              <?php if($tvideos->testimonial_video_url == "no video url"){ ?>
                              No URL
                              <?php }else{ ?>
                              <a href="{{ $tvideos->testimonial_video_url }}">URL</a>
                              <?php } ?>
                           </td>
                            <td>
                              <?php if($tvideos->status == 1){ ?> 
                              <a href="{{url('admin/tvdo_change_status',$tvideos->id)}}" onclick="return confirm('Are you sure to Inactive Status?');" class="btn btn-success">Active</a>
                              <?php }if($tvideos->status == 0){ ?>
                              <a href="{{url('admin/tvdo_change_status',$tvideos->id)}}" onclick="return confirm('Are you sure to Active Status?');" class="btn btn-danger">Inactive</a>
                              <?php } ?>
                            </td>
                            <td>
                            <a href="{{ url('admin/tstimonials_editvdo_view',[$tvideos->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;

                            <a href="{{ url('admin/testimonials_del_video', [$tvideos->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>

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