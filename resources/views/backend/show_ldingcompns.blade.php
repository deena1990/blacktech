@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show About Us</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9">
               <h1>Add / Show Leading Companies</h1>
            </div>
            <div class="col-sm-3" style="text-align:right;">
               <a><button type="button" class="btn btn-primary" id="add_section1" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i>  Add Leading Companies</button></a>
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show Leading Companies</h5>
                  <table class="table datatable" id="example1" style="width:100%">
                     <thead>
                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col">Image</th>
                           <th scope="col">Name</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($ldingcompns as $key=>$ldingcompn)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/upload_stpartners/'.$ldingcompn->image)}}" alt="Partners Image" height="50" width="100"></td>
                           <td>{{ $ldingcompn->name }}</td>
                           <td>
                              <a href="{{ url('admin/edit_ldingcompnv', [$ldingcompn->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/del_ldingcompns', [$ldingcompn->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
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
   
   <!-- ADD section 1 Modal -->
   <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <span class="close">&times;</span>
         <div class="card">
            <div class="card-body">
               <h2 class="card-title text-center">Add Leading Companies</h2>
               <!-- Horizontal Form -->
               <!-- Multi Columns Form -->
               <form action="{{ url('admin/insert_ldingcompns') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif
                  <div class="col-md-12">
                     <label for="image" class="form-label">Upload Image</label>
                     <input type="file"  name="image" class="form-control" id="image" accept="image/png, image/jpg, image/jpeg" required>
                  </div>
                  <div class="col-md-12">
                     <label for="name" class="form-label">Name</label>
                     <input type="text"  name="name" class="form-control" id="name" required>
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
@include('backend.include.footer')