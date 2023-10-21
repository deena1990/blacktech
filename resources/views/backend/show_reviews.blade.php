@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show Speaker</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9"> <h1>Add / Show Reviews</h1></div>
            <div class="col-sm-3" style="text-align:right;">
               <a><button type="button" class="btn btn-primary" id="add_speakers" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i> Add Reviews</button></a>
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show Reviews</h5>
                  <table class="table datatable" id="example1" style="width:100%">
                     <thead>
                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col">Image</th>
                           <th scope="col">Rating</th>
                           <th scope="col">Title</th>
                           <th scope="col">Name</th>
                           <th scope="col">Designation</th>
                           <th scope="col">Description</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($review as $key=>$reviews)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/upload_aboutus/'.$reviews->image)}}" alt="Speakers Image" height="80" width="100"></td>
                           <td>{{ $reviews->rating }}</td>
                           <td>{{ $reviews->title }}</td>
                           <td>{{ $reviews->name }}</td>
                           <td>{{ $reviews->designation }}</td>
                           <td>{!! Str::limit($reviews->brief_description,100)!!}</td>
                           <td>
                              <a href="{{ url('admin/edt_reviewsv', [$reviews->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/del_reviews', [$reviews->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
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
              <h5 class="card-title text-center">Add Reviews</h5>

              <!-- Horizontal Form -->
              <!-- Multi Columns Form -->
              <form action="{{ url('admin/insert_reviews') }}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif -->

                <div class="col-md-12">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="file"  name="image" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg" required>
                </div>

                <div class="col-md-12">
                  <label for="name" class="form-label">Name</label>
                  <input type="text"  name="name" class="form-control" id="name" required>
                </div>
                
                <div class="col-md-6">
                  <label for="rating" class="form-label">Star Rating</label>
                  <input type="text" name="rating" class="form-control" autocomplete="off" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" id="rating" required>
                </div>

                <div class="col-md-6">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" id="title" required>
                </div>


                <div class="col-md-12">
                  <label for="designation" class="form-label">Designation</label>
                  <input type="text" name="designation" class="form-control" id="designation" required>
                </div>
           
                <div class="col-md-12">
                  <label for="brief_description" class="form-label">Brief Description</label>
                  <textarea class="ckeditor form-control content_text" name="brief_description" rows="5" required></textarea>
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
   // Get the modal
   var modal = document.getElementById("myModal");
   
   // Get the button that opens the modal
   var btn = document.getElementById("add_speakers");
   
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
@include('backend.include.footer')