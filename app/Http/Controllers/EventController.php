<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use Session;

class EventController extends Controller
{ 
    public function insert_event(Request $request)
    { 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_events/", $name);
            $imageName = $name;
     
         }else
         {
            $imageName = "no file upload";
         }
         $name=$request->input('name');
         $about_event=$request->input('about_event');
         $event_date=$request->input('event_date');
         $event_time=$request->input('event_time');
         // Code start by Deena Nath
         $event_wblink=$request->input('event_wblink');
         $event_speakers = implode(',',$request->event_speakers);
         // Code end by Deena Nath

         $values=array(
            'image' => $imageName,
            'name' => $name,
            'about_event' => $about_event,
            'event_date' => $event_date,
            'event_time' => $event_time,
            'event_wblink' => $event_wblink,
            'event_speakers' => $event_speakers,
            'status' =>1,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
         );
         //dd($values);
         DB::table('tbl_event')->insert($values);
         Session::flash('message','Event Added Sucessfully.');
         return redirect('admin/show_events');
    }
    public function show_events()
    {
        // $data['event']=DB::table('tbl_event')->orderBy('id','DESC')->get();
        // Code start by Deena Nath
        $data['event']=DB::table('tbl_event')->orderBy('id','DESC')->get();
        $data['speakers']=DB::table('tbl_speakers')->orderBy('id','DESC')->get();
        // Code end by Deena Nath
        return view('backend.show_events',$data);
    }
    public function del_events($id)
    {
        DB::table('tbl_event')->where('id',$id)->delete();
        DB::table('tbl_evnt_registered_users')->where('event_id',$id)->delete();
        Session::flash('message','Event Deleted Sucessfully.');
        return redirect('admin/show_events');
    }
    public function edt_eventv($id)
    {
        $select['speakers']=DB::table('tbl_speakers')->get();
        $select['event'] = DB::table('tbl_event')->where('id', $id)->get();
        return view('backend.edt_eventv', $select);
    }
    public function edt_event(Request $request)
    {
        $id =$request->event_id;
        $pre_event =$request->pre_event;
        if ($request->hasFile('new_event')) {
            $new_event = $request->file('new_event');
            $name = time().'.'.$new_event->getClientOriginalExtension();
            $new_event->move("assets/upload_events/", $name);
            $imageName = $name;
     
         }else
         {
            $imageName = "$request->pre_event";
         }
         $name=$request->input('name');
         $about_event=$request->input('about_event');
         $event_date=$request->input('event_date');
         $event_time=$request->input('event_time');
         // Code start by Deena Nath
         $event_wblink=$request->input('event_wblink');
         $event_speakers = implode(',',$request->event_speakers);
         // Code end by Deena Nath

         $values=array(
            'image' => $imageName,
            'name' => $name,
            'about_event' => $about_event,
            'event_date' => $event_date,
            'event_time' => $event_time,
            'event_wblink' => $event_wblink,
            'event_speakers' => $event_speakers,
            // 'status' =>1,
            // 'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
         );
         //dd($values);
         DB::table('tbl_event')->where('id', $id)->update($values);
         Session::flash('message','Event Updated Sucessfully.');
         return redirect('admin/show_events');
    }
    
    public function event_speakers($event_id)
    {
        // dd($event_id);   
        $event_speakers_id = explode(',',DB::table('tbl_event')->where('id',$event_id)->first()->event_speakers);
        $data ['event_speakers'] = DB::table('tbl_speakers')->whereIn('id',$event_speakers_id)->get();
        // dd($data);
        return view('backend.event_speakers',$data);
    }

    public function event_change_status($event_id)
     {
      $events = DB::table('tbl_event')->select('status')->where('id','=',$event_id)->first();
        //Check alumni status
        if($events->status == '1'){
            $status = 0;
            $statusName = "Inactive";
        }
        if($events->status == '0'){
            $status = 1;
            $statusName = "Active";
        }
        $values = array('status' => $status );
        DB::table('tbl_event')->where('id',$event_id)->update($values);

        Session::flash('message' , 'Status changed to ' .$statusName. ' successfully.');
        return redirect('admin/show_events');
     }
    public function show_speakers()
    {
        $data['speaker']=DB::table('tbl_speakers')->orderBy('id','DESC')->get();
        return view('backend.show_speakers',$data);
    }
    public function insert_speakers(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_speakers/", $name);
            $imageName = $name;
     
         }else
         {
            $imageName = "no file upload";
         }
        $speaker_name=$request->input('speaker_name');
        $job_title=$request->input('job_title');
        $company=$request->input('company');
        $brief_description=$request->input('brief_description');

        $values=array(
        'image' => $imageName,
        'speaker_name' => $speaker_name,
        'job_title' => $job_title,
        'company' => $company,
        'brief_description' => $brief_description,
        'status' =>1,
        'created_at'=>date("Y-m-d H:i:s"),
        'updated_at'=>date("Y-m-d H:i:s")
        );
        //dd($values);
        //dd($speaker_name);
        DB::table('tbl_speakers')->insert($values);
        Session::flash('message','Speakers Added Sucessfully.');
        return redirect('admin/show_speakers');
    }
    public function del_speakers($id)
    {
        $speakers = DB::table('tbl_speakers')->where('id',$id)->delete();
        Session::flash('message','Speaker Deleted Sucessfully.');
        return redirect('admin/show_speakers');
    }
    public function edit_speakersv($id){
       
        $data['speaker'] = DB::table('tbl_speakers')->where('id',$id)->get();
        return view('backend.edit_speakersv',$data);
    }
    public function edit_speakers(Request $request)
    {
       $id=$request->speaker_id;
       $speaker_img=$request->image;
       //dd($speaker_img);
       if ($request->hasFile('nimage')) {
        $nimage = $request->file('nimage');
        $name = time().'.'.$nimage->getClientOriginalExtension();
        $nimage->move("assets/upload_speakers/", $name);
        $imageName = $name;
 
     }else
     {
        $imageName = "$request->image";
     }
        $speaker_name=$request->input('speaker_name');
        $job_title=$request->input('job_title');
        $company=$request->input('company');
        $brief_description=$request->input('brief_description');
        $values=array(
            'image' => $imageName,
            'speaker_name' => $speaker_name,
            'job_title' => $job_title,
            'company' => $company,
            'brief_description' => $brief_description,
            'status' =>1,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
            );
        //dd($values) ; 
        DB::table('tbl_speakers')->where('id',$id)->where('status',1)->update($values);
        Session::flash('message','Speakers Updated Sucessfully.');
        return redirect('admin/show_speakers');   

    }
    public function evnt_registerd($event_id)
    {
        //dd($id);   
        $data['reg_users']=DB::table('tbl_evnt_registered_users')->where('event_id',$event_id)->orderBy('id','DESC')->get();
        //dd($data);
        return view('backend.evnt_registerd',$data);
    }
}
