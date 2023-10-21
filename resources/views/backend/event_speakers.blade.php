@include('backend.include.header')
@include('backend.include.sidebar')
<style>
   img.speaker_image {
      height: 100px;
      width: 100px;
      border: 2px solid darkgray;
      border-radius: 50px;
   }
</style>
    <main id="main" class="main">
       <div class="pagetitle">
          <h1>Event Speakers</h1>
          <nav>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Event Speakers </li>
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
                      <h5 class="card-title">Event Speakers</h5>
                      <table class="table" id="example1">
                         <thead>
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Image</th>
                               <th scope="col">Name</th>
                               <th scope="col">Company</th>
                               <th scope="col">Job Title</th>
                               <!-- <th scope="col">Description</th> -->
                               <th scope="col">Status</th>
                               <!-- <th scope="col">Action</th> -->
                            </tr>
                         </thead>

                         <tbody>
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($event_speakers as $key=>$event_speaker)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td><img src="{{url('assets/upload_speakers')}}/{{$event_speaker->image}}" alt="speaker_image" class="speaker_image"></td>
                           <td>{{$event_speaker->speaker_name}}</td>
                           <td>{{$event_speaker->company }}</td>
                           <td>{{$event_speaker->job_title}}</td>
                           <!-- <td><?php echo $event_speaker->brief_description; ?></td> -->
                           <td>
                              <?php if($event_speaker->status==1){?>
                                 <span class="text-success">Active</span>
                              <?php }elseif($event_speaker->status==0){?>
                                 <span class="text-danger">Inactive</span>
                              <?php }?>
                           
                           </td>
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