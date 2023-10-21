@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Refer A Friend</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Refer A Friend</li>
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
                      <h5 class="card-title">Refer A Friend</h5>
                      <table class="table" id="example1">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">User Name</th>
                               <!-- <th scope="col">User First Name</th> -->
                               <!-- <th scope="col">User Last Name</th> -->
                               <!-- <th scope="col">User Email</th> -->
                               <th scope="col">User Phone</th>
                               <!-- <th scope="col">Country</th> -->
                               <!-- <th scope="col">City</th> -->
                               <th scope="col">Course Recommended</th>
                               <th scope="col">Referring Name</th>
                               <!-- <th scope="col">Referring First Name</th> -->
                               <!-- <th scope="col">Referring Last Name</th> -->
                               <!-- <th scope="col">Referring Email</th> -->
                               <th scope="col">Referring Phone</th>
                               <th scope="col">Refer Date</th>
                            </tr>
                         </thead>
                         <tbody>
                           @foreach($referafrnd as $key=>$referafrnds)
                            <tr>
                               <th>{{ ++$key }}</th>
                               <td>{{ $referafrnds->u_firstname }} {{ $referafrnds->u_lastname }}</td>
                               <!-- <td>{{ $referafrnds->u_firstname }}</td> -->
                               <!-- <td>{{ $referafrnds->u_lastname }}</td> -->
                               <!-- <td>{{ $referafrnds->u_email }}</td> -->
                               <td>{{ $referafrnds->u_phone }}</td>
                               <!-- <td>{{ $referafrnds->u_country }}</td> -->
                               <!-- <td>{{ $referafrnds->u_city }}</td> -->
                               <td>{{ $referafrnds->rec_course }}</td>
                               <td>{{ $referafrnds->r_firstname }} {{ $referafrnds->r_lastname }}</td>
                               <!-- <td>{{ $referafrnds->r_firstname }}</td> -->
                               <!-- <td>{{ $referafrnds->r_lastname }}</td> -->
                               <!-- <td>{{ $referafrnds->r_email }}</td> -->
                               <td>{{ $referafrnds->r_phone }}</td>
                               <td><?=$referafrnds->created_at?></td>
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