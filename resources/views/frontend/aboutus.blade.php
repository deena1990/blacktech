@section('title', 'About Us')

@include('frontend.include.header')

<!--inner breadcrumb Section Start Here -->

<style>

  /* .team_profile_image img{

    width:200px;

    height:200px;

  } */

  .section-padding{

  padding:40px 0;

}

.brand-carousel {

  /* background: #eee; */

  margin-top: 2%;

}

.owl-dots{

  text-align: center;

}



.owl-dot {

  display: inline-block;

  height: 15px !important;

  width: 15px !important;

  background-color: #222222 !important;

  opacity: 0.8;

  border-radius: 50%;

  margin: 0 5px;

}



.owl-dot.active {

  background-color: #FF170F !important;

}



.slider_images .owl-carousel .single-logo img {

  height: 200px;

  width: 200px !important;

  border-radius: 50%;

}



.join-high-flying-circel {

  margin: 30px 0px 22px 0px;

}



/* pratima css morqq start */

.brand-carousel.section-padding {

  display: none;

}

logo-slider {  

      padding: 0px;

      overflow: hidden;

      width: 100%;

      margin: 0 auto;   

      position: relative;

      display: flex;

    }

    logo-slider:hover div {

      /* animation-play-state: paused; */

    }

    logo-slider div { 

      display: flex;

      position: relative;

      animation: marquee 10s linear infinite;

      justify-content: space-around;

    }

    logo-slider div img {

      display: block;

      height: 80px;

      width: 100px;

      margin: 0 1vw;

      object-fit: contain;

    }

    logo-slider div img:after {

      content: "";

      position: absolute;

      width: 100%;

      height: 100%;

      left: 0;

      top: 0;

      background: linear-gradient(to right, white, rgba(white, 0) 80px, rgba(white, 0) calc(100% - 80px), white);

    }

    @keyframes marquee {

        0%   { transform: translateX(0%); }

        100% { transform: translateX(-100%); }

    }

    section.our-story-info-area {

    background-position: top center;

    background-size: 100% 100%;}

    /* pratima css mprq */

     .commited-fighting-underemployment {

    background-position: top center;

    background-size: cover;}

    

</style>



<section class="inner-banner-detail-area">

 <div class="inner-banner-img-area">

  <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[1]) }}" alt="Refer a friend">

 </div>

 <div class="breadcrum-info-main-area">   

  <div class="container">

   <div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

     <div class="breadcrum-info-title">

      <h2>About BlackTECH Academy</h2>

     </div> 

    </div> 

   </div>  

  </div> 

</div>

</section>



<!--inner breadcrumb Section end Here -->



<!--Our Story Section Start Here -->



<section class="our-story-info-area" style=" background-color:white; background-image:url(assets/frontend/images/abs-bg.png);">

 <div class="container">

  <div class="row">

  @foreach($section_one as $section_ones)

    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

     <div class="our-story-img-area mb-5">

      <img src="{{ url('assets/upload_aboutus/'.$section_ones->image1)}}">

     </div>

     <div class="our-story-img-area">

      <img src="{{ url('assets/upload_aboutus/'.$section_ones->image2)}}">

     </div>

    </div>

  

    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

     <div class="our-story-detail-area">

      <h2>{{ $section_ones->title}}</h2>

      <p>{!! $section_ones->description !!}</p>

    </div>

    </div>

  @endforeach 

  </div>

 </div>

</section>



<!--Our Story Section end Here -->



<!--Black Tech Advantage Section Start Here -->



<section  class="black-tech-advantage-info-area">

 <div class="container">

  <div class="row">

   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="black-tech-advantage-hading-area">

     <h2>BlackTECH Advantage</h2>

     <p>Experential Learning</p> 

    </div>

    <div class="black-tech-advantage-detail">

     <div class="advantage-box-detail-info">

    <div class="advantage-box-img-area">

     <img src="{{ URL::asset('assets/frontend/images/matrix.jpg') }}" alt="color game"> 

    </div>

   </div> 

    </div> 

   </div> 

  </div>

 </div> 

</section>



<!--Black Tech Advantage Section end Here -->





<!--About why choose Section Start Here -->



<section class="about-why-choose-info">

 <div class="container">

  <div class="row">

   <div class="col-lg-12 col-md-12 col-sm-12">

    <div class="about-why-choose-box-info" id="counter">

      @foreach($metrics_counters as $metrics_counter)

      <div class="about-why-choose-box counter">

        <div class="about-choose-icon">

          <img src="{{ URL::asset('assets/course_img/'.$metrics_counter->image) }}" alt="user"> 

        </div>

        <span id="first{{$metrics_counter->id}}" class="count-digit">{{preg_replace('/[^0-9]/', '', $metrics_counter->count)}}</span>

        <span id="second{{$metrics_counter->id}}" style="display:none;">{{$metrics_counter->count}}</span>

        <p>

          @foreach(explode(' ',$metrics_counter->name) as $counter_name )

          {{$counter_name}}

          <br>

          @endforeach

        </p>

      </div>

      <script>

        $(window).scroll(function(){



            if(visible($('.count-digit')))

            {

              setTimeout(() => {

              $('#first{{$metrics_counter->id}}').hide();

              $('#second{{$metrics_counter->id}}').show();

            }, 5000);

            }

        });

      </script>

      @endforeach

    </div>

   </div> 

  </div>

 </div> 

</section>



<!--About why choose Section end Here -->





<!--Commited Fighting Underemployment Section Start Here -->



<section class="commited-fighting-underemployment" style=" background-color:white; background-image:url(assets/frontend/images/ser-bg.png)">

 <div class="container">

  <div class="row">

    @foreach($section_two as $section_twos)

   <div class="col-lg-6 col-md-12 col-sm-12">

    <div class="commited-fighting-detail-area">

     <h2>{{ $section_twos->title }}</h2> 

     <p>{!! $section_twos->description !!}</p>

    </div>

   </div> 

   <div class="col-lg-6 col-md-12 col-sm-12">

    <div class="commited-fighting-img-area">

    <img src="{{ url('assets/upload_aboutus/'.$section_twos->image)}}" alt=""> 

    </div>

   </div> 

   @endforeach

  </div>

 </div>

</section>

<!--Commited Fighting Underemployment Section end Here -->



<!--Commited Fighting Underemployment Section start Here -->



<section class="you-too-can-pivot-info">

 <div class="container">

  @foreach($section_three as $section_threes)

  <div class="row">

   <div class="col-lg-6 col-md-12 col-sm-12">

    <div class="you-too-can-pivot-img-area">

     <img src="{{ url('assets/upload_aboutus/'.$section_threes->image)}}" alt="can pivot"> 

    </div>

   </div>

   <div class="col-lg-6 col-md-12 col-sm-12">

    <div class="you-too-can-pivot-detail">

     <h2 class="text-center py-3">{{ $section_threes->title }}</h2> 

     <div class="you-too-can-pivot-listing">

      <p>{!! $section_threes->description !!}</p>

     </div>

    </div>

   </div>

  </div>

  @endforeach

 </div>

</section>



<!--Commited Fighting Underemployment Section end Here -->



<!--Meet Our Team Section Start Here -->



<section class="meet-our-team-info-area" >

 <div class="container">

  <div class="row">



   <div class="col-lg-12 col-md-12 col-sm-12">

    <div class="meet-our-team-heading">

     <h2>Meet our Incredible Team</h2> 

    </div>

   </div>



   @foreach($team as $teams)

   <div class="col-lg-3 col-md-12 col-6">

    <div class="meet-our-team-box-info">

     <div class="meet-our-team-img-area team_profile_image">

      <img src="{{ url('assets/upload_team/'.$teams->image)}}" alt="">

     </div>

     <div class="meet-our-team-text-area">

      <h4>{{ $teams->name}}</h4>

      <p>{{ $teams->role }}</p>

     </div> 

    </div> 

   </div>  

   @endforeach

  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center m-5">

    <div class="refer-friend-btn-area">

      <h3>And 50+ expert Instructors working for the best companies</h3>

    </div>

  </div>

 </div>

</section>



<!--Meet Our Team  Section End Here -->



<!--Join High Flying Section Start Here -->



 <!-- <section class="slider_images join-high-flying-info"> -->
 <section class="connect-hiring-strategic-main">
 
  <div class="container">

    <div class="row">

      <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="join-high-flying-heading pb-5"> 

          <h4>Join High Flying BlackTECH Alumni at</h4> 

        </div>

      </div>

      <!-- by pratima morq -->

      <div class="row">

      <?php 

      $asd = array();

      $asd1 = array();

      $asd2 = array();

      $asd3 = array();

      $asd4 = array();



      foreach ($stpartner as $key => $value) {

        if(count($asd) < intval(explode('.',(count($stpartner)/5))[0])){

           array_push($asd, $value);

        }else if(count($asd1) < intval(explode('.',(count($stpartner)/5))[0])){

          array_push($asd1, $value);

        }else if(count($asd2) < intval(explode('.',(count($stpartner)/5))[0])){

          array_push($asd2, $value);

        }else if(count($asd3) < intval(explode('.',(count($stpartner)/5))[0])){

          array_push($asd3, $value);

        }else if(count($asd4) < intval(explode('.',(count($stpartner)/5))[0])){

          array_push($asd4, $value);

        }

      } 

// dd(intval(explode('.',(count($stpartner)/5))[0]));

      ?>

        <logo-slider>

          @if(count($asd) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd as $alumnis)

              <img src="{{ url('assets/upload_stpartners/'.$alumnis->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd1) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd1 as $alumnis)

              <img src="{{ url('assets/upload_stpartners/'.$alumnis->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd2) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd2 as $alumnis)

              <img src="{{ url('assets/upload_stpartners/'.$alumnis->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd3) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd3 as $alumnis)

              <img src="{{ url('assets/upload_stpartners/'.$alumnis->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd4) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd4 as $alumnis)

              <img src="{{ url('assets/upload_stpartners/'.$alumnis->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

      </div>

    </div>

  </div>

</section> 

 

<!-- morquee by pratima -->



<!-- morquee by pratima -->

<!--Join High Flying Section End Here -->



  

@include('frontend.include.footer')