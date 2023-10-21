@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Signin List</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Signin List</li>
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
                      <h5 class="card-title">Signin List</h5>
                      <table class="table" id="example1">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Email</th>
                               <th scope="col">Password</th>
                               <th scope="col">Signin Date</th>
                          
                            </tr>
                         </thead>
                         <tbody>
                           @foreach($signin as $key=>$signins)
                            <tr>
                               <th>{{ ++$key }}</th>
                               <td>{{ $signins->email }}</td>
                               <td>{{ md5($signins->password) }}</td>
                               <td><?=$signins->created_at?></td>
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