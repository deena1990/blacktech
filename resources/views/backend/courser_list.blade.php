@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Course Registration List</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Course Registration List</li>
             </ol>
             <!-- <a href="{{ ('admin_contact') }}"><button type="button" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Add Contact Details</button></a>
           -->
            </nav>
       </div>
       <section class="section">
          <div class="row">
             <div class="col-lg-12">
                <div class="card">
                   <div class="card-body">
                      <h5 class="card-title">Course Registration List</h5>
                      <table class="table" id="example1">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Name</th>
                               <th scope="col">Phone</th>
                               <th scope="col">Email</th>
                               <th scope="col">Country</th>
                               <th scope="col">Course Name</th>
                               <th scope="col">Payment Plan</th>
                               <th scope="col">Paid Amount</th>
                               <th scope="col">Registration Date</th>
                            </tr>
                         </thead>
                         <tbody>
                           @foreach($course_registrations as $key=>$course_registration)
                           <?php $courseName = DB::table('tbl_course')->where('id',$course_registration->course_id)->first()->course_title; ?>
                            <tr>
                               <th>{{ ++$key }}</th>
                               <td>{{ $course_registration->first_name }} {{ $course_registration->last_name }}</td>
                               <td>{{ $course_registration->phone }}</td>
                               <td>{{ $course_registration->email }}</td>
                               <td>{{ $course_registration->country }}</td>
                               <td>{{ $courseName }}</td>
                               <td>{{ $course_registration->paymentPlan }}</td>
                               <td>{{ $course_registration->paid_amount }}</td>
                               <td><?=$course_registration->created_at?></td>
                            </tr>
                            @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </section>
    </main>
@include('backend.include.footer')