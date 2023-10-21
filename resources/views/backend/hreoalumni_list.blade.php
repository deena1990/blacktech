@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Hire Our Alumni List</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Hire Our Alumni List</li>
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
                      <h5 class="card-title">Hire Our Alumni List</h5>
                      <table class="table" id="example1">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Name</th>
                               <!-- <th scope="col">First Name</th> -->
                               <!-- <th scope="col">Last Name</th> -->
                               <th scope="col">Phone</th>
                               <th scope="col">Email</th>
                               <th scope="col">Company</th>
                               <th scope="col">Talent Required</th>
                               <th scope="col">Contact Date</th>
                            </tr>
                         </thead>
                         <tbody>
                              @foreach($hreoalumni as $key=>$hreoalumnis)
                              <tr>
                               <th>{{ ++$key }}</th>
                               <td>{{ $hreoalumnis->first_name }} {{ $hreoalumnis->last_name}}</td>
                               <!-- <td>{{ $hreoalumnis->first_name }}</td> -->
                               <!-- <td>{{ $hreoalumnis->last_name}}</td> -->
                               <td>{{ $hreoalumnis->phone }}</td>
                               <td>{{ $hreoalumnis->email }}</td>
                               <td>{{ $hreoalumnis->company}}</td>
                               <td>{{ $hreoalumnis->talent}}</td>
                               <td><?=$hreoalumnis->created_at?></td>
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