@section('title', 'Join Our Events')
@include('frontend.include.header')
<!--inner breadcrumb Section Start Here -->
<style>
  .event-list-img-box img {
    width: 100%;
    object-fit: scale-down;
    border-radius: 10px 10px 0px 0px;
    height: 250px;
    object-fit: cover;
}
 .event-list-info-area {
    background-size: cover;
    background-position: top center;
}
</style>
<section class="inner-banner-detail-area">
 <div class="inner-banner-img-area">
  <img src="{{ URL::asset('assets/upload_aboutus/'.explode(':::',$section_one[0]->status)[2]) }}" alt="Refer a friend">
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
</section>

<!--inner breadcrumb Section end Here -->

<!--Event List Section Start Here -->

<section class="event-list-info-area" style=" background-color:white; background-image:url(assets/frontend/images/ser-bg.png);">
 <div class="container">
  <div class="row">
    @foreach($event as $events)
    <div class="col-lg-4 col-md-12 col-sm-12">
      <!-- <a href="{{ url('event_description', [$events->id]) }}"> -->
      <!-- <a href="{{ url('event/'.str_replace(' ','-',$events->name)) }}"> -->
         <div class="event-list-box-info">
            <div class="event-list-img-box">
               <img src="{{ url('assets/upload_events/'.$events->image)}}" alt="event"> 
            </div>
            <div class="event-list-detail">
               <h4>{{ $events->name }}</h4>
               <p><?php echo date("F d Y", strtotime($events->event_date)). " || " .date("h:i A", strtotime($events->event_time)) ?></p> 
            </div>
            <div class="event-view-detail-btn">
               <form action="{{ url('event/'.str_replace(' ','-',$events->name)) }}" method="post">
               @csrf
                  <input type="hidden" name="id" value="{{base64_encode($events->id)}}">
                  <input type="submit" class="view-event-btn" value="View Event">
               </form>
            </div>
         </div> 
      <!-- </a> -->
    </div>   

    @endforeach
  </div>
 </div>
</section>
<!--Event List Section End Here -->
@include('frontend.slider-with-chatButton')
@include('frontend.include.footer')

