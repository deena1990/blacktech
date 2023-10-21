<!-- Footer section start Here -->
<style type="text/css">
  .subscribe-btn-footer{
    display: flex;
  }
  .subscribe-btn-footer button.subscribe-btn {
    border: none;
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
  }
  .news-latter-info-area .form-control {
    padding: 10px 0px 10px 10px;
    border: 1px solid #e3e2e2;
    font-size: 17px;
    color: #808080;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
}
.partner-logo-info ul li:nth-child(1) img{
  background-color:white;
}
.partner-logo-info ul li:nth-child(4) img {
  background: white;
    padding: 5px;
    border-radius: 16%;
}
.partner-logo-info li {
  padding-bottom: 10px;
}
.partner-logo-info h5{
  padding:7px 5px;
}
.footer-logo-area img {
    width: 85px;
}
.footer-about-compnay p{
max-width:90%;
}

</style>
<footer>
<div class="footer-info-main-area"> 
 <div class="container">
  <div class="row">
   <div class="col-lg-4 col-md-6 mt-4">
    <div class="footer-logo-area">
     <a href="{{ url('/') }}"> 
      <!-- <img src="{{ URL::asset('assets/frontend/images/logoblack.png') }}" alt="logo">  -->
      <img src="{{URL::asset('assets/upload_logo/'.$content->logo) }}" alt="logo"> 
     </a>
    </div>
    <!-- @if(Session::has('message1'))
      <p class="alert alert-success" id="show_alert_msg">{{ Session::get('message1') }}</p>
    @endif -->
    <div class="footer-about-compnay" id="show_msg">
      <!-- <h5>Stay Connected</h5>   -->
      <!-- <p>Join our mailing list for free and stay up to date on our upcoming events</p> -->
      <h5>{{explode(':::',$content->status)[1]}}</h5>  
      <p><?php echo explode(':::',$content->status)[2]; ?></p>
    </div>
  <div class="news-latter-info-area">
    <form action="{{url('/insert_subscriber')}}" method="post" onsubmit="return validateEmail();" class="subscribe-btn-footer">
      @csrf
      <input type="email" name="email" placeholder="Email" id="emailId" class="form-control" required>
      <button type="submit" class="subscribe-btn">Subscribe</button>
    </form>
  </div>  
 <span class="text-danger" id="emailId_error"></span>
 </div>
 <script>
  function validateEmail(){
    var email = document.getElementById('emailId').value;
    var emailformat = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    if(!email.match(emailformat)){
      document.getElementById('emailId_error').innerHTML="Please enter email in valid email format";
      setTimeout(() => {
         document.getElementById('emailId_error').innerHTML ="";
      }, 5000);
      return false;
     }
  }
 </script>
 <div class="col-lg-2 col-md-3 col-6 mt-4">
  <div class="useful-links-menu-info">  
   <h5>Useful Links</h5>
   <ul>
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('about') }}">About us</a></li>
    <li><a href="{{ url('courses?courseType=Accelerator_Programs') }}">Courses</a></li>
    <li><a href="{{ url('events') }}">Events</a></li>
    <li><a href="{{ url('testimonials') }}">Testimonials</a></li>
    <li><a href="{{ url('referafrnd') }}">Refer A Friend</a></li> 
   </ul>  
 </div> 
 </div>
  <!-- <div class="col-lg-2 col-md-3 col-6 mt-4">
  <div class="useful-widget-menu-info"> 
   <h5></h5>
   <ul>
    <li><a href="{{ url('events') }}">Events</a></li>
    <li><a href="{{ url('testimonials') }}">Testimonials</a></li>
    <li><a href="{{ url('referafrnd') }}">Refer A Friend</a></li> 
   </ul>  
 </div> 
 </div> -->
 <div class="col-lg-3 col-md-6 col-6 mt-4">
  <div class="social-contact-menu-info">  
   <h5>Contact Us</h5>
   <ul>
    <li><a href="{{$content->linkedIn}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn</a></li>
    <li><a href="{{$content->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
    <li><a href="{{$content->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
    <li><a href="{{$content->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>{{$content->email}}</a></li>
    <li><a href="tel:{{$content->phone}}"><i class="fa fa-phone" aria-hidden="true"></i>{{$content->phone}}</a></li>
   </ul>  
 </div> 
 </div>
 <div class="col-lg-3 col-md-6 col-6 mt-4">
  <div class="partner-logo-info">  
   <h5>Authorized Trainer Partners</h5>
   <ul>
    <li> <img src="{{ URL::asset('assets/frontend/images/IIBA-EEP-Logo.webp') }}"></li>
    <li> <img src="{{ URL::asset('assets/frontend/images/CompTIA.webp') }}"></li>
    <li> <img src="{{ URL::asset('assets/frontend/images/Sans-logo.png') }}"></li>
    <li> <img src="{{ URL::asset('assets/frontend/images/google2.png') }}"></li>
    <li> <img src="{{ URL::asset('assets/frontend/images/amazonImg.png') }}"></li>
   </ul>  
 </div> 
 </div>
</div>
</div>
</div>  
<div class="copyright-area">
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-6 col-sm-6">
    <div class="copyright-area-text">
     <p>© Copyright 2021 Black Tech Entrepreneurship & Career Hub. All Rights Reserved. <a href="{{url('privacy')}}" target="_blank">Privacy Policy</a></p>
    </div>
   </div>
  </div>  
 </div> 
</div>
</footer>

<!--Footer section end Here -->
<!-- <script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "5465186b75cf4ca3603f78dc53e4f18e576ae21f8d707e97768215a94e03c2aceed8400439a0c8c4656e5b379fc014fb", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.in/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script> -->
<script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "af382a560827f5fae9aaa0921ae61808faaa35874f10ae830ee28400fa7a0df206d41bc0051137eb0c5e53b299a5b180", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/frontend/js/owl.carousel.js') }}"></script>
<script type="text/javascript">
  /*stikymenu*/
  $(window).scroll(function(){
            if($(this).scrollTop() > 100){
                $('.stikymenu').addClass('sticky')
            } else{
                $('.stikymenu').removeClass('sticky')
            }
        });
</script>
<script>
   $('.brand-carousel').owlCarousel({
  loop:true,
  margin:10,
  autoplay:true,
  responsive:{
    0:{
      items:1
    },
    600:{
      items:3
    },
    1000:{
      items:5
    }
  }
})
  </script>
  <!-- <script>
  var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {
          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});
  </script> -->
  <script>
    function visible(partial) {
    var $t = partial,
        $w = jQuery(window),
        viewTop = $w.scrollTop(),
        viewBottom = viewTop + $w.height(),
        _top = $t.offset().top,
        _bottom = _top + $t.height(),
        compareTop = partial === true ? _bottom : _top,
        compareBottom = partial === true ? _top : _bottom;

    return ((compareBottom <= viewBottom) && (compareTop >= viewTop) && $t.is(':visible'));

}

$(window).scroll(function(){

  if(visible($('.count-digit')))
    {
      if($('.count-digit').hasClass('counter-loaded')) return;
      $('.count-digit').addClass('counter-loaded');
      
$('.count-digit').each(function () {
  var $this = $(this);
  jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
    duration: 5000,
    easing: 'swing',
    step: function () {
      $this.text(Math.ceil(this.Counter));
    }
  });
});
    }
})
  </script>
  <script>
    $(document).ready(function() {
      if($('#exampleModal1').text() != ""){
        $('#trigger_button').trigger('click');
        setTimeout(() => {
          window.location.reload();
        }, 6000);
      }
    });
  </script>
</html>