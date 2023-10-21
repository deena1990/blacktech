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
        <li class="breadcrumb-item active">Update Coupon</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Coupon</h5>

            <!-- Horizontal Form -->
            <form action="{{ url('admin/insert_coupon') }}" method="post" enctype="multipart/form-data" onsubmit="return validateFields();">
              @csrf
              <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Name</label>
                <div class="col-sm-5">
                  <input type="text" name="coupon_name" class="form-control coupon_name" id="inputText" value="<?=$coupons->coupon_name?>">
                </div>
              </div>
              <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Code</label>
                <div class="col-sm-5">
                  <input type="text" name="course_title" class="form-control course_title" id="inputText" value="<?=$coupons->coupon_code?>">
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
                  <input type="datetime-local" name="st_date" class="form-control st_date" id="inputText" value="<?=$coupons->start_date?>">
                </div>

                <div class="col-sm-2">
                  <label for="inputEmail3" class=" col-form-label">End Date</label>
                </div>

                <div class="col-sm-4">
                  <input type="datetime-local" name="end_date" class="form-control end_date" id="inputText" value="<?=$coupons->end_date?>">
                </div>
              </div>
              <input type="hidden" name="coupon_id" value="<?=$coupons->id?>">
              <div class="row mb-4">
                <div class="col-sm-2">
                  <!-- <label for="freeCoupon" class=" col-form-label">Start Date</label> -->
                </div>
                <div class="col-sm-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="freeCoupon" <?php if($coupons->coupon_type == "Free"){echo "checked";}?>>
                    <label class="form-check-label" for="freeCoupon">
                      Free Coupon
                    </label>
                  </div>
                </div>
              </div>
              @if($coupons->coupon_type == "Flat Discount" || $coupons->coupon_type == "% Discount")
              <div class="row mb-4">
                <div class="col-sm-2">
                  <label for="discount_type" class=" col-form-label discount_type">Discount Type</label>
                </div>
                <div class="col-sm-4">
                  <select name="discount_type" id="discount_type" class="form-control discount_type" value="<?=$coupons->coupon_discount?>">
                    <option selected disabled style="display:none;">Choose Discount Type</option>
                    <option value="Flat" <?php if($coupons->coupon_type == "Flat Discount"){echo "selected";}?>>Flat Discount ( in $ )</option>
                    <option value="%" <?php if($coupons->coupon_type == "% Discount"){echo "selected";}?>>% Discount ( in % )</option>
                  </select>
                  <span class="text-danger" id="discount_type_error"></span>
                 </div>
              </div>
              <div class="row mb-4">
                <div class="col-sm-2">
                  <label for="discount" class=" col-form-label discount">Discount</label>
                </div>
                <div class="col-sm-4">
                  <!-- <input type="text" name="check" class="form-control" id="discount" value="<?=$coupons->coupon_discount?>"> -->
                  <input type="number" placeholder="Enter Discount Value" name="discount" class="form-control discount" id="discount" value="<?=$coupons->coupon_discount?>" required>
                </div>
              </div>
              @endif
              <div class="row mb-4">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
              <button type="submit" class="btn couponSubmitBtn submitBtn">Submit</button>
             
              </div>
              </div>
            </form><!-- End Horizontal Form -->

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


