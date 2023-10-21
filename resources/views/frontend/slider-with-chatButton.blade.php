



<section class="connect-hiring-strategic-main">

   <div class="container">

      <div class="row">

         <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="connect-hiring-heading-main pb-5">

               <!-- <h2>Connect with our Hiring and Strategic Partners</h2> -->

               <h2>Our Talents Work With Many of these Leading Tech Companies</h2>

            </div>

         </div>

         <div class="col-lg-12 col-md-12 col-sm-12">

            



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

              @foreach($asd as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd1) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd1 as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd2) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd2 as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd3) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd3 as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

        <logo-slider>

          @if(count($asd4) == intval(explode('.',(count($stpartner)/5))[0]))

            @for($i=0;$i<"10";$i++)

            <div>

              @foreach($asd4 as $stpartners)

              <img src="{{ url('assets/upload_stpartners/'.$stpartners->image)}}" alt="angular">

              @endforeach

            </div>

            @endfor

          @endif

        </logo-slider>

      </div>





         </div>

      </div>

   </div>

</section>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">

  <div class="refer-friend-btn-area pt-5 pb-5">

    <h3 class="d-inline m-3">Chat or Connect with a Career Advisor</h3>
    <a href="https://wa.me/{{explode(':::',$content->status)[0]}}" class="refer-friend-btn">
      <img src="https://www.itdevelopmentservices.com/blacktech/assets/frontend/images/whatsapp.png" alt="">
      <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->

    </a>

  </div>

</div>