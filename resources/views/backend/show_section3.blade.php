@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show About Us</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9">
               <h1>Add / Show About Us</h1>
            </div>
            <div class="col-sm-3" style="text-align:right;">
               <!-- <a><button type="button" class="btn btn-primary" id="add_section1" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i>  Add Section 3</button></a> -->
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show About Us Section 3</h5>
                  <table class="table datatable" id="example1" style="width:100%">
                     <thead>
                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col">Image</th>
                           <th scope="col">Title</th>
                           <th scope="col">Description</th>
                           <th scope="col">Action</th>
                           <!-- <th scope="col">Status</th> -->
                        </tr>
                     </thead>
                     <tbody>
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($section3 as $key=>$section3s)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/upload_aboutus/'.$section3s->image)}}" alt="About Us" height="100" width="150"></td>
                           <td>{{ $section3s->title }}</td>
                           <td>{!! Str::limit($section3s->description, 150)!!}</td>
                           <td>
                              <a href="{{ url('admin/edt_sec3v', [$section3s->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <!-- <a href="{{ url('admin/del_sec3', [$section3s->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a> -->
                           </td>
                           <!-- <td>
                           <?php if($section3s->status == 1){ ?> 
                             
                                <a href="{{url('admin/sec3_chnge_status',$section3s->id)}}" onclick="return confirm('Are you sure to Inactive Status?');" class="btn btn-success">Active</a>

                                <?php }if($section3s->status == 0){ ?> 

                                <a href="{{url('admin/sec3_chnge_status',$section3s->id)}}" onclick="return confirm('Are you sure to Active Status?');" class="btn btn-danger">Inactive</a>

                                <?php } ?>
                           </td> -->
                        </tr>
                        @endforeach
                     </tbody>
                     
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
   
   <!-- ADD section 1 Modal -->
   <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <span class="close">&times;</span>
         <div class="card">
            <div class="card-body">
               <h2 class="card-title text-center">Add About Us Section 3</h2>
               <!-- Horizontal Form -->
               <!-- Multi Columns Form -->
               <form action="{{ url('admin/insert_absection3') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <div class="col-md-12">
                     <label for="image" class="form-label">Upload Image</label>
                     <input type="file"  name="image" class="form-control" id="image">
                  </div>
                  <div class="col-md-12">
                     <label for="title" class="form-label">Title</label>
                     <input type="text"  name="title" class="form-control" id="title">
                  </div>
                  <div class="col-md-12">
                     <label for="description" class="form-label">Description</label>
                     <textarea class="ckeditor form-control content_text" name="description" rows="5"></textarea>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
               <!-- End Horizontal Form -->
            </div>
         </div>
      </div>
      <!-- End Modal content -->
   </div>
   <!-- ADD section 1 Modal End-->
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
   // Get the modal
   var modal = document.getElementById("myModal");
   
   // Get the button that opens the modal
   var btn = document.getElementById("add_section1");
   
   // Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close")[0];
   
   // When the user clicks the button, open the modal 
   btn.onclick = function() {
     modal.style.display = "block";
   }
   
   // When the user clicks on <span> (x), close the modal
   span.onclick = function() {
     modal.style.display = "none";
   }
   
   // When the user clicks anywhere outside of the modal, close it
   window.onclick = function(event) {
     if (event.target == modal) {
       modal.style.display = "none";
     }
   }
</script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
       $('.ckeditor').ckeditor();
   });
</script>
@include('backend.include.footer')