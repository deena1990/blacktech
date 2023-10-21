@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>2 Months Payment List</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">2 Months Payment List</li>
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
                      <h5 class="card-title">2 Months Payment List</h5>
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
                           @foreach($two_months_payments as $key=>$two_months_payment)
                           <?php $courseName = DB::table('tbl_course')->where('id',$two_months_payment->course_id)->first()->course_title; ?>
                            <tr>
                               <th>{{ ++$key }}</th>
                               <td>{{ $two_months_payment->first_name }} {{ $two_months_payment->last_name }}</td>
                               <td>{{ $two_months_payment->phone }}</td>
                               <td>{{ $two_months_payment->email }}</td>
                               <td>{{ $two_months_payment->country }}</td>
                               <td>{{ $courseName }}</td>
                               <td>{{ $two_months_payment->paymentPlan }}</td>
                               <td>{{ $two_months_payment->paid_amount }}</td>
                               <td><?=date('d-m-Y',strtotime($two_months_payment->created_at))?></td>
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