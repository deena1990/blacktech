<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function login(){
        return view('backend.index');
    }
    public function dashboard(Request $request){
        $name    = $request->name;
        $remember_token   = $request->remember_token;
        $password = md5($request->password);
        //dd($password);
        $check = DB::table('users')
                      ->where('name',$name)
                      ->where('password',$password);
        if($check->count()!=0)
        {
          $row= $check->first();
        
          session::put('id',$row->id);
  
          session::put('name',$row->name);
  
          session::put('email',$row->email);
          
          session::put('profile_img',$row->profile_img);

          session::put('password', $row->password);
         // dd(session('id'));
           return redirect('/admin/dashboard');
        }
        else{   
            //dd(session('id'));
          Session::flash('message','Username and Password are not correct.');
          return redirect('/admin');
        }

    }
    public function admin_index()
    {
        // dd(date('m',strtotime('sunday this week')));
        $monday = date('Y-m-d H:i:s',strtotime('monday this week'));
        $sunday = date('Y-m-d H:i:s',strtotime('sunday this week'));
        $data['count_courses']=DB::table('tbl_course')->where('status',1)->count();
        $data['count_events']=DB::table('tbl_event')->where('status',1)->count();
        $data['dash_course']=DB::table('tbl_course')->where('status',1)->orderBy('id', 'desc')->take(5)->get();
        $data['total_earnings']=DB::table('tbl_course_enroll_list')->sum('paid_amount');
        $data['current_week_earnings']=DB::table('tbl_course_enroll_list')->whereBetween('created_at',[$monday, $sunday])->sum('paid_amount');
        $data['current_month_earnings']=DB::table('tbl_course_enroll_list')->whereMonth('created_at', date('m'))->sum('paid_amount');
        $data['total_payments']=DB::table('tbl_course_enroll_list')->count();
        return view('backend.dashboard',$data);
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/admin');
    }
    
    public function admin_contact()
    {
        $data['content']=DB::table('tbl_cntfooter')->first();
        return view('backend.contact',$data);
    }
    public function contact_list()
    { 
        $contact_data['contact']=DB::table('tbl_contact')
                                // ->leftJoin('tbl_course_list', 'tbl_contact.course', '=', 'tbl_course_list.id')
                                ->leftJoin('tbl_course', 'tbl_contact.course', '=', 'tbl_course.id')
                                ->select('tbl_contact.*', 'tbl_course.course_title')
                                ->where('tbl_contact.status',1)
                                ->orderBy('tbl_contact.id','DESC')
                                ->get();
        //dd($contact_data);
        return view('backend.contactlist',$contact_data);
    }
    public function user_profile()
    {
        return view('backend.users-profile');
    }
    public function career_advisor(){
        $data['advisor']=DB::table('tbl_career_advisor')->where('status',1)->orderBy('id','DESC')->get();
        return view('backend.career_advisor',$data);
    }
    public function hreoalumni_list()
    {
        $data['hreoalumni']=DB::table('tbl_hreoalumni')->where('status',1)->orderBy('id','DESC')->get();
        return view('backend.hreoalumni_list',$data);
    }
    public function insert_ftr_cnt(Request $request)
    {  
        $id=$request->contact_update_id;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $name = time().'.'.$logo->getClientOriginalExtension();
            $logo->move("assets/upload_logo", $name);
            $imageName = $name;
         }
         else
         {
            $imageName = "$request->image";
         }
        $email=$request->input('email');
        $phone=$request->input('phone');
        $linkedIn=$request->input('linkedIn');
        $twitter=$request->input('twitter');
        $facebook=$request->input('facebook');
        $instagram=$request->input('instagram');
        $spotlight=$request->input('spotlight');
        $whatsapp=$request->input('whatsapp');
        $beginyourJourney=$request->input('beginyourJourney');
        $footer_heading=$request->input('footer_heading');
        $footer_content=$request->input('footer_content');
        $values=array(
            'logo' => $imageName,
            'email' => $email,
            'phone' => $phone,
            'linkedIn' => $linkedIn,
            'twitter' => $twitter,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'beginyourJourney' => $beginyourJourney,
            'status' => $whatsapp.":::".$footer_heading.":::".$footer_content.":::".$spotlight,
            // 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );
        //dd($values);
        DB::table('tbl_cntfooter')->where('id',$id)->update($values);
        Session::flash('message','Contact Information Updated Sucessfully.');
        return redirect('/admin/admin_contact');
    }
    public function show_stpartners()
    {
        $data['stpartner']=DB::table('tbl_stpartners')->where('status',1)->orderBy('id','DESC')->get();
        return view('backend.show_stpartners',$data);
    }
    public function insert_stpartners(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_stpartners/", $name);
            $imgName = $name;
     
         }else
         {
            $imgName = "no file upload";
         }
         $name=$request->input('name');
         $values=array(
            'image' => $imgName,
            'name' => $name,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
         );
         //dd($values);
        $stpartners=DB::table('tbl_stpartners')->insert($values);
        Session::flash('message' , 'Data added sucessfully');
        return redirect('admin/show_stpartners');
    }
    public function del_stpartners($id)
    {
        $course = DB::table('tbl_stpartners')->where('id',$id)->delete();
        Session::flash('message','Data Deleted Sucessfully.');
        return redirect('admin/show_stpartners');
    }
    public function edit_stpartnersv($id)
    {
       $select['stpartners'] = DB::table('tbl_stpartners')->where('id', $id)->get();
       return view('backend.edit_stpartnersv', $select);
    }
    public function edit_stpartners(Request $request)
    {
        $id =$request->stpartners_id;
        // $image=$request->image;
        // dd($image);
        if ($request->hasFile('new_image')) {
            $new_image = $request->file('new_image');
            $name = time().'.'.$new_image->getClientOriginalExtension();
            $new_image->move("assets/upload_stpartners/", $name);
            $imgName = $name;
     
         }else
         {
            $imgName = "$request->image";
         }
         $name=$request->input('name');
         $values=array(
            'image' => $imgName,
            'name' => $name,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
         );
         //dd($values);
        $stpartners=DB::table('tbl_stpartners')->where('id',$id)->update($values);
        Session::flash('message' , 'Data updated sucessfully');
        return redirect('admin/show_stpartners');
    }
    public function show_ldingcompns()
    {
        $data['ldingcompns']=DB::table('tbl_ldingcompns')->orderBy('id','DESC')->get();
        return view('backend.show_ldingcompns',$data);
    }
    public function insert_ldingcompns(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_stpartners/", $name);
            $imgName = $name;
     
         }else
         {
            $imgName = "no file upload";
         }
         $name=$request->input('name');
         $values=array(
            'image' => $imgName,
            'name' => $name,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
         );
         //dd($values);
        $ldingcompns=DB::table('tbl_ldingcompns')->insert($values);
        Session::flash('message' , 'Data added sucessfully');
        return redirect('admin/show_ldingcompns');
    }
    public function del_ldingcompns($id)
    {
        $ldingcompns = DB::table('tbl_ldingcompns')->where('id',$id)->delete();
        Session::flash('message','Data Deleted Sucessfully.');
        return redirect('admin/show_ldingcompns');
    }
    public function edit_ldingcompnv($id)
    {
        $select['ldingcompns'] = DB::table('tbl_ldingcompns')->where('id', $id)->get();
        return view('backend.edit_ldingcompnv', $select);
    }
    public function edit_ldingcompns(Request $request)
    {
        $id =$request->ldingcompns_id;
        // $image=$request->image;
        // dd($image);
        if ($request->hasFile('new_image')) {
            $new_image = $request->file('new_image');
            $name = time().'.'.$new_image->getClientOriginalExtension();
            $new_image->move("assets/upload_stpartners/", $name);
            $imgName = $name;
     
         }else
         {
            $imgName = "$request->image";
         }
         $name=$request->input('name');
         $values=array(
            'image' => $imgName,
            'name' => $name,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
         );
         //dd($values);
        $ldingcompns=DB::table('tbl_ldingcompns')->where('id',$id)->update($values);
        Session::flash('message' , 'Data added sucessfully');
        return redirect('admin/show_ldingcompns');
    }
    public function show_reviews()
    {
        $data['review']=DB::table('students_reviews')->orderBy('id','DESC')->get();   
        return view('backend.show_reviews',$data);
    }
    public function insert_reviews(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_aboutus/", $name);
            $imgName = $name;
     
         }else
         {
            $imgName = "no file upload";
         }
     $rating=$request->input('rating');
     $name=$request->input('name');
     $title=$request->input('title');
     $designation=$request->input('designation');
     $brief_description=$request->input('brief_description');
     $values=array(
        'rating' => $rating,
        'image' => $imgName,
        'name' => $name,
        'title' => $title,
        'designation' => $designation,
        'brief_description' => $brief_description,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
     );
     //dd($values);
     $data=DB::table('students_reviews')->insert($values);
     Session::flash('message' , 'Data added sucessfully');
     return redirect('admin/show_reviews');
    }
    public function del_reviews($id)
    {
        $reviews = DB::table('students_reviews')->where('id',$id)->delete();
        Session::flash('message','Data Deleted Sucessfully.');
        return redirect('admin/show_reviews');  
    }
    public function edt_reviewsv($id)
    {
        $data['reviews'] = DB::table('students_reviews')->where('id', $id)->get();
        return view('backend.edt_reviewsv', $data);
    }
    public function edt_reviews(Request $request)
    {
        $id =$request->reviews_id;
        $image=$request->image;
        //  dd($image);
        if ($request->hasFile('new_image')) {
            $new_image = $request->file('new_image');
            $name = time().'.'.$new_image->getClientOriginalExtension();
            $new_image->move("assets/upload_stpartners/", $name);
            $imgName = $name;
     
         }else
         {
            $imgName = "$image";
         }
     $rating=$request->input('rating');
     $name=$request->input('name');
     $title=$request->input('title');
     $designation=$request->input('designation');
     $brief_description=$request->input('brief_description');
     $values=array(
        'rating' => $rating,
        'image' => $imgName,
        'name' => $name,
        'title' => $title,
        'designation' => $designation,
        'brief_description' => $brief_description,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
     );
     //dd($values);
     $data=DB::table('students_reviews')->where('id',$id)->update($values);
     Session::flash('message' , 'Record Updated Sucessfully.');
     return redirect('admin/show_reviews');
    }
    public function referafrnd_list()
    {
     $data['referafrnd'] =DB::table('tbl_referafrnd_list')->orderBy('id','DESC')->get(); 
     return view('backend.referafrnd_list',$data);
    }
    public function signin_list()
    {
     $data['signin'] =DB::table('tbl_signin')->orderBy('id','DESC')->get(); 
     return view('backend.signin_list',$data);
    }
    public function eventr_list()
    {
       $data['event']=DB::table('tbl_evnt_registered_users')->orderBy('id','DESC')->get();
       return view('backend.eventr_list',$data);
    }
    public function courser_list()
    {
       $data['course_registrations']=DB::table('tbl_course_enroll_list')->orderBy('id','DESC')->get();
       return view('backend.courser_list',$data);
    }
    public function three_months_payment()
    {
       $data['three_months_payments']=DB::table('tbl_course_enroll_list')->where('paymentPlan','3 months')->orderBy('id','DESC')->get();
       return view('backend.three_months_payment',$data);
    }
    public function two_months_payment()
    {
       $data['two_months_payments']=DB::table('tbl_course_enroll_list')->where('paymentPlan','2 months')->orderBy('id','DESC')->get();
       return view('backend.two_months_payment',$data);
    }
    public function course_outline_list()
    {
       $data['course_outline_list']=DB::table('tbl_course_outline')->orderBy('id','DESC')->get();
       return view('backend.course_outline_list',$data);
    }
    public function subscriber_list()
    {
       $data['subscriber_list']=DB::table('tbl_subscriber')->orderBy('id','DESC')->get();
       return view('backend.subscriber_list',$data);
    }

    public function hreoalumni_talent_list()
    {
        $data['talents']=DB::table('tbl_talents')->orderBy('id','DESC')->get();
        return view('backend.hreoalumni_talent_list',$data);
    }

    public function insert_alumni_talent(Request $request)
    {
        $insert=array(
            'talent_name' => $request->name,
        );
        DB::table('tbl_talents')->insert($insert);
        Session::flash('message' , 'Talent added sucessfully');
        return redirect('admin/hreoalumni_talent_list');
    }
    public function del_alumni_talent($id)
    {
        DB::table('tbl_talents')->where('id',$id)->delete();
        Session::flash('message','Talent Deleted Sucessfully.');
        return redirect('admin/hreoalumni_talent_list');
    }
    public function edt_alumniv_talent($id)
    {
        $data['talent']=DB::table('tbl_talents')->where('id',$id)->first();
        return view('backend.edt_alumniv_talent',$data);
    }
    public function edt_alumni_talent(Request $request)
    {
        $id=$request->talent_id;
        $update=array(
            'talent_name' => $request->name,
        );
        DB::table('tbl_talents')->where('id',$id)->update($update);
        Session::flash('message' , 'Talent Updated sucessfully');
        return redirect('admin/hreoalumni_talent_list');
    }
    function talent_status_update($id)
    {
        $talents = DB::table('tbl_talents')->select('status')->where('id','=',$id)->first();
        if($talents->status == '1'){
            $status = 0;
        }
        if($talents->status == '0'){
            $status = 1;
        }
        $update = array('status' => $status );
        DB::table('tbl_talents')->where('id',$id)->update($update);

        Session::flash('message' , 'Status Updated sucessfully');
        return redirect('admin/hreoalumni_talent_list');
    }

    public function edt_course_terms_privacy(){
        $data['course_terms_privacy']=DB::table('tbl_course_terms_privacy')->first();
        return view('backend.edt_course_terms_privacy',$data);
    }

    public function save_course_terms_privacy(Request $request){
        // dd($request->all());
        $id = $request->course_terms_privacy_id;
        $update = array(
            'term_use_heading' => $request->terms_heading,
            'term_use_description' => $request->terms_description,
            'refund_heading' => $request->refund_heading,
            'refund_description' => $request->refund_description,
            'rescheduling_heading' => $request->rescheduling_heading,
            'rescheduling_description' => $request->rescheduling_description,
            'privacy_heading' => $request->privacy_heading,
            'privacy_description' => $request->privacy_description,
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );

        DB::table('tbl_course_terms_privacy')->where('id',$id)->update($update);

        Session::flash('message' , 'Data Updated sucessfully');
        return redirect('admin/edt_course_terms_privacy');
    }

    public function show_metrics_counter(){
        $data['metrics_counters']=DB::table('metrics_counter')->where('status',1)->get();
        return view('backend.show_metrics_counter',$data);
    }

    public function edt_metrics_counter($id){
        $data['metrics_counter']=DB::table('metrics_counter')->where(['id'=>$id,'status'=>1])->first();
        return view('backend.edt_metrics_counter',$data);
    }

    public function insert_metrics_counter(Request $request){
        $id = $request->metrics_counter_id;
        $name = $request->name;
        $count = $request->count;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/course_img", $filename);
            $imageName = $filename;
        }else{
            $imageName = "$request->preimg";
        }
        $values=array(
            'image' => $imageName,
            'name' => $name,
            'count' => $count
        );
        DB::table('metrics_counter')->where('id',$id)->update($values);
        Session::flash('message','Metrics Counter updated sucessfully');
        return redirect('admin/show_metrics_counter');
    }
    
    public function send_event_reminder(Request $request)
    {
        // dd($request->all());

        $event_id = $request->event_id;
        $reminder_message = $request->reminder_message;
        $evnt_registered_users = DB::table('tbl_evnt_registered_users')->where('event_id',$event_id)->get();
        foreach ($evnt_registered_users as $key => $user_detail) {
            $user_email = $user_detail->email;
            $user_name = $user_detail->first_name.' '.$user_detail->last_name;

            /*mail*/

            // $insert = [
            //     'name'=>$user_name,
            //     'email'=>$user_email,
            //     'reminder_message'=>$reminder_message,
            // ]; 

            // Mail::send('emails.evt_reminder_email', $insert, function ($message) use ($insert) {

            //     $message->to($insert['email'], 'Event Reminder Email')

            //         ->subject('Event Reminder Email');

            //     $message->from('no-reply@itdevelopmentservices.com', 'BlackTECH');
            // });

            /*mail*/ 
        } 

        Session::flash('message', 'Event Reminder sent successfully.');
        return redirect('admin/show_events');
    }

    public function send_mass_emails(){
        $data['events'] = DB::table('tbl_event')->get();
        $data['courses'] = DB::table('tbl_course')->get();
        return view('backend.send_mass_emails',$data);
    }

    public function sentCourseId(Request $request){
        $courseId = $request->courseId;
        $courseRegUsers = DB::table('tbl_course_enroll_list')->where('course_id', $courseId)->get();
        foreach($courseRegUsers as $courseRegUser){
            echo '<option value="'.$courseRegUser->id.'">'.$courseRegUser->first_name.' '.$courseRegUser->last_name.'</option>';
        }
    }

    public function sentEventId(Request $request){
        $eventId = $request->eventId;
        $eventRegUsers = DB::table('tbl_evnt_registered_users')->where('event_id', $eventId)->get();
        foreach($eventRegUsers as $eventRegUser){
            echo '<option value="'.$eventRegUser->id.'">'.$eventRegUser->first_name.' '.$eventRegUser->last_name.'</option>';
        }
    }

    public function insert_send_mass_emails(Request $request){
        if($request->eventUsers){
            $subject = $request->subject;
            $event_message = strip_tags($request->message);
            $eventUsers = $request->eventUsers;
            foreach ($eventUsers as $eventUser) {
                $user_detail = DB::table('tbl_evnt_registered_users')->where('id',$eventUser)->first();
                $user_email = $user_detail->email;
                $user_name = $user_detail->first_name.' '.$user_detail->last_name;
                /*mail*/
    
                // $insert = [
                //     'name'=>$user_name,
                //     'email'=>$user_email,
                //     'subject'=>$subject,
                //     'event_message'=>$event_message,
                // ]; 
    
                // Mail::send('emails.event_mass_email', $insert, function ($message) use ($insert) {
    
                //     $message->to($insert['email'], $insert['subject'])
    
                //         ->subject($insert['subject']);
    
                //     $message->from('no-reply@itdevelopmentservices.com', 'BlackTECH');
                // });
    
                /*mail*/ 
            }
    
            Session::flash('emessage', 'Event related email sent successfully !!');
            return redirect('admin/send_mass_emails');
        }else{
            $subject = $request->subject;
            $course_message = strip_tags($request->message);
            $courseUsers = $request->courseUsers;
            foreach ($courseUsers as $courseUser) {
                $user_detail = DB::table('tbl_course_enroll_list')->where('id',$courseUser)->first();
                $user_email = $user_detail->email;
                $user_name = $user_detail->first_name.' '.$user_detail->last_name;
                /*mail*/
    
                // $insert = [
                //     'name'=>$user_name,
                //     'email'=>$user_email,
                //     'subject'=>$subject,
                //     'course_message'=>$course_message,
                // ]; 
    
                // Mail::send('emails.course_mass_email', $insert, function ($message) use ($insert) {
    
                //     $message->to($insert['email'], $insert['subject'])
    
                //         ->subject($insert['subject']);
    
                //     $message->from('no-reply@itdevelopmentservices.com', 'BlackTECH');
                // });
    
                /*mail*/ 
            }
    
            Session::flash('cmessage', 'Course related email sent successfully !!');
            return redirect('admin/send_mass_emails');
        }
    }

    public function edit_refer_friend(){
        $data['refer_friend'] = DB::table('tbl_refer_friend_page')->where('id',1)->first();
        return view('backend.edt_refer_friend', $data);
    }

    public function edt_refer_friend(Request $request){
        if ($request->hasFile('icon1')) {
            $icon1 = $request->file('icon1');
            $filename1 = 'friend.'.$icon1->getClientOriginalExtension();
            $icon1->move("assets/upload_aboutus", $filename1);
            $icon1Name = $filename1;
        }else{
            $icon1Name = "$request->pre_file1";
        }
        if ($request->hasFile('icon2')) {
            $icon2 = $request->file('icon2');
            $filename2 = 'program.'.$icon2->getClientOriginalExtension();
            $icon2->move("assets/upload_aboutus", $filename2);
            $icon2Name = $filename2;
        }else{
            $icon2Name = "$request->pre_file2";
        }
        if ($request->hasFile('icon3')) {
            $icon3 = $request->file('icon3');
            $filename3 = 'referral.'.$icon3->getClientOriginalExtension();
            $icon3->move("assets/upload_aboutus", $filename3);
            $icon3Name = $filename3;
        }else{
            $icon3Name = "$request->pre_file3";
        }
        $update = [
            'banner_content' => $request->banner_content,
            'icon1' => $icon1Name,
            'icon1description' => $request->icon1description,
            'icon2' => $icon2Name,
            'icon2description' => $request->icon2description,
            'icon3' => $icon3Name,
            'icon3description' => $request->icon3description,
            'description' => $request->description,
        ];
        DB::table('tbl_refer_friend_page')->where('id',1)->update($update);
        Session::flash('message', 'Refer Friend Page updated successfully !!');
        return redirect('admin/refer_friend');
    }
}
