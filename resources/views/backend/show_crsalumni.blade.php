@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show Speaker</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9"> <h1>Alumni Experience</h1></div>
            <div class="col-sm-3" style="text-align:right;">
               <a><button type="button" class="btn btn-primary" id="add_speakers" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i> Add Alumni</button></a>
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Alumni Experience</h5>
                  <table class="table" id="example1" style="width:100%">
                     <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <!-- <th scope="col">Course Name</th> -->
                            <th scope="col">Video</th>
                            <!-- <th scope="col">Video Name</th> -->
                            <!-- <th scope="col">Status</th> -->
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
                        </tr>
                     </thead>
                     <tbody>
                            @foreach($crsalumni as $key=>$crsalumnis)
                           <tr>
                            <td>{{ ++$key }}</td>
                            <!-- <td>{{ $crsalumnis->course_id }}</td> -->
                            <td>
                            <video height="80" width="150" controls>
                              <source src="{{ url('assets/testimonial_video/'.$crsalumnis->testimonial_video)}}" type="video/mp4">
                           </video>
                        
                            </td>
                            <!-- <td>{{ $crsalumnis->testimonial_video }}</td> -->
                            <!-- <td>{{ $crsalumnis->status }}</td> -->
                            <td>
                            <a href="{{ url('admin/edt_crsalumniv',[$crsalumnis->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                            <a href="{{ url('admin/del_crsalumni', [$crsalumnis->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
                            </td>
                            <td>
                                 <?php if($crsalumnis->status == 1){ ?> 
                                  <a href="{{url('admin/crsalumni_chng_stus',$crsalumnis->id)}}" class="btn btn-success">Active</a>

                                  <?php }if($crsalumnis->status == 0){ ?> 

                                  <a href="{{url('admin/crsalumni_chng_stus',$crsalumnis->id)}}" class="btn btn-danger">Inactive</a>

                                  <?php } ?>
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
   <!-- ADD EVENTS Modal -->
   <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <span class="close">&times;</span>
         <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Add Alumni Experience</h5>
              <form action="{{ url('/admin/insert_crsalumni') }}" method="post" enctype="multipart/form-data">
              @csrf
               <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
               @endif -->
              <div class="row mb-3">
                <input type="hidden" value="{{session('courseID')}}">
                <label for="testimonials_video" class="col-sm-2 col-form-label">Upload Video</label>
                <div class="col-sm-10">
                  <input type="file" name="testimonial_video" class="form-control" placeholder="Testimonials Video" id="testimonials_video" accept="video/mp4,video/x-m4v,video/*" required>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
            </div>
          </div>

      </div>
      <!-- End Modal content -->
   </div>
   <!-- ADD EVENTS Modal End-->

   
</main>
<script>
   function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
   }
   
   $("#example").dataTable( {
      "sScrollX": '100%'
   } );
</script>
<script>
   var modal = document.getElementById("myModal");
   var btn = document.getElementById("add_speakers");
   var span = document.getElementsByClassName("close")[0];
   btn.onclick = function() {
     modal.style.display = "block";
   }
   span.onclick = function() {
     modal.style.display = "none";
   }
   window.onclick = function(event) {
     if (event.target == modal) {
       modal.style.display = "none";
     }
   }
</script>

@include('backend.include.footer')