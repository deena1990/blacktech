  @include('backend.include.header')
  @include('backend.include.sidebar')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ ('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Total Courses</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <!-- <i class="bi bi-cart"></i> -->
                      <i class="bi bi-book-half"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$count_courses}}</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                      <span class="text-success small pt-1 fw-bold">Courses</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->
                <div class="card-body">
                  <h5 class="card-title">Total Events</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-event"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$count_events}}</h6>
                      <span class="text-success small pt-1 fw-bold">Events</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->
                <div class="card-body">
                  <h5 class="card-title">Total Payments</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <!-- <i class="bi bi-currency-dollar"></i> -->
                      <i class="bi bi-wallet-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$total_payments}}</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                      <span class="text-success small pt-1 fw-bold">Payments</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Current Week Earnings</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>${{$current_week_earnings}}</h6>
                      <span class="text-success small pt-1 fw-bold">Earnings</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Current Month Earnings</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>${{$current_month_earnings}}</h6>
                      <span class="text-success small pt-1 fw-bold">Earnings</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Total Earnings</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>${{$total_earnings}}</h6>
                      <span class="text-success small pt-1 fw-bold">Earnings</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            
            <!-- End Revenue Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Add Courses</h5>
                  
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Course Type</th>
                        <th scope="col">Course Name</th>
                        <!-- <th scope="col">Instructor Name</th> -->
                        <th scope="col">Image</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Next Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($dash_course as $key=>$dash_courses)
                      <?php $courseType = DB::table('tbl_course_list')->where('id',$dash_courses->course_type)->first();?>
                      <tr>
                        <th scope="row">{{ ++$key }}</th>                           
                        <td>{{ $courseType->course }}</td>
                        <td>{{ $dash_courses->course_title }}</td>
                        <!-- <td>{{ $dash_courses->instructor_name }}</td> -->
                        <td><img src="{{ url('assets/course_img/'.explode(':::',$dash_courses->image)[0]) }}" height="50" width="100"></td>
                        <td>{{ $dash_courses->start_date }}</td>
                        <td>{{$dash_courses->next_date }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <!-- <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling Courses</h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ URL::asset('assets/backend/img/product-1.jpg') }}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ URL::asset('assets/backend/img/product-2.jpg') }}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ URL::asset('assets/backend/img/product-3.jpg') }}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ URL::asset('assets/backend/img/product-4.jpg') }}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{URL::asset('assets/backend/img/product-5.jpg') }}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div> -->
            <!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main>
  @include('backend.include.footer')