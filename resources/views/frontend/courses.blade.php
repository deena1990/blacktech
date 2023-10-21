@include('frontend.include.header')

<style>

   /* Style the tab content */

   .tabcontent {

   display: none;

   }

   .tech-companies-box img {

   object-fit: contain;

   border-radius: unset;

   }



   .tech-companies-box {

      border-radius: unset;

      background-color: unset;

   }

   .tab-content {

   max-height: 700px;

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

   cursor: pointer;

   }

</style>

<!--inner breadcrumb Section Start Here -->

<section class="inner-banner-detail-area">

   <div class="inner-banner-img-area">

      <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[0]) }}" alt="Refer a friend"/>

   </div>

   <div class="breadcrum-info-main-area">

      <div class="container">

         <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

               <div class="breadcrum-info-title">

                  <h2>Accelerate Your Career</h2>

               </div>

            </div>

         </div>

      </div>

   </div>

</section>

<!--inner breadcrumb Section end Here -->

<!--Accelerate Course Section Start Here -->

<section class="accelerate-career-course-info">

   <div class="container">

      <div class="row">

         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="accelerate-career-tab-info">

               <ul class="nav nav-tabs" role="tablist">

                  <li class="nav-item" role="presentation">

                     <a class="nav-link accelator" data-bs-toggle="tab" aria-selected="true" role="tab">                    

                     <button style="border:none;background:inherit;" class="tablinks accelator" onclick="openCity(event, 'London')">Accelerator Programs</button>

                     </a>

                  </li>

                  <li class="nav-item" role="presentation">

                     <a class="nav-link certification" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">

                     <button style="border:none;background:inherit;" class="tablinks certification" onclick="openCity(event, 'Paris')"> Certification Courses</button>

                     </a>

                  </li>

                  <li class="nav-item" role="presentation">

                     <a class="nav-link career" data-bs-toggle="tab"  aria-selected="false" role="tab" tabindex="-1">

                     <button style="border:none;background:inherit;" class="tablinks career" onclick="openCity(event, 'Mentorship')">Career Mentorship</button>

                     </a>

                  </li>

                  <li class="nav-item" role="presentation">

                     <a class="nav-link free" data-bs-toggle="tab"  aria-selected="false" role="tab" tabindex="-1">

                     <button style="border:none;background:inherit;" class="tablinks free" onclick="openCity(event, 'Tokyo')">Free Courses</button>

                     </a>

                  </li>

               </ul>

            </div>

            <div class="accelerate-career-tab-content-info">

               <div class="tab-content">

                  <div id="London" class="tabcontent">

                     <div id="accltor1" class="tab-pane active show" role="tabpanel">

                        <div class="container">

                           <div class="row">

                              @foreach($ap_course as $courses)

                              <div class="col-lg-4 col-md-12 col-sm-12">

                                 <!-- <a href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}"> -->

                                 <div class="accelerate-course-main-box">

                                    <div class="accelerate-course-img-box">

                                       <img src="{{ url('assets/course_img/'.explode(':::',$courses->image)[0])}}" alt="Course Image" onclick="course_detail('{{$courses->id}}');"/>   

                                    </div>

                                    <!-- <a href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}"> -->

                                    <div class="accelerate-course-text">

                                       <h5 onclick="course_detail('{{$courses->id}}');">{{ $courses->course_title}}</h5>

                                       <p>Start Date : <?php echo date("F d , Y", strtotime($courses->start_date))?></p> 

                                    </div>

                                    <div class="enrol-now-btn-area">

                                       <!-- <a class="enrol-now-btn" href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}">Enrol Now</a>  -->

                                       <form action="{{ url('course/'.str_replace(' ','-',$courses->course_title)) }}" method="post">

                                       @csrf

                                          <input type="hidden" name="id" value="{{base64_encode($courses->id)}}">

                                          <button type="submit" class="enrol-now-btn" id="submit{{$courses->id}}">Register Now</button>

                                       </form>

                                    </div>

                                    <!-- </a> -->

                                 </div>

                                 <!-- </a> -->

                              </div>

                              @endforeach

                           </div>

                        </div>

                     </div>

                  </div>

                  <div id="Paris" class="tabcontent">

                     <div id="menu1" class="tab-pane" role="tabpanel">

                     <div class="container">

                           <div class="row">

                              @foreach($cc_course as $courses)

                              <div class="col-lg-4 col-md-12 col-sm-12">

                                 <!-- <a href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}"> -->

                                    <div class="accelerate-course-main-box">

                                       <div class="accelerate-course-img-box">

                                          <img src="{{ url('assets/course_img/'.$courses->image)}}" alt="Course Image" onclick="course_detail('{{$courses->id}}');"/>   

                                       </div>

                                 <!-- <a href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}"> -->

                                 <div class="accelerate-course-text">

                                    <h5 onclick="course_detail('{{$courses->id}}');">{{ $courses->course_title}}</h5>

                                    <p>Start Date : <?php echo date("F d , Y", strtotime($courses->start_date))?></p> 

                                 </div>

                                 <div class="enrol-now-btn-area">

                                    <!-- <a class="enrol-now-btn" href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}">Enrol Now</a>  -->

                                    <form action="{{ url('course/'.str_replace(' ','-',$courses->course_title)) }}" method="post">

                                    @csrf

                                       <input type="hidden" name="id" value="{{base64_encode($courses->id)}}">

                                       <button type="submit" class="enrol-now-btn" id="submit{{$courses->id}}">Register Now</button>

                                    </form>

                                 </div>

                                 <!-- </a> -->

                                 </div>

                                 <!-- </a> -->

                              </div>

                              @endforeach

                           </div>

                        </div>

                     </div>

                  </div>

                  <div id="Mentorship" class="tabcontent">

                     <div id="menu2" class="tab-pane" role="tabpanel">

                     <div class="container">

                           <div class="row">

                              @foreach($cm_course as $courses)

                              <div class="col-lg-4 col-md-12 col-sm-12">

                                 <!-- <a href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}"> -->

                                 <div class="accelerate-course-main-box">

                                    <div class="accelerate-course-img-box">

                                       <img src="{{ url('assets/course_img/'.$courses->image)}}" alt="Course Image" onclick="course_detail('{{$courses->id}}');"/>   

                                    </div>

                                 <!-- <a href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}"> -->

                                    <div class="accelerate-course-text">

                                       <h5 onclick="course_detail('{{$courses->id}}');">{{ $courses->course_title}}</h5>

                                       <p>Start Date : <?php echo date("F d , Y", strtotime($courses->start_date))?></p> 

                                    </div>

                                    <div class="enrol-now-btn-area">

                                       <!-- <a class="enrol-now-btn" href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}">Enrol Now</a>  -->

                                       <form action="{{ url('course/'.str_replace(' ','-',$courses->course_title)) }}" method="post">

                                       @csrf

                                          <input type="hidden" name="id" value="{{base64_encode($courses->id)}}">

                                          <button type="submit" class="enrol-now-btn" id="submit{{$courses->id}}">Register Now</button>

                                       </form>

                                    </div>

                                 <!-- </a> -->

                                 </div>

                                 <!-- </a> -->

                              </div>

                              @endforeach

                           </div>

                        </div>

                     </div>

                  </div>

                  <div id="Tokyo" class="tabcontent">

                     <div id="menu2" class="tab-pane" role="tabpanel">

                     <div class="container">

                           <div class="row">

                              @foreach($fc_course as $courses)

                              <div class="col-lg-4 col-md-12 col-sm-12">

                                 <!-- <a href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}"> -->

                                 <div class="accelerate-course-main-box">

                                    <div class="accelerate-course-img-box">

                                       <img src="{{ url('assets/course_img/'.$courses->image)}}" alt="Course Image" onclick="course_detail('{{$courses->id}}');"/>   

                                    </div>

                                 <!-- <a href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}"> -->

                                    <div class="accelerate-course-text">

                                       <h5 onclick="course_detail('{{$courses->id}}');">{{ $courses->course_title}}</h5>

                                       <p>Start Date : <?php echo date("F d , Y", strtotime($courses->start_date))?></p> 

                                    </div>

                                    <div class="enrol-now-btn-area">

                                       <!-- <a class="enrol-now-btn" href="{{ url('course/'.str_replace(' ','-',$courses->course_title).'/'.base64_encode($courses->id)) }}">Enrol Now</a>  -->

                                       <form action="{{ url('course/'.str_replace(' ','-',$courses->course_title)) }}" method="post">

                                       @csrf

                                          <input type="hidden" name="id" value="{{base64_encode($courses->id)}}">

                                          <button type="submit" class="enrol-now-btn" id="submit{{$courses->id}}">Register Now</button>

                                       </form>

                                    </div>

                                 <!-- </a> -->

                                 </div>

                                 <!-- </a> -->

                              </div>

                              @endforeach

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </div>

   </div>

</section>

<script>

   var key = '<?= $_GET['courseType'] ?>';

   if (key == "Accelerator_Programs"){

      $('#London').show();

      $('#Paris').hide();

      $('#Mentorship').hide();

      $('#Tokyo').hide();

      $('.accelator ').addClass('active');

      $('.certification').removeClass('active');

      $('.career').removeClass('active');

      $('.free').removeClass('active');

      openCity(event, 'London');

   }else if (key == "Get_Certified"){

      $('#London').hide();

      $('#Paris').show();

      $('#Mentorship').hide();

      $('#Tokyo').hide();

      $('.accelator ').removeClass('active');

      $('.certification').addClass('active');

      $('.career').removeClass('active');

      $('.free').removeClass('active');

      openCity(event, 'Paris');

   }else if (key == "Career_Mentorship"){

      $('#London').hide();

      $('#Paris').hide();

      $('#Mentorship').show();

      $('#Tokyo').hide();

      $('.accelator ').removeClass('active');

      $('.certification').removeClass('active');

      $('.career').addClass('active');

      $('.free').removeClass('active');

      openCity(event, 'Tokyo');

   }else if (key == "Free_Courses"){

      $('#London').hide();

      $('#Paris').hide();

      $('#Mentorship').hide();

      $('#Tokyo').show();

      $('.accelator ').removeClass('active');

      $('.certification').removeClass('active');

      $('.career').removeClass('active');

      $('.free').addClass('active');

      openCity(event, 'Tokyo');

   }

   function course_detail(id){

      $('#submit'+id).trigger('click');

   }

</script>

<!--Accelerate Course Section End Here -->

<!--Accelerate Course leading companies Section Start Here -->

<!-- <section class="accelerate-leading-companies-info">

   <div class="container">

      <div class="row">

         <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="accelerate-leading-companies-heading text-center">

               <h4>Our Talent work with many of these leading companies</h4>

            </div>

         </div>

         @foreach($ldingcompns as $ldingcompnses)

         <div class="col-lg-2 col-md-12 col-6">

            <div class="tech-companies-box">

               <img src="{{ url('assets/upload_stpartners/'.$ldingcompnses->image)}}" height="100%" width="100%" alt="">

            </div>

         </div>

         @endforeach

      </div>

   </div>

</section> -->

<!--Accelerate Course leading companies Section End Here -->

@include('frontend.slider-with-chatButton')

@include('frontend.include.footer')

<script>

   function openCity(evt, cityName) {

     var i, tabcontent, tablinks;

     tabcontent = document.getElementsByClassName("tabcontent");

     for (i = 0; i < tabcontent.length; i++) {

       tabcontent[i].style.display = "none";

     }

     tablinks = document.getElementsByClassName("tablinks");

     for (i = 0; i < tablinks.length; i++) {

       tablinks[i].className = tablinks[i].className.replace(" active", "");

     }

     document.getElementById(cityName).style.display = "block";

     evt.currentTarget.className += " active";

   }

   

   // Get the element with id="defaultOpen" and click on it

   document.getElementById("defaultOpen").click();

</script>