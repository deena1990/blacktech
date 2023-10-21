@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show Team Members</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9">
               <h1>Add / Show Instructor</h1>
            </div>
            <div class="col-sm-3" style="text-align:right;">
               <a><button type="button" class="btn btn-primary" id="add_teams" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i>  Add Instructor</button></a>
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show Instructor</h5>
                  <table class="table datatable" id="example1" style="width:100%">
                     <thead>
                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col">image</th>
                           <th scope="col">Name</th>
                           <th scope="col">Role</th>
                           <th scope="col">Action</th>
                           <th scope="col">Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($instructure as $key=>$instructures)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/course_img/'.$instructures->image)}}" alt="Instructure Image" height="80" width="120"></td>
                           <td>{{ $instructures->name }}</td>
                           <td>{{ $instructures->role }}</td>
                           <td>
                              <a href="{{ url('admin/edt_instructurev', [$instructures->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/del_instructure', [$instructures->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
                           </td>
                           <td>
                              <?php if($instructures->status == 1){ ?> 
                              <a href="{{url('admin/inst_change_status',$instructures->id)}}" onclick="return confirm('Are you sure to Inactive Status?');" class="btn btn-success">Active</a>
                              <?php }if($instructures->status == 0){ ?>
                              <a href="{{url('admin/inst_change_status',$instructures->id)}}" onclick="return confirm('Are you sure to Active Status?');" class="btn btn-danger">Inactive</a>
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
   <!-- ADD INSTRUCTOR Modal -->
   <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <span class="close">&times;</span>
         <div class="card">
            <div class="card-body">
               <h5 class="card-title text-center">Add Instructor</h5>
               <!-- Horizontal Form -->
               <form action="{{ url('admin/insert_instructure') }}" method="post" enctype="multipart/form-data" >
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif -->
                  <div class="row mb-3">
                     <label for="new_team" class="col-sm-2 col-form-label">Image</label>
                     <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" id="new_team" accept=".jpeg, .jpg, .png" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="name" class="col-sm-2 col-form-label">Name</label>
                     <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" required>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="role" class="col-sm-2 col-form-label">Role</label>
                     <div class="col-sm-10">
                        <input type="text" name="role" class="form-control" id="role" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-2"></div>
                     <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="submit">
                     </div>
                  </div>
               </form>
               <!-- End Horizontal Form -->
            </div>
         </div>
      </div>
      <!-- End Modal content -->
   </div>
   <!-- ADD INSTRUCTOR Modal End-->
</main>
<script>
   function myFunction() {
      if(!confirm("Are you sure you want to delete this record?"))
      event.preventDefault();
   }
</script>
<script>
   // Get the modal
   var modal = document.getElementById("myModal");
   var btn = document.getElementById("add_teams");
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