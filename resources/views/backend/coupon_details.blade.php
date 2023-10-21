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
    <h1>Coupon</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Coupon Details</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body p-5">
            <div class="text-end">
              <a href="{{url('admin/show_coupon')}}" class="btn btn-primary">Back</a>
            </div>
            <h5 class="card-title text-center mb-5">Coupon Details</h5>

            <!-- Horizontal Form -->
              @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
              @endif
              <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Name</label>
                <div class="col-sm-4">
                  <input type="text" name="coupon_name" value="<?=$coupons->coupon_name;?>" class="form-control" readonly>
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Code</label>
                <div class="col-sm-4">
                  <input type="text" name="coupon_code" value="<?=$coupons->coupon_code;?>" class="form-control" readonly>
                </div>
              </div>
              <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Type</label>
                <div class="col-sm-4">
                  <input type="text" name="coupon_type" value="<?=$coupons->coupon_type;?>" class="form-control" readonly>
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Discount</label>
                <div class="col-sm-4">
                  <input type="text" name="coupon_discount" value="<?=$coupons->coupon_discount;?>" class="form-control" readonly>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-sm-2">
                  <label for="inputEmail3" class=" col-form-label">Start Date</label>
                </div>
                <div class="col-sm-4">
                  <input type="text" name="st_date" value="<?=$coupons->start_date;?>" class="form-control" readonly>
                </div>
                <div class="col-sm-2">
                  <label for="inputEmail3" class=" col-form-label">End Date</label>
                </div>
                <div class="col-sm-4">
                  <input type="text" name="end_date" value="<?=$coupons->end_date;?>" class="form-control" readonly>
                </div>
              </div>
              <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Created Date</label>
                <div class="col-sm-4">
                  <input type="text" name="created_at" value="<?=$coupons->created_at;?>" class="form-control" readonly>
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                <?php if($coupons->status==0){?>
                  <input type="text" name="status" value="Inactive" class="form-control text-danger" readonly>
                <?php }else{?>
                  <input type="text" name="status" value="Active" class="form-control text-success" readonly>
                <?php }?>

                </div>
              </div>
              <div class="row mb-4">
              <div class="col-sm-12 mt-5 text-center">
              </div>
              </div><!-- End Horizontal Form -->

          </div>
        </div>

        

      </div>

    </div>
  </section>

</main><!-- End #main -->
<!-- End #main -->

@include('backend.include.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#freeCoupon').click(function(){
          $('#freeCupon').toggle();
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


