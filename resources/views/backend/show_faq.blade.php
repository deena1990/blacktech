@include('backend.include.header')
@include('backend.include.sidebar')
<main id="main" class="main">
   <div class="pagetitle">
      <nav>
         <div class="row">
            <h1>Add / Show Faq</h1>
            <nav>
               <div class="row">
                     <div class="col-sm-9">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/show_course') }}">Courses</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/course_details') }}/{{$course_id}}">Course Details</a></li>
                        <li class="breadcrumb-item">Course FAQ</li>
                     </ol>
                     </div>
                     <div class="col-sm-3" style="text-align:right;">
                        <a><button type="button" class="btn btn-primary" id="add_teams" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i> Add Faq</button></a>
                     </div>
               </div>
            </nav>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show Faq</h5>
                  <table class="table datatable" id="example1" style="width:100%">
                     <thead>
                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col">Question</th>
                           <th scope="col">Answer</th>
                           <th scope="col">Action</th>
                           <th scope="col">Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($faq as $key=>$faqs)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td title="{!! $faqs->question !!}">{{ Str::limit($faqs->question,20) }}</td>
                           <td title="{!! $faqs->answer !!}">{!! Str::limit($faqs->answer,20) !!}</td>
                           <td>
                              <a href="{{ url('admin/edt_faqv', [$faqs->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/del_faq', [$faqs->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
                           </td>
                           <td>
                           <?php if($faqs->status == 1){ ?> 
                             
                                <a href="{{url('admin/faq_stus_change',$faqs->id)}}" onclick="return confirm('Are you sure to Inactive Status?');" class="btn btn-success">Active</a>

                                <?php }if($faqs->status == 0){ ?> 

                                <a href="{{url('admin/faq_stus_change',$faqs->id)}}" onclick="return confirm('Are you sure to Active Status?');" class="btn btn-danger">Inactive</a>

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
               <h5 class="card-title text-center">Add Faq</h5>
               <!-- Horizontal Form -->
               <form action="{{ url('admin/insert_faq') }}" method="post" enctype="multipart/form-data" >
                  @csrf
                  <!-- @if(Session::has('message'))
                  <p class="alert alert-success">{{ Session::get('message') }}</p>
                  @endif -->
                  <input type="hidden" name="course_id" value="{{$course_id}}">
                  <div class="row mb-3">
                     <label for="name" class="col-sm-2 col-form-label">Question</label>
                     <div class="col-sm-10">
                        <input type="text" name="question" class="form-control" id="name" required>
                        <span class="text-danger" id="team_name"></span>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="role" class="col-sm-2 col-form-label">Answer</label>
                     <div class="col-sm-10">
                        <textarea name="answer" class="form-control" id="role" required></textarea>
                        <span class="text-danger" id="team_role"></span>
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
<script>
   function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
   }
</script>
<script>
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