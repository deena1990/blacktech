<!-- ======= Header Start ======= -->
@include('backend.include.header')
<!-- ======= Header End ======= -->

<!-- ======= Sidebar Start ======= -->
@include('backend.include.sidebar')
<!-- ======= Sidebar End ======= -->
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Inroll History</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Inroll History</li>
             </ol>
            </nav>
       </div>
       <section class="section">
          <div class="row">
             <div class="col-lg-12">
                <div class="card">
                   <div class="card-body table-responsive">
                      <h5 class="card-title">Inroll History</h5>
                      <table class="table datatable">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">User Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Course</th>
                               <th scope="col">Total Amount</th>
                               <th scope="col">Start Date</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <th scope="row">1</th>
                               <td>Priyanka Yadav</td>
                               <td>priya@gmail.com</td>
                               <td>B-Tech</td>
                               <td>100000 Rs</td>
                               <td>2016-05-25</td>
                            </tr>
                            <tr>
                               <th scope="row">2</th>
                               <td>Priyanka Yadav</td>
                               <td>priya@gmail.com</td>
                               <td>Diploma</td>
                               <td>100000 Rs</td>
                               <td>2016-05-25</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                               <td>Priyanka Yadav</td>
                               <td>priya@gmail.com</td>
                               <td>Diploma</td>
                               <td>100000 Rs</td>
                               <td>2016-05-25</td>
                            </tr>
                            <tr>
                            <th scope="row">4</th>
                               <td>Priyanka Yadav</td>
                               <td>priya@gmail.com</td>
                               <td>Diploma</td>
                               <td>100000 Rs</td>
                               <td>2016-05-25</td>
                            </tr>
                            <tr>
                            <th scope="row">5</th>
                               <td>Priyanka Yadav</td>
                               <td>priya@gmail.com</td>
                               <td>Diploma</td>
                               <td>100000 Rs</td>
                               <td>2016-05-25</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </section>
    </main>
 <!-- ======= Footer ======= -->
 @include('backend.include.footer')
 <!-- ======= End Footer ======= -->      