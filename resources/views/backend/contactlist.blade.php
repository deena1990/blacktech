@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Contact List</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact List</li>
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
                      <h5 class="card-title">Contact List</h5>
                      <table class="table" id="example1">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Course</th>
                               <th scope="col">Name</th>
                               <!-- <th scope="col">First Name</th> -->
                               <!-- <th scope="col">Last Name</th> -->
                               <th scope="col">Phone</th>
                               <th scope="col">Email</th>
                               <th scope="col">Country</th>
                               <!-- <th scope="col">City</th> -->
                               <th scope="col">Contact Date</th>
                            </tr>
                         </thead>
                         <tbody>
                           @foreach($contact as $key=>$contacts)
                           <tr>
                               <th>{{ ++$key }}</th>
                               <td>{{ $contacts->course_title }}</td>
                               <td>{{ $contacts->first_name }} {{ $contacts->last_name }}</td>
                               <!-- <td>{{ $contacts->first_name }}</td> -->
                               <!-- <td>{{ $contacts->last_name }}</td> -->
                               <td>{{ $contacts->phone }}</td>
                               <td>{{ $contacts->email }}</td>
                               <td>{{ $contacts->country }}</td>
                               <!-- <td>{{ $contacts->city }}</td> -->
                               <td><?=$contacts->created_at?> </td>
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