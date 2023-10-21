@include('frontend.include.header')
<style>
   /* Style the tab content */
   .tabcontent {
   display: none;
   }
   .tech-companies-box img {
   object-fit: cover;
   }
   .tab-content {
   height: 700px;
   overflow: auto;
   }
   .tab-content::-webkit-scrollbar {
   width: 7px;
   }
   .tab-content::-webkit-scrollbar-thumb {
   background: #dbd8d8; 
   border-radius: 10px;
   }
   .accelerate-career-tab-info {
   padding-bottom: 40px;
   }
   .accelerate-course-main-box{
   margin-top: 0;
   }
   .accelerate-course-main-box {
   margin: 0px 0px 30px 0px;
   }
   .accelerate-course-main-box{
   height: auto;
   }
</style>
@if ($status == "successful")
<section class="accelerate-career-course-info">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h1 class="alert alert-success">Payment Successful !!!</h1> 
            <label for="">Payment Status</label> : <span class="text-success">{{ucfirst($status)}}</span><br>
            <label for="">Transaction Reference No.</label> : <span class="text-primary">{{$tx_ref}}</span><br>
            <label for="">Transaction Id</label> : <span class="text-primary">{{$transaction_id}}</span>
            <div class="mt-50">               
               <a href="{{url('courses?courseType=Accelerator_Programs')}}"><button type="button" class="btn btn-primary" id="courseButton">Go to Courses</button></a>
            </div>
         </div>
      </div>
   </div>
</section>
@else
<section class="accelerate-career-course-info">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h1 class="alert alert-danger">Payment Failed !!!</h1> 
            <label for="">Payment Status</label> : <span class="text-danger">{{ucfirst($status)}}</span><br>
            <label for="">Transaction Reference No.</label> : <span class="text-primary">{{$tx_ref}}</span><br>
            <label for="">Transaction Id</label> : <span class="text-primary">{{$transaction_id}}</span>
            <div class="mt-50">
               <a href="{{url('courses?courseType=Accelerator_Programs')}}"><button type="button" class="btn btn-primary" id="courseButton">Go to Courses</button></a>
            </div>
         </div>
      </div>
   </div>
</section>
@endif
@include('frontend.include.footer')
<script>
   $(document).ready(function(){
      setTimeout(function (){
         $('#courseButton').trigger('click');
      }, 5000);
   });
</script>