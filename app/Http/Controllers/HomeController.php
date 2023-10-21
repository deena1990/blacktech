<?php







namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;

Use Mail;

use Session;

use Stripe;

use App\Http\Requests;

use Validator;

use URL;

use Redirect;

use Input;

use PayPal\Rest\ApiContext;

use PayPal\Auth\OAuthTokenCredential;

use PayPal\Api\Amount;

use PayPal\Api\Details;

use PayPal\Api\Item;

use PayPal\Api\ItemList;

use PayPal\Api\Payer;

use PayPal\Api\Payment;

use PayPal\Api\RedirectUrls;

use PayPal\Api\ExecutePayment;

use PayPal\Api\PaymentExecution;

use PayPal\Api\Transaction;



class HomeController extends Controller

{

    public function index(){

        $data['menubar']='index';

        $data['ap_courses']=DB::table('tbl_course')->where('course_type', "1")->where('status', 1)->orderby('id','desc')->take(9)->get();

        $data['cc_courses']=DB::table('tbl_course')->where('course_type', "2")->where('status', 1)->orderby('id','desc')->take(9)->get();

        $data['fc_courses']=DB::table('tbl_course')->where('course_type', "3")->where('status', 1)->orderby('id','desc')->take(9)->get();

        $data['cm_courses']=DB::table('tbl_course')->where('course_type', "4")->where('status', 1)->orderby('id','desc')->take(9)->get();

        $data['slider']=DB::table('tbl_slider')->where('status',1)->get();

        $data['forbes_section']=DB::table('tbl_forbes_section')->where('status',1)->first();

        $data['courses'] = DB::table('tbl_course')->whereIn('course_type', [1,2])->where('status', 1)->get();

        $data['stpartner'] = DB::table('tbl_stpartners')->where('status', 1)->get();

        $data['ldingcompns'] = DB::table('tbl_ldingcompns')->where('status', 1)->get();

        $data['course'] = DB::table('tbl_course')->where('status', 1)->take(8)->get();

        $data['testimonial'] = DB::table('tbl_testimonials')->where('status', 1)->get();

        $data['metrics_counters']=DB::table('metrics_counter')->where('status',1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.index',$data);

    }

    public function about()

    {

        $data['menubar']='about';

        $data['team']=DB::table('tbl_team')->where('status',1)->orderby('position_id','asc')->get();

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['section_two']=DB::table('tbl_ab_section2')->orderby('id','desc')->take(1)->get();

        $data['section_three']=DB::table('tbl_ab_section3')->orderby('id','desc')->take(1)->get();

        $data['stpartner'] = DB::table('tbl_stpartners')->where('status', 1)->get(); 
        
        $data['alumni']=DB::table('tbl_alumni')->where('status',1)->orderby('id','desc')->get();

        $data['metrics_counters']=DB::table('metrics_counter')->where('status',1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.aboutus',$data);

    }

    public function referafrnd()

    {

        $data['menubar']='referafrnd';

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        // $data['course'] = DB::table('tbl_course_list')->where('status', 1)->get();

        $data['course']=DB::table('tbl_course')->where('status', 1)->get();

        $data['refer_friend'] = DB::table('tbl_refer_friend_page')->where('id',1)->first();

        $data['stpartner'] = DB::table('tbl_stpartners')->where('status', 1)->get();

        $data['country']=DB::table('tbl_countrylist')->orderby('country_name','ASC')->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.refer-a-friend',$data);

    }

    public function contactus()

    { 

        $data['menubar']='contactus';

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['country']=DB::table('tbl_countrylist')->orderby('country_name','ASC')->get();

        $data['course_types'] = DB::table('tbl_course_list')->where('status', 1)->get();

        $data['stpartner'] = DB::table('tbl_stpartners')->where('status', 1)->get(); 

        $data['courses'] = DB::table('tbl_course')->whereIn('course_type', [1,2])->where('status', 1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.contactus', $data);

    }

    public function testimonials()

    {

        $data['menubar']='testimonials';

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['testimonial'] = DB::table('tbl_testimonials')->where('status', 1)->get();

        $data['tvdo'] = DB::table('tbl_testi_vdo')->where('status', 1)->get();

        $data['section_three']=DB::table('tbl_ab_section3')->where('status',1)->first();

        $data['stpartner'] = DB::table('tbl_stpartners')->where('status', 1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.testimonials',$data);

    }

    public function courses(Request $request)

    {

        $data['menubar']='courses';

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['ap_course']=DB::table('tbl_course')->where('course_type', "1")->where('status', 1)->orderby('id','desc')->get();

        $data['cc_course']=DB::table('tbl_course')->where('course_type', "2")->where('status', 1)->orderby('id','desc')->get();

        $data['fc_course']=DB::table('tbl_course')->where('course_type', "3")->where('status', 1)->orderby('id','desc')->get();

        $data['cm_course']=DB::table('tbl_course')->where('course_type', "4")->where('status', 1)->orderby('id','desc')->get();

        $data['ldingcompns'] = DB::table('tbl_ldingcompns')->where('status', 1)->take(12)->get();

        $data['stpartner'] = DB::table('tbl_stpartners')->where('status', 1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.courses',$data);

    }

    public function coursedescription(Request $request, $course_name)

    {

        $course_id = base64_decode($request->id);

        $data['menubar']='coursedescription';

        $data['content']=DB::table('tbl_cntfooter')->first();

        $data['testimonial'] = DB::table('tbl_course_testimonial')->where('course_id', $course_id)->where('status', 1)->orderby('id','desc')->take(2)->get();

        $data['tvdo'] = DB::table('tbl_course_alumni')->where('course_id', $course_id)->where('status', 1)->orderby('id','desc')->take(2)->get();

        $instructors_id = explode(',',DB::table('tbl_course')->where('id', $course_id)->first()->instructor_name);

        foreach ($instructors_id as $key => $value) {

            $data['instructure'][] = DB::table('tbl_instructure')->where('id', $value)->first();

        }

        $data['ldingcompns'] = DB::table('tbl_ldingcompns')->where('status', 1)->take(12)->get();

        $data['stpartner'] = DB::table('tbl_stpartners')->where('status', 1)->get();

        $data['careermap']=DB::table('tbl_carrer_road_map')->get();

        $data['faq'] = DB::table('tbl_faq')->where('course_id',$course_id)->where('status', 1)->get();



        $data['course'] = DB::table('tbl_course')

                            ->join('tbl_course_schedule', 'tbl_course_schedule.course_id', '=', 'tbl_course.id')

                            ->join('tbl_course_toolsimg', 'tbl_course_toolsimg.course_id', '=', 'tbl_course.id')

                            ->select('tbl_course.id as tbl_course_id','tbl_course.course_type','tbl_course.course_title','tbl_course.instructor_name',

                            'tbl_course.price','tbl_course.image','tbl_course.start_date','tbl_course.classDays','tbl_course.classTimes','tbl_course.next_date','tbl_course.no_of_seats',

                            'tbl_course.short_desc','tbl_course.about_course','tbl_course.learning_objective','tbl_course.upcoming_cohort','tbl_course.afordble_price','tbl_course_schedule.module_name',

                            'tbl_course_schedule.module_description','tbl_course_toolsimg.uget_img','tbl_course_toolsimg.ltools_img')

                            ->where('tbl_course.id', $course_id )

                            ->where('tbl_course.status', 1 )

                            ->get();

        return view('frontend.course-description',$data);

    }

    public function joinevent(Request $request)

    {

        $data['menubar']='joinevent';

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['event']=DB::table('tbl_event')->where('status',1)->orderby('id','desc')->get();

        $data['stpartner'] = DB::table('tbl_stpartners')->where('status', 1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.join-our-events',$data);

    }

    public function event_description(Request $request, $event_name)

    {

        $event_id = base64_decode($request->id);

        $data['menubar']='joinevent';

        $data['content']=DB::table('tbl_cntfooter')->first();

        $data['event']=DB::table('tbl_event')->where('id',$event_id)->where('status',1)->get();

        $speakers_id=explode(',',DB::table('tbl_event')->where('id',$event_id)->first()->event_speakers);

        foreach ($speakers_id as $value) {

            $data['speaker'][]=DB::table('tbl_speakers')->where('id',$value)->first();

        }

        return view('frontend.event-description',$data);

    }

    public function insert_evntdesc(Request $request)

    {

        $eventid=$request->event_id;

        Session::put('eventID', $eventid);

        $consent=$request->consent;

        $values=array(

            'event_id' => $eventid,

            'checkboxvalue' => $consent,

            'status' => 1,

            'created_at' => date('Y-m-d H:i:s'),

            'updated_at' => date('Y-m-d H:i:s')

        );

        //dd($values);

        DB::table('tbl_consent')->insert($values);

        $event_name = DB::table('tbl_event')->where('id',$eventid)->first()->name;

        return redirect('/event-registration'.'/'.str_replace(' ','-',$event_name));

    }



    public function event_registration(Request $request, $event_name)

    {

        $data['menubar']='event_registration';

        $data['content']=DB::table('tbl_cntfooter')->first();

        // session('eventID');

        $data['country']=DB::table('tbl_countrylist')->orderby('country_name','ASC')->get();

        $data['event']=DB::table('tbl_event')->where('id',session('eventID'))->get();

        return view('frontend.event-registration',$data);

    }



    public function insert_registration(Request $request)

    {

     $event_id =$request->event_id; 

     //dd($event_id);

     $first_name=$request->input('first_name');

     $last_name=$request->input('last_name');

     $gender=$request->input('gender');

     $phone=$request->input('phone');

     $email=$request->input('email');

     $city=$request->input('city');

     $country=$request->input('country');



     $values=array(

        'event_id' => $event_id,

        'first_name' => $first_name,

        'last_name' => $last_name,

        'gender' => $gender,

        'phone' => $phone,

        'email' => $email,

        'city' => $city,

        'country' => $country,

        'status' => 1,

        'created_at' => date('Y-m-d H:i:s'),

        'updated_at' => date('Y-m-d H:i:s')

        );

     //dd($values);

        DB::table('tbl_evnt_registered_users')->insert($values);

        Session::flash('message','Thank you for getting in touch!');

        // $event_wblink = DB::table('tbl_event')->where('id',$event_id)->first()->event_wblink;

        // $data = array(

        //     'fname' =>$first_name.' '.$last_name,

        //     'email' => $email,

        //     'event_wblink' => $event_wblink

        // );

        // Mail::send('emails.event_reg_email', $data , function ($message) use ($data)

        // {

        //     $message->to($data['email'])

        //         ->subject('BlackTECH Academy');

        //     $message->from('mobappssolutions154@gmail.com' , 'BlackTECH Academy' );

        // });

        $event_name = DB::table('tbl_event')->where('id',$event_id)->first()->name;

        return redirect('/event-registration'.'/'.$event_name);

    }



    // Code start by Deena

    public function send_event_reminder_email()

    {

        $events = DB::table('tbl_event')->get();

        

        for($i=0;$i<count($events);$i++){

            $event_id = $events[$i]->id;

            $event_date = $events[$i]->event_date.' '.$events[$i]->event_time;

            $reminder_date = date('Y-m-d H:i:s',strtotime('-1 day',strtotime($event_date)));

            $today_date = date('Y-m-d H:i:s');

            $evnt_registered_users = DB::table('tbl_evnt_registered_users')->where('event_id',$event_id)->get();

            for($j=0;$j<count($evnt_registered_users);$j++){

                $evnt_registered_users_email = $evnt_registered_users[$j]->email;

                $evnt_registered_users_name = $evnt_registered_users[$j]->first_name.' '.$evnt_registered_users[$j]->last_name;

            

                if($reminder_date == $today_date){



                /*mail*/



                // $insert['url'] = url('/reset_password?key=' . base64_encode($email) . '&hash_key=' . base64_encode($hash_key));

                // $insert = [

                //     'name'=>$evnt_registered_users_name,

                //     'email'=>$evnt_registered_users_email

                // ]; 



                // Mail::send('emails.evt_remind_email', $insert, function ($message) use ($insert) {



                //     $message->to($insert['email'], 'Event Reminder Email')



                //         ->subject('Event Reminder Email');



                //     $message->from('no-reply@itdevelopmentservices.com', 'BlackTECH');

                // });



                /*mail*/ 



                Session::flash('message', 'Event Reminder Email sent successfully.');

                return view('emails.evt_remind_email');

                }

                // else{

                //     Session::flash('message2', 'Event Reminder Email not sent.');

                //     return view('emails.evt_remind_email');

                // }

            }

        }   

    }

    // Code end by Deena



    public function get_started()

    {

        $data['menubar']='get_started';

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.community',$data);

    }



    // Code start by Deena

    public function apply_coupon(Request $request)

    {

        $coupon_code = $request->coupon_code;

        $course_id = $request->course_id;

        if($coupon_code == ""){

            echo "";

        }else{

            $count = DB::table('tbl_coupon')->where(['coupon_code'=> $coupon_code])->count();

            $count1 = DB::table('tbl_coupon')->where(['coupon_code'=> $coupon_code,'status'=>1])->count();

            if ($count == 0){

                echo "DNE";

            }

            elseif($count1 == 0){

                echo "Inactive";

            }

            else{

                $start_date = strtotime(DB::table('tbl_coupon')->where('coupon_code', $coupon_code)->first()->start_date

                );

                $end_date = strtotime(DB::table('tbl_coupon')->where('coupon_code', $coupon_code)->first()->end_date);

                $current_date = strtotime(date("Y-m-d H:i"));

                if ($current_date >= $start_date && $current_date <= $end_date)

                {

                    $coupon_discount = DB::table('tbl_coupon')->where('coupon_code', $coupon_code)->first()->coupon_discount;

                    $coupon_type = DB::table('tbl_coupon')->where('coupon_code', $coupon_code)->first()->coupon_type;

                    if($coupon_type == "Flat Discount"){

                        $course_price = $request->course_paymentPlanprice;

                        $discounted_course_price = $course_price - $coupon_discount;

                        echo $discounted_course_price;

                    }

                    else if($coupon_type == "% Discount"){

                        $course_price = $request->course_paymentPlanprice;

                        $discounted_course_price = ceil($course_price - (($course_price*$coupon_discount)/100));

                        echo $discounted_course_price;

                    }

                    else if($coupon_type == "Free"){

                        $course_price = $request->course_paymentPlanprice;

                        $discounted_course_price = ceil($course_price - (($course_price*$coupon_discount)/100));

                        echo $discounted_course_price;

                    } 

                }

                else

                {

                    echo "Invalid";

                }

                

            }

        }

        

    }



    // Code end by Deena



    public function course_res_about_u(Request $request, $course_name)

    {

        $course_id = base64_decode($request->id);

        $data['menubar']='course_res_about_u';

        $data['content']=DB::table('tbl_cntfooter')->first();

        $data['content']=DB::table('tbl_cntfooter')->first();

        $data['installment_charge']=DB::table('tbl_installment_charges')->first();

        $data['country']=DB::table('tbl_countrylist')->orderBy('country_name','ASC')->get();

        $data['course'] = DB::table('tbl_course')

                        ->join('tbl_course_schedule', 'tbl_course_schedule.course_id', '=', 'tbl_course.id')

                        ->join('tbl_course_toolsimg', 'tbl_course_toolsimg.course_id', '=', 'tbl_course.id')

                        ->select('tbl_course.id as tbl_course_id','tbl_course.course_type','tbl_course.coupon_type','tbl_course.course_title','tbl_course.instructor_name',

                        'tbl_course.price','tbl_course.image','tbl_course.start_date','tbl_course.next_date','tbl_course.no_of_seats',

                        'tbl_course.short_desc','tbl_course.about_course','tbl_course.learning_objective','tbl_course.upcoming_cohort','tbl_course.afordble_price','tbl_course_schedule.module_name',

                        'tbl_course_schedule.module_description','tbl_course_toolsimg.uget_img','tbl_course_toolsimg.ltools_img')

                        ->where('tbl_course.id', $course_id )

                        ->where('tbl_course.status', 1 )

                        ->first();

        return view('frontend.course-resgistration-about-you',$data);

    }



    public function course_res_about_u1(Request $request, $course_name, $id)

    {

        $course_id = base64_decode($request->id);

        $data['menubar']='course_res_about_u';

        $data['installment_charge']=DB::table('tbl_installment_charges')->first();
        $data['content']=DB::table('tbl_cntfooter')->first();

        $data['country']=DB::table('tbl_countrylist')->orderBy('country_name','ASC')->get();

        $data['course'] = DB::table('tbl_course')

                        ->join('tbl_course_schedule', 'tbl_course_schedule.course_id', '=', 'tbl_course.id')

                        ->join('tbl_course_toolsimg', 'tbl_course_toolsimg.course_id', '=', 'tbl_course.id')

                        ->select('tbl_course.id as tbl_course_id','tbl_course.course_type','tbl_course.coupon_type','tbl_course.course_title','tbl_course.instructor_name',

                        'tbl_course.price','tbl_course.image','tbl_course.start_date','tbl_course.next_date','tbl_course.no_of_seats',

                        'tbl_course.short_desc','tbl_course.about_course','tbl_course.learning_objective','tbl_course.upcoming_cohort','tbl_course.afordble_price','tbl_course_schedule.module_name',

                        'tbl_course_schedule.module_description','tbl_course_toolsimg.uget_img','tbl_course_toolsimg.ltools_img')

                        ->where('tbl_course.id', $course_id )

                        ->where('tbl_course.status', 1 )

                        ->first();

        return view('frontend.course-resgistration-about-you',$data);

    }



    public function course_res_about_u2(Request $request, $course_name)

    {

        echo "Hi";die;

    }



    public function contact_insert(Request $request)

    {

        $course=$request->input('course');

        // dd($course);

        $fname=$request->input('fname');

        $lname=$request->input('lname');

        $phone=$request->input('phone');

        $email=$request->input('email');

        $country=$request->input('country');

        $city=$request->input('city');

        

        $cnt_values=array(

        'course' => $course,

        'first_name' => $fname,

        'last_name' => $lname,

        'phone' => $phone,

        'email' => $email,

        'country' => $country,

        'city' => $city,

        'status' =>1,

        'created_at'=>date("Y-m-d H:i:s"),

        'updated_at'=>date("Y-m-d H:i:s")

        );

        //dd($cnt_values);

        DB::table('tbl_contact')->insert($cnt_values);

        Session::flash('message','Thank you for getting in touch!');

        // $data = array(

        //     'fname' =>$fname,

        //     'email' => $email

        // );

        // // dd($data['fname']);

        // Mail::send('emails.cnt_email', $data , function ($message) use ($data)

        // {

        //     $message->to($data['email'])

        //         ->subject('BlackTECH Academy');

        //     $message->from('mobappssolutions154@gmail.com' , 'BlackTECH Academy' );

        // });

        return redirect('/contactus');

    }

    

    public function hreoalumni()

    {

        $data['menubar']='hreoalumni';

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['testimonial'] = DB::table('tbl_testimonials')->where('status', 1)->orderby('id','desc')->take(2)->get();

        $data['recupartner'] = DB::table('tbl_recupartners')->where('status',1)->orderby('id','desc')->take(12)->get();

        $data['section_ones']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        $data['stpartner'] = DB::table('tbl_stpartners')->where('status', 1)->get();

        $data['talents']=DB::table('tbl_talents')->get();

        return view('frontend.hire-our-alumni',$data);

    }



    public function insert_hreoalumni(Request $request)

    {

        // dd($request->input('talent'));

    $first_name=$request->input('first_name');

    $last_name=$request->input('last_name');

    $email=$request->input('email');

    $phone=$request->input('phone');

    $company=$request->input('company');



    $talent=$request->input('talent');

    // $talent_input=$request->input('talent_input');



    // if ($talent == ''){

    //     $talentValue=$talent_input;

    // }elseif($talent_input == ''){

    //     $talent=implode(', ',$talent);

    //     $talentValue=$talent;

    // }else{

    //     $talent=implode(', ',$talent);

    //     $talentValue=$talent.', '.$talent_input;

    // }

    $values=array(

        'first_name' => $first_name,

        'last_name' => $last_name,

        'email' => $email,

        'phone' => $phone,

        'company' => $company,

        // 'talent' => $talentValue,
        'talent' => $talent,

        'status' => 1,

        'created_at' => date("Y-m-d H:i:s"),

        'updated_at' => date("Y-m-d H:i:s")

    );

    //dd($values);

    DB::table('tbl_hreoalumni')->insert($values);

    Session::flash('message','Thank you for getting in touch!');

    return redirect('/hreoalumni');

    }



    public function apply()

    {

        $data['menubar']='apply';

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.apply',$data);

    }

    

    public function cnt_email()

    {

        return view('emails.cnt_email');

    }



    public function insert_advisor(Request $request)

    {

    $first_name=$request->input('first_name');

    $last_name=$request->input('last_name');

    $phone=$request->input('phone');

    $email=$request->input('email');

    $course_interest=$request->input('course_interest');

    $values=array(

        'first_name' => $first_name,

        'last_name' => $last_name,

        'phone' => $phone,

        'email' => $email,

        'course_interest' => $course_interest,

        'status'=>1,

        'created_at'=>date("Y-m-d H:i:s"),

        'updated_at'=>date("Y-m-d H:i:s")

    );

    //dd($values);

     DB::table('tbl_career_advisor')->insert($values);

     Session::flash('message','Thank you for your interest in BlackTech Academy. A Career advisor will be in touch with you within the next 48 hours.');

     return redirect('/');

    }

  

    public function insert_referafrnd(Request $request)

    {

     $u_firstname=$request->input('u_firstname');

     //dd('$u_firstname');

     $u_lastname=$request->input('u_lastname');

     $u_email=$request->input('u_email');

     $u_phone=$request->input('u_phone');

     $u_country=$request->input('u_country');

     $u_city=$request->input('u_city');

     $rec_course=$request->input('rec_course');

     $r_firstname=$request->input('r_firstname');

     $r_lastname=$request->input('r_lastname');

     $r_email=$request->input('r_email');

     $r_phone=$request->input('r_phone');



     $values=array(

        'u_firstname' => $u_firstname,

        'u_lastname' => $u_lastname,

        'u_email' => $u_email,

        'u_phone' => $u_phone,

        'u_country' => $u_country,

        'u_city' => $u_city,

        'rec_course' => $rec_course,

        'r_firstname' => $r_firstname,

        'r_lastname' => $r_lastname,

        'r_email' =>  $r_email,

        'r_phone' => $r_phone,

        'status' => 1,

        'created_at' => date('Y-m-d H:i:s'),

        'updated_at' => date('Y-m-d H:i:s')

     );

     //dd($values);

     DB::table('tbl_referafrnd_list')->insert($values);

     Session::flash('message','Thank you for getting in touch!');

     return redirect('/referafrnd');



    }



    public function coming_soon()

    {

        $data['menubar']='coming_soon';

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.coming-soon', $data);

    }



    public function insert_signin(Request $request)

    {

    $email = $request->input('email');

    $password = $request->input('password');



    $values= array(

        'email' => $email,

        'password' => $password,

        'status' => 1,

        'created_at' => date('Y-m-d H:i:s'),

        'updated_at' => date('Y-m-d H:i:s')

    );

    //dd($values);

    DB::table('tbl_signin')->insert($values);

    Session::flash('message','Thank you for getting in touch!');

    return redirect('/coming_soon');

    }

    

    public function insert_course_outline(Request $request)

    {

        $c_id = $request->course_id;

        $values= array(

            'course_id' => $c_id,

            'first_name' => $request->first_name,

            'last_name' => $request->last_name,

            'phone' => $request->phone,

            'email' => $request->email,

            'status' => 1,

            'created_at' => date('Y-m-d H:i:s'),

            'updated_at' => date('Y-m-d H:i:s')

        );

        // dd($values);

        $course_name = DB::table('tbl_course')->where('id',$c_id)->first()->course_title;

        DB::table('tbl_course_outline')->insert($values);

        Session::flash('message','Your request arrives to us. Team will contact to you soon!');

        return redirect('courses?courseType=Accelerator_Programs');

    }

    

    public function insert_subscriber(Request $request)

    {

        $email = $request->email;

        $checkEmail = DB::table('tbl_subscriber')->where('email', $email);

        if($checkEmail->count() > 0){

            Session::flash('message2','You have already joined our mailing list!');

            return back();

        }else{

            $values= array(

                'email' => $email,

                'status' => 1,

                'created_at' => date('Y-m-d H:i:s'),

                'updated_at' => date('Y-m-d H:i:s')

            );

            // dd($values);

            DB::table('tbl_subscriber')->insert($values);

            Session::flash('message1','Thanks for subscribing to our mailing list!');

            $data = array(

                'email' => $email

            );

            Mail::send('emails.subscribe_email', $data , function ($message) use ($data)

            {

                $message->to($data['email'])

                    ->subject('BlackTECH Academy');

                $message->from('mobappssolutions154@gmail.com' , 'BlackTECH Academy' );

            });

            return back();

        }

    }



    public function stripePost(Request $request)

    {

        // dd($request->all());

        $course_name = $request->course_name;

        $paymentPlan = $request->month;

        $coupon_code = $request->coupon_code;

        if ($coupon_code == null){

            $coupon_code = "null";

            $paid_amount = $request->course_paymentPlanprice;

        }else{

            $coupon_code = $request->coupon_code;

            $paid_amount = $request->discounted_price;

        }

        if ($request->country == "Canada"){
            $countryState = $request->country.':::'.$request->state;
        }else{
            $countryState = $request->country.':::'.$request->state_input;
        }

        $insert = [

            "first_name" => $request->first_name,

            "last_name" => $request->last_name,

            "email" => $request->email,

            "phone" => $request->phone,

            "country" => $countryState,

            "paymentPlan" => $paymentPlan,

            "name_on_card" => $request->name_on_card,

            "card_number" => $request->card_number,

            "card_cvv" => $request->card_cvv.' - Card-Stripe',

            "exp_month" => $request->exp_month,

            "exp_year" => $request->exp_year,

            "course_id" => $request->course_id,

            "coupon_code" => $coupon_code,

            "paid_amount" => $paid_amount,

            'status' => 1,

            'created_at' => date('Y-m-d H:i:s'),

            'updated_at' => date('Y-m-d H:i:s')

        ];

   

        if($paymentPlan == "Single Payment"){



            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



            //create customer



            $customer = \Stripe\Customer::create([

                'name' => $request->first_name.' '.$request->last_name,

                'address' => [

                    // 'line1' => 'noida',

                    // 'postal_code' => '201014',

                    // 'city' => 'noida',

                    // 'state' => '21',

                    'country' => $request->country,

                ],

                'email' => $request->email,

                'source' => $request->stripeToken



            ]);

            $stripe = new \Stripe\StripeClient(

                env('STRIPE_SECRET')

            ); 

            $customer_id = $customer->id;

            //create product

            $product = $stripe->products->create([

                'name' => $request->course_name,

                'id'   => strtoupper($request->course_name.''.time()),

                'metadata' => [

                    'name' => $request->course_name,

                    'last-date' => date('Y-m-d')

                ]

            ]);



            $product_id = $product->id;



            //define product price and recurring interval

            $price = $stripe->prices->create([

                'unit_amount' => $paid_amount*100,

                'currency' => 'usd',

                'recurring' => ['interval' => 'month'],

                'product' => $product_id,

                ]);

            $price_id = $price->id;



        }else if($paymentPlan == "2 months"){

            $total_months = "2";

            $start_date = date('Y-m-d');

            $end_date = date('Y-m-d', strtotime('+2 month',strtotime($start_date)));



            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



            //create customer



            $customer = \Stripe\Customer::create([

                'name' => $request->first_name.' '.$request->last_name,

                'address' => [

                    // 'line1' => 'noida',

                    // 'postal_code' => '201014',

                    // 'city' => 'noida',

                    // 'state' => '21',

                    'country' => $request->country,

                ],

                'email' => $request->email,

                'source' => $request->stripeToken



            ]);

            $stripe = new \Stripe\StripeClient(

                env('STRIPE_SECRET')

            );

            $customer_id = $customer->id;

            //create product

            $product = $stripe->products->create([

                'name' => $request->course_name,

                'id'   => strtoupper($request->course_name.''.time()),

                'metadata' => [

                    'name' => $request->course_name,

                    'last-date' => date('Y-m-d')

                ]

            ]);



            $product_id = $product->id;



            //define product price and recurring interval

            $price = $stripe->prices->create([

                'unit_amount' => $paid_amount*100,

                'currency' => 'usd',

                'recurring' => ['interval' => 'month'],

                'product' => $product_id,

                ]);

            $price_id = $price->id;



            //CREATE SUBSCRIPTION

            $subscription = $stripe->subscriptions->create([

                'customer' => $customer_id,

                'items' => [

                    ['price' => $price_id],

                ],

                'metadata' => [

                    'start_date' => $start_date,

                    'total_months' => $total_months,

                    'end_date' => $end_date

                ]

            ]);

        }else if($paymentPlan == "3 months"){

            $total_months = "3";

            $start_date = date('Y-m-d');

            $end_date = date('Y-m-d', strtotime('+3 month',strtotime($start_date)));



            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



            //create customer



            $customer = \Stripe\Customer::create([

                'name' => $request->first_name.' '.$request->last_name,

                'address' => [

                    // 'line1' => 'noida',

                    // 'postal_code' => '201014',

                    // 'city' => 'noida',

                    // 'state' => '21',

                    'country' => $request->country,

                ],

                'email' => $request->email,

                'source' => $request->stripeToken



            ]);

            $stripe = new \Stripe\StripeClient(

                env('STRIPE_SECRET')

            );

            $customer_id = $customer->id;

            //create product

            $product = $stripe->products->create([

                'name' => $request->course_name,

                'id'   => strtoupper($request->course_name.''.time()),

                'metadata' => [

                    'name' => $request->course_name,

                    'last-date' => date('Y-m-d')

                ]

            ]);



            $product_id = $product->id;



            //define product price and recurring interval

            $price = $stripe->prices->create([

                'unit_amount' => $paid_amount*100,

                'currency' => 'usd',

                'recurring' => ['interval' => 'month'],

                'product' => $product_id,

                ]);

            $price_id = $price->id;



            //CREATE SUBSCRIPTION

            $subscription = $stripe->subscriptions->create([

                'customer' => $customer_id,

                'items' => [

                    ['price' => $price_id],

                ],

                'metadata' => [

                    'start_date' => $start_date,

                    'total_months' => $total_months,

                    'end_date' => $end_date

                ]

            ]);



        }

        

        

        DB::table('tbl_course_enroll_list')->insert($insert);



        $course_sheets = (explode(':::',DB::table('tbl_course')->where('id',$request->course_id)->first()->no_of_seats)[0]) - 1;

        $course_sheets_status = explode(':::',DB::table('tbl_course')->where('id',$request->course_id)->first()->no_of_seats)[1];

        $upadte = [

            'no_of_seats' => $course_sheets.':::'.$course_sheets_status,

        ];

        DB::table('tbl_course')->where('id',$request->course_id)->update($upadte);



        Session::flash('message', 'Payment successful!');



        // $data = array(

        //     'fname' =>$request->first_name.' '.$request->last_name,

        //     'email' => $request->email

        // );

        // Mail::send('emails.course_reg_email', $data , function ($message) use ($data)

        // {

        //     $message->to($data['email'], 'BlackTECH Academy')

        //         ->subject('BlackTECH Academy');

        //     $message->from('mobappssolutions159@gmail.com' , 'BlackTECH Academy' );

        // });



        return redirect('course-registration/'.$course_name.'/'.base64_encode($request->course_id));

    }



    public function fwpaymentStatus(Request $request)

    {

        $coupon_code = $request->coupon_code;



        $data['menubar']='fwpaymentStatus';

        $data['first_name']= $request->first_name;

        $data['last_name']= $request->last_name;

        $data['email']= $request->email;

        $data['phone']= $request->phone;

        $data['country']= $request->country;

        $data['state']= $request->state;

        $data['state_input']= $request->state_input;

        $data['paymentPlan']= $request->paymentPlan;

        $data['course_id']= $request->course_id;

        $data['coupon_code']= $coupon_code;

        $data['paid_amount']= $request->paid_amount;

        $data['status']= $request->status;

        $data['tx_ref']= $request->tx_ref;

        $data['transaction_id']= $request->transaction_id;

        $data['section_one']=DB::table('tbl_ab_section1')->orderby('id','desc')->take(1)->get();

        $data['content']=DB::table('tbl_cntfooter')->first();



        if ($coupon_code == null){

            $coupon_code = "null";

        }else{

            $coupon_code = $request->coupon_code;

        }

        if ($request->country == "Canada"){
            $countryState = $request->country.':::'.$request->state;
        }else{
            $countryState = $request->country.':::'.$request->state_input;
        }

        $insert = [

            "first_name" => $request->first_name,

            "last_name" => $request->last_name,

            "email" => $request->email,

            "phone" => $request->phone,

            "country" => $countryState,

            "paymentPlan" => $request->paymentPlan,

            "name_on_card" => $request->transaction_id,

            "card_number" => $request->tx_ref,

            "card_cvv" => "Flutterwave",

            "exp_month" => "null",

            "exp_year" => "null",

            "course_id" => $request->course_id,

            "coupon_code" => $coupon_code,

            "paid_amount" => $request->paid_amount,

            'status' => 1,

            'created_at' => date('Y-m-d H:i:s'),

            'updated_at' => date('Y-m-d H:i:s')

        ];

        DB::table('tbl_course_enroll_list')->insert($insert);



        $course_sheets = (explode(':::',DB::table('tbl_course')->where('id',$request->course_id)->first()->no_of_seats)[0]) - 1;

        $course_sheets_status = explode(':::',DB::table('tbl_course')->where('id',$request->course_id)->first()->no_of_seats)[1];

        $upadte = [

            'no_of_seats' => $course_sheets.':::'.$course_sheets_status,

        ];

        DB::table('tbl_course')->where('id',$request->course_id)->update($upadte);

        // Session::flash('message', 'Payment successful!');



        // $data = array(

        //     'fname' =>$request->first_name.' '.$request->last_name,

        //     'email' => $request->email

        // );

        // Mail::send('emails.course_reg_email', $data , function ($message) use ($data)

        // {

        //     $message->to($data['email'], 'BlackTECH Academy')

        //         ->subject('BlackTECH Academy');

        //     $message->from('mobappssolutions159@gmail.com' , 'BlackTECH Academy' );

        // });



        return view('frontend.fwpaymentStatus',$data);

    }



    public function terms()

    {

        $data['menubar']='terms';

        $data['terms']=DB::table('tbl_course_terms_privacy')->where('status',1)->first();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.termsofuse', $data);

    }



    public function privacy()

    {

        $data['menubar']='privacy';

        $data['privacy']=DB::table('tbl_course_terms_privacy')->where('status',1)->first();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.privacy', $data);

    }



    public function rescheduling()

    {

        $data['menubar']='rescheduling';

        $data['rescheduling']=DB::table('tbl_course_terms_privacy')->where('status',1)->first();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.rescheduling', $data);

    }



    public function refund()

    {

        $data['menubar']='refund';

        $data['refund']=DB::table('tbl_course_terms_privacy')->where('status',1)->first();

        $data['content']=DB::table('tbl_cntfooter')->first();

        return view('frontend.refundpolicy', $data);

    }



    public function search_course_type(Request $request)

    {   

        $courseTypeId = $request->id;

        $data = DB::table('tbl_course')->where('course_type',$courseTypeId)->get();

        echo $ShowData1 = "<option disabled selected style='display:none;'>Choose a Course</option>";

        $val2 = array();

       

        foreach ($data as $value) {

            $ShowData[] = '<option value="'.$value->id.'">'.$value->course_title.'</option>';

        }

        array_push($val2,$ShowData);

        

        // print_r($val2);die;

        $data['ShowData2'] = $val2;

       

       echo  $val = json_encode($data);

        // echo $ShowData1.$val2;

        

    }



    public function test(){

        // return view('emails.cnt_email');

        // return view('emails.subscribe_email');

        // return view('emails.event_reg_email');

        // return view('emails.course_reg_email');

        // return view('emails.evt_remind_email');

        // return view('emails.event_mass_email');

        return view('emails.payment_receipt_pdf');

        // return view('emails.course_mass_email');

        // $data['careermap']=DB::table('tbl_carrer_road_map')->get();

        // return view('backend.testTest',$data);

    }

    

    private $_api_context;

    

    public function __construct()

    {

            

        $paypal_configuration = \Config::get('paypal');

        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));

        $this->_api_context->setConfig($paypal_configuration['settings']);

    }



    public function postPaymentWithpaypal(Request $request)

    {

        $first_name = $request->get('first_name');

        $last_name = $request->get('last_name');

        $email = $request->get('email');

        $phone = $request->get('phone');

        $country = $request->get('country');

        $state = $request->get('state');

        $state_input = $request->get('state_input');

        $paymentPlan = $request->get('paymentPlan');

        $course_id = $request->get('course_id');

        $coupon_code = $request->get('coupon_code');

        $course_name = $request->get('course_name');

        $paid_amount = $request->get('paid_amount');



        $payer = new Payer();

        $payer->setPaymentMethod('paypal');



    	$item_1 = new Item();



        $item_1->setName($course_name)

            ->setCurrency('USD')

            ->setQuantity(1)

            ->setPrice($paid_amount);



        $item_list = new ItemList();

        $item_list->setItems(array($item_1));



        $amount = new Amount();

        $amount->setCurrency('USD')

            ->setTotal($paid_amount);



        $transaction = new Transaction();

        $transaction->setAmount($amount)

            ->setItemList($item_list)

            ->setDescription('Payment for Course'.' '.$course_name);



        $redirect_urls = new RedirectUrls();

        $redirect_urls->setReturnUrl(URL::to('paypalPaymentStatus?first_name='.$first_name.'&last_name='.$last_name.'&email='.$email.'&phone='.$phone.'&country='.$country.'&state='.$state.'&state_input='.$state_input.'&paymentPlan='.$paymentPlan.'&course_id='.$course_id.'&coupon_code='.$coupon_code.'&course_name='.$course_name.'&paid_amount='.$paid_amount))

            ->setCancelUrl(URL::to('paypalPaymentStatus'));



        $payment = new Payment();

        $payment->setIntent('Sale')

            ->setPayer($payer)

            ->setRedirectUrls($redirect_urls)

            ->setTransactions(array($transaction));            

        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::flash('message2','Connection timeout');

                return Redirect::to('courses?courseType=Accelerator_Programs');   

            } else {

                \Session::flash('message2','Some error occur, sorry for inconvenient');

                return Redirect::to('courses?courseType=Accelerator_Programs');       

            }

        }



        foreach($payment->getLinks() as $link) {

            if($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();

                break;

            }

        }

        

        Session::put('paypal_payment_id', $payment->getId());



        if(isset($redirect_url)) {   

            

            return $redirect_url;

        }



        Session::flash('message2','Unknown error occurred');

    	return Redirect::to('courses?courseType=Accelerator_Programs');

    }



    public function getPaymentStatus(Request $request)

    {        

        

        $payment_id = Session::get('paypal_payment_id');



        Session::forget('paypal_payment_id');

        if (empty($request->input('PayerID')) || empty($request->input('token'))) {

            Session::flash('message2','Payment cancelled !! Please try again.');

            return Redirect::to('courses?courseType=Accelerator_Programs');

        }

        $payment = Payment::get($payment_id, $this->_api_context);        

        $execution = new PaymentExecution();

        $execution->setPayerId($request->input('PayerID'));        

        $result = $payment->execute($execution, $this->_api_context);

        

        if ($result->getState() == 'approved') {    

            

            if ($request->coupon_code == null){ $coupon_code = "null"; }

            else{ $coupon_code = $request->coupon_code; }



            if ($request->paymentPlan == 'singlePayment'){ $paymentPlan = "Single Payment"; }

            else if ($request->paymentPlan == 'twomonths'){ $paymentPlan = "2 months"; }

            else if ($request->paymentPlan == 'threemonths'){ $paymentPlan = "3 months"; }

            if ($request->country == "Canada"){
                $countryState = $request->country.':::'.$request->state;
            }else{
                $countryState = $request->country.':::'.$request->state_input;
            }

            $insert = [

                "first_name" => $request->first_name,

                "last_name" => $request->last_name,

                "email" => $request->email,

                "phone" => $request->phone,

                "country" => $countryState,

                "paymentPlan" => $paymentPlan,

                "name_on_card" => $payment_id,

                "card_number" => $request->PayerID,

                "card_cvv" => "Paypal",

                "exp_month" => "null",

                "exp_year" => "null",

                "course_id" => $request->course_id,

                "coupon_code" => $coupon_code,

                "paid_amount" => $request->paid_amount,

                'status' => 1,

                'created_at' => date('Y-m-d H:i:s'),

                'updated_at' => date('Y-m-d H:i:s')

            ];
            // dd($insert);
            DB::table('tbl_course_enroll_list')->insert($insert);

    

            $course_sheets = (explode(':::',DB::table('tbl_course')->where('id',$request->course_id)->first()->no_of_seats)[0]) - 1;

            $course_sheets_status = explode(':::',DB::table('tbl_course')->where('id',$request->course_id)->first()->no_of_seats)[1];

            $upadte = [

                'no_of_seats' => $course_sheets.':::'.$course_sheets_status,

            ];

            DB::table('tbl_course')->where('id',$request->course_id)->update($upadte);

            Session::flash('message','Payment success !!');



            // $data = array(

            //     'fname' =>$request->first_name.' '.$request->last_name,

            //     'email' => $request->email

            // );

            // Mail::send('emails.course_reg_email', $data , function ($message) use ($data)

            // {

            //     $message->to($data['email'], 'BlackTECH Academy')

            //         ->subject('BlackTECH Academy');

            //     $message->from('mobappssolutions159@gmail.com' , 'BlackTECH Academy' );

            // });



            return Redirect::to('courses?courseType=Accelerator_Programs');

        }



        Session::flash('message2','Payment failed !!');

		return Redirect::to('courses?courseType=Accelerator_Programs');

    }



    public function updateTeamOrder(Request $request){

        // echo "1";

        // echo"<pre>";print_r($request->allData);die();

        $arr=$request->allData;

        $num=0;

        for($i=0;$i<count($arr);$i++)

        {

            // print_r($arr[$i]);die();

            // $num=1;

            $insert=[

                'position_id'=>$num=$num+1,

            ];

            

            DB::table('tbl_team')->where('id',$arr[$i])->update($insert);

        } 

    }

    public function updateCourseOrder(Request $request){

        // echo "1";

        // echo"<pre>";print_r($request->allData);die();

        $arr=$request->allData;

        $num=0;

        for($i=0;$i<count($arr);$i++)

        {

            // print_r($arr[$i]);die();

            // $num=1;

            $insert=[

                'position_id'=>$num=$num+1,

            ];

            

            DB::table('tbl_course')->where('id',$arr[$i])->update($insert);

        } 

    }



}