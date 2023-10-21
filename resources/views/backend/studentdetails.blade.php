@include('backend.include.header')
@include('backend.include.sidebar')
<!-- Main Section Start-->
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Students Details</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Students Details</li>
             </ol>
            </nav>
       </div>
       <section class="section">
          <div class="row">
             <div class="col-lg-12">
                <div class="card">
                   <div class="card-body table-responsive">
                      <h5 class="card-title">Students Details</h5>
                      <table class="table datatable">
                         <thead>
                            <tr>
                               <th scope="col">User Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Phone</th>
                               <th scope="col">Status</th>
                               <th scope="col">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <th scope="row">Priyanka</th>
                               <td>priya@gmail.com</td>
                               <td>91 000 000</td>
                               <td>Active</td>
                               <td><button class="btn btn-success">Enable</button></td>
                            </tr>
                            <tr>
                               <th scope="row">Priyanka</th>
                               <td>priya@gmail.com</td>
                               <td>91 000 000</td>
                               <td>Active</td>
                               <td><button class="btn btn-danger">Disable</button></td>
                            </tr>
                            <tr>
                                <th scope="row">Priyanka</th>
                               <td>priya@gmail.com</td>
                               <td>91 000 000</td>
                               <td>Active</td>
                               <td><button class="btn btn-danger">Disabled</button></td>
                            </tr>
                            <tr>
                               <th scope="row">Priyanka</th>
                               <td>priya@gmail.com</td>
                               <td>91 000 000</td>
                               <td>Active</td>
                               <td><button class="btn btn-success">Enable</button></td>
                            </tr>
                            <tr>
                               <th scope="row">Priyanka</th>
                               <td>priya@gmail.com</td>
                               <td>91 000 000</td>
                               <td>Active</td>
                               <td><button class="btn btn-danger">Disabled</button></td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </section>
    </main>
 <!-- Main Section End-->
 @include('backend.include.footer')     