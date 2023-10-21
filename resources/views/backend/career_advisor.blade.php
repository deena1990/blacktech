@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Career Advisor</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Career Advisor</li>
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
                      <h5 class="card-title">Career Advisor List</h5>
                      <table class="table" id="example1">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Name</th>
                               <!-- <th scope="col">First Name</th> -->
                               <!-- <th scope="col">Last Name</th> -->
                               <th scope="col">Phone</th>
                               <th scope="col">Email</th>
                               <th scope="col">Interested Course</th>
                               <th scope="col">Contact Date</th>
                            </tr>
                         </thead>
                         <tbody>
                           @foreach($advisor as $key=>$advisors)
                            <tr>
                               <th>{{ ++$key }}</th>
                               <td>{{ $advisors->first_name }} {{ $advisors->last_name }}</td>
                               <!-- <td>{{ $advisors->first_name }}</td> -->
                               <!-- <td>{{ $advisors->last_name }}</td> -->
                               <td>{{ $advisors->phone }}</td>
                               <td>{{ $advisors->email }}</td>
                               <td>{{ $advisors->course_interest }}</td>
                               <td><?=$advisors->created_at?></td>
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