@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Event Registration List</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Event Registration List</li>
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
                      <h5 class="card-title">Event Registration List</h5>
                      <table class="table" id="example1">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Name</th>
                               <!-- <th scope="col">F Name</th> -->
                               <!-- <th scope="col">L Name</th> -->
                               <th scope="col">Gender</th>
                               <th scope="col">Phone</th>
                               <th scope="col">Email</th>
                               <th scope="col">City</th>
                               <th scope="col">Country</th>
                               <th scope="col">Event Name</th>
                               <th scope="col">Registration Date</th>
                            </tr>
                         </thead>
                         <tbody>
                           @foreach($event as $key=>$events)
                           <?php $eventName = DB::table('tbl_event')->where('id',$events->event_id)->first()->name;  ?>
                            <tr>
                               <th>{{ ++$key }}</th>
                               <td>{{ $events->first_name }} {{ $events->last_name }}</td>
                               <!-- <td>{{ $events->first_name }}</td> -->
                               <!-- <td>{{ $events->last_name }}</td> -->
                               <td>{{ $events->gender }}</td>
                               <td>{{ $events->phone }}</td>
                               <td>{{ $events->email }}</td>
                               <td>{{ $events->city }}</td>
                               <td>{{ $events->country }}</td>
                               <td>{{ $eventName }}</td>
                               <td><?=$events->created_at?></td>
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