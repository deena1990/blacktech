@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show Team Members</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9">
               <h1>Add / Show Team Members</h1>
            </div>
            <div class="col-sm-3" style="text-align:right;">
               <a><button type="button" class="btn btn-primary" id="add_teams" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i>  Add Team Members</button></a>
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show Team Members</h5>
                  <table class="table" id="example1" style="width:100%">
                     <thead>
                        <th scope="col">Id</th>
                        <th scope="col">image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <!-- <th scope="col">Position Id</th> -->
                        <th scope="col">Action</th>
                     </thead>
                     <tbody class="row_position">
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        <p class="alert alert-success" style="display:none;" id="orderUpdateMsg">Team order updated successfully !!</p>
                        @foreach($team as $key=>$teams)
                        <tr id="<?php echo $teams->id; ?>">
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/upload_team/'.$teams->image)}}" alt="Team Members Image" height="100" width="150"></td>
                           <td>{{ $teams->name }}</td>
                           <td>{{ $teams->role }}</td>
                           <!-- <td>{{ $teams->position_id }}</td> -->
                           <td>
                              <a href="{{ url('admin/edt_teamv', [$teams->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/del_team', [$teams->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
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
               <h5 class="card-title">Add Team Members</h5>
               <!-- Horizontal Form -->
               <form action="{{ url('admin/insert_team') }}" method="post" enctype="multipart/form-data" >
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif -->
                  <div class="row mb-3">
                     <label for="new_team" class="col-sm-2 col-form-label">Image</label>
                     <div class="col-sm-10">
                        <input type="file" name="new_team" class="form-control" id="new_team" accept="image/png, image/jpg, image/jpeg" required>
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
   <!-- ADD EVENTS Modal End-->
</main>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>
<script type="text/javascript">
   $(".row_position").sortable({
      delay: 150,
      stop: function () {
         var selectedData = new Array();
         $(".row_position>tr").each(function(){
            selectedData.push($(this).attr("id"))
         });
         updateOrder(selectedData);
      }
   });
   function updateOrder(aData){
      var token = "<?php echo csrf_token(); ?>";
      $.ajax({
         url: "{{url('updateTeamOrder')}}",
         type: "POST",
         data: {allData:aData,_token:token},
         success: function(data){
            // if(data == 1){
               // alert(data);
               // console.log(data);
               // location.reload();
               $("#orderUpdateMsg").show();
               $("#orderUpdateMsg").fadeOut(6000);
               setTimeout(() => {
                  location.reload();
               }, 6000);
            // }
         }
      });
   }
</script>
<script>
   function myFunction() {
      if(!confirm("Are You Sure to delete this"))
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