<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Image;

class CourseController extends Controller
{

    public function add_course()
    {
        $select['courselist'] = DB::table('tbl_course_list')->get();
        $select['instructure'] = DB::table('tbl_instructure')->get();
        return view('backend.add_course',$select);
    }
    public function show_course()
    {
        $select['course'] = DB::table('tbl_course')->orderBy('position_id','ASC')->get();
        $select['courselist'] = DB::table('tbl_course_list')->get();
        $select['instructures'] = DB::table('tbl_instructure')->get();
        return view('backend.show_course', $select);
    }
    public function insert_course(Request $request) {
      // dd($request->all());
         $select_course=$request->input('select_course');
         $coupon_type=$request->input('coupon_type');
         $course_title = $request->input('course_title');
         $start_date=$request->input('start_date');
         $next_date=$request->input('next_date');
         $class_days=implode(',',$request->input('class_days'));
         $class_times=$request->input('class_times');
         $about_course = $request->input('about_course');
         $short_desc = $request->input('short_desc');
         $learning_objective=$request->input('learning_objective');
         $course_instructors = implode(',',$request->course_instructors);
         $upcoming_cohort = $request->input('upcoming_cohort');
         $afordble_price = $request->input('afordble_price');
         $module_name = $request->input('module_name');
         $module_description = $request->input('module_description');
         $price = $request->input('price');
         $no_of_seats = $request->input('no_of_seats');
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/course_img", $name);
            $imageName = $name;
      
         }else
         {
            $imageName = "no file upload";
         }
         if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $name = time().'.'.$image1->getClientOriginalExtension();
            $image1->move("assets/course_img", $name);
            $imageName1 = $name;
      
         }else
         {
            $imageName1 = "no file upload";
         }
         if ($request->hasfile('get_image')) {
            $image = $request->file('get_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/course_img", $name);
            $data = $name;
         }
         else{
            $data[] = "no file upload";
         }
         if ($request->hasfile('learn_tool')) {
            foreach ($request->file('learn_tool') as $file) {
                  $name = $file->getClientOriginalName();
                  $file->move("assets/course_img", $name);
                  $learntool[] = $name;
            }
         }
         else{
            $learntool[] = "no file upload";
         }
        $position_id = DB::table('tbl_course')->count() + 1;
        DB::table('tbl_course')->insert(
                     [
                        'position_id' => $position_id,
                        'course_type' => $select_course,
                        'coupon_type' => $coupon_type,
                        'course_title' => $course_title,
                        'start_date' => $start_date,
                        'next_date' => $next_date,
                        'classDays' => $class_days,
                        'classTimes' => $class_times,
                        'short_desc' => $short_desc,
                        'about_course'=>$about_course,
                        'learning_objective' => $learning_objective,
                        'instructor_name' => $course_instructors,
                        'upcoming_cohort' => $upcoming_cohort,
                        'afordble_price' => $afordble_price,
                        'price'=> $price,
                        'image'=>$imageName.':::'.$imageName1,
                        'no_of_seats'=>$no_of_seats.':::1',
                        'status' =>1,
                        'created_at'=>date("Y-m-d H:i:s"),
                        'updated_at'=>date("Y-m-d H:i:s")
                     ]);

         $latestCourseId = DB::table('tbl_course')->latest()->first();         
                     DB::table('tbl_course_schedule')->insert(
                                 [
                                    'course_id' => $latestCourseId->id,
                                    // 'module_name' => implode(",",$module_name),
                                    // 'module_description' => implode(",",$module_description),
                                    // 'status' =>1,
                                    'created_at'=>date("Y-m-d H:i:s"),
                                    'updated_at'=>date("Y-m-d H:i:s")
                     ]);
                     //dd($data);
                     DB::table('tbl_course_toolsimg')->insert(
                                 [
                                    'course_id' => $latestCourseId->id,
                                    'uget_img' => $data,
                                    // 'ltools_img' => implode(",",$learntool),
                                    'status' =>1,
                                    'created_at'=>date("Y-m-d H:i:s"),
                                    'updated_at'=>date("Y-m-d H:i:s")
                                 ]);
         Session::flash('message','Course Added Sucessfully.');
         return redirect('admin/show_course');
     }
     public function course_edit_view($id)
     {
      $select['courselist'] = DB::table('tbl_course_list')->get();
      $select['courses'] = DB::table('tbl_course')
                            ->join('tbl_course_schedule', 'tbl_course_schedule.course_id', '=', 'tbl_course.id')
                            ->join('tbl_course_toolsimg', 'tbl_course_toolsimg.course_id', '=', 'tbl_course.id')
                            ->select('tbl_course.id as tbl_course_id','tbl_course_schedule.id as tbl_course_schedule_id' ,'tbl_course_toolsimg.id as tbl_course_toolsimg_id','tbl_course.id as tbl_course_id','tbl_course.course_type','tbl_course.course_title','tbl_course.instructor_name',
                            'tbl_course.price','tbl_course.image','tbl_course.start_date','tbl_course.classDays','tbl_course.classTimes','tbl_course.coupon_type','tbl_course.next_date','tbl_course.no_of_seats',
                            'tbl_course.short_desc','tbl_course.about_course','tbl_course.learning_objective','tbl_course.upcoming_cohort','tbl_course.afordble_price','tbl_course_schedule.module_name',
                            'tbl_course_schedule.module_description','tbl_course_toolsimg.uget_img','tbl_course_toolsimg.ltools_img')
                            ->where('tbl_course.id', $id )
                           //  ->where('tbl_course.status', 1 )
                            ->first();
       $select['instructures'] = DB::table('tbl_instructure')->get();
       return view('backend.edit_course', $select);
     }
     public function removeModule($id){
      // dd($id);
      $update = [
         'module_name' => '',
         'module_description' => '',
      ];
      DB::table('tbl_course_schedule')->where('course_id', $id)->update($update);
      return redirect('admin/course_edit_view/'.$id);
     }
     public function course_edit(Request $request)
     {  
         $id =$request->course_id;
         $course_schedule_id=$request->course_schedule_id;
         $course_toolsimg_id=$request->course_toolsimg_id;
         $img=$request->previous;
         $select_course=$request->input('select_course');
         $course_title = $request->input('course_title');
         $coupon_type = $request->input('coupon_type');
         $start_date=$request->input('start_date');
         $next_date=$request->input('next_date');
         $class_days=implode(',',$request->input('class_days'));
         $class_times=$request->input('class_times');
         $about_course = $request->input('about_course');
         $short_desc = $request->input('short_desc');
         $learning_objective=$request->input('learning_objective');
         $course_instructors = implode(',',$request->course_instructors);
         $upcoming_cohort = $request->input('upcoming_cohort');
         $afordble_price = $request->input('afordble_price');
         $module_name = $request->input('module_name');
         $module_description = $request->input('module_description');
         $price = $request->input('price');
         $no_of_seats = $request->input('no_of_seats');

         if ($request->hasFile('new')) {
            $image = $request->file('new');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/course_img", $name);
            $imageName = $name;
     
         }else
         {
            $imageName = $request->previous;
         }
         if ($request->hasFile('new1')) {
            $image1 = $request->file('new1');
            $name = time().'.'.$image1->getClientOriginalExtension();
            $image1->move("assets/course_img", $name);
            $imageName1 = $name;
     
         }else
         {
            $imageName1 = $request->previous1;
         }

         // $upload_file = $request->file('get_image');
         // $height = Image::make($upload_file)->height();
         // $width = Image::make($upload_file)->width();
         // dd($width);
         // if($height==1080 && $width==1920)
         // {
            if ($request->hasfile('get_image')) {
               $image = $request->file('get_image');
               $name = time().'.'.$image->getClientOriginalExtension();
               $image->move("assets/course_img", $name);
               $all_get_image = $name;
               
            }
            else{
               $all_get_image  = $request->pre_get_image;
            }
         // }
         // else{
         //    Session::flash('error','Sorry !! "What You’ll Get" Image Dimensions must be 1920 x 1080.');
         //    return back();
         // }
         
         //dd($all_get_image);
         if ($request->hasfile('learn_tool')) {
            foreach ($request->file('learn_tool') as $file) {
                $name = $file->getClientOriginalName();
                $file->move("assets/course_img", $name);
                $learntool[] = $name;
                
            }
            // $all_learn_tool =  array_merge($request->pre_learn_tool, $learntool);
            $all_learn_tool =  $learntool;
         }
         else{
            $all_learn_tool = $request->pre_learn_tool;
            
         }
         //dd($all_learn_tool);
        
         if(isset($request->module_name)){
            $all_module_name = array_merge($request->module_name, $request->modulename);
         }
         else{
            $all_module_name=$request->modulename;
         }
         
         // dd($all_module_name);

         if(isset($request->module_description))
         {
            $all_module_des =  array_merge($request->module_description, $request->moduledesc);
         }
         else{
            $all_module_des = $request->moduledesc;
         }
         // dd($all_module_name);
         $sheets_number_status = explode(':::',DB::table('tbl_course')->where('id',$id)->first()->no_of_seats)[1];
         DB::table('tbl_course')->where('id',$id)->update(
            [
               'course_type' => $select_course,
               'coupon_type' => $coupon_type,
               'course_title' => $course_title,
               'start_date' => $start_date,
               'next_date' => $next_date,
               'classDays' => $class_days,
               'classTimes' => $class_times,
               'short_desc' => $short_desc,
               'about_course'=>$about_course,
               'learning_objective' => $learning_objective, 
               'instructor_name' => $course_instructors,
               'upcoming_cohort' => $upcoming_cohort,
               'afordble_price' => $afordble_price,
               'price'=> $price,
               'image'=>$imageName.':::'.$imageName1,
               'no_of_seats'=>$no_of_seats.':::'.$sheets_number_status,
               // 'status' =>1,
               // 'created_at'=>date("Y-m-d H:i:s"),
               'updated_at'=>date("Y-m-d H:i:s")
            ]);
         //   dd($request->course_schedule_id);
           if($all_module_name == null) {
               $module_name = $all_module_name;
           }else{
               // $module_name = implode(",",$all_module_name);
           }
           if($all_module_des == null) {
               $module_des = $all_module_des;
            }else{
               // $module_des = implode(",",$all_module_des);
            }
            // $latestCourseId = DB::table('tbl_course')->latest()->first();          
            DB::table('tbl_course_schedule')->where('id', $request->course_schedule_id)->update(
                        [
                           // 'course_id' => $latestCourseId->id,
                           'course_id' => $id,
                           'module_name' => $module_name,
                           'module_description' => $module_des,
                           // 'status' =>1,
                           // 'created_at'=>date("Y-m-d H:i:s"),
                           'updated_at'=>date("Y-m-d H:i:s")
            ]);
            //dd($data);
            DB::table('tbl_course_toolsimg')->where('id',$course_toolsimg_id)->update(
                        [
                           // 'course_id' => $latestCourseId->id,
                           'course_id' => $id,
                           'uget_img' => $all_get_image,
                           // 'ltools_img' => implode(",",$all_learn_tool),
                           // 'status' =>1,
                           // 'created_at'=>date("Y-m-d H:i:s"),
                           'updated_at'=>date("Y-m-d H:i:s")
                        ]);
      //   DB::table('tbl_course')->where('id', $id)->update($values);
       Session::flash('message','Record Updated Sucessfully.');
      return redirect('admin/show_course');
     }
     public function course_delete($id)
     {
        DB::table('tbl_course')->where('id',$id)->delete();
        DB::table('tbl_course_schedule')->where('course_id',$id)->delete();
        DB::table('tbl_course_toolsimg')->where('course_id',$id)->delete();
        DB::table('tbl_course_alumni')->where('course_id',$id)->delete();
        DB::table('tbl_course_enroll_list')->where('course_id',$id)->delete();
        DB::table('tbl_course_outline')->where('course_id',$id)->delete();
        DB::table('tbl_course_testimonial')->where('course_id',$id)->delete();
        Session::flash('message','Course Deleted Sucessfully.');
        return redirect('admin/show_course');
     }
     public function course_details(Request $request, $id)
     {
       //$courseID=$request->tbl_course_id;
       //dd($courseID);
       $data['course'] = DB::table('tbl_course')
                            ->join('tbl_course_schedule', 'tbl_course_schedule.course_id', '=', 'tbl_course.id')
                            ->join('tbl_course_toolsimg', 'tbl_course_toolsimg.course_id', '=', 'tbl_course.id')
                            ->select('tbl_course.id as tbl_course_id','tbl_course.course_type','tbl_course.course_title','tbl_course.instructor_name',
                            'tbl_course.price','tbl_course.image','tbl_course.start_date','tbl_course.classDays','tbl_course.classTimes','tbl_course.coupon_type','tbl_course.next_date','tbl_course.no_of_seats',
                            'tbl_course.short_desc','tbl_course.about_course','tbl_course.learning_objective','tbl_course.upcoming_cohort','tbl_course.afordble_price','tbl_course_schedule.module_name',
                            'tbl_course_schedule.module_description','tbl_course_toolsimg.uget_img','tbl_course_toolsimg.ltools_img')
                            ->where('tbl_course.id', $id )
                           //  ->where('tbl_course.status', 1 )
                            ->get();
                            //dd($data);
      return view('backend.course_details',$data);
     }
     public function course_schedule_status($key,$id)
     {
      $course_schedule_status = DB::table('tbl_course_schedule')->select('status')->where('course_id',$id)->first();
      $explode = explode(':::',$course_schedule_status->status);
      if ($key == 0){
         if($explode[0] == '1'){ $status = 0; }
         if($explode[0] == '0'){ $status = 1; }
         $values = array('status' => $status.':::'.$explode[1].':::'.$explode[2].':::'.$explode[3].':::'.$explode[4] );
      }else if ($key == 1){
         if($explode[1] == '1'){ $status = 0; }
         if($explode[1] == '0'){ $status = 1; }
         $values = array('status' => $explode[0].':::'.$status.':::'.$explode[2].':::'.$explode[3].':::'.$explode[4] );
      }else if ($key == 2){
         if($explode[2] == '1'){ $status = 0; }
         if($explode[2] == '0'){ $status = 1; }
         $values = array('status' => $explode[0].':::'.$explode[1].':::'.$status.':::'.$explode[3].':::'.$explode[4] );
      }else if ($key == 3){
         if($explode[3] == '1'){ $status = 0; }
         if($explode[3] == '0'){ $status = 1; }
         $values = array('status' => $explode[0].':::'.$explode[1].':::'.$explode[2].':::'.$status.':::'.$explode[4] );
      }else if ($key == 4){
         if($explode[4] == '1'){ $status = 0; }
         if($explode[4] == '0'){ $status = 1; }
         $values = array('status' => $explode[0].':::'.$explode[1].':::'.$explode[2].':::'.$explode[3].':::'.$status );
      }
      DB::table('tbl_course_schedule')->where('course_id',$id)->update($values);
      Session::flash('message' , 'Status changed successfully !!');
      return redirect('admin/course_details/'.$id);
     }
     public function sheets_number_status($id)
     {
      $sheets_number_status = explode(':::',DB::table('tbl_course')->where('id',$id)->first()->no_of_seats)[1];
      if($sheets_number_status == '1'){
         $status = 0;
      }
      if($sheets_number_status == '0'){
         $status = 1;
      }
      $values = array('no_of_seats' => explode(':::',DB::table('tbl_course')->where('id',$id)->first()->no_of_seats)[0].':::'.$status );
      DB::table('tbl_course')->where('id',$id)->update($values);
      Session::flash('message' , 'No. of Sheets Status changed sucessfully.');
      return redirect('admin/show_course');
     }
     public function course_change_status($id)
     {
      $courses = DB::table('tbl_course')->select('status')->where('id','=',$id)->first();
      if($courses->status == '1'){
         $status = 0;
      }
      if($courses->status == '0'){
         $status = 1;
      }
      $values = array('status' => $status );
      DB::table('tbl_course')->where('id',$id)->update($values);
      Session::flash('message' , 'Status changed sucessfully.');
      return redirect('admin/show_course');
     }
     public function show_installment_charges()
     {
      $data['installment_charges'] = DB::table('tbl_installment_charges')->first();
      return view('backend.edt_installment_charges',$data);
     }
     public function edit_installment_charges(Request $request)
     {
      $three_months_charge = $request->three_months_charge;
      $two_months_charge = $request->two_months_charge;
      $values=array(
         'three_months_charge' => $three_months_charge,
         'two_months_charge' => $two_months_charge,
      );
      DB::table('tbl_installment_charges')->where('id',1)->update($values);
      Session::flash('message','Installation Charges updated sucessfully !!');
      return redirect('admin/show_installment_charges');
     }
     public function show_instructure()
     {
      $data['instructure']=DB::table('tbl_instructure')->orderBy('id','DESC')->get();
      return view('backend.show_instructure',$data);
     }
     public function insert_instructure(Request $request)
     {
      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("assets/course_img", $name);
         $imageName = $name;
  
      }else
      {
         $imageName = "no file upload";
      }
      $name=$request->input('name');
      $role=$request->input('role');
      $values=array(
         'image' => $imageName,
         'name' => $name,
         'role' => $role,
         'status' => 1,
         'created_at' =>date('Y-m-d H:i:s'),
         'updated_at' =>date('Y-m-d H:i:s')
      );
      //dd($values);
      $data=DB::table('tbl_instructure')->insert($values);
      Session::flash('message','Instructor Added Sucessfully.');
      return redirect('admin/show_instructure');
     }
     public function del_instructure($id)
     {
     $data=DB::table('tbl_instructure')->where('id',$id)->delete();
     Session::flash('message','Instructor Deleted Sucessfully.');
     return redirect('admin/show_instructure');
     }
     public function edt_instructurev($id)
     {
      $data['instructure']=DB::table('tbl_instructure')->where('id',$id)->get();
      return view('backend.edt_instructurev', $data);
     }
     public function edt_instructure(Request $request)
     {
      $id=$request->instructure_id;
      $img=$request->pre_img;
      $name=$request->input('name');
      $role=$request->input('role');
      if ($request->hasFile('new')) {
         $image = $request->file('new');
         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("assets/course_img", $name);
         $imageName = $name;
  
      }else
      {
         $imageName = $request->pre_img;
      }
      $values=array(
         'image' => $imageName,
         'name' => $name,
         'role' => $role,
         'status' => 1,
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s')
      );
      //dd($values);
      $data=DB::table('tbl_instructure')->where('id',$id)->where('status',1)->update($values);
      Session::flash('message','Record Updated Sucessfully.');
      return redirect('admin/show_instructure');
     }
     public function show_faq($id)
     {
      // dd($id);
      $data['course_id'] = $id;
      $data['faq']=DB::table('tbl_faq')->where('course_id',$id)->orderBy('id','DESC')->get();
      return view('backend.show_faq',$data);
     }
     public function insert_faq(Request $request)
     {
     $course_id = $request->input('course_id');
     $question = $request->input('question');
     $answer = $request->input('answer');
     $values=array(
      'course_id' => $course_id,
      'question' => $question,
      'answer' => $answer,
      'status' => 1,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
     );
     //dd($values);
     $data=DB::table('tbl_faq')->insert($values);
     Session::flash('message','FAQ Added Sucessfully');
     return redirect('admin/show_faq/'.$course_id);
     }
     public function del_faq($id)
     {
      $course_id = DB::table('tbl_faq')->where('id',$id)->first()->course_id;
     $data=DB::table('tbl_faq')->where('id',$id)->delete();
     Session::flash('message','FAQ Deleted Sucessfully');
     return redirect('admin/show_faq/'.$course_id);
     }
     public function edt_faqv($id)
     {
     $data['faq']=DB::table('tbl_faq')->where('id',$id)->get();
     return view('backend.edt_faqv',$data);
     }
     public function edt_faq(Request $request)
     {
      $course_id= $request->course_id;
      $id= $request->faq_id;
      $question= $request->input('question');
      $answer= $request->input('answer');
      $values = array(
         'question' => $question,
         'answer' => $answer,
         'status' => 1,
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s')
      );
      //dd($values);
      $data=DB::table('tbl_faq')->where('id',$id)->where('status',1)->update($values);
      Session::flash('message','FAQ updated Sucessfully');
      return redirect('admin/show_faq/'.$course_id);
     }
     public function faq_stus_change($id)
     {
      $course_id = DB::table('tbl_faq')->where('id',$id)->first()->course_id;
      $faqs = DB::table('tbl_faq')->select('status')->where('id','=',$id)->first();
      if($faqs->status == '1'){
         $status = 0;
      }
      if($faqs->status == '0'){
         $status = 1;
      }
      $values = array('status' => $status );
      DB::table('tbl_faq')->where('id',$id)->update($values);
      Session::flash('message' , 'Faq Status change sucessfully');
      return redirect('admin/show_faq/'.$course_id);
     }
     public function show_crstestmonial(Request $request, $tbl_course_id)
     {
      $courseid=$request->tbl_course_id;
      Session::put('courseID', $courseid);
      $data['crstestmonial']=DB::table('tbl_course_testimonial')->where('course_id',$courseid)->orderBy('id','DESC')->get();
      return view('backend.show_crstestmonial',$data);
     }
     public function insert_curtestimonial(Request $request)
     {
      $courseid=session('courseID');
      $name=$request->input('name');
      $destination=$request->input('destination');
      $about=$request->input('about');
       
      if ($request->hasFile('brand_image')) {
         $image = $request->file('brand_image');
         $brand_image = time().'.'.$image->getClientOriginalExtension();
         $image->move("assets/testimonial_img/brand_img/", $brand_image);
         $brand_image = $brand_image;
   
      }else
      {
         $brand_image = "no file upload";
      }
      if ($request->hasFile('profile_img')) {
         $image2 = $request->file('profile_img');
         $profile_img = time().'.'.$image2->getClientOriginalExtension();
         $image2->move("assets/testimonial_img/profile_img/", $profile_img);
         $profile_img = $profile_img;
   
      }else
      {
         $profile_img = "no file upload";
      }
      $values = array(
         'course_id' => $courseid,
         'name' => $name, 
         'destination'=>$destination, 
         'about' => $about, 
         'brand_image'=>$brand_image, 
         'profile_img'=>$profile_img,
         'status' =>1,
         'created_at'=>date("Y-m-d H:i:s"),
         'updated_at'=>date("Y-m-d H:i:s")
      );
      //dd($values);
      $data=DB::table('tbl_course_testimonial')->insert($values);
      Session::flash('message','Course Testimonial Added Sucessfully');
      return redirect('admin/show_crstestmonial/'.$courseid);
     }
     public function del_crstestmonial($id)
     {
      $courseid=session('courseID');
      $data=DB::table('tbl_course_testimonial')->where('id',$id)->delete();
      Session::flash('message','Course Testimonial Deleted Sucessfully');
      return redirect('admin/show_crstestmonial/'.$courseid);
     }
     public function edt_crstestmonialv($id)
     {
      $courseid=session('courseID');
      $data['crstestmonial']=DB::table('tbl_course_testimonial')->where('id',$id)->where('course_id',$courseid)->get();
      return view('backend.edt_crstestmonialv',$data);
     }
     public function edt_crstestmonial(Request $request)
     {
      $courseid=session('courseID');
      $id=$request->testimonials_id;
      $test_name=$request->input('name');
      //dd($name);
      $destination=$request->input('destination');
      $about=$request->input('about');
      if ($request->hasFile('brand_image')) {
         $image = $request->file('brand_image');
         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("assets/testimonial_img/brand_img/", $name);
         $brand_image = $name;
   
      }else
      {
         $brand_image = $request->brand_previous;
      }

      if ($request->hasFile('profile_img')) {
         $image = $request->file('profile_img');
         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("assets/testimonial_img/profile_img/", $name);
         $profile_img = $name;
   
      }else
      {
         $profile_img = $request->profile_previous;
      }
      $values = array(
         'course_id' => $courseid,
         'name' => $test_name, 
         'destination'=>$destination, 
         'about' => $about, 
         'brand_image'=>$brand_image, 
         'profile_img'=>$profile_img,
         'status' =>1,
         'created_at'=>date("Y-m-d H:i:s"),
         'updated_at'=>date("Y-m-d H:i:s")
      );
     //dd($values);
     $data=DB::table('tbl_course_testimonial')->where('id',$id)->where('course_id',$courseid)->update($values);
     Session::flash('message','Course Testimonial Updated Sucessfully');
     return redirect('admin/show_crstestmonial/'.$courseid);
     }
     public function crstestmonial_chng_stus($id)
     {
      $courseid=session('courseID');
      $crstestmonials = DB::table('tbl_course_testimonial')->select('status')->where('id','=',$id)->first();
      if($crstestmonials->status == '1'){
         $status = 0;
      }
      if($crstestmonials->status == '0'){
         $status = 1;
      }
      $values = array('status' => $status );
      DB::table('tbl_course_testimonial')->where('id',$id)->where('course_id',$courseid)->update($values);
      Session::flash('message' , 'Status Updated sucessfully');
      return redirect('admin/show_crstestmonial/'.$courseid);
     }
     public function show_crsalumni(Request $request, $tbl_course_id)
     {
      $courseid=$request->tbl_course_id;
      Session::put('courseID', $courseid);
      $data['crsalumni']=DB::table('tbl_course_alumni')->where('course_id',$courseid)->orderBy('id','DESC')->get();
      return view('backend.show_crsalumni',$data);
     }
     public function insert_crsalumni(Request $request)
     {
      $courseid=session('courseID');
      if ($request->hasFile('testimonial_video')) {
         $testimonial_video = $request->file('testimonial_video');
         $name = time().'.'.$testimonial_video->getClientOriginalExtension();
         $testimonial_video->move("assets/testimonial_video/", $name);
         $imageName = $name;
  
      }else
      {
         $imageName = "no file upload";
      }
      $values= array(
         'course_id' => $courseid,
         'testimonial_video'=>$imageName,
         'status' =>1,
         'created_at'=>date("Y-m-d H:i:s"),
         'updated_at'=>date("Y-m-d H:i:s") 
      );
      //dd($values);
      $data=DB::table('tbl_course_alumni')->insert($values);
      Session::flash('message','Course Alumni Added Sucessfully');
      return redirect('admin/show_crsalumni/'.$courseid);
     }
     public function del_crsalumni($id)
     {
      $courseid=session('courseID');
      $data=DB::table('tbl_course_alumni')->where('id',$id)->delete();
      Session::flash('message','Course Alumni Deleted Sucessfully');
      return redirect('admin/show_crsalumni/'.$courseid);
     }
     public function edt_crsalumniv($id)
     {
      $courseid=session('courseID');
      $data['crsalumni']=DB::table('tbl_course_alumni')->where('id',$id)->where('course_id',$courseid)->get();
      return view('backend.edt_crsalumniv',$data);
     }
     public function edt_crsalumni(Request $request)
     {
      $courseid=session('courseID');
      $id=$request->editvdo_id;
      $pre_alumni=$request->previous_vdo;
      //dd($pre_alumni);
      if ($request->hasFile('new_vdo')) {
         $new_vdo = $request->file('new_vdo');
         $name = time().'.'.$new_vdo->getClientOriginalExtension();
         $new_vdo->move("assets/testimonial_video/", $name);
         $vdoName = $name;
      }else
      {
         $vdoName = "$request->previous_vdo";
      }
      $values= array(
         'course_id' => $courseid,
         'testimonial_video'=>$vdoName,
         'status' =>1,
         'created_at'=>date("Y-m-d H:i:s"),
         'updated_at'=>date("Y-m-d H:i:s") 
      );
      //dd($values);
      $data=DB::table('tbl_course_alumni')->where('id',$id)->where('course_id',$courseid)->update($values);
      Session::flash('message','Course Alumni Updated Sucessfully');
      return redirect('admin/show_crsalumni/'.$courseid);
     }
     public function crsalumni_chng_stus($id)
     {
      $courseid=session('courseID');
      $crsalumnis = DB::table('tbl_course_alumni')->select('status')->where('id','=',$id)->first();
      if($crsalumnis->status == '1'){
         $status = 0;
      }
      if($crsalumnis->status == '0'){
         $status = 1;
      }
      $values = array('status' => $status );
      DB::table('tbl_course_alumni')->where('id',$id)->where('course_id',$courseid)->update($values);
      Session::flash('message' , 'Course Alumni Updated sucessfully');
      return redirect('admin/show_crsalumni/'.$courseid);
     }
     public function show_careermap()
     {
      $data['careermap']=DB::table('tbl_carrer_road_map')->orderBy('id','DESC')->get();
      return view('backend.show_careermap',$data);
     }
     public function careermapsv($id){
         $data['careermap']=DB::table('tbl_carrer_road_map')->where('id',$id)->first();
         return view('backend.edt_careermapsv', $data);
     }
     public function edt_careermapsv(Request $request)
     {
      $careermapid=$request->careermapid;
      //dd($careermapid);
      $cname=$request->input('name');
      $content=$request->input('status');
      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $name = time().'.'.$image->getClientOriginalExtension();
         $image->move("assets/course_img", $name);
         $imageName = $name;
  
      }else
      {
         $imageName = "$request->preimg";
      }
      $values=array(
         'title' => $cname,
         'course_id'=> 1,
         'image' => $imageName,
         'status' => $content
         // 'status' => 1,
         // 'created_at' => date('Y-m-d H:i:s'),
         // 'updated_at' => date('Y-m-d H:i:s')
      );
      //dd($values);
      $data=DB::table('tbl_carrer_road_map')->where('id',$careermapid)->update($values);
      Session::flash('message','Career Road Map updated Sucessfully');
      return redirect('admin/show_careermap');
     }
     public function cmap_stus_change($id)
     {
      $careermaps = DB::table('tbl_carrer_road_map')->select('status')->where('id','=',$id)->first();
      if($careermaps->status == '1'){
         $status = 0;
      }
      if($careermaps->status == '0'){
         $status = 1;
      }
      $values = array('status' => $status );
      DB::table('tbl_carrer_road_map')->where('id',$id)->update($values);
      Session::flash('message' , 'Career Road Map Status Change Successfully');
      return redirect('admin/show_careermap');
     }
     public function show_coupon()
     {
       $data['coupons'] = DB::table('tbl_coupon')->orderBy('id','DESC')->get();
       return view('backend.show_coupon', $data);
     }
 
     public function coupon_details(Request $request, $id)
     {
       $data['coupons'] = DB::table('tbl_coupon')->where('id',$id)->first();
       return view('backend.coupon_details', $data);
     }
 
     public function insert_coupon(Request $request)
     { 
      // dd($request->all());
       $st_date = str_replace("T"," ",$request->st_date);
       $end_date = str_replace("T"," ",$request->end_date);
       $discount = $request->discount;
       $discount_type = $request->discount_type;
       if ($discount == null){
         $coupon_type = "Free";
         $coupon_discount = "100";
         $couponType = $coupon_type;
      }else{
         if($discount_type == "Flat"){
            $coupon_type = "Discount";
            $coupon_discount = $discount;
            $couponType = $discount_type.' '.$coupon_type;
         }
         else if($discount_type == "%"){
            $coupon_type = "Discount";
            $coupon_discount = $discount;
            $couponType = $discount_type.' '.$coupon_type;
         }
      }
       $insert = [
          'coupon_name' => $request->coupon_name,
          'coupon_code' => $request->course_title,
          'coupon_type' => $couponType,
          'coupon_discount' => $coupon_discount,
          'start_date' => $st_date,
          'end_date' => $end_date,
          'status' => 0,
       ];
       $update = [
          'coupon_name' => $request->coupon_name,
          'coupon_code' => $request->course_title,
          'coupon_type' => $couponType,
          'coupon_discount' => $coupon_discount,
          'start_date' => $st_date,
          'end_date' => $end_date,
       ];
       if ($request->coupon_id == "") {
          DB::table('tbl_coupon')->insert($insert);
          Session::flash('message','Coupon added sucessfully.');
       }else{
          DB::table('tbl_coupon')->where('id',$request->coupon_id)->update($insert);
          Session::flash('message','Coupon updated sucessfully.');
       }
       return redirect('admin/show_coupon');
     }
 
     public function edit_coupon($id){
       $data['coupons'] = DB::table('tbl_coupon')->where('id',$id)->first();
       return view('backend/add_coupon',$data);
     }
 
     public function coupon_delete($id)
      {
         $coupon = DB::table('tbl_coupon')->where('id',$id)->delete();
         Session::flash('message','Coupon Deleted Sucessfully.');
         return redirect('admin/show_coupon');
      }
 
     public function coupon_change_status($id)
      {
       $coupons = DB::table('tbl_coupon')->select('status')->where('id','=',$id)->first();
         //Check alumni status
         if($coupons->status == '1'){
             $status = 0;
             $statusName = "Inactive";
         }
         if($coupons->status == '0'){
             $status = 1;
             $statusName = "Active";
         }
         $values = array('status' => $status );
         DB::table('tbl_coupon')->where('id',$id)->update($values);
 
         Session::flash('message' , 'Status changed to ' .$statusName. ' successfully.');
         return redirect('admin/show_coupon');
      }

      public function inst_change_status($id)
      {
       $insts = DB::table('tbl_instructure')->select('status')->where('id','=',$id)->first();
         //Check alumni status
         if($insts->status == '1'){
             $status = 0;
             $statusName = "Inactive";
         }
         if($insts->status == '0'){
             $status = 1;
             $statusName = "Active";
         }
         $values = array('status' => $status );
         DB::table('tbl_instructure')->where('id',$id)->update($values);
 
         Session::flash('message' , 'Status changed to ' .$statusName. ' successfully.');
         return redirect('admin/show_instructure');
      }
}
