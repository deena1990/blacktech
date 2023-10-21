@include('backend.include.header')
@include('backend.include.sidebar')
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Course Outline List</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Course Outline List</li>
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
                      <h5 class="card-title">Course Outline List</h5>
                      <table class="table" id="example1">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Course Name</th>
                               <th scope="col">Name</th>
                               <!-- <th scope="col">F Name</th> -->
                               <!-- <th scope="col">L Name</th> -->
                               <th scope="col">Phone</th>
                               <th scope="col">Email</th>
                               <th scope="col">Registration Date</th>
                            </tr>
                         </thead>
                         <tbody>
                           @foreach($course_outline_list as $key=>$events)
                            <tr>
                              <?php $courseName = DB::table('tbl_course')->where('id',$events->course_id)->first()->course_title; ?>
                               <th>{{ ++$key }}</th>
                               <td>{{ $courseName }}</td>
                               <td>{{ $events->first_name }} {{ $events->last_name }}</td>
                               <!-- <td>{{ $events->first_name }}</td> -->
                               <!-- <td>{{ $events->last_name }}</td> -->
                               <td>{{ $events->phone }}</td>
                               <td>{{ $events->email }}</td>
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