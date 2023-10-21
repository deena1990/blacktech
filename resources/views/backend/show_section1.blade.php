@include('backend.include.header')
@include('backend.include.sidebar')
<style>
   img.speaker_image {
    height: 100px;
    width: 100px;
    border: 2px solid darkgray;
    border-radius: 50px;
}
</style>
<main id="main" class="main">
   <div class="pagetitle">
      <!-- <h1>Add / Show About Us</h1> -->
      <nav>
         <div class="row">
            <div class="col-sm-9">
               <h1>Add / Show About Us</h1>
            </div>
            <div class="col-sm-3" style="text-align:right;">
               <!-- <a><button type="button" class="btn btn-primary" id="add_section1" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i>  Add Section 1</button></a> -->
            </div>
         </div>
      </nav>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body table-responsive">
                  <h5 class="card-title">Show About Us Section 1</h5>
                  <table class="table datatable" id="example1" style="width:100%">
                     <thead>
                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col">Image1</th>
                           <th scope="col">Image2</th>
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
                        @foreach($section_one as $key=>$section_ones)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ url('assets/upload_aboutus/'.$section_ones->image1)}}" alt="About Us" height="100" width="150" class="speaker_image"></td>
                           <td><img src="{{ url('assets/upload_aboutus/'.$section_ones->image2)}}" alt="About Us" height="100" width="150" class="speaker_image"></td>
                           <td>{{ $section_ones->title }}</td>
                           <td>{!! Str::limit($section_ones->description, 80)!!}</td>
                           <td>
                              <a href="{{ url('admin/edt_sec1v', [$section_ones->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <!-- <a href="{{ url('admin/del_sec1', [$section_ones->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a> -->
                           </td>
                           <!-- <td>
                           <?php if($section_ones->status == 1){ ?> 
                             
                                <a href="{{url('admin/sec1_chnge_status',$section_ones->id)}}" onclick="return confirm('Are you sure to Inactive Status?');" class="btn btn-success">Active</a>

                                <?php }if($section_ones->status == 0){ ?> 

                                <a href="{{url('admin/sec1_chnge_status',$section_ones->id)}}" onclick="return confirm('Are you sure to Active Status?');" class="btn btn-danger">Inactive</a>

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
               <h2 class="card-title text-center">Add About Us Section 1</h2>
               <!-- Horizontal Form -->
               <!-- Multi Columns Form -->
               <form action="{{ url('admin/insert_absection1') }}" method="post" onsubmit="return section1();" enctype="multipart/form-data" class="row g-3">
                  @csrf
                  <div class="col-md-12">
                     <label for="image" class="form-label">Upload Image</label>
                     <input type="file"  name="image" class="form-control" id="image" required>
                     <span class="text-danger" id="img_error"></span>
                  </div>
                  <div class="col-md-12">
                     <label for="title" class="form-label">Title</label>
                     <input type="text"  name="title" class="form-control" id="title" required>
                     <span class="text-danger" id="name_error"></span>
                  </div>
                  <div class="col-md-12">
                     <label for="description" class="form-label">Description</label>
                     <textarea class="ckeditor form-control content_text" id="description" name="description" rows="5" required></textarea>
                     <span class="text-danger" id="description_error"></span>
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
       $('.ckeditor').ckeditor();
   });
</script>
<script type="text/javascript">
   function section1()
   {
      function fun() {  
      document.getElementById('name_error').innerHTML ="";
      }
      function fun2() {  
      document.getElementById('description_error').innerHTML ="";
      }
      function ist_img(){
      document.getElementById('img_error').innerHTML ="";
      }
      var fileName = document.getElementById("image").value;
           var idxDot = fileName.lastIndexOf(".") + 1;
           var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
           if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
               //TO DO
           }else{
             document.getElementById('img_error').innerHTML ="Only Allow JPG | PNG | JPEG";
             fileName = setTimeout(ist_img, 3000);
             return false;
           }   
      var name=document.getElementById('title').value;
      var description=document.getElementById('description').value;
      var alphabet = "[(a-zA-Z)+(\!\@\#\$\%\^\&\*\(\))+]";
      if(!name.match(alphabet)){
        document.getElementById('name_error').innerHTML ="Enter Only Alphabet";
        heading = setTimeout(fun, 2000);
        return false;
      }
      if(!description.match(alphabet)){
        document.getElementById('description_error').innerHTML ="Enter Only Alphabet";
        txtarea = setTimeout(fun2, 2000);
        return false;
      }
   }
</script>   
@include('backend.include.footer')