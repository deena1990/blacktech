<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('admin/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      
      <!-- End Profile Page Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#cms" data-bs-toggle="collapse" href="#">
          <i class="bi bi-sliders"></i><span>CMS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="cms" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/show_slider') }}">
              <i class="bi bi-circle"></i><span>Slider</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_banner') }}">
              <i class="bi bi-circle"></i><span>Banner</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_forbes_section') }}">
              <i class="bi bi-circle"></i><span>Forbes Section</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_stpartners') }}">
              <i class="bi bi-circle"></i><span>Strategic Partners</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_ldingcompns') }}">
              <i class="bi bi-circle"></i><span>Leading Companies</span>
            </a>
          </li>
          <!-- <li>
            <a href="{{ url('admin/show_reviews') }}">
              <i class="bi bi-circle"></i><span>Reviews</span>
            </a>
          </li> -->
          <li>
            <a href="{{ url('admin/show_team') }}">
              <i class="bi bi-circle"></i><span>Team Members</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_events') }}">
              <i class="bi bi-circle"></i><span>Events</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_speakers') }}">
              <i class="bi bi-circle"></i><span>Speakers</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/refer_friend') }}">
              <i class="bi bi-circle"></i><span>Refer Friend</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/edt_course_terms_privacy') }}">
              <i class="bi bi-circle"></i><span>Course Terms & Privacy</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#aboutus" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book-half"></i><span>About Us CMS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="aboutus" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/show_section1') }}">
              <i class="bi bi-circle"></i><span>Section 1</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_section2') }}">
              <i class="bi bi-circle"></i><span>Section 2</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_section3') }}">
              <i class="bi bi-circle"></i><span>Section 3</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_metrics_counter') }}">
              <i class="bi bi-circle"></i><span>Metrics Counter</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_alumni') }}">
              <i class="bi bi-circle"></i><span>BlackTECH Alumni</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/hreoalumni_talent_list') }}">
              <i class="bi bi-circle"></i><span>Alumni Talent List</span>
            </a>
          </li>
          <!-- <li>
            <a href="{{ url('admin/show_recupartners') }}">
              <i class="bi bi-circle"></i><span>Recruiting Partners</span>
            </a>
          </li> -->
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book-half"></i><span>Courses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/show_course') }}">
              <i class="bi bi-circle"></i><span>Courses</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_installment_charges') }}">
              <i class="bi bi-circle"></i><span>Installment Charges</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_instructure') }}">
              <i class="bi bi-circle"></i><span>Instructor</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/show_careermap') }}">
              <i class="bi bi-circle"></i><span>Career Road Map</span>
            </a>
          </li>
          
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#testimonials" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layers-fill"></i><span>Testimonials</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="testimonials" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/testimonials') }}">
              <i class="bi bi-circle"></i><span>Testimonial</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/testimonials_show_video') }}">
              <i class="bi bi-circle"></i><span>Video</span>
            </a>
          </li>
          
        </ul>
       
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/show_coupon') }}">
          <i class="bi bi-coin"></i>
          <span>Coupon</span>
        </a>
      </li>

      <!-- End Testimonial Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#payments" data-bs-toggle="collapse" href="#">
          <i class="bi bi-wallet-fill"></i><span>Payments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="payments" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/3months_payment') }}">
              <i class="bi bi-circle"></i><span>3 Months</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/2months_payment') }}">
              <i class="bi bi-circle"></i><span>2 Months</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#contactlists" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-lines-fill"></i><span>Contacts List</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="contactlists" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/contact_list') }}">
              <i class="bi bi-circle"></i><span>Contact List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/signin_list') }}">
              <i class="bi bi-circle"></i><span>Signin List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/referafrnd_list') }}">
              <i class="bi bi-circle"></i><span>Refer A Friend List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/career_advisor') }}">
              <i class="bi bi-circle"></i><span>Career Advisor</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/hreoalumni_list') }}">
              <i class="bi bi-circle"></i><span>Hire Our Alumni</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/eventr_list') }}">
              <i class="bi bi-circle"></i><span>Event Registration</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/courser_list') }}">
              <i class="bi bi-circle"></i><span>Course Registration</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/course_outline_list') }}">
              <i class="bi bi-circle"></i><span>Course Outline</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/subscriber_list') }}">
              <i class="bi bi-circle"></i><span>Subscribers List</span>
            </a>
          </li>
          
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/admin_contact') }}">
          <i class="bi bi-envelope-dash-fill"></i>
          <span>Contact Update</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/send_mass_emails') }}">
          <i class="bi bi-envelope-dash-fill"></i>
          <span>Send Mass Emails</span>
        </a>
      </li>
      
      <!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/logout') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside>

 <script src="{{ URL::asset('assets/backend/js/multiselect.js') }}"></script>

