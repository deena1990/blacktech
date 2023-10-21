@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show About Us</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9">
               <h1>Add / Show  Hiring and Strategic Partners</h1>
            </div>
            <div class="col-sm-3" style="text-align:right;">
               <a><button type="button" class="btn btn-primary" id="add_section1" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i>  Add Hiring and Strategic Partners</button></a>
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show  Hiring and Strategic Partners</h5>
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
                        @foreach($stpartner as $key=>$stpartners)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="Partners Image" height="50" width="100"></td>
                           <td>{{ $stpartners->name }}</td>
                           <td>
                              <a href="{{ url('admin/edit_stpartnersv', [$stpartners->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/del_stpartners', [$stpartners->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
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
               <h2 class="card-title text-center">Add Hiring and Strategic Partners</h2>
               <!-- Horizontal Form -->
               <!-- Multi Columns Form -->
               <form action="{{ url('admin/insert_stpartners') }}" method="post" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif -->
                  <div class="col-md-12">
                     <label for="image" class="form-label">Upload Image</label>
                     <input type="file"  name="image" class="form-control" id="file" accept="image/png, image/jpg, image/jpeg" required>
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
   var modal = document.getElementById("myModal");
   var btn = document.getElementById("add_section1");
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