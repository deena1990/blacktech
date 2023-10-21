@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Event Users</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Event Users</li>
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
                      <h5 class="card-title">Event Users</h5>
                      <table class="table" id="example1" style="width:98%;">
                        <thead>
                           <tr>
                              <th scope="col">Id</th>
                           
                              <th scope="col">First Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Email</th>
                              <th scope="col">Country</th>
                              <th scope="col">City</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($reg_users as $key=>$reg_user)
                           <tr>
                              <td>{{ ++$key }}</td>
                           
                              <td>{{$reg_user->first_name}}</td>
                              <td>{{$reg_user->last_name}}</td>
                              <td>{{$reg_user->gender}}</td>
                              <td>{{ $reg_user->phone }}</td>
                              <td>{{$reg_user->email}}</td>
                              <td>{{$reg_user->country}}</td>
                              <td>{{$reg_user->city}}</td>
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