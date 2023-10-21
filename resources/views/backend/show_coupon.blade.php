@include('backend.include.header')
@include('backend.include.sidebar')
<style type="text/css">
  .couponSubmitBtn{
   background-color:#ff6600;
   border-color:#ff6600;
   color: #fff;
  }
  .couponSubmitBtn:hover{
   background-color:#d75906;
   border-color:#ff6600;
   color: #fff;
  }
  .form-check-input:checked {
    background-color: #ff6600;
    border-color: #fe6500;
  }
  .generateBtn{
    width: 100%;
  }
  .submitBtn{
    padding: 7px 60px;
  }
</style> 
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Show Coupon</h1>
         <nav>
            <div class="row">
                  <div class="col-sm-9">
                  <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item">Show Coupon</li>
                  </ol>
                  </div>
                  <div class="col-sm-3" style="text-align:right;">
                   <a><button type="button" class="btn btn-primary" id="add_coupons" style="background-color:#ff6600;border-color:#ff6600;"><i class="bi bi-plus-circle"></i> Add Coupon</button></a>
                  </div>
            </div>
         </nav>
       </div>
     
       <section class="section">
          <div class="row">
             <div class="col-lg-12">
                <div class="card">
                   <div class="card-body table-responsive">
                      <h5 class="card-title">Show Coupon</h5>
                      <table class="table datatable" id="example1" style="width:100%">
                         <thead>
                            <tr>
                               <th scope="col">SR No.</th>
                               <th scope="col">Coupon Name</th>
                               <th scope="col">Coupon Code</th>
                               <th scope="col">Coupon Type</th>
                               <!-- <th scope="col">Coupon Discount</th> -->
                               <!-- <th scope="col">Start Date</th> -->
                               <!-- <th scope="col">End Date</th> -->
                               <th scope="col">Action</th>
                               <th scope="col">Status</th>
                            </tr>
                         </thead>
                         <tbody>
                           @if(Session::has('message'))
                           <p class="alert alert-success">{{ Session::get('message') }}</p>
                           @endif
                           @foreach($coupons as $key=>$coupon)
                           <tr>
                           <td>{{ ++$key }}</td>
                           <td>{{ $coupon->coupon_name }}</td>
                           <td>{{ $coupon->coupon_code }}</td>
                           <td>{{ $coupon->coupon_type }}</td>
                           <!-- <td>{{ $coupon->coupon_discount }}</td> -->
                           <!-- <td>{{ $coupon->start_date }}</td> -->
                           <!-- <td>{{ $coupon->end_date }}</td> -->
                           <td>
                              <a href="{{ url('admin/coupon_details', [$coupon->id]) }}"><i class="fa fa-eye" id="add_coupons"></i></a> &nbsp;
                              <a href="{{ url('admin/edit_coupon', [$coupon->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                              <a href="{{ url('admin/coupon_delete', [$coupon->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
                           </td>
                           <td>
                                <?php if($coupon->status == 1){ ?> 
                             
                                <a href="{{url('admin/coupon_change_status',$coupon->id)}}" onclick="return confirm('Are you sure to Inactive Status?');" class="btn btn-success">Active</a>

                                <?php }if($coupon->status == 0){ ?> 

                                <a href="{{url('admin/coupon_change_status',$coupon->id)}}" onclick="return confirm('Are you sure to Active Status?');" class="btn btn-danger">Inactive</a>

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
   <!-- ADD Courses Modal -->
   <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <span class="close">&times;</span>
         <div class="card">
            <div class="card-body">
               <h5 class="card-title text-center">Add Coupon</h5>
               <!-- Horizontal Form -->
               <form action="{{ url('admin/insert_coupon') }}" method="post" enctype="multipart/form-data" onsubmit="return validateFields();">
              @csrf
              <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Name</label>
                <div class="col-sm-5">
                  <input type="text" name="coupon_name" class="form-control coupon_name" id="inputText" required>
                </div>
              </div>
              <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Code</label>
                <div class="col-sm-5">
                  <input type="text" name="course_title" class="form-control course_title" id="inputText" required>
                </div>
                <div class="col-sm-5">
                    <button type="button" class="btn couponSubmitBtn" id="generate_coupon_code">Generate Coupon Code</button>
                </div>
              </div>
            
              <div class="row mb-4">
                <div class="col-sm-2">
                  <label for="inputEmail3" class=" col-form-label">Start Date</label>
                </div>
                
                <div class="col-sm-4">
                  <input type="datetime-local" name="st_date" class="form-control st_date" id="inputText" required>
                </div>

                <div class="col-sm-2">
                  <label for="inputEmail3" class=" col-form-label">End Date</label>
                </div>

                <div class="col-sm-4">
                  <input type="datetime-local" name="end_date" class="form-control end_date" id="inputText" required>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="freeCoupon">
                    <label class="form-check-label" for="freeCoupon">
                      Free Coupon
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-sm-2">
                  <label for="discount_type" class=" col-form-label discount_type">Discount Type</label>
                </div>
                <div class="col-sm-4">
                  <select name="discount_type" id="discount_type" class="form-control discount_type">
                    <option selected disabled style="display:none;">Choose Discount Type</option>
                    <option value="Flat">Flat Discount ( in $ )</option>
                    <option value="%">% Discount ( in % )</option>
                  </select>
                  <span class="text-danger" id="discount_type_error"></span>
                 </div>
              </div>
              <div class="row mb-4">
                <div class="col-sm-2">
                  <label for="discount" class=" col-form-label discount">Discount</label>
                </div>
                <div class="col-sm-4">
                  <input type="number" placeholder="Enter Discount Value" name="discount" class="form-control discount" id="discount" required>
                </div>
              </div>
              
              <div class="row mb-4">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
              <button type="submit" class="btn couponSubmitBtn submitBtn">Submit</button>
             
              </div>
              </div>
            </form>
               <!-- End Horizontal Form -->
            </div>
         </div>
      </div>
      <!-- End Modal content -->
   </div>
   <!-- ADD Courses Modal End-->
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
   var btn = document.getElementById("add_coupons");
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.alert').fadeOut(6000);
    });
</script>
<script>
  function validateFields(){
    var discount_type = $('#discount_type').val();
    if ($('input[type="checkbox"]').prop("checked") == false && discount_type == null){
      $('#discount_type_error').text('Please select Discount Type');
      $('#discount_type_error').fadeOut(8000);
      setTimeout(function(){
        window.location.reload();
      }, 8000);
      return false;
    }
  }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('input[type="checkbox"]').click(function(){
          if($(this).prop("checked") == true){
                // alert("Checkbox is checked.");
                $('.discount_type').hide();
                $('.discount').hide();
                $('#discount_type').val('');
                $('#discount').val('');
                $('#discount').removeAttr('required');
            }
            else if($(this).prop("checked") == false){
              // alert("Checkbox is unchecked.");
              $('.discount_type').show();
              $('.discount').show();
              $('#discount_type').val('');
              $('#discount').val('');
              $('#discount').attr('required','required');
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#generate_coupon_code').click(function(){
          var generate_coupon_code = Math.random().toString(36).substr(2, 6);
          $('.course_title').val(generate_coupon_code);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
      var start_date_time = new Date();
      var start_date=new Date(start_date_time.getTime() - (start_date_time.getTimezoneOffset() * 60000 )).toISOString().split('T')[0];
      var start_time= new Date(start_date_time.getTime() - (start_date_time.getTimezoneOffset() * 60000 )).toISOString().split('T')[1].split('.')[0];
      var split_start_time=start_time.split(':');
      $('.st_date').val(start_date+'T'+split_start_time[0] +':'+ split_start_time[1]);
      
      var end_date_time = new Date();
      end_date_time.setDate(end_date_time.getDate() + 14);
      var end_date=new Date(end_date_time.getTime() - (end_date_time.getTimezoneOffset() * 60000 )).toISOString().split('T')[0];
      var end_time= new Date(end_date_time.getTime() - (end_date_time.getTimezoneOffset() * 60000 )).toISOString().split('T')[1].split('.')[0];
      var split_end_time=end_time.split(':');
      $('.end_date').val(end_date+'T'+split_end_time[0] +':'+ split_end_time[1]);   
    });
</script>