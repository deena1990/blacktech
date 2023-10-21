@section('title', 'Event Description')
@include('frontend.include.header')

<!--inner breadcrumb Section Start Here -->

<!-- <section class="inner-banner-detail-area">
 <div class="inner-banner-img-area">
  <img src="images/refer-a-friend-bnr-2.jpg" alt="Refer a friend">
 </div>
 <div class="breadcrum-info-main-area">   
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <div class="breadcrum-info-title">
      <h2>Join us at our Events</h2>
     </div> 
    </div> 
   </div>  
  </div> 
</div>
</section> -->

<!--inner breadcrumb Section end Here -->

<!--Event Description Section end Here -->

<style type="text/css">
  .event-description-img-area img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    border-radius: 10px;
}
.event-date-describtion p {
    word-break: break-word;
}
.event-description-speakers-info {
    display: flex;
    justify-content: flex-start;
    margin: 20px 0px 0px 0px;
}
.speakers-info-main-area {
    position: inherit;
    margin-right: 40px;
}
.speaker-name p {
    background: #0000000a;
    color: #000000;
    text-align: center;
    font-size: 16px;
    font-weight: 500;
    border-top: 1px solid #d9d9d9;
    margin: 12px 0px 0px 0px;
    position: inherit;
    width: 100%;
    bottom: 20px;
}
.speaker-detail-main-info p {
    margin-bottom: 4px;
    font-size: 14px;
}
.speaker-detail-main-info h4 {
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
}
.speakers-img-area img {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    object-fit: cover;
}
i.fa.fa-angle-left {
    line-height: 37px !important;
}
.event-name a h3 {
    font-size: 22px;
}
.speaker-detail-main-info {
    max-height: 322px;
    overflow: auto;
}
.speaker-detail-main-info::-webkit-scrollbar {
       width: 5px;
   }
.speaker-detail-main-info::-webkit-scrollbar-thumb {
       background: #dbd8d8; 
       border-radius: 10px;
   }
</style>



<section class="event-description-info-area">
 <div class="container">
  <div class="row">
   <div class="col-lg-9 col-md-6 col-sm-6">
    <div class="event-description-detail">
     <div class="event-name"> 
        <a href="{{ url('events')}}">
          <h3><i class="fa fa-angle-left" aria-hidden="true"></i> Back to Events page</h3>
       </a>
      <!-- @foreach($event as $events)
      <h5>Events > {{ $events->name }}</h5>  -->
    </div>
    <div class="event-description-img-area">
     <img src="{{ url('assets/upload_events/'.$events->image)}}" alt="demo"> 
    </div>
     <div class="event-description-content-info">
     <div class="event-inforamtion-area">
      <div class="event-full-name-info">
       <h2>{{ $events->name}}</h2> 
      </div>
      <div class="event-date-time-venu">
       <ul>
        <li><img src="{{ URL::asset('assets/frontend/images/calendar.png') }}" alt=""><?php echo date("F d Y", strtotime($events->event_date))?></li> 
        <li><img src="{{ URL::asset('assets/frontend/images/clock.png') }}" alt=""><?php echo date("h:i A" , strtotime($events->event_time) ) ?></li> 
        <!-- <li><a href="{{ $events->event_wblink }}" target="_blank"><img src="{{ URL::asset('assets/frontend/images/camera.png') }}" alt="">Event Weblink</a></li>  -->
        
    </ul> 
      </div>
     </div> 
     <div class="event-date-describtion">
      <h4>Details</h4>
      <p>{!! $events->about_event !!}</p>
     </div>
     </div>
    </div> 
    @endforeach

    <div class="event-description-speakers-details">
     <div class="our-speaker-info-area">
      <h4>Speakers</h4>
     </div> 
    @foreach($speaker as $speakers)
    <div class="event-description-speakers-info">
     <div class="speakers-info-main-area">
      <div class="speakers-img-area">
       <img src="{{ url('assets/upload_speakers/'.$speakers->image)}}" alt="Speakers Image"> 
      </div>
      <div class="speaker-name">
       <p>{{ $speakers->speaker_name }}</p>
      </div>
     </div>
     <div class="speaker-detail-main-info">
       <h4>{{ $speakers->job_title }}</h4>
       <p>{{ $speakers->company }}</p> 
       <p>{!! $speakers->brief_description !!}</p>
      </div> 
    </div>
    @endforeach
   </div> 
  </div>

   <div class="col-lg-3 col-md-6 col-sm-6">
   @foreach($event as $events)
   <form action="{{ url('insert_evntdesc') }}" method="post">
     @csrf
    <div class="evnet-right-side-info">
     <h4>Consent</h4>
     <p>I am interested in obtaining more information about partners, events and future job opportunities and authorize BlackTECH Academy to share my profile information with their partners.</p>
    </div>   
    <div class="conform-check-box-area">
    <input type="hidden" value="{{ $events->id }}" name="event_id">
    <input type="checkbox" id="consent" name="consent" value="{{ $events->name}}">
    <label for="vehicle1"> I Agree</label> 
    </div> 
    <div class="event-register-btn-area">
     <input type="submit" id="submit" class="event-register-btn"  disabled="disabled" value="Register">
     <!-- <a class="event-register-btn" href="{{ url('event_registration', [$events->id]) }}">Register</a>  -->
    </div>
    </form>
   @endforeach
   </div> 
  </div>
  </div>

</section>
<!--Event Description Section end Here -->

@include('frontend.include.footer')
<script>
 var checker = document.getElementById('consent');
 var sendbtn = document.getElementById('submit');
 // when unchecked or checked, run the function
 checker.onchange = function(){
    if(this.checked){
        sendbtn.disabled = false;
    } else {
        sendbtn.disabled = true;
    }
}
</script>